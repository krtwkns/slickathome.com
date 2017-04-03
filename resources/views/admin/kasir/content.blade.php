	<div class="col-md-8">
		<a class="btn btn-danger btn-md" href="{{ ('hapus/'.$transaction->id) }}">Batalkan Transaksi</a>
		<form id="cariBarang" method="post" action="{{url('kasir/add-item/'.$transaction->id)}}" enctype="multipart/form-data"  class="form-horizontal">
			<br>
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label for="autocomplete" class="control-label">Nama Barang atau Kode Barang</label>
			<div class="form-group">
			<div class="col-md-12" style="margin-bottom: 10px;">
					<input type="text" class="form-control input-lg" id="autocomplete" name="autocomplete" placeholder="Cari nama barang atau kode barang" required>
				</div>
			</div>

			<div class="form-group">
				<label for="kode_barang" class="col-sm-2 control-label">Kode Barang</label>
				<div class="col-md-10">
					<input readonly type="text" class="form-control input-lg" id="kode_barang" name="kode_barang" placeholder="Kode Barang" >
				</div>
			</div>

			<div class="form-group">
				<label for="judul" class="col-sm-2 control-label">Nama Barang</label>
				<div class="col-md-10">
					<input disabled type="text" class="form-control input-lg" id="nama_barang" name="nama_barang" placeholder="Nama Barang" >
				</div>
			</div>

			<div class="form-group">
				<label for="ukuran" class="col-sm-2 control-label">Harga </label>
				<div class="col-md-10">
					<div class="input-group">
	                    <div class="input-group-addon">
	                        <b>Rp.</b>
	                    </div>
					<input disabled type="text" class="form-control input-lg" id="harga" name="harga" ;>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="judul" class="col-sm-2 control-label">Quantity </label>
				<div class="col-md-10">
					<input type="text" class="form-control input-lg" id="sub_jumlah_barang" name="sub_jumlah_barang" placeholder="Contoh : 10" onkeypress="var key = event.keyCode || event.charCode; return ((key  >= 48 && key  <= 57) || key == 8);";>
				</div>
			</div>				
		
			<div class="form-group">
				<label for="judul" class="col-sm-2 control-label">Sub-Total(Rp)</label>
				<div class="col-md-10">
					<div class="input-group">
	                    <div class="input-group-addon">
	                        <b>Rp.</b>
	                    </div>
					<input type="text" class="form-control input-lg" id="sub_jumlah_harga" name="sub_jumlah_harga"onkeypress="var key = event.keyCode || event.charCode; return ((key  >= 48 && key  <= 57) || key == 8);"; readonly>
				</div>
				</div>
			</div>				

			<div class="form-group" style="text-align: right;">
				<div class="col-md-10 col-md-offset-2">
					<button type="submit" class="btn btn-primary btn-md">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i> Tambah
					</button>
				</div>
			</div>
		</form>
	</div>

	<br>
	<br>
	<br>	
	<div class="col-md-4">
		<form id="formKasir" method="post" action="{{url('kasir/submit-transaksi')}}" enctype="multipart/form-data"  class="form-horizontal">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="transaksi_id" value="{{ $transaction->id }}">
			<br>
			<div class="form-group">
				<label for="ukuran" class="col-sm-2 control-label">Total </label>
				<div class="col-md-10">
					<div class="input-group">
	                    <div class="input-group-addon">
	                        <b>Rp.</b>
	                    </div>
					<input readonly type="text" class="form-control input-lg" id="total" name="total" value="{{ $totalHarga }}">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="ukuran" class="col-sm-2 control-label">Bayar </label>
				<div class="col-md-10">
					<div class="input-group">
	                    <div class="input-group-addon">
	                        <b>Rp.</b>
	                    </div>
					<input type="text" class="form-control input-lg" id="bayar" name="bayar" required onkeypress="var key = event.keyCode || event.charCode; return ((key  >= 48 && key  <= 57) || key == 8);";>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="ukuran" class="col-sm-2 control-label">Diskon </label>
				<div class="col-md-10">
					<div class="input-group">
	                    <div class="input-group-addon">
	                        <b>Rp.</b>
	                    </div>
					<input type="text" class="form-control input-lg" id="diskon" name="diskon" onkeypress="var key = event.keyCode || event.charCode; return ((key  >= 48 && key  <= 57) || key == 8);";>
					</div>
				</div>
			</div>			

			<div class="form-group">
				<label for="ukuran" class="col-sm-2 control-label">Kembali </label>
				<div class="col-md-10">
					<div class="input-group">
	                    <div class="input-group-addon">
	                        <b>Rp.</b>
	                    </div>
					<input disabled type="text" class="form-control input-lg" id="kembali" name="kembali" onkeypress="var key = event.keyCode || event.charCode; return ((key  >= 48 && key  <= 57) || key == 8);";>
					</div>
				</div>
			</div>

			<div class="pull-right">
				<div class="col-md-10">
					<button type="submit" class="btn btn-success btn-md">
						<i class="fa fa-shopping-cart" aria-hidden="true"> Selesai</i>
					</button>
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
		  		<?php $number = 1 ?>
		  		@if( ! empty($details))
		  		@forelse($details as $detail)
			    <tr>
			        <td width="5%" style="text-align:center">{{$number}}</td>
			        <td width="10%" style="text-align:center">{{$detail->barang->kode_barang}}</td>
			        <td width="30%">{{$detail->barang->nama_barang}}</td>
			        <td width="20%" style="text-align:right">
			        Rp. {{number_format($detail->barang->harga_jual, 0, ',', '.')}}</td>
			        <td width="10%" style="text-align:right">{{$detail->sub_jumlah_barang}}</td>
			        <td width="20%" style="text-align:right">Rp. {{number_format($detail->sub_jumlah_harga, 0, ',', '.')}}</td>
			        <td width="10%" style="text-align:center" >
			          <a href="{{url('kasir/delete-item/'.$detail->id)}}" class="btn btn-danger btn-xs">
	            		<i class="fa fa-trash"></i> Hapus</a>
			        </td>
			    </tr>
			    <?php $number++ ?>
			     @empty
			        <tr>
			          <td colspan="7"><center>Belum ada barang</center></td>
			        </tr>
			    @endforelse
		  		@else
		  		
			    @endif
		  </tbody>
		</table>
	</div>