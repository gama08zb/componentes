<?php 
session_start();
include 'conexion.php';

if(isset($_SESSION['user'])) {?>
  
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="image/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>
	 <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <Style >
	/*!
	 * IE10 viewport hack for Surface/desktop Windows 8 bug
	 * Copyright 2014-2015 Twitter, Inc.
	 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
	 */

	/*
	 * See the Getting Started docs for more information:
	 * http://getbootstrap.com/getting-started/#support-ie10-width
	 */
	@-ms-viewport     { width: device-width; }
	@-o-viewport      { width: device-width; }
	@viewport         { width: device-width; }
	
	/*
	 * Base structure
	 */

	/* Move down content because we have a fixed navbar that is 50px tall */
	body {
	  padding-top: 50px;
	}


	/*
	 * Global add-ons
	 */

	.sub-header {
	  padding-bottom: 10px;
	  border-bottom: 1px solid #eee;
	}

	/*
	 * Top navigation
	 * Hide default border to remove 1px line.
	 */
	.navbar-fixed-top {
	  border: 0;
	}

	/*
	 * Sidebar
	 */

	/* Hide for mobile, show later */
	.sidebar {
	  display: none;
	}
	@media (min-width: 768px) {
	  .sidebar {
	    position: fixed;
	    top: 51px;
	    bottom: 0;
	    left: 0;
	    z-index: 1000;
	    display: block;
	    padding: 20px;
	    overflow-x: hidden;
	    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
	    background-color: #f5f5f5;
	    border-right: 1px solid #eee;
	  }
	}
	/*
	 * Main content
	 */

	.main {
	  padding: 20px;
	}
	@media (min-width: 768px) {
	  .main {
	    padding-right: 40px;
	    padding-left: 40px;
	  }
	}
	.main .page-header {
	  margin-top: 0;
	}


	/*
	 * Placeholder dashboard ideas
	 */

	.placeholders {
	  margin-bottom: 30px;
	  text-align: center;
	}
	.placeholders h4 {
	  margin-bottom: 0;
	}
	.placeholder {
	  margin-bottom: 20px;
	}
	.placeholder img {
	  display: inline-block;
	  border-radius: 50%;
	}

	/* Sidebar navigation */
	.nav-sidebar {
	  margin-right: -21px; /* 20px padding + 1px border */
	  margin-bottom: 20px;
	  margin-left: -20px;
	}
	.nav-sidebar > li > a {
	  padding-right: 20px;
	  padding-left: 20px;
    text-align: center;


	}
	.nav-sidebar > .active > a,
	.nav-sidebar > .active > a:hover,
	.nav-sidebar > .active > a:focus {
	  color: #fff;
	  background-color: #428bca;
	}
	div #circulo{
	  width: 100px;
    height: 100px;
    background-color:#8A916F;
    border-radius: 50%;
    display: inline-block;
	}
  
  .cuadrado{
    padding: 1em;
      float:left;
      width: 100%;
      margin-right:3%;
      background: #55D400;
  }
  .cuadrado:last-child{
    margin-right:0;
  }
  .cuadrado:before{
      content:"";
      display:block;
      padding-top:100%;
    float: left; 
  }

    </Style>
  </head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">component <span class="sr-only">(current)</span></a></li>
            <li><a href="#"><h4>Agregar</h4>
             </a></li>
            
          </ul>
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Edit</h1>

          <div class="row placeholders">

          </div>

          <h2 class="sub-header">Component</h2>
          <div class="row placeholders">

            <div class="col-xs-6 col-sm-6 placeholder">
              <form action="editcomponent.php" method="post">
          		 <div class="form-group">
            		<input type="hidden" class="form-control" id="txtcodigo" name="txtcodigo" required maxlength="11" value="<?php echo $_GET['id_componentes']; ?>">
		  		</div>
		  		<div class="form-group">
            		<label for="nombre" class="control-label">Nombre componente</label>
            		<input type="text" class="form-control" id="txtnombre" name="txtnombre" required maxlength="50" value="<?php echo $_GET['nombre']; ?>">
          		</div>
			  	<div class="form-group">
	            	<label for="slot" class="control-label">slot</label>
	            	<input type="text" class="form-control" id="txtslot" name="txtslot" required maxlength="11" value="<?php echo $_GET['slot']; ?>">
	          	</div>
	          	<div class="form-group">
                  <label for="cbxcasa" class="control-label">Casa</label>
                  <select class="form-control" value="" id="cbxcasa" name="cbxcasa" >
                     <option value="">--Opci&oacute;n--</option>
                     <?php
                       $conexion= new Conexion();
                       $result= $conexion->llenarCasa();
                       while ($myrow = $result->fetch_assoc()) {
                         echo "<option value='".$myrow['id']."'>".$myrow['nombre']."</option>";
                       }
                       $conexion->cerrarConexion();  
                     ?>
                   </select>
                	</div>
                  <div class="form-group">
                    <select id="listTagDisponible" name="listTagDisponible" multiple="multiple">
                      <?php 
                        $conexion= new Conexion();
                        $result= $conexion->llenarTags();
                        while ($rowTag = $result->fetch_assoc()) { ?>
                            <option value="<?php echo $rowTag['id']; ?>"><?php echo $rowTag['nombre']; ?></option>
                      <?php } ?>
                    </select>
                    <select id="listTag" name="listTag[]" multiple="multiple">
                    </select>
                    <button id="btnAgregar">Agregar</button>
                    <button id="btnQuitar">Quitar</button>
                  </div>
	          	<div class="form-group">
	          		<input type="submit" class="btn btn-info" id="btnenviar" name="btnenviar" required maxlength="50">
	          	</div>
          	</form>
            </div>
             
          </div>
          </div>
         
        </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){
		    $('#cbxcasa > option[value="<?php echo $_GET['id_casa']; ?>"]').attr('selected', 'selected');
		});

		$().ready(function(){
        $("#btnAgregar").click(function(){
          return !$('#listTagDisponible option:selected').remove().appendTo('#listTag');  
        });

        $("#btnQuitar").click(function(){
          return !$('#listTag option:selected').remove().appendTo('#listTagDisponible');  
        });
      
      });
	</script>
  </body>
</html>
<?php }else{
  echo '<script> window.location="index.php"; </script>';
  } ?>

