<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('../executive-dashboard/dashboard-functions.php');


if (strlen($_SESSION['etmsaid']==0)) {
    header('location:logout.php');
} else{

    $currentMonth = date('m');
    $currentYear = date('Y');

    $currentMonth = isset($_POST['month']) ? $_POST['month'] : $currentMonth;
    $currentYear = isset($_POST['year']) ? $_POST['year'] : $currentYear;

    $period = isset($_POST['period']) ? $_POST['period'] : 'week';
    $dates = getDates($currentMonth, $currentYear);

// chart1 data
    $completionRatesData = getCompletionRatesData($dates);
    $averageCompletionTimeData = getAverageCompletionTimeData($dates);
    $jsData = [
        'completionRatesData' => $completionRatesData,
        'averageCompletionTimeData' => $averageCompletionTimeData
    ];

//chart2 data
    $newTasksData = getTasksByStatus($dates, 'new');
    $inProgressTasksData = getTasksByStatus($dates, 'inprogress');
    $completedTasksData = getTasksByStatus($dates, 'completed');
    $overdueTasksData = getOverdueTasks($dates);

// Create JavaScript data object
    $jsData2 = [
        'newTasksData' => $newTasksData,
        'inProgressTasksData' => $inProgressTasksData,
        'completedTasksData' => $completedTasksData,
        'overdueTasksData' => $overdueTasksData
    ];


    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Caregiver Task Management System||Dashboard</title>
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
    </head>
    <body class="dashboard dashboard_1">
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
                                    <h2>Dashboard</h2>
                                </div>
                            </div>
                        </div>

                        <h4>Select Period</h4>
                        <form class="mt-4" id="periodForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="yearSelect">Select Year:</label>
                                        <select class="form-control" id="yearSelect" name="year">
                                            <?php
                                            $startYear = date('Y') - 100; // Show 10 years back
                                            $endYear = date('Y') + 100; // Show 10 years ahead

                                            for ($y = $startYear; $y <= $endYear; ++$y) {
                                                echo "<option value=\"$y\" " . (($currentYear == $y ) ? 'selected' : '') . ">$y</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="monthSelect">Select Month:</label>
                                        <select class="form-control" id="monthSelect" name="month">
                                            <?php
                                            for ($m = 1; $m <= 12; ++$m) {
                                                $monthName = date('F', mktime(0, 0, 0, $m, 1));
                                                echo "<option value=\"$m\" " . (($currentMonth == $m ) ? 'selected' : '') . ">$monthName</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </form>


                        <!--                        2nd chart-->
                        <div class="mt-4 card">
                            <div class="card-header">
                                Task Completion Status Chart
                            </div>
                            <div class="card-body">
                                <div id="chart2"></div>
                            </div>
                        </div>
                        <!--                        first chart-->
                        <div class="mt-4 card">
                            <div class="card-header">
                                Task Averages Chart
                            </div>
                            <div class="card-body">
                                <div id="chart1"></div>
                            </div>
                        </div>

                    </div>
                    <!-- footer -->
                    <?php include_once('includes/footer.php');?>
                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        // Parse the PHP data
        var dates = <?php echo json_encode($dates); ?>;
        var newTasksData = <?php echo json_encode($jsData2['newTasksData']); ?>;
        var inProgressTasksData = <?php echo json_encode($jsData2['inProgressTasksData']); ?>;
        var completedTasksData = <?php echo json_encode($jsData2['completedTasksData']); ?>;
        var overdueTasksData = <?php echo json_encode($jsData2['overdueTasksData']); ?>;

        // Calculate total tasks at each date
        var totalTasksData = [];
        for (var i = 0; i < dates.length; i++) {
            var total = newTasksData[i] + inProgressTasksData[i] + completedTasksData[i] + overdueTasksData[i];
            totalTasksData.push(total);
        }

        // Chart options
        var options = {
            series: [
                {
                    name: 'Total Tasks',
                    data: totalTasksData
                },
                {
                    name: 'New Tasks',
                    data: newTasksData
                },
                {
                    name: 'In Progress Tasks',
                    data: inProgressTasksData
                },
                {
                    name: 'Completed Tasks',
                    data: completedTasksData
                },
                {
                    name: 'Overdue Tasks',
                    data: overdueTasksData
                }
            ],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: 'Task Status Over Time',
                align: 'left'
            },
            xaxis: {
                categories: dates,
                title: {
                    text: 'Date'
                }
            },
            yaxis: {
                title: {
                    text: 'Number of Tasks'
                }
            },
            legend: {
                position: 'top'
            }
        };

        // Render the chart
        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
    </script>

    <script>
        var options = {
            series: [{
                name: 'Completion Rates',
                type: 'line',
                data: <?php echo json_encode($jsData['completionRatesData']); ?>
            }, {
                name: 'Average Completion Time',
                type: 'column',
                data: <?php echo json_encode($jsData['averageCompletionTimeData']); ?>
            }],
            chart: {
                height: 350,
                type: 'line',
            },
            stroke: {
                width: [4, 0]
            },
            title: {
                text: 'Task Completion Rates and Average Completion Time'
            },
            dataLabels: {
                enabled: true,
                enabledOnSeries: [0]
            },
            xaxis: {
                categories: <?php echo json_encode($dates); ?>,
                title: {
                    text: 'Date'
                }
            },
            yaxis: [{
                title: {
                    text: 'Completion Rates',
                }
            }, {
                opposite: true,
                title: {
                    text: 'Average Completion Time (in hours)'
                }
            }],
            legend: {
                position: 'top'
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();
    </script>
<!--    for filters-->
    <script>
        // Function to handle filter form submission
        function submitForm() {
            document.getElementById("periodForm").submit();
        }

        // Event listener for month select
        document.getElementById("monthSelect").addEventListener("change", function() {
            submitForm();
        });

        // Event listener for year select
        document.getElementById("yearSelect").addEventListener("change", function() {
            submitForm();
        });
    </script>

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
    <script src="js/chart_custom_style1.js"></script>
    </body>
    </html>
<?php } ?>
