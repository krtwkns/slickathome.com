<?php $__env->startSection('htmlheader_title'); ?>
Edit Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
Edit Barang
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
			<form id="editBarang" method="post" action="<?php echo e(url('barang/'.$barang->kode_barang.'/edit')); ?>" enctype="multipart/form-data"  class="form-horizontal">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<input type="hidden" name="id" value="<?php echo e($barang->id); ?>">
				<div class="form-group">
					<label for="kode_barang" class="col-sm-2 control-label">Kode Barang</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="kode_barang" value="<?php echo e($barang->kode_barang); ?>" name="kode_barang" placeholder="Masukkan Kode Barang" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nama_barang" class="col-sm-2 control-label">Nama Barang</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="nama_barang" value="<?php echo e($barang->nama_barang); ?>" name="nama_barang" placeholder="Masukkan Nama Barang" required>
					</div>
				</div>

				<div class="form-group">
	              <label for="group" class="col-sm-2 form-control-label "> Kategori</label>
	              <div class="col-md-10">
	               <select name="kategori" required>
	                <option <?php echo ($barang->kategori == 'Light')? 'selected' : ''; ?> value="Light">Light</option>
	                <option <?php echo ($barang->kategori == 'Medium')? 'selected' : ''; ?> value="Medium">Medium</option>
	                <option <?php echo ($barang->kategori == 'Strong')? 'selected' : ''; ?> value="Strong">Strong</option>
	                <option <?php echo ($barang->kategori == 'Heavy')? 'selected' : ''; ?> value="Heavy">Heavy</option>
	              </select>
	              </div>
	            </div>

				<div class="form-group">
					<label for="ukuran" class="col-sm-2 control-label">Ukuran</label>
					<div class="col-md-8">
						<input type="text" class="form-control input-lg" id="ukuran" name="ukuran" value="<?php echo e($barang->ukuran); ?>" placeholder="Masukkan Ukuran" required>
					</div>
				</div>

				<div class="form-group">
					<label for="ukuran" class="col-sm-2 control-label">Harga Modal</label>
					<div class="col-md-8">
						<div class="input-group">
                           <div class="input-group-addon">
                                <b>Rp.</b>
                            </div>
						<input type="text" class="form-control input-lg" id="harga_modal" name="harga_modal" value="<?php echo e($barang->harga_modal); ?>" placeholder="Contoh : 10000" required onkeypress="var key = event.keyCode || event.charCode; return ((key  >= 48 && key  <= 57) || key == 8);";>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="ukuran" class="col-sm-2 control-label">Harga Jual</label>
					<div class="col-md-8">
						<div class="input-group">
                       		<div class="input-group-addon">
                                <b>Rp.</b>
                            </div>                   
						<input type="text" class="form-control input-lg" id="harga_jual" name="harga_jual" value="<?php echo e($barang->harga_jual); ?>" placeholder="COntoh : 15000" required onkeypress="var key = event.keyCode || event.charCode; return ((key  >= 48 && key  <= 57) || key == 8);";>
					</div>
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