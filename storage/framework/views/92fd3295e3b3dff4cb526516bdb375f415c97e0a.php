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
<div style="margin-bottom: 10px">
  <a href="<?php echo e(url('barang/tambah')); ?>" type="button" class="btn btn-info btn-md" >
    <i class="fa fa-plus-square"></i> Tambah Barang</a>
</div>
<div style="overflow: auto">
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
  <thead>
    <tr>
      <th>No.</th>
      <th style="text-align:center">Kode Barang</th>
      <th style="text-align:center">Nama Barang</th>
      <th style="text-align:center">Kategori</th>
      <th style="text-align:center">Ukuran</th>
      <th style="text-align:center">Harga Modal</th>
      <th style="text-align:center">Harga Jual</th>
      <th style="text-align:center">Action</th>
    </tr> </thead>
  <tbody>
   <?php $number = 1 ?>
   <?php $__empty_1 = true; $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
    <tr>
      <td width="5%" style="text-align:center"><?php echo e($number); ?></td>
      <td width="10%" style="text-align:center"><?php echo e($b->kode_barang); ?></td>
      <td width="30%"><?php echo e($b->nama_barang); ?></td>
      <td width="10%" style="text-align:center"><?php echo e($b->kategori); ?></td>
      <td width="10%" style="text-align:center"><?php echo e($b->ukuran); ?></td>
      <td width="10%" style="text-align:right">Rp. <?php echo e(number_format($b->harga_modal, 0, ',', '.')); ?></td>
      <td width="10%" style="text-align:right">Rp. <?php echo e(number_format($b->harga_jual, 0, ',', '.')); ?></td>
      <td style="text-align:center" ><a onclick="return confirm('Anda yakin untuk menghapus barang ini?');" href="<?php echo e(url('barang/'.$b->id.'/hapus/')); ?>" class="btn btn-danger btn-xs">
        <i class="fa fa-trash-o"></i> Hapus</a>
        <a href="<?php echo e(url('barang/'.$b->kode_barang.'/edit/')); ?>" class="btn btn-warning btn-xs">
        <i class="fa fa-pencil-square-o"></i> Edit</a>
        </td>
    </tr>
     <?php $number++ ?>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
          <td colspan="8"><center>Belum ada barang</center></td>
        </tr>
    <?php endif; ?>
  </tbody>
</table>
</div>