<?php 

    $npm = @$_GET['npm'];

    $sql = $koneksi->query("SELECT * FROM tb_anggota WHERE npm ='$npm'");
    $tampil = $sql->fetch_assoc();
    $jk = $tampil['jk'];
    $prodi = $tampil['prodi'];



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
                                            <label>Npm</label>
                                            <input class="form-control " name="npm"  value="<?= $tampil['npm'] ?>" readonly/>
                                          
                                        </div>
                                         <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control " name="nama"  value="<?= $tampil['nama']; ?> "/>
                                     
                                        </div>
                                         <div class="form-group">
                                            <label>Kelas</label>
                                            <input class="form-control " name="kelas"  value="<?= $tampil['kelas']; ?> " />
                                        
                                        
                                       <div class="form-group">
                                            <label>Jenis Kelamin</label><br>
                                            <label class="checkbox-inline" >
                                                <input type="checkbox" value="L" name="jk" <?php echo ($jk == 'L')?"checked":"";?> /> Laki-Laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="W" name="jK" <?php echo ($jk == 'P')?"checked":"";?> /> Wanita
                                            </label>
                                          
                                        </div>
                                    <div class="form-group">
                                            <label>Program Studi</label>
                                            <select  class="form-control" name="prodi">
                                            <option value="ti" <?php if ($prodi == 'ti') {
                                                    echo"selected";
                                                } ?>>Teknik Informatika</option>
                                            <option value="si" <?php if ($prodi == 'si') {
                                                    echo"selected";
                                                } ?>>Sistem Informasi</option>
                                            </select>
                                        </div>

                                   
                                        <div class="row">
                                        	<div class="col-md-6"></div>
                                        	

                                        	<input type="submit" class="btn btn-primary" name="simpan" value="ubah">
                                        </div>
                          
                             </div>
                         </form>
                         </div>
                     </div>

</div>
</div>
</div>
                                                	
 <?php 

    
    $nama = @$_POST['nama'];
    $kelas = @$_POST['kelas'];
    
    $jk = @$_POST['jk'];
    $prodi = @$_POST['prodi'];
  

    $simpan = @$_POST['simpan'];

    if ($simpan) {
            $sql = $koneksi->query ("UPDATE tb_anggota SET nama = '$nama',kelas = '$kelas' ,jk = '$jk',prodi = '$prodi' WHERE npm ='$npm'");
            if($sql) {
                ?>
                <script type="text/javascript">
                    alert('Ubah Berhasi Di Tambahkan');
                    window.location.href="?page=anggota";
                </script>
                <?php
            }



    }

     ?>



