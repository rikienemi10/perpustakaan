<a href="?page=buku&aksi=tambah" class="btn btn-primary " style="margin-bottom: 10px">Tambah Data</a>



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
                                            <th>no</th>
                                            <th>judul</th>
                                            <th>pengarang</th>
                                            <th>penerbit</th>
                                            <th>tahun_terbit</th>
                                            <th>istn</th>
                                            <th>jumlah_buku</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                        <?php 
                                            $no = 1;
                                            $sql = $koneksi->query("SELECT * FROM tb_buku ");
                                            while ($data=$sql->fetch_assoc()) { 
                                                
                                         ?>
                                            
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['judul']; ?></td>
                                            <td><?php echo $data['pengarang']; ?></td>
                                            <td><?php echo $data['penerbit']; ?></td>
                                            <td><?php echo $data['tahun_terbit']; ?></td>
                                            <td><?php echo $data['istn']; ?></td>
                                            <td><?php echo $data['jumlah_buku']; ?></td>
                                             <td >
                                                 
                                                 <a href="?page=buku&aksi=ubah&id=<?= $data['id']; ?>" class="btn btn-primary">Ubah</a>
                                                <a  href="?page=buku&aksi=hapus&id=<?= $data['id']; ?>"  onclick="return confirm('anda yakin ingin hapus')" class="btn btn-danger">Hapus</a>
                                             </td>   
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



                                        


                   