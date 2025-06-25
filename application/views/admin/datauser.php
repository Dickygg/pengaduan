<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Tugas</h1>
        <a href="<?=base_url('admin/user/cetak')?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>

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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Member Sejak</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($anggota as $a) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $a['nama']; ?></td>
                                <td><?= $a['email']; ?></td>
                                <td><?= $a['role']; ?></td>
                                <td><?= date('Y-m-d', strtotime($a['created_at'])); ?></td>
                                <td><img style="width: 100px;" src="<?= base_url('assets/img/uploads/') . $a['gambar']; ?>"></td>



                                <td>
                                    <div class="d-flex flex-wrap">
                                        <a href="#"
                                            class="btn btn-danger btn-sm mr-2"
                                            data-toggle="modal"
                                            data-target="#hapusModal<?= $a['id_user']; ?>">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </a>
                                        <button type="button"
                                            class="btn btn-primary btn-sm"
                                            data-toggle="modal"
                                            data-target="#editModal"
                                            data-id="<?= $a['id_user']; ?>"
                                            data-nama="<?= $a['nama']; ?>"
                                            data-role="<?= $a['role']; ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                    </div>
                                </td>



                            </tr>
                            <!-- Hapus Modal -->
                            <div class="modal fade" id="hapusModal<?= $a['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                            <a class="btn btn-danger" href="<?php echo site_url('admin/user/deletuser/' . $a['id_user']); ?>">Hapus</a>
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
<!-- modal edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= site_url('admin/user/update'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- id_user hidden -->
                    <input type="hidden" name="id_user" id="edit-id-user">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama" readonly placeholder="Nama tidak tersedia">
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" id="edit-role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="pengguna">Pengguna</option>
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

<!-- Modal Flashdata Success -->
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
<!-- script edit -->
<script>
    $(document).on('click', 'button[data-target="#editModal"]', function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var role = $(this).data('role');

        $('#edit-id-user').val(id);
        $('#edit-nama').prop('readonly', false).val(nama).prop('readonly', true);
        $('#edit-role').val(role);
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