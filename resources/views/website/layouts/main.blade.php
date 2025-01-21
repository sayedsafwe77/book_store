<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
      integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Link to the file hosted on your server, -->
    <!-- <link rel="stylesheet" href="path-to-the-file/splide.min.css"> -->
    <!-- or link to the CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/css/splide-core.min.css"
      integrity="sha512-cSogJ0h5p3lhb//GYQRKsQAiwRku2tKOw/Rgvba47vg0+iOFrQ94iQbmAvRPF5+qkF8+gT7XBct233jFg1cBaQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- <link rel="stylesheet" href="url-to-cdn/splide.min.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('css/reset.css')}}" />
    <link rel="stylesheet" href="{{asset('css/layout.css')}}" />
    <title>@yield('title')</title>
    @stack('css')
  </head>

  <body>
    <section class="hero-section">
      <header>
        <nav class="navbar navbar-expand-lg">
          <div class="container">
            <a class="navbar-brand" href="index.html">
              <img src="./images/logo.png" alt="" />
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <i class="fa-solid fa-bars text-light"></i>
              <!-- <span class="navbar-toggler-icon "></span> -->
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    aria-current="page"
                    href="index.html"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="books.html">Books</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html">About us</a>
                </li>
              </ul>
              <!-- <div class="d-flex gap-3">
                <a class="main_btn login_btn" href="login.html" type="button"
                  >Log in</a
                >
                <a class="primary_btn" href="register.html" type="button"
                  >Sign Up
                </a>
              </div> -->
              <div class="profile d-flex gap-4 align-items-center">
                <a href="wishlist.html" class="wishlist-link">
                  <span>1</span>
                  <i class="fa-regular fa-heart fs-3"></i
                ></a>
                <a href="cart.html" class="cart-link">
                  <span>1</span>

                  <i class="fa-solid fa-cart-shopping fs-3"></i
                ></a>
                <div class="dropdown">
                  <button
                    class="dropdown-toggle d-flex align-items-center border-0 profile_dropdown gap-2"
                    type="button"
                    id="dropdownMenuButton1"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <div class="profile_image">
                      <img
                        src="./images/commentimage.jpeg"
                        alt=""
                        class="w-100 h-100"
                      />
                    </div>
                    <div class="flex-column align-items-start">
                      <p class="fs-6 fw-bold text-light text-start">
                        Ahmed Fawzy
                      </p>
                      <p class="text-secondary">fawzy@gmail.com</p>
                    </div>
                  </button>
                  <ul
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton1"
                  >
                    <li>
                      <a class="dropdown-item" href="profile.html">Profile</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="orders.html"
                        >Order History</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Log Out</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
        <div class="overlay"></div>
      </header>
      @yield('hero_content')
    </section>

    @yield('content')
    <footer>
      <div class="container">
        <div
          class="d-flex justify-content-between align-items-center border-bottom pb-4 flex-wrap gap-4"
        >
          <div class="d-flex gap-4 align-items-center">
            <div class="logo_image">
              <img src="./images/logo.png" alt="logo" />
            </div>
            <div class="links_footer">
              <ul class="d-flex gap-3 align-items-center p-0 m-0">
                <li><a href="index.html" class="nav-link.active">Home</a></li>
                <li><a href="index.html" class="nav-link.active">Books</a></li>
                <li>
                  <a href="index.html" class="nav-link.active">About Us</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="social-icons d-flex gap-3">
            <img src="images/face.png" alt="" />
            <img src="images/insta.png" alt="" />
            <img src="images/youtube.png" alt="" />
            <img src="images/x.png" alt="" />
          </div>
        </div>
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gap-4 pt-4"
        >
          <div>
            <p class="text-light">
              &lt; Developed By &gt; EraaSoft &lt; All Copy Rights Reserved @
              2024
            </p>
          </div>
          <div class="lang d-flex gap-3">
            <img src="./images/lang.png" alt="" class="image_lang" />
            <select name="lang" id="lang">
              <option value="english" class="d-flex align-items-center">
                English
              </option>
              <option value="arabic">عربي</option>
            </select>
          </div>
        </div>
      </div>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    @stack('js')
  </body>
</html>
