<?php 
	
	$koneksi= new mysqli("localhost","root","","_absen");

	$filename =  "anggota_exel-(".date('d-m-Y').").xls";
	
	header("Content-type: application/vnd.ms-exel");
	header("Content-disposition: attachment; filename='$filename'");


?>
	<h2>Laporann Anggota</h2>

<table border="1">

	 <tr>
            <th>no</th>
            <th>npm</th>
            <th>nama</th>
            <th>kelas</th> 
            
            <th>jenis kelamin</th>
            <th>program studi</th>
            
    </tr>
		

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

                                           
          			
            </tr>
       <?php } ?>



</table>