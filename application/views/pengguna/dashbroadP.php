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
                                                                            $pengaduan
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