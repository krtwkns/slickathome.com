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
                    }
                }
            });            
        });
    </script>
    <script type="text/javascript">
        $("#harga,#sub_jumlah_barang").keyup(function () {
            $('#sub_jumlah_harga').val($('#harga').val() * $('#sub_jumlah_barang').val());
        });
    </script>
    <script type="text/javascript">
        $("#bayar,#total, #diskon, #kembali").keyup(function () {
            $('#kembali').val($('#bayar').val() - ($('#total').val() - $('#diskon').val()) );
        });
    </script>    
    <script type="text/javascript">
      $(document).ready(function(){
          $('#caseerTable').DataTable({
            destroy: true,
            "ordering": true
          });
        });
    </script>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>