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
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
  <thead>
    <tr>
      <th>No.</th>
      <th style="text-align:center">Kode Barang</th>      
      <th style="text-align:center">Nama Barang</th>
      <th style="text-align:center">Jumlah Stok</th>
      <th style="text-align:center">Action</th>
    </tr> </thead>
  <tbody>
   <?php $__empty_1 = true; $__currentLoopData = $stok_barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $sb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
    <tr>
      <td><?php echo e($i+1); ?></td>
      <td width="28%" style="text-align:center"><?php echo e($sb->barang->kode_barang); ?></td>
      <td width="28%" style="text-align:center"><?php echo e($sb->barang->nama_barang); ?></td>      
      <td width="28%" style="text-align:center"><?php echo e($sb->jumlah_stok); ?> <?php echo e($sb->satuan_stok); ?></td>
      <td style="text-align:center" >
        <div class="col-md-12">
          <a style="width: 70px ; margin-bottom: 5px;" onclick="return confirm('Anda yakin untuk menghapus barang ini?');" href="<?php echo e(url('stok_barang/'.$sb->id.'/hapus/')); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus
          </a>            
        </div>
        
        <div class="col-md-12">
          <a style="width: 70px; margin-top: 5px;" href="<?php echo e(url('stok_barang/'.$sb->id.'/edit/')); ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Edit
          </a>            
        </div>
      </td>          
    </tr>
     
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
          <td colspan="6"><center>Belum ada barang</center></td>
        </tr>
    <?php endif; ?>
  </tbody>
</table>
</div>