<?php
if(isset($_POST['product'])===true && empty($_POST['product']) === false){
    require 'connect.php';
    
   $query = mysql_query("
	 	SELECT	`products` . `price`
		FROM	`products`
		WHERE	`products` . `product` = '" . mysql_real_escape_string( trim($_POST['product']) ) . "'
	 ");
    
    echo (mysql_num_rows($query) !== 0) ? mysql_result($query, 0, 'price') : 'Product not found';
    
}

?>