<?php 
    session_start();

    if (!isset($_SESSION['adminname'])) {
        header('Location: views/login_admin.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

    <!-- sidebar -->
    <?php include 'views/sidebar.php' ?>
    

    <div class="main-content">
        <!-- header -->
        <?php include 'views/header_admin.php' ?>

        <main>
                
            <?php 

                if (!isset($_GET["pid"])) 
                {
                    include 'views/dashboard.php';
                } 
                else 
                {
                    $pid = intval($_GET["pid"]);
                    switch($pid) {
                        case 0:
                            include 'views/dashboard.php';
                            break;
                        case 1:
                            include 'views/tours.php';
                            break;
                        case 2:
                            include 'views/booktour.php';
                            break;
                        case 3:
                            include 'views/booktour_dinary.php';
                            break;
                        case 4:
                            include 'views/booktour_detail.php';
                            break;
                        case 5:
                            include 'views/customers.php';
                            break;
                        case 6:
                            include 'views/staff.php';
                            break;
                        case 7:
                            include 'views/add_tour.php';
                            break;
                        case 8:
                            include 'views/update_tour.php';
                            break;
                        case 9:
                            include 'views/add_staff.php';
                            break;
                        case 10:
                            include 'views/update_staff.php';
                            break;
                        case 11:
                            include 'views/add_customer.php';
                            break;
                        case 12:
                            include 'views/update_customer.php';
                            break;  
                        case 13:
                            include 'views/update_booktour.php';
                            break;
                        case 14:
                            include 'views/update_booktour_dinary.php';
                            break;    
                        case 15:
                            include 'views/update_booktour_dt_detail.php';
                            break;
                        case 16:
                            include 'views/update_booktour_detail.php';
                            break;   
                        case 17:
                            include 'views/list_booktour.php';
                            break;   
                    }
                }

            ?>

        </main>

    </div>

</body>
</html>