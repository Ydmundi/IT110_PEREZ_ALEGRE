<!DOCTYPE html>
<html>
<head>
	<title>UPDATE</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
		
	
	</script>

</head>
<body>
	<?php
		$conn = new mysqli("localhost", "root", "","web101");
		$id = $conn -> query("SELECT * FROM id");
		$row = $id->fetch_assoc();
		$id = $row['id'];
		
		$query = $conn -> query("SELECT * FROM user where id = $id");
		$row = $query->fetch_assoc();
		
		$idnumber = $row['idnumber'];
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$gender = $row ['gender'];
		$bday = $row['bday'];
		$program = $row['program'];
		$yearlevel = $row['yearlevel'];
		
		
	echo"<div class=\"container mt-3 d-flex justify-content-center\">
		<div class=\"card\" style=\"width: 30rem;\">
		  <div class=\"card-body\">
			<form id=\"userForm\" name=\"userForm\" action =\"update.php\" method =\"post\">
			  <div class=\"mb-3\">
			    <label for=\"id\" class=\"form-label\">YOUR ID</label>
			    <input class=\"form-control\" id=\"idn\" value = $id readonly name =\"id\">
			  </div>
			  <div class=\"mb-3\">
			    <label for=\"idnumber\" class=\"form-label\">ID Number</label>
			    <input pattern=\"\d{3}-\d{5}\" maxlength=\"9\" minlength=\"9\" required type=\"text\" class=\"form-control\" id=\"idnumber\" value = $idnumber name =\"idnumber\">
			  </div>
			  <div class=\"mb-3\">
			    <label for=\"firstname\" class=\"form-label\">Firstname</label>
			    <input required type=\"text\" class=\"form-control\" id=\"firstname\" value = $firstname name=\" firstname\">
			  </div>
			  <div class=\"mb-3\">
			    <label for=\"lastname\" class=\"form-label\">Lastname</label>
			    <input required type=\"text\" class=\"form-control\" id=\"lastname\" value = $lastname name=\"lastname\">
			  </div>
			  <div class=\"mb-3\">
			    <label for=\"gender\" class=\"form-label\">Gender <strong>(Select Again)</strong></label>
				<select required class=\"form-select\" id=\"gender\" aria-label=\"Default select example\" name =\"gender\">
				  <option value=\"0\">Female</option>
				  <option value=\"1\">Male</option>
				</select>
				</div>
			  <div class=\"mb-3\">
			    <label for=\"bday\" class=\"form-label\">Birthday</label>
			    <input required type=\"date\" class=\"form-control\" id=\"bday\" value = $bday name=\"bday\">
			  </div>
			  <div class=\"mb-3\">
			    <label for=\"program\" class=\"form-label\">Program</label>
			    <input required type=\"text\" class=\"form-control\" id=\"program\" value = $program name=\"program\">
			  </div>
			  <div class=\"mb-3\">
			    <label for=\"yearlevel\" class=\"form-label\">Year Level</label>
			    <input max=\"5\" min=\"1\" required type=\"number\" class=\"form-control\" id=\"yearlevel\" value = $yearlevel name=\"yearlevel\">
			  </div>
			  <button id=\"update\" type=\"submit\" class=\"btn btn-primary\">Update</button>
			</form>	  	
		  </div>
		</div>
		</div>";
?>
</body>
<style type="text/css">
	input:invalid, select:invalid{
		border: 2px solid red;
	}
</style>
</html>