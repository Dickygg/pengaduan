<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4 ">

                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <p class="mb-0 text-primary font-weight-bold">Selamat Datang, <?= $user['nama']; ?>!</p>
                        <p><?= date('l-m-Y'); ?></p>
                    </div>
                    <img style="height: 100px" src="<?= base_url('assets/img/undraw_posting_photo.svg') ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-light">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">Jumlah Pengaduan</div>
                            <div class="h1 mb-0 font-weight-bold text-dark"><?=
                                                                            $pengaduanrow
                                                                            ?></div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('user/anggota'); ?>"><i
                                    class="fas fa-archive  fa-3x text-secondary"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="sidebar-divider">
<div class="row">
    <!-- tablee row -->
    <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2" style="height: fit-content;">
        <div class="page-header">
            <span class="fas fa-users text-primary mt-2 "> Data
                User</span>
            <a class="text-danger" href="<?php echo
                                            base_url('user/data_user'); ?>"><i class="fas fa-search mt-2 float-right"> Tampilkan</i></a>
        </div>
        <div class="table-responsive">
            <table class="table mt-3" id="table-datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <!-- <th>Nama</th> -->
                        <th>Isi Laporan</th>
                        <th>Status</th>
                        <th>Tanggal</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pengaduan as $b) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <!-- <td><?= $b['nama']; ?></td> -->
                            <td><?= $b['isi_laporan']; ?></td>
                            <td><?= $b['status']; ?></td>
                            <td><?= date('Y-m-d', strtotime($b['tanggal'])); ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-5 ml-auto mr-auto mt-2">
        <div class="page-header">
            <span class="fas fa-book text-warning mt-2"> info Terkini</span>
            <a href="<?= base_url('buku'); ?>"><i class="fas fa-search text-primary mt-2 float-right"> Tampilkan</i></a>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <img src="<?= base_url('assets/img/huhu.jpg') ?>" class="img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Pemilu Yang diadakan</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>