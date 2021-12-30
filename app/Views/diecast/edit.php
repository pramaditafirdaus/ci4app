<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Edit Data Diecast</h2>

            <form action="/diecast/update/<?= $diecast['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $diecast['slug']; ?>">
                <div class="row mb-3">
                    <label for="produk" class="col-sm-2 col-form-label">Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('produk')) ? 'is-invalid' : ''; ?>" id="produk" name="produk" autofocus value=" <?= (old('produk')) ?
                                                                                                                                                                                old('produk') : $diecast['produk']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('produk'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= (old('nama')) ?
                                                                                                    old('nama') : $diecast['nama']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kategori" name="kategori" value="<?= (old('kategori')) ?
                                                                                                            old('kategori') : $diecast['kategori']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sampul" name="sampul" value="<?= (old('sampul')) ?
                                                                                                        old('sampul') : $diecast['sampul']; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>