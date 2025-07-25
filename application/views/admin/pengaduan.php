<style>
    @media only screen and (max-width: 1430px) {
        #hapusBTN p {
            display: none;
            /* margin-bottom: ; */
        }

        #editBTN p {
            display: none;
        }
    }
</style>


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
                            <th>Gambar</th>
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
                                    <?php elseif ($p['status'] == 'ditolak') : ?>
                                        <div class="card bg-danger text-white ">
                                            <p class=" m-2 text-center" style="font-weight: bold;">Ditolak</p>

                                        </div>
                                    <?php else : ?>
                                        <div class="card bg-warning text-white ">
                                            <p class=" m-2 text-center" style="font-weight: bold;">Diproses</p>

                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('Y-m-d', strtotime($p['tanggal'])); ?></td>
                                <td><?= $p['no_hp']; ?></td>
                                <td><img style="width: 100px;" src="<?= base_url('assets/img/uploads/') . $p['gambar']; ?>"></td>



                                <td>
                                    <div class="row aligin-items-center">
                                        <div class=" col-12" style="margin-bottom: 5px;">
                                            <button id="hapusBTN" type="button"
                                                class="btn btn-danger btn-sm mr-2 d-flex"
                                                data-toggle="modal"
                                                data-target="#hapusModal<?= $p['id_pengaduan']; ?>">
                                                <i class="fas fa-trash-alt"></i>
                                                <p style="margin-bottom: 0;">Hapus</p>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <button id="editBTN" type="button"
                                                class="btn btn-primary btn-sm d-flex"
                                                data-toggle="modal"
                                                data-target="#editModal"
                                                data-id="<?= $p['id_pengaduan']; ?>"
                                                data-nama="<?= $p['nama']; ?>"
                                                data-status="<?= $p['status']; ?>">
                                                <i class="fas fa-edit"></i>
                                                <p style="margin-bottom: 0;">Edit</p>
                                            </button>
                                        </div>
                                    </div>
                                </td>



                            </tr>
                            <!-- Hapus Modal -->
                            <div class="modal fade" id="hapusModal<?= $p['id_pengaduan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                            <a class="btn btn-danger" href="<?php echo site_url('admin/pengaduan/hapus/' . $p['id_pengaduan']); ?>">Hapus</a>
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
<!-- set modal edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= site_url('admin/pengaduan/edit'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- id_user hidden -->
                    <input type="hidden" name="id_pengaduan" id="edit-id-pengaduan">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama" readonly placeholder="Nama tidak tersedia">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="edit-status" class="form-control">
                            <option value="Terkirim">Terkirim</option>
                            <option value="Diproses">Diproses</option>
                            <option value="Selesai">Selesai</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
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
                    <a href="<?= site_url('admin/pengaduan/cetak/selesai'); ?>" class="btn btn-success m-1">Data Selesai</a>
                    <a href="<?= site_url('admin/pengaduan/cetak/Diproses'); ?>" class="btn btn-warning m-1">Data Proses</a>
                    <a href="<?= site_url('admin/pengaduan/cetak/terkirim'); ?>" class="btn btn-secondary m-1">Data Terkirim</a>
                    <a href="<?= site_url('admin/pengaduan/cetak/Ditolak'); ?>" class="btn btn-danger m-1">Data Ditolak</a>

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
                    <a href="<?= site_url('admin/pengaduan/cetakexcel/selesai'); ?>" class="btn btn-success m-1">Data Selesai</a>
                    <a href="<?= site_url('admin/pengaduan/cetakexcel/Diproses'); ?>" class="btn btn-warning m-1">Data Proses</a>
                    <a href="<?= site_url('admin/pengaduan/cetakexcel/terkirim'); ?>" class="btn btn-secondary m-1">Data Terkirim</a>
                    <a href="<?= site_url('admin/pengaduan/cetakexcel/ditolak'); ?>" class="btn btn-danger m-1">Data Ditolak</a>

                </div>
            </div>

        </div>
    </div>
</div>


<!-- script edit -->
<script>
    $(document).on('click', 'button[data-target="#editModal"]', function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var status = $(this).data('status');

        $('#edit-id-pengaduan').val(id);
        $('#edit-nama').prop('readonly', false).val(nama).prop('readonly', true);
        $('#edit-status').val(status);
    });
</script>
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