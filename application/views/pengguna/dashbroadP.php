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