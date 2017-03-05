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

    public function tambah()
    {
        $data = [
            'page' => 'barang',
            'barang' => Barang::all()
        ];
    	return view('admin.barang.tambah',$data);
    }

    public function postTambah(Request $request)
    {
        Barang::create($request->input());
        Session::put('alert-success', 'Barang "'.$request->input('nama_barang').'" berhasil ditambahkan');
        return Redirect::to('barang');
    }

    public function hapus($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
    	Session::put('alert-success', 'Barang '.$barang->nama_barang.' berhasil dihapus');
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