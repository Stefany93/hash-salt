<?php
	
// IE does not allow the "if isset submit" method, so we using $_SERVER 
// We get the user's plain text password, we trim, validate and sanitize it 
// and then we hash and and append the salt at the end of the password
// The reason we use salt is that the evil user would have no way to break
// out SHA512 hashes.
if($_SERVER['REQUEST_METHOD'] == 'GET'){	
	if(isset($_GET['password']) and !empty($_GET['password'])){
		$password = trim($_GET['password']);
		$password = htmlentities($password);
		$hashed_password = hash('sha512',$password);
		$salt = uniqid(mt_rand(), true);
		print '<h1> Your raw password: <em>'.$password.'</em></h1>';
		print '<h1> Hash SHA512: </h1> <em>'. $hashed_password.'</em>';
		print '<h1> Salt: </h1> <em>'.$salt.'</em>';
		print '<h1> Hash & Salt together </h1> '.$hashed_password.'<em>'.$salt.'</em>';
		print '<h1> Hash length = '.strlen($hashed_password).' Characters </h1>';
		print '<h1>Salt length = '.strlen($salt).' Characters</h1>';

	}
}
?>
<style type="text/css">
	em{
		color:red;
	}
</style>
<form action="" method="get">
	<label>Plain text password: 
			<input type="text" name="password" />
	</label>
	<input type="submit"  value="Create hash and salt!" />
</form>
