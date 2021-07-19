<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">

					<div class="card-body">
						<?= $this->session->flashdata('pesan'); ?>
						<div class="card-title row">
							<div class="col-auto mr-2">
								<h2 class="card-title pl-3 pt-3">List Ukuran Baju</h2></div>
						</div>
						<p class="pl-3 pr-3"></p>
						<label class="label2">Email</label>
						<div class="input-group mb-3">
							<input required type="email" id="email" name="email" value="<?=$data->email?>"  class="form-control" placeholder="Masukan email">
						</div>

						<label class="label2">Nama</label>
						<div class="input-group mb-3">
							<input required type="text" id="name" name="name" value="<?=$data->name?>"  class="form-control" placeholder="Masukan nama">
						</div>
						<div class="table-responsive">
						<table id="pageTable" class="table  table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							<thead>
							<tr>
								<th></th>
								<th>Tipe Ukuran</th>
								<th>Tipe Baju</th>
								<th>Lebar Dada </th>
								<th>Panjang baju</th>
								<th>Lebar pinggang </th>
								<th>Panjang Tangan</th>
								<th>Aksi</th>
							</tr>
							</thead>
						</table>
					</div>

				</div>
			</div>
		</div><!-- /.panel-->
	</div><!-- /.col-->
</div>

