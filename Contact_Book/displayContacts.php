
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<style>
		h1{
			text-align: center;
			padding: 30px;
			text-transform:capitalize;
			color: blue;
		}

		
		th, tr, td{
			border: 2px solid black;
		}

		thead{
			background-color: gray;
		}

		tbody{
			background-color: gold;
		}
		.navbar{
           		margin-bottom: 60px;
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

	<h1>Welcome, to your <b><i>Phone Book</i></b></h1>

	<?php

	require 'connection.php';

	$query = "SELECT * FROM contacts";


	$res = mysqli_query($conn, $query);


	echo"<table class='table'>
	<thead>
		<tr>
			<th scope='col'>id</th>
			<th scope='col'>First Name</th>
			<th scope='col'>Last Name</th>
			<th scope='col'>Mobile</th>
			<th scope='col'>Email</th>
		</tr>
	</thead> <tbody>";


	while($row=mysqli_fetch_assoc($res))
	{
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['first_name'] . "</td>";
		echo "<td>" . $row['last_name'] . "</td>";
		echo "<td>" . $row['mobile'] . "</td>";		
		echo "<td>" . $row['email'] . "</td>";	
		echo "</tr>";	
	}
		echo "</tbody></table>";


	?>




    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Script -->
</body>
</html>

