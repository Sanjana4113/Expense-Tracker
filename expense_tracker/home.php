<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expense Tracker</title>
  <link rel="stylesheet" type="text/css" href="Style.css">
</head>

<style>
  body{
    height: 587px;
    background: linear-gradient(to bottom, #f2f1ef, #d8cfd0, #b1a6a4, #413f3d);
  }
  
  .login-form {
    width: 400px;
    margin: 50px auto;
    font-size: 15px;
    margin-top: 90px;
  }

  .login-form form {
    height: 300px;
    margin-bottom: 20px;
    background: #fff;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
    border: 1px solid #ddd;
  }

  .login-form h2 {
    color: #636363;
    margin: 0 0 15px;
    position: relative;
    text-align: center;
  }

  .login-form h2:before,
  .login-form h2:after {
    content: "";
    height: 2px;
    width: 15%;
    background: #d4d4d4;
    position: absolute;
    top: 50%;
    z-index: 2;
  }

  .login-form h2:before {
    left: 0;
  }

  .login-form h2:after {
    right: 0;
  }

  .login-form .hint-text {
    color: #999;
    margin-bottom: 30px;
    text-align: center;
  }

  .login-form a:hover {
    text-decoration: none;
  }

  .form-control,
  .btn {
    min-height: 38px;
    margin-top: 10px;
  }

  .btn {
    font-size: 15px;
    font-weight: bold;
  }

  .heading{
    height: 5.5rem; 
  }

  .head-p{
    font-weight: bold;
    font-size: 40px;
    text-align: center;
    margin-top: 20px;
    text-decoration: underline;
  }

  .login {
    margin-top: 20px;
    margin-left: 79rem;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    transition: background-color 0.3s ease;
  }

  .login:hover {
    background-color: #0056b3;
  }
    
  .para{
    height: 28rem;
    width: 60rem;
    margin-left: 12rem;
    padding: 10px;
    padding-bottom: 10px;
    border-radius: 20px;
    background-image: url('expense-management.jpg'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    opacity: 0.8;
    position: relative;
  }

  .para p{
    font-weight: bold;
    font-size: 20px;
    position: absolute;
  }

  input[type="password"]{
    width: 330px;
  }
</style>

<body class="exp_body">
  <div class="heading">
    <p class="head-p">Expense Management System</p>
    <div><a href="login.php" class="login">Login</a></div>
  </div>
  <div class="para">
    <p >Welcome to Expense Management Website! <br><br>With this website, you can effortlessly monitor your expenses, categorize transactions, and gain valuable insights into your financial patterns. Whether you're budgeting for personal expenses, managing business costs, or simply aiming for better financial health, our intuitive interface and powerful features are here to support you every step of the way. <br><br>Our mission is to provide users with a reliable and user-friendly platform that simplifies the process of expense tracking and promotes financial awareness. We believe that by empowering individuals and businesses to manage their finances more effectively, we can contribute to greater financial stability and success for our users. <br><br>From our team, we are passionate about delivering an exceptional user experience and continually improving our website to meet the evolving needs of our community. <br><br>Namratha R  1GA21IS100 <br>Prathijna U  1GA21IS123 <br>Sanjana BH  1GA21IS140</p>
  </div>
  
  <script src="Script.js"></script>
</body>
</html>
