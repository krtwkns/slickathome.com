@extends('adminlte::layouts.app')

@section('code-header')


@endsection

@section('htmlheader_title')
Kasir
@endsection

@section('contentheader_title')
Kasir
@endsection

@section('main-content')
	@foreach($barang as $barang)	
		@include('admin.kasir.content')
	@endforeach
@endsection
@section('code-footer')
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 


@endsection