<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-8">
            <h4>Form Tambah Lelang Ikan</h4>
            <hr>
            <form action="<?php echo base_url('product/process'); ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Ikan...">

                </div>
                <div class="input-group mb-3">
                    <label for="">Kategori : </label>
                    <select name="id_category">
                        <?php foreach ($product as $l) { ?>
                            <option value="<?php echo $l['id_category']; ?>"><?php echo $l['category_name']; ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Jenis</label>
                    <textarea name="type" class="form-control" placeholder="Jenis Ikan..."></textarea>
                </div>
                <div class="form-group">
                    <label for="">Size</label>
                    <textarea name="size" class="form-control" placeholder="Ukuran Ikan..."></textarea>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" placeholder="Deskripsi..."></textarea>
                </div>
                <div class="form-group">
                    <label for="">OB</label>
                    <textarea name="ob" class="form-control" placeholder="Open Bid..."></textarea>
                </div>
                <div class="form-group">
                    <label for="">Increse</label>
                    <textarea name="inc" class="form-control" placeholder="Close Bid..."></textarea>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">

                            <label class="custom-file-label" for="image"></label>

                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>