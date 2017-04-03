<br>
<!-- include summernote css/js-->
<div class="flash-message" style="margin-left: -16px;margin-right: -16px; margin-top: 13px;">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
  @if(Session::has('alert-' . $msg))
<div class="alert alert-{{ $msg }}">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p class="" style="border-radius: 0">{{ Session::get('alert-' . $msg) }}</p>
</div>
  {!!Session::forget('alert-' . $msg)!!}
  @endif
  @endforeach
</div>
<div style="overflow: auto">
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
  <thead>
    <tr>
      <th>No.</th>
      <th style="text-align:center">Kode Barang</th>      
      <th style="text-align:center">Nama Barang</th>
      <th style="text-align:center">Jumlah Stok</th>
      <th style="text-align:center">Action</th>
    </tr> </thead>
  <tbody>
   @forelse($stok_barang as $i => $sb) 
    <tr>
      <td>{{ $i+1 }}</td>
      <td width="28%" style="text-align:center">{{$sb->barang->kode_barang}}</td>
      <td width="28%" style="text-align:center">{{$sb->barang->nama_barang}}</td>      
      <td width="28%" style="text-align:center">{{$sb->jumlah_stok}} {{$sb->satuan_stok}}</td>
      <td style="text-align:center" >
        <div class="col-md-12">
          <a style="width: 70px ; margin-bottom: 5px;" onclick="return confirm('Anda yakin untuk menghapus barang ini?');" href="{{url('stok_barang/'.$sb->id.'/hapus/')}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus
          </a>            
        </div>
        
        <div class="col-md-12">
          <a style="width: 70px; margin-top: 5px;" href="{{url('stok_barang/'.$sb->id.'/edit/')}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit
          </a>            
        </div>
      </td>          
    </tr>
     
     @empty
        <tr>
          <td colspan="6"><center>Belum ada barang</center></td>
        </tr>
    @endforelse
  </tbody>
</table>
</div>