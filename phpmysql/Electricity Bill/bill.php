<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";
$conn = new mysqli($servername, $username, $password, $dbname);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Calculate Bill Using PHP and MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <style>
        .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin-top: 50px; /* Adjust the top margin as needed */
    }

    .form-container {
        width: 400px;
        padding: 20px; /* Add padding for internal spacing */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add box shadow for a visual separation */
    }

    .mb-3 {
        margin-bottom: 15px; /* Adjust the margin-bottom for vertical spacing */
    }
    .btn.btn-primary {
        justify-content: center;
        align-items: center;
    }
    #calculate{
        justify-content: center;
        align-items: center;
        display: flex;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h3 class="text-center">Bill Calculator using PHP and MySQL</h1>
            <form method="post" action="bill.php">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="mobileno" class="form-label">Mobile Number</label>
                    <input type="tel" class="form-control" id="mobileno" name="mobileno">
                </div>
                <div class="mb-3">
                    <label for="payment" class="form-label">Payment Mode</label>
                    <select class="form-select" id="payment" name="payment">
                        <option value="upi">UPI</option>
                        <option value="cash">CASH</option>
                        <option value="netbanking">NET BANKING</option>
                        <option value="debitcard">DEBIT CARD</option>
                        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="units" class="form-label">Electricity Units</label>
                    <input type="number" class="form-control" id="units" name="units">
                </div>
                <button type="submit" class="btn btn-primary" name="submit" id="calculate">Calculate</button>
            </form>
        </div>
    </div>
</body>

<?php
function calculate($units)
{
    $bill = 0.0;
    $unit_first = 3.50;
    $unit_second = 4.00;
    $unit_third = 5.20;
    $unit_fourth = 6.50;
    $remaining_units = 0;

    if ($units <= 50) {
        $bill = $units * $unit_first;
    } elseif ($units > 50 && $units <= 150) {
        $remaining_units = $units - 50;
        $bill = (50 * $unit_first) + ($remaining_units * $unit_second);
    } elseif ($units > 150 && $units <= 250) {
        $remaining_units = $units - 100;
        $bill = (50 * $unit_first) + (100 * $unit_second) + ($remaining_units * $unit_third);
    } else {
        $remaining_units = $units - 250;
        $bill = (50 * $unit_first) + (100 * $unit_second) + (100 * $unit_third) + ($remaining_units * $unit_fourth);
    }

    return number_format($bill, 2, '.', '');
}

$result_str = '';

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];
    $payment = $_POST['payment'];
    $units = $_POST['units'];
    $result = calculate($units);
    $result_str = "BILL FOR " . $units . " UNITS is " . $result;

    $sql = "INSERT INTO bill_entry (firstname, lastname, email, mobileno, payment, units, result) VALUES ('$firstname', '$lastname', '$email', '$mobileno', '$payment', '$units', '$result')";
    if (!empty($result_str)) {
        echo '<div class="mt-5 alert alert-info text-center">'.$result_str.'</div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php
$conn->close();
?>

</html>
