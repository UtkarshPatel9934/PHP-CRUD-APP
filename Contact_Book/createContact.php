<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
        .btn-primary{
          margin: 10px 0;
        }
         .navbar{
           margin-bottom: 60px;
         }

         input{
           margin: 10px 0;
         }
    </style>
</head>
<body>

<!-- header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="createContact.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="displayContacts.php">Phone Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="createContact.php">Add Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Edit Contacts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Delete Contacts</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- header -->

<?php
include_once 'connection.php';
if(isset($_POST['submit']))
{    
     $first_name = $_POST['first_name'];
     $last_name = $_POST['last_name'];
     $email = $_POST['email'];
     $mobile = $_POST['mobile'];


     
     $sql = "INSERT INTO contacts (first_name, last_name, mobile, email)
     VALUES ('$first_name','$last_name','$mobile', '$email')";

    $checkDBEmpty = "SELECT * FROM contacts";
    $emptyStatus = mysqli_query($conn,$checkDBEmpty);

    $checkEmail = "SELECT * FROM contacts WHERE mobile='$mobile'";
    $checkMobile = "SELECT * FROM contacts WHERE email='$email'";

    if(empty($emptyStatus))
    {
      if(mysqli_query($conn, $sql))
     {
       echo "<div class='alert alert-success d-flex align-items-center' role='alert'>
       <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
       <div>
         Great! Your Data has been added to the Phone Book!
         <br>
         please click on the NavBar to move to display the contacts saved in Phone Book
       </div>
           </div>";
         } else {
           
      echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
      <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
      <div>
        Opps! Your Data Shouldn't be added to the Phone Book!
        <br>
        Try Again...
      </div>
          </div>";
     
         }
    }
    else if (!((mysqli_query($conn,$checkEmail)) && (mysqli_query($conn,$checkMobile)))){
     if(mysqli_query($conn, $sql))
     {
       echo "<div class='alert alert-success d-flex align-items-center' role='alert'>
       <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
       <div>
         Great! Your Data has been added to the Phone Book!
         <br>
         please click on the NavBar to move to display the contacts saved in Phone Book
       </div>
           </div>";
         } else {
           
      echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
      <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
      <div>
        Opps! Your Data Shouldn't be added to the Phone Book!
        <br>
        because you are trying to enter contact which already exists in the Phone Book!
        <br>
        Try Again...
      </div>
          </div>";
     
         }
       mysqli_close($conn);
  }
}
?>


    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Contact Form</h2>
                    </div>
                    <p>Please fill this form and submit to add the contact to the <b><i>Phone Book</i></b>.</p>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" placeholder="Enter First Name..." class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" placeholder="Enter Last Name..." name="last_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" placeholder="Enter Email..." name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="mobile" name="mobile" class="form-control" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="Format: 1234567890" required>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>




    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Script -->
</body>
</html>