@extends('layouts.product')
@section('content')

<br>
	<div>

		<h1 style = "text-align: center">Products</h1>

		<hr>
	<?php
		for($i = 0; $i < count($pid); $i++)
		{
			echo	"<div class = 'col-lg-3 col-md-3 col-sm-3' style = 'border-bottom: 1px solid #ddd;border-right: 2px solid #ddd'>
						<div align = 'center'>
							<img width = '150px' height = '150px' src = '$image_path[$i]'>
						</div>
						<hr style = 'border: 2px solid #ddd'>
						<p>Product ID: <i><b>$pid[$i]</b></i></p>
						<p>Barcode: <i><b>$barcode[$i]</b></i></p>
						<p>Name: <i><b>$pname[$i]</b></i></p>
						<p>Country: <i><b>$country[$i]</b></i></p>
						<p>Quantity: <i><b>$quantity[$i]</b></i></p>
						<p>Price: <i><b>$ $price[$i]</b></i></p>
						<p>Category: <i><b>$category[$i]</b></i></p>
						<p>Import Date: <i><b>$imported_date[$i]</b></i></p>
						<p>Expired Date: <i><b>$expired_date[$i]</b></i></p>
					</div>
					";
		}
	?>
	</div>

@stop