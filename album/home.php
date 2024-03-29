
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Blog Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css/head.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style/blog.css" rel="stylesheet">
    <link href="style/headers.css" rel="stylesheet">
    <link href="style/carousel.css" rel="stylesheet">
    <link href="style/features.css" rel="stylesheet">

  </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="aperture" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
    <circle cx="12" cy="12" r="10"/>
    <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/>
  </symbol>
  <symbol id="cart" viewBox="0 0 16 16">
    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
  <symbol id="chevron-right" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
  </symbol>
</svg>

<div class="container">
  <header class="border-bottom lh-1 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
    <center> <div class="col-4 text-center">
        <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">JAMILLE</a>
      </div>
      </center>
      <div class="col-2 d-flex justify-content-end align-items-center">
        <a class="link-secondary" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
      </div>
    </div>
  </header>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="home.php">HOME</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="BLOG.php">BLOG</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">PRODUCT</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBRAND" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          BRAND
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownBRAND">
          <li><a class="dropdown-item" href="https://www.ysl.com/en-th/shop-women/handbags/all-handbags">YSL</a></li>
            <li><a class="dropdown-item" href="https://www.gucci.com/th/th/ca/women/handbags-c-women-handbags">GUCCI</a></li>
            <li><a class="dropdown-item" href="https://www.chanel.com/th/fashion/handbags/c/1x1x1/">CHANEL</a></li>
            <li><a class="dropdown-item" href="https://www.dior.com/en_th/fashion/womens-fashion/bags/handbags">DIOR</a></li>
            <li><a class="dropdown-item" href="https://www.lynaccs.com/th/bags/view-all-bags.html">LYN</a></li>
            <li><a class="dropdown-item" href="https://www.celine.com/th-th/celine-%E0%B8%AA%E0%B8%B3%E0%B8%AB%E0%B8%A3%E0%B8%B1%E0%B8%9A%E0%B8%9C%E0%B8%B9%E0%B9%89%E0%B8%AB%E0%B8%8D%E0%B8%B4%E0%B8%87/%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B9%80%E0%B8%9B%E0%B9%8B%E0%B8%B2%E0%B8%96%E0%B8%B7%E0%B8%AD/">CELINE</a></li>
            </ul>
      </li>
            
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCATEGORY" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          CATEGORY
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownCATEGORY">
          <li><a class="dropdown-item" href="products_type1.php">Mini bag</a></li>
            <li><a class="dropdown-item" href="products_type2.php">Clutch bag</a></li>
            <li><a class="dropdown-item" href="products_type3.php">Backpack</a></li>
            <li><a class="dropdown-item" href="products_type4.php">Card holder</a></li>
            <li><a class="dropdown-item" href="products_type5.php">Hobo bag</a></li>
          </ul>
        </li>
      </ul>
      
      
      
      <ul class="navbar-nav">
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="login.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="img/00.jpg" alt="mdo" width="50" height="50" class="rounded-circle"></a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="edit.php">Profile</a></li>
            <li><a class="dropdown-item" href="view_order.php">ประวัติการซื้อ</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
          </ul>
        </li>
      </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>

<main><br>
<div class="container marketing">
<!-- Three columns of text below the carousel -->
<main><br>
<div class="container marketing">
<!-- Three columns of text below the carousel -->
<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    
    <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="imgs/1.jpg" class="d-block w-100" alt="Slide 1">
        <div class="container">
          <div class="carousel-caption text-start">
            
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img src="imgs/3.png" class="d-block w-100" alt="Slide 2">
        <div class="container">
          <div class="carousel-caption">
  
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img src="imgs/4.png" class="d-block w-100" alt="Slide 3">
        <div class="container">
          <div class="carousel-caption text-end">
            
          </div>
        </div>
      </div>
    </div>
    <br>
    <hr class="featurette-divider">
<center><div class="row">
  <div class="col-lg-2">
    <img src="img/24.jfif" class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/>
    <h2 class="fw-normal">YSL</h2>
    
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-2">
    <img src="img/107.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/>
    <h2 class="fw-normal">GUCCI</h2>
    
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-2">
    <img src="img/109.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/>
    <h2 class="fw-normal">CELINE</h2>
    
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-2">
    <img src="img/103.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/>
    <h2 class="fw-normal">LYN</h2>
    
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-2">
    <img src="img/34.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/>
    <h2 class="fw-normal">CHANEL</h2>
    
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-2">
    <img src="img/35.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/>
    <h2 class="fw-normal">DIOR</h2>
    
  </div><!-- /.col-lg-4 -->
</div></center>

    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<!-- START THE FEATURETTES -->
<hr class="featurette-divider">
<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading fw-normal lh-1">JAMILLE<span class="text-body-secondary"></span></h2>
    <p class="lead">แหล่งรวมสินค้าแบรนด์เนม ที่เป็นศูนย์กลางการซื้อ ขายและฝากขาย สินค้าใกล้คุณ</p>
  </div>
  <div class="col-md-5">
    <img src="img/38.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="250" height="250" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text>
  </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7 order-md-2">
    <h2 class="featurette-heading fw-normal lh-1">JAMILLE<span class="text-body-secondary"></span></h2>
    <p class="lead">แหล่งรวมสินค้าแบรนด์เนม ที่เป็นศูนย์กลางการซื้อ ขายและฝากขาย สินค้าใกล้คุณ</p>
  </div>
  <div class="col-md-5 order-md-1">
    <img src="img/39.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="300" height="300" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text>
  </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading fw-normal lh-1">BLOG FOR ALL<span class="text-body-secondary"></span></h2>
    <p class="lead">บล็อกแฟชั่นชั้นนำที่จะทำให้คุณประทับใจ</p>
  </div>
  <div class="col-md-5">
    <img src="img/37.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="300" height="300" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em"></text>
  </div>
</div>
<!-- /END THE FEATURETTES -->
</div><!-- /.container -->
<!-- FOOTER -->
<hr class="featurette-divider">
<footer class="container">
<center><div class="container px-4 py-5" id="featured-3">
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">
      <center><div class="feature d-inline-flex align-items-center justify-content-center bg-gradient fs-2 mb-3">
    <img src="img/006.png" style="border-radius: 50%;" width="50" height="50">
      </div></center>
        <h3 class="fs-2 text-body-emphasis">ของแท้คือใจความสำคัญ</h3>
        <p>เราให้ความสำคัญกับสินค้าแท้ จึงใช้ Warranty Card เพื่อรับประกันว่าสินค้าจากเราเป็นของแท้อย่างแน่นอน</p>
      </div>
      <div class="feature col">
      <center><div class="feature d-inline-flex align-items-center justify-content-center  bg-gradient fs-2 mb-3">
    <img src="img/003.png" style="border-radius: 50%;" width="50" height="50">
      </div></center>
        <h3 class="fs-2 text-body-emphasis">การรับซื้อที่เป็นเลิศ</h3>
        <p>การขายกับเราจะได้รับเงินเร็วที่สุด และการการันตีถึงผู้ซื้อว่าได้รับสินค้าแท้ 100% เรามีทีมงานคอยตรวจสินค้าทุกชิ้น</p>
      </div>
      <div class="feature col">
      <center><div class="feature d-inline-flex align-items-center justify-content-center bg-gradient fs-2 mb-3">
    <img src="img/004.jpg" style="border-radius: 50%;" width="50" height="50">
     </div></center>
        <h3 class="fs-2 text-body-emphasis">การบริการที่ยอดเยี่ยม</h3>
        <p>มอบประสบการณ์ที่ดีสุดสำหรับลูกค้า ไม่ว่าจะเป็นการจัดส่ง ที่รวดเร็วพร้อมบริการรับซื้อคืนสำหรับสินค้าที่ซื้อจากเรา</p>
      </div>
    </div>
  </div></center>
</footer>
</main>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- ก่อนปิด </body> tag -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
