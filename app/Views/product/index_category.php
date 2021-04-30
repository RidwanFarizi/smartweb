<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kategori</title>
</head>

<body>

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
        <a href="<?php echo base_url('category/create_category'); ?>" class="btn btn-success float-right mb-3">Tambah Kategori</a>
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table table-bordered" border="1">
                    <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php

                        //dd($produk);
                        $key = 1;

                        if ($category == false) {
                            echo ("Data Tidak ada");
                        } else {
                            foreach ($category as $data) { ?>
                                <tr>
                                    <td><?php echo $key++; ?></td>
                                    <td><?php echo $data['category_name']; ?></td>
                                    <td>
                                        <div class="btn-group">

                                            <a href="<?php echo base_url('category/category_delete/' . $data['id_category']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk <?php echo $data['category_name']; ?> ini?')"><i class="fas fa-trash-alt"></i>Delete</a>

                                        </div>
                                    </td>


                                </tr>
                            <?php } ?>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>