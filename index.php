<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
	<meta charset="UTF-8">
	<meta name="description" content="Amigos da Paz">
	<meta name="keywords" content="Asilo,Amigos,Paz,Caridade">
	<title>Amigos da Paz</title>
</head>
<body>	
<!-- Header -->	
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<a class="navbar-brand btn bg-dark text-white text-uppercase" href="index.php">Amigos da Paz</a>
		  	
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  	</button>

		  	<?php 
		  		session_start();

		  		$data = "";

		  		if(isset($_SESSION['UserLoged']))
		  		{
		  			$data = $_SESSION['UserData'];
		  		}

		  		if(isset($_SESSION['OrganLoged']))
		  		{
		  			$data = $_SESSION['OrganData'];
		  		}

		  		if(isset($_SESSION['ManegerLoged']))
		  		{
		  			$data = $_SESSION['ManegerData'];
		  		} 

		  		if(isset($_SESSION['UserLoged']) || isset($_SESSION['OrganLoged']) || isset($_SESSION['ManegerLoged']))
		  		{
		  	?>

			  	<div class="collapse navbar-collapse row container" id="navbarNav">
			    	<ul class="navbar-nav">
			      		<li class="nav-item active">
			        		<a class="nav-link btn bg-dark text-white" href="index.php">Home</a>
			      		</li>
			    	</ul>
			    	<ul class="navbar-nav">
			      		<li class="nav-item active">
			        		<a class="nav-link btn bg-dark text-white" href="profile.php">Perfil</a>
			      		</li>
			    	</ul>
			    	<?php 
			    	if(isset($_SESSION['OrganLoged']))
			    	{
			    	?>
				    	<ul class="navbar-nav">
				      		<li class="nav-item active">
				        		<a class="nav-link btn bg-dark text-white" href="product.php">Produtos e Voluntáriado</a>
				      		</li>
				    	</ul>
			    	<?php 
			    	}
			    	?>

			    	<?php 
			    	if(isset($_SESSION['ManegerLoged']))
			    	{
			    	?>
				    	<ul class="navbar-nav">
				      		<li class="nav-item active">
				        		<a class="nav-link btn bg-dark text-white" href="dashboard.php">Dashboard</a>
				      		</li>
				    	</ul>
			    	<?php 
			    	}
			    	?>
			    	<ul class="navbar-nav">
			      		<li class="nav-item active">
			        		<a class="nav-link btn bg-dark text-white" href="organs.php">Organização e Doação</a>
			      		</li>
			    	</ul>

			    	<ul class="navbar-nav ml-2">
			      		<li class="nav-item active"><?php echo $data["name"]; ?></li>
			    	</ul>
			  	</div>

			<?php 
				} 
				else
				{
			?>
				<div class="collapse navbar-collapse container" id="navbarNav">
					<ul class="navbar-nav"></ul>
			    	<ul class="navbar-nav">
			    		<li class="nav-item active">
				        	<a class="nav-link btn bg-dark text-white" href="login.php">Login</a>
				      	</li>
				      	<li class="nav-item active">
				        	<a class="nav-link btn bg-dark text-white" href="register.php">Cadastrar</a>
				      	</li>
			      		<li class="nav-item active">
			        		<a class="nav-link btn btn-primary btn btn-outline-dark" href="logout.php">Sair</a>
			      		</li>
			    	</ul>
			  	</div>

			<?php 
				}
			?>
		</nav>
	</header>
	<div class="container">
		<?php include('ValidationMessages.php'); ?>
	</div>

<!-- Intro Image -->
	<div class="p-1 mb-2 bg-secondary text-white">

		<div class="p-3 mb-2 bg-light text-dark">
			<div class="">
				<img src="images/seniors-in-the-park-6054.jpg" class="img-fluid" alt="Responsive image">
			</div>
		</div>
		
<!-- Sobre nós -->
		<div class="site-section p-5" id="information-about-us">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-5 ml-auto mb-5 order-md-2">
						<img src="images/people-walking-near-trees-2253911.jpg" alt="Image" class="container justify-right img-fluid-round">
					</div>
					<div class="col-md-6 order-md-1">
						<div class="text-left pb-1 border-primary mb-4">
							<h2 class="text-primary">Sobre nós</h2>
						</div>
						<br><br>
						<p>Somos uma plataforma que visa juntar instituições de caridade com potenciais doadores e voluntários.</p>
						<br><br>
						<p>Um local em que instituições de caridade podem criar seu espaço e declarar suas necessidades e futuramente até manter um feed de notícias e um blog.</p>
					</div>
				</div>
			</div>
		</div>

<!-- Como Funciona -->
		<div class="p-3 mb-2 bg-light">
			<div class="container">
				<div id="informatio-how-it-works" class="site-section overlay">
					<div class="container">
						<div class="row justify-content-center mb-5">
							<div class="col-md-7 text-center border-primary">
								<h2 class="font-weight-light text-primary">Como funciona</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
								<div class="informatio-how-it-works-item">
									<div class="informatio-how-it-works-boty">
										<h2 class="text-dark">Registro</h2>
										<p class="mb-5 text-dark">O doador ou a instituição se registra no sistema, preenchendo as informações necessárias</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
								<div class="informatio-how-it-works-item">
									<div class="informatio-how-it-works-boty">
										<h2 class="text-dark">Doador</h2>
										<p class="mb-5 text-dark">O doador seleciona a instituição que desejar, e que mais se adequa aos seus objetivos. Se informa das necessidades da instituição, podendo até fazer doação em dinheiro.</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
								<div class="informatio-how-it-works-item">
									<div class="informatio-how-it-works-boty">
										<h2 class="text-dark">Instituição</h2>
										<p class="mb-5 text-dark">A instituição cria sua página através da plataforma. Então a instituição é adicionada a uma lista em que o doador poderá a escolher.
										Em sua página, a instituição terá a possibilidade de efetuar postagens para especificar suas necessidades</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Footer -->	
<footer>
	<nav class="navbar-nav bg-dark">
		<div class="container">
			<br><br>
			<div class="row container">
				<div class="col btn">
					<h3 class="text-white">E-mail</h3>
					<br>
					<a href="" class="text-white">exemplo@amigosdapaz.com</a>
				</div>
				<div class="col btn">
					<h3 class="text-white">Newsletter</h3>
					<br>
					<form id="newsletter" method="post" action="" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="">
						<input type="text" name="email" value="" class="text" placeholder="Email" />
						<button class="submit btn btn-primary" type="submit" form="newsletter">Enviar</button>
					</form>
				</div>
				<div class="col btn">
					<h3 class="text-white">Telefone</h3>
					<br>
					<span> <a href="tel:+5599999999999" style="text-decoration: none" class="text-white">(99) 99999-9999</a> </span>
				</div>
				<div class="col btn">
					<h3 class="text-white">Redes Sociais</h3>
					<ul class="list-group">
						<li><a href="https://www.facebook.com/" target="_blank" class="label text-white"><ion-icon name="logo-facebook"></ion-icon></span> Facebook</a></li>
						<li><a href="https://www.twitter.com/" target="_blank" class="label text-white"><ion-icon name="logo-twitter"></ion-icon></span> Twitter</a></li>
						<li><a href="https://www.instagram.com/" target="_blank" class="label text-white"><ion-icon name="logo-instagram"></ion-icon></span> Instagram</a></li>
					</ul>
				</div>
			</div>
			<br>
		</div>
	</nav>
</footer>	
</body>
</html>