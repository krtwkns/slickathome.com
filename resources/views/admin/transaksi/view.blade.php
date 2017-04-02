@extends('adminlte::layouts.app')

@section('htmlheader_title')
View Detail Transaksi
@endsection

@section('contentheader_title')
View Detail Transaksi
@endsection

@section('code-header')

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
<link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">

@endsection

@section('main-content')
<style>
	.form-group label{
		text-align: left !important;
	}
</style>

	@foreach (['danger', 'warning', 'success', 'info'] as $msg)
	@if(Session::has('alert-' . $msg))
<div class="alert alert-{{ $msg }}">
	<p class="" style="border-radius: 0">{{ Session::get('alert-' . $msg) }}</p>
</div>
	{!!Session::forget('alert-' . $msg)!!}
	@endif
	@endforeach


<div class="row">
	<div class="col-md-12">
		<div class="">

			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<br>
			<form id="view-detail" method="" action="" enctype="multipart/form-data"  class="form-horizontal">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			<div class="form-group">
					<label for="nama_barang" class="col-sm-2 control-label">Total Harga</label>
					<div class="col-md-8">
						<input disabled type="text" class="form-control input-lg" id="nama_barang" value="{{ $transaksi->total_harga }}" name="nama_barang"  >
					</div>
				</div>

				<div class="form-group">
					<label for="diskon" class="col-sm-2 control-label">Diskon</label>
					<div class="col-md-8">
						<input disabled type="text" class="form-control input-lg" id="diskon" value="{{ $transaksi->diskon }}" name="diskon" >
					</div>
				</div>

				<div class="form-group">
					<label for="nama_barang" class="col-sm-2 control-label">Laba</label>
					<div class="col-md-8">
						<input disabled type="text" class="form-control input-lg" id="laba" value="{{ $transaksi->laba }}" name="laba"  >
					</div>
				</div>				

				<div class="form-group">
					<label for="created_at" class="col-sm-2 control-label">Waktu Transaksi</label>
					<div class="col-md-8">
						<input disabled type="text" class="form-control input-lg" id="created_at" name="created_at" value="{!!App\Helpers\GeneralHelper::indonesianDateFormat($transaksi->created_at)!!}" >
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8 col-md-offset-9">
						<a href="{{ url('/transaksi') }}" type="button" class="btn btn-info btn-md">Finish</a>
					</div>
				</div>

				<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
				  <thead>
				  	<tr>
				  	  <td colspan="5"><center>Detail Transaksi</center></td>
				  	</tr>
				    <tr>
				      <th style="text-align:center">No.</th>
				      <th style="text-align:center">Nama Barang</th>
				      <th style="text-align:center">Jumlah</th>
				      <th style="text-align:center">Harga</th>
				    </tr>
				    </thead> 
				    <tbody>
				   <?php $number = 1 ?>
				   @forelse($item as $i) 
				    <tr>
				    	<td width="5%" style="text-align:center">{{$number}}</td>
				    	<td width="25%" style="text-align:center">{{$i->barang->nama_barang}}</td>
				    	<td width="25%" style="text-align:center">{{$i->sub_jumlah_barang}}</td>
				    	<td width="25%" style="text-align:center">Rp. {{number_format($i->sub_jumlah_harga, 0, ',', '.')}}</td>
				    </tr>
				     <?php $number++ ?>
				    @empty
				    <tr>
			        	<td colspan="5"><center>Tidak Ada Item</center></td>
			        </tr>
				    @endforelse
				  </tbody>
				</table>
			</form>
		</div>
	</div>
</div>
@endsection

@section('code-footer')

@endsection