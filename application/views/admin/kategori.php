


<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar kategori</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>

    </div>
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary ">DataTables Example</h6>
            <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#bukuBaruModal"><i class="fas fa-filealt"></i> Buku Baru</a> -->
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#kategoriBaruModal" class="btn btn-primary btn-sm float-right">Tambah data</a>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Nama Pengadu</th>
                            <th>Aksi</th>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($kategori as $k) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $k['kategori']; ?></td>
                                <td>
                                    <div class="d-flex flex-wrap">
                                        <a href="#"
                                            class="btn btn-danger btn-sm mr-2"
                                            data-toggle="modal"
                                            data-target="#hapusModal<?= $k['id_kategori']; ?>">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </a>
                                    </div>
                                </td>



                            </tr>
                            <!-- Hapus Modal -->
                            <div class="modal fade" id="hapusModal<?= $k['id_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Siap Untuk Menghapus?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Apaa Anda Yakin Untuk Menghapus?.</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-danger" href="<?php echo site_url('admin/kategori/hapusdata/' . $k['id_kategori']); ?>">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- set flash data suscces -->
<div class="modal fade" id="flashSuccessModal" tabindex="-1" role="dialog" aria-labelledby="flashSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-success text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="flashSuccessModalLabel">Berhasil!</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->session->flashdata('success'); ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Flashdata Error -->
<div class="modal fade" id="flashErrorModal" tabindex="-1" role="dialog" aria-labelledby="flashErrorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-danger text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="flashErrorModalLabel">Gagal!</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->session->flashdata('error'); ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah kategori baru-->
<div class="modal fade" id="kategoriBaruModal" tabindex="-1"
    role="dialog" aria-labelledby="kategoriBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="kategoriBaruModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/kategori'); ?>" method="post"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kategori" name="kategori"
                            placeholder="Masukkan Kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div> 
<script>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('success')) : ?>
            $('#flashSuccessModal').modal('show');
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')) : ?>
            $('#flashErrorModal').modal('show');
        <?php endif; ?>
    });
</script>
<script>
    setTimeout(function() {
        $('.modal').modal('hide');
    }, 3000);
</script>