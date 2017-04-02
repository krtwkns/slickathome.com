<?php $__env->startSection('code-header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('htmlheader_title'); ?>
Transaksi
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
Transaksi
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<br>
<!-- include summernote css/js-->
<div class="flash-message" style="margin-left: -16px;margin-right: -16px; margin-top: 13px;">
  <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(Session::has('alert-' . $msg)): ?>
<div class="alert alert-<?php echo e($msg); ?>">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p class="" style="border-radius: 0"><?php echo e(Session::get('alert-' . $msg)); ?></p>
</div>
  <?php echo Session::forget('alert-' . $msg); ?>

  <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div style="overflow: auto">

<div style="margin-bottom: 10px">
  <a href="<?php echo e(url('/transaksi/add-transaksi')); ?>" type="button" class="btn btn-info btn-md" >
    <i class="fa fa-plus-square"></i> Tambah Transaksi</a>
</div>

<br>

</div>
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
  <thead>
    <tr>
      <th>No.</th>
      <th style="text-align:center">Tanggal</th>
      <th style="text-align:center">Total Harga</th>
      <th style="text-align:center">Diskon</th>
      <th style="text-align:center">Laba</th>
      <th style="text-align:center">Ditambahkan oleh</th>
    </tr> </thead>
  <tbody>
   <?php $number = 1 ?>
   <?php $__empty_1 = true; $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
    <tr>
      <td width="5%" style="text-align:center"><?php echo e($number); ?></td>
      <td width="15%" style="text-align:center"><?php echo App\Helpers\GeneralHelper::indonesianDateFormat($t->created_at); ?></td>
      <td width="18%" style="text-align:right">Rp. <?php echo e(number_format($t->total_harga, 0, ',', '.')); ?></td>
      <td width="18%" style="text-align:right">Rp. <?php echo e(number_format($t->diskon, 0, ',', '.')); ?></td>
      <td width="18%" style="text-align:right">Rp. <?php echo e(number_format($t->laba, 0, ',', '.')); ?></td>
      <td width="16%" style="text-align:center"><?php echo e($t->created_by); ?></td>
    </tr>
     <?php $number++ ?>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
          <td colspan="6"><center>Belum ada transaksi</center></td>
        </tr>
    <?php endif; ?>
  </tbody>
</table>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('code-footer'); ?>
<script type="text/javascript">
  $(document).ready(function(){
      $('#myTable').DataTable({
      	destroy: true,
        "ordering": true
      });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>