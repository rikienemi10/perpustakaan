                        
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
                                            <label>Npm</label>
                                            <input class="form-control " name="npm" />
                                          
                                        </div>
                                         <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control " name="nama" />
                                     
                                        </div>
                                         <div class="form-group">
                                            <label>Kelas</label>
                                            <input class="form-control " name="kelas" />

                                        </div>
                                         
                                         <div class="form-group">
                                            <label>Jenis Kelamin</label><br>
                                            <label class="checkbox-inline" >
                                                <input type="checkbox" value="L" name="jk" /> Laki-Laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="W" name="jK" /> Wanita
                                            </label>
                                          
                                        </div>
                                       
                                         <div class="form-group">
                                            <label>Program Studi</label>
                                            <select  class="form-control" name="prodi">
                                            <option value="ti">Teknik Informatika</option>
                                            <option value="si">Sistem Informasi</option>
                                              <option value="si">Sistem Informasi2</option>
                                            </select>
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

    $npm = @$_POST['npm'];
    $nama = @$_POST['nama'];
    $kelas = @$_POST['kelas'];
    $jk = @$_POST['jk'];
    $prodi = @$_POST['prodi'];
  

    $simpan = @$_POST['simpan'];

    if ($simpan) {
            $sql = $koneksi->query("INSERT INTO tb_anggota (npm,nama,kelas,jk,prodi) VALUES ('$npm','$nama','kelas','$jk','$prodi')");
            if($sql) {
                ?>
                <script type="text/javascript">
                    alert('data Berhasi Di Tambahkan');
                    window.location.href="?page=anggota";
                </script>
                <?php
            }


    }

     ?>










