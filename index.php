<!DOCTYPE html>

<?php

function pad_key($key){
    // key is too large
    if(strlen($key) > 32) return false;

    // set sizes
    $sizes = array(16,24,32);

    // loop until string length matches a valid size
    while(!in_array(strlen($key), $sizes)){
        $key = $key."\0";
    }

    // return
    return $key;
}

if(isset($_POST['encrypt']))
    $encrypt = $_POST['encrypt'];
if(isset($_POST['decrypt']))
    $decrypt = $_POST['decrypt'];

if(isset($_POST['pass'])){
    error_log("tamanho da string");
    $pass = $_POST['pass'];
    error_log(strlen($pass));
    $pass = pad_key($_POST['pass']);
    error_log(strlen($pass));
}


?>

<html>
<head>
        <meta charset="ISO-8859-1"> 
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
						$encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $pass, $_POST['encrypt'], MCRYPT_MODE_CBC);
						$encrypted64 = base64_encode($encrypted);
						echo "<br/><span>".$encrypted64."</span>";
					}
				?>
			</td>
			<td>
				<?php
					if(isset($_POST['decrypt'])){
						$encrypted = base64_decode($_POST['decrypt']);
                                                $ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
                                                error_log('Tamanho o vetor: '. $ivSize);
                                                $iv = substr($encrypted, 0, $ivSize);
                                                error_log('Tamanho a string: '. strlen($iv));
						$result = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $pass, $encrypted, MCRYPT_MODE_CBC, $iv);
						echo "<br/><span>".$result."</span>";
					}
				?>
			</td>
		</tr>
	</tbody>
</table>

</body>
</html>
