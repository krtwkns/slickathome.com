<?php $__env->startSection('code-header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('htmlheader_title'); ?>
Kasir
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
Kasir
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
	
	<?php echo $__env->make('admin.kasir.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('code-footer'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#autocomplete').autocomplete({                
                source:'<?php echo URL::route('autocomplete'); ?>',
                // source:"<?php echo e(URL::to('autocomplete')); ?>",
                minlength:2,
                autoFocus:true,                 
                select: function (event, ui) {
                var item = ui.item;
                    if(item) {
                        $("#kode_barang").val(item.kode_barang);
                        $("#nama_barang").val(item.nama_barang);
                        $("#harga").val(item.harga);
                        var quantity = $('#quantity').val();
                        $("#subTotal").val(quantity);
                    }
                }

            });            
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>