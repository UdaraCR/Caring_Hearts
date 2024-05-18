<?php

// Function to generate dates based on the selected time period
function getDates($selectedMonth, $selectedYear) {
    $dates = [];
    // Get the number of days in the selected month
    $numDays = cal_days_in_month(CAL_GREGORIAN, $selectedMonth, $selectedYear);

    // Generate dates for the selected month and year
    for ($day = 1; $day <= $numDays; $day++) {
        // Format the date as 'dd M YYYY'
        $date = date('d M Y', mktime(0, 0, 0, $selectedMonth, $day, $selectedYear));
        $dates[] = $date;
    }
    return $dates;
}

// Function to retrieve completion rates data for each date based on the period
function getCompletionRatesData($dates, $employeeID = null) {
    global $dbh;
    $completionRatesData = [];
    foreach ($dates as $date) {
        // Convert date format to timestamp
        $timestamp = strtotime($date);
        $formattedDate = date('Y-m-d H:i:s', $timestamp); // Format as 'YYYY-MM-DD HH:MM:SS'
        $sql = "SELECT (COUNT(CASE WHEN Status = 'Completed' THEN 1 END) / COUNT(*)) * 100 AS completion_rate_percentage
                FROM tbltask 
                WHERE DATE(TaskAssigndate) = :date";
        if ($employeeID !== null) {
            $sql .= " AND AssignTaskto = :employeeID ";
        }
        $query = $dbh->prepare($sql);
        $query->bindParam(':date', $formattedDate);
        if ($employeeID !== null) {
            $query->bindParam(':employeeID', $employeeID, PDO::PARAM_INT);
        }
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        // If no data found, insert 0
        $completionRatesData[] = $row['completion_rate_percentage'] !== null ? $row['completion_rate_percentage'] : 0;
    }
    return $completionRatesData;
}

// Function to retrieve average completion time data for each date based on the period
function getAverageCompletionTimeData($dates, $employeeID = null) {
    global $dbh;
    $averageCompletionTimeData = [];
    foreach ($dates as $date) {
        // Convert date format to timestamp
        $timestamp = strtotime($date);
        $formattedDate = date('Y-m-d', $timestamp); // Format as 'YYYY-MM-DD'

        $sql = "SELECT AVG(TIMESTAMPDIFF(HOUR, TaskAssigndate, tt.UpdationDate)) AS average_completion_time_minutes
                FROM tbltask t
                JOIN tbltasktracking tt ON t.ID = tt.TaskID
                WHERE 
                    tt.Status = 'Completed' AND 
                    DATE(t.TaskAssigndate) = :date";
        if ($employeeID !== null) {
            $sql .= " AND t.AssignTaskto = :employeeID  ";
        }
        $query = $dbh->prepare($sql);
        $query->bindParam(':date', $formattedDate);
        if ($employeeID !== null) {
            $query->bindParam(':employeeID', $employeeID, PDO::PARAM_INT);
        }
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // If no data found, insert 0
        $averageCompletionTimeData[] = $row['average_completion_time_minutes'] !== null ? $row['average_completion_time_minutes'] : 0;
    }
    return $averageCompletionTimeData;
}

function getTasksByStatus($dates, $status, $employeeID = null) {
    global $dbh;
    $tasksData = [];

    foreach ($dates as $date) {
        // Convert date format to timestamp
        $timestamp = strtotime($date);
        $formattedDate = date('Y-m-d', $timestamp); // Format as 'YYYY-MM-DD'

        // SQL query to count tasks by status and date
        $sql = "SELECT COUNT(*) AS task_count
                FROM tbltask 
                WHERE ";

        if ($status === 'new') {
            $sql .= "Status IS NULL ";
        } elseif ($status === 'inprogress') {
            $sql .= "Status = 'Inprogress' ";
        } elseif ($status === 'completed') {
            $sql .= "Status = 'Completed' ";
        }

        $sql .= "AND DATE(TaskAssigndate) = :date";

        // Include condition for TaskAssigndate not being passed for tasks not completed
        if ($status !== 'completed') {
            $sql .= " AND (Status = 'Completed' OR DATE(TaskAssigndate) >= CURDATE())";
        }

        // Include employee ID condition if provided
        if ($employeeID !== null) {
            $sql .= " AND AssignTaskto = :employeeID";
        }

        $query = $dbh->prepare($sql);
        $query->bindParam(':date', $formattedDate);

        // Bind employee ID parameter if provided
        if ($employeeID !== null) {
            $query->bindParam(':employeeID', $employeeID, PDO::PARAM_INT);
        }

        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // If no tasks found, insert 0
        $tasksData[] = $row['task_count'] !== null ? $row['task_count'] : 0;
    }

    return $tasksData;
}

function getOverdueTasks($dates, $employeeID = null) {
    global $dbh;
    $overdueTasksData = [];

    foreach ($dates as $date) {
        // Convert date format to timestamp
        $timestamp = strtotime($date);
        $formattedDate = date('Y-m-d', $timestamp); // Format as 'YYYY-MM-DD'

        // SQL query to count overdue tasks for each date
        $sql = "SELECT COUNT(*) AS overdue_task_count
                FROM tbltask 
                WHERE TaskEnddate < CURDATE() 
                AND Status != 'Completed'
                AND DATE(TaskAssigndate) = :date";

        // Include employee ID condition if provided
        if ($employeeID !== null) {
            $sql .= " AND AssignTaskto = :employeeID";
        }

        $query = $dbh->prepare($sql);
        $query->bindParam(':date', $formattedDate);

        // Bind employee ID parameter if provided
        if ($employeeID !== null) {
            $query->bindParam(':employeeID', $employeeID, PDO::PARAM_INT);
        }

        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // If no overdue tasks found, insert 0
        $overdueTasksData[] = $row['overdue_task_count'] !== null ? $row['overdue_task_count'] : 0;
    }

    return $overdueTasksData;
}

function insertTaskHistory($taskID, $userID, $userType, $message) {
    global $dbh; // Assuming $dbh is your PDO database connection object
    $now = date('Y-m-d H:i:s'); // Get current date and time in MySQL format

    // Prepare and execute the SQL statement
    $stmt = $dbh->prepare("INSERT INTO TaskHistory (TaskID, UserID, UserType, ActionTimestamp, Message) VALUES (:taskID, :userID, :userType, :actionTimestamp, :message)");
    $stmt->bindParam(':taskID', $taskID, PDO::PARAM_INT);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->bindParam(':userType', $userType, PDO::PARAM_STR);
    $stmt->bindParam(':actionTimestamp', $now, PDO::PARAM_STR);
    $stmt->bindParam(':message', $message, PDO::PARAM_STR);
    $stmt->execute();
}

function getTaskHistory($taskID) {
    global $dbh; // Assuming $dbh is your PDO database connection object

    // Prepare and execute the SQL statement to retrieve task history along with user names
    $stmt = $dbh->prepare("
        SELECT 
            TH.*, 
            CASE 
                WHEN TH.UserType = 'admin' THEN A.AdminName
                WHEN TH.UserType = 'employee' THEN E.EmpName
                ELSE NULL
            END AS UserName
        FROM 
            TaskHistory TH
        LEFT JOIN 
            tbladmin A ON TH.UserType = 'admin' AND TH.UserID = A.ID
        LEFT JOIN 
            tblemployee E ON TH.UserType = 'employee' AND TH.UserID = E.ID
        WHERE 
            TH.TaskID = :taskID 
        ORDER BY 
            TH.ActionTimestamp DESC
    ");
    $stmt->bindParam(':taskID', $taskID, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch all the history records along with user names
    $history = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $history;
}





