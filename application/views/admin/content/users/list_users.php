<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">

				<div class="card-body">
					<?= $this->session->flashdata('pesan'); ?>
					<div class="card-title row">
						<div class="col-auto mr-2">
							<h2 class="card-title pl-3 pt-3">List Users</h2></div>
						<div class="col-auto" style="margin-right:5px;margin-top: -2px">
							<button type="button" class="btn btn-sm btn-primary btn-rounded text-white mt-4" data-toggle="modal" data-target="#create" ><i class="fa fa-pencil " style="margin-right:5px;"></i>Tambah client</button>
							<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tambah users</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form id="form_create" method="post">
												<label class="label2">Email</label>
												<div class="input-group mb-3">
													<input required type="email" id="email" name="email"  class="form-control" placeholder="Masukan email">
												</div>

												<label class="label2">username</label>
												<div class="input-group mb-3">
													<input required type="text" id="username" name="username"  class="form-control" placeholder="Masukan username">
												</div>

												<label class="label2">fullname</label>
												<div class="input-group mb-3">
													<input required type="text" id="fullname" name="fullname"  class="form-control" placeholder="Masukan fullname">
												</div>

												<label class="label2">roles</label>
												<div class="input-group mb-3">
													<select class="form-control" name="roles" id="roles" required>
														<option value="admin" >admin</option>
														<option value="staff" >Staff</option>
													</select>
												</div>

												<label class="label2">Password</label>
												<div class="input-group mb-3">
													<input required type="password" id="password" name="password"  class="form-control" placeholder="Masukan password">
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" onclick="create_data('<?= base_url()?>users/index/create')" class="btn btn-primary">Tambah</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<p class="pl-3 pr-3"></p>

					<div class="table-responsive">
						<table id="pageTable" class="table  table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							<thead>
							<tr>
								<th></th>
								<th>Email</th>
								<th>username</th>
								<th>fullname</th>
								<th>roles</th>
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

