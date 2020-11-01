



<div class="row ">
    <div class="col-md-12 ">
<div class="panel panel-default">
                        <div class="panel-heading">
                             Data Buku
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Npm</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                           
                                            <th>Jenis Kelamin</th>
                                            <th>Program Studi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                        <?php 
                                            $no = 1;
                                            $sql = $koneksi->query("SELECT * FROM tb_anggota ");
                                            while ($data=$sql->fetch_assoc()) { 
                                            	$jk = ($data['jk']=='L')? "laki-laki" : "wanita";
                                            	$prodi = ($data['prodi']=='ti')? "teknik informatika" : "Sistem Informasi";
                                                
                                         ?>
                                            
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['npm']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['kelas']; ?></td>
                                            <td><?php echo $jk; ?></td>
                                            <td><?php echo $prodi; ?></td>

                                           
                                             <td >
                                                 
                                                 <a href="?page=anggota&aksi=ubah&npm=<?= $data['npm']; ?>" class="btn btn-primary">Ubah</a>
                                                <a  href="?page=anggota&aksi=hapus&npm=<?= $data['npm']; ?>"  onclick="return confirm('anda yakin ingin hapus')" class="btn btn-danger">Hapus</a>
                                             </td>   
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>

                            </div>
                            <a href="?page=anggota&aksi=tambah" class="btn btn-success " style="margin-bottom: 10px" ><i class="fa fa-plus"></i>Tambah Data</a>
                            <a href="./laporan/laporan_anggota_exel.php" target="_blank" class="btn btn-default" style="margin-top: -10px;"><i class="fa fa-print"></i>ExportToExel </a>
                            <a href="./laporan/laporan_anggota_pdf.php" target="_blank" class="btn btn-default" style="margin-top: -10px;"><i class="fa fa-print"></i>ExportToPdf </a>
                        </div>
                    </div>
                </div>
            </div>



                                        


                   