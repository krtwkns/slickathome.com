@extends('adminlte::layouts.app')

@section('htmlheader_title')
Tambah Barang
@endsection

@section('contentheader_title')
Tambah Barang
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
			<form id="tambahBarang" method="post" action="{{url('barang/tambah')}}" enctype="multipart/form-data"  class="form-horizontal">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="kode_barang" class="col-sm-2 control-label">Kode Barang</label>
					<div class="col-md-10">
						<input type="text" class="form-control input-lg" id="kode_barang" name="kode_barang" placeholder="Masukkan Kode Barang" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nama_barang" class="col-sm-2 control-label">Nama Barang</label>
					<div class="col-md-10">
						<input type="text" class="form-control input-lg" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" required>
					</div>
				</div>

				<div class="form-group">
					<label for="kategori" class="col-sm-2 control-label">Kategori</label>
					<div class="col-md-10">
						<input type="text" class="form-control input-lg" id="kategori" name="kategori" placeholder="Masukkan Kategori" required>
					</div>
				</div>

				<div class="form-group">
					<label for="ukuran" class="col-sm-2 control-label">Ukuran</label>
					<div class="col-md-10">
						<input type="text" class="form-control input-lg" id="ukuran" name="ukuran" placeholder="Masukkan Ukuran" required>
					</div>
				</div>

				
				<div class="form-group text-center">
					<div class="col-md-10 col-md-offset-2">
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
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
  <script>
   function sendFile(file,editor,welEditable) {		
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var  data = new FormData();
        data.append("file", file);
        var url = '/api/ajaximage';
        $.ajax({
            data: data,
            type: "POST",
            url: url,
	        cache: false,
	        contentType: false,
	        processData: false,
            success: function(url) {
		      	$('#summernote').summernote('insertImage', url, 'apapun');
            }
        });
	}
    $(document).ready(function() {

        $('#summernote').summernote({

        	minHeight: 300,
        	callbacks: {
			    onImageUpload: function(files, editor, welEditable) {
				    // upload image to server and create imgNode...
		            console.log('hello');
			      	sendFile(files[0],editor,welEditable);
			    }
			}
        });
    });

  </script>
  <!-- jquery script for file-input -->
<script type="text/javascript">
	function readURL(input) {
		 if(input.files[0].size > 2097152){
       		alert("Ukuran file harus dibawah 2MB!");
       		input.value = "";
    	};

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script type="text/javascript">
	var elBrowse  = document.getElementById("gambar");
	elBrowse.addEventListener("change", function() {
		var files  = this.files;
		var errors = "";
		if (!files) {
			errors += "File upload not supported by your browser.";
		}
		if (files && files[0]) 
		{
			for(var i=0; i<files.length; i++) 
			{
				var file = files[i];
				if ( (/\.(png|jpeg|jpg|gif)$/i).test(file.name) ) 
				{
					readImage( file ); 
				} 
				else 
				{
					errors += file.name +" is unsupported Image extension\n";
					document.getElementById("gambar").value = null;  
				}
			}
		}
		if (errors) {
			alert(errors); 
		}
	});
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>	
    @endsection

