<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Barang;
use Intervention\Image\ImageManagerStatic as Image;
use Session;
use Input;
use DB;
use Validator;
use Response;


class BarangController extends Controller
{

    public function index()
    {
        $data = [
            'page' => 'barang',
            'barang' => Barang::all()
        ];
        return view('admin.barang.index',$data);
        // dd($data['barang']);
    }

    public function create()
    {
        $data = [
            'page' => 'artikel',
            'artikel' => Artikel::all()
        ];
    	return view('admin.artikel.create',$data);
    }

    public function postCreate(Request $request)
    {
        $reqArtikel = $request->except('tag');
        $artikel = Artikel::create($reqArtikel);
        $artikel->slug = str_slug($artikel->judul,'-');
        $artikel->gambar = time() .'.'.$request->file('gambar')->getClientOriginalExtension();
        // Add image from Summernote
        $konten = $request->konten; // Summernote input field
        $artikel->save();
        foreach (explode(',', $request->input('tags')) as $tag) {
            if (Tag::where('tag',$tag)->count() > 0) {
                $checkTag = Tag::where('tag',$tag)->first();
                $checkTag->increment('count');
            }
            else
            {
            $checkTag = Tag::create([
                'tag'     => $tag,
                'count'   => '1'
                ]);
            }
            ArtikelTag::create([
            'artikel_id'    => $artikel->id,
            'tag_id'        => $checkTag->id  
                ]);
        }
        // Put picture to storage
        $gambar = $request->file('gambar')->move("images/artikel/",$artikel->gambar);
        Image::make( $gambar->getRealPath() )->fit(600, 600)->save('images/artikel/thumbnail/'.$artikel->gambar)->destroy();
        Session::put('alert-success', 'Artikel "'.$artikel->judul.'" berhasil ditambahkan');
        return Redirect::to('article');
    }

    public function delete($slug)
    {
    	$artikel = Artikel::where('slug',$slug)->first();
        File::delete('/images/artikel/'.$artikel->gambar);
        $artikel->delete();
    	Session::put('alert-success', 'Artikel "'.$artikel->judul.'" berhasil dihapus');
      	return Redirect::back();	  
    }

    public function edit($slug)
    {
        $artikel    = Artikel::where('slug',$slug)->first();
        $artikelTag = ArtikelTag::where('artikel_id',$artikel->id)->get();
        $tags = [];
        foreach ($artikelTag as $at) {
            $tags[] = $at->nameTag['tag'];
        }
        $valTag = implode(',', $tags);
        $data = [
            'page' => 'artikel',
            'artikel' => $artikel,
            'tags'    => $valTag
        ];
        return view('admin.artikel.edit',$data);
    }

    public function postEdit(Request $request)
    {
        $artikel = $request->input();
        $tags = explode(',', $request->input('tags'));
        $art = Artikel::where('id',$artikel['artikel_id'])->first();
        if ($request->file('gambar')) {
            $gambar = time() .'.'.$request->file('gambar')->getClientOriginalExtension();
            File::delete('images/artikel/'.$art->gambar);
            File::delete('images/artikel/thumbnail/'.$art->gambar);
            $upload = $request->file('gambar')->move("images/artikel/",$gambar);
            Image::make( $upload->getRealPath() )->fit(600, 600)->save('images/artikel/thumbnail/'.$gambar)->destroy();
            $slug = str_slug($artikel['judul'],'-');
            Artikel::where('id',$artikel['artikel_id'])
                ->update([ 'judul'   => $artikel['judul'],
                            'konten' => $artikel['konten'],
                            'slug'   => $slug,
                            'gambar' => $gambar
                    ]);
        }
    
        else{
            $slug = str_slug($artikel['judul'],'-');
            Artikel::where('id',$artikel['artikel_id'])
                ->update([ 'judul'   => $artikel['judul'],
                            'konten' => $artikel['konten'],
                            'slug'   => $slug
                    ]);
        }

        // Tag
        $artikelTag = ArtikelTag::where('artikel_id',$request->input('artikel_id'))->get();
        $tags = explode(',', $request->input('tags'));
        foreach ($artikelTag as $at) {
            if (!str_contains($request->input('tags'),$at->nameTag['tag'])) 
            {
                ArtikelTag::where([['tag_id','=',$at->tag_id],['artikel_id','=',$request->input('artikel_id')]])->delete();
            }
            Tag::where('tag',$at->nameTag['tag'])->decrement('count'); 
        }

        foreach (explode(',', $request->input('tags')) as $tag) {
            if (Tag::where('tag',$tag)->count() > 0) {
                $checkTag = Tag::where('tag',$tag)->first();
                $checkTag->increment('count');
            }
            else
            {
            $checkTag = Tag::create([
                'tag'     => $tag,
                'count'   => '1'
                ]);
            ArtikelTag::create([
            'artikel_id'    => $request->input('artikel_id'),
            'tag_id'        => $checkTag->id  
                ]);
            }
        }

        Session::put('alert-success', 'Artikel berhasil diedit');
        return Redirect::to('article');
    }

    public function publish($slug,$publish)
    {
        if ($publish == "0") {
            Artikel::where('slug',$slug)->update([
                'published' => '1'
                ]);
            Session::put('alert-success', 'Artikel berhasil di publish');
        }
        else{
            Artikel::where('slug',$slug)->update([
                'published' => '0'
                ]);
            Session::put('alert-success', 'Artikel berhasil di unpublish');
        }

        return Redirect::to('article');
    }

    public function ajaximage(Request $request)
    {
        $file = \Request::file('file');
        $destinationPath = public_path().'/img/uploads/';
        $filename = time() .'.'. $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);
        return url('').'/img/uploads/'.$filename;
    }

}