<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
    $empid = $_POST['id'];
    $hectare = $_POST['hectare'];

    $sql2 = "SELECT * FROM hectare_price";
    $query = $conn->query($sql2);
    $drow = $query->fetch_assoc();
    $hectare_price = $drow['price'];

    $computeHec = $hectare * $hectare_price;
    $sql = "UPDATE hectare_employee SET hectare = $hectare, employee_salary = $computeHec WHERE collab_id = '$empid'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Hectare updated successfully ';
        $_SESSION['success'] = $empid;
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Select employee to edit first';
}

header('location: hectare.php');
