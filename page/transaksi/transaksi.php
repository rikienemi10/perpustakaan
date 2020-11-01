<a href="?page=transaksi&aksi=tambah" class="btn btn-primary " style="margin-bottom: 10px">Tambah Data</a>



<div class="row ">
    <div class="col-md-12 ">
<div class="panel panel-default">
                        <div class="panel-heading">
                             Data Transaksi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>judul</th>
                                            <th>nim </th>
                                            <th>nama</th>
                                            <th>tangal pinjam</th>
                                            <th>tanggal kembali</th>
                                            <th>terlambat</th>
                                            <th>status</th>
                                     
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                        <?php 
                                            $no = 1;
                                            $sql = $koneksi->query("SELECT * FROM tb_transaksi WHERE status ='pinjam' ");
                                            while ($data=$sql->fetch_assoc()) { 
                                            	
                                                
                                         ?>
                                            
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['judul']; ?></td>
                                            <td><?php echo $data['nim']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['tgl_pinjam']; ?></td>
                                            <td><?php echo $data['tgl_kembali']; ?></td>
                                            <td>    
                                                <?php   
                                                        $denda = 1000;

                                                        $tgl_dateline = $data['tgl_kembali'];
                                                        $tgl_kembali = date('Y-m-d');

                                                        $lambat = terlambat($tgl_dateline, $tgl_kembali);
                                                        $denda1 = $lambat*$denda;
                                                        
                                                        if ($lambat>0){
                                                            echo" 
                                                                <font color='red'>$lambat hari<br>(Rp $denda1)</font>";
                                                        }else {
                                                            echo $lambat."hari";
                                                        }
                                                 ?>
                                            </td>
                



        

                                           <td> <?php echo $data['status']; ?></td>
                                           
                                             <td >
                                                <a href="?page=transaksi&aksi=kembali&id=<?php echo $data['id'];?> &judul=<?php echo $data['judul'];?>" class="btn btn-info"  >Kembali</a> 
                                                
                                                <a href="?page=transaksi&aksi=perpanjangan&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul']?>&lambat=<?php echo $lambat ?>&tgl_kembali=<?php echo $data['tgl_kembali'] ?>"   class="btn btn-danger">Perpanjangan</a>
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



                                        


                   