<?php include './autoloader.php'; ?>
<?php
    if (isset($_GET['s'])){
        $origin_url = Ktly::getOriginUrlByToken($_GET['s']);
        if ($origin_url == ""){
            Ktly::redirectToKtlyUrl();
        }else{
            Ktly::redirectToUrl($origin_url);
        }
    }else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" integrity="sha512-xnwMSDv7Nv5JmXb48gKD5ExVOnXAbNpBWVAXTo9BJWRJRygG8nwQI81o5bYe8myc9kiEF/qhMGPjkSsF06hyHA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Ktly</title>
</head>
<body>
    <div class="container py-4">

        <div class="row">
        <header class="pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="./images/logo.png" width="42px"> &nbsp; Ktly
            </a>
        </header>
        </div>
        <div class="row p-5 action">
            <div class="row">
                <div class="col-3 align-self-center">
                    <h1 class="title">Acorta tus URLs con <span>Ktly</span></h1>
                    <p>Genera urls más cortas para envío de mensajería, mail etc.</p>
                </div>
                <div class="col-7 align-self-center">
                    <input type="text" class="form-control" placeholder="https://tu-url.com/" id="send_url">
                </div>
                <div class="col-2 align-self-center">
                    <button type="button" class="form-control btn btn-ktly" onclick="loadLink()" id="generate_button">Generar URL</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center align-self-center" id="ajax-result">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <!-- Boxes de Acoes -->
    	<div class="col-xs-12 col-sm-6 col-lg-4 pr-0">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="fa fa-envelope"></i></div>
					<div class="info">
						<h3 class="title">Para todo tipo de mensajería</h3>
						<p>Da una mejor presentación de tus enlaces en cualquier tipo de mensajería (SMS, Mailing, etc.), acortando URLs infinitas.</p>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
			
        <div class="col-xs-12 col-sm-6 col-lg-4">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="fa fa-lock"></i></div>
					<div class="info">
						<h3 class="title">Conexión segura</h3>
    					<p>Certificado SSL con conexión cifrada, sólo hacemos una redirección.</p>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
			
        <div class="col-xs-12 col-sm-6 col-lg-4 pr-0">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="fa fa-smile-o"></i></div>
					<div class="info">
						<h3 class="title">Sin publicidad</h3>
    					<p>Sólo redirigimos a tu URL, nada más.</p>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>		    
        </div>
    </div>
    <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
        <span class="mb-3 mb-md-0 text-muted">© <?php echo date("Y"); ?> <a href="https://pedrojesusgomezorta.com" target="_blank" class="text-muted">Pedro Jesús Gómez Orta</a></span>
        </div>
    </footer>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="./js/js.js"></script>
</html>

<?php } ?>
