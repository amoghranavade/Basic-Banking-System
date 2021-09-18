<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="icon" href="./images/bank_icon.png">

  
    <title>Online Banking</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/footer.css">

<style>

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
   
  }
  .main-div{
    background-color: lightgrey;
}

nav{
  position: fixed;
}
  body {

    overflow: hidden;
    min-height: 100vh;
  }
  
  body::-webkit-scrollbar {
    display: none;
  }

</style>
   
</head>
<body>
    

<nav>
      
      <label class="logo">Basic Bank</label>
      <ul>
        <li><a class="active"    href="index.php"><b>Home</b></a></li>
        <li><a class="inactive"  href="customers.php"><b>Customers</b></a></li>
        <li><a class="inactive"  href="transfers.php"><b>Transactions</b></a></li>
      </ul>
</nav>

<br>
<br>

<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
 <img src="./images/bank1.jfif" style="margin-top: 30px; height: 30%; width: 30%; margin-left: 30px; border-radius: 5%; float:left;">
 <h1 style="margin-top: 40px; margin-left: 700px;">We are the bank you need!</h1>
 <h5 class="w3-padding-32" style="margin-left: 700px;">Our bank offers various facities such as transfer money among the customers. You can also view all the customers and see the transactions that had happened recently.</h5>
 <p class="w3-text-grey" style="margin-left: 700px;">Committed in understanding our Customer’s needs and aim to consistently deliver relevant financial
 solutions and excellent customer service. We are fully dedicated to our customers and always there for them in case they need any assistance.</p>
</div>


<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
  <h2 class="w3-wide w3-center"><b>CONTACT</b></h2>
    <p class="w3-opacity w3-center"><i>Got some queries?</i></p>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> Mumbai, India<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: +91 909090909<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: bank@mail.com<br>
      </div>
      <div class="w3-col m6">
        <form action="/action_page.php" target="_blank">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Account Number" required name="Account Number">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="Query" required name="Query">
          <br>
          <button class="btn btn-secondary" type="submit">SEND</button>
        </form>
      </div>
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