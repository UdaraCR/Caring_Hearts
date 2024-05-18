<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
include('../executive-dashboard/dashboard-functions.php');

if (strlen($_SESSION['etmsaid']==0)) {
    header('location:logout.php');
} else{

        $taskId = $_GET['task_id'];
        $history = getTaskHistory($taskId);

    ?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <title>Employee Task Management System || View Task History</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />
    <!-- calendar file css -->
    <link rel="stylesheet" href="js/semantic.min.css" />
    <style>
        .timeline {
            list-style-type: none;
            padding: 0;
        }
        .event {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0px 5px 15px rgb(31, 32, 33); /* Red shadow effect */
            transition: transform 0.3s ease-in-out;
        }
        .event:hover {
            transform: translateY(-5px);
        }
        .event::before {
            content: attr(data-date);
            display: block;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .event h3 {
            margin-top: 0;
            color: #1f2021;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .event p {
            margin-bottom: 0;
            color: #1f2021;
            font-size: 16px;
            line-height: 1.6;
        }
        .event:hover h3 {
            color: #0056b3;
        }
    </style>
</head>
<body class="inner_page general_elements">
<div class="full_container">
    <div class="inner_container">
        <!-- Sidebar  -->
        <?php include_once('includes/sidebar.php');?>
        <!-- end sidebar -->
        <!-- right content -->
        <div id="content">
            <!-- topbar -->
            <?php include_once('includes/header.php');?>
            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="midde_cont">
                <div class="container-fluid">
                    <div class="row column_title">
                        <div class="col-md-12">
                            <div class="page_title">
                                <h2>Task History Timeline</h2>
                            </div>
                        </div>
                    </div>
                    <!-- row -->

<!--                    task history code-->
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <ul class="timeline">
                                <?php if (count($history) > 0): ?>
                                    <?php foreach ($history as $record): ?>
                                        <li class="event" data-date="<?php echo date('F j, Y g:i a', strtotime($record['ActionTimestamp'])); ?>">
                                            <h3 class="title"> <?php echo $record['UserName']; ?></h3>
                                            <p>User Type: <?php echo $record['UserType']; ?></p>
                                            <p>Message: <?php echo $record['Message']; ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <li>No task history available.</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <!-- footer -->
                    <?php include_once('includes/footer.php');?>
                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
        <!-- model popup -->

    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
        <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="js/animate.js"></script>
    <!-- select country -->
    <script src="js/bootstrap-select.js"></script>
    <!-- owl carousel -->
    <script src="js/owl.carousel.js"></script>
    <!-- chart js -->
    <script src="js/Chart.min.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/analyser.js"></script>
    <!-- nice scrollbar -->
    <script src="js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- calendar file css -->
    <script src="js/semantic.min.js"></script>
</body>
    </html><?php } ?>