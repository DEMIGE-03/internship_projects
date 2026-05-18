<?php include 'includes/header.php'; ?>

<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include 'config/db.php';

/*TOTAL EMPLOYEES*/

$total_sql = "SELECT COUNT(*) AS total_employees FROM employees";

$total_result = mysqli_query($conn, $total_sql);

$total_row = mysqli_fetch_assoc($total_result);

$total_employees = $total_row['total_employees'];

/*TOTAL MALE EMPLOYEES*/

$male_sql = "

    SELECT COUNT(*) AS total_males
    FROM employees
    WHERE sex='Male'

";

$male_result = mysqli_query($conn, $male_sql);

$male_row = mysqli_fetch_assoc($male_result);

$total_males = $male_row['total_males'];

/*TOTAL FEMALE EMPLOYEES*/

$female_sql = "

    SELECT COUNT(*) AS total_females
    FROM employees
    WHERE sex='Female'

";

$female_result = mysqli_query($conn, $female_sql);

$female_row = mysqli_fetch_assoc($female_result);

$total_females = $female_row['total_females'];

/*LAST 5 REGISTERED EMPLOYEES*/

$recent_sql = "

    SELECT *
    FROM employees
    ORDER BY id DESC
    LIMIT 5

";

$recent_result = mysqli_query($conn, $recent_sql);
?>

<!DOCTYPE html>
<html>

<head>

    <title>Dashboard</title>

    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

<div class="main-container">

    <?php include 'includes/sidebar.php'; ?>

    <div class="content-area">

        <h2>Dashboard</h2>

        <!-- DASHBOARD CARDS -->

        <div class="dashboard-cards">

            <div class="dashboard-card">

                <h3>Total Employees</h3>

                <p><?php echo $total_employees; ?></p>

            </div>

            <div class="dashboard-card">

                <h3>Male Employees</h3>

                <p><?php echo $total_males; ?></p>

            </div>

            <div class="dashboard-card">

                <h3>Female Employees</h3>

                <p><?php echo $total_females; ?></p>

            </div>

            <div class="dashboard-card">

                <h3>Current Date</h3>

                <p><?php echo date("d M Y"); ?></p>

            </div>

        </div>

        <!-- RECENT EMPLOYEES -->

        <div class="recent-employees">

            <h3>Last 5 Registered Employees</h3>

            <table class="employee-table">

                <tr>

                    <th>Employee No</th>

                    <th>Full Name</th>

                    <th>Department</th>

                    <th>Position</th>

                    <th>Sex</th>

                </tr>

                <?php while($row = mysqli_fetch_assoc($recent_result)){ ?>

                <tr>

                    <td><?php echo $row['employee_no']; ?></td>

                    <td>

                        <?php

                        echo $row['first_name']." ".
                             $row['middle_name']." ".
                             $row['last_name'];

                        ?>

                    </td>

                    <td><?php echo $row['department']; ?></td>

                    <td><?php echo $row['position']; ?></td>

                    <td><?php echo $row['sex']; ?></td>

                </tr>

                <?php } ?>

            </table>

        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>