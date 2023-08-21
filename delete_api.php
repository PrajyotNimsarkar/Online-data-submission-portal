//Delete-api.php
<?php
$connection = new mysqli("demo-project-db.cogaippupwwk.us-east-1.rds.amazonaws.com", "admin", "admin123", "employee");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emp_id = $_POST['delete_employee_id'];

    $sql = "DELETE FROM emp_details WHERE Emp_ID = '$emp_id'";

    if ($connection->query($sql) === TRUE) {
        $response = "Employee details deleted successfully.";
    } else {
        $response = "Error: " . $sql . "<br>" . $connection->error;
    }

    echo $response;

    $connection->close();
} else {
    $response = "Invalid request method.";
    echo $response;
}
?>

