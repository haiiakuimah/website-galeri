<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web galeri</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css"/>
    <!-- Light Box -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <!-- Light Box CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/lightbox.css" />
    
    
</head>
<body>

    <section id="header" class="header">
        <a href="#" class="logo"><img src="{{ asset('assets/images/logo-galeri3.png') }}" alt="logo-galeri3.png"></a>
          <nav class="navbar">
            <a href="#home">home</a>
            <a href="{{ route('register') }}">register</a>
            <a href="{{ route('login') }}">login</a>
           </nav>
    </section>

<!-- gallery section starts -->

<section class="gallery" id="home">
    <h1 class="heading">foto <span>galeri</span></h1>
    <div class="box-container">
    @foreach ($galeris as $galeri)
        <div class="box">
            <a href="{{ Storage::url($galeri->lokasiFile) }}" data-lightbox="models" data-title="{{ $galeri->deskripsiFoto }}">
            <img decoding="async" src="{{ Storage::url($galeri->lokasiFile) }}">
            </a>
        </div>
    @endforeach

    </div>
</section> 

<!-- section gallery ends -->

<!-- Footer -->
<footer>
    <div class="social">
      <a href=https://www.instagram.com/3lbsimah?igsh=M2lyOG52NnFjcWt3><i class="fa-brands fa-instagram fa-lg"></i></a>
      <a href=https://wa.link/yfm988><i class="fa-brands fa-whatsapp fa-lg"></i></a>
    </div>

    <div class="links">
     <p>Beauty is happy and everyone like it</p>
    </div>

    <div class="credit">
      <p>Created by <a href="https://github.com/haiiakuimah">muslimah</a>. | &copy; 2024.</p>
    </div>
  </footer>
  <!-- Footer ends -->

<script src="{{ asset('assets') }}/js/lightbox-plus-jquery.js" defer data-deferred="1"></script> </body>

</html>