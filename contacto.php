<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Paseos Perrunos Web'; 
		$to = 'ventasjt92@gmail.com'; 
		$subject = 'Mensaje de PaseosPerrunos';
        $errName = '';
        $errEmail = '';
        $errMessage = '';
        $errHuman = '';
		
		$body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Ingresa tu Nombre';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Ingresa un email valido';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Ingresa tu mensaje';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'El mensaje anti-spam es incorrecto';
		}
 
    // If there are no errors, send the email
    if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
        if (mail ($to, $subject, $body, $from)) {
            $result='<div class="alert alert-success">Mensaje enviado con exito!</div>';
        } else {
            $result='<div class="alert alert-danger">Lo sentimos, ocurrio un error, intenta mas tarde!</div>';
        }
    }
        }
    ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Paseos Perrunos Barcelona</title>
    
    <!-- Favicon -->
	<link rel="icon" type="image/png" href="img/icon.png" />

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="body-General">
    <!-- Navigation <span class="glyphicon glyphicon-search"></span>-->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <!--<span class="glyphicon glyphicon-minus"></span>-->
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">INICIO</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">
                    <li>
                        <a href="acerca.html"><span class="glyphicon glyphicon-heart"></span><strong> Acerca de</strong></a>
                    </li>
                    <li>
                        <a href="servicios.html"><span class="glyphicon glyphicon-map-marker"></span><strong> Servicios</strong></a>
                    </li>
                    <li>
                        <a href="galeria.html"><span class="glyphicon glyphicon-picture"></span><strong> Galeria</strong></a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-earphone"></span><strong> Contacto</strong></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            
            
            <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-1 col-md-4 col-md-offset-1">
                <h1><strong>Contactanos</strong></h1>
                <br>
                <p>Para contratos, reservas, consultas o cualquier otra informacion llamanos al <strong><em>666-734-745</em></strong> o tambien puedes enviar un mensaje rellenando el siguiente formulario a continuacion: </p>
                <br>    
            </div>
            
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-md-6 col-md-offset-0">
                <div class="hidden-xs"><br></div>
                
                <form class="form-horizontal" role="form" method="post" action="contacto.php">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre y Apellido" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                            <?php echo "<p class='text-danger'>$errName</p>";?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@gmail.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                            <?php echo "<p class='text-danger'>$errEmail</p>"; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Mensaje</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" name="message" id="message"></textarea>
                            <?php echo "<p class='text-danger'>$errMessage</p>";?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="human" class="col-sm-2 control-label">2+3= ?</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="human" name="human" placeholder="Respuesta">
                            <?php echo "<p class='text-danger'>$errHuman</p>";?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <?php echo $result; ?>	
                        </div>
                    </div>
                    </form>
            </div>
        </div>
        
        <hr>
        
        <!-- Footer -->
        <footer>
            
            <div class="row ">
                <div class="col-xs-6 col-sm-4 col-md-4 col-md-offset-1">
                    <strong><p>Direcci&oacute;n</p></strong>
                    <p>Carrer de la Marina, 372-382 -  Barcelona, 08025</p>
                    <a href="https://goo.gl/maps/VCUsN5iodfS2" target="_blank">Google Maps</a>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 col-md-offset-0">
                    <strong><p>Horario</p></strong>
                    <p>Lunes a Viernes: 8:00h - 22:00h</p>
                    <p>Sabados y Domingos: 7:00h - 23:00h</p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 col-md-offset-0">
                    <div class="visible-xs"><br></div>
                    <strong><p>Contacto</p></strong>
                    <p>Tel: 666-734-745</p>
                    <p>Contacto@paseosperrunos.com</p>
                </div>
            </div>
            <hr>
            <div class="row text-center">
                <div class="col-md-12">
                    <strong><p>Copyright &copy; <a href="http://www.ejdp.co.ve" target="_blank">[EJDP.co.ve]</a> - 2017</p></strong>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>