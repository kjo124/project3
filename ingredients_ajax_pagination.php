<?php
require_once "inc/page_setup.php";
?>
<!DOCTYPE html>
<!-- A Common Header (Title and Logo), Footer and Navigation elements on all pages - Please implement using the PHP include tag. -->
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Author" content="Kyle Odin & Derek Law">
<meta name="Description" content="CT310 Project #3">
<meta name="Keywords" content="CT310 Project #3">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="assets/css/styles.css">
  <script src="assets/jquery.min.js"></script>
  <script type="text/javascript" src="ingredients_pag.js"></script>
	<title>CT310 Project #3</title>
</head>
<!-- Start of page Body  -->
<body>
<div class="jumbotron">
    <h1>Derek & Kyle Ingredients <img src="assets/img/Logo.png" class="img-circle" alt="Logo" width="150" height="150"></h1>
</div>
<?php include 'inc/nav.php';?>
<div class="content">

<div class="container-fluid">
	<div class="row visible-on">
		<div class="col-md-3">
      <p></p>
		</div>
		  <div class="col-md-6">
        <div style="padding-left: 8px">
          <h3 style="text-align: center">Ingredients</h3>
          <table id="ings">
            <tr>
              <th>Ingredient Name</th>
              <th>Description</th>
              <th>Unit/Price</th>
            </tr>
          </table>
          <br>
          <p>
          Status of Federation AJAX call: <span id="outp1"> not responding </span>
          </p>
      </div>

		</div>
		<div class="col-md-3">
			<div class="image">
				<img src="./assets/img/Logo.png" class="img-circle" alt="Logo" width="300" height="300">
			</div>
		</div>
	</div>
</div>

<?php require_once './inc/footer.php';?>
