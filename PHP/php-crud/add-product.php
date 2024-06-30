<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<style type="text/css">
		.form-group{
			margin-bottom: 10px;
		}
		.form-bg form {
		    background-image: linear-gradient(#6f4343, #a37e7e, #451c43);
		    padding: 12px 20px;
		    border-radius: 5px;
		}
	</style>
</head>
<body class="bg-secondary text-white">
	<?php require_once("layouts/navbar.php") ?>

	<div class="container">
		<p>&nbsp;</p>
		<div class="row">
			<div class="col-md-8 mx-auto">
				<h1 class="border-bottom">Add Product</h1>
			</div>
			<div class="col-md-8 mx-auto form-bg">
				<form action="process.php" method="post" enctype="">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" rows="6" name="description"></textarea>
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" name="image" class="form-control">
					</div>
					<div class="form-group">
						<label>Category</label>
						<select name="category" class="form-control">
							<option value="">-- Select Category --</option>
							<option value="Home">Home</option>
							<option value="Office">Office</option>
							<option value="Electronics">Electronics</option>
							<option value="Laptops">Laptops</option>
							<option value="Computer">Computer</option>

						</select>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="number" name="price" class="form-control">
					</div>
					<div class="form-group">
						<label>Stock</label>
						<input type="number" name="stock" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="add-product" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>