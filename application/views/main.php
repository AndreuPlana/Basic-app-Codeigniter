<!DOCTYPE html>
<html>
<head>
	<title>Loged</title>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div class="container-fluid bg-primary">
		<h1 class="text-center">Files</h1>
</div>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <?php echo form_open("loged/exit"); ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <button type="submit" class="btn btn-danger">Sortir</button>
      </form>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h2>Pujar</h2>
      <?php //echo $error;?>
      <?php echo form_open_multipart('loged/upload');?>
      <input type="file" name="userfile" size="20" />
      <br /><br />
      <input type="submit" value="Pujar" />
      </form>

    </div>
    <div class="col-md-4">
      <h2>Arxius d'usuari</h2>
      <?php 
        echo form_open('loged/accio');
        foreach ($fit as $key => $f) {
            foreach ($f as $key => $value) {
                echo "<input type='radio' name='fitxers' value='".$value."''>".$value."<br>";
            }
            echo "<br>";
        }
        echo "<input type='submit' class='btn btn-success' value='Descarregar' name='acc'><br>";
        echo "<input type='text' class='form-control' placeholder='Codi Usuari amb qui compartir' name='compa'>";
        echo "<input type='submit' class='btn btn-default' value='Compartir' name='acc'>";
        echo "<input type='submit' class='btn btn-warning' value='Info' name='acc'>";
        echo "<input type='submit' class='btn btn-danger' value='Eliminar' name='acc'>";
        echo form_close();
       ?>

       <br>

       <?php 
      if(!empty($info))
      {
        foreach ($info as $key => $f) {
            foreach ($f as $key => $value) {
                echo $key." : ".$value ."<br>";
            }
            echo "<br>";
        }

      }
      if(!empty($info))
      {
        echo '<h4>Usuaris amb que es comparteix</h4>';
        foreach ($ucomp as $key => $f) {
            foreach ($f as $key => $value) {
                echo $key." : ".$value ."<br>";
            }
            echo "<br>";
        }

      }
        ?>

    </div>
    <div class="col-md-4">
      <h2>Arxius Compartits</h2>
       <?php 
        echo form_open('loged/accio');
        foreach ($fcomp as $key => $f) {
            foreach ($f as $key => $value) {
                echo "<input type='radio' name='fitxers' value='".$value."''>".$value."<br>";
            }
            echo "<br>";
        }
        echo "<input type='submit' class='btn btn-success' value='Descarregar' name='acc'><br>";
        echo "<input type='submit' class='btn btn-warning' value='Info2' name='acc'>";

        echo form_close();
       ?>

       <br>

       <?php 
      if(!empty($info2))
      {
        foreach ($info2 as $key => $f) {
            foreach ($f as $key => $value) {
                echo $key." : ".$value ."<br>";
            }
            echo "<br>";
        }

      }
      if(!empty($info2))
      {
        echo '<h4>Usuaris amb que es comparteix</h4>';
        foreach ($ucomp2 as $key => $f) {
            foreach ($f as $key => $value) {
                echo $key." : ".$value ."<br>";
            }
            echo "<br>";
        }

      }
        ?>
    </div>
  </div>  
</div>
</body>
</html>