<?php
$koneksi= new mysqli("localhost","root","","_absen");
$content ='
		<style type="text/css">
			.tabel{border-collapse: collapse; }
			.tabel th{padding: 8px 5px; background-color: #cccccc;}
			.tabel td{padding: 8px 5px;}
		</style>
		';
	

	$content .= '
	
		<page>
		<h1>Data Anggota !</h1> 
		<table border="2" class="tabel">
				 <tr>
                    <th>no</th>
                    <th>npm</th>
                    <th>nama</th>
                    <th>kelas</th>
                    
                    <th>jenis kelamin</th>
                    <th>program studi</th>
                    
                </tr>'; 
            $no = 1;
            
            $sql = $koneksi->query("SELECT * FROM tb_anggota ");
            
            while ($data=$sql->fetch_assoc()) { 
            
            $jk = ($data['jk']=='L')? "laki-laki" : "wanita";
            
            $prodi = ($data['prodi']=='ti')? "teknik informatika" : "Sistem Informasi";
      		         
    $content .= '

    <tr>
         <td> '.$no++.' </td>
         <td> '.$data['npm'].' </td>
         <td> '.$data['nama'].' </td>
         <td> '.$data['kelas'].' </td>
         
         <td> '.$jk.'</td>
         <td> '.$prodi.' </td>
    </tr>
       ';   
   }
       $content .= '                              

    
		</table>

		</page>';
	


	require_once('../assets/html2pdf/html2pdf.class.php');
	$html2pdf = new Html2Pdf('P','A4','fr', true, 'UTF-8', array(15, 15, 15, 15), false); 
	$html2pdf->writeHTML($content);
	$html2pdf->output('exemple.pdf');
?>