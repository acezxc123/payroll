<?php
include 'includes/session.php';

if (isset($_POST['refresh'])) {
    $test = $_POST['testId'];
    $_SESSION['success'] = $test;

    $sql1 = "SELECT * FROM hectare_price";
    $query = $conn->query($sql1);
    $queryrow = $query->fetch_assoc();
    $new_price1 = $queryrow['price'];

    // Fetch employee data
    $sql2 = "SELECT * FROM hectare_employee";

    $query2 = $conn->query($sql2);
    $query_queryrow2 = $query2->fetch_assoc();

    $update_salary = $query_queryrow2['hectare'] * $new_price1;

    // Update the salary
    $sql3 = "UPDATE hectare_employee SET employee_salary = $update_salary WHERE id = id";
    if ($conn->query($sql3)) {
        // $_SESSION['success'] = 'Hectare updated successfully ';
        $_SESSION['success'] = $empid;
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Select employee to edit first';
}

header('location: hectare.php');
