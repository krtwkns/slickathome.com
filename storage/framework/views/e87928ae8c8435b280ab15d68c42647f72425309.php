<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <?php if(! Auth::guest()): ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo e(Gravatar::get($user->email)); ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo e(Auth::user()->name); ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('adminlte_lang::message.online')); ?></a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">            
            <li
            <?php if($page == 'dashboard'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url('home')); ?>"><i class='fa fa-home'></i> <span>Dashboard</span></a>
            </li>
            
<!--             <li
            <?php if($page == 'kasir'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url('transaksi/add-transaksi')); ?>"><i class='fa fa-money'></i> <span>Kasir</span></a>
            </li> -->

            <li
            <?php if($page == 'barang'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url('barang')); ?>"><i class='fa fa-archive'></i> <span>Barang</span></a>
            </li>

            <li
            <?php if($page == 'stok_barang'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url('stok_barang')); ?>"><i class='fa fa-archive'></i> <span>Stok Barang</span></a>
            </li>

            <li
            <?php if($page == 'transaksi'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url('transaksi')); ?>"><i class="fa fa-calculator" aria-hidden="true"></i>Transaksi</a>
            </li>

            <li
            <?php if($page == 'user-history'): ?>
            <?php echo 'class="active"'; ?>

            <?php endif; ?>
            >
                <a href="<?php echo e(url ('user-history')); ?>"><i class="fa fa-users" aria-hidden="true"></i>User History</a>
            </li>            
        </ul><!-- /.sidebar-menu
    </section>
    <!-- /.sidebar -->
</aside>
