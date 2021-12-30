<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Diecast</h2>

            <form action="/diecast/save" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="produk" class="col-sm-2 col-form-label">Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('produk')) ? 'is-invalid' : ''; ?>" id="produk" name="produk" autofocus value=" <?= old('produk'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('produk'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value=" <?= old('nama'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kategori" name="kategori" value=" <?= old('kategori'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sampul" name="sampul" value=" <?= old('sampul'); ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>