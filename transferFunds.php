<?php
$timezone = date_default_timezone_set('Asia/Kolkata');
$date = date('m/d/Y h:i:s a', time());
$success = false;
$failure = false;
$Abort = false;

include 'connection.php';


if (isset($_POST['submit'])) {

    $userFrom = $_POST['userFrom'];
    $userTo = $_POST['userTo'];
    $tAmount = $_POST['tAmount'];

    $sql1 = "SELECT * FROM `customers` WHERE `srNumber`=$userFrom";
    $result1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_assoc($result1);

    $sql3 = "SELECT fullName FROM `customers` WHERE `srNumber`=$userFrom";
    $result3 = mysqli_query($con, $sql3);
    $row3 = mysqli_fetch_assoc($result3);

    $sql2 = "SELECT * FROM `customers` WHERE `srNumber`=$userTo";
    $result2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

    $sql4 = "SELECT fullName FROM `customers` WHERE `srNumber`=$userTo";
    $result4 = mysqli_query($con, $sql4);
    $row4 = mysqli_fetch_assoc($result4);

    if ($tAmount > $row1['currentBalance']) {
        $failure = true;
    } else if ($tAmount <= 0) {
        $Abort = true;
    } else {
        $updatedAmount1 = $row1['currentBalance'] - $tAmount;
        $updatedAmount2 = $row2['currentBalance'] + $tAmount;
        $sql = "UPDATE `customers` SET `currentBalance`=$updatedAmount1 WHERE `srNumber`=$userFrom";
        $result = mysqli_query($con, $sql);

        $sql = "UPDATE `customers` SET `currentBalance`=$updatedAmount2 WHERE `srNumber`=$userTo";
        $result = mysqli_query($con, $sql);

        $sender = $row1['accountNumber'];
        $receiver = $row2['accountNumber'];

        $senderName = $row3['fullName'];
        $receiverName = $row4['fullName'];

        $query = "INSERT INTO transfers( `transferredFromAccount`, `transferredToAccount`, `transferredFromName`, `transferredToName`, `transferredAmount`, `dateTime`) VALUES('$sender', '$receiver', '$senderName', '$receiverName', '$tAmount', '$date')";
        $result = mysqli_query($con, $query);
        if ($result) {
            $success = true;
        }
    }
}
?>


<!doctype html>
<html lang="en">
<head>

    <link rel="icon" href="./images/bank_icon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/footer.css">
    
    <title>Transfer Money</title>

    <style>

     select { 
         width: 400px; 
         text-align: center;
     }
     select .lt { 
         text-align: center; 
    }

     .first{
         background: #E9ECEF;
         cursor: no-drop;
     }

     .second{
         cursor: pointer;
     }

    </style>

</head>

<body>

<nav>
      
      <label class="logo">Basic Bank</label>
      <ul>
        <li><a class="inactive"    href="index.php"><b>Home</b></a></li>
        <li><a class="active"  href="customers.php"><b>Customers</b></a></li>
        <li><a class="inactive"  href="transfers.php"><b>Transactions</b></a></li>
      </ul>
</nav>

<br>
<br>
<br>

    <div class="container-fluid bg-overlay3">
        
        <div class="container mt-5">
            <h1 align="center">Funds Transfer</h1>
            <h4 class="text-center">
              <?php 
              if($success)
              {
              echo '<div class="alert alert-success">
              <strong>Success!</strong> Transaction was done successfuly!</a>.
              </div>';
              }
              ?>

              <?php 
              if($failure)
              {
              echo '<div class="alert alert-warning">
              <strong>Less Funds!</strong> Please Enter right amount!</a>.
              </div>';
              }
              ?>

              <?php 
              if($Abort)
              {
              echo '<div class="alert alert-danger">
              <strong>Failed!</strong> Please enter a valid amount!</a>.
              </div>';
              }
              ?>
            </h4>

            <form method="POST">
                <div class="row">
                    <div class="my-3 col-md-6">
                        <label for="amount" class="my-2">Transferring From</label>
                        <select class="form-select first" name="userFrom">
                            
                            <?php
                            $accountNumber = $_GET['accountNumber'];
                            $query =  "select * from customers where accountNumber=$accountNumber";
                            $result = mysqli_query($con, $query);
                            $num_rows = mysqli_num_rows($result);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>

                            <option value="<?php echo $rows['srNumber'] ?>">
                                <?php echo $rows['fullName'] ?>  <b>(Funds - <?php echo $rows['currentBalance'] ?>)</b></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="my-3 col-md-6">
                        <label for="amount" class="my-2">Transferring To</label>
                        <select class="form-select second" name="userTo">
                            <option></option>
                            <?php
                            $query = 'SELECT * FROM `customers`';
                            $result = mysqli_query($con, $query);
                            $num_rows = mysqli_num_rows($result);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo $rows['srNumber'] ?>"><?php echo $rows['fullName'] ?> (Id -
                                <?php echo $rows['accountNumber'] ?>) </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="">
                    <label for="amount" class="my-2">Amount to be transferred</label>
                    <input type="number" class="form-control" name="tAmount" placeholder="Enter the Amount">
                </div>
                <button type="submit" name="submit" class="btn btn-success col-sm-12 mt-4" onclick="myFunction()">Initiate Funds Transfer</button>

            </form>
        </div>
    </div>

<footer>
 <div class="content">
   <div class="bottom">
    <p align="center">Copyright © 2021 <span class="badge badge-light" style="font-size: 1.0em;"><b>Amogh Ranavade</b></span></a> | The Sparks Foundation</p>
   </div>
 </div>
</footer>

</body>
</html>