 <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= esc($title) ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center" style="min-height: 100vh;">
                <h3>Welcome <?= $_SESSION['name'] ?></h3>
                <br>
                <a href="/logout" class="btn btn-danger">Let me logout</a>

            </div>
        </div>
    </body>

    </html>