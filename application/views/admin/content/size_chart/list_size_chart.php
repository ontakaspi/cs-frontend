<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">

					<div class="card-body">
						<?= $this->session->flashdata('pesan'); ?>
						<div class="card-title row">
							<div class="col-auto mr-2">
								<h2 class="card-title pl-3 pt-3">List Ukuran Baju</h2></div>
							<div class="col-auto" style="margin-right:5px;margin-top: -2px">
								<button type="button" class="btn btn-sm btn-primary btn-rounded text-white mt-4" data-toggle="modal" data-target="#create" ><i class="fa fa-pencil " style="margin-right:5px;"></i>Tambah Ukuran Baju</button>
								<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Tambah Ukuran Baju</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form id="form_create" method="post">
													<label class="label2">Tipe Ukuran</label>
													<div class="input-group mb-3">
														<input required type="text" id="size_type" name="size_type"  class="form-control" placeholder="Masukan Tipe Ukuran">
													</div>

													<label class="label2">Tipe Baju</label>
													<div class="input-group mb-3">
														<input required type="text" id="cloth_type" name="cloth_type"  class="form-control" placeholder="Masukan Tipe Baju">
													</div>

													<label class="label2">Tipe Gender</label>
													<div class="input-group mb-3">
														<select class="form-control" name="gender_type" id="gender_type" required>
															<option value="Pria" >Pria</option>
															<option value="Wanita" >Wanita</option>
															<option value="Anak-Anak" >Anak-Anak</option>
														</select>
													</div>

													<label class="label2">Lebar Dada (cm)</label>
													<div class="input-group mb-3">
														<input required type="number" id="chest_width" name="chest_width"  class="form-control" placeholder="Masukan Lebar dada (cm)">
													</div>

													<label class="label2">Panjang Baju(cm)</label>
													<div class="input-group mb-3">
														<input required type="number" id="shirt_length" name="shirt_length" class="form-control" placeholder="Masukan Tinggi Baju(cm)">
													</div>

													<label class="label2">Lebar pinggang (cm)</label>
													<div class="input-group mb-3">
														<input required type="number" id="waist_width" name="waist_width"   class="form-control" placeholder="Masukan Lebar Pinggang(cm)">
													</div>

													<label class="label2">Panjang lengan(cm)</label>
													<div class="input-group mb-3">
														<input required type="number" id="sleeve_length" name="sleeve_length"  class="form-control" placeholder="Masukan panjang lengan(cm)">
													</div>
												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" onclick="create_data('<?= base_url()?>Size_chart/index/create')" class="btn btn-primary">Tambah</button>
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
								<th>Tipe Baju</th>
								<th>Tipe Gender</th>
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

