<?php $__env->startSection('code-header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('htmlheader_title'); ?>
User History 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
User History
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

  <?php echo $__env->make('admin.user-history.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('code-footer'); ?>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<script type="text/javascript">
  $(document).ready(function(){
      $('#historyTable').DataTable({
      	destroy: true,
        "ordering": true
      });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>