<?php include 'includes/header.php'; ?>

<?php
include 'config/db.php';

/*GET EMPLOYEE ID*/

if(!isset($_GET['id'])){
    die("Employee ID not found.");
}

$id = $_GET['id'];

/*FETCH EMPLOYEE DETAILS*/

$sql = "SELECT * FROM employees WHERE id='$id'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){
    die("Employee not found.");
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Employee</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="main-container">

    <?php include 'includes/sidebar.php'; ?>

    <div class="content-area">

        <h2>Employee Full Information</h2>

        <div class="employee-profile-card">

            <div class="profile-row">
                <strong>ID:</strong>
                <span><?php echo $row['id']; ?></span>
            </div>

            <div class="profile-row">
                <strong>Employee No:</strong>
                <span><?php echo $row['employee_no']; ?></span>
            </div>

            <div class="profile-row">
                <strong>First Name:</strong>
                <span><?php echo $row['first_name']; ?></span>
            </div>

            <div class="profile-row">
                <strong>Middle Name:</strong>
                <span><?php echo $row['middle_name']; ?></span>
            </div>

            <div class="profile-row">
                <strong>Last Name:</strong>
                <span><?php echo $row['last_name']; ?></span>
            </div>

            <div class="profile-row">
                <strong>Gender:</strong>
                <span><?php echo $row['sex']; ?></span>
            </div>

            <div class="profile-row">
                <strong>Date of Birth:</strong>
                <span><?php echo $row['dob']; ?></span>
            </div>

            <div class="profile-row">
                <strong>Email:</strong>
                <span><?php echo $row['email']; ?></span>
            </div>

            <div class="profile-row">
                <strong>Phone:</strong>
                <span><?php echo $row['phone']; ?></span>
            </div>

            <div class="profile-row">
                <strong>Department:</strong>
                <span><?php echo $row['department']; ?></span>
            </div>

            <div class="profile-row">
                <strong>Position:</strong>
                <span><?php echo $row['position']; ?></span>
            </div>

            <div class="profile-row">
                <strong>Date Registered:</strong>
                <span><?php echo $row['created_at']; ?></span>
            </div>

            <br>

            <a href="employees.php" class="back-btn">
                Back to Employee List
            </a>

            <a
                class="del-btn"
                href="delete_employee.php?id=<?php echo $row['id']; ?>"
                onclick="return confirm('Are you sure you want to delete this employee?');">
                Delete Employee
            </a>

        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>