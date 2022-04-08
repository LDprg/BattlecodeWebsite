<?php 
	$error = "";
 ?>
<div class="form-signin text-center">
	<?php 
		if(isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
    		$passwd = $_POST['passwd'];

    		$error = $db->createUser($email, $name, $passwd);
    	}

    	if(!isset($_POST['submit']) || $error){

    		if($error){
	?>
			<div class="alert alert-danger alert-dismissible fade show">
				<strong>Error!</strong>
				<?php echo $error; ?>
				Try again
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
	<?php
			}
	 ?>
	<form action="#" method="post">
	    <h1 class="h3 mb-3 fw-normal">Please enter Data!</h1>

	    <div class="form-floating">
	      <input type="text" class="form-control" id="floatingInput" placeholder="user1234" name="name" required="required">
	      <label for="floatingInput">Username</label>
	    </div>
	    <div class="form-floating">
	      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required="required">
	      <label for="floatingInput">Email address</label>
	    </div>
	    <div class="form-floating">
	      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="passwd" required="required">
	      <label for="floatingPassword">Password</label>
	    </div>

	    <div class="mb-3">
	    	<label>
	    		Already have an Account?&ensp;<a href="<?php echo loadPageUrl("login"); ?>">Login</a>
	    	</label>  	
	    </div>

	    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Register</button>
	</form>
	<?php 
		}
		
		if(isset($_POST['submit']) && !$error){
	?>
			<div class="alert alert-success">
			  <strong>Success!</strong> Registration completed.
			  <a href="<?php echo loadPageUrl("login"); ?>">Go to Login</a>
			</div>
	<?php
		}
	 ?>
</div>