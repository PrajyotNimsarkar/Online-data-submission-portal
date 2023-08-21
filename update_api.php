//Update-api.php
<?php
$connection = new mysqli("demo-project-db.cogaippupwwk.us-east-1.rds.amazonaws.com", "admin", "admin123", "employee");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emp_id = $_POST['update_employee_id'];
    $name = $_POST['update_name'];
    $age = $_POST['update_age'];
    $gender = $_POST['update_gender'];
    $city = $_POST['update_city'];
    $project = $_POST['update_project'];

    $sql = "UPDATE emp_details SET Name = '$name', Age = '$age', Gender = '$gender',
            City = '$city', Project = '$project' WHERE Emp_ID = '$emp_id'";

    if ($connection->query($sql) === TRUE) {
        $response = "Employee details updated successfully.";
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

