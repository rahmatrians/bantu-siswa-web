<div class="container mt-5">
    <div class="row">
        <!-- Flasher -->
    </div>


    <div class="row mb-3">
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">Tambah</button>
        </div>
    </div>

    <?php var_dump(form_error('nim')); ?>

    <div class="row mb-4">
        <div class="col-6">
            <form action="<?= base_url(); ?>/mahasiswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Nama Mahasiswa.." aria-label="Nama Mahasiswa.." aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" name="cari" id="cari" class="input-group-text">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>

            <ul class="list-group">

                <?php foreach ($mahasiswa as $mhs) {
                ?>

                    <li class="list-group-item">
                        <?= $mhs['nama']; ?>
                        <div class="float-right">
                            <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-pill badge-info ml-2">detail</a>
                            <a href="<?= base_url(); ?>mahasiswa/getubah/<?= $mhs['id']; ?>" class="badge badge-pill badge-success ml-2 tampilModalUbah" data-toggle="modal" data-id="<?= $mhs['id']; ?>" data-target="#formModal">ubah</a>
                            <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-pill badge-danger ml-2" onclick="return confirm('kamu yakin?');">hapus</a>
                        </div>
                    </li>

                <?php
                } ?>

            </ul>

        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(); ?>/mahasiswa/tambah" method="POST">

                    <div class="">
                        <input type="hidden" name="id" id="id">
                    </div>

                    <div class="col-sm-12 my-1 mb-3">
                        <label class="sr-only" for="nama">Nama</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Nama</div>
                            </div>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                    </div>

                    <div class="col-sm-12 my-1 mb-3">
                        <label class="sr-only" for="nim">Nim</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Nim</div>
                            </div>
                            <input type="number" class="form-control" name="nim" id="nim">
                        </div>
                    </div>

                    <div class="col-sm-12 my-1 mb-3">
                        <label class="sr-only" for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">email</div>
                            </div>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                    </div>

                    <div class="col-sm-12 my-1 mb-3">
                        <label class="sr-only" for="jurusan">jurusan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="jurusan">Jurusan</label>
                            </div>
                            <select class="custom-select" id="jurusan" name="jurusan" required>
                                <option value="">- Pilih Jurusan -</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Desain Produk">Desain Produk</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>