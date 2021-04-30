<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <?php
    if (!empty(session()->getFlashdata('success'))) { ?>

        <div class="alert alert-success">
            <?php echo session()->getFlashdata('success'); ?>
        </div>

    <?php } ?>
    <?php if (!empty(session()->getFlashdata('info'))) { ?>

        <div class="alert alert-info">
            <?php echo session()->getFlashdata('info'); ?>
        </div>

    <?php } ?>

    <?php if (!empty(session()->getFlashdata('warning'))) { ?>

        <div class="alert alert-warning">
            <?php echo session()->getFlashdata('warning'); ?>
        </div>

    <?php } ?>
</div>


<div class="container">
    <br>
    <a href="<?php echo base_url('create'); ?>" class="btn btn-success float-right mb-3">Tambah Produk</a>
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table table-bordered" border="1">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Jenis</th>
                    <th>Ukuran</th>
                    <th>Image</th>
                    <th>OB</th>
                    <th>Increse</th>
                    <th>Description</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php


                    $key = 1;

                    if (!$product) {
                        echo "Data Tidak ada";
                    } else {
                        foreach ($product as $data) { ?>
                            <tr>

                                <td><?php echo $key++; ?></td>
                                <td><?php echo $data['name'];  ?></td>
                                <td><?php echo $data['category_name']; ?></td>
                                <td><?php echo $data['type']; ?></td>
                                <td><?php echo $data['size']; ?> CM</td>
                                <td><?php echo $data['description']; ?></td>
                                <td><img src="/img/<?= $data['image']; ?> " alt="" class="image"></td>
                                <td>Rp.<?php echo $data['ob']; ?></td>
                                <td>Rp.<?php echo $data['inc']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo base_url('product/edit/' . $data['id']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Update</a>
                                        <a href="<?php echo base_url('product/delete/' . $data['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk <?php echo $data['name']; ?> ini?')"><i class="fas fa-trash-alt"></i>Delete</a>
                                    </div>
                                </td>

                            </tr>

                        <?php } ?>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    <?= $this->endsection(); ?>