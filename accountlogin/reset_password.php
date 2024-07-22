<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/resetpwd_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Reset Password</h2>
                    </div>
                    <div class="card-body">
                        <form action="includes/resetpwd.inc.php" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                            <a href="index.php" class="btn btn-secondary btn-block">Back to Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    check_reset_errors();
    ?>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>