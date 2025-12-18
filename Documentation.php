<?php 
session_start();
require_once "php/ValidacionSesion.php";
if(!$isLoggedIn) {
    header("Location: ./");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shard Tracker</title>
    <link rel="icon" type="image/x-icon" href="img/RAID-Logo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css?v=<?php echo(rand()); ?>">
</head>
<body class="bg-white">

  <?php include 'navbar.php' ?>

  <div class="container mb-4 mt-5">
  <!-- START -->

    <div class="d-flex align-items-start">
      <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-documentation-tab" data-bs-toggle="pill" data-bs-target="#v-pills-documentation" type="button" role="tab" aria-controls="v-pills-documentation" aria-selected="true">Documentation</button>
        <button class="nav-link" id="v-pills-policy-tab" data-bs-toggle="pill" data-bs-target="#v-pills-policy" type="button" role="tab" aria-controls="v-pills-policy" aria-selected="false">Privacy Policy</button>
        <button class="nav-link" id="v-pills-terms-tab" data-bs-toggle="pill" data-bs-target="#v-pills-terms" type="button" role="tab" aria-controls="v-pills-terms" aria-selected="false">Terms & Conditions</button>
        <!--
        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Configuración</button>-->
      </div>
      <div class="tab-content p-3" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-documentation" role="tabpanel" aria-labelledby="v-pills-documentation-tab">
          <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Documentation</a></li>
                <li class="breadcrumb-item active" aria-current="page">Guide and documentation</li>
              </ol>
            </nav>
            <h2 class="h4 text-primary">Guide and documentation</h2>
            <div class="alert alert-primary mt-3" role="alert">
              <h4 class="alert-heading">Before starting:</h4>
              <p>This website is not associated in any way with Plarium, the content itself is independent and the end user is responsible for providing their game data (username, email, game password, game user id, etc.) will not be requested. both email, username and password can be independent of the one who logs into Raid shadow Legend).</p>
              <hr>
              <p class="mb-0">The following guide and documentation is based on the game of Raid Shadow Legend.</p>
            </div>
            <div class="fw-bold text-uppercase mt-4 mb-3 p-1 border-bottom border-secondary border-1">Introduction</div>
            <p>To use the snippet tracker you must be registered and logged in to the platform.</p>
            <div class="fw-bold text-uppercase mt-4 mb-3 p-1 border-bottom border-secondary border-1">How to use</div>
            <p>Once logged in, you will be shown the initial page where you will be shown certain boxes with the fragments and the corresponding buttons that simulate the opening of fragments within the game (if you open one fragment or ten fragments).</p>
            <img class="img-fluid mb-3" src="img/panel-1.png">
            <p>You will also be shown a table with the history of shards opened, the remaining number of shards to open before the mercy system starts, and the percentage to get a legendary champion.</p>
            <img class="img-fluid" src="img/panel-2.png">
          </div>
        </div>
        <div class="tab-pane fade" id="v-pills-policy" role="tabpanel" aria-labelledby="v-pills-policy-tab">
          <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Documentation</a></li>
                <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
              </ol>
            </nav>
            <h2 class="h4 text-primary">Cookies and Privacy Policy</h2>

            <div class="fw-bold text-uppercase mt-4 mb-3 p-1 border-start border-primary border-2 bg-light">
              &nbsp;Introduction
            </div>
            <p>This Privacy Policy seeks to explain in a clear, fair and transparent way what personal data we collect, its purpose and its treatment when using our service. We do not collect any personally identifiable information other than what is necessary to provide you with our service.</p>
            <div class="fw-bold text-uppercase mt-3 mb-3 p-1 border-start border-primary border-2 bg-light">
              &nbsp;Cookies
            </div>
            <p>A cookie is a file that is downloaded to your computer when accessing certain web pages or blogs. Cookies allow this page, among other things, to store and retrieve information about your browsing habits or your equipment, and depending on the information they contain and the way you use your equipment, they can be used to recognize you.</p>
            <div class="fw-bold text-uppercase mt-3 mb-3 p-1 border-start border-primary border-2 bg-light">
              &nbsp;Data collection
            </div>
            <p>In order to be a user on our website, you need to register an account by completing the registration form found on the site itself. All data collected and delivered by the user is essential for the proper functioning of your account, including all services provided; as well as the security and correct functioning of such services, whether provided by us or by third parties. Our website may collect personal information, for example: contact information such as your email address and demographic information. Our policy is to collect the data that is strictly necessary for the correct provision of the services we offer. We will never ask for unnecessary data. No personal data will be sold, rented or offered in exchange for any benefit. These data will also not be disclosed publicly or privately to others.</p>
            <div class="fw-bold text-uppercase mt-3 mb-3 p-1 border-start border-primary border-2 bg-light">
              &nbsp;Control of your personal information
            </div>
            <p>At the time of registration, the user declares to give us his consent for us to process his personal data, as well as declares to have read, understood and accepted this Privacy Policy, always making sure to consult it periodically to be informed of any changes in it. Within the scope of the conditions of use of this site and all its services, the user is responsible for providing true and updated personal data. In turn, we guarantee the user the right to consult, update and/or modify the information provided by himself, whenever he wishes and with total autonomy, from the personal settings area of his account and, after logging in, in other areas of the site designated for such purpose. The user has the right to request the deletion of their personal data, after the permanent suspension of the user's account.</p>
          </div>
        </div>
        <div class="tab-pane fade" id="v-pills-terms" role="tabpanel" aria-labelledby="v-pills-terms-tab">
          <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Documentation</a></li>
                <li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
              </ol>
            </nav>
            <h2 class="h4 text-primary">Terms & Conditions</h2>
            <div class="fw-bold text-uppercase mt-4 mb-3 p-1 border-start border-primary border-2 bg-light">
              &nbsp;Terms
            </div>
            <p>These Terms of Service apply to you as a user on RSL-Shard-Tracker. As a registered user, you have confirmed that you have read, understood and accepted the following terms and conditions of these Terms of Service. If you do not agree to any of these terms, you are prohibited from using or accessing this site.</p>
            <div class="fw-bold text-uppercase mt-3 mb-3 p-1 border-start border-primary border-2 bg-light">
              &nbsp;User control
            </div>
            <p class="text-muted m-0 mt-2"><b>User behavior</b></p>
            <p>You should only use the Website through a web browser and all actions must be performed manually by the user. You are not permitted to use any type of software or browser extensions to automate actions performed on the Website. You will not manipulate any data sent between your browser and our servers. You should not try to hack into the system. This includes, but is not limited to, attempting to access, modify, or delete data that is not normally accessible through ordinary means. You should also not attempt to perform actions outside of the normal functions of the Website.</p>
            <p class="text-muted m-0 mt-2"><b>User account</b></p>
            <p>Your login password must always be kept private and confidential. Your account must have a unique username and unique email address, they are also not transferable. The user himself is the only one who can modify his account data directly from the personal options page.</p>
            <div class="fw-bold text-uppercase mt-3 mb-3 p-1 border-start border-primary border-2 bg-light">
              &nbsp;Modifications
            </div>
            <p>We may modify these terms of service for our website at any time without notice. By using this website, you agree to be bound by the most current version of these terms of service.</p>
            <p>The main language of the site and the terms of service are published in English and it is the user's obligation to find a way to translate and interpret them, therefore excuses of ignorance of said terms will not be allowed due to language issues.</p>
          </div>
        </div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
      </div>
    </div>

  <!-- END -->
  </div>
  

  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top bg-black-2">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="mb-3 mb-md-0 text-muted">© 2023 Zonacl, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex pe-4">
      <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-github"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-twitter"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-facebook"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="#"></a></li>
    </ul>
  </footer>

  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="js/jquery.validate.min.js"></script> 
  <script src="js/ValidarRegistro.js"></script> 
    
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    
  });

  $(function () {
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl)
    })
  })

</script>
