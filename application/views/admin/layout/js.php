<script src="<?php echo base_url() . 'assets/admin/assets/libs/jquery/dist/jquery.min.js'?>"></script>
<script src="<?php echo base_url() . 'assets/admin/assets/libs/popper.js/dist/umd/popper.min.js'?>"></script>
<script src="<?php echo base_url() . 'assets/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js'?>"></script>
<!-- apps -->
<!-- apps -->
<script src="<?php echo base_url() . 'assets/admin/dist/js/app-style-switcher.js'?>"></script>
<script src="<?php echo base_url() . 'assets/admin/dist/js/feather.min.js'?>"></script>
<script src="<?php echo base_url() . 'assets/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js'?>"></script>
<script src="<?php echo base_url() . 'assets/admin/dist/js/sidebarmenu.js'?>"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url() . 'assets/admin/dist/js/custom.min.js'?>"></script>
<!--This page JavaScript -->
<script src="<?php echo base_url() . 'assets/admin/assets/extra-libs/c3/d3.min.js'?>"></script>
<script src="<?php echo base_url() . 'assets/admin/assets/extra-libs/c3/c3.min.js'?>"></script>
<script src="<?php echo base_url() . 'assets/admin/assets/libs/chartist/dist/chartist.min.js'?>"></script>
<script src="<?php echo base_url() . 'assets/admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js'?>"></script>

<script src="<?php echo base_url() . 'assets/admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js'?>"></script>
<script src="<?php echo base_url() . 'assets/admin/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js'?>"></script>
<script src="<?= base_url('assets/admin/assets/sweetalert2.all.min.js'); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

<script src="<?php echo base_url() . 'assets/admin/dist/js/clipboard.min.js'?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url() . 'assets/admin/jquery.dataTables.min.js'?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url() . 'assets/admin/dataTables.responsive.js'?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url() . 'assets/admin/dataTables.bootstrap4.min.js'?>"></script>
<script>
	$(document).ready(function() {
		<?php if (isset($datatablesUrl)){?>
		var columns = [];
		$.ajax({
			url: "<?= $datatablesUrl ?>",
			type: 'POST',
			success: function (data) {
				code = JSON.parse(data);
				if (code.code == 404){
					Swal.fire('warning!',code.message,'warning');
					$("table[id*='pageTable']").DataTable({
					})
				}else{
					//tableData = JSON.parse(data);  //Unexpected token o in JSON at position 1
					tableData = JSON.parse(data);    // Cannot read property '0' of undefined
					columnNames = Object.keys(tableData.data[0]);
					for (var i in columnNames) {

						columns.push({
							data: columnNames[i]
						});
					}

					if (typeof columnNames[1] !== 'undefined'){
						columns.push({
							data: columnNames[1]
						});
					}

					console.log(tableData.data);
					$("table[id*='pageTable']").DataTable({
						dom: 'frtip',
						columns: columns,
						data: tableData.data,
						<?php if ($title =='List Ukuran Baju'){?>
						columnDefs: [
							{
								// The `data` parameter refers to the data for the cell.
								// The `rows`argument is an object representing all the data for the current row.
								"render": function ( data, type, row ) {
									return "<a class='btn btn-danger btn-delete text-white mr-1' onclick='delete_data(\"<?= base_url()?>Size_chart/index/delete/"+row.id+"\")'>Delete</a>"+
										"<a class='btn btn-primary btn-delete text-white' href='<?= base_url()?>Size_chart/index/edit/"+row.id+"'>Edit</a>";;
								},
								"targets": -1  // -1 is the last column, 0 the first, 1 the second, etc.
							}
						]
						<?php }?>

						<?php if ($title =='List client'){?>
						columnDefs: [
							{
								// The `data` parameter refers to the data for the cell.
								// The `rows`argument is an object representing all the data for the current row.
								"render": function ( data, type, row ) {
									return "<a class='btn btn-danger btn-delete text-white mr-1' onclick='delete_data(\"<?= base_url()?>client_data/index/delete/"+row.id+"\")'>Delete</a>"+
										"<a class='btn btn-primary btn-delete text-white' href='<?= base_url()?>client_data/index/edit/"+row.id+"'>Edit</a>";;
								},
								"targets": -1  // -1 is the last column, 0 the first, 1 the second, etc.
							}
						]
						<?php }?>

						<?php if ($title =='List users'){?>
						columnDefs: [
							{
								// The `data` parameter refers to the data for the cell.
								// The `rows`argument is an object representing all the data for the current row.
								"render": function ( data, type, row ) {
									return "<a class='btn btn-danger btn-delete text-white mr-1' onclick='delete_data(\"<?= base_url()?>users/index/delete/"+row.id+"\")'>Delete</a>"+
										"<a class='btn btn-primary btn-delete text-white' href='<?= base_url()?>users/index/edit/"+row.id+"'>Edit</a>";;
								},
								"targets": -1  // -1 is the last column, 0 the first, 1 the second, etc.
							}
						]
						<?php }?>

						<?php if ($title =='List Ukuran Baju Client'){?>
						columnDefs: [
							{
								// The `data` parameter refers to the data for the cell.
								// The `rows`argument is an object representing all the data for the current row.
								"render": function ( data, type, row ) {
									return "<a class='btn btn-primary btn-delete text-white' href='<?= base_url()?>client_cloth_size/index/detail/"+row.id+"'>Detail</a>";;
								},
								"targets": -1  // -1 is the last column, 0 the first, 1 the second, etc.
							}
						]
						<?php }?>

						<?php if ($title =='Detail Ukuran Baju Client'){?>
						columnDefs: [
							{
								// The `data` parameter refers to the data for the cell.
								// The `rows`argument is an object representing all the data for the current row.
								"render": function ( data, type, row ) {
									return "<a class='btn btn-danger btn-delete text-white mr-1' onclick='delete_data(\"<?= base_url()?>client_cloth_size/index/delete/"+row.id+"\")'>Delete</a>"+
										"<a class='btn btn-primary btn-delete text-white' href='<?= base_url()?>client_cloth_size/index/edit/"+row.id+"'>Edit</a>";;
								},
								"targets": -1  // -1 is the last column, 0 the first, 1 the second, etc.
							}
						]
						<?php }?>

					})
				}


			}

		});
		<?php }?>

	});

	<?php if ($title =='Edit Ukuran Baju Client'){?>
	$('#cloth_type').change(function() {
		var params2 = $("#gender").val().toLowerCase();
		var params1 = $(this).find(':selected').val().toLowerCase();
		console.log(params1);
		$.ajax({
			method:"post",
			url: '<?= base_url().'size_chart/get_by/cloth_type/'?>',
			data: {
				cloth_type:params1,
				gender:params2,
			},
			processData: false,
			contentType: false,
			dataType: 'JSON',
			success:function(data){
				if (data.code !== 200){
					Swal.fire('error!',data.message,'error')
				} else{
					var size_type = document.getElementById('size_type');
					$(size_type).empty();
					$(size_type).append('<option> pilih tipe ukuran</option>');
					for (var i = 0; i < data.data.length; i++) {
						$(size_type).append('<option value=' + data.data[i].id + '>' + data.data[i].size_type + '</option>');
					}
				}


			}
		});

	});
	<?php }?>

	<?php if ($title =='List Ukuran Baju Client'){?>
	$('#client').change(function() {
		var client_data = $("#client").val().split(",");
		$("#client_id").val(client_data[0]);
		$("#gender").val(client_data[1]);
		$.ajax({
			method:"post",
			url: '<?= base_url().'size_chart/get_by/gender/'?>',
			data: {
				gender:client_data[1],
			},
			processData: false,
			contentType: false,
			dataType: 'JSON',
			success:function(data){
				if (data.code !== 200){
					Swal.fire('error!',data.message,'error')
				} else{
					var cloth_type = document.getElementById('cloth_type');
					$(cloth_type).empty();
					$(cloth_type).append('<option> pilih tipe baju</option>');

					for (var i = 0; i < data.data.length; i++) {
						$(cloth_type).append('<option value=' + data.data[i].cloth_type + '>' + data.data[i].cloth_type + '</option>');
					}
				}


			}
		});
		$('#cloth_type').change(function() {
			var params2 = $("#gender").val().toLowerCase();
			var params1 = $(this).find(':selected').val().toLowerCase();
			console.log(params1);
			$.ajax({
				method:"post",
				url: '<?= base_url().'size_chart/get_by/cloth_type/'?>',
				data: {
					cloth_type:params1,
					gender:params2,
				},
				processData: false,
				contentType: false,
				dataType: 'JSON',
				success:function(data){
					if (data.code !== 200){
						Swal.fire('error!',data.message,'error')
					} else{
						var size_type = document.getElementById('size_type');
						$(size_type).empty();
						$(size_type).append('<option> pilih tipe ukuran</option>');
						for (var i = 0; i < data.data.length; i++) {
							$(size_type).append('<option value=' + data.data[i].id + '>' + data.data[i].size_type + '</option>');
						}
					}


				}
			});

		});
	});
	<?php }?>

	<?php if ($title =='Profile users'){?>
	$("#btnupload").click(function(){ $("#inpupload").trigger("click"); });
	$("#inpupload").change(function(){ $("#uploadavatar").submit(); });
	$('#uploadavatar').on('submit', function(event){
		event.preventDefault();
		var form = $('#uploadavatar')[0];
		var formData = new FormData(form);

		$.ajax({
			method:"post",
			url: '<?= base_url().'users/avatar/upload/'?>',
			data: formData,
			processData: false,
			contentType: false,
			dataType: 'JSON',
			success: function(data){
				if (data.code == 200){
					Swal.fire({
						title: 'Success!',
						text: data.message,
						icon: "success",
					}).then((result) => {
						if (result.value) {
							location.reload();
						}
					});
				}else if(data.code == 400){
					Swal.fire({
						title: 'Info!',
						html: data.message,
						icon: "warning",
					});
				}else{
					Swal.fire('error!',data.message,'error')
				}

			},
			error: function () {
				Swal.fire('error!','silahkan hubungi customer service','error')
			}
		});

	});
	<?php }?>

	<?php if ($title =='Profile users'){?>
	function remove_avatar() {
		Swal.fire({
			title: 'Yakin Hapus Avatar?',
			text: "Avatar akan dihapus dan di ganti dengan avatar default",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type  : 'POST',
					url: '<?= base_url().'users/avatar/remove/'?>',
					dataType : 'JSON',
					cache:false,
					success : function(data){
						if (data.code == 200){
							Swal.fire({
								title: 'Success!',
								text: data.message,
								icon: "success",
							}).then((result) => {
								if (result.value) {
									location.reload();
								}
							});
						}else if(data.code == 400){
							Swal.fire({
								title: 'Info!',
								html: data.message,
								icon: "warning",
							});
						}else{
							Swal.fire('error!',data.message,'error')
						}
					}
				}); //akhir ajax
			}
		});
	}
	<?php }?>
	function delete_data(url) {
		event.preventDefault();
		Swal.fire({
			title: 'Yakin menghapus data ini?',
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya,hapus'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					method:"post",
					url: url,
					processData: false,
					contentType: false,
					dataType: 'JSON',
					success: function(data){
						if (data.code == 200){
							Swal.fire({
								title: 'Success!',
								text: data.message,
								icon: "success",
							}).then((result) => {
								if (result.value) {
									location.reload();
								}
							});
						}else if(data.code == 404){
							Swal.fire({
								title: 'Info!',
								text: data.message,
								icon: "warning",
							})
						}else{
							Swal.fire('error!',data.message,'error')
						}

					},
					error: function () {
						Swal.fire('error!','Failed to delete data','error')
					}
				});
			}
		});

	}

	function update_data(url) {
		event.preventDefault();
		var form = $('#form_update')[0];
		var formData = new FormData(form);

		Swal.fire({
			title: 'Yakin mengupdate data ini?',
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya,update'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					method:"post",
					url: url,
					data: formData,
					processData: false,
					contentType: false,
					dataType: 'JSON',
					success: function(data){
						if (data.code == 200){
							Swal.fire({
								title: 'Success!',
								text: data.message,
								icon: "success",
							}).then((result) => {
								if (result.value) {
									location.reload();
								}
							});
						}else if(data.code == 404 || data.code == 400){
							Swal.fire({
								title: 'Info!',
								html: data.message,
								icon: "warning",
							})
						}else{
							Swal.fire('error!',data.message,'error')
						}

					},
					error: function () {
						Swal.fire('error!','silahkan hubungi customer service','error')
					}
				});
			}
		});

	}

	function create_data(url) {
		event.preventDefault();
		var form = $('#form_create')[0];
		var formData = new FormData(form);

		Swal.fire({
			title: 'Tambah data ini?',
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya,tambah'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					method:"post",
					url: url,
					data: formData,
					processData: false,
					contentType: false,
					dataType: 'JSON',
					success: function(data){
						console.log(data);
						if (data.code == 200){
							Swal.fire({
								title: 'Success!',
								text: data.message,
								icon: "success",
							}).then((result) => {
								if (result.value) {
									location.reload();
								}
							});
						}else if(data.code == 400){
							Swal.fire({
								title: 'Info!',
								html: data.message,
								icon: "warning",
							});
						}else{
							Swal.fire('error!',data.message,'error')
						}

					},
					error: function () {
						Swal.fire('error!','silahkan hubungi customer service','error')
					}
				});
			}
		});
	}

</script>


