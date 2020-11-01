<?php 

    $id = @$_GET['id'];

    $sql = $koneksi->query("SELECT * FROM tb_buku WHERE id='$id'");
    $tampil = $sql->fetch_assoc();
    $tahun2 = $tampil['tahun_terbit'];
    $lokasi = $tampil['lokasi'];
   
    


 ?>


				
<div class="panel panel-default">
<div class="panel-heading">
	Ubah Data
</div>
<div class="panel-body">	


						<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                  
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input class="form-control " name="judul"  value="<?= $tampil['judul']; ?> " />
                                          
                                        </div>
                                         <div class="form-group">
                                            <label>Pengarang</label>
                                            <input class="form-control " name="pengarang"  value="<?= $tampil['pengarang']; ?> "/>
                                     
                                        </div>
                                         <div class="form-group">
                                            <label>Penerbit</label>
                                            <input class="form-control " name="penerbit"  value="<?= $tampil['penerbit']; ?> " />
                                            
                                        </div>
                                         <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <select class="form-control" name="tahun"  value="<?= $tampil['tahun_terbit']; ?> ">
                                                <?php 
                                                	$tahun = date("Y");
                                                	for ($i=$tahun-40; $i <= $tahun; $i++) { 
                                                        if ($i == $tahun2) {
                                                		echo'
                                                            <option value="'.$i. '" selected>'.$i.'</option>';
                                                        }else{
                                                		echo'<option value="'.$i. '">'.$i.'</option>';
                                                	   }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Istn</label>
                                            <input class="form-control " name="istn"  value="<?= $tampil['istn']; ?> " />
                                            
                                        </div>
                                         <div class="form-group">
                                            <label>Jumlah Buku</label>
                                            <input class="form-control "  type="numberic" name="jumlah" value="<?= $tampil['jumlah_buku']; ?> "  />
                                            
                                        </div>
										 <div class="form-group">
                                            <label>Lokasi</label>
                                            <select class="form-control" name="lokasi">
                                                <option value="rak1" <?php if($lokasi =='rak1') {echo "selected";} ?>> Rak 1</option>
                                               


                                                <option value="rak2" <?php if($lokasi =='rak2') {echo "selected";} ?>>Rak2 </option>
                                                <option value="rak3" <?php if($lokasi =='rak3') {echo "selected";} ?>>Rak3</option>
                                                	
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tangggal Input</label>
                                            <input class="form-control " type="tanggal" name="date"value="<?= $tampil['tgl_input']; ?>"/>
                                            
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-6"></div>
                                        	

                                        	<input type="submit" class="btn btn-primary" name="simpan" value="simpan">
                                        </div>
                          
                             </div>
                         </form>
                         </div>
                     </div>

</div>
</div>
</div>
                                                	
	<?php 

	$judul = @$_POST['judul'];
	$pengarang = @$_POST['pengarang'];
	$penerbit = @$_POST['penerbit'];
	$tahun = @$_POST['tahun'];
	$istn = @$_POST['istn'];
	$jumlah = @$_POST['jumlah'];
	$lokasi = @$_POST['lokasi'];
	$tanggal = @$_POST['tanggal'];

	$simpan = @@$_POST['simpan'];

	if ($simpan) {
			$sql = $koneksi->query("UPDATE tb_buku SET judul = '$judul',pengarang= '$pengarang',penerbit = '$penerbit',tahun_terbit = '$tahun',istn = '$istn' ,jumlah_buku = '$jumlah',lokasi = '$lokasi' ,tgl_input = '$tanggal' WHERE id='$id'");
			if($sql) {
				?>
				<script type="text/javascript">
					alert('Ubah Berhasi Di Tambahkan');
					window.location.href="?page=buku";
				</script>
				<?php
			}



	}

	 ?>



