<?php
$servername="localhost";
$username="root";
$password="";
$dbname="form";

$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<html>
    <head>
        <title id="title" class="title">Semester Result</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <style>
           body {
        background-color: #f8f9fa;
        font-family: 'Arial', Helvetica, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin-top: 50px;
    }

    h1 {
        color: #007bff;
        text-align: center;
    }

    form {
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    button {
        background-color: #007bff;
        color: #ffffff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        justify-content: center;
        cursor: pointer;
    display: block;
    }

    .result {
        margin-top: 20px;
        text-align: center;
    }

    .result.alert {
        background-color: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
        border-radius: 5px;
        padding: 10px;
    }

    .btn-btn-primary{
        justify-content: center;
        display: flex;
    }
        </style>   
    </head>  
    
    <body>
        <h1 id="semester" class="semester">Semester Result VIT</h1>
        
        <div class="container">
       
            <form method="post" action="result.php">
            <h2 id="midsem" class="midsem">Midsem</h2>
                <div class="mb-3">
                    <label for="cnmidsem" class="form-label">Enter Marks in MSE(CN)</label>
                    <input type="number" name="cnmidsem" class="form-control" id="cnmidsem"></input>
                </div>  
                <div class="mb-3">
                    <label for="wtmidsem" class="form-label">Enter Marks in MSE(WT)</label>
                    <input type="number" name="wtmidsem" class="form-control" id="wtmidsem"></input>
                </div> 
                <div class="mb-3">
                    <label for="daamidsem" class="form-label">Enter Marks in MSE(DAA)</label>
                    <input type="number" name="daamidsem" class="form-control" id="daamidsem"></input>
                </div> 
                <div class="mb-3">
                    <label for="sdmmidsem" class="form-label">Enter Marks in MSE(SDM)</label>
                    <input type="number" name="sdmmidsem" class="form-control" id="sdmmidsem"></input>
                </div> 
                <div class="mb-3">
                    <label for="edimidsem" class="form-label">Enter Marks in MSE(EDI)</label>
                    <input type="number" name="edimidsem" class="form-control" id="edimidsem"></input>
                </div>   
                <h2 id="endsem" class="endsem">Endsem</h2>    
                <div class="mb-3">
                    <label for="cnendsem" class="form-label">Enter Marks in ESE(CN)</label>
                    <input type="number" name="cnendsem" class="form-control" id="cnendsem"></input>
                </div>  
                <div class="mb-3">
                    <label for="wtendsem" class="form-label">Enter Marks in ESE(WT)</label>
                    <input type="number" name="wtendsem" class="form-control" id="wtendsem"></input>
                </div> 
                <div class="mb-3">
                    <label for="daaendsem" class="form-label">Enter Marks in ESE(DAA)</label>
                    <input type="number" name="daaendsem" class="form-control" id="daaendsem"></input>
                </div> 
                <div class="mb-3">
                    <label for="sdmendsem" class="form-label">Enter Marks in ESE(SDM)</label>
                    <input type="number" name="sdmendsem" class="form-control" id="sdmendsem"></input>
                </div> 
                <div class="mb-3">
                    <label for="ediendsem" class="form-label">Enter Marks in ESE(EDI)</label>
                    <input type="number" name="ediendsem" class="form-control" id="ediendsem"></input>
                </div> 
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary" id="submit">Calculate</button>
                </div>     
            </form>    
        </div>
    </body>        
</html>  

<?php
function calculate_total($cnmidsem,$wtmidsem,$daamidsem,$sdmmidsem,$edimidsem,
$cnendsem,$wtendsem,$daaendsem,$sdmendsem,$ediendsem)
{
    
    $cnmidsem=$cnmidsem*0.30;
    $wtmidsem=$wtmidsem*0.30;
    $daamidsem=$daamidsem*0.30;
    $sdmmidsem=$sdmmidsem*0.30;
    $edimidsem=$edimidsem*0.30;

    
   
    $cnendsem=$cnendsem*0.70;
    $wtendsem=$wtendsem*0.70;
    $daaendsem=$daaendsem*0.70;
    $sdmendsem=$sdmendsem*0.70;
    $ediendsem=$ediendsem*0.70;    

    $cntotal=$cnmidsem+$cnendsem;
    $wttotal=$wtmidsem+$wtendsem;
    $daatotal=$daamidsem+$daaendsem;
    $sdmtotal=$sdmmidsem+$sdmendsem;
    $editotal=$edimidsem+$ediendsem;

    $total_marks=$cntotal+$wttotal+$daatotal+$sdmtotal+$editotal;
    return $total_marks;
}
function calculate_cgpa($total_marks)
{
    $cgpa=(($total_marks/5)+7.5)/10;
    return number_format((float)$cgpa,2,".","");
}
?>
<?php
if(isset($_POST['submit']))
{
    $cnmidsem=$_POST['cnmidsem'];
    $wtmidsem=$_POST['wtmidsem'];
    $daamidsem=$_POST['daamidsem'];
    $sdmmidsem=$_POST['sdmmidsem'];
    $edimidsem=$_POST['edimidsem'];

    $cnendsem=$_POST['cnendsem'];
    $wtendsem=$_POST['wtendsem'];
    $daaendsem=$_POST['daaendsem'];
    $sdmendsem=$_POST['sdmendsem'];
    $ediendsem=$_POST['ediendsem'];


    $total=calculate_total($cnmidsem,$wtmidsem,$daamidsem,$sdmmidsem,$edimidsem,
    $cnendsem,$wtendsem,$daaendsem,$sdmendsem,$ediendsem);
    $cgpa=calculate_cgpa($total);    
    $result="CGPA is ".$cgpa;

    $sql="INSERT INTO marks_cgpa (cnmidsem,wtmidsem,daamidsem,sdmmidsem,edimidsem,
    cnendsem,wtendsem,daaendsem,sdmendsem,ediendsem,total,cgpa) VALUES('$cnmidsem','$wtmidsem','$daamidsem','$sdmmidsem','$edimidsem',
    '$cnendsem','$wtendsem','$daaendsem','$sdmendsem','$ediendsem','$total','$cgpa')";
    if($conn->query($sql) === TRUE)
    {
        echo '<div class="mt-4 alert alert-info text-center">' . $result . '</div>';
    }    
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>