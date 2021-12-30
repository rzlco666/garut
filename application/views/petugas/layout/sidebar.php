<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url('Petugas/'); ?>">Garut</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('Petugas/'); ?>">Gr</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?php if ($title == 'Dashboard') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('Petugas/'); ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Petugas</li>
            <li class="<?php if ($title == 'Data Petugas') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('DataPetugas/'); ?>"><i class="far fa-file-alt"></i> <span>Data Petugas</span></a></li>
            <li class="menu-header">Wisata</li>
            <li class="<?php if ($title == 'Data Wisata') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('DataWisata/'); ?>"><i class="fas fa-map-marker-alt"></i> <span>Data Wisata</span></a></li>
            <li class="<?php if ($title == 'Transaksi Wisata') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('TransaksiWisata/'); ?>"><i class="fas fa-ticket-alt"></i> <span>Transaksi Wisata</span></a></li>
            <li class="menu-header">Event</li>
            <li class="<?php if ($title == 'Data Event') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('DataEvent/'); ?>"><i class="fas fa-map-marker-alt"></i> <span>Data Event</span></a></li>
            <li class="<?php if ($title == 'Transaksi Event') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('TransaksiEvent/'); ?>"><i class="fas fa-ticket-alt"></i> <span>Transaksi Event</span></a></li>
            <li class="menu-header">Wisatawan</li>
            <li class="<?php if ($title == 'Data Wisatawan') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('DataWisatawan/'); ?>"><i class="far fa-user"></i> <span>Data Wisatawan</span></a></li>
        </ul>
    </aside>
</div>