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
							<input required type="hidden" id="client_id" name="client_id"  value="<?=$data->client_id?>" readonly class="form-control" placeholder="id" aria-label="id" aria-describedby="basic-addon1">

						</div>

						<label class="label2">Gender</label>
						<div class="input-group mb-3">
							<input required type="text" readonly id="gender" name="gender"  value="<?=$data->gender?>" class="form-control" placeholder="Masukan Tipe Baju">
						</div>

						<label class="label2">Tipe Baju</label>
						<div class="input-group mb-3">
							<select class="form-control" name="cloth_type" id="cloth_type" required>
								<?php foreach ($cloth_type as $type){?>
								<option value="<?= $type["cloth_type"] ?>" <?= $data->cloth_type == $type["cloth_type"]? 'selected':'' ?>><?= $type["cloth_type"] ?></option>
								<?php }?>
							</select>
							</div>

						<label class="label2">Tipe Ukuran</label>
						<div class="input-group mb-3">
							<select class="form-control" name="size_chart_id" id="size_type" required>
								<?php foreach ($size_type as $type1){?>
									<option value="<?= $type1["id"] ?>" <?= $data->size_type == $type1["size_type"]? 'selected' : '' ?>><?=$type1["size_type"] ?></option>
								<?php }?>
							</select>
						</div>


						<div class="modal-footer">
							<button type="submit" onclick="update_data('<?= base_url()?>client_cloth_size/index/update')" class="btn btn-success">Update</button>
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

