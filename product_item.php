<?

include_once "lib/php/functions.php";

$product = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id` = ".$_GET['id'])[0];

$images = explode(",",$product->images);

$image_element = array_reduce($images,function($r,$o){
	return $r."<img src='image/store/$o'>";
})
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>store Product Item</title>
	<? include "parts/meta.php"; ?>
	<script src="js/product_thumbs.js"></script>
</head>
<body>
	<? include "parts/navbar.php"; ?>

	<div class="container">
		<div class="grid gap">
			<div class="colxs-12 col-md-7">
				<div class="card soft">
					<div class="images-main">
						<img src="image/store/<?= $product->thumbnail ?>" alt="<?= $product->title ?>">
					</div>
					<div class="images-thumbs">
						<?= $image_elements ?>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-5">
				<form class="card soft" method="post" action="cart_actions.php?action=add-to-cart">

					<input type="hidden" name="product-id" value="<?= $product->id ?>">
					<div class="card-selection">
					    <h2 class="product-title"><?= $product->title ?></h2>
					    <div class="product-price">&dollar;<?= $product->price ?></div>
				    </div>
                    <div class="card-selection">
                    	<div class="form-control">
                    	    <label for="product-amount" class="form-label">Amount</label>
                    	    <div class="form-select" id="product-amount">
                    		    <select name="product-amount" id="product-amount">
                    			    <option>1</option>
                    			    <option>2</option>
                    			    <option>3</option>
                    			    <option>4</option>
                    			    <option>5</option>
                    			    <option>6</option>
                    			    <option>7</option>
                    			    <option>8</option>
                    		    </select>
                    	    </div>
                    	</div>
                    	<div class="form-control">
                    		<label for="product-color" class="form-label">Color</label>
                    		<div class="form-select">
                    			<select name="product-color" id="product-color">
                    				<option>Default</option>
                    				<option>Black</option>
                    				<option>White</option>
                    			</select>
                    		</div>
                    	</div>
                    </div>
                    <div class="card-selection">
                    	<input type="submit" value="Add to Cart" class="form-button">
                    </div>
				</form>
			</div>
		</div>
		<div class="card soft dark">
			<p><?= $product->description ?></p>
		</div>
	</div>

</body>
</html>