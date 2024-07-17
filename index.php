<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FTravel</title>
        <link rel="icon" type="image/x-icon" href="img/logo.png">
        <link rel="stylesheet" href="css/style.css">

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" >
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    </head>
    <body>

        <!-- header section -->
        <?php include 'views/header.php'; ?> 
        
        <?php 

            if (!isset($_GET["pid"])) 
            {
                include 'views/home.php';
            } 
            else 
            {
                $pid = intval($_GET["pid"]);
                switch($pid) {
                    case 0:
                        include 'views/home.php';
                        break;
                    case 1:
                        include 'views/about.php';
                        break;
                    case 2:
                        include 'views/package.php';
                        break;
                    case 3:
                        include 'views/destination.php';
                        break;
                    case 4:
                        include 'views/book.php';
                        break;
                    case 5:
                        include 'views/tour_detail.php';
                        break;                   
                    case 6:
                        include 'views/find.php';
                        break;
                    case 7:
                        include 'views/find_result.php';
                        break;
                    case 8:
                        include 'views/package_find.php';
                        break;
                    case 9:
                        include 'views/my.php';
                        break;
                    case 10:
                        include 'views/destination_detail.php';
                        break;
                }
            }

        ?>


        <!-- footer section -->
        <?php include 'views/footer.php' ?>

        <!-- custom css file link -->
        <script src="js/script.js"></script>
    </body>
</html>