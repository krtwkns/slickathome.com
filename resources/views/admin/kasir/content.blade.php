<br>
	<div class="col-md-8">
		<form id="cariBarang" method="post" action="{{url('article/create')}}" enctype="multipart/form-data"  class="form-horizontal">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label for="autocomplete" class="control-label">Nama Barang atau Kode Barang</label>
			<div class="form-group">
				<div class="col-md-10">
					<input type="text" class="form-control input-lg" id="autocomplete" name="autocomplete" placeholder="Cari nama barang atau kode barang" required>
				</div>
				<div class="col-md-2">				
					<button type="submit" class="btn btn-primary btn-lg">
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
				</div>
			</div>

			<div class="form-group">
				<label for="kodeBarang" class="col-sm-2 control-label">Kode Barang</label>
				<div class="col-md-10">
					<input type="text" class="form-control input-lg" id="kodeBarang" name="kodeBarang" placeholder="Kode Barang" disabled>
				</div>
			</div>

			<div class="form-group">
				<label for="judul" class="col-sm-2 control-label">Nama Barang</label>
				<div class="col-md-10">
					<input type="text" class="form-control input-lg" id="namaBarang" name="namaBarang" placeholder="Nama Barang" disabled>
				</div>
			</div>

			<div class="form-group">
				<label for="judul" class="col-sm-2 control-label">Harga(Rp)</label>
				<div class="col-md-10">
					<input type="text" class="form-control input-lg" id="harga" name="harga" placeholder="Harga Satuan (Rupiah)" disabled>
				</div>
			</div>		

			<div class="form-group">
				<label for="judul" class="col-sm-2 control-label">Quantity</label>
				<div class="col-md-10">
					<input type="text"  class="form-control input-lg" id="quantity" name="quantity" placeholder="Masukkan jumlah barang" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
				</div>
			</div>				
		
			<div class="form-group">
				<label for="judul" class="col-sm-2 control-label">Sub-Total(Rp)</label>
				<div class="col-md-10">
					<input type="text" class="form-control input-lg" id="subTotal" name="subTotal" placeholder="Sub Total Harga (Rupiah)" disabled>
				</div>
			</div>				

			<div class="form-group" style="text-align: right;">
				<div class="col-md-10 col-md-offset-2">
					<button type="submit" class="btn btn-primary btn-lg">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i> Tambah
					</button>
				</div>
			</div>
		</form>
	</div>

	<div class="col-md-4">
		<form id="formKasir" method="post" action="{{url('article/create')}}" enctype="multipart/form-data"  class="form-horizontal">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			<label for="total" class="control-label">Total(Rp)</label>
			<div class="form-group">
				<div class="col-md-10">
					<input type="text"  class="form-control input-lg" id="total" name="total" placeholder="Total harga (Rupiah)" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' disabled>
				</div>
			</div>

			<label for="bayar" class="control-label">Bayar(Rp)</label>
			<div class="form-group">
				<div class="col-md-10">
					<input type="text"  class="form-control input-lg" id="bayar" name="bayar" placeholder="Jumlah pembayaran (Rupiah)" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
				</div>
			</div>

			<label for="total" class="control-label">Kembali(Rp)</label>
			<div class="form-group">
				<div class="col-md-10">
					<input type="text"  class="form-control input-lg" id="kembali" name="kembali" placeholder="Jumlah kembali (Rupiah)" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' disabled>
				</div>
			</div>

		</form>
	</div>

<br>
	<div>
		<table id="caseerTable" class="table table-striped table-bordered" cellspacing="0">
			<thead>
				<tr>
			      <th>No</th>
			      <th style="text-align:center">Kode Barang</th>
			      <th>Nama Barang</th>
			      <th>Harga</th>
			      <th>Quantity</th>
			      <th>Sub Total</th>
			      <th>Aksi</th>
				</tr>	
			</thead>
		  	<tbody>
			    <tr>
			      	<td>1</td>
			      	<td>ACD001</td>
			      	<td>Pomade</td>
			      	<td>180000</td>
			      	<td>2</td>
			      	<td>100000</td>
					<td>Clear</td>			      
			    </tr>
		  </tbody>
		</table>
	</div>
	



