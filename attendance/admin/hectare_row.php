<?php
include 'includes/session.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // $sql = "SELECT *, employees.employee_id AS empid, hectare_employee.id AS hecID FROM hectare_employee RIGHT JOIN employees ON employees.id=hectare_employee.employee_id WHERE employees.id = '$id'";
    $sql = "SELECT * FROM hectare_employee WHERE collab_id = '$id'";
    // $sql = "SELECT * FROM hectare_employee WHERE employee_id = '$id'";

    // $hectare_employee = "SELECT *, employees.employee_id AS empid, hectare_employee.employee_id AS hecID FROM hectare_employee LEFT JOIN employees ON employees.id=hectare_employee.employee_id";

    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    echo json_encode($row);
}
