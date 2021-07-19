<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">

				<div class="card-body">
					<?= $this->session->flashdata('pesan'); ?>
					<div class="card-title row">
						<div class="col-auto mr-2">
							<h2 class="card-title pl-3 pt-3">List Client</h2></div>
						<div class="col-auto" style="margin-right:5px;margin-top: -2px">
							<button type="button" class="btn btn-sm btn-primary btn-rounded text-white mt-4" data-toggle="modal" data-target="#create" ><i class="fa fa-pencil " style="margin-right:5px;"></i>Tambah client</button>
							<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tambah Client</h5>
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

												<label class="label2">Nama</label>
												<div class="input-group mb-3">
													<input required type="text" id="name" name="name"  class="form-control" placeholder="Masukan nama">
												</div>

												<label class="label2">Tipe Gender</label>
												<div class="input-group mb-3">
													<select class="form-control" name="gender" id="gender" required>
														<option value="Pria" >Pria</option>
														<option value="Wanita" >Wanita</option>
														<option value="Anak-Anak" >Anak-Anak</option>
													</select>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" onclick="create_data('<?= base_url()?>client_data/index/create')" class="btn btn-primary">Tambah</button>
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
								<th>gender</th>
								<th>Name</th>
								<th>Created at</th>
								<th>Updated At</th>
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

