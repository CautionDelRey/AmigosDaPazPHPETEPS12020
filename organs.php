<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
	<meta charset="UTF-8">
	<meta name="description" content="Amigos da Paz">
	<title>Instituições</title>
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

	<?php include('OrganRepository.php'); ?>
	<?php 
		if(!isset($_SESSION['UserLoged']) && !isset($_SESSION['OrganLoged']) && !isset($_SESSION['ManegerLoged']))
		{
			header('Location: index.php');
			exit();
		}
	?>
<!-- Card With Institutions -->	
	<div style="background-image: url(images/man-and-woman-walking-on-the-street-2385569.jpg);">
	<div class="container p-5">
		<div class="card p-5 mt-4 shadow-lg mb-5">
			<h3 class="text-center">Intituições:</h3>
			
			<hr>

			<?php
				$datas = consultAllOrgans();

				while($data = mysqli_fetch_array($datas))
				{
			?>
				
				<form action="OrganController.php" method="GET">
					<div class="card p-3 mt-3 shadow-lg">
						<div class="row">
							<div class="col-md-3">
								<?php 

									if(empty($data["profileImage"]))
									{
								?>
									<img style="height: 270px; width: 240px;" src="assets/images/profile.jpg" class="rounded">

								<?php  
									} else if(!empty($data["profileImage"])) {
								?>
									<img style="height: 270px; width: 240px;" src="images/<?php echo $data["profileImage"] ?>" class="rounded">
								<?php  
									}
								?>
								
							</div>
							<div class="col-md-7 mt-3">
								<h5><?php echo $data["name"]; ?></h5>
								<p>Email: <?php echo $data["email"]; ?></p>
								<p>Endereço: <?php echo $data["street"]; ?>, <?php echo $data["cep"]; ?> - <?php echo $data["neighborhood"]; ?></p>
								<p>Descrição: <?php echo $data["description"]; ?></p>
							</div>
							<div class="col-md-2">
								<button type="submit" style="height: 60px; width: 100px;" class="btn btn-success mr-3 mt-5">Ver</button>
							</div>
						</div>
					</div>
					<input type="hidden" name="id" value=<?php echo $data["id"]; ?> >
					<input type="hidden" value="FULL" name="selectOrgan">
				</form>
				
			<?php 	
				}
			?>
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