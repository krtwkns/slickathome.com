<?php $__env->startSection('htmlheader_title'); ?>
View Detail Transaksi
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
View Detail Transaksi
<?php $__env->stopSection(); ?>

<?php $__env->startSection('code-header'); ?>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
<link rel="stylesheet" href="<?php echo e(asset('/css/dropzone.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.form-group label{
		text-align: left !important;
	}
</style>

	<?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if(Session::has('alert-' . $msg)): ?>
<div class="alert alert-<?php echo e($msg); ?>">
	<p class="" style="border-radius: 0"><?php echo e(Session::get('alert-' . $msg)); ?></p>
</div>
	<?php echo Session::forget('alert-' . $msg); ?>

	<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<div class="row">
	<div class="col-md-12">
		<div class="">

			<?php if(count($errors) > 0): ?>
			<div class="alert alert-danger">
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>
			<br>
			<form id="view-detail" method="" action="" enctype="multipart/form-data"  class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		
				<div class="form-group">
					<label for="diskon" class="col-sm-2 control-label">Diskon</label>
					<div class="col-md-8">
						<input disabled type="text" class="form-control input-lg" id="diskon" value="<?php echo e($transaksi->diskon); ?>" name="diskon" >
					</div>
				</div>

				<div class="form-group">
					<label for="nama_barang" class="col-sm-2 control-label">Total Harga</label>
					<div class="col-md-8">
						<input disabled type="text" class="form-control input-lg" id="nama_barang" value="<?php echo e($transaksi->total_harga); ?>" name="nama_barang"  >
					</div>
				</div>

				<div class="form-group">
					<label for="nama_barang" class="col-sm-2 control-label">Laba</label>
					<div class="col-md-8">
						<input disabled type="text" class="form-control input-lg" id="laba" value="<?php echo e($transaksi->laba); ?>" name="laba"  >
					</div>
				</div>				

				<div class="form-group">
					<label for="created_at" class="col-sm-2 control-label">Waktu Transaksi</label>
					<div class="col-md-8">
						<input disabled type="text" class="form-control input-lg" id="created_at" name="created_at" value="<?php echo App\Helpers\GeneralHelper::indonesianDateFormat($transaksi->created_at); ?>" >
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-8 col-md-offset-9">
						<a href="<?php echo e(url('/transaksi')); ?>" type="button" class="btn btn-info btn-md">Finish</a>
					</div>
				</div>

				<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
				  <thead>
				  	<tr>
				  	  <td colspan="5"><center>Detail Transaksi</center></td>
				  	</tr>
				    <tr>
				      <th style="text-align:center">No.</th>
				      <th style="text-align:center">Nama Barang</th>
				      <th style="text-align:center">Jumlah</th>
				      <th style="text-align:center">sub-Harga</th>
				    </tr>
				    </thead> 
				    <tbody>
				   <?php $number = 1 ?>
				   <?php $__empty_1 = true; $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
				    <tr>
				    	<td width="5%" style="text-align:center"><?php echo e($number); ?></td>
				    	<td width="25%" style="text-align:center">$i->nama_barang</td>
				    	<td width="25%" style="text-align:center"><?php echo e($i->sub_jumlah_barang); ?></td>
				    	<td width="25%" style="text-align:center">Rp. <?php echo e(number_format($i->sub_jumlah_harga, 0, ',', '.')); ?></td>
				    </tr>
				     <?php $number++ ?>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				    <tr>
			        	<td colspan="5"><center>Tidak Ada Item</center></td>
			        </tr>
				    <?php endif; ?>
				  </tbody>
				</table>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('code-footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>