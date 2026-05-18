<?php include 'includes/header.php'; ?>

<?php
include 'config/db.php';

/*SEARCH
*/

$search = "";

if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

/*SORTING*/

$sort = "id";
$order = "ASC";

$allowed_columns = ['id', 'employee_no', 'first_name', 'department', 'position'];

if(isset($_GET['sort']) && in_array($_GET['sort'], $allowed_columns)){
    $sort = $_GET['sort'];
}

if(isset($_GET['order']) && $_GET['order'] == 'DESC'){
    $order = "DESC";
}

/*PAGINATION*/

$limit = 5;

$page = 1;

if(isset($_GET['page']) && $_GET['page'] > 0){
    $page = $_GET['page'];
}

$offset = ($page - 1) * $limit;

/*COUNT TOTAL RECORDS*/

$count_sql = "SELECT COUNT(*) AS total 
              FROM employees
              WHERE first_name LIKE '%$search%'
              OR last_name LIKE '%$search%'
              OR employee_no LIKE '%$search%'
              OR department LIKE '%$search%'";

$count_result = mysqli_query($conn, $count_sql);

$count_row = mysqli_fetch_assoc($count_result);

$total_records = $count_row['total'];

$total_pages = ceil($total_records / $limit);

/*MAIN QUERY*/

$sql = "SELECT * FROM employees

        WHERE first_name LIKE '%$search%'
        OR last_name LIKE '%$search%'
        OR employee_no LIKE '%$search%'
        OR department LIKE '%$search%'

        ORDER BY $sort $order

        LIMIT $limit OFFSET $offset";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Employee List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="main-container">

    <?php include 'includes/sidebar.php'; ?>

    <div class="content-area">

        <h2>Employees List</h2>

        <!-- SEARCH FORM -->

        <form method="GET" class="search-form">

            <input
                type="text"
                name="search"
                placeholder="Search employee..."
                value="<?php echo $search; ?>"
            >

            <button type="submit">Search</button>

        </form>

        <br>

        <!-- EMPLOYEE TABLE -->

        <table class="employee-table">

            <tr>

                <th>
                    <a href="?sort=id&order=<?php echo ($order == 'ASC') ? 'DESC' : 'ASC'; ?>">
                        ID
                    </a>
                </th>

                <th>
                    <a href="?sort=employee_no&order=<?php echo ($order == 'ASC') ? 'DESC' : 'ASC'; ?>">
                        Employee No
                    </a>
                </th>

                <th>
                    <a href="?sort=first_name&order=<?php echo ($order == 'ASC') ? 'DESC' : 'ASC'; ?>">
                        Full Name
                    </a>
                </th>

                <th>
                    <a href="?sort=department&order=<?php echo ($order == 'ASC') ? 'DESC' : 'ASC'; ?>">
                        Department
                    </a>
                </th>

                <th>
                    <a href="?sort=position&order=<?php echo ($order == 'ASC') ? 'DESC' : 'ASC'; ?>">
                        Position
                    </a>
                </th>

                <th>Email</th>

                <th>Phone</th>

                <th>Actions</th>

            </tr>

            <?php while($row = mysqli_fetch_assoc($result)){ ?>

            <tr>

                <td><?php echo $row['id']; ?></td>

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

                <td><?php echo $row['email']; ?></td>

                <td><?php echo $row['phone']; ?></td>

                <!-- QUICK ACTIONS -->

             <td class="action-buttons">

                <a 
                    class="view-btn"
                    href="view_employee.php?id=<?php echo $row['id']; ?>"
                    >
                     View
                </a>
    
                <a 
                class="edit-btn"
                href="edit_employee.php?id=<?php echo $row['id']; ?>"
                >
                Edit
                </a>

                <a
                class="delete-btn"
                href="delete_employee.php?id=<?php echo $row['id']; ?>"
                onclick="return confirm('Are you sure you want to delete this employee?');"
                >
                Delete
                </a>
             </td>
             
            </tr>

            <?php } ?>

        </table>

        <br>

        <!-- PAGINATION -->

        <div class="pagination">

            <?php if($page > 1){ ?>

                <a href="?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>">
                    Previous
                </a>

            <?php } ?>

            <?php for($i = 1; $i <= $total_pages; $i++){ ?>

                <a href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>">

                    <?php echo $i; ?>

                </a>

            <?php } ?>

            <?php if($page < $total_pages){ ?>

                <a href="?page=<?php echo $page + 1; ?>&search=<?php echo $search; ?>">
                    Next
                </a>

            <?php } ?>

        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>