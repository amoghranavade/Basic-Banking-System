<?php
include 'connection.php';
$accountNumber = $_GET['accountNumber'];
$selectquery = "select * from customers where accountNumber=$accountNumber";
$query = mysqli_query($con, $selectquery);
$result = mysqli_fetch_assoc($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>

<style>

.bank_icon, .bank_icon:hover { 
  color: inherit; 
} 

input[type=text]{
  border: 2px solid #aaa;
  border-radius:6px;
  margin: 8px 0;
  outline: none;
  padding: 8px;
  box-sizing: border-box;
  transition: .3s;
  font-size: 20px;
}

input[type=text]:hover{
  border-color: dodgerBlue;
  box-shadow: 0 0 8px 0 dogerBlue;
  cursor: pointer;
}

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<link rel="icon" href="./images/bank_icon.png">

<link rel="stylesheet" href="./css/navbar.css">
<link rel="stylesheet" href="./css/footer.css">

<title>Customer | <?php echo $result['fullName']; ?></title>

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

<h2 style="margin-left: 800px; font-weight:bold;">Customer Details</h2> 

  <div class="container">

    <div>
      <label><b><span class="badge badge-pill badge-primary" style="font-size: 1.1em;">#Account Number</span></b></label>
      <input type="text" class="form-control" id="accountNumber" value="<?php echo $result['accountNumber']; ?>" readonly>
    </div>

    <div>
      <label><b>Full Name</b></label>
      <input type="text" class="form-control" id="fullName" value="<?php echo $result['fullName']; ?>" readonly>
    </div>
 
    <div>
      <label><b>Phone Number</b></label>
      <input type="text" class="form-control" id="phone" value="<?php echo $result['phone']; ?>" readonly>
    </div>
  
    <div>
      <label><b>Address</b></label>
      <input type="text" class="form-control" id="address" value ="<?php echo $result['address']; ?>" readonly>
    </div>

    <div>
      <label><b>Email</b></label>
      <input type="text" class="form-control" id="email" value ="<?php echo $result['email']; ?>" readonly>
    </div>
  
    <div>
      <label><b>Current Balance</b></label>
      <input type="text" class="form-control" id="currentBalance" value ="<?php echo $result['currentBalance']; ?>" readonly>
    </div>

<br>

    <a href="transferFunds.php?accountNumber=<?php echo $result['accountNumber']; ?>"><button type="submit" class="btn btn-success" value="transfer" >Transfer Funds</button></a>
    <a href="customers.php"><button type="submit" class="btn btn-danger" value="transfer">Cancel</button></a>
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