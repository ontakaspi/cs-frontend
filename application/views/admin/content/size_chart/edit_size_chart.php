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
						<label class="label2">Tipe Ukuran</label>
						<div class="input-group mb-3">
							<input required type="text" id="size_type" name="size_type"  value="<?=$data->size_type?>" class="form-control" placeholder="Masukan Tipe Ukuran">
						</div>

						<label class="label2">Tipe Baju</label>
						<div class="input-group mb-3">
							<input required type="text" id="cloth_type" name="cloth_type"  value="<?=$data->cloth_type?>" class="form-control" placeholder="Masukan Tipe Baju">
						</div>

						<label class="label2">Tipe Gender</label>
						<div class="input-group mb-3">
							<select class="form-control" name="gender_type" id="gender_type" required>
								<option value="Pria" <?= $data->gender_type =='Pria'? 'selected':'' ?>>Pria</option>
								<option value="Wanita" <?= $data->gender_type =='Wanita'? 'selected':'' ?>>Wanita</option>
								<option value="Anak-Anak" <?= $data->gender_type =='Anak-Anak'? 'selected':'' ?>>Anak-Anak</option>
							</select>
						</div>

						<label class="label2">Lebar Dada (cm)</label>
						<div class="input-group mb-3">
							<input required type="number" id="chest_width" name="chest_width"  value="<?=$data->chest_width?>" class="form-control" placeholder="Masukan Lebar dada (cm)">
						</div>

						<label class="label2">Panjang Baju(cm)</label>
						<div class="input-group mb-3">
							<input required type="number" id="shirt_length" name="shirt_length"  value="<?=$data->shirt_length?>" class="form-control" placeholder="Masukan Tinggi Baju(cm)">
						</div>

						<label class="label2">Lebar pinggang (cm)</label>
						<div class="input-group mb-3">
							<input required type="number" id="waist_width" name="waist_width"  value="<?=$data->waist_width?>" class="form-control" placeholder="Masukan Lebar Pinggang(cm)">
						</div>

						<label class="label2">Panjang lengan(cm)</label>
						<div class="input-group mb-3">
							<input required type="number" id="sleeve_length" name="sleeve_length"  value="<?=$data->sleeve_length?>" class="form-control" placeholder="Masukan panjang lengan(cm)">
						</div>

						<div class="modal-footer">
							<button type="submit" onclick="update_data('<?= base_url()?>Size_chart/index/update')" class="btn btn-success">Update</button>
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

