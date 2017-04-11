<?php $__env->startSection('htmlheader_title'); ?>
Edit Stok
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
Edit Stok
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
			<form id="editBarang" method="post" action="<?php echo e(url('stok_barang/'.$stok_barang->barang_id.'/edit')); ?>" enctype="multipart/form-data"  class="form-horizontal">
				
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<input type="hidden" name="id" value="<?php echo e($stok_barang->id); ?>">	
				<input type="hidden" name="barang_id" value="<?php echo e($stok_barang->barang_id); ?>">	

				<div class="form-group">
					<label for="barang_id" class="col-sm-2 control-label">Kode Barang</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="barang_id" value="<?php echo e($stok_barang->barang->kode_barang); ?>" name="kode_barang" placeholder="Masukkan Barang" required disabled>
					</div>
				</div>

				<div class="form-group">
					<label for="barang_id" class="col-sm-2 control-label">Nama Barang</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="barang_id" value="<?php echo e($stok_barang->barang->nama_barang); ?>" name="nama_barang" placeholder="Masukkan Barang" required disabled>
					</div>
				</div>

				<div class="form-group">
					<label for="satuan_stok" class="col-sm-2 control-label">Satuan Stok Barang</label>
					<div class="col-md-8">
	                    <select class="form-control" id="kategori" name="satuan_stok" required>
	                        <option value="<?php echo e($stok_barang->satuan_stok); ?>" selected ><?php echo e($stok_barang->satuan_stok); ?></option>
	                    </select>
					</div>
				</div>

				<div class="form-group">
					<label for="jumlah_stok" class="col-sm-2 control-label">Jumlah Stok</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="jumlah_stok" name="jumlah_stok" value="<?php echo e($stok_barang->jumlah_stok); ?>" placeholder="Masukkan Jumlah Stok" required>
					</div>
				</div>

				<div class="form-group text-center">
					<div class="col-md-8 col-md-offset-2">
						<button type="submit" class="btn btn-primary btn-lg">
							Confirm
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('code-footer'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>