<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/hedvig-letters-serif" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Varta:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="landing.css">
    <link rel="stylesheet" href="style.css">

    <style>

    </style> 
</head>
<body>
    <div class="container">
        <div class="nav">
            <div class="logo">
                <img src="logo.png" alt="">
            </div>
                <ul>
                    <li><a href="landing.php">HOME</a></li>
                    <li><a href="menu.html">MENU</a></li>
                    <li><a href="reservasi.html">RESERVASI</a></li>
                    <li><a href="tentang-kami.html">TENTANG KAMI</a></li>
                    <div class="profil">
    <?php if (isset($_SESSION['user'])): ?>
        <li class="user-dropdown">
            <a href="#" id="userDropdownBtn" style="display:flex;align-items:center;position:relative;">
                <img src="user.png" alt="User" style="width:28px;height:28px;border-radius:50%;margin-right:8px;">
                <?php echo htmlspecialchars($_SESSION['user']); ?>
                <i class="fa fa-caret-down" style="margin-left:6px;"></i>
            </a>
            <ul class="dropdown-menu" id="userDropdownMenu">
                <li><a href="profile.php">Setting Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
    <?php else: ?>
        <li><a href="login.php" style="color:#fff;">Login</a></li>
    <?php endif; ?>
</div>
                </ul>
        </div>
        <div class="main aos">
            <p class="main-text">LAMAK <span>BANA</span></p>
            <p class="second-text">"Menghadirkan cita rasa autentik Minang dalam sentuhan modern yang elegan."</p>
        </div>


        <div class="menu-pilihan">
            <h3>MENU PILIHAN</h3>
            <div class="content-menu menu-rendang aos aos--fade-up">
                <div class="rendang">
                    <div class="rendang-text">
                        <button>Tampilkan Menu</button>
                    </div>
                </div>
                <div class="info-menu info-menu-rendang">
                <p class="sub-menu sub-rendang">RENDANG</p>
                <p class="menu-text-rendang">
                   Rendang adalah mahakarya kuliner Minangkabau yang telah diakui dunia sebagai salah satu makanan terlezat. Hidangan ini dibuat dari daging sapi pilihan yang dimasak perlahan bersama santan dan campuran rempah autentik selama berjam-jam.
                <p class="harga">RP 25.000</p>
                <a href="" class="link link-rendang">Tampilkan Menu</a>
                </div>
            </div>
        </div>

            <div class="content-menu menu-dendeng aos aos--fade-left">
                <div class="info-menu info-menu-dendeng">
                <p class="sub-menu sub-dendeng">Dendeng</p>
                    <p class="menu-text">
                        Figma ipsum component variant main layer. Group invite component invite selection rotate asset shadow clip style. Duplicate edit ipsum ipsum opacity scrolling content invite inspect. Duplicate variant list figma stroke union team arrange vertical scrolling.
                    </p>
                    <p class="harga harga-dendeng ">RP 25.000</p>
                    <a href="" class="link link-dendeng">Tampilkan Menu</a>
                </div>
                    <div class="dendeng">
                    <div class="rendang-text">
                        <button>Tampilkan Menu</button>
                    </div>
                    </div>
            </div>
        </div>

<div class="galery-container aos aos--scale">
  <div class="judul-galeri">
    <h3>GALERI</h3>
  </div>

  <div class="galeri">
    <!-- set pertama -->
    <div class="galeri-track">
      <div class="gambar1"></div>
      <div class="gambar2"></div>
      <div class="gambar3"></div>
      <div class="gambar4"></div>
      <div class="gambar5"></div>
      <div class="gambar6"></div>
      <div class="gambar7"></div>
      <div class="gambar8"></div>
      <div class="gambar9"></div>
      <div class="gambar10"></div>
      <div class="gambar11"></div>
      <div class="gambar12"></div>
    </div>

    <!-- duplikat untuk looping -->
    <!-- <div class="galeri-track">
      <div class="gambar1"></div>
      <div class="gambar2"></div>
      <div class="gambar3"></div>
      <div class="gambar4"></div>
      <div class="gambar5"></div>
      <div class="gambar6"></div>
      <div class="gambar7"></div>
      <div class="gambar8"></div>
      <div class="gambar9"></div>
      <div class="gambar10"></div>
      <div class="gambar11"></div>
      <div class="gambar12"></div>
    </div> -->
  </div>
</div>

    <div class="tentang-kami aos aos--fade-down">
        <p class="judul">TENTANG KAMI</p>
            <p class="text">Figma ipsum component variant main layer. Blur vertical bullet arrange inspect invite. Main figma shadow project scale layer undo list mask. Draft duplicate list object pixel edit fill undo subtract auto. Figma frame vertical invite arrange selection.</p>
            <p class="text">Figma ipsum component variant main layer. Blur vertical bullet arrange inspect invite. Main figma shadow project scale layer undo list mask. Draft duplicate list object pixel edit fill undo subtract auto. Figma frame vertical invite arrange selection.</p>
    </div>

    <div class="info-kami aos aos--fade-right">
        <div class="info-content">
        <div class="alamat">
            <p class="judul">LAMAK BANA</p>
            <p class="text">JL. Figma ipsum component variant main layer. Stroke layer slice layer project</p>
            <p class="text">+628 1112 3333 222</p>
            <p class="text">lamakbaanaresto@gmail.com</p>
            <p class="copy">&copy;2025 Lamak Baana | All rights reserved</p>
        </div>

        <div class="contact">
            <div class="icon">
            <p class="judul">Follow Us</p>
            <a  href="https://instagram.com/akunmu" target="_blank" class="social instagram">
            <i class="fa-brands fa-instagram"></i>lamakbanaresto
            </a>
            
            <a href="https://tiktok.com/@akunmu" target="_blank" class="social tiktok">
         <i class="fa-brands fa-tiktok"></i>lamakbanaresto
         </a>

            <a href="https://facebook.com/akunmu" target="_blank" class="social facebook">
            <i class="fa-brands fa-facebook"></i>lamakbanaresto
            </a>
            </div>
            <div class="link-content">
            <a href="" class="link-info">Privacy Policy</a>
            <a href="" class="link-info link-info-2">Term of Use</a>
            </div>
        </div>
        </div>
    </div>
    </div>
</body>
<script src="script.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('userDropdownBtn');
    const menu = document.getElementById('userDropdownMenu');
    const dropdown = btn?.parentElement;

    if (btn && menu && dropdown) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            dropdown.classList.toggle('open');
        });

        // Close dropdown if click outside
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove('open');
            }
        });
    }
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
  const main = document.querySelector('.main.aos');
  if (!main) return;

  const observer = new IntersectionObserver(
    ([entry]) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('show');
        observer.unobserve(entry.target);
      }
    },
    { threshold: 0.3 }
  );

  observer.observe(main);
});
/* IntersectionObserver - animate on scroll */
const animateOnScroll = () => {
  const els = document.querySelectorAll('.aos');
  if (!els.length) return;

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('show');
          observer.unobserve(entry.target); 
        }
      });
    },
    { threshold: .15 } 
  );

  els.forEach(el => observer.observe(el));
};
document.addEventListener('DOMContentLoaded', animateOnScroll);
</script>
</html>