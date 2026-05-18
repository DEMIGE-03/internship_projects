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

/*UPDATE EMPLOYEE*/

if(isset($_POST['update_employee'])){

    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $position = $_POST['position'];

    $update_sql = "

        UPDATE employees SET

        first_name='$first_name',
        middle_name='$middle_name',
        last_name='$last_name',
        email='$email',
        phone='$phone',
        department='$department',
        position='$position'

        WHERE id='$id'

    ";

    if(mysqli_query($conn, $update_sql)){

        header("Location: employees.php");

        exit();

    }else{

        echo "Error updating employee.";

    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Employee</title>

    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

<div class="main-container">

    <?php include 'includes/sidebar.php'; ?>

    <div class="content-area">

        <h2>Edit Employee</h2>

        <form method="POST" class="employee-form">

            <div class="form-group">

                <label>First Name</label>

                <input
                    type="text"
                    name="first_name"
                    value="<?php echo $row['first_name']; ?>"
                    required
                >

            </div>

            <div class="form-group">

                <label>Middle Name</label>

                <input
                    type="text"
                    name="middle_name"
                    value="<?php echo $row['middle_name']; ?>"
                >

            </div>

            <div class="form-group">

                <label>Last Name</label>

                <input
                    type="text"
                    name="last_name"
                    value="<?php echo $row['last_name']; ?>"
                    required
                >

            </div>

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="<?php echo $row['email']; ?>"
                    required
                >

            </div>

            <div class="form-group">

                <label>Phone</label>

                <input
                    type="tel"
                    name="phone"
                    value="<?php echo $row['phone']; ?>"
                    required
                >

            </div>

            <div class="form-group">

                <label>Department</label>

                <input
                    type="text"
                    name="department"
                    value="<?php echo $row['department']; ?>"
                    required
                >

            </div>

            <div class="form-group">

                <label>Position</label>

                <input
                    type="text"
                    name="position"
                    value="<?php echo $row['position']; ?>"
                    required
                >

            </div>

            <div class="form-group">

                <label>Employment Type</label>

                <input
                    type="text"
                    name="employment_type"
                    value="<?php echo $row['employment_type']; ?>"
                    required
                >

            </div>

            <div class="form-group">

                <label>Salary</label>

                <input
                    type="text"
                    name="salary"
                    value="<?php echo $row['salary']; ?>"
                    required
                >

            </div>

            <button type="submit" name="update_employee">
                Update Employee
            </button>

        </form>

    </div>

</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>