<?php
require_once('koneksi.php');

class Student_Withdrawals extends Database{
    public function query($query) {
        echo "Menjalankan query di kelas Reports: $query";
        return parent::query($query); // Memanggil metode query di kelas induk (Database)
    } 
    public function TampilStudent(){
        $query = "SELECT * FROM student_withdrawals WHERE withdrawal_type='withdrawal'";
        $data = mysqli_query($this->koneksi, $query);
        while ($row = mysqli_fetch_array($data)){
            $hasil[]= $row;
        }
        return $hasil;
    }
}
$tampil1 = new Student_Withdrawals();
$data = $tampil1->TampilStudent();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Student Withdrawals</title>
</head>
<body>
    <p><center><b>Menampilkan DATA STUDENT WITHDRAWALS</b></p><br>
    <p>Menampilkan hanya data yang memiliki jenis penarikan berupa 'withdrawals'</p>
    <table border="1">
        <tr>
            <th>No.</th>
            <th>ID Student Withdrawals</th>
            <th>ID Student</th>
            <th>Withdrawals Type</th>
            <th>Decree Number</th>
            <th>Reason</th>
        </tr>
        <?php
        $no = 1;
        foreach ($data as $row){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['id_student_withdrawals']; ?></td>
            <td><?php echo $row['id_student']; ?></td>
            <td><?php echo $row['withdrawal_type']; ?></td>
            <td><?php echo $row['decree_number']; ?></td>
            <td><?php echo $row['reason']; ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <br>
	<a href="home.php">Kembali Ke halaman Utama</a>
    </center>
</body>
</html>