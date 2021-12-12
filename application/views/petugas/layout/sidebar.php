<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url('petugas/'); ?>">Garut</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('petugas/'); ?>">Gr</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?php if ($title == 'Dashboard') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('petugas/'); ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Petugas</li>
            <li class="<?php if ($title == 'Data Petugas') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('datapetugas/'); ?>"><i class="far fa-file-alt"></i> <span>Data Petugas</span></a></li>
        </ul>
    </aside>
</div>