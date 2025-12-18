$('#changePassword').click(function(){
  if($('#formPassword')[0].checkValidity()){
    user = $(this).data('user');
    pass1 = $('#password').val();
    pass2 = $('#password_r').val();
    updatePassword(user, pass1, pass2);
  }
  else {
    $('#formPassword')[0].reportValidity();
  }
});

function updatePassword(user, pass1, pass2) {
  if(pass1 == pass2){
    $.ajax({
      type:"POST",
      url:"php/UpdatePassword.php",
      data: {usuario: user, password: pass1}
    }).done(function(data){
        alert('Password updated successfully.', 'success');
        document.getElementById("formPassword").reset();
        console.log(data);
    }).fail(function() {
         alert('Could not update password, try again later.', 'danger');
    });
  }else{
    alert('The password are not the same, please enter again.', 'danger');
  }
}

function showPassword1() {
  showPassword = document.querySelector('.show-password1');
  password = document.getElementById('password');
  if ( password.type === "text" ) {
    password.type = "password";
    showPassword.classList.toggle("fa-eye");
    showPassword.classList.remove('fa-eye-slash');
  } else {
    password.type = "text";
    showPassword.classList.remove('fa-eye');
    showPassword.classList.toggle("fa-eye-slash");
  }
}

function showPassword2() {
  showPassword = document.querySelector('.show-password2');
  password = document.getElementById('password_r');
  if ( password.type === "text" ) {
    password.type = "password";
    showPassword.classList.toggle("fa-eye");
    showPassword.classList.remove('fa-eye-slash');
  } else {
    password.type = "text";
    showPassword.classList.remove('fa-eye');
    showPassword.classList.toggle("fa-eye-slash");
  }
}

function alert(message, type) {
  $('#dismissAlert').click();
  var alertPlaceholder = document.getElementById('liveAlertPlaceholder');
  var wrapper = document.createElement('div');
  wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button id="dismissAlert" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

  alertPlaceholder.append(wrapper)
}
