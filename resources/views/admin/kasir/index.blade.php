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
                source:'{!!URL::route('autocomplete')!!}',
                // source:"{{ URL::to('autocomplete')}}",
                minlength:2,
                autoFocus:true,                 
                select: function (event, ui) {
                var item = ui.item;
                    if(item) {
                        $("#kode_barang").val(item.kode_barang);
                        $("#nama_barang").val(item.nama_barang);
                        $("#harga").val(item.harga);
                        var quantity = $('#quantity').val();
                        $("#subTotal").val(quantity);
                    }
                }

            });            
        });
    </script>
@endsection