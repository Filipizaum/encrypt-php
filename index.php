<!DOCTYPE html>
<html>
<head>
	<title>Encrypt</title>
</head>
<body>
<table border="1">
	<thead>
		<tr>
			<th>Criptografar</th>
			<th>Descriptografar</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<form method="post">
					<input type="password" name="pass" />
					<br />
					<br />
					<textarea name="encrypt"></textarea>
					<br />
					<input type="submit" />
				</form>
			</td>
			<td>
				<form method="post">
					<input type="password" name="pass" />
					<br />
					<br />
					<textarea name="decrypt"></textarea>
					<br />
					<input type="submit" />
				</form>
			</td>
		</tr>
		<tr>
			<td>
				<?php
					if(isset($_POST['encrypt'])){
						$encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $_POST['pass'], $_POST['encrypt'], MCRYPT_MODE_CBC);
						$encrypted64 = base64_encode($encrypted);
						echo "<br/><span>".$encrypted64."</span>";
					}
				?>
			</td>
			<td>
				<?php
					if(isset($_POST['decrypt'])){
						$encrypted = base64_decode($_POST['decrypt']);
						$result = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $_POST['pass'], $encrypted, MCRYPT_MODE_CBC);
						echo "<br/><span>".$result."</span>";
					}
				?>
			</td>
		</tr>
	</tbody>
</table>

</body>
</html>