<?php include_once('header.php'); ?>
<?php 
	if (isset($message)){
		echo "			<div class=\"panel panel-default\">";
		echo "				<div class=\"panel-body\">";
		echo $message;
		echo "				</div>";
		echo "			</div>";
	}
?>
<div class="container">
	<form class="form-horizontal" id="login" action="<?php echo base_url('admin/login/doLogin'); ?>" method="post">
		
		<div class="form-group">
			<label for="labelUsername" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="username" placeholder="username" name="username" required oninvalid="this.setCustomValidity('Username required')" oninput="setCustomValidity('')">
			</div>
		</div>
		<div class="form-group">
			<label for="labelPassword" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-2">
				<input type="password" class="form-control" id="password" placeholder="password" name="password" required oninvalid="this.setCustomValidity('Password required')" oninput="setCustomValidity('')">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-2">
				<button type="submit" class="btn btn-default">Sign in</button>
			</div>
		</div>
	</form>

</div>	
</body>
</html>