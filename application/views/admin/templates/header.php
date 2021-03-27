<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $judul; ?></title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style type="text/css">
    .navbar-nav > li{
  margin-left:10px;
  margin-right:15px;
}
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <!-- Brand -->
   <a class="navbar-brand" href="<?= base_url(); ?>">
      <img src="https://www.logolynx.com/images/logolynx/dd/dd4ba712584a5fac0a5690415ee5ee86.png" width="40" height="40">
      School Management
    </a>

  <!-- Links -->
  <ul class="navbar-nav ml-auto">

  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Data Siswa
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= base_url(); ?>siswa7a">Siswa 7-A</a>
        <a class="dropdown-item" href="<?= base_url(); ?>siswa7b">Siswa 7-B</a>
        <a class="dropdown-item" href="<?= base_url(); ?>siswa8a">Siswa 8-A</a>
        <a class="dropdown-item" href="<?= base_url(); ?>siswa8b">Siswa 8-B</a>
        <a class="dropdown-item" href="<?= base_url(); ?>siswa9a">Siswa 9-A</a>
        <a class="dropdown-item" href="<?= base_url(); ?>siswa9b">Siswa 9-B</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url(); ?>guru">Data Guru</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url(); ?>matpel">Data Mata Pelajaran</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url(); ?>kelas">Daftar Kelas</a>
    </li>
     <li class="nav-item">
    <a href="<?= base_url(); ?>home/logout" class="btn btn-outline-danger">Logout</a>
     </li>
  </ul>
</nav>