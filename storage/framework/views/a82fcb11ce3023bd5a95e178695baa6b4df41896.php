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
<table id="historyTable" class="table table-striped table-bordered" cellspacing="0">
	<thead>
		<tr>
      <th>No.</th>
      <th>Nama User</th>
      <th>Waktu Login</th>
		</tr>	
  </thead>
  <tbody>
    <?php 
      $number = 0 ;
     ?>

    <?php $__empty_1 = true; $__currentLoopData = $users_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 

    <?php 
      $number ++ ;
     ?>
    <tr>
      <td><?php echo e($number); ?></td>
      <td><?php echo e($user_history->username['name']); ?></td>
      <td><?php echo e($user_history->timestamp_history); ?></td>
    </tr>
     <?php $number++ ?>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
          <td colspan="5"><center>Belum ada user history</center></td>
        </tr>
    <?php endif; ?>
  </tbody>
</table>
</div>


