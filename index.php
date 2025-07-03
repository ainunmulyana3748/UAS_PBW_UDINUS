<?php
include "koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Daily Jurnal</title>
  <link
    rel="icon"
    href="https://img.notionusercontent.com/s3/prod-files-secure%2F332d3749-1e40-47dd-9041-59670fa067ee%2F92786fe7-1022-485c-a5a0-210603788a58%2Flogo.png/size/w=140?exp=1751509068&sig=73fl8IQUxY48jQE_s30EPJZo6PCaD9NazKVR3NCXfQQ&id=4c9bbd35-3032-49da-9623-4ef8df2066cf&table=block" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous" />

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<style>
  .dark-mode {
    background-color: black;
    color: white;
    transition: background-color 0.3s ease;
  }

  .card-dark-mode {
    background-color: #6c757d;
    color: white;
    transition: background-color 0.3 ease;
  }
</style>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">My Daily Journal</a>

      <div class="d-flex align-items-center gap-3">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <ion-icon
          name="moon-sharp"
          class="fs-4 text-dark d-lg-none"
          style="cursor: pointer"
          id="changeThemeMobile"></ion-icon>
      </div>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-3">
          <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#article">Article</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gallery">Gallery</a>
          </li>
          <li class="nav-item">
            <a href="login.php" class="btn btn-primary">Login</a>
          </li>

          <li class="nav-item d-none d-lg-block">
            <ion-icon
              name="moon-sharp"
              style="cursor: pointer"
              class="fs-4 text-dark mt-2"
              id="changeThemeDesktop"></ion-icon>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section
    class="hero text-sm-start"
    style="background-color: #f8d7da; transition: background-color 0.3s ease"
    id="hero">
    <div class="container py-5">
      <div
        class="d-flex flex-row-reverse justify-content-between align-items-center">
        <img
          src="assets/img-hero.jpeg"
          class="img-fluid"
          width="300"
          alt="Hero Image" />
        <div>
          <h1 class="fw-bold display-4">
            Create Memories, Save Memories, Everyday
          </h1>
          <h4 class="lead display-6">
            Mencatat semua kegiatan sehari-hari yang ada tanpa terkecuali
          </h4>
          <h6>
            <span id="tanggal"></span>
            <span id="jam"></span>
          </h6>
        </div>
      </div>
    </div>
  </section>

  <!-- article begin -->
  <section id="article" class="text-center p-5">
    <div class="container">
      <h1 class="fw-bold display-4 pb-3">Article</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        <?php
        $sql = "SELECT * FROM article ORDER BY tanggal DESC";
        $hasil = $conn->query($sql);
        $uploadDir = 'uploads/';

        while ($row = $hasil->fetch_assoc()) {
          $imgPath = $uploadDir . $row["gambar"];
        ?>
          <div class="col">
            <div class="card h-100 shadow-sm">
              <?php if (!empty($row["gambar"]) && file_exists($imgPath)) { ?>
                <img src="<?= $imgPath ?>" class="card-img-top" alt="Gambar artikel">
              <?php } else { ?>
                <div class="text-muted p-5">Gambar tidak tersedia</div>
              <?php } ?>
              <div class="card-body">
                <h5 class="card-title"><?= $row["judul"] ?></h5>
                <p class="card-text"><?= $row["isi"] ?></p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"><?= $row["tanggal"] ?></small>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- article end -->

  <!-- gallery -->
  <section class="gallery" style="background-color: #f8d7da" id="gallery">
    <div class="container py-4 d-flex flex-column align-items-center gap-4">
      <h1 class="text-center fw-bold">Gallery</h1>

      <img
        src="https://connect-assets.prosple.com/cdn/ff/TouHianBeKz2FEhGZfw9Mx0Rv-9pIOd23RnY5rql5-M/1656880931/public/styles/scale_and_crop_center_696x696/public/2022-06/thumbnail-article-10-manfaat-ikut-organisasi-kampus-2022.jpg?itok=HW88Qiwo"
        alt="gallery"
        class="w-50" />
    </div>
  </section>

  <!-- footer -->
  <footer class="bg-dark text-white py-4">
    <div class="container d-flex flex-column align-items-center">
      <div class="d-flex gap-3">
        <i class="bi bi-instagram"></i>
        <i class="bi bi-twitter"></i>
        <i class="bi bi-whatsapp"></i>
      </div>
      <div>
        <p>Ainun Mulyana &copy; 2025</p>
      </div>
    </div>
  </footer>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>

  <script
    type="module"
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script
    nomodule
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <script src="main.js" defer></script>
</body>

</html>