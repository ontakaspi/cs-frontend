<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">

					<div class="card-body">
						<?= $this->session->flashdata('pesan'); ?>
						<div class="card-title row">
							<div class="col-auto mr-2">
								<h2 class="card-title pl-3 pt-3">List Ukuran Baju Client</h2></div>
							<div class="col-auto" style="margin-right:5px;margin-top: -2px">
								<button type="button" class="btn btn-sm btn-primary btn-rounded text-white mt-4" data-toggle="modal" data-target="#create" ><i class="fa fa-pencil " style="margin-right:5px;"></i>Tambah Ukuran Baju client</button>
								<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Tambah Ukuran Baju client</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form id="form_create" method="post">
													<div class="input-group mb-3">
														<input required type="hidden" id="client_id" name="client_id"  readonly class="form-control" placeholder="id" aria-label="id" aria-describedby="basic-addon1">
													</div>
													<label class="label2">Client</label>
													<div class="input-group mb-3">
														<select class="form-control" name="client" id="client" required>
															<option>pilih client</option>

															<?php foreach ($data_client as $client){?>
																<option value="<?= $client["id"] ?>,<?= $client["gender"] ?>"><?= $client["name"] ?></option>
															<?php }?>
														</select>
													</div>

													<label class="label2">Gender</label>
													<div class="input-group mb-3">
														<input required type="text" readonly id="gender" name="gender" class="form-control" placeholder="Masukan Tipe Baju">
													</div>

													<label class="label2">Tipe Baju</label>
													<div class="input-group mb-3">
														<select class="form-control" name="cloth_type" id="cloth_type" required>

														</select>
													</div>

													<label class="label2">Tipe Ukuran</label>
													<div class="input-group mb-3">
														<select class="form-control" name="size_chart_id" id="size_type" required>

														</select>
													</div>

												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" onclick="create_data('<?= base_url()?>client_cloth_size/index/create')" class="btn btn-primary">Tambah</button>
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
								<th>Tipe Ukuran</th>
								<th>Nama</th>
								<th>Email</th>
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

