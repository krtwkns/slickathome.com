@extends('adminlte::layouts.app')

@section('code-header')


@endsection

@section('htmlheader_title')
Barang 
@endsection

@section('contentheader_title')
Barang
@endsection

@section('main-content')
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
    <i class="fa fa-plus-uare"></i> Tambah Barang</a>
</div>
<div style="overflow: auto">
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
	<thead>
		<tr>
      <th>No.</th>
      <th style="text-align:center">Kode Barang</th>
      <th >Nama Barang</th>
      <th>Kategori</th>
      <th>Ukuran</th>
      <th style="text-align:center">Action</th>
		</tr>	</thead>
  <tbody>
   <?php $number = 1 ?>
   @forelse($barang as $b) 
    <tr>
      <td>{{$number}}</td>
      <td>{{$b->kode_barang}}</td>
      <td>{{$b->nama_barang}}</td>
      <td>{{$b->kategori}}</td>
      <td>{{$b->ukuran}}</td>
      <td><a onclick="return confirm('Anda yakin untuk menghapus barang ini?');" href="{{url('barang/'.$b->id.'/hapus/')}}" class="btn btn-danger btn-xs">
        <i class="fa fa-trash-o"></i> Hapus</a></td>
    </tr>
     <?php $number++ ?>
     @empty
        <tr>
          <td colspan="5"><center>Belum ada artikel</center></td>
        </tr>
    @endforelse
  </tbody>
</table>
</div>



@endsection
@section('code-footer')
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<script type="text/javascript">
  $(document).ready(function(){
      $('#myTable').DataTable({
        "ordering": true
      });
      $('[data-toggle="tooltip"]').tooltip();   
  });
</script>


@endsection