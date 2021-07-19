<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
					<div class="card-body">
					<h2 class="card-title pl-3 pt-3"><?= $title ?></h2>
<br>
					<form id="form_update" method="post">
						<label class="label2">ID</label>
						<div class="input-group mb-3">
							<input required type="text" id="id" name="id"  value="<?=$data->id?>" readonly class="form-control" placeholder="id" aria-label="id" aria-describedby="basic-addon1">
						</div>

						<label class="label2">Email</label>
						<div class="input-group mb-3">
							<input required type="email" id="email" name="email" value="<?=$data->email?>"  class="form-control" placeholder="Masukan email">
						</div>

						<label class="label2">Nama</label>
						<div class="input-group mb-3">
							<input required type="text" id="name" name="name" value="<?=$data->name?>"  class="form-control" placeholder="Masukan nama">
						</div>
						<div class="input-group mb-3">
							<select class="form-control" name="gender" id="gender" required>
								<option value="Pria" <?= $data->gender =='Pria'? 'selected':'' ?>>Pria</option>
								<option value="Wanita" <?= $data->gender =='Wanita'? 'selected':'' ?>>Wanita</option>
								<option value="Anak-Anak" <?= $data->gender =='Anak-Anak'? 'selected':'' ?>>Anak-Anak</option>
							</select>
						</div>

						<div class="modal-footer">
							<button type="submit" onclick="update_data('<?= base_url()?>client_data/index/update')" class="btn btn-success">Update</button>
							<button class="btn btn-danger"
									onclick="window.history.go(-1); return false;"
									type="button"

							>Kembali</button>
							</div>
					</form>

				</div>
			</div>
		</div><!-- /.panel-->
	</div><!-- /.col-->
</div>

