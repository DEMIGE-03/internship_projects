<?php
include 'config/db.php';

/*CHECK EMPLOYEE ID*/

if(!isset($_GET['id'])){
    die("Employee ID not found.");
}

$id = $_GET['id'];

/*DELETE EMPLOYEE*/

$sql = "DELETE FROM employees WHERE id='$id'";

if(mysqli_query($conn, $sql)){

    header("Location: employees.php");

    exit();

}else{

    echo "Failed to delete employee.";

}
?>