	<div class="col-md-8">
		<?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<a class="btn btn-danger btn-md" href="<?php echo e(('hapus/'.$transaction->id)); ?>">Batalkan Transaksi</a>
		<form id="cariBarang" method="post" action="<?php echo e(url('kasir/add-item/'.$transaction->id)); ?>" enctype="multipart/form-data"  class="form-horizontal">
			<br>
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
			<label for="autocomplete" class="control-label">Nama Barang atau Kode Barang</label>
			<div class="form-group">
			<div class="col-md-12" style="margin-bottom: 10px;">
					<input type="text" class="form-control input-lg" id="autocomplete" name="autocomplete" placeholder="Cari nama barang atau kode barang" required>
				</div>
			</div>

			<div class="form-group">
				<label for="kode_barang" class="col-sm-2 control-label">Kode Barang</label>
				<div class="col-md-10">
					<input disabled type="text" class="form-control input-lg" id="kode_barang" name="kode_barang" placeholder="Kode Barang" >
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
					<input type="text" class="form-control input-lg" id="sub_jumlah_barang" name="sub_jumlah_barang" placeholder="Contoh : 10000" required onkeypress="var key = event.keyCode || event.charCode; return ((key  >= 48 && key  <= 57) || key == 8);";>
				</div>
			</div>				
		
			<div class="form-group">
				<label for="judul" class="col-sm-2 control-label">Sub-Total(Rp)</label>
				<div class="col-md-10">
					<input type="text" class="form-control input-lg" id="sub_jumlah_harga" name="sub_jumlah_harga" placeholder="Sub Total Harga (Rupiah)">
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
		<form id="formKasir" method="post" action="<?php echo e(url('article/create')); ?>" enctype="multipart/form-data"  class="form-horizontal">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
			<br>
			<div class="form-group">
				<label for="ukuran" class="col-sm-2 control-label">Total </label>
				<div class="col-md-10">
					<div class="input-group">
	                    <div class="input-group-addon">
	                        <b>Rp.</b>
	                    </div>
					<input disabled type="text" class="form-control input-lg" id="total" name="total" ;>
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
					<input type="text" class="form-control input-lg" id="bayar" name="bayar" required>
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
					<input type="text" class="form-control input-lg" id="bayar" name="bayar" required>
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
					<input disabled type="text" class="form-control input-lg" id="kembali" name="kembali" ;>
					</div>
				</div>
			</div>

			<div class="pull-right">
				<div class="col-md-10">
					<button type="submit" class="btn btn-success btn-md">
						<i class="fa fa-shopping-cart" aria-hidden="true"> SELESAI</i>
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
		  		<?php if( ! empty($item)): ?>
		  		<?php $__empty_1 = true; $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			    <tr>
			        <td width="5%" style="text-align:center"><?php echo e($number); ?></td>
			        <td width="10%" style="text-align:center"><?php echo e($d->kode_barang); ?></td>
			        <td width="30%">nama_barang</td>
			        <td width="10%" style="text-align:right">harga_jual</td>
			        <td width="10%" style="text-align:right">quantity here</td>
			        <td width="10%" style="text-align:right">sub-total</td>
			        <td style="text-align:center" >
			          <i class="fa fa-trash-o btn btn-sml btn-danger"> Hapus</i>
			        </td>
			    </tr>
			    <?php $number++ ?>
			     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			        <tr>
			          <td colspan="7"><center>Belum ada barang</center></td>
			        </tr>
			    <?php endif; ?>
		  		<?php else: ?>
		  		
			    <?php endif; ?>
		  </tbody>
		</table>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	
