<?php include 'includes/header.php'?>
<?php
include 'config/db.php';

if(isset($_POST['register'])){

    $employee_no = $_POST['employee_no'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $sex = $_POST['sex'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $employment_type = $_POST['employment_type'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];

    $sql = "INSERT INTO employees(
                employee_no,
                first_name,
                middle_name,
                last_name,
                sex,
                dob,
                email,
                phone,
                department,
                position,
                employment_type,
                salary,
                hire_date
            )

            VALUES(
                '$employee_no',
                '$first_name',
                '$middle_name',
                '$last_name',
                '$sex',
                '$dob',
                '$email',
                '$phone',
                '$department',
                '$position',
                '$employment_type',
                '$salary',
                '$hire_date'
            )";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>alert('Employee Registered Successfully');</script>";
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<div class="main-container">

    <?php include 'includes/sidebar.php'; ?>

    <div class="content-area">

        <div class="form-container">

            <h2>Add Employee</h2>

            <form action="" method="POST" class="employee-form">

                <!-- PERSONAL INFORMATION -->
                <div class="form-section">
                    <h3>Personal Information</h3>

                    <div class="form-grid">

                        <div class="form-group">
                            <label>Employee No</label>
                            <input type="text" name="employee_no" required>
                        </div>

                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" required>
                        </div>

                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="middle_name">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" required>
                        </div>

                        <div class="form-group">
                            <label>Sex</label>
                            <select name="sex" required>
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" max="<?php echo date('Y-m-d'); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" pattern="^(\+255)[67][0-9]{8}$" required>
                        </div>

                    </div>
                </div>

                <!-- PROFESSIONAL INFORMATION -->
                <div class="form-section">
                    <h3>Professional Information</h3>

                    <div class="form-grid">

                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" name="department" required>
                        </div>

                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" name="position" required>
                        </div>

                        <div class="form-group">
                            <label>Employment Type</label>
                            <select name="employment_type" required>
                                <option value="">Select</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Contract">Contract</option>
                                <option value="Intern">Intern</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Salary</label>
                            <input type="number" name="salary" required>
                        </div>

                        <div class="form-group">
                            <label>Hire Date</label>
                            <input type="date" name="hire_date" max="<?php echo date('Y-m-d'); ?>" required>
                        </div>

                    </div>
                </div>

                <!-- BUTTON -->
                <div class="btn-container">
                    <button type="submit" name="register" class="register-btn">
                        Register Employee
                    </button>
                </div>

            </form>

        </div>

    </div>
</div>
<?php include 'includes/footer.php'; ?>