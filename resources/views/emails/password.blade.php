<!DOCTYPE html>
<html>
<head>
	<title>Reset Your Password</title>
</head>
<body>
	<p>Click here to reset your password: {{ url('password/reset/'.$token) }}</p>
</body>
</html>