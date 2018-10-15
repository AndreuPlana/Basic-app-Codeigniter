<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<body>

	<div class="container-fluid bg-primary">
		<h1 class="text-center">Login</h1>
	</div>
	<div class="container">
		<?php echo form_open('Inici/entrar');  ?>
		  <div class="form-group">
		    <label for="email">Correu Electronic</label>
		    <input type="email" class="form-control" name="email" placeholder="Email">
		  </div>
		  <div class="form-group">
		    <label for="pass">Password</label>
		    <input type="password" class="form-control" name="password" placeholder="Password">
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
		<?php echo form_open('Registre/index');?>
	<button class="btn btn-success">Registrar</button>
</form>
	</div>

	


</body>
</html>