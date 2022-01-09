<?php
	$conn = new mysqli("localhost", "root", "","web101");
	
			$id = $_POST["id"];
			$idnumber = $_POST['idnumber'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$gender = (int) $_POST['gender'];
			$bday = $_POST['bday'];
			$program = $_POST['program'];
			$yearlevel = (int) $_POST['yearlevel'];
			
			$query = mysqli_query($conn, "UPDATE user SET idnumber = '$idnumber', firstname= '$firstname', lastname= '$lastname', gender= '$gender', bday= '$bday', program= '$program', yearlevel= '$yearlevel' WHERE id = '$id'");
			
			echo "<script>
					alert(\"Updated Successfully\");
					window.location.href = \"http://localhost/IT110/index.html\";
			</script>"
?>