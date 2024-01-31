<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center" style="min-height: 600px;">
            <div class="card">
                <div class="card-content">
                    <div class="card-body shadow">
                        <div class="card-title">Register</div>
                        <form action="register/auth" method="POST">
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
                                <input type="text" placeholder="enter name.." class="form-control" name="uname" required>
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="enter email.." class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="enter password.." class="form-control" name="password" required>
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

</html>