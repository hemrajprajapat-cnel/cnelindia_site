<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Id Validate</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link rel="stylesheet" href="./assets/fonts/fonts.css" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />

  <!-- included Header and Footer -->
  <script src="./assets/js/jquery.js"></script>
  <script>
    $(function () {
      $("#includedHeader").load("./comman/header.html");
    });
    $(function () {
      $("#includedFooter").load("./comman/footer.html");
    });
  </script>
</head>

<body>
  <!-- ======= Header ======= -->

  <div id="includedHeader"></div>
  
  <?php
  ///total member array
  $all_teams_id = array('1652'=>'Ankit Kasana','1658'=>'Asif Khan','1601'=>'Bhanu Pratap Singh','1614'=>'Deepak Keelka','1084'=>'Dinesh Kumar','1509'=>'Hemraj Prajapat','1685'=>'Lavina Gupta','1083'=>'Lucky Agarwal','1436'=>'Mohit Rajawat','1610'=>'Monu Sharma','1441'=>'Narendra Singh','1468'=>'Ravi Sharma','1653'=>'Ritika Maheshwari','1085'=>'Siyaram Malav','1539'=>'Sourabh Verma','1690'=>'Hemlata Verma','1692'=>'Nikita Agarwal');
  
  //check member vaild start
  $message_hwe = 'Invalid Member';
  $member_name = 'Unknown Member';
  $message_2 = 'Not working Here';
  if(isset($_REQUEST['id']))
  {
      $id = $_REQUEST['id'];
      if(isset($all_teams_id[$id]))
      {
          $message_hwe = 'Valid Member';
          $message_2 = 'Working Here';
          $member_name = $all_teams_id[$id];
      }
  }
   //check member vaild end
  ?>

  <!-- End Header -->

  <main id="main">
    <!-- ======= Work Process Section ======= -->
    <section id="work-process" class="work-process">
      <div class="container">
        <div class="section-title" data-aos="fade-up" style="margin-top: 50px;">
          <h2><?php echo $message_hwe; ?></h2>
          <h3>Name: <?php echo $member_name; ?></h3>
          <h4 style="color: blue;"><?php echo $message_2; ?></h4>
        </div>

      </div>
    </section>
    <!-- End Work Process Section -->

  </main>
  <!-- End #main -->
  
  
  <!-- ======= Footer ======= -->

  <!--<div id="includedFooter"></div>-->

  <!-- End Footer -->
  
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>