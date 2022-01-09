<?php 
	require ('conn.php');
	
	if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action']=="register"){
		$pdo->beginTransaction();
		try {
			$sql = 'INSERT INTO user(idnumber, firstname, lastname, gender, bday, program, yearlevel) VALUES(:idnumber, :firstname, :lastname, :gender, :bday, :program, :yearlevel)';
			$statement = $pdo->prepare($sql);
			$statement->execute([
				':idnumber' => $_POST['userdata']['idnumber'],
				':firstname' => $_POST['userdata']['firstname'],
				':lastname' => $_POST['userdata']['lastname'],
				':gender' => (int) $_POST['userdata']['gender'],
				':bday' => $_POST['userdata']['bday'],
				':program' => $_POST['userdata']['program'],
				':yearlevel' => (int) $_POST['userdata']['yearlevel'],
			]);

			echo $pdo->lastInsertId();
			$pdo->commit();
		} catch (Exception $e) {
			$pdo->rollback();
		}
	}
/**/else if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action']=="update"){
		$conn = new mysqli("localhost", "root", "","web101");
		$id= $_POST['id'];
		$result = $conn -> query("SELECT * FROM id");
	
		if(is_null($result)){
			$query = mysqli_query($conn, "INSERT INTO id(id) VALUES($id)");
		}
		else{
			$query = mysqli_query($conn, "TRUNCATE TABLE id");
			$query = mysqli_query($conn, "INSERT INTO id(id) VALUES($id)");
		}
	}
/**/else if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action']=="delete"){
		$conn = new mysqli("localhost", "root", "","web101");
		$id= $_POST['id'];
		$result = $conn -> query("DELETE FROM user WHERE id =$id");
	
	}
	else if($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action']=="getusers"){
		$sql = "SELECT * FROM user";
		$statement = $pdo->query($sql);
		$users = $statement->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($users);
	}
	else if($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action']=="getupusers"){
		$sql = "SELECT * FROM user";
		$statement = $pdo->query($sql);
		$users = $statement->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($users);
	}
 ?>