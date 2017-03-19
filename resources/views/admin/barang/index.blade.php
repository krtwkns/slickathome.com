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
@include('admin.barang.content')
@endsection

@section('code-footer')

<script type="text/javascript">
  $(document).ready(function(){
      $('#myTable').DataTable({
        "ordering": true
      });
      $('[data-toggle="tooltip"]').tooltip();   
  });
</script>


@endsection