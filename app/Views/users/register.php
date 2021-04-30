<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="mt-5">Register Users</h1>
    Silahkan Daftarkan Identitas Anda
    <hr />
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h4>Periksa Entrian Form</h4>
            </hr />
            <?php echo session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>
    <form method="post" action="<?= base_url(); ?>/usersregister/process">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="full_name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="full_name" name="full_name">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="password_conf" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_conf" name="password_conf">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Nomor Hanphone</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
    <hr />

</div>
</main>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>


<?= $this->endsection(); ?>