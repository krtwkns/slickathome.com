@extends('adminlte::layouts.app')

@section('htmlheader_title')
Edit Stok
@endsection

@section('contentheader_title')
Edit Stok
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
			<form id="editBarang" method="post" action="{{url('stok_barang/'.$stok_barang->barang_id.'/edit')}}" enctype="multipart/form-data"  class="form-horizontal">
				
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" value="{{ $stok_barang->id }}">	
				<input type="hidden" name="barang_id" value="{{ $stok_barang->barang_id }}">	

				<div class="form-group">
					<label for="barang_id" class="col-sm-2 control-label">Kode Barang</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="barang_id" value="{{$stok_barang->barang->kode_barang}}" name="kode_barang" placeholder="Masukkan Barang" required disabled>
					</div>
				</div>

				<div class="form-group">
					<label for="barang_id" class="col-sm-2 control-label">Nama Barang</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="barang_id" value="{{$stok_barang->barang->nama_barang}}" name="nama_barang" placeholder="Masukkan Barang" required disabled>
					</div>
				</div>

				<div class="form-group">
					<label for="satuan_stok" class="col-sm-2 control-label">Satuan Stok Barang</label>
					<div class="col-md-8">
	                    <select class="form-control" id="kategori" name="satuan_stok" required>
	                        <option value="{{!!$stok_barang->satuan_stok!!}}" selected >{{$stok_barang->satuan_stok}}</option>
	                        <option value="pcs" selected>pcs</option>
	                    </select>
					</div>
				</div>

				<div class="form-group">
					<label for="jumlah_stok" class="col-sm-2 control-label">Jumlah Stok</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="jumlah_stok" name="jumlah_stok" value="{{$stok_barang->jumlah_stok}}" placeholder="Masukkan Jumlah Stok" required>
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

