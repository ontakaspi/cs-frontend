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
							<input required type="email" id="email" name="email"  value="<?=$data->email?>"  class="form-control" placeholder="Masukan email">
						</div>

						<label class="label2">username</label>
						<div class="input-group mb-3">
							<input required type="text" id="username" name="username"   value="<?=$data->username?>" class="form-control" placeholder="Masukan username">
						</div>

						<label class="label2">fullname</label>
						<div class="input-group mb-3">
							<input required type="text" id="fullname" name="fullname"  value="<?=$data->fullname?>"  class="form-control" placeholder="Masukan fullname">
						</div>

						<label class="label2">roles</label>
						<div class="input-group mb-3">
							<select class="form-control" name="roles" id="roles" required>
								<option value="admin" <?= $data->roles == 'admin'? 'selected':'' ?>>admin</option>
								<option value="staff"  <?= $data->roles == 'staff'? 'selected':'' ?>>Staff</option>
							</select>
						</div>

						<label class="label2">Password</label>
						<div class="input-group mb-3">
							<input type="password" id="password" name="password"  class="form-control" placeholder="Masukan password">
						</div>

						<div class="modal-footer">
							<button type="submit" onclick="update_data('<?= base_url()?>users/index/update')" class="btn btn-success">Update</button>
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

