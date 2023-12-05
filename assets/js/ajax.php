<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {		
		viewCategory();
		viewDokter();
		viewPengguna();
		viewDestinasi();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	//begin category film
	function viewCategory() {
		$.get('<?php echo base_url('category/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-category').html(data);
			refresh();
		});
	}

	var category_id;
	$(document).on("click", ".konfirmasiHapus-category", function() {
		category_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataCategory", function() {
		var id = category_id;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('category/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewCategory();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataCategory", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('category/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-category').modal('show');
		})
	})

	$('#form-tambah-category').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('category/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewCategory();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-category").reset();
				$('#tambah-category').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-category', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('category/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewCategory();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-category").reset();
				$('#update-category').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-category').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-category').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end category film

	//begin dokter film
	function viewDokter() {
		$.get('<?php echo base_url('dokter/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-dokter').html(data);
			refresh();
		});
	}

	var id_dokter;
	$(document).on("click", ".konfirmasiHapus-dokter", function() {
		id_dokter = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataDokter", function() {
		var id = id_dokter;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('dokter/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewDokter();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataDokter", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('dokter/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-dokter').modal('show');
		})
	})

	$('#form-tambah-dokter').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('dokter/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewDokter();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-dokter").reset();
				$('#tambah-dokter').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-dokter', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('dokter/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewDokter();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-dokter").reset();
				$('#update-dokter').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-dokter').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-dokter').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end dokter film

	//begin destinasi film
	function viewDestinasi() {
		$.get('<?php echo base_url('destinasi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-destinasi').html(data);
			refresh();
		});
	}

	var id_destinasi;
	$(document).on("click", ".konfirmasiHapus-destinasi", function() {
		id_destinasi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataDestinasi", function() {
		var id = id_destinasi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('destinasi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewDestinasi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataDestinasi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('destinasi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-destinasi').modal('show');
		})
	})

	$('#form-tambah-destinasi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('destinasi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewDestinasi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-destinasi").reset();
				$('#tambah-destinasi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-destinasi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('destinasi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewDestinasi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-destinasi").reset();
				$('#update-destinasi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-destinasi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-destinasi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end destinasi film

	//begin obat film
	function viewObat() {
		$.get('<?php echo base_url('obat/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-obat').html(data);
			refresh();
		});
	}

	var id_obat;
	$(document).on("click", ".konfirmasiHapus-obat", function() {
		id_obat = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataObat", function() {
		var id = id_obat;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('obat/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewObat();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataObat", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('obat/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-obat').modal('show');
		})
	})

	$('#form-tambah-obat').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('obat/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewObat();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-obat").reset();
				$('#tambah-obat').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-obat', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('obat/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewObat();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-obat").reset();
				$('#update-obat').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-obat').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-obat').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end obat film

	//begin pengguna film
	function viewPengguna() {
		$.get('<?php echo base_url('pengguna/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pengguna').html(data);
			refresh();
		});
	}

	var id_pengguna;
	$(document).on("click", ".konfirmasiHapus-pengguna", function() {
		id_pengguna = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPengguna", function() {
		var id = id_pengguna;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('pengguna/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewPengguna();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPengguna", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('pengguna/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pengguna').modal('show');
		})
	})

	$('#form-tambah-pengguna').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('pengguna/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPengguna();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pengguna").reset();
				$('#tambah-pengguna').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pengguna', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('pengguna/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPengguna();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pengguna").reset();
				$('#update-pengguna').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-pengguna').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pengguna').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end pengguna film

	//begin penyakit film
	function viewPenyakit() {
		$.get('<?php echo base_url('penyakit/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-penyakit').html(data);
			refresh();
		});
	}

	var id_penyakit;
	$(document).on("click", ".konfirmasiHapus-penyakit", function() {
		id_penyakit = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPenyakit", function() {
		var id = id_penyakit;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('penyakit/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewPenyakit();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPenyakit", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('penyakit/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-penyakit').modal('show');
		})
	})

	$('#form-tambah-penyakit').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('penyakit/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPenyakit();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-penyakit").reset();
				$('#tambah-penyakit').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-penyakit', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('penyakit/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPenyakit();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-penyakit").reset();
				$('#update-penyakit').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-penyakit').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-penyakit').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end penyakit film

	//begin poli film
	function viewPoli() {
		$.get('<?php echo base_url('poli/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-poli').html(data);
			refresh();
		});
	}

	var id_poli;
	$(document).on("click", ".konfirmasiHapus-poli", function() {
		id_poli = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPoli", function() {
		var id = id_poli;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('poli/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewPoli();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPoli", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('poli/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-poli').modal('show');
		})
	})

	$('#form-tambah-poli').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('poli/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPoli();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-poli").reset();
				$('#tambah-poli').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-poli', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('poli/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPoli();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-poli").reset();
				$('#update-poli').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-poli').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-poli').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end poli film
	
</script>