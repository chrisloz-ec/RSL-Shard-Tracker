<?php 
ob_start();
session_start();
require_once "ValidacionSesion.php";
$con = $db_handle->connectDB();
$userid = mysqli_real_escape_string($con, $_SESSION["usuario_id"]);

$query = "SELECT usuario_nombre, usuario_email FROM usuarios WHERE usuario_id = ?";

$result = $db_handle->exeQuery($query, 'i', array($userid));
foreach($result[0] as $row) {
?>

<section class="" >
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="PanelControl.php">Home</a></li>
            <li class="breadcrumb-item"><a href="Profile.php">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://www.pngkey.com/png/full/73-730477_first-name-profile-image-placeholder-png.png" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $row['usuario_nombre']; ?></h5>
            <p class="text-muted mb-1">Basic account</p>
            <!--
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div>
            -->
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">---</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Username</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row['usuario_nombre']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row['usuario_email']; ?></p>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <form method="POST" id="formPassword">
              <h2 class="h6 text-muted">Change Password</h2>
              <hr>
              <div id="liveAlertPlaceholder"></div>
              <div class="row mb-3">
                <div class="col-sm-3 d-flex align-items-center">
                  <label class="">New Password</label>
                </div>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="password" class="form-control text-muted" id="password" name="password" aria-describedby="button-addon1" aria-label="Enter your new password" minlength="4" required>
                    <button class="btn btn-light border show-password1 fa-solid fa-eye text-muted" type="button" id="button-addon1" onclick="showPassword1()"></button>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3 d-flex align-items-center">
                  <label class="">Repeat Password</label>
                </div>
                <div class="col-sm-9">
                  <div class="input-group">
                    <input type="password" class="form-control text-muted" id="password_r" name="password_r" aria-describedby="button-addon2" aria-label="Repeat your new password" minlength="4" required>
                    <button class="btn btn-light border show-password2 fa-solid fa-eye text-muted" type="button" id="button-addon2" onclick="showPassword2()"></button>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9">
                  <button type="button" id="changePassword" class="btn btn-primary" data-user="<?php echo $userid; ?>">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?php 
} 
?>