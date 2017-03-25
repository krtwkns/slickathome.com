@extends('adminlte::layouts.app')

@section('htmlheader_title')
Edit Barang
@endsection

@section('contentheader_title')
Edit Barang
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
			<form id="editBarang" method="post" action="{{url('barang/'.$barang->kode_barang.'/edit')}}" enctype="multipart/form-data"  class="form-horizontal">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" value="{{ $barang->id }}">
				<div class="form-group">
					<label for="kode_barang" class="col-sm-2 control-label">Kode Barang</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="kode_barang" value="{{$barang->kode_barang}}" name="kode_barang" placeholder="Masukkan Kode Barang" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nama_barang" class="col-sm-2 control-label">Nama Barang</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="nama_barang" value="{{$barang->nama_barang}}" name="nama_barang" placeholder="Masukkan Nama Barang" required>
					</div>
				</div>

				<div class="form-group">
	              <label for="group" class="col-sm-2 form-control-label "> Kategori</label>
	              <div class="col-md-10">
	               <select name="kategori" required>
	                <option {!! ($barang->kategori == 'Light')? 'selected' : '' !!} value="Light">Light</option>
	                <option {!! ($barang->kategori == 'Medium')? 'selected' : '' !!} value="Medium">Medium</option>
	                <option {!! ($barang->kategori == 'Strong')? 'selected' : '' !!} value="Strong">Strong</option>
	                <option {!! ($barang->kategori == 'Heavy')? 'selected' : '' !!} value="Heavy">Heavy</option>
	              </select>
	              </div>
	            </div>

				<div class="form-group">
					<label for="ukuran" class="col-sm-2 control-label">Ukuran</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="ukuran" name="ukuran" value="{{$barang->ukuran}}" placeholder="Masukkan Ukuran" required>
					</div>
				</div>

				<div class="form-group">
					<label for="ukuran" class="col-sm-2 control-label">Harga Modal</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="harga_modal" name="harga_modal" value="{{$barang->harga_modal}}" placeholder="Masukkan Harga Modal" required>
					</div>
				</div>

				<div class="form-group">
					<label for="ukuran" class="col-sm-2 control-label">Harga Jual</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="harga_jual" name="harga_jual" value="{{$barang->harga_jual}}" placeholder="Masukkan Harga Jual" required>
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

