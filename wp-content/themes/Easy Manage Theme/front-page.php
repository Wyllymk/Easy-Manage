<?php get_header();?>

<!-- Header -->
<header id="header" class="sticky-top">

<!-- Navbar 1 - Bootstrap Brain Component -->
<nav id="scrollspyNav" class="navbar navbar-expand-md wave-bg-blue bsb-navbar bsb-navbar-hover bsb-navbar-caret">
  <div class="container">
    <a class="ms-2 navbar-brand easy-manage" href="../Easy-Manage/dashboard">
      <img src="<?php echo get_template_directory_uri(  )?>/assets/img/hero/download.png" alt="" height="24" class="d-inline-block align-text-top">
      Easy Manage
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
      </svg>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul id="bsb-tpl-navbar" class="navbar-nav justify-content-end flex-grow-1 gap-5">
          
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyServices" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasNavbar">Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyAbout" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasNavbar">About</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyPricing" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasNavbar">Pricing</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyContact" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasNavbar">Contact</a>
          </li>
          <a class="btn btn-primary px-5 align-self-center" href="<?php echo esc_url(site_url('/register/')); ?>" role="button">Sign Up</a>
          <a class="btn btn-outline-primary px-5 align-self-center" href="<?php echo esc_url(site_url('/login/')); ?>" role="button">Login</a>
        </ul>
      </div>
    </div>
  </div>
</nav>

</header>

<!-- Hero 2 - Bootstrap Brain Component -->
<section id="scrollspyHero" class="wave-bg-blue py-5 py-xl-8 py-xxl-10">
<div class="container overflow-hidden">
  <div class="row gy-5 gy-lg-0 align-items-lg-center justify-content-lg-between">
    <div class="col-12 col-lg-6 order-1 order-lg-0">
      <h1 class="display-3 fw-bolder mb-3">We provide easy <span class="wave-font-hw display-2 text-danger text-accent fw-normal">solutions</span>   for startups at affordable rates.</h1>
      <p class="fs-4 mb-5">Our methods are straight, comfortable, and established to ensure evolution and acceleration.</p>
      <div class="d-grid gap-2 d-sm-flex">
        <a class="btn btn-primary rounded-pill gap-3 px-4" href="<?php echo esc_url(site_url('/register/')); ?>" role="button">Get Started</a>
        <a class="btn btn-outline-primary rounded-pill gap-3 px-4" href="#scrollspyContact" role="button">Contact Us</a>
      </div>
    </div>
    <div class="col-12 col-lg-5 text-center">
      <img class="img-fluid mask-position-center-center mask-repeat-no-repeat mask-size-auto" loading="lazy" src="<?php echo get_template_directory_uri().'/assets/img/hero/hero-home.jpg'?>" alt="" style="-webkit-mask-image: url(<?php echo get_template_directory_uri()?>./assets/img/hero/hero-blob-1.svg); mask-image: url(<?php echo get_template_directory_uri()?>./assets/img/hero/hero-blob-1.svg);">
    </div>
  </div>
</div>
</section>

<!-- Main -->
<main id="main" data-bs-spy="scroll" data-bs-target="#scrollspyNav" data-bs-smooth-scroll="true" class="scrollspy-example-2" data-bs-root-margin="0px 0px 100px 0px" data-bs-offset="50" tabindex="0">

<!-- Section - Services -->
<!-- Service 3 - Bootstrap Brain Component -->
<section id="scrollspyServices" class="py-5 py-xl-8 py-xxl-16">
  <div class="container mb-5 mb-md-6 mb-xl-10">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7 text-center">
        <h2 class="display-3 fw-bolder mb-4">You will get the <br>perfect <span class="text-danger wave-font-hw display-1 text-accent fw-normal">resolutions</span>  with our proficient services.</h2>
      </div>
    </div>
  </div>

  <div class="container overflow-hidden">
    <div class="row gy-5 gy-md-6 gx-md-4 gy-lg-0 gx-xxl-5">
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="badge wave-bg-yellow text-primary p-3 mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-pie-chart" viewBox="0 0 16 16">
            <path d="M7.5 1.018a7 7 0 0 0-4.79 11.566L7.5 7.793V1.018zm1 0V7.5h6.482A7.001 7.001 0 0 0 8.5 1.018zM14.982 8.5H8.207l-4.79 4.79A7 7 0 0 0 14.982 8.5zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
          </svg>
        </div>
        <h4 class="mb-3">Market Research</h4>
        <p class="mb-3 text-secondary"> Our team conducts extensive market research to identify trends, customer needs, and competitors to develop a solid project plan.</p>
        <a href="#" class="fw-bold text-decoration-none link-primary">
          Learn More
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
          </svg>
        </a>
      </div>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="badge wave-bg-green text-primary p-3 mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-aspect-ratio" viewBox="0 0 16 16">
            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
            <path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z" />
          </svg>
        </div>
        <h4 class="mb-3">Web Design</h4>
        <p class="mb-3 text-secondary">We offer custom web design services that are user-friendly, visually appealing, and optimized for conversions.</p>
        <a href="#" class="fw-bold text-decoration-none link-primary">
          Learn More
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
          </svg>
        </a>
      </div>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="badge wave-bg-pink text-primary p-3 mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-airplane-engines" viewBox="0 0 16 16">
            <path d="M8 0c-.787 0-1.292.592-1.572 1.151A4.347 4.347 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0ZM7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1c.213 0 .458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7V3Z" />
          </svg>
        </div>
        <h4 class="mb-3">SEO Services</h4>
        <p class="mb-3 text-secondary">We offer custom web design services that are user-friendly, visually appealing, and optimized for conversions.</p>
        <a href="#" class="fw-bold text-decoration-none link-primary">
          Learn More
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
          </svg>
        </a>
      </div>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="badge wave-bg-cyan text-primary p-3 mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
            <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
            <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
          </svg>
        </div>
        <h4 class="mb-3">Content Marketing</h4>
        <p class="mb-3 text-secondary">We create engaging and informative content that resonates with your audience and establishes your brand as an authority in your industry.</p>
        <a href="#" class="fw-bold text-decoration-none link-primary">
          Learn More
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Call To Action 1 - Bootstrap Brain Component -->
<section class="" style="height:60vh; background-position:center; background-attachment:fixed; background-size: cover; background-image: url('<?php echo get_template_directory_uri()?>/assets/img/cta/cta-img-1.jpg');">
  <div class="mask" style="height:60vh; background-color: rgba(0, 0, 0, 0.6);">
  <div class="container pt-5">
    <div class="row pt-5">
      <div class="col-12 col-md-9 col-lg-8 col-xl-8 col-xxl-7">
        <h3 class="fs-5 mb-3 text-white text-uppercase"><mark class="text-white wave-highlight">Unlock Fresh Prospects</mark></h3>
        <h2 class="display-3 text-white fw-bolder mb-4 pe-xl-5">We are a design agency studio delivering custom creative & unique websites.</h2>
        <a href="#" class="btn btn-danger rounded mb-0 text-nowrap">Join Us</a>
      </div>
    </div>
  </div>
</div>
</section>



<!-- Section - About -->
<section id="scrollspyAbout" class="wave-bg-alice-blue py-5 py-xl-5 py-xxl-5">
  <!-- FAQ 1 - Bootstrap Brain Component -->
  <div class="container">
    <div class="row gy-5 gy-lg-0 gx-lg-6 gx-xxl-8 align-items-lg-center">
      <div class="col-12 col-lg-6">
        <img class="img-fluid rounded" loading="lazy" src="<?php echo get_template_directory_uri()?>/assets/img/about/about-img-1.png" alt="">
      </div>
      <div class="col-12 col-lg-6">
        <h2 class="display-3 fw-bolder mb-4">Our <span class="text-danger wave-font-hw display-1 text-accent fw-normal">optimistic</span><br> methods will let you prefer us.</h2>
        <p class="fs-4 mb-5">Here are the leading reasons to prefer us for your brand. We believe in transparency without any hidden barriers.</p>
        <div class="accordion accordion-flush" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Highly Competitive Rates
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
              Our focus is on providing cost-effective project management solutions that offer exceptional value for our clients' investments.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Contemporary Skills
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
              Our team of experienced professionals possess the latest knowledge and skills in project management methodologies, enabling us to deliver innovative and effective solutions.              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Top Notch Support
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
              We pride ourselves on our exceptional customer service and support, providing our clients with personalized attention and timely assistance throughout their projects.              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Fact 1 - Bootstrap Brain Component -->
  <div class="container pt-5 pt-xl-8 pt-xxl-16">
    <div class="row gy-4">
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 border-bottom border-primary shadow-sm">
          <div class="card-body text-center p-4 p-xxl-5">
            <div class="btn btn-primary btn-circle btn-circle-4xl wave-bg-yellow border-0 text-primary pe-none mb-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
              </svg>
            </div>
            <h3 class="h1 mb-2">120K</h3>
            <p class="fs-5 mb-0 text-secondary">Happy Customers</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 border-bottom border-primary shadow-sm">
          <div class="card-body text-center p-4 p-xxl-5">
            <div class="btn btn-primary btn-circle btn-circle-4xl wave-bg-green border-0 text-primary pe-none mb-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Z" />
                <path d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z" />
              </svg>
            </div>
            <h3 class="h1 mb-2">1890+</h3>
            <p class="fs-5 mb-0 text-secondary">Issues Solved</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 border-bottom border-primary shadow-sm">
          <div class="card-body text-center p-4 p-xxl-5">
            <div class="btn btn-primary btn-circle btn-circle-4xl wave-bg-pink border-0 text-primary pe-none mb-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-droplet" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0c.109.363.234.708.371 1.038.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8zm.413 1.021A31.25 31.25 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10a5 5 0 0 0 10 0c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z" />
                <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448z" />
              </svg>
            </div>
            <h3 class="h1 mb-2">250K</h3>
            <p class="fs-5 mb-0 text-secondary">Finished Projects</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 border-bottom border-primary shadow-sm">
          <div class="card-body text-center p-4 p-xxl-5">
            <div class="btn btn-primary btn-circle btn-circle-4xl wave-bg-cyan border-0 text-primary pe-none mb-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cloud-moon" viewBox="0 0 16 16">
                <path d="M7 8a3.5 3.5 0 0 1 3.5 3.555.5.5 0 0 0 .625.492A1.503 1.503 0 0 1 13 13.5a1.5 1.5 0 0 1-1.5 1.5H3a2 2 0 1 1 .1-3.998.5.5 0 0 0 .509-.375A3.502 3.502 0 0 1 7 8zm4.473 3a4.5 4.5 0 0 0-8.72-.99A3 3 0 0 0 3 16h8.5a2.5 2.5 0 0 0 0-5h-.027z" />
                <path d="M11.286 1.778a.5.5 0 0 0-.565-.755 4.595 4.595 0 0 0-3.18 5.003 5.46 5.46 0 0 1 1.055.209A3.603 3.603 0 0 1 9.83 2.617a4.593 4.593 0 0 0 4.31 5.744 3.576 3.576 0 0 1-2.241.634c.162.317.295.652.394 1a4.59 4.59 0 0 0 3.624-2.04.5.5 0 0 0-.565-.755 3.593 3.593 0 0 1-4.065-5.422z" />
              </svg>
            </div>
            <h3 class="h1 mb-2">786+</h3>
            <p class="fs-5 mb-0 text-secondary">Awards Winning</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- Section - Pricing -->
    <!-- Pricing 1 - Bootstrap Brain Component -->
    <section id="scrollspyPricing" class="wave-bg-sea-shell py-5 py-xl-5 py-xxl-5">
      <div class="container">
        <div class="row gy-5 gy-lg-0 gx-lg-5 align-items-center">
          <div class="col-12 col-lg-5">
            <h2 class="display-3 fw-bolder mb-4">Our <span class="text-danger wave-font-hw display-1 text-accent fw-normal">Pricing</span></h2>
            <p class="fs-4 mb-4 mb-xl-5">Explore our flexible pricing to find an excellent fit to run your business.</p>
            <a href="#!" class="btn btn-primary btn-lg btn-primary rounded-pill">More Plans</a>
          </div>
          <div class="col-12 col-lg-7">
            <div class="row gy-4 gy-md-0 gx-xxl-5">
              <div class="col-12 col-md-6">
                <div class="card border-0 border-bottom border-primary shadow">
                  <div class="card-body p-4 p-xxl-5">
                    <h2 class="h4 mb-2">Starter</h2>
                    <h4 class="display-3 fw-bold text-primary mb-0">$45</h4>
                    <p class="text-secondary mb-4">USD / Month</p>
                    <ul class="list-group list-group-flush mb-4">
                      <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                          <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span><strong>5</strong> Bootstrap Install</span>
                      </li>
                      <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                          <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span><strong>100,000</strong> Visits</span>
                      </li>
                      <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                          <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span><strong>30 GB</strong> Disk Space</span>
                      </li>
                      <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                          <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                        <span>Free <strong>SSL and CDN</strong></span>
                      </li>
                      <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x text-danger" viewBox="0 0 16 16">
                          <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                        <span>Free <strong>Support</strong></span>
                      </li>
                    </ul>
                    <a href="#!" class="btn btn-danger btn-accent rounded-pill">Choose Plan</a>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="card border-0 border-bottom border-primary shadow">
                  <div class="card-body p-4 p-xxl-5">
                    <h2 class="h4 mb-2">Pro</h2>
                    <h4 class="display-3 fw-bold text-primary mb-0">$149</h4>
                    <p class="text-secondary mb-4">USD / Month</p>
                    <ul class="list-group list-group-flush mb-4">
                      <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                          <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span><strong>20</strong> Bootstrap Install</span>
                      </li>
                      <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                          <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span><strong>400,000</strong> Visits</span>
                      </li>
                      <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                          <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span><strong>50 GB</strong> Disk Space</span>
                      </li>
                      <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                          <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span>Free <strong>SSL and CDN</strong></span>
                      </li>
                      <li class="list-group-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                          <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                        <span>Free <strong>Support</strong></span>
                      </li>
                    </ul>
                    <a href="#!" class="btn btn-danger btn-accent rounded-pill">Choose Plan</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- Section - Contact -->
<!-- Contact 2 - Bootstrap Brain Component -->
<section id="scrollspyContact" class="py-5 py-xl-8 py-xxl-16">
  <div class="container">

    <div class="text-center">
      <h2>Contact Us</h2>
      <p>Don't hesitate to reach out to us today and take the first step towards a successful project - we're always happy to hear from you and discuss how we can help.</p>
    </div>

  </div>
  <div class="container">
    <div class="row gy-5 gx-lg-5">

      <div class="col-lg-4">

        <div class="card p-4 shadow">
          <h3>Get in touch</h3>
          <p>Reach out and lets have a conversation.</p>

          <div class="info-item d-flex">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h4>Location:</h4>
              <p>Nyeri, Kenya</p>
            </div>
          </div><hr><!-- End Info Item -->

          <div class="info-item d-flex">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h4>Email:</h4>
              <p>wyllyjeremy@gmail.com</p>
            </div>
          </div><hr><!-- End Info Item -->

          <div class="info-item d-flex">
            <i class="bi bi-phone flex-shrink-0"></i>
            <div>
              <h4>Call:</h4>
              <p>+254 703 639 230</p>
            </div>
          </div><!-- End Info Item -->

        </div>

      </div>

      <div class="col-lg-8">
        <form action="" method="post" class="form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control form-control-lg" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control form-control-lg" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control form-control-lg" rows="8" name="message" placeholder="Message" required></textarea>
          </div>
          <div class="text-center my-3">
            <input class="btn btn-primary" type="submit" value="Send Message" name="contactmessage">
          </div>
        </form>
      </div><!-- End Contact Form -->

    </div>
  </div>
</section>

</main>

<!-- Footer 2 - Bootstrap Brain Component -->
<footer class="footer">

<!-- Copyright - Bootstrap Brain Component -->
<div class="wave-bg-lotion border-top py-2 py-md-2 py-xl-2">
  <div class="container">
    <div class="row">
      <div class="copyright text-center text-md-center">
          &copy; 2023. All Rights Reserved. Built by <a href="https://github.com/Wyllymk" class="link-secondary text-decoration-none">Wilson</a> with <span class="text-primary">&#9829;</span>
      </div>
    </div>
  </div>
</div>

</footer>

<?php get_footer();?>