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
