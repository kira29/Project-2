 <?php  
session_start();  
$username = "pap72";
$password = "jDEw5gSAE";
$hostname = "mysql:host=sql2.njit.edu;dbname=pap72";
 try  
 {  
      $connect = new PDO($hostname, $username,$password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                echo "<div style ='font:17px Arial;color:red'>Please enter Email or Password!!";  
           }  
           else  
           {  
                $query = "SELECT * FROM accounts WHERE email = :username AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"],
                          
                         
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["username"];  
                   
                
                       
                        
                       
                       
                     header("location:login_success.php");  
                }  
                else  
                {  
                     echo "<div style ='font:17px Arial;color:red'>Wrong Email or password!!";
                }  
           }  
      }else if (isset($_POST["create"]))
      {  header("location:signup.php");
      }
       
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  
 <!DOCTYPE html>
<html>

<style>

</style>

<head>
<title>Main</title>
<link rel="stylesheet" href="logincss.css">

</head>

<body>

<div class="main">
	<h2 class="sub-head">Login</h2>
		<div class="sub-main">	
			<form method="POST">
							
				<input placeholder="Enter Email" name="username" type="text" >
        
        <input placeholder="Enter Password" name="password" type="password" >
					
												
				<input type="submit" name="login" value="Login">
        
        <input type="submit" name="create" value="Create Account">
          
			</form>
      
      
    
     
   </div>
		</div>
		
   
</div>

</body>
</html>
