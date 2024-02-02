<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>.error{color:red;}
    .form-control.error{
        border:1px solid red;
    }
    .form-control.valid{border:1px solid green;}</style>
</head>
<!-- jQuery library -->  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"> </script>

<body>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center" style="min-height: 600px;">
            <div class="card">
                <div class="card-content">
                    <div class="card-body shadow">
                        <div class="card-title">Register</div>
                        <form action="register/auth" method="POST" id="registerForm">
                            <?php
                            if (!empty($errors)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        <?php foreach ($errors as $error) :
                                        ?>
                                            <li><?= esc($error) ?></li>
                                        <?php
                                        endforeach ?>
                                    </ul>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['danger'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_SESSION['danger'];
                                    unset($_SESSION['danger']);
                                    ?>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <input type="text" placeholder="enter name.." class="form-control" name="uname">
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="enter email.." class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="enter password.." class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info shadow-sm" type="submit" name="register">Register</button>
                                <a href="login">Already have an account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>  
$(document).ready (function () {  
//  jQuery.validator.setDefaults({
//   debug: true,
//   success: "valid"
// });
$('form[id="registerForm"]').validate({
  rules: {
    uname: {
      required: true,
      minlength: 3,
      maxlength: 40
    },
    email: {
      required: true,
      email: true
    },
    password: "required",
  },
  messages: {
    uname: {
      required: "Please specify your name",
      minlength: jQuery.validator.format("At least {0} characters required!")
    },
    email: {
      required: "We need your email address to contact you",
      email: "Your email address must be in the format of name@domain.com"
    },
    password: "Password is required",
  }
});
});  
</script>
</html>