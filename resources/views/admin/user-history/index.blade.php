@extends('adminlte::layouts.app')

@section('code-header')


@endsection

@section('htmlheader_title')
User History 
@endsection

@section('contentheader_title')
User History
@endsection

@section('main-content')

  @include('admin.user-history.content')
  
@endsection
@section('code-footer')
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<script type="text/javascript">
  $(document).ready(function(){
      $('#myTable').DataTable({
        "ordering": true
      });
      $('[data-toggle="tooltip"]').tooltip();   
  });
</script>


@endsection