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
                    }
                }
            });            
        });
    </script>
    <script type="text/javascript">
        $("#harga,#sub_jumlah_barang").keyup(function () {
            $('#sub_jumlah_harga').val($('#harga').val() * $('#sub_jumlah_barang').val());
        });
    </script>
    <script type="text/javascript">
        $("#bayar,#total, #diskon, #kembali").keyup(function () {
            $('#kembali').val($('#bayar').val() - $('#total').val() - $('#diskon').val());
        });
    </script>    
    <script type="text/javascript">
      $(document).ready(function(){
          $('#caseerTable').DataTable({
            destroy: true,
            "ordering": true
          });
        });
    </script>    
@endsection