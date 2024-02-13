<?php
$connection = new mysqli("demo-project-db.cogaippupwwk.us-east-1.rds.amazonaws.com", "admin", "admin123", "employee");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emp_id = $_POST['employee_id'];

    $sql = "SELECT * FROM emp_details WHERE Emp_ID = '$emp_id'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $details = "<h3>Employee Details</h3>" .
                   "<strong>Emp_ID:</strong> " . $row['Emp_ID'] . "<br>" .
                   "<strong>Name:</strong> " . $row['Name'] . "<br>" .
                   "<strong>Age:</strong> " . $row['Age'] . "<br>" .
                   "<strong>Gender:</strong> " . $row['Gender'] . "<br>" .
                   "<strong>City:</strong> " . $row['City'] . "<br>" .
                   "<strong>Project:</strong> " . $row['Project'];
    } else {
        $details = "<p>No employee details found.</p>";
    }

    echo $details;

    $connection->close();
}
?>
