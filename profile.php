<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
	<meta charset="UTF-8">
	<meta name="description" content="Amigos da Paz">
	<title>Perfil</title>

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

	<div class="container">
		<div class="card m-5 p-5 shadow-lg">
			<h3>Perfil</h3>
			<?php include('ValidationMessages.php'); ?>
			<hr>
			<div class="row">
				<div class="col-md-4">
					<?php 

						if(empty($data["profileImage"]))
						{
					?>
						<img style="height: 280px; width: 280px;" src="assets/images/profile.jpg" class="rounded">

					<?php  
						} else if(!empty($data["profileImage"])) {
					?>
						<img style="height: 280px; width: 280px;" src="images/<?php echo $data["profileImage"] ?>" class="rounded">
					<?php  
						}
					?>
					<div class="row m-1">
						<form action="file.php" method="POST" enctype="multipart/form-data">
							<input type="file" name="file">
							<input type="submit" class="btn btn-danger mt-1" name="sendFile">
						</form>
					</div>
					<div class="row">
						<form action="UserController.php" method="GET">
							<input type="hidden" value="FULL" name="remove">
							<div class="col-md-12 mt-2">
								<button type="submit" style="width: 200px;" class="btn btn-danger ml-5">Remover Conta</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-8">
					<form class="form-group" action="UserController.php" method="POST">
						<br>
						<h4>Dados Pessoais</h4>
						<hr>
						<div class="row">
							<div class="col-md-6">
								<label>Nome:</label>
								<input class="form-control" type="text" name="name" value="<?php echo $data["name"] ?>" >
							</div>
							<div class="col-md-6">
								<label>Telefone:</label>
								<input class="form-control" type="text" name="fone" value="<?php echo $data["fone"]; ?>" >
							</div>
						</div>
						<br>
						<h4>Dados de Acesso:</h4>
						<hr>
						<div class="row">
							<div class="col-md-6">
								<label>Email:</label>
								<input class="form-control" type="text" name="email" value="<?php echo $data["email"]; ?>" >
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Senha:</label>
								<input class="form-control" type="password" id="senha" name="password">
								
							    <div id="senhaBarra" class="progress mt-3" style="display: none;">
							        <div id="senhaForca" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
							        </div>
							    </div>
							</div>
						</div>
						<br>
						<h4>Endereço</h4>
						<hr>
						<div class="row">
							<div class="col-md-4">
								<label>CEP:</label>
								<input class="form-control" type="text" id="cep" name="cep" value="<?php echo $data["cep"]; ?>" >
							</div>
							<div class="col-md-4">
								<label>Rua:</label>
								<input class="form-control" type="text" id="rua" name="street" value="<?php echo $data["street"] ?>" >
							</div>
							<div class="col-md-4">
								<label>Bairro:</label>
								<input class="form-control" type="text" id="bairro" name="neighborhood" value="<?php echo $data["neighborhood"]; ?>" >
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<label>Cidade:</label>
								<input class="form-control" type="text" id="cidade" name="city" value="<?php echo $data["city"]; ?>" >
							</div>
							<div class="col-md-4">
								<label>UF:</label>
								<input class="form-control" type="text" id="uf" name="uf" value="<?php echo $data["uf"]; ?>" >
							</div>
							<div class="col-md-4">
								<label>IBGE:</label>
								<input class="form-control" type="text" id="ibge" name="ibge" value="<?php echo $data["ibge"]; ?>" >
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<label>Descrição:</label>
								<textarea class="form-control" name="description" value="<?php echo $data["description"]; ?>" ></textarea>
							</div>
						</div>

						<input type="hidden" value="FULL" name="alter">

						<div class="row">
							<div class="col-md-12 mt-2">
								<button type="submit" class="btn btn-primary">Alterar</button>
							</div>
						</div>
					</form>
				</div>
				
			</div>

			<?php 
			if(isset($_SESSION['OrganLoged']))
			{
			?>
				<hr>
				<h3 class="mt-2">Ajudas:</h3>
				<table class="table mt-2">
				  <thead>
				    <tr>
				      <th scope="col">Titulo</th>
				      <th scope="col">Descrição</th>
				      <th scope="col"><center><b>X</b></center></th>
				    </tr>
				  </thead>
				  <?php 
					  include('OrganRepository.php');

					  $dataOrgan = $_SESSION['OrganData'];

					  $data = consultAllProductById($dataOrgan["id"]);

					  if(!$data)
					  {
				  ?>
					  <tbody>
					    <tr>
					    <td><center>Nenhum</center></td>
					    <td><center>Nenhum</center></td>
					    <td><center>Nenhum</center></td>
					    </tr>
					  </tbody>
				  <?php  
					} 
					else
					{
				  ?>
					  <tbody>
					  	<?php 
					  	while($datas = mysqli_fetch_array($data))
					  	{
					  	?>
						    <tr>
						    <td><?php echo $datas["title"]; ?></td>
						    <td><?php echo $datas["description"]; ?></td>
						    <td>
						    	<center>
								    <form action="OrganController.php" method="GET">
								    	<input type="hidden" name="productIdRemove" value=<?php echo $datas["id"]; ?> >
								    	<input type="hidden" value="FULL" name="tableProduct">
								    	<button type="submit" class="btn btn-danger">Excluir</button>
								    </form>
							    </center>
						  	</td>
						    </tr>
					    <?php 
						}
					    ?>
					  </tbody>
				  <?php 
					}
				  ?>
				</table>
			<?php
			} 
			?>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="assets/js/autoCompleteCEP.js"></script>
	<script type="text/javascript" src="assets/js/passwordPower.js"></script>
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