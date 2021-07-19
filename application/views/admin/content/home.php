<div class="container-fluid">
	<?= $this->session->flashdata('pesan'); ?>
	<div class="jumbotron">
        <h1>Halo, selamat datang <?= $this->session->userdata('fullname') ?>!</h1>
    </div>
</div>
