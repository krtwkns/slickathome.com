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
	
	@include('admin.kasir.content')
	
@endsection

@section('code-footer')
    <script type="text/javascript">
        
       	$(document).ready(function () {
            $('#autocomplete').autocomplete({
              	source:'{!!url('autocomplete')!!}',
              	// source:"{{ URL::to('autocomplete')}}",
              	minlength:2,
              	autoFocus:true,                 
                select: function (event, ui) {
                var item = ui.item;
                    if(item) {
                        $("#kodeBarang").val(item.kode_barang);
                        $("#namaBarang").val(item.nama_barang);
                    }
                }
            });            
        });
    </script>
@endsection