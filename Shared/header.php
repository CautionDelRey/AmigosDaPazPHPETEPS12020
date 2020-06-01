<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    a:link, li
	{
	list-style: none !important;
	text-decoration:none !important;
	}
	.nav-link.btn-primary:hover{
		background: #ff1428 !important;
		-webkit-filter: drop-shadow(10px 5px 2.5px rgba(0,0,0,.3));
    	filter: drop-shadow(10px 5px 2.5px rgba(0,0,0,.3));
	}
	</style>	
	<!-- Header -->	
    <div class="container" style="background-color: #343a40!important; min-width: 100%">
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
	
		  	
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  	</button>

		  	<?php 
		  		session_start();

		  		$data = "";

		  		if(isset($_SESSION['UserLogged']))
		  		{
		  			$data = $_SESSION['UserData'];
		  		}

		  		if(isset($_SESSION['OrganLogged']))
		  		{
		  			$data = $_SESSION['OrganData'];
		  		}

		  		if(isset($_SESSION['ManagerLogged']))
		  		{
		  			$data = $_SESSION['ManagerData'];
		  		} 

		  		if(isset($_SESSION['UserLogged']) || isset($_SESSION['OrganLogged']) || isset($_SESSION['ManagerLogged']))
		  		{
		  	?>

			  	<div class="collapse navbar-collapse container" id="navbarNav">
			    	<ul class="navbar-nav">
			      		<li class="nav-item">
			        		<a class="nav-link btn bg-dark text-white" href="index">Home - Amigos da Paz</a>
			      		</li>
			    	</ul>
			    	<ul class="navbar-nav">
			      		<li class="nav-item">
			        		<a class="nav-link btn bg-dark text-white" href="profile">Perfil</a>
			      		</li>
			    	</ul>
			    	
			    	<?php 
			    	if(isset($_SESSION['OrganLogged']))
			    	{
			    	?>
				    	<ul class="navbar-nav">
				      		<li class="nav-item">
				        		<a class="nav-link btn bg-dark text-white" href="product">Produtos e Voluntariado</a>
				      		</li>
				      	</ul>
				      	
			    	<?php 
			    	}
			    	?>

			    	<?php 
			    	if(isset($_SESSION['ManagerLogged']))
			    	{
			    	?>
				    	<ul class="navbar-nav">
				      		<li class="nav-item">
				        		<a class="nav-link btn bg-dark text-white" href="dashboard.php">Dashboard</a>
				      		</li>
				    	</ul>
			    	
			    	<ul class="navbar-nav">
			      		<li class="nav-item">
			        		<a class="nav-link btn bg-dark text-white" href="organs">Organização e Doação</a>
			      		</li>
			    	</ul>
			    	 <?php 
			    	}
			    	?>
                    
			    	<ul class="navbar-nav">
			      		<li class="nav-item" style="color: #eaff4f"><?php echo $data["name"]; ?></li>
			    	</ul>
			    	<ul class="navbar-nav">
			    	<li class="nav-item">
			        		<a class="nav-link btn btn-primary btn btn-outline-dark" id="actFormLogoutSubmit" style="color: white" href="logout">Sair</a>
			      	</li>
			        </ul>

			  	</div>
       
			<?php 
				} 
				else
				{
			?>
				<div class="collapse navbar-collapse container" id="navbarNav">
					<ul class="navbar-nav">
			      		<li class="nav-item">
			        		<a class="nav-link btn bg-dark text-white" href="index">Home - Amigos da Paz</a>
			      		</li>
			    	</ul>
			    	<ul class="navbar-nav">
			    		<li class="nav-item">
				        	<a class="nav-link btn bg-dark text-white" href="login">Login</a>
				      	</li>
				      </ul>
				      <ul>
				      	<li class="nav-item">
				        	<a class="nav-link btn bg-dark text-white" href="register">Cadastrar</a>
				      	</li>
			      	</ul>
			  	</div>

			<?php 
				}
			?>
		</nav>
        </div>
<script>       
$(function() {
  $(this).on("click", "#actFormLogoutSubmit", function(event) {
    event.preventDefault();
    if (!confirm("Deseja realmente sair?")) return false;

    location.href="../logout";
  });
});
</script>