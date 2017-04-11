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
<div style="margin-bottom: 10px">
  <a href="{{url('barang/tambah')}}" type="button" class="btn btn-info btn-md" >
    <i class="fa fa-plus-square"></i> Tambah Barang</a>
</div>
<div style="overflow: auto">
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
  <thead>
    <tr>
      <th>No.</th>
      <th style="text-align:center">Kode Barang</th>
      <th style="text-align:center">Nama Barang</th>
      <th style="text-align:center">Kategori</th>
      <th style="text-align:center">Ukuran</th>
      <th style="text-align:center">Harga Modal</th>
      <th style="text-align:center">Harga Jual</th>
      <th style="text-align:center">Action</th>
    </tr> </thead>
  <tbody>
   <?php $number = 1 ?>
   @forelse($barang as $b) 
    <tr>
      <td width="5%" style="text-align:center">{{$number}}</td>
      <td width="10%" style="text-align:center">{{$b->kode_barang}}</td>
      <td width="30%">{{$b->nama_barang}}</td>
      <td width="10%" style="text-align:center">{{$b->kategori}}</td>
      <td width="10%" style="text-align:center">{{$b->ukuran}}</td>
      <td width="10%" style="text-align:right">Rp. {{number_format($b->harga_modal, 0, ',', '.')}}</td>
      <td width="10%" style="text-align:right">Rp. {{number_format($b->harga_jual, 0, ',', '.')}}</td>
      <td style="text-align:center" ><a onclick="return confirm('Anda yakin untuk menghapus barang ini?');" href="{{url('barang/'.$b->id.'/hapus/')}}" class="btn btn-danger btn-xs">
        <i class="fa fa-trash-o"></i> Hapus</a>
        <a href="{{url('barang/'.$b->kode_barang.'/edit/')}}" class="btn btn-warning btn-xs">
        <i class="fa fa-pencil-square-o"></i> Edit</a>
        </td>
    </tr>
     <?php $number++ ?>
     @empty
        <tr>
          <td colspan="8"><center>Belum ada barang</center></td>
        </tr>
    @endforelse
  </tbody>
</table>
</div>