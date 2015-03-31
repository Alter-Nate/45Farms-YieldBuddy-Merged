<?php
$error = false;


if(isset($_POST['login'])){
	
	$username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
	$password = ($_POST['password']);

	
	if(file_exists('users/' . $username . '.xml')){
		$xml = new SimpleXMLElement('users/' . $username . '.xml', 0, true);
		if($password == $xml->password){
			session_start();
			echo "yup";
			$_SESSION['username'] = $username;
			$xml = new SimpleXMLElement('<user></user>');	
			header('Location: overview.php');
			die;
		}
	}
	$error = true;
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK REL="SHORTCUT ICON"
       HREF="/img/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style type="text/css">
body {
	background-image: url(img/background.png);
	margin-top: 0px;
	background-color: #000;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	color: #CCC;
	font-weight: bold;
	position: relative;
}
.description {
	font-size: 9px;
}
</style>
</head>
<body>
<p>&nbsp;</p>
<table width="400" height="135" border="0" align="center">
  <tr>
    <td height="131" align="center" valign="middle">
  <?php
  
  if($error){
      echo 'Invalid username and/or password<br/><br>';
  }
  
  echo "Please Login To Continue
  <form method=\"post\" action=\"\">
  <table width=\"240\" border=\"0\">
    <tr>
      <td width=\"84\">Username</td>
      <td width=\"147\"><input type=\"text\" value=\"$username\" name=\"username\" size=\"23\" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type=\"password\" name=\"password\" size=\"23\" /></td>
    </tr>
    <tr>
		<td colspan=\"2\"><input type=\"submit\" value=\"Login\" name=\"login\" style=\"width:282px\"/>
	</td>
    </tr>
  </table>";
  ?>
</td>
  </tr>
</table>
</body>
