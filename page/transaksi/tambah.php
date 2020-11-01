<?php   

$tgl_pinjam = date("d-m-Y");
$tujuh_hari = mktime(0,0,0, date("n"),date("j")+7 ,date("y"));
$kembali = date("d-m-Y", $tujuh_hari);
 ?>


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
                                            <label>Nama Buku </label>
                                            <select  class="form-control" name="buku">
                                            <?php   
                                                $sql = $koneksi->query("SELECT * FROM tb_buku order by id");
                                                while ($data=$sql->fetch_assoc()) {
                                                    echo "<option value='$data[id].$data[judul]'>$data[judul]</option>";
                                                }

                                             ?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Nama & NIM</label>
                                            <select  class="form-control" name="nama">
                                           <?php   
                                                $sql = $koneksi->query("SELECT * FROM tb_anggota order by nim");
                                                while ($data=$sql->fetch_assoc()) {
                                                    echo "<option value='$data[nim].$data[nama]'>$data[nim] $data[nama]</option>";
                                                }

                                             ?>


                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Tanggal Pinjam</label>
                                            <input class="form-control " name="tgl_pinjam" type="text" value="<?= $tgl_pinjam;?>"  readonly   />
                                            
                                        </div>
                                         <div class="form-group">
                                            <label>Tanggal Kembali</label>
                                            <input class="form-control " name="tgl_kembali" type="text" value="<?= $kembali; ?>"     readonly />
                                            
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

    if (isset( $_POST['simpan'])) {
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $kembali = $_POST['tgl_kembali'];

        $buku = $_POST['buku'];
        $pecah_buku = explode(".", $buku);
        $id = $pecah_buku[0];
        $judul = $pecah_buku[1];
        

        $nama = $_POST['nama'];
        $pecah_nama = explode(".", $nama);
        $nim = $pecah_nama[0];
        $nama = $pecah_nama[1];
        



        $sql= $koneksi->query("SELECT * FROM tb_buku WHERE judul = '$judul'");
        while ($data = $sql->fetch_assoc()) {
             $sisa = $data['jumlah_buku'];

             if ($sisa == 0) {
                 ?>
                        <script type="text/javascript">
                            alert("Stock Buku HABIS!!, Transaksi DI batalkan, Silahkan Tambah Buku Terlebih Dahulu");
                            window.location.href="?page=transaksi&aksi=tambah";


                        </script>
                 <?php  
             }else{
                $sql = $koneksi->query("INSERT INTO tb_transaksi(judul, nim, nama, tgl_pinjam, tgl_kembali,pinjam)VALUES('$judul','$nim','$nama','$tgl_pinjam','$kembali','status')");

                $sql2 = $koneksi->query("UPDATE tb_buku SET jumlah_buku= (jumlah_buku-1) WHERE id= '$id'");
                 ?>
                        <script type="text/javascript">
                            alert("Simpan Data Berhasi");
                            window.location.href="?page=transaksi";


                        </script>
                 <?php  
             }
         } 

    }

     ?>










