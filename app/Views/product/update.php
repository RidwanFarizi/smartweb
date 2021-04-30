<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>product</title>
</head>

<body>

    <div class="container">
        <h4>Form Edit product</h4>
        <hr>
        <form action="<?php echo base_url('product/update/' . $product['id']); ?>" method="post">

            <div class="form-group">
                <label for="">Nama Ikan</label>
                <input type="text" name="name" value="<?php echo $product['name']; ?>" class="form-control" placeholder="Nama product">
            </div>
            <div class="form-group">
                <label for="">Jenis Ikan</label>
                <input type="text" name="jenis" value="<?php echo $product['jenis']; ?>" class="form-control" placeholder="Ukuran product">
            </div>
            <div class="form-group">
                <label for="">Ukuran Ikan</label>
                <input type="text" name="size" value="<?php echo $product['size']; ?>" class="form-control" placeholder="Ukuran product">
            </div>
            <div class="form-group">
                <label for="">Descripsi</label>
                <input type="text" name="description" value="<?php echo $product['description']; ?>" class="form-control" placeholder="Ukuran product">
            </div>
            <div class="form-group">
                <label for="">OB</label>
                <input type="text" name="ob" value="<?php echo $product['ob']; ?>" class="form-control" placeholder="Ukuran product">
            </div>
            <div class="form-group">
                <label for="">Increse</label>
                <input type="text" name="inc" value="<?php echo $product['inc']; ?>" class="form-control" placeholder="Ukuran product">
            </div>
            <div class="form-group">
                <label for="">Kategori : </label>
                <select name="id_category">
                    <?php foreach ($product as $l) { ?>
                        <option value="<?php echo $l['category_name']; ?>"><?php echo $l['category_name']; ?> </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="">Image</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" value="<?php echo $product['image']; ?>">

                        <label class=" custom-file-label" for="image"></label>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>

</html>