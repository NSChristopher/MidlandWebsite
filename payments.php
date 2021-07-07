<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Payments | Merchant Services and Credit Card Processing</title>
  <!-- MPS icon -->
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="favicon/site.webmanifest">
  <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/custom.css" />
  <!-- Custom js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
  <script type="text/javascript" language="javascript" src="js/form.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg fixed-top navbar-scroll">
      <div class="container">
        <a href="home" class="navbar-brand logo">MIDLAND</a>

        <button class="navbar-toggler ps-0" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <div id="navbarSupportedContent" class="collapse navbar-collapse text-center">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item mx-3">
              <a href="payments" class="nav-link text-uppercase font-weight-bold">Payments</a>
            </li>
            <li class="nav-item mx-3">
              <a href="loans" class="nav-link text-uppercase font-weight-bold">Loans</a>
            </li>
            <li class="nav-item mx-3">
              <a href="pos" class="nav-link text-uppercase font-weight-bold">POS</a>
            </li>
            <li class="nav-item mx-3">
              <a href="about">
                <button type="button" class="btn btn-warning rounded-pill">Contact</button>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main role="main">
    <section class="payments-head">
      <div class="container py-5">
        <div class="row vh-50">
          <div class="col-sm-12 col-md-5 align-self-center">
            <h1 class="jumbotron-heading text-white">Payment Solutions</h1>
            <p class="text-white-50">Midland delivers the latest in payment technology, enabling retailers and restaurants to accept more payments at an affordable rate.</p>
          </div>
        </div>
      </div>
      <div class="topslant-container absolute-bottom">
      </div>
    </section>

    <section class="product-article vh-75 vertical-center">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-4 mb-md-0 p-3 p-md-5">
            <img src="img/PCI.png" class="img-fluid" />
          </div>
          <div class="col-md-6 align-self-center">
            <h3 class="mb-3">Truly Secure Payments</h3>
            <p class="mb-4">
              Rest easy with confidence that your payments are being processed securely.
              At Midland, we work hard to ensure our customers meet the highest compliance standards.
              In addition to monitoring each of our accounts for compliance we provide our customers
              with only the most secure payment equipment. Start processing securely today!
            </p>
          </div>
        </div>
      </div>
    </section>

    <hr class="container my-5">

    <section class="product-features-pannel text-center">
      <div class="container my-5">
        <h3 class="mb-5">Accept Payments On Any Device</h3>

        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="bg-image hover-zoom mb-4 shadow-1-strong rounded">
              <img src="img/Terminal.png" class="img-fluid" />
            </div>
            <h5 class="mb-3">Terminal</h5>
            <p class="mb-4">Counter top terminals are a great start for accepting payments. Our terminals take chip as well as NFC tap transactions.</p>
          </div>
          <div class="col-md-4 mb-4">
            <div class="bg-image hover-zoom mb-4 shadow-1-strong rounded">
              <img src="img/POS.png" class="img-fluid" />
            </div>
            <h5 class="mb-3">Point of Sale</h5>
            <p class="mb-4">
              Manage business operations like inventory payroll etc. while taking secure payments.</p>
          </div>
          <div class="col-md-4 mb-4">
            <div class="bg-image hover-zoom mb-4 shadow-1-strong rounded">
              <img src="img/Mobile.png" class="img-fluid" />
            </div>
            <h5 class="mb-3">Mobile</h5>
            <p class="mb-4">
              Accept payment form anywhere with Midlands mobile phone chipper attachment.</p>
          </div>
        </div>
      </div>
    </section>

    <hr class="text-white my-5">

    <section class="customerinfoform slant-container">
      <div class="container">
        <div class="unslant-content text-center m-md-5 card card-rounded p-5 shadow-3-strong">

          <h3 class="mb-3">Tell us about your Business!</h3>
          <p>We will reply to your message as soon as possible. The average response time is 24h.</p>

          <br class="my-4">

          <div class="row d-flex justify-content-center pt-2">

            <div class="col-md-6 mb-4">

              <form id="form" name="form" action="" method="POST">
                <h2>Contact us</h2>

                <div id="name-group">
                  <div class="form-outline mb-4">
                    <input type="text" name="name" id="name" class="form-control" />
                    <label class="form-label" for="name">Name</label>
                  </div>
                </div>

                <div id="business-group">
                  <div class="form-outline mb-4">
                    <input type="text" name="business" id="business" class="form-control" />
                    <label class="form-label" for="business">Business Name</label>
                  </div>
                </div>

                <div id="email-group">
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="email" class="form-control" />
                    <label class="form-label" for="email">Email address</label>
                  </div>
                </div>

                <div id="volume-group">
                  <div class="form-outline mb-4">
                    <select id="volume" name="volume" class="select">
                      <option value="make a selection">make a selection</option>
                      <option value="0-10k">0-10k</option>
                      <option value="10-25k">10-25k</option>
                      <option value="25-50k">25-50k</option>
                      <option value="50-100k">50-100k</option>
                      <option value="100-250k">100-250k</option>
                      <option value="250k+">250k+</option>
                      <option value="I'd rather not say">I'd rather not say</option>
                    </select>
                    <label class="form-label select-label">Monthly Volume</label>
                  </div>
                </div>

                <div id="message-group">
                  <div class="form-outline mb-4">
                    <textarea type="text" name="message" id="message" rows="4" class="form-control"></textarea>
                    <label class="form-label" for="message">Message</label>
                  </div>
                </div>

                <button type="submit" name="send" Value="Submit" class="btn btn-primary btn-block mb-4">
                  Send
                </button>
              </form>

            </div>
          </div>
        </div>

      </div>
    </section>

  </main>

  <footer class="footer">
    <div class="container pt-5 p-4">
      <div class="row pt-5">
        <div class="col-12 col-md">
          <small class="d-block mb-3 text-muted">© 2020-2021</small>
        </div>
        <div class="col-6 col-md">
          <a href="payments" class="inherit-style">
            <h5>Payments</h5>
          </a>
        </div>
        <div class="col-6 col-md">
          <a href="pos" class="inherit-style">
            <h5>Point of Sale</h5>
          </a>
        </div>
        <div class="col-6 col-md">
          <a href="loans" class="inherit-style">
            <h5>Loans</h5>
          </a>
        </div>
        <div class="col-6 col-md">
          <a href="about" class="inherit-style">
            <h5>About</h5>
          </a>
        </div>
      </div>
    </div>
  </footer>
</body>

<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="js/index.js"></script>

</html>