<?php include_once('header.php'); ?>
<?php include_once('nav.php'); ?>
<div class="panel panel-default">
	<div class="panel-body">Change password</div>
	<div class="container">
		<form class="form-horizontal" id="changePassword" action="<?php echo base_url('admin/change_password/doChangePassword'); ?>" method="post">
			
			<div class="form-group">
				<label for="labelOldPassword" class="col-sm-2 control-label">Old Password</label>
				<div class="col-sm-2">
					<input type="password" class="form-control" id="oldPassword" placeholder="old password" name="oldPassword" required oninvalid="this.setCustomValidity('required')" oninput="setCustomValidity('')">
				</div>
			</div>
			<div class="form-group">
				<label for="labelNewPassword" class="col-sm-2 control-label">New Password</label>
				<div class="col-sm-2">
					<input type="password" class="form-control" id="newPassword" placeholder="new password" name="newPassword" required oninvalid="this.setCustomValidity('required')" oninput="setCustomValidity('')">
				</div>
			</div>
			<div class="form-group">
				<label for="labelConfirmPassword" class="col-sm-2 control-label">Confirm Password</label>
				<div class="col-sm-2">
					<input type="password" class="form-control" id="confirmPassword" placeholder="confirm password" name="confirmPassword" required oninvalid="this.setCustomValidity('required')" oninput="setCustomValidity('')">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-2">
					<button type="submit" class="btn btn-default">Change password</button>
				</div>
			</div>
		</form>
	</div>	
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#confirmPassword").keyup(function(e) {
			var keyCode = e.keyCode || e.which;
			var newPassword = $('#newPassword').val();
			if (keyCode !== 9){
				if ($('#confirmPassword').val() !== newPassword) {
					if ($("#confirmPassword").parent().next(".alert").length == 0) {
						// only add if not added
						$("#confirmPassword").parent().after("<span class='alert alert-warning'><strong>Warning!</strong>Password doesn't match.</span>");
					} 
				} else {
					if ($("#confirmPassword").parent().next(".alert").length > 0) {
						$("#confirmPassword").parent().next(".alert").remove();
					}
				}
			}
		});

		$("#confirmPassword").focusout(function(e) {
			var keyCode = e.keyCode || e.which;
			var newPassword = $('#newPassword').val();
			if (keyCode !== 9){
				if ($('#confirmPassword').val() !== newPassword) {
					if ($("#confirmPassword").parent().next(".alert").length == 0) {
						// only add if not added
						$("#confirmPassword").parent().after("<span class='alert alert-warning'><strong>Warning!</strong>Password doesn't match.</span>");
					} 
				} else {
					if ($("#confirmPassword").parent().next(".alert").length > 0) {
						$("#confirmPassword").parent().next(".alert").remove();
					}
				}
			}
		});

		$("#changePassword").submit(function(e) {
			if ($('#confirmPassword').val() !== $('#newPassword').val()) {
				event.preventDefault();
			}			
		});
	});
</script>
</body>
</html>