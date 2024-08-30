# TUGAS 2
# Pemrograman web 2

Dalam Tugas ini kita harus menyelesaikan studi kasus dengan menggunakan langkah-langkah yang sudah kita pelajari sebelumnya pada proses pembelajaran pemrograman web2 minggu pertama. Dalam Studi kasus ini diberikan sebuah database yang berisi tabel reports dan student withdrawals. kita akan membuat view berbasis OOP dari mengambil data yang ada di dalam database. 

### 1. Kita harus menghubungkan atau melakukan koneksi dengan database yang sudah dibuat. 
```php
<?php
class database{
    private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "dbpweb2";
	protected $koneksi = "";

    function __construct(){
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
    }
	public function query($query) {
        return mysqli_query($this->koneksi, $query);
    }
}
?>
```
Dalam Code tersebut terdapat sebuah construct yang berfungsi untuk menghubungkan dengan database. konstruktor sebagai penghubung atau koneksi biasanya digunakan untuk membuat dan menginisialisasi koneksi ke database setiap kali objek dari kelas tersebut dibuat.
dapat kita lihat 
```php
 $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
```
Dalam fungsi construct kita menggunakan mysqli untuk mencoba terhubung ke dalam database dengan menggunakan informasi yang disimpan dalam properti kelas. 

Kita juga melakukan enkapsulasi atau pembatasan akses pada properti yang ada di kelas database dengan menggunakan private serta protected. 
```php
    private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "dbpweb2";
	protected $koneksi = "";
```
Dalam Code di atas kita menggunakan visibilitas private jika properti itu tidak akan kita panggil lagi di kelas turunannya serta menggunakan visibilitas protected jika properti itu akan digunakan kembali oleh kelas turunannya. setelah kita akan membuat sebuah metode baru untuk digunakan sebagai polymorphism yang memiliki arti bahwa metode itu dapat digunakan tetapi memiliki output yang berbeda. 
```php
public function query($query) {
        return mysqli_query($this->koneksi, $query);
    }
```

### 2. Setelah kita berhasil menghubungkan atau melakukan koneksi dengan database, kita bisa membuat kelas turunan dengan menggunakan konsep inheritance atau pewarisan. 
sebelum kita dapat menampilkan data yang ada dalam database kita akan membuat logik php nya terlebih dahulu 
### TABEL REPORTS
```php
<?php
require_once('koneksi.php');

class Reports extends Database{
    public function tampilReports(){
        $query = "SELECT * FROM tbl_reports";
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
```
Dalam Code di atas terdapat require_once yang berfungsi untuk menghubungkan dengan file koneksi yang sudah kita buat di atas. 
```php
require_once('koneksi.php');
```
setelah kita telah melakukan require_once kita akan membuat kelas turunan dan kelas sebelumnya yaitu kelas report yang merupakan turunan dari kelas database.
```php
class Reports extends Database{
    public function tampilReports(){
        $query = "SELECT * FROM tbl_reports";
        $data = mysqli_query($this->koneksi, $query);
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
    }
}
```
Dalam Class tersebut terdapat metode untuk menampilkan data yang akan di minta. 
```php
$query = "SELECT * FROM tbl_reports";
```
Code tersebut digunakan untuk mengambil semua data yang ada di tabel tbl_reports tanpa ada kondisi atau filter.

setelah kita berhasil mengaplikasikan logik php kemudian kita akan membuat Code HTML yang sesuai.  

Berikut adalah contoh full Code beserta Output yang akan dihasilkan. 
```php
<?php
require_once('koneksi.php');

class Reports extends Database{
    public function tampilReports(){
        $query = "SELECT * FROM tbl_reports";
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
	<p><center><b>Menampilkan SEMUA data REPORTS</b></center></p>
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
```
![image](https://github.com/user-attachments/assets/eaf810a9-8c98-4669-9375-e77ad3e4ee80)


### TABEL STUDENT WITHDRAWALS
```php
<?php
require_once('koneksi.php');

class Student_Withdrawals extends Database{
    public function TampilStudent(){
        $query = "SELECT * FROM student_withdrawals";
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
```
Dalam Code di atas terdapat require_once yang berfungsi untuk menghubungkan dengan file koneksi yang sudah kita buat di atas. 
```php
require_once('koneksi.php');
```
setelah kita telah melakukan require_once kita akan membuat kelas turunan dan kelas sebelumnya yaitu kelas report yang merupakan turunan dari kelas database.
```php
class Student_Withdrawals extends Database{
    public function TampilStudent(){
        $query = "SELECT * FROM student_withdrawals";
        $data = mysqli_query($this->koneksi, $query);
        while ($row = mysqli_fetch_array($data)){
            $hasil[]= $row;
        }
        return $hasil;
    }
}
```
Dalam Class tersebut terdapat metode untuk menampilkan data yang akan di minta. 
```php
$query = "SELECT * FROM student_withdrawals";
```
Code tersebut digunakan untuk mengambil semua data yang ada di tabel student_withdrawals tanpa ada kondisi atau filter.

setelah kita berhasil mengaplikasikan logik php kemudian kita akan membuat Code HTML yang sesuai.  

Berikut adalah contoh full Code beserta Output yang akan dihasilkan. 
```php
<?php
require_once('koneksi.php');

class Student_Withdrawals extends Database{
    public function TampilStudent(){
        $query = "SELECT * FROM student_withdrawals";
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
    <p><center>Menampilkan SEMUA DATA STUDENT WITHDRAWALS</p><br><br>
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
```
![image](https://github.com/user-attachments/assets/3fbcfaf1-6d78-49ee-872e-7393486a4ae5)


### 3. Setelah kita sudah bisa membuat tampilan dari semua isi yang ada di dalam tabel. Sekarang kita akan menampilkan data dengan ketentuan tertentu menggunakan polymorphism.
### TABEL REPORTS
sebelum kita akan menampilkan sebuah data, kita harus membuat logik php terlebih dahulu. 
```php
require_once('koneksi.php');

class Reports extends Database{
	public function query($query) {
        echo "Menjalankan query di kelas Reports: $query";
        return parent::query($query);
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
```
Dalam code tersebut terdapat fungsi Require_once
```php
require_once('koneksi.php');
```
Code tersebut digunakan untuk menghubungkan dengan file koneksi yang sudah kita buat di atas. Setelah kita melakukan require_once maka kita akan membuat kelas turunan yang sama persis dengan Code logik php pada point ke 2. disini kita hanya menambahkan metode Query yang terdapat
```php
        return parent::query($query);
```
Memanggil metode query yang ada di kelas induk yaitu kelas database dan menjalankannya. 

Kita akan mengambil data untuk ditampilkan dengan menggunakan Code
```php
$query = "SELECT * FROM tbl_reports WHERE status ='approved'";
```
Metode ini digunakan untuk mengambil data dari tabel tbl_reports di database, tetapi hanya data yang memiliki status 'approved'.

Jika logik php sudah kita selesaikan, maka tugas kita adalah membuat html sebagai tampilannya. 
```php
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
```
![image](https://github.com/user-attachments/assets/32c7ba95-fb76-4125-be7e-c37b715a99f6)


### TABEL STUDENT WITHDRAWALS
sebelum kita akan menampilkan sebuah data, kita harus membuat logik php terlebih dahulu. 
```php
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
```
Dalam code tersebut terdapat fungsi Require_once
```php
require_once('koneksi.php');
```
Code tersebut digunakan untuk menghubungkan dengan file koneksi yang sudah kita buat di atas. Setelah kita melakukan require_once maka kita akan membuat kelas turunan yang sama persis dengan Code logik php pada point ke 2. disini kita hanya menambahkan metode Query yang terdapat
```php
        return parent::query($query);
```
Memanggil metode query yang ada di kelas induk yaitu kelas database dan menjalankannya. 

Kita akan mengambil data untuk ditampilkan dengan menggunakan Code
```php
$query = "SELECT * FROM student_withdrawals WHERE withdrawal_type='withdrawal'";
```
Metode ini digunakan untuk mengambil data dari tabel student_withdrawals di database, tetapi hanya data yang memiliki withdrawal type 'withdrawal'.

Jika logik php sudah kita selesaikan, maka tugas kita adalah membuat html sebagai tampilannya. 
```php
<?php
require_once('koneksi.php');

class Student_Withdrawals extends Database{
    public function query($query) {
        echo "Menjalankan query di kelas Reports: $query";
        return parent::query($query); 
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
```
![image](https://github.com/user-attachments/assets/dd596943-0974-42c3-a93e-b7082d18963b)


### 4. Untuk mempercantik tampilan yang kita buat, kita bisa menggunakan Bootstrap
Berikut adalah Full Code beserta output yang diberikan 
```php
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas 2 PWeb2</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar-custom {
      background-color: #563d7c; 
    }
    .navbar-custom .navbar-brand,
    .navbar-custom .nav-link {
      color: #fff; 
    }
    .navbar-custom .nav-link:hover {
      color: #d1c4e9; 
    }
    .navbar-custom .btn-outline-light {
      color: #fff; 
      border-color: #fff; 
    }
    .navbar-custom .btn-outline-light:hover {
      color: #563d7c;
      background-color: #fff; 
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Riris</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="tampil_student_withdrawals.php">Student Withdrawals</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="student_withdrawals2.php">Student Withdrawals 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tampil_reports.php">Reports</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reports_2.php">Reports 2</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Konten Utama -->
  <div class="container mt-5">
    <h1 class="text-center">Selamat Datang!!!</h1>
    <p class="text-center">Ini adalah halaman utama dari Tugas 2 dalam mata kuliah Praktikum Pemrograman Web 2 yang diampu oleh Bapak Prih Diantono Abda'u, S.Kom., M.Kom
    </p>
    <p class="text-center">by Rizki Khomsatun Barokah (TI-2A)</p>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

```
![image](https://github.com/user-attachments/assets/5ba48e20-d92e-4dff-9d41-51f41e5da7ca)

