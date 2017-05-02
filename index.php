<?php
require_once "inc/page_setup.php";
require_once 'inc/header.php';
?>
<!-- A Home page - Welcome message, info and links about other sections etc. -->

<!-- You must use the Bootstrap Framework to support your implementation. Alternative Frameworks may be approved on case-by-case basis if a team wishes to ask. -->
<div class="container-fluid">
	<div class="row visible-on">
		<div class="col-md-3">
			<?php require_once 'inc/authentication.php';?>
		</div>
		<div class="col-md-6">
			<p>Welcome to Kyle Odin & Derek Law Project #3. Feel
				free to login and comment on our ingredients.</p>
		</div>
		<div class="col-md-3">
			<div class="image">
				<img src="./assets/img/Logo.png" class="img-circle" alt="Logo" width="300" height="300">
			</div>
		</div>
	</div>
</div>

<?php require_once './inc/footer.php';?>
