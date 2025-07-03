const changeThemeMobile = document.getElementById("changeThemeMobile");
const changeThemeDesktop = document.getElementById("changeThemeDesktop");
const changeBackgroundHeroSection = document.getElementById("hero");
const changeBackgroundGallerySection = document.getElementById("gallery");
const changeStyleCardArticle = document.querySelectorAll(".card");

// mobile
changeThemeMobile.addEventListener("click", () => {
  //Untuk rubah icon
  document.body.classList.toggle("dark-mode");
  const isDark = document.body.classList.contains("dark-mode");
  changeThemeMobile.setAttribute("name", isDark ? "sunny-sharp" : "moon-sharp");

  //Untuk rubah theme hero section
  changeBackgroundHeroSection.style.backgroundColor = isDark
    ? "#6c757d"
    : "#f8d7da";

  //untuk rubah background color section gallery
  changeBackgroundGallerySection.style.backgroundColor = isDark
    ? "#6c757d"
    : "#f8d7da";

  //untuk ubah style card ketika darkmode
  changeStyleCardArticle.forEach((card) => {
    card.classList.toggle("card-dark-mode", isDark);
  });
});

// desktop
changeThemeDesktop.addEventListener("click", () => {
  //Untuk rubah icon
  document.body.classList.toggle("dark-mode");
  const isDark = document.body.classList.contains("dark-mode");
  changeThemeDesktop.setAttribute(
    "name",
    isDark ? "sunny-sharp" : "moon-sharp"
  );

  //Untuk rubah theme hero section
  changeBackgroundHeroSection.style.backgroundColor = isDark
    ? "#6c757d"
    : "#f8d7da";

  //untuk rubah background color section gallery
  changeBackgroundGallerySection.style.backgroundColor = isDark
    ? "#6c757d"
    : "#f8d7da";

  //untuk ubah style card ketika darkmode
  changeStyleCardArticle.forEach((card) => {
    card.classList.toggle("card-dark-mode", isDark);
  });
});

//tanggal dan jam
const tampilWaktu = () => {
  const waktu = new Date();
  const bulan = waktu.getMonth() + 1;
  const tanggal = waktu.getDate();
  const tahun = waktu.getFullYear();
  const jam = waktu.getHours().toString().padStart(2, "0");
  const menit = waktu.getMinutes().toString().padStart(2, "0");
  const detik = waktu.getSeconds().toString().padStart(2, "0");

  const elTanggal = document.getElementById("tanggal");
  const elJam = document.getElementById("jam");

  if (elTanggal && elJam) {
    elTanggal.innerHTML = `${tanggal}/${bulan}/${tahun}`;
    elJam.innerHTML = `${jam}:${menit}:${detik}`;
  }

  setTimeout(tampilWaktu, 1000);
};

// Panggil langsung tanpa event listener
tampilWaktu();
console.log("ea");
