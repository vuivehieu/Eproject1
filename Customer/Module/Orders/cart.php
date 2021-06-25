<?php
$title = "Shopping Cart";	

if(isset($_SESSION['user'])){
           require_once("Layout/headerforotherpages2.php");
}else{
	 	   require_once("Layout/headerforotherpages.php");
}
if(!isset($_SESSION['cart'])){
	$_SESSION['cart']=array();
}
if(isset($_GET['id'])){
			$ID = $_GET['id'];
			if(isset($_SESSION['cart'][$ID])){
				if (isset($_GET['up'])) $_SESSION['cart'][$ID] += 1;
				if (isset($_GET['down'])) $_SESSION['cart'][$ID] -= 1;	
				if (isset($_GET['del'])) $_SESSION['cart'][$ID] = -1;
				if ($_SESSION['cart'][$ID] < 0) unset($_SESSION['cart'][$ID]);	
			}
			else{
				$_SESSION['cart'][$ID] = 1;
			}
		echo '<meta http-equiv="refresh" content="0;url=index.php?module=orders&action=cart">';		
		}
?>


		<div class="checkout-page-container">

            <h3>Đăng nhập để có thể mua hàng!</h3>
			<h1 class="shopping-bag-page-title">YOUR SHOPPING BAG</h1>
			


			<div class="checkout-container">
				
				<!-- =============== View shopping bag items =============== -->
				<div class="shopping-bag-container">
					<div class="shopping-bag-title">
							<div class="bag-title-1">Product</div>
							<div class="bag-title-2">Price</div>
							<div class="bag-title-3">Quantity</div>
	
					</div>
<!-- 		<table>
			<tr>
				<th>STT</th>
				<th>Tên Sản Phẩm</th>
				<th>Ảnh</th>
				<th>Số lượng</th>
				<th>Giá</th>
				

			</tr> -->
					
				
<?php
// function us($id){
// $_SESSION['cart'][$id] = -1;
// 	if($_SESSION['cart'][$id]<0 && $_SESSION['cart'][$id]= -1){
// 	unset($_SESSION['cart'][$id]);
// }
// }
$total = 0;
$total_price = 0;
$count = 0;
foreach ($_SESSION['cart'] as $ID => $quantity){
					$count++;
					$sql = "SELECT * FROM product WHERE ID = '$ID'";
					$result = mysqli_query($conn, $sql);
					$item = mysqli_fetch_assoc($result);


					// echo "<tr>";
					// 	echo "<td>".$count."</td>";
					// 	echo "<td>".$item['TITLE']."</td>";
					// 	echo "<td><img src='".$item['THUMBNAIL']."'></td>";
					// 	echo "<td>".$quantity."</td>";
					// 	echo "<td>".$item['PRICE']."</td>";
					// echo "</tr>";

	echo
					'<div class="shopping-bag-row">
											
											<div class="shopping-bag-image">
												<img src="'.$item['THUMBNAIL'].'">
											</div>
											<div class="shopping-bag-name">
												<div class="product-brand">
													'.$item['MANUFACTURER'].'
												</div>
												<div class="product-name">
													'.$item['TITLE'].'
												</div>
											</div>
											<div class="shopping-bag-price">'.$item['PRICE'].' $</div>
											<a href = "index.php?module=orders&action=cart&id='.$item['ID'].'&down" > ◄ </a>
											<div class="shopping-bag-quantity">'.$quantity.' </div>
											<a href = "index.php?module=orders&action=cart&id='.$item['ID'].'&up" > ► </a>
							
											<a href="index.php?module=orders&action=cart&id='.$item['ID'].'&del"><img class="shopping-bag-delete" onclick="bagDelete()" src="../Images/Front/Icons/trash-gray.svg"></a>
											
										</div>';
										$total = $quantity*$item['PRICE'];
										$total_price +=$total;
									}
				
$_SESSION['total'] = $total_price;
?>
		<!-- 	</table> -->

				

<?php

echo '</div>
				<!-- =============== Payment method ================ -->
				<form method="POST" action="index.php?module=orders&action=checkout">
				<div class="checkout-section">
					<div class="checkout-section-container">
						<div class="checkout-total">
							<div class="checkout-total-title">TOTAL</div>
							<div class="checkout-total-value">'.$total_price.' $</div>
						</div>
						<div class="checkout-title">PAYMENT METHOD: </div>
						<div class="checkout-subtitle">All transactions are secure and encrypted.</div>
					
						<div class="checkout-checkbox">
							<div class="checkout-option">
								<input type="radio" checked="checked" name="radio" id="visa" value="VISA">
								<label for="visa"><img class="checkout-option-img" src="../Images/Front/Icons/visa.svg"></label>
							</div>	
							<div class="checkout-option">
								<input type="radio" name="radio" id="paypal" value="PAYPAL">
								<label for="paypal"><img class="checkout-option-img" src="../Images/Front/Icons/paypal.svg"></label>
							</div>
							<div class="checkout-option">
								<input type="radio" name="radio" id="momo" value="MOMO">
								<label for="momo"><img class="checkout-option-img" src="../Images/Front/Thumbnail/momo.png"></label>
							</div>
							<textarea name="note" required="true"></textarea>

						<a href="index.php?module=orders&action=checkout"><button name="checkout" class="checkout-btn">CHECK OUT</button></a>
					</div>
				</div>

			</div>

		</div>'
		?>	

<?php 
if(isset($_SESSION['user'])){
           require_once("Layout/loggedft.php");
}else{
	 	  require_once("Layout/footer.php");
}

?>