<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="<?=base_url();?>assets/images/favicon.png">
    <style>
        /* #myVideo {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
        } */
    </style>
    <style>.error{color:red;}
    .form-control.error{
        border:1px solid red;
    }
    .form-control.valid{border:1px solid green;}
    .btn-login,.btn-login:hover{background-color: #17ace8;
    color: #fff;}.animate {
  animation-duration: 0.75s;
  animation-duration: 1s; //running slower to show effect
  animation-delay: 0.5s;
  animation-name: animate-fade;
  animation-timing-function: cubic-bezier(.26,.53,.74,1.48);
  animation-fill-mode: backwards;
}/* Flip In */
.animate.flip {
animation-name: animate-flip;
transform-style: preserve-3d;
perspective: 1000px;
}
@keyframes animate-flip {
0% {
opacity: 0;
transform: rotateX(-120deg) scale(0.9,0.9);
}
100% {
    opacity: 1;
    transform: rotateX(0deg) scale(1,1);
}
}
/* Slide In */
.animate.slide { animation-name: animate-slide; }
@keyframes animate-slide {
0% {
opacity: 0;
transform: translate(0,20px);
}
100% {
    opacity: 1;
    transform: translate(0,0);
}
}.delay-2 {
animation-delay: 0.7s;
}@media screen and (prefers-reduced-motion: reduce) {
  .animate {
    animation: none !important;
  }
}</style>
</head>
<!-- jQuery library -->  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"> </script>
<body>
    <!-- <video autoplay muted loop id="myVideo">
  <source src="<?=base_url();?>assets/videos/village_school_girl_kid_drinking.webm" type="video/webm">
  Your browser does not support HTML5 video.
</video> -->
<section class="vh-100" style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 2%, rgba(9,9,121,1) 37%, rgba(0,212,255,1) 100%);">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card animate flip" id="card_parent" style="border-radius: 1rem;">
          <div class="row g-0 two animate slide delay-2">
            <div class="col-md-6 col-lg-5 d-none d-flex align-items-center justify-content-center">
              <img src="<?=base_url();?>assets/images/JJMlogo.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <?php if (isset($_SESSION['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_SESSION['success'];
                                unset($_SESSION['success']);
                                ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($_SESSION['danger'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_SESSION['danger'];
                                    unset($_SESSION['danger']);
                                    ?>
                                </div>
                            <?php } ?>
                <form action="login/auth" method="POST" id="loginForm">
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="email_id">Email address</label>
                    <input type="email" name="email" id="email_id" class="form-control form-control-lg" required />                    
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg" />                    
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-login btn-lg btn-block">Login</button>
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register"
                      style="color: #393f81;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>    
</body>
<script>  
$(document).ready (function () { 
$('form[id="loginForm"]').validate({
  rules: {   
    email: {
      required: true,
      email: true
    },
    password: "required",
  },
  messages: {  
    email: {
      required: "Email address is required",
      email: "Your email address must be in the format of name@domain.com"
    },
    password: "Password is required",
  }
});
});  
</script>
<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>
</html>