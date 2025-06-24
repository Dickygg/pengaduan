<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        
    </div>
     <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary ">DataTables Example</h6>
            <!-- <a href="tambahdata.php" class="btn btn-primary"> tambah data</a> -->

        </div>
        <div class="card-body">
    <div class="d-flex flex-column align-items-center">
        <!-- Foto Profil -->
        <img src="<?= base_url('assets/img/uploads/') . $user['gambar']; ?>" 
             class="rounded-circle mb-3 img-fluid" 
             style="width: 120px; height: 120px; object-fit: cover;" 
             alt="foto">

        <!-- Username -->
        <div class="w-100 px-3 mb-2" style="max-width: 400px;">
            <p class="form-control text-center" style="font-weight: bold; font-size:large;"><?=$user['nama']?></p>
        </div>

        <!-- Email -->
        <div class="w-100 px-3 mb-2" style="max-width: 400px;">
            <p class="form-control text-center"style="font-weight: bold; font-size:large;"><?=$user['email']?></p>
        </div>

        <!-- Tombol Edit atau Logout (opsional) -->
        <div class="w-100 px-3" style="max-width: 300px;">
            <a href="<?= base_url('admin/profile/editprofile'); ?>" class="btn btn-primary btn-block mb-2">Edit Profile</a>
        </div>
    </div>
</div>
</div>
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

