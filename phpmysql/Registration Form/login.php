<?php
$servername="localhost";
$username="root";
$password="";
$dbname="form";
$conn=new mysqli($servername,$username,$password,$dbname);



?>
<html>
    <head>
        <title> Using PHP and MySQL</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    
<div class="container">
    <div class="row justify-content-center mt-5">
    <div class="col-md-6">
    <form method="post" action="">
        <h1 class="title">Registration form Using PHP and MySQL</h1>
    <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname"  class="form-control" name="firstname" placeholder="Enter first name">
    </div>
    <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Enter last name">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" id="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="mobileno">Mobile No:</label>
        <input type="tel" id="mobileno" class="form-control" name="mobileno" placeholder="Enter mobile number">
    </div>
    <div class="form-group">
        <label for="gender">Enter Gender:</label>
        <select id="gender" name="gender" class="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    <div class="form-group">
        <button type="submit" id="submit" class="submit" name="submit">Submit</button>
    </div>
    </div>
    </div>
</div>
</form>


<?php
// Calculate the bill
if(isset($_POST['submit']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];
    $gender = $_POST['gender'];

    // Your database connection code here

    // Construct and execute the SQL query
    $sql = "INSERT INTO user_entry (firstname, lastname, email, mobileno, gender) VALUES ('$firstname', '$lastname', '$email', '$mobileno', '$gender')";

    // Execute the query (assuming you have a database connection object named $conn)
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
        
        // Redirect to another page or the same page without the form
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    
}
?>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>   
</body>
</html>
<?php
$conn->close();
?>
