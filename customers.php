<!DOCTYPE html>
<html lang="en">
<head>

<link rel="icon" href="./images/bank_icon.png">

<style type="text/css">  

    .table-hover tbody tr:hover td{
        background-color: #C7D8EB;  
        cursor: pointer;
    } 
    td, tr {
        text-align: center;
        font-size: 1.1em;
    }
    .bank_icon, .bank_icon:hover {
         color: inherit; 
    } 
    
</style> 
  
    <title>Online Banking | Customers</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/footer.css">

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
    
        <div class="table-responsive">
            <table class="table table-hover">
                <thead  class="thead-dark">
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Current Balance</th>
                        

                    </tr>
                </thead>
                <tbody>

                <?php
                include 'connection.php';
                $selectquery = " select * from customers";
                $query = mysqli_query($con, $selectquery);
                $nums = mysqli_num_rows($query);
                while($res = mysqli_fetch_array($query)){
                ?>
                <tr>
                 <td><?php echo $res['srNumber']; ?></td>
                 <td>
                
                      <a href="customerDetails.php?accountNumber=<?php echo $res['accountNumber']; ?>">
                       <button type="button" class="btn btn-light">
                          <?php echo $res['accountNumber']; ?>  
                       </button>
                      </a>
                  
                </td>
                 <td><?php echo $res['fullName']; ?></td>
                 <td><?php echo $res['phone']; ?></td>
                 <td><?php echo $res['email']; ?></td>
                 <td><?php echo $res['address']; ?></td>
                 <td><?php echo $res['currentBalance']; ?> INR</td>
             
                </tr>

               <?php
                }
                ?>     
                </tbody>
            </table>
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