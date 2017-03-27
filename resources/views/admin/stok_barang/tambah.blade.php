@extends('adminlte::layouts.app')

@section('htmlheader_title')
Tambah Stok Barang
@endsection

@section('contentheader_title')
Tambah Stok Barang
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
			<form id="tambahStokBarang" method="post" action="{{url('stok_barang/tambah')}}" enctype="multipart/form-data"  class="form-horizontal">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label for="barang_id" class="col-sm-2 control-label">Barang</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="barang_id" name="barang_id" placeholder="Masukkan Barang" required>
					</div>
				</div>

				<div class="form-group">
					<label for="satuan_stok" class="col-sm-2 control-label">Satuan Stok</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="satuan_stok" name="satuan_stok" placeholder="Masukkan Satuan Stok" required>
					</div>
				</div>

				<div class="form-group">
					<label for="jumlah_stok" class="col-sm-2 control-label">Jumlah Stok</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="jumlah_stok" name="jumlah_stok" placeholder="Masukkan Jumlah Stok" required>
					</div>
				</div>

				<div class="form-group text-center">
					<div class="col-md-8 col-md-offset-2">
					<button type="submit" class="btn btn-primary btn-lg">
							Confirm
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('code-footer')

@endsection

