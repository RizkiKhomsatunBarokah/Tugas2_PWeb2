<?php
require_once('koneksi.php');

class Reports extends Database{
	public function query($query) {
        echo "Menjalankan query di kelas Reports: $query";
        return parent::query($query); // Memanggil metode query di kelas induk (Database)
    } 

    public function tampilReports(){
        $query = "SELECT * FROM tbl_reports WHERE status ='approved'";
        $data = mysqli_query($this->koneksi, $query);
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
    }
}
$tampil = new reports ();
$data = $tampil->tampilReports();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p><center><b>Menampilkan data REPORTS</b></center></p>
    <p><center>Hanya menampilkan data yang memiliki status approved </center></p>
<table border="1">
		<tr>
			<th>No</th>
			<th>ID Report</th>
            <th>ID Warnings</th>
			<th>ID Gpas</th>
			<th>ID Guidance</th>
			<th>ID Achievements</th>
			<th>ID Sholarship</th>
            <th>ID Student Withdrawals </th>
            <th>ID Tuition Arrears</th>
            <th>Report Date</th>
            <th>status</th>
            <th>has acc academic advisor</th>
            <th>has acc head of program</th>
		</tr>
		<?php 
		$no = 1;
		foreach($data as $row){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row['id_report']; ?></td>
                <td><?php echo $row['id_warnings']; ?></td>
				<td><?php echo $row['id_gpas']; ?></td>
				<td><?php echo $row['id_guidance']; ?></td>
				<td><?php echo $row['id_achievements']; ?></td>
                <td><?php echo $row['id_sholarship']; ?></td>
                <td><?php echo $row['id_student_withdrawals']; ?></td>
                <td><?php echo $row['id_tuition_arrears']; ?></td>
                <td><?php echo $row['report_date']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['has_acc_academic_advisor']; ?></td>
                <td><?php echo $row['has_acc_head_of_program']; ?></td>
			</tr>
			<?php 
		}
		?>
	</table>
	<br>
	<a href="home.php">Kembali Ke halaman Utama</a>
</body>
</html>