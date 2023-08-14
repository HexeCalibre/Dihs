<?php
require 'database/database.php';
require 'controllers/functions/queries.php';
$arrFetchtrack = fetchTrack($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dasmarinas Integrated Highschool</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <!-- jQuery date picker -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/general.css">
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo mr-auto"><a href="index.php">Dasmarinas Integrated Highschool</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="student/index.php">Student Portal</a></li>
        </ul>
      </nav>
      <!-- .nav-menu -->
      <a href="enrollmentform.php" class="get-started-btn">Enroll Now!</a>
    </div>
  </header>
  <!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>DIHS Grade 11 Online Enrollment for S.Y. 2020-2021</h2>
        <p>Online Enrollment for incoming Grade 7 students of Dasmariñas Integrated High School</p>
      </div>
    </div>
    <!-- End Breadcrumbs -->
    <!-- ======= Enrollent Form ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <form id="eForm" method="post" enctype="multipart/form-data" >
          <div class="mt-5">
            <div class="form-group">
              <p><strong>What strand and track are you applying for? *</strong></p>
              <p>Anong strand at track ang iyong nais pasukan?</p>
              <select class="form-control" id="track-id" name="track"  >
                <option value="" hidden>Choose</option>
                <?php
                foreach ($arrFetchtrack as $track) {
                  ?>
                  <option value="<?php echo $track->track_id; ?>" required><?php echo $track->track_name; ?></option>
                  <?php
                }
                $conn = null;
                ?>
              </select>
            </div>
            <div id="uploadfile">
              <div class="form-group">
                <p class="warning"><strong>The track you choose has a grade requirement. Kindly upload your grade below on the upload file button! *</strong></p>
                <input type="file" name="gradefile">
              </div>
            </div>
            <div class="form-group">
              <p><strong>What learning modality do you prefer for your child? *</strong></p>
              <p>Alin sa mga sumusunod na pamamaraan ng pag-aaral ang nais mo para sa iyong anak.</p>
              <div class="radio">
                <label><input type="radio" name="learnabl" required  value="Online Learning"> ONLINE LEARNING</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="learnabl" required  value="Face to Face Learning"> FACE TO FACE LEARNING</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="learnabl"  required value="Blended Online"> BLENDED ONLINE</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="learnabl" required  value="Blended Modular"> BLENDED MODULAR</label>
              </div>
            </div>
            <div class="form-group">
              <p><strong>Last school attended *</strong></p>
              <p>Isulat ang buong pangalan ng paaralang pinanggalingan</p>
              <input type="text" class="form-control" placeholder="Your answer" required  name="lastschool" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>School ID of your previous school</strong></p>
              <p>Just ignore if you don't know the school ID of your previous school</p>
              <input type="text" class="form-control" placeholder="Your answer" name="schoolid" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Is your former school private or public? *</strong></p>
              <p>Ang paaralang iyo bang pinanggalingang paaralan ay isang pribado o pampublikong paaralan?</p>
              <div class="radio">
                <label><input type="radio" name="formerschool"   value="Private School (Pribadong Paaralan)"> Private School (Pribadong Paaralan)</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="formerschool"   value="Public School (Pambuplikong Paaralan)"> Public School (Pambuplikong Paaralan)</label>
              </div>
            </div>
            <div class="form-group">
              <p><strong>What year did you graduate from Junior High School? *</strong></p>
              <p>Anong taon ka nagtapos ng Junior High School?</p>
              <input type="text" class="form-control" placeholder="Your answer" required  name="gradyear" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Learner's Reference Number (LRN)</strong></p>
              <p>Just ignore if you don't know your LRN</p>
              <input type="text" class="form-control" placeholder="Your answer" name="lrn" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>PSA Birth Certificate Number</strong></p>
              <p>You can leave it as blank if you don't have a copy of your PSA as of the moment</p>
              <input type="text" class="form-control" placeholder="Your answer" name="birthcerti" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Last Name *</strong></p>
              <p>Apelyido</p>
              <input type="text" class="form-control" placeholder="Your answer" required  name="lname" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>First Name *</strong></p>
              <p>Pangalan</p>
              <input type="text" class="form-control" placeholder="Your answer" required  name="fname" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Middle Name</strong></p>
              <p>Gitnang Pangalan</p>
              <input type="text" class="form-control" placeholder="Your answer" name="middlename" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Name Extension (e.g. Jr., III (if applicable)</strong></p>
              <input type="text" class="form-control" placeholder="Your answer" name="nameextension" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Date of Birth</strong></p>
              <p>Kaarawan</p>
              <input type="text" class="form-control" placeholder="Your answer"  required name="birthdate" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Age *</strong></p>
              <p>Edad ng Mag-aaral</p>
              <input type="text" class="form-control" placeholder="Your answer"   name="age" autocomplete="off" readonly>
            </div>
            <div class="form-group">
              <p><strong>Sex *</strong></p>
              <p>Kasarian</p>
              <div class="radio">
                <label><input type="radio" name="sex"   value="Male"> Male</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="sex"   value="Female"> Female</label>
              </div>
            </div>
            <div class="form-group">
              <p><strong>Complete Address *</strong></p>
              <p>House Number and Street, Village/Subdivision, Barangay, Municipality/City, Province</p>
              <input type="text" class="form-control" placeholder="Your answer"  required name="address" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Contact Number *</strong></p>
              <p>Siguraduhin na tama ang number na iyong ilalagay dahil dito ka icocontact ng iyong adviser</p>
              <input type="number" class="form-control" placeholder="Your answer"  required name="contactnum" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Email Address *</strong></p>
              <p>Siguraduhin na tama ang email address na iyong ilalagay dahil dito ka makak receive ng confirmation kapag enrolled kana</p>
              <input type="email" class="form-control" placeholder="Your answer" required name="email" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Facebook Account *</strong></p>
              <p>Ilagay ang iyong pangalan sa facebook o ng iyong magulang upang mas madali kang macontact ng iyong adviser</p>
              <input type="text" class="form-control" placeholder="Your answer"  required name="fbaccount" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Are you a 4Ps beneficiary? *</strong></p>
              <p>Ang mag-aaral ba ay benepisyaryo ng 4Ps?</p>
              <div class="radio">
                <label><input type="radio" name="4ps" required  value="Yes"> Yes</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="4ps" required  value="No"> No</label>
              </div>
            </div>
            <div class="form-group">
              <p><strong>Do you belong to Indigenous Peoples (IP) Community / Indigenous Cultural Community? *</strong></p>
              <p>Ang mag-aaral ba ay kabilang sa mga Grupong Etniko o Komunidad ng ating bansa?</p>
              <div class="radio">
                <label><input type="radio" name="ip" id="ipyes"  required value="Yes"> Yes</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="ip" id="ipno" required  value="No"> No</label>
              </div>
            </div>
            <!-- this is for dynamic scenario based on previous input condition -->
            <div class="form-group ipdropdown">
              <p><strong>If yes, please specify</strong></p>
              <select class="form-control" name="ipdropdown-name" id="ipdropdown-id">
                <option value="" hidden>Choose</option>
                <option>Bontoc</option>
                <option>Ibaloi</option>
                <option>Ifugao</option>
                <option>Isneg</option>
                <option>Kalinga</option>
                <option>Kankanaey</option>
                <option>Tinguian</option>
                <option>Negritos</option>
                <option>Gaddang</option>
                <option>Ilongot</option>
                <option>Mangyan</option>
                <option>Lumad</option>
                <option>Lumad</option>
                <option>Manobo</option>
                <option>B'laan</option>
                <option>Teduray</option>
                <option>Tboli</option>
                <option>Samal</option>
                <option>Yakan</option>
              </select>
            </div>
            <!-- End -->
            <div class="form-group">
              <p><strong>Mother Tongue *</strong></p>
              <p>Unang Wika</p>
              <select class="form-control" name="mothertongue" required >
                <option value="" hidden>Choose</option>
                <option>Aklanon</option>
                <option>Bikol</option>
                <option>Cebuano</option>
                <option>Chavacano</option>
                <option>Hiligaynon</option>
                <option>Ibanag</option>
                <option>Ilocano</option>
                <option>Ivatan</option>
                <option>Kapampangan</option>
                <option>Kinaray-a</option>
                <option>Maguindanao</option>
                <option>Maranao</option>
                <option>Pangasinan</option>
                <option>Sambal</option>
                <option>Surigaonon</option>
                <option>Tagalog</option>
                <option>Tausug</option>
                <option>Waray</option>
                <option>Yakan</option>
              </select>
            </div>
            <div class="form-group">
              <p><strong>Religion *</strong></p>
              <p>Relihiyon</p>
              <select class="form-control" name="religion"  required>
                <option value="" hidden>Choose</option>
                <option>Christianity</option>
                <option>Islam</option>
                <option>Indigenous Religion (Katutubong relihiyon)</option>
                <option>Not Disclosed (Hindi nais ipaalam)</option>
                <option>No Religion (Walang relihiyon)</option>
                <option>Buddhism</option>
                <option>Hinduism</option>
                <option>Judaism</option>
                <option>Sikhism</option>
                <option>Taoism</option>
                <option>Others</option>
              </select>
            </div>
            <div class="form-group">
              <p><strong>Does the learner have special education (SPED) needs? *</strong></p>
              <p>Ang mag-aaral ba ay mayroong espesyal na pangangailangan sa kanyang pag-aaral?</p>
              <div class="radio">
                <label><input type="radio" name="sped" id="spedyes" required  value="Yes"> Yes</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="sped" id="spedno" required  value="No"> No</label>
              </div>
            </div>
            <!-- this is for dynamic scenario based on previous input condition -->
            <div class="form-group spedtextfield">
              <p><strong>If yes, please specify</strong></p>
              <p>Kung oo, ano iyon?</p>
              <input type="text" class="form-control" placeholder="Your answer" id="spedtextfield-id" autocomplete="off" name="spedspecify">
            </div>
            <!-- end -->
            <div class="form-group">
              <p><strong>Father's Name (Last Name, First Name, Middle Name) *</strong></p>
              <p>Talaan ng Ama: Buong pangalan (Apelyido, Pangalan, Panggitnang Pangalan)</p>
              <input type="text" class="form-control" placeholder="Your answer"  required name="nameoffather" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Father's Highest Educational Attainment</strong></p>
              <p>Pinakamataas na pinag-aralang natapos</p>
              <select class="form-control" name="fatheredu">
                <option value="" hidden>Choose</option>
                <option>Elementary Graduate</option>
                <option>High School Graduate</option>
                <option>College Graduate</option>
                <option>Vocational</option>
                <option>Masters/Doctorate Degree</option>
                <option>Did not attend school (Hindi nakapagtapos)</option>
              </select>
            </div>
            <div class="form-group">
              <p><strong>Father's Employment Status</strong></p>
              <p>Estado sa Paghahanap-buhay</p>
              <select class="form-control" name="femploymentstatus">
                <option value="" hidden>Choose</option>
                <option>Full Time</option>
                <option>Part Time</option>
                <option>Self-Employed (i.e.:family business)</option>
                <option>Unemployed due to ECQ</option>
                <option>Not working</option>
              </select>
            </div>
            <div class="form-group">
              <p><strong>Father's Occupation (if Working)</strong></p>
              <p>Trabaho ng iyong ama</p>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your answer" name="fatheroccu" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <p><strong>Father's Contact Number</strong></p>
              <p>Numero ng iyong ama</p>
              <input type="number" class="form-control" placeholder="Your answer" name="fathercnum" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Mother's Name (Last Name, First Name, Middle Name) *</strong></p>
              <p>Talaan ng Ina: Buong pangalan (Apelyido, Pangalan, Panggitnang Pangalan)</p>
              <input type="text" class="form-control" placeholder="Your answer" required  name="nameofmother" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Mother's Highest Educational Attainment</strong></p>
              <p>Pinakamataas na pinag-aralang natapos</p>
              <select class="form-control" name="motheredu">
                <option value="" hidden>Choose</option>
                <option>Elementary Graduate</option>
                <option>High School Graduate</option>
                <option>College Graduate</option>
                <option>Vocational</option>
                <option>Masters/Doctorate Degree</option>
                <option>Did not attend school (Hindi nakapagtapos)</option>
              </select>
            </div>
            <div class="form-group">
              <p><strong>Mother's Employment Status</strong></p>
              <p>Estado sa Paghahanap-buhay</p>
              <select class="form-control" name="memploymentstatus">
                <option value="" hidden>Choose</option>
                <option>Full Time</option>
                <option>Part Time</option>
                <option>Self-Employed (i.e.:family business)</option>
                <option>Unemployed due to ECQ</option>
                <option>Not working</option>
              </select>
            </div>
            <div class="form-group">
              <p><strong>Mother's Occupation (if Working)</strong></p>
              <p>Trabaho ng iyong ina</p>
              <input type="text" class="form-control" placeholder="Your answer" name="motheroccu" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Mother's Contact Number</strong></p>
              <p>Numero ng iyong ima</p>
              <input type="number" class="form-control" placeholder="Your answer" name="mothercnum" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Guardian's Name (Last Name, First Name, Middle Name) *</strong></p>
              <p>Talaan ng Tagapamalaga: Buong pangalan (Apelyido, Pangalan, Panggitnang Pangalan)</p>
              <input type="text" class="form-control" placeholder="Your answer"   name="nameofguardian" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Relationship to your Guardian *</strong></p>
              <p>Kaugnayan ng mag-aaral sa tagapangalaga</p>
              <select class="form-control" name="relguardian" required >
                <option value="" hidden>Choose</option>
                <option>Parents Magulang (Parents)</option>
                <option>Brother/Sister (Kapatid)</option>
                <option>Uncle/Aunt (Tiyuhin o Tiyahin)</option>
                <option>Grandparents (Lolo o Lola)</option>
                <option>Other</option>
              </select>
            </div>
            <div class="form-group">
              <p><strong>Guardian's Highest Educational Attainment</strong></p>
              <p>Pinakamataas na pinag-aralang natapos</p>
              <select class="form-control" name="guardianedu"  required>
                <option value="" hidden>Choose</option>
                <option>Elementary Graduate</option>
                <option>High School Graduate</option>
                <option>College Graduate</option>
                <option>Vocational</option>
                <option>Masters/Doctorate Degree</option>
                <option>Did not attend school (Hindi nakapagtapos)</option>
              </select>
            </div>
            <div class="form-group">
              <p><strong>Guardians's Employment Status</strong></p>
              <p>Estado sa Paghahanap-buhay</p>
              <select class="form-control" name="gemploymentstatus"  >
                <option value="" hidden>Choose</option>
                <option>Full Time</option>
                <option>Part Time</option>
                <option>Self-Employed (i.e.:family business)</option>
                <option>Unemployed due to ECQ</option>
                <option>Not working</option>
              </select>
            </div>
            <div class="form-group">
              <p><strong>Guardian's Occupation (if Working)</strong></p>
              <p>Trabaho ng iyong tagapamalaga</p>
              <input type="text" class="form-control" placeholder="Your answer" name="guardianoccu" autocomplete="off">
            </div>
            <div class="form-group">
              <p><strong>Guardian's Contact Number</strong></p>
              <p>Numero ng iyong tagapamalaga</p>
              <input type="number" class="form-control" placeholder="Your answer"   name="guardiancnum" autocomplete="off">
            </div>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </section>
    <!-- End Contact Section -->
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Dasma Integrated National Highschool</h4>
            <p>
              Congressional South Avenue, Dasmariñas, Cavite
              <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>Dasma Integrated National Highschool</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          Designed by <a>Jay</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.facebook.com/DepedTayoDIHS301186" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
       
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- jQuery date picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <!--Sweet Alert Box 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="js/enrollmentform.js"></script>
</body>
</html>