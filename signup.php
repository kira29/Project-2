<?php   
$username = "pap72";
$password = "jDEw5gSAE";
$hostname = "mysql:host=sql2.njit.edu;dbname=pap72";
 try  
 {  
      $con = new PDO($hostname, $username,$password);  
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
       
       if (isset($_POST['signup']))
       {
       $fname = $_POST['fname'];
       $lname =  $_POST['lname'];
       $email =   $_POST['email'];
       $pass =   $_POST['pass'];
       $phone = $_POST['phone'];
       $gender = $_POST['gender'];
       $birthday = $_POST['birthday'];
       
       $insert = $con->prepare("INSERT INTO accounts (email,fname,lname,password,phone,birthday,gender)
       VALUES (:email,:fname,:lname,:pass,:phone,:birthday,:gender) " );
       
       $insert->bindParam(':fname' ,$fname);
       $insert->bindParam(':lname' ,$lname);
       $insert->bindParam(':email' ,$email);
       $insert->bindParam(':pass' ,$pass);
       $insert->bindParam(':phone',$phone);
       $insert->bindParam(':birthday',$birthday);
       $insert->bindParam(':gender',$gender);
       
       $insert->execute();
       
       header("location:pdo_login.php"); 
       }
       
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  
<HTML>

<head>
<title>Sign Up</title>
<link rel="stylesheet" href="styles.css">

</head>

<body>

<div class="main">

	<h2 class="sub-head">Sign Up</h2>
		<div class="sub-main">	
			<form method="POST">
				 <input type="text" name="fname" placeholder="First Name"  required>
         <input type="text" name="lname" placeholder="Last Name"  required>
         <input type="email" name="email" placeholder="Email"  required>
         <input type="password" name="pass" placeholder="Password"  required>
         <input type="text" name="phone" placeholder="Phone">
         <input type="text" name="gender" placeholder="Gender">
         <input type="text" name="birthday" placeholder="Birthday">
         <input type="submit" name="signup" value="Sign up">
 
			</form>
		</div>
		
</div>

</body>
</html>
