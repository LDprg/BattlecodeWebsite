<?php 
	$error = "";
 ?>
<div class="form-signin text-center">
	<?php 
		if(isset($_POST['submit'])) {
			$email = $_POST['email'];
    		$passwd = $_POST['passwd'];

    		$error = $db->loginUser($email, $passwd);
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
	    <h1 class="h3 mb-3 fw-normal">Please login</h1>

	    <div class="form-floating">
	      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required="required">
	      <label for="floatingInput">Email address</label>
	    </div>
	    <div class="form-floating">
	      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="passwd" required="required">
	      <label for="floatingPassword">Password</label>
	    </div>

	    <div class="checkbox mb-3">
	      <!-- <label>
	        <input type="checkbox" value="remember-me"> Remember me
	      </label> -->
	    	<label>
	    		New?<a href="<?php echo loadPageUrl("register"); ?>" class="btn btn-link">Create an account</a>
	    	</label>  	
	    </div>
	    
	    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Login</button>
	</form>
	<?php 
		}
		
		if(isset($_POST['submit']) && !$error){
			if(!$_SESSION['session']){
				$_POST = array();
				reloadPage();
			}
	?>
			<div class="alert alert-success">
			  <strong>Success!</strong> Login completed.
			  <a href=".">Back to Home</a>
			</div>
	<?php
		}
	 ?>
</div>