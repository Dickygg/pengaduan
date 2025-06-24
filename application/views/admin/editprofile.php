
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>

    <div class="row">
        <div class="col-lg-6">

            <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/profile/editprofile'); ?>">
                <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>" class="form-control" required>
                <input type="hidden" name="gambarlama" value="<?= $user['gambar'] ?>" class="form-control" required>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="nama" value="<?= $user['nama'] ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Foto Profile</label><br>
                    <img src="<?= base_url('assets/img/uploads/') . $user['gambar']; ?>" width="100" class="mb-2 rounded-circle">
                    <input type="file" name="gambar" class="form-control-file">
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="<?=base_url('admin/profile')?>" class="btn btn-secondary">Batal</a>

            </form>

        </div>
    </div>
</div>