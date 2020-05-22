<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
	<meta charset="UTF-8">
	<meta name="description" content="Amigos da Paz">
	<title>"Instituição"</title>

</head>
<body class="bg-secondary">
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

	<?php  
		if(!isset($_SESSION['UserLoged']) && !isset($_SESSION['OrganLoged']) && !isset($_SESSION['ManegerLoged']))
		{
			header('Location: index.php');
			exit();
		}
	?>
	<div class="container-l pb-6 mb-5 bg-secondary">
		<div class="card p-5 mt-5 shadow-lg">
			<?php 
			$data = "";

			if(isset($_SESSION['DataOrganSelect']))
			{
				$data = $_SESSION['DataOrganSelect'];
			}
			?>

			<h2><?php echo $data["name"]; ?></h2>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<h4>Dados de Contatos</h4>
					<p><b>Email:</b> <?php echo $data["email"]; ?></p>
					<p><b>Telefone:</b> <?php echo $data["fone"]; ?></p>
				</div>
				<div class="col-md-6">
					<h4>Endereço da Instituição</h4>
					<p><b>CEP:</b> <?php echo $data["cep"]; ?></p>
					<p><b>Rua:</b> <?php echo $data["street"]; ?></p>
					<p><b>Bairro:</b> <?php echo $data["neighborhood"]; ?></p>
					<p><b>Cidade:</b> <?php echo $data["city"]; ?></p>
					<p><b>UF:</b> <?php echo $data["uf"]; ?></p>
					<p><b>CNPJ:</b> <?php echo $data["cnpjAndCpf"]; ?></p>
				</div>
			</div>
			<hr>
			<h4>Sobre nós</h4>
			<p>     <?php echo $data["description"]; ?></p>
			<br>
			<br>

			<h4>Produtos e serviços voluntário que precisamos</h4>
			<?php 
			include('OrganRepository.php');

			$dataProduct = consultAllProductById($data["id"]);

			while($datas = mysqli_fetch_array($dataProduct))
			{
			?>
				<div class="card mt-2 shadow">
					<div class="row p-3">
						<div class="col-md-12 ml-3">
							<h5>Titulo do Pedido: <?php echo $datas["title"]; ?></h5>
						</div>
						<div class="col-md-12 ml-3">
							<p><b>Detalhes:</b> <?php echo$datas["description"]; ?></p>	
						</div>
					</div>
				</div>
			<?php  
			}
			?>
			<br>
			<br>
			<hr>
			<h4>Nos ajuda também com quantias em dinheiro:</h4>
			<br>
			<div class="row">
				<div class="col-md-4 p-1 bg-success">
					<div class="card p-3 shadow-lg ">
						<h4><b>Valor:</b></h4>
						<center><h3 class="mt-3"><b>R$ 10,00</b></h3></center>
						<br>
						<center><p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ven</p></center>
						<br>
						<br>
						<center><button style="width: 120px;" class="btn btn-success rounded">Ajudar</button></center>
					</div>
				</div>

				<div class="col-md-4 p-1 bg-success">
					<div class="card p-3 shadow-lg ">
						<h4><b>Valor:</b></h4>
						<center><h3 class="mt-3"><b>R$ 20,00</b></h3></center>
						<br>
						<center><p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ven</p></center>
						<br>
						<br>
						<center><button style="width: 120px;" class="btn btn-success rounded">Ajudar</button></center>
					</div>
				</div>

				<div class="col-md-4 p-1 bg-success">
					<div class="card p-3 shadow-lg ">
						<h4><b>Valor:</b></h4>
						<center><h3 class="mt-3"><b>R$ 30,00</b></h3></center>
						<br>
						<center><p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ven</p></center>
						<br>
						<br>
						<center><button style="width: 120px;" class="btn btn-success rounded">Ajudar</button></center>
					</div>
				</div>
				
			</div>
			<br>
			


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