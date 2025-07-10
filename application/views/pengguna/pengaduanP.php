<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pengaduan</h1>
        <div>
            <a href="" data-toggle="modal" data-target="#printModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
            <a href="" data-toggle="modal" data-target="#excelModal" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Excel</a>

        </div>

    </div>
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary ">DataTables Example</h6>
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#pengaduanBaruModal" class="btn btn-primary btn-sm float-right">Tambah Pengaduan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Nama Pengadu</th>
                            <th>Kategori</th>
                            <th>Isi Laporan</th>
                            <th>Status Laporan</th>
                            <th>Tanggal</th>
                            <th>No.Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pengaduan as $p) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $p['nama']; ?></td>
                                <td><?= $p['kategori']; ?></td>
                                <td><?= $p['isi_laporan']; ?></td>
                                <td><?php if ($p['status'] == 'Terkirim'): ?>

                                        <div class="card bg-primary text-white ">
                                            <p class=" m-2 text-center" style="font-weight: bold;">Terkirim</p>

                                        </div>
                                    <?php elseif ($p['status'] == 'Selesai') : ?>
                                        <div class="card bg-success text-white ">
                                            <p class=" m-2 text-center" style="font-weight: bold;">Selesai</p>

                                        </div>
                                    <?php else : ?>
                                        <div class="card bg-warning text-white ">
                                            <p class=" m-2 text-center" style="font-weight: bold;">Diproses</p>

                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('Y-m-d', strtotime($p['tanggal'])); ?></td>
                                <td><?= $p['no_hp']; ?></td>
                                <!-- <td><img style="width: 100px;" src="<?= base_url('assets/img/uploads/') . $a['gambar']; ?>"></td> -->



                                <td>
                                    <div class="d-flex flex-wrap">
                                        <button type="button"
                                            class="btn btn-primary btn-sm"
                                            data-toggle="modal"
                                            data-target="#editModal"
                                            data-id="<?= $p['id_pengaduan']; ?>"
                                            data-nama="<?= $p['nama']; ?>"
                                            data-status="<?= $p['status']; ?>">
                                            <i class="fas fa-eye"></i> Detail
                                        </button>
                                    </div>
                                </td>



                            </tr>


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

<!-- PDF Modal -->
<div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="printModalLabel">Pilih Data Yang Mau Dicetak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body text-center">
                <div class="d-flex flex-wrap justify-content-center ">
                    <a href="<?= site_url('admin/pengaduan/cetak'); ?>" class="btn btn-primary m-1">Semua Data</a>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- EXCEL MODAL -->
<div class="modal fade" id="excelModal" tabindex="-1" role="dialog" aria-labelledby="excelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="printModalLabel">Pilih Data Yang Mau Dicetak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body text-center">
                <div class="d-flex flex-wrap justify-content-center ">
                    <a href="<?= site_url('admin/pengaduan/cetakexcel'); ?>" class="btn btn-primary m-1">Semua Data</a>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="pengaduanBaruModal" tabindex="-1"
    role="dialog" aria-labelledby="pengaduanBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="kategoriBaruModalLabel">Tambah Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Pengguna/pengaduanP'); ?>" method="post"
                enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <select type="text" class="form-control form-control-user" id="kategori" name="kategori">
                            <option value="">Pilih Kategori</option>
                            <?php
                            foreach ($kategori as $k) { ?>
                                <option value="<?= $k['id_kategori'] ?>"><?= $k['kategori'] ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('kategori', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="isi_laporan" name="isi_laporan"
                            placeholder="Deskripsi laporan">
                        <?= form_error('isi_laporan', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp"
                            placeholder="No Handphone">
                        <?= form_error('no_hp', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="gambar" name="gambar">
                        <?= form_error('gambar', '<small class="text-danger pl-2">', '</small>'); ?>
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
<script>
    $(document).ready(function() {
        <?php if (validation_errors()) : ?>
            $('#pengaduanBaruModal').modal('show');
        <?php endif; ?>
    });
</script>