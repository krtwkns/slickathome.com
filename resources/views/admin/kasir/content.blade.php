<div class="col-md-12">
	<div class="col-md-8">
	<form id="cariBarang" method="post" action="{{url('article/create')}}" enctype="multipart/form-data"  class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label for="judul" class="col-sm-2 control-label">Id Barang</label>
			<div class="col-md-10">
				<input type="text" class="form-control input-lg" id="judul" name="judul" placeholder="Masukkan judul" required>
			</div>
		</div>

		<div class="form-group">
			<label for="judul" class="col-sm-2 control-label">Nama Barang</label>
			<div class="col-md-10">
				<input type="text" class="form-control input-lg" id="judul" name="judul" placeholder="Masukkan judul" required>
			</div>
		</div>

		<div class="form-group">
			<label for="judul" class="col-sm-2 control-label">Harga(Rp)</label>
			<div class="col-md-10">
				<input type="text" class="form-control input-lg" id="judul" name="judul" placeholder="Masukkan judul" required>
			</div>
		</div>		

		<div class="form-group">
			<label for="judul" class="col-sm-2 control-label">Quantity</label>
			<div class="col-md-10">
				<input type="text" class="form-control input-lg" id="judul" name="judul" placeholder="Masukkan judul" required>
			</div>
		</div>				
	
		<div class="form-group">
			<label for="judul" class="col-sm-2 control-label">Sub-Total(Rp)</label>
			<div class="col-md-10">
				<input type="text" class="form-control input-lg" id="judul" name="judul" placeholder="Masukkan judul" required>
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
	<div class="col-md-4">
		
	</div>

</div>

<div class="col-md-12">
	<table>
		<thead>
			<tr>
	      <th>No.</th>
	      <th style="text-align:center">Kode Barang</th>
	      <th >Nama Barang</th>
	      <th>Kategori</th>
	      <th>Ukuran</th>
	      <th style="text-align:center">Action</th>
			</tr>	</thead>
	  <tbody>

	  </tbody>		
	</table>
</div>