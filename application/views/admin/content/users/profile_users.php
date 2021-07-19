<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->

        <div class="container">

            <div class="row">
                <div class="col-md-4 mb-5" >

                    <div class="card align-center text-center mb-5">
                        <div class="card-body">
                            <?php if ($data->photo_path !== null) { ?>
                                <img src="<?php echo $data->photo_path ?>" alt="image" id="avatar"  class="card-img-top img-fluid "
                                     style="
                                        width: 250px;
                                        height: 250px;
                                        max-width:250px;
                                        max-height:250px;
                                        object-fit:scale-down;
                                        border-radius:50% 50% 50% 50%;
                                        ">
                            <?php }else{ ?>
                                <img src="<?php echo base_url() . 'assets/admin/assets/images/users/1.jpg'?>" alt="image" id="avatar" class="card-img-top img-fluid "
                                     style="
                                        width: 250px;
                                        height: 250px;
                                        max-width:250px;
                                        max-height:250px;
                                        object-fit:scale-down;
                                        border-radius:50% 50% 50% 50%;
                                        ">
                            <?php } ?>
                            <form method="post" id="uploadavatar" enctype="multipart/form-data" >
                                <div class="text-right">
                                    <input type="file" id="inpupload" name="image" style="display:none" />
                                    <input type="button" class="btn btn-primary btn-rounded" id="btnupload" value="Upload" />


                                    <button type="reset" id="hapusavatar" onclick="remove_avatar()" class="btn btn-dark btn-rounded">Hapus</button>

                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title" style="font-size: 22px">  <?= $data->fullname ?></h4>
                        </div>
                    </div>

                </div>
                <div class="col-md-8" style="padding-left: 0px">


                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Profile</h4>
                            <form method="post" id="editprofile">
								<input type="hidden" class="form-control" name="id" value="<?= $data->id ?>" placeholder="masukan nama lengkap">

								<div class="form-body">
                                    <label>Nama </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="fullname" value="<?= $data->fullname ?>" placeholder="masukan nama lengkap">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Email</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="email" value="<?= $data->email ?>"  placeholder="masukan email" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <label>Nomor Telpon</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="handphone" value="<?= $data->handphone ?> " placeholder="masukan nomor telpon"  required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <label>Jenis Kelamin</label>
                                            <div class="form-group">
                                                <select id='gender' name="gender" class="form-control">
                                                    <option value=''>-- Pilih Jenis Kelamin--</option>
													<option value="Pria" <?php if($data->gender == "Pria"){echo "selected";}?> >Pria</option>
													<option value="Wanita" <?php if ($data->gender == "Wanita"){echo "selected";}?> >Wanita</option>
												</select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-12">
                                            <label>alamat</label>
                                            <div class="form-group">
                                                <textarea type="text" class="form-control" name="address" placeholder="" ><?= $data->address?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="modal-footer">
									<button type="submit" onclick="update_data('<?= base_url()?>users/profile/update')" class="btn btn-success">Update</button>
									<button class="btn btn-danger"
											onclick="window.history.go(-1); return false;"
											type="button"

									>Kembali</button>
								</div>
                            </form>
                        </div>
                    </div>





                </div>



            </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
