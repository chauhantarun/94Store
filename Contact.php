<?php

include('constants/functions.php');
include('constants/html_code.php');

echo $part01;
include('js/jsFunctions.js');
echo $titleHTML;
echo $bootStrapCSS;
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
echo $customCSS;

echo $navigation;
echo $navigation_Menu_End;
echo $CallSujata;

?>

  <div class="container">
    <div class="row" style="margin-top: 2%; margin-bottom: 3%">
        <div class="col-sm-6">
		<br />
            <h3 style="line-height:20%;"><i class="fa fa-home fa-1x" style="line-height:6%;color:#339966"></i> Adress:</h3>               
                <p style="margin-top:6%;line-height:35%">94 Berner Trail, Toronto, ON M1B 1B3</p>
                <br />
				<br />
                <h3 style="line-height:20%;"><i class="fa fa-envelope fa-1x" style="line-height:6%;color:#339966"></i> E-Mail Address:</h3>
                <p style="margin-top:6%;line-height:35%">sujata@brishtibeautyparlour.com</p>
                <br />
                <br />
                <h3 style="line-height:20%;"><i class="fa fa-user fa-1x" style="line-height:6%;color:#339966"></i> Contact Person:</h3>
                <p style="margin-top:6%;line-height:35%">Sujata Chauhan</p>
                <br />
                <br />
                <h3 style="line-height:20%;"><i class="fa fa-yelp fa-1x" style="line-height:6%;color:#339966"></i> Web-Site Address</h3>
                <p style="margin-top:6%;line-height:35%"><a href="http://tcsysadmin.online">tcsysadmin.online</a></p>
        </div>
        <div class="col-sm-6">
            <div class="embed-responsive embed-responsive-16by9">
			<iframe
			  width="600"
			  height="450"
			  frameborder="0" style="border:0"
			  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDvw_OjMGNALy-2RxrF2ZIAHxcY_DFs9nc
				&q=94+Berner+Trail,Scarborough+ON" allowfullscreen>
			</iframe>
            
        </div>
        </div>
    </div>
</div>

<?php
echo $pageContent_End;

echo $footer;

echo $closing;
?>