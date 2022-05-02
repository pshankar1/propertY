<?php
session_start();
if(!isset($_SESSION['username'])){
	
	header('location:login.php');
}



?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<title>Home Page</title>
</head>
<body>
<div class="container">



<a class ="float-right"HREF="logout.php"> Log Out</a>

<h1>Welcome <?php echo $_SESSION['username']; ?></h1>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <img src="https://assets.site-static.com/userFiles/717/image/luxury-atlanta-mansion-exterior.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Location/Age</h5>
        <p class="card-text">Floor Plan</p>
		<p class="card-text">bedrooms</p>
		<p class="card-text">bathrooms</p>
		<p class="card-text">Garden</p>
		<p class="card-text">Parking</p>
		<p class="card-text">Proximity near facilities</p>
		<p class="card-text">Proximity near main roads</p>
		<p class="card-text">Property Tax</p>
		<div class ="col-md-6 login-right">
<h2>Add a Property!</h2>
<form action="sellerdash.php" method="post">
<div class="form-group">
<label>Location and Age</label>
<input type="text" name="location" class="form-control" required>
</div>


<div class="form-group">
<label>Floor Plan</label>
<input type="text" name="floorplan" class="form-control" required>
</div>
<div class="form-group">
<label>Bedrooms</label>
<input type="text" name="BR" class="form-control" required>
</div>

<div class="form-group">
<label>Additional Facilities</label>
<input type="text" name="facilities" class="form-control" required>
</div>


<div class="form-group">
<label>Presence of Garden Y/N</label>
<input type="text" name="garden" class="form-control" required>
</div>

<div class="form-group">
<label>Parking Availability</label>
<input type="text" name="parking" class="form-control" required>
</div>

<div class="form-group">
<label>Proximity to nearby Facilities</label>
<input type="text" name="pfac" class="form-control" required>
</div>


<div class="form-group">
<label>Proximity to main roads</label>
<input type="text" name="mainroad" class="form-control" required>
</div>

<div class="form-group">
<label>Property tax Records</label>
<input type="text" name="tax" class="form-control" required>
</div>

<button type="submit" class="btn btn-primary">+</button>


</form>
</div>
      </div>
    </div>
  </div>
</div>
</body>
</html>