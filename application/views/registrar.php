<!DOCTYPE html>
<html>
<head>
	<title>Registrar</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<body>

	<div class="container-fluid bg-primary">
		<h1 class="text-center">Registrar</h1>
	</div>
	<div class="container">
		<?php echo form_open('registre/reg');  ?>
		  <div class="form-group">
		    <label for="codi">Codi User</label>
		    <input type="codi" name="codi" value="<?php echo set_value('codi') ?>" class="form-control" id="codi" placeholder="Codi Usuari">
		  </div>
		  <div class="form-group">
		    <label for="email">Correu Electronic</label>
		    <input type="email" name="email" value="<?php echo set_value('email') ?>" class="form-control" id="email" placeholder="Email">
		  </div>
		  <div class="form-group">
		    <label for="pass">Password</label>
		    <input type="password" name="password" value="<?php echo set_value('password') ?>" class="form-control" id="pass" placeholder="Password">
		  </div>
		  <div class="form-group">
		    <label for="pass">Repeteix Password</label>
		    <input type="password" name="rpassword" value="<?php echo set_value('rpassword') ?>" class="form-control" id="repass" placeholder="Password">
		  </div>
		  <div class="form-group">
		    <label for="telefon">Telfon</label>
		    <input type="text" name="telefon" class="form-control" value="<?php echo set_value('telefon') ?>" id="telefon" placeholder="Telefon">
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		<?php echo form_close(); ?>
	</div>




</body>
</html>