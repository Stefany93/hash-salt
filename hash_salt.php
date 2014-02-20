<?php
	if(isset($_GET['password']) and !empty($_GET['password'])){
		$password = trim($_GET['password']);
		$password = htmlentities($password);
		$hashed_password = hash('sha512',$password);
		print '<h1> Your raw password: <em>'.$password.'</em></h1>';
		print '<h1> Hash SHA512: </h1> <em>'. $hashed_password.'</em>';
		print '<h1> Salt: </h1> <em>'.$salt = uniqid(mt_rand(), true).'</em>';
		print '<h1> Hash & Salt together </h1> '.$hashed_password.'<em>'.$salt.'</em>';
		print '<h1> Hash length = '.strlen($hashed_password).' Characters </h1>';
		print '<h1>Salt length = '.strlen($salt).' Characters</h1>';

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