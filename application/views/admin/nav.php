	<!-- Navigation bar -->
	<nav class="navbar navbar-fixed-top navbar-inverse">
		<!-- Brand Namr or Logo -->
		<a class="navbar-brand" href="#"><?php echo $title; ?><!-- <img alt="Brand" src="..."> --></a>
		<!-- Left Navigation bar -->
		<ul class="nav navbar-nav navbar-left">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">About</a>
			</li>
		</ul>
		<!-- Right Navigation bar -->
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata("salutation")." ".$this->session->userdata("last_name");?> <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href=""></a></li>
					<li><a href="<?php echo base_url('admin/change_password'); ?>">Change password</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="<?php echo base_url('admin/login/logout'); ?>">Logout</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<script type="text/javascript">
		$(".nav li").on("click", function() {
			$(".nav li").removeClass("active");
			$(this).addClass("active");
		});
	</script>
	<?php 
		if (isset($processMessage)){
			echo "			<div class=\"panel panel-default\">";
			echo "				<div class=\"panel-body\">";
			echo $processMessage;
			echo "				</div>";
			echo "			</div>";
		}
	?>