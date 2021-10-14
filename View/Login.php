
<?php 

require "Header_admin.php"; 
require "Modals/RegisterModal.php";



?>
<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form >
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<button type="button" class="btn btn-primary" name="iniciar" id="iniciar">Sign in</button>
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Sign up</button>
						</fieldset>
							
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
	<script src="../Business/Js/Login.js"></script>
    <?php require "Footer_admin.php"; ?>