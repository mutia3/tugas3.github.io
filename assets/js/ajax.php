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
		viewDestinasi();
		viewPengguna();
		viewTransaksi();
		viewUlasan();
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

	//begin transaksi film
	function viewTransaksi() {
		$.get('<?php echo base_url('transaksi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-transaksi').html(data);
			refresh();
		});
	}

	var id_transaksi;
	$(document).on("click", ".konfirmasiHapus-transaksi", function() {
		id_transaksi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataTransaksi", function() {
		var id = id_transaksi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('transaksi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewTransaksi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataTransaksi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('transaksi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-transaksi').modal('show');
		})
	})

	$('#form-tambah-transaksi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('transaksi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewTransaksi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-transaksi").reset();
				$('#tambah-transaksi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-transaksi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('transaksi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewTransaksi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-transaksi").reset();
				$('#update-transaksi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-transaksi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-transaksi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end transaksi film

	//begin ulasan film
	function viewUlasan() {
		$.get('<?php echo base_url('ulasan/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-ulasan').html(data);
			refresh();
		});
	}

	var id_ulasan;
	$(document).on("click", ".konfirmasiHapus-ulasan", function() {
		id_ulasan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataUlasan", function() {
		var id = id_ulasan;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('ulasan/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewUlasan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataUlasan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('ulasan/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-ulasan').modal('show');
		})
	})

	$('#form-tambah-ulasan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('ulasan/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewUlasan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-ulasan").reset();
				$('#tambah-ulasan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-ulasan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('ulasan/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewUlasan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-ulasan").reset();
				$('#update-ulasan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-ulasan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-ulasan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end ulasan film
	
</script>