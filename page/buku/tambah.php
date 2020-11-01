						
<div class="panel panel-default">
<div class="panel-heading">
	Tambah Data
</div>
<div class="panel-body">	


						<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                  
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input class="form-control " name="judul" />
                                          
                                        </div>
                                         <div class="form-group">
                                            <label>Pengarang</label>
                                            <input class="form-control " name="pengarang" />
                                     
                                        </div>
                                         <div class="form-group">
                                            <label>Penerbit</label>
                                            <input class="form-control " name="penerbit" />
                                            
                                        </div>
                                         <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <select class="form-control" name="tahun">
                                                <?php 
                                                	$tahun = date("Y");
                                                	for ($i=$tahun-40; $i <= $tahun; $i++) { 
                                                		echo'
                                                		<option value="'.$i. '">'.$i.'</option>
                                                	';}
                                                ?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Istn</label>
                                            <input class="form-control " name="istn" />
                                            
                                        </div>
                                         <div class="form-group">
                                            <label>Jumlah Buku</label>
                                            <input class="form-control " name="jumlah" type="number" />
                                            
                                        </div>
										 <div class="form-group">
                                            <label>Lokasi</label>
                                            <select class="form-control" name="lokasi">
                                                <option value="rak1"> Rak 1</option>
                                                <option value="rak2">Rak2 </option>
                                                <option value="rak3">Rak3</option>
                                                	
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tangggal Input</label>
                                            <input class="form-control " name="tanggal" type="date" />
                                            
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

	$simpan = @$_POST['simpan'];

	if ($simpan) {
			$sql = $koneksi->query("INSERT INTO tb_buku (judul,pengarang,penerbit,tahun_terbit,istn,jumlah_buku,lokasi,tgl_input)VALUES('$judul','$pengarang','$penerbit','$tahun','$istn','$jumlah','$lokasi','$tanggal')");
			if($sql) {
				?>
				<script type="text/javascript">
					alert('data Berhasi Di Tambahkan');
					window.location.href="?page=buku";
				</script>
				<?php
			}



	}

	 ?>



