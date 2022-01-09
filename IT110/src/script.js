$(document).ready(function(){
	
	var user={};

	function register(e){
		user.idnumber = document.getElementById('idnumber').value;
		user.firstname = document.getElementById('firstname').value;
		user.lastname = document.getElementById('lastname').value;
		user.gender = document.getElementById('gender').value;
		user.bday = document.getElementById('bday').value;
		user.program = document.getElementById('program').value;
		user.yearlevel = document.getElementById('yearlevel').value;
		console.log(user);

		$.ajax({
			type:"POST",
			data:{action:"register", userdata:user},
			url:"src/php/user.php",
			success:function(response){
				idresponse = jQuery.parseJSON(response);
				var table = $("#usertable tbody");
				if(idresponse==0){
					alert("Error saving the user!");
				}else{
					user.id = idresponse;
					appendUser(user, table);
				}
				$("#userForm").find("input, select").val("");
			},
		});


		e.preventDefault();
	}

	function getUsers(){
		$.ajax({
			type:"GET",
			data:{action:"getusers"},
			url:"src/php/user.php",
			success:function(response){
				users = jQuery.parseJSON(response);
				var table = $("#usertable tbody");
				for(var i =0; i < users.length;i++){
					appendUser(users[i], table);
				}	

			},
		});
	}
	
	function appendUser(user, table){
		row = "<tr>"+
			"<td class=\"hidden1\" style = \"display:none\"><a id =\"link\" class =\"btn btn-primary\" href =\"#\" onclick =\"getID()\" name =\"1\">Select this</a></td>"+
			"<th scope=\"row\">"+ user.id +"</th>"+
		      "<td>"+ user.idnumber +"</td>"+
		      "<td>"+ user.firstname +"</td>"+
		      "<td>"+ user.lastname +"</td>"+
		      "<td>"+ user.gender +"</td>"+
		      "<td>"+ user.bday +"</td>"+
		      "<td>"+ user.program +"</td>"+
		      "<td>"+ user.yearlevel +"</td>"+
			"</tr>";
		var a = JSON.stringify(user.id);
		table.append(row);
		document.getElementById('link').id = a;
	}
	

	$("#userForm").submit(register);

	getUsers();
/*--------------------------------------------------------------------------------------------------------------------------------------------*/
	$("#update").click(function(){
		var x = document.getElementById("hidden");
		var y = document.getElementById("delete");
		
		if (x.style.display === "none") {
				x.style.display = "";
				y.style.display="none";
				document.querySelectorAll(".hidden1").forEach(a=>a.style.display = "flex");
				document.getElementById('update').innerText = 'Cancel';
		} else {
				x.style.display = "none";
				y.style.display = "";
				document.querySelectorAll(".hidden1").forEach(a=>a.style.display = "none");
				document.getElementById('update').innerText = 'Update';
		}
	});
	
	$("#delete").click(function(){
		var x = document.getElementById("hidden");
		var y = document.getElementById("update");
		
		if (x.style.display === "none") {
				x.style.display = "";
				y.style.display="none";
				document.querySelectorAll(".hidden1").forEach(a=>a.style.display = "flex");
				
				var name = document.querySelectorAll('a');
					for (var i=0; i < name.length; i++) {
						name[i].setAttribute("name", "2");
					}
				
				document.getElementById('delete').innerText = 'Cancel';
		} else {
				x.style.display = "none";
				y.style.display = "";
				document.querySelectorAll(".hidden1").forEach(a=>a.style.display = "none");
				
				var name = document.querySelectorAll('a');
					for (var x=0; x < name.length; x++) {
						name[x].setAttribute("name", "1");
					}
					
				document.getElementById('delete').innerText = 'Delete a User';
		}
	});
	
	
	
	
	
	
	
});