<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/register_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
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
                        <h2 class="text-center">Register</h2>
                    </div>
                    <div class="card-body">
                        <form action="includes/register.inc.php" method="post">
                            <?php 
                            register_inputs();
                            ?>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                            <a href="index.php" class="btn btn-secondary btn-block">Back to Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    check_register_errors();
    ?>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>