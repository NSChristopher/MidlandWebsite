<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAutoTLS = false;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

    $mail->Username = 'platinumpayrol@gmail.com';
    $mail->Password = 'PLAT1007';
    $mail->setFrom('midlandpaymentservices@gmail.com', 'Gus Prentzas');
    $mail->addAddress('noahschristopher250@gmail.com', 'Receiver Name');
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = ' | Website Contact';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Message: {$_POST['message']}
        EOT;
        if (!$mail->send()) {
            $msg = 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Share it with us!';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>About | Midland Payment Services</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg fixed-top navbar-scrolled">
      <div class="container">
        <a href="home" class="navbar-brand logo">MIDLAND</a>

        <button class="navbar-toggler ps-0" type="button" data-mdb-toggle="collapse"
          data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
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



    <section class="about">
      <div class="container my-5">
        <div class="blog-post">
          <div class="row">
            <div class="col-auto">
              <img class="img-fluid rounded-circle m-4 shadow-3-strong" src="img/CEO.jpg"
                style="width: 150px; height: 150px; background-color: grey" />
            </div>
            <div class="col vertical-center">
              <div class="container">
                <h2 class="blog-post-title">About Midland</h2>
                <p class="blog-post-meta">February 23, 2021 by <a href="#">Konstantinos G Prentzas</a></p>
              </div>
            </div>
          </div>

          <p>Midland Payment Services is the evolution of a company with over 15 years of experience and a strong desire to
            offer a higher level of integrity and customer service in an industry that lacks transparency. Midland has 15 sales offices and services thousands of merchants nationwide.</p>

          <p>Midland prides itself as one of the fastest growing processing companies and will continue
            this growth through our commitment to providing cutting edge technology to our merchants. The corporate office, customer service, and technical support are located in New York.</p>
        </div>
    </section>

    <section class="vect-map">
      <div class="container p-5 text-center">
        <img style="max-width: 90%;" src="img/VecMap.png" alt="">
      </div>
    </section>

    <div class="vh-25"></div>

    <section class="customerinfoform slant-container">
      <div class="container">
        <div class="unslant-content text-center m-md-5 card card-rounded p-5 shadow-3-strong">

          <h3 class="mb-3">Tell us about your Business!</h3>
          <p>We will reply to your message as soon as possible. The average response time is 24h.</p>

          <br class="my-4">

          <div class="row d-flex justify-content-center pt-2">

            <div class="col-md-6 mb-4">

              <form name="form" action="form.php" method="POST">
                <h2>Contact us</h2>

                <div class="form-outline mb-4">
                  <input type="text" name="name" class="form-control" required/>
                  <label class="form-label" for="name">Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" class="form-control" required/>
                  <label class="form-label" for="email">Email address</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="subject" class="form-control" required/>
                  <label class="form-label" for="subject">Subject</label>
                </div>

                <div class="form-outline mb-4">
                  <textarea class="form-control" name="message" rows="4"></textarea>
                  <label class="form-label" for="message">Message</label>
                </div>
                
                <button id="custom-validation-button" type="submit" Value="Send" class="btn btn-primary btn-block mb-4">
                  Send
                </button>

                <?php if (!empty($msg)) {
                  echo "<h4>$msg</h4>";
                } ?>

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
<script type="text/javascript" language="javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" language="javascript" src="js/index.js"></script>

</html>
