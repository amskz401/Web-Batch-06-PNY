<?php 
require_once ("config/db-connection.php");
$products = $mydb->query("SELECT * FROM `tbl_products`");


// while($row = $products->fetch_object()) {
// 	echo '<pre>';
// 	print_r($row);
// 	echo '</pre>';
// }



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<style type="text/css">
		.product-image {
		    width: 70px;
		    height: 70px;
		}
	</style>
</head>
<body class="bg-secondary text-white">
	<?php require_once("layouts/navbar.php") ?>
	<div class="container">
		<p>&nbsp;</p>
		<div class="row">
			<div class="col-md-12">
				<h1 class="border-bottom">Products</h1>
				<div class="card">
					<div class="card-title">
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Title</th>
									<th scope="col">Category</th>
									<th scope="col">Price</th>
									<th scope="col">Stock</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php while($row = $products->fetch_object()) { ?> 
								<tr>
									<td>
										<div class="product-image">
											<img src="https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTExL3BmLXMxMDgtcG0tNDExMy1tb2NrdXAuanBn.jpg" width="100%">
										</div>
									</td>
									<td><?php echo $row->title ?></td>
									<td>Health & Care</td>
									<td><?php echo $row->price ?></td>
									<td><?php echo $row->stock ?></td>
									<td>
										<a href="" class="btn btn-secondary"><i class="bi bi-eye"></i></a>
										<a href="edit-product.php?id=<?php echo $row->id ?>" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
										<a href="process.php?id=<?php echo $row->id ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<div class="pagination d-flex justify-content-center">
							<nav aria-label="Page navigation example">
							  <ul class="pagination justify-content-center">
							    <li class="page-item disabled">
							      <a class="page-link">Previous</a>
							    </li>
							    <li class="page-item active"><a class="page-link" href="#">1</a></li>
							    <li class="page-item"><a class="page-link" href="#">2</a></li>
							    <li class="page-item"><a class="page-link" href="#">3</a></li>
							    <li class="page-item">
							      <a class="page-link" href="#">Next</a>
							    </li>
							  </ul>
							</nav>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>