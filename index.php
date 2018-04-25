<?php

include('constants/functions.php');
include('constants/html_code.php');

echo $part01;
include('js/jsFunctions.js');
echo $titleHTML;
echo $bootStrapCSS;
echo $customCSS;

if(!isset($_GET['cust_type'])) {
	echo $navigation;
	echo $navigation_Menu_End;
	echo $CallSujata;
	echo $Landing_Page_Buttons;
	echo $pageContent_Start;
} elseif(isset($_GET['cust_type']) && !isset($_GET['prod_type'])) {
	echo $navigation;
	echo $navigation_Menu_End;
	echo $CallSujata;
	echo $Product_Types_Buttons;
	echo $pageContent_Start;
} elseif (isset($_GET['cust_type']) && isset($_GET['prod_type'])) {
	
	$out_SQLQuery = "SELECT fld_Client_Types_ID FROM tbl_Client_Types WHERE fld_Client_Types_Name = '" . $_GET['cust_type'] . "'";
	$result = $tempConn->query($out_SQLQuery);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$client_Type_ID = $row['fld_Client_Types_ID'];
		}
	}
	
	$out_SQLQuery = "SELECT fld_PT_ID FROM tbl_Product_Types_PT WHERE fld_PT_Name = '" . $_GET['prod_type'] . "'";
	$result = $tempConn->query($out_SQLQuery);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$Product_Type_ID = $row['fld_PT_ID'];
		}
	}
	
	//echo product details
	echo $navigation;
	echo $navigation_Menu;
	echo $navigation_Menu_End;
	echo $pageContent_Start;
	
	echo $pageCategory_Start;
	$page_Cust = $_GET['cust_type'];
	echo $page_Cust;
	echo $pageCategory_Middle;
	echo $pageCategory;
	echo $pageCategory_End;
	echo $Carousel;
	echo $products_Start;
	
	$out_SQLQuery = "SELECT * FROM tbl_Products WHERE fld_Cust_Type_ID = " . $client_Type_ID . " AND fld_Prod_Type_ID = " . $Product_Type_ID;
	//echo $out_SQLQuery;
	$result = $tempConn->query($out_SQLQuery);
	
	if ($result->num_rows > 0) {
		
		$Product_Qty_Start=" | Sizes: ";
		$Product_Qty_L;
		$Product_Qty_XL;
		while($row = $result->fetch_assoc()) {
			if ($row['L'] > 0) {
				$Product_Qty_L = 'L';
			}
			
			if ($row['XL'] > 0) {
				if ($row['L'] <= 0 ) {
					$Product_Qty_XL = 'XL';
				} else {
					$Product_Qty_XL = ', XL';
				}
			}
			
			switch ($row['fld_Prod_Inventory_Status']){
				case 'New':
					$Product_Inventory_Status = $Product_New;
					break;
				Case 'Sale':
					$Product_Inventory_Status = $Product_Sale;
					break;
				Case 'Clearance':
					$Product_Inventory_Status = $Product_Clearance;
					break;
			}
			
			$Product_Sizes = $Product_Qty_L . $Product_Qty_XL;
			$product_Name = $row["fld_Prod_Name"];
			$product_Price = $row["fld_Prod_Price"];
			$product_Description = $row["fld_Prod_Desc"];
			$product_Image = $row["fld_Prod_Img"] . "/" . $row["fld_Prod_Style"] . '/' . $row["fld_Prod_Style"] . '-01.jpg';
			echo $Products_P1 . $Product_Inventory_Status . $Products_P1A . $product_Image . $Products_P1_1 .  $product_Image . $Products_P2 . $product_Name . $Products_P3 . $product_Price . $Product_Qty_Start . $Product_Sizes . $Products_P4 . $product_Description . $Products_P5;
			$Product_Qty_L = NULL;
			$Product_Qty_XL = NULL;
		}
	} else {
		echo $NoProducts;
	}
	
}

echo $pageContent_End;

echo $footer;

echo $closing;
?>