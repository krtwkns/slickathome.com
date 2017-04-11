@extends('adminlte::layouts.app')

@section('code-header')


@endsection

@section('htmlheader_title')
Stok Barang 
@endsection

@section('contentheader_title')
Stok Barang
@endsection

@section('main-content')

@include('admin.stok_barang.content')
  
@endsection

@section('code-footer')
<script type="text/javascript">
  $(document).ready(function(){
      $('#myTable').DataTable({
      	destroy: true,
        "ordering": true
      });
    });
</script>
@endsection