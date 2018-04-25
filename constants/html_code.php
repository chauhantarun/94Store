<?php

$tempConn = fn_ConnectSQL();

$pageName = ucwords(substr($_SERVER['PHP_SELF'], 1, strlen($_SERVER['PHP_SELF'])-5));

if ($pageName == "Index" || $pageName == "Contact" || $pageName = "About") {
	$pageName = "94 Store";
}

$part01 = 
	'
		<!-- This comes from html_code.php file -->
		<!DOCTYPE html>
		<html lang="en">

		<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
	';

$title = "94 Store";
$titleHTML =
	'
		<title>Shop Homepage - ' . $title . '</title>
	';
	
$bootStrapCSS =
	'
		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/bootstrap01.css" rel="stylesheet">
		
	';

$customCSS = 
	'
	<!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
	</head>
	<body>
	';

$CallSujata = 
	'
	<div class="row">
	<a class="btn btn-success btn-lg btn-block" href="tel:647-707-5801" style="padding:20px; margin-top: 30px;">
			Call Sujata &#9990;</span> 647-707-5801
	</a>
	</div>
	';
	
$indexPHP = 'index.php';
$tagLine = 'Kurtis | Accessories';
$Landing_Page_Buttons = 
	'
	<div class="row">
		<button type="button" id="Womens" style="margin-top: 7%" onclick="fn_Add_Cust(this)" class="btn btn-primary btn-lg btn-block vertical-center">Womens</button>
		<button type="button" id="Kids" style="margin-bottom: 8%" onclick="fn_Add_Cust(this)" class="btn btn-default btn-lg btn-block vertical-center">Kids</button>
	</div>
	';
$Product_Types_Buttons = 
	'
	<div class="row">
		<button type="button" style="margin-top: 7%" id="Kurtis" onclick="fn_Add_Prod(this)" class="btn btn-primary btn-lg btn-block vertical-center">Kurtis</button>
		<button type="button" id="Accessories" style="margin-bottom: 8%" onclick="fn_Add_Prod(this)" class="btn btn-default btn-lg btn-block vertical-center">Accessories</button>
	</div>
	';
$navigation = 
	'
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="' . $indexPHP . '">' . $pageName . '</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <!--active-->">
              <a class="nav-link" href="' . $indexPHP . '">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>';
			
$out_SQLQuery = "SELECT * FROM `tbl_Navigation`";
$result = $tempConn->query($out_SQLQuery);

if ($result->num_rows > 0) {
	//echo "Results Received";
	while($row = $result->fetch_assoc()) {
		$Menu_Name = str_replace(' ', '_', $row["fld_Navigation_Menu_Name"]);
		if ($Menu_Name == 'Contact') {
			$navigation_Menu = 	$navigation_Menu . '<li class="nav-item" id=li_id_"' . $Menu_Name . '">
								<a class="nav-link" id="' . $Menu_Name . '" href="/' . $Menu_Name . '.php" >' . $Menu_Name . '</a>
							</li>';
		} elseif ($Menu_Name == 'About') {
			$navigation_Menu = 	$navigation_Menu . '<li class="nav-item" id=li_id_"' . $Menu_Name . '">
								<a class="nav-link" id="' . $Menu_Name . '" href="/' . $Menu_Name . '.php" >' . $Menu_Name . '</a>
							</li>';
		} else {
			$navigation_Menu = 	$navigation_Menu . '<li class="nav-item" id=li_id_"' . $Menu_Name . '">
								<a class="nav-link" id="' . $Menu_Name . '" href="/index.php?cust_type=' . $Menu_Name . '"  onclick="fn_Add_Cust(this)" >' . $Menu_Name . '</a>
							</li>';
		}
    }

} else {
	echo "No Results";
}

//$navigation_Menu = 
			'
			<li class="nav-item">
              <a class="nav-link" onclick="fn_ChangeClass()" href="#">Women</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" onclick="fn_ChangeClass()" href="#">Kids</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="fn_ChangeClass()" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
			';

$navigation_Menu_End = 
		'
          </ul>
        </div>
      </div>
    </nav>
	';
	
$pageContent_Start = 
    '
	<!-- Page Content -->
    <div class="container">
		<div class="row">
	';

$pageCategory_Start = 
	'
	<!-- Category -->
		<div class="col-lg-3">

			<h1 class="my-4">';
$page_Cust = $pageName;
$pageCategory_Middle = '</h1>
			<div class="list-group">
	';
	
$out_SQLQuery = "SELECT * FROM tbl_Product_Types_PT";
$current_Customer_Type = $_GET['cust_type'];
$result = $tempConn->query($out_SQLQuery);
if ($result->num_rows > 0) {
	//echo "Results Received";
	while($row = $result->fetch_assoc()) {
		$PT_Name = str_replace(' ', '_', $row["fld_PT_Name"]);
		$pageCategory = $pageCategory . '<a href="/index.php?cust_type=' . $current_Customer_Type . '&' . 'prod_type=' . $PT_Name . '" class="list-group-item">' . $PT_Name . '</a>';
        //echo "<br> <a id = " . $row["fld_PT_ID"] . " href = $PT_Name.php>" . $PT_Name . "</a>";
    }
} else {
	echo "No Results";
}

$pageCategory_End = 
	'
		</div>

	</div>
	<!-- Category -->
	';
//$pageCategory = 
	'
		<!-- Category -->
		<div class="col-lg-3">

			<h1 class="my-4">94 Store</h1>
			<div class="list-group">
			<a href="#" class="list-group-item">Kurtis</a>
			<a href="#" class="list-group-item">Accessories</a>
			<a href="#" class="list-group-item">Sarees</a>
			</div>

		</div>
		<!-- Category -->
	';

$Carousel = 
	'
	<!--Carousel -->
	<div class="col-lg-9">

	  <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
		<ol class="carousel-indicators">
		  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
		  <div class="carousel-item active">
			<img class="d-block img-fluid" src="img/carousel/carousel01.jpg" alt="First slide">
		  </div>
		  <div class="carousel-item">
			<img class="d-block img-fluid" src="img/carousel/carousel02.jpg" alt="Second slide">
		  </div>
		  <div class="carousel-item">
			<img class="d-block img-fluid" src="img/carousel/carousel03.jpg" alt="Third slide">
		  </div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	  </div>
	';

$products_Start =
	'
		<!--Products -->
			<a class="btn btn-success btn-lg btn-block" href="tel:647-855-7680" style="padding:20px; margin-bottom: 10px;">
			Call Sujata &#9990; 647-855-7680
			</a>
		<div class="row">
	';

$Product_New = '<span class="badge badge-success">New</span>';
$Product_Sale = '<span class="badge badge-warning">Sale</span>';
$Product_Clearance = '<span class="badge badge-danger">Clearance</span>';

$Products_P1 = 
	'
	<div class="col-lg-4 col-md-6 mb-4">
		<div class="card h-100">
	';
$Products_P1A = '<a href="';
$Products_P1_1 = 
	'
	"><img class="card-img-top" src="'; //. $product_Image . 
			
$Products_P2 = 
	'
	" alt=""></a>
			
			<div class="card-body">
				<h4 class="card-title">
					<a href="#">'; //. $product_Name . 
$Products_P3 = 
	'
	</a>
				</h4>
				<h5>$'; //. $product_Price . 
$Products_P4 = 
	'
	</h5>
				<p class="card-text">'; //. $product_Description . 
$Products_P5 = 
	'
	</p>
			</div>
			
			<div class="card-footer">
				<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
			</div>
		</div>
		
	</div>
	';
	
$NoProducts = 
	'
	<div class="col-lg-12">
		<h1 class="display-4">No Products to Show</h1>
		<p class="lead"><h3 class="display-4">Uh-oh..... </h3><br> <h2 class="span-12">We do not have any products matching your criteria, but you can always look for other Products....</h3></p>
	  </div>

	';
$pageContent_End =
	'
				</div>
				<!-- /.row -->

			</div>
			<!-- /.col-lg-9 -->

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->
	';

$Year = date("Y");
$footer = 
	'
	<!-- Footer -->
    <footer class="py-5 bg-dark row">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; 94 Store ' . $Year . '</p>
      </div>
      <!-- /.container -->
    </footer>
	';
	
$closing = 
	'
	<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	

		</body>
		

	</html>
	';
?>