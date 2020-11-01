<?php 
	
	$id = @$_GET['id'];
	$judul = @$_GET['judul'];
	$kembali = @$_GET['tgl_kembali'];
	$lambat = @$_GET['lambat'];


	if ($lambat > 7) {
		?>
			<script type="text/javascript">
				alert("Buku Tidak Di Perpanjang, Karena Lebih Dari 7 Hari.....Kembalikan Dahulu lalu Pinjam Kembali");
				window.location.href="?page=transaksi";
			</script>

		<?php 

	}else{
		$pecah_tgl_kembali = explode("-", $kembali);
		$next_7_hari = mktime(0,0,0, $pecah_tgl_kembali[1],$pecah_tgl_kembali[0]+7, $pecah_tgl_kembali[2] );
		
		$hari_next = date("d-m-Y", $next_7_hari);


		$sql = $koneksi->query("UPDATE tb_transaksi SET tgl_kembali='$hari_next' WHERE id='$id' ");
		if ($sql) {
		?>
		<script type="text/javascript">
			alert("Perpanjang Behasil");
			window.location.href="?page=transaksi";
		</script>
		<?php

		}else{
			?>
		<script type="text/javascript">
			alert("Perpanjang gagal");
			window.location.href="?page=transaksi";
		</script>
		<?php
		}
	}



 ?>