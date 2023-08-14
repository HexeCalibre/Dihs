<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dasma Integrated National Highschool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- Date Picker CSS -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
  <div class="container">
    <h3>Enrollment Form</h3>
    <br>
    <form id="eForm" method="post">
      <div class="form-group">
        <p><strong>What strand and track are you applying for? *</strong></p>
        <p>Anong strand at track ang iyong nais pasukan?</p>
        <select class="form-control" name="track" required>
          <option value="" hidden>Choose</option>
          <option>ABM</option>
          <option>HUMS under Academic Track</option>
          <option>CBF under Home Economics TVL Track</option>
          <option>FTLH under Home Economics TVL Track</option>
          <option>AS under Industrial Arts TVL Track</option>
          <option>EIM under Industrial Arts TVL Track</option>
        </select>
      </div>
      <div class="form-group">
        <p><strong>What learning modality do you prefer for your child? *</strong></p>
        <p>Alin sa mga sumusunod na pamamaraan ng pag-aaral ang nais mo para sa iyong anak.</p>
        <div class="radio">
          <label><input type="radio" name="learnabl" required value="Online Learning">ONLINE LEARNING</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="learnabl" required value="Face to Face Learning">FACE TO FACE LEARNING</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="learnabl" required value="Blended Online">BLENDED ONLINE</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="learnabl" required value="Blended Modular">BLENDED MODULAR</label>
        </div>
      </div>
      <div class="form-group">
        <p><strong>Last school attended *</strong></p>
        <p>Isulat ang buong pangalan ng paaralang pinanggalingan</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" required name="lastschool" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>School ID of your previous school</strong></p>
        <p>Just ignore if you don't know the school ID of your previous school</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" name="schoolid" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Is your former school private or public? *</strong></p>
        <p>Ang paaralang iyo bang pinanggalingang paaralan ay isang pribado o pampublikong paaralan?</p>
        <div class="radio">
          <label><input type="radio" name="formerschool" required value="Private School (Pribadong Paaralan)">Private School (Pribadong Paaralan)</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="formerschool" required value="Public School (Pambuplikong Paaralan)">Public School (Pambuplikong Paaralan)</label>
        </div>
      </div>
      <div class="form-group">
        <p><strong>What year did you graduate from Junior High School? *</strong></p>
        <p>Anong taon ka nagtapos ng Junior High School?</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" required name="gradyear" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Learner's Reference Number (LRN)</strong></p>
        <p>Just ignore if you don't know your LRN</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" name="lrn" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>PSA Birth Certificate Number</strong></p>
        <p>You can leave it as blank if you don't have a copy of your PSA as of the moment</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" name="birthcerti" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Last Name *</strong></p>
        <p>Apelyido</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" required name="lname" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>First Name *</strong></p>
        <p>Pangalan</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" required name="fname" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Middle Name</strong></p>
        <p>Gitnang Pangalan</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" name="middlename" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Name Extension (e.g. Jr., III (if applicable)</strong></p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" name="nameextension" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Date of Birth</strong></p>
        <p>Kaarawan</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" required name="birthdate" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Age *</strong></p>
        <p>Edad ng Mag-aaral</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" required name="age" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Sex *</strong></p>
        <p>Kasarian</p>
        <div class="radio">
          <label><input type="radio" name="sex" required value="Male">Male</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="sex" required value="Female">Female</label>
        </div>
      </div>
      <div class="form-group">
        <p><strong>Complete Address *</strong></p>
        <p>House Number and Street, Village/Subdivision, Barangay, Municipality/City, Province</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" required name="address" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Contact Number *</strong></p>
        <p>Siguraduhin na tama ang number na iyong ilalagay dahil dito ka icocontact ng iyong adviser</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" required name="contactnum" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Facebook Account *</strong></p>
        <p>Ilagay ang iyong pangalan sa facebook o ng iyong magulang upang mas madali kang macontact ng iyong adviser</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" required name="fbaccount" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Are you a 4Ps beneficiary? *</strong></p>
        <p>Ang mag-aaral ba ay benepisyaryo ng 4Ps?</p>
        <div class="radio">
          <label><input type="radio" name="4ps" required value="Yes">Yes</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="4ps" required value="No">No</label>
        </div>
      </div>
      <div class="form-group">
        <p><strong>Do you belong to Indigenous Peoples (IP) Community / Indigenous Cultural Community? *</strong></p>
        <p>Ang mag-aaral ba ay kabilang sa mga Grupong Etniko o Komunidad ng ating bansa?</p>
        <div class="radio">
          <label><input type="radio" name="ip" id="ipyes" required value="Yes">Yes</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="ip" id="ipno" required value="No">No</label>
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
        <select class="form-control" name="mothertongue" required>
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
        <select class="form-control" name="religion" required>
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
          <label><input type="radio" name="sped" id="spedyes" required value="Yes">Yes</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="sped" id="spedno" required value="No">No</label>
        </div>
      </div>
      <!-- this is for dynamic scenario based on previous input condition -->
      <div class="form-group spedtextfield">
        <p><strong>If yes, please specify</strong></p>
        <p>Kung oo, ano iyon?</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" id="spedtextfield-id" autocomplete="off" name="spedspecify">
        </div>
      </div>
      <!-- end -->
      <div class="form-group">
        <p><strong>Father's Name (Last Name, First Name, Middle Name) *</strong></p>
        <p>Talaan ng Ama: Buong pangalan (Apelyido, Pangalan, Panggitnang Pangalan)</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" required name="nameoffather" autocomplete="off">
        </div>
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
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" name="fathercnum" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Mother's Name (Last Name, First Name, Middle Name) *</strong></p>
        <p>Talaan ng Ina: Buong pangalan (Apelyido, Pangalan, Panggitnang Pangalan)</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" required name="nameofmother" autocomplete="off">
        </div>
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
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" name="motheroccu" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Mother's Contact Number</strong></p>
        <p>Numero ng iyong ima</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" name="mothercnum" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Guardian's Name (Last Name, First Name, Middle Name) *</strong></p>
        <p>Talaan ng Tagapamalaga: Buong pangalan (Apelyido, Pangalan, Panggitnang Pangalan)</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" required name="nameofguardian" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Relationship to your Guardian *</strong></p>
        <p>Kaugnayan ng mag-aaral sa tagapangalaga</p>
        <select class="form-control" name="relguardian" required>
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
        <select class="form-control" name="guardianedu" required>
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
        <select class="form-control" name="gemploymentstatus" required>
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
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" name="guardianoccu" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <p><strong>Guardian's Contact Number</strong></p>
        <p>Numero ng iyong tagapamalaga</p>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your answer" required name="guardiancnum" autocomplete="off">
        </div>
      </div>
      <button type="submit" class="btn btn-success">Submit</button>
      <br><br>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Date Picker JS -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/enrollmentform.js"></script>
</body>
</html>