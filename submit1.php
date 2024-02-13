<?php
$connection = new mysqli("demo-project-db.cogaippupwwk.us-east-1.rds.amazonaws.com", "admin", "admin123", "employee");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emp_id = $_POST['employee_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $project = $_POST['project'];

    $check_query = "SELECT Emp_ID FROM emp_details WHERE Emp_ID = '$emp_id'";
    $check_result = $connection->query($check_query);

    if (($check_result->num_rows > 0) === TRUE) {
        $response = "Employee with the same Emp_ID already exists.";
    } else {

        $insert_query = "INSERT INTO emp_details (Emp_ID, Name, Age, Gender, City, Project) VALUES ('$emp_id', '$name', '$age', '$gender', '$city', '$project')";

        if ($connection->query($insert_query) === TRUE) {
            $response = "Employee details submitted successfully.";
        } else {
            $response = "Error: " . $insert_query . "<br>" . $connection->error;
        }
    }

    echo $response;

    $connection->close();
} else {
    $response = "Invalid request method.";
    echo $response;
}
?>
