<!DOCTYPE html>
<html>
	<head>
		<title>Project</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<link rel="stylesheet" href="css/bootstrap.css"><!-- Twitter Bootstrap -->
		<link rel="stylesheet" href="css/style.css"><!-- Our Styles -->
		<link rel="stylesheet" href="css/reset.css"><!-- CSS reset -->
		<link rel="stylesheet" href="css/scroll.css"><!-- Scroll CSS -->
		<link rel="stylesheet" href="css/cart.css"><!-- Cart CSS -->
		<script src="fadein.js"></script><!-- Short fade in preloade -->
		<script src="js/jquery-2.1.4.js"></script><!-- JQuery -->
		<script src="js/bootstrap.js"></script><!-- Bootstrap Javascript -->
		<script src="js/modernizr.js"></script> <!-- Modernizr -->
		<script src="js/my_script.js"></script> <!-- Registration Verification-->
		<script type="text/javascript" src="js/my_script2.js"></script>
	<!-- Ajax used for images/grey div -->
		<script>
		
            var XMLHttpRequestObject = false;
            if(window.XMLHttpRequest){
                XMLHttpRequestObject = new XMLHttpRequest();
            }
            else if(window.ActiveXObject){
                XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
            }
            function getData(datasource, divID){
                if(XMLHttpRequestObject){
                    var obj = document.getElementById(divID);
                    XMLHttpRequestObject.open("GET",datasource,true);
                    XMLHttpRequestObject.onreadystatechange= 
                    function (){
                        
                        if(XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200){
                            obj.innerHTML=XMLHttpRequestObject.responseText;
                        }
                    }
                    XMLHttpRequestObject.send(null);
                }
            }
	</script>
	
		<script>
			function showRSS(str) {
			if (str.length==0) { 
		    document.getElementById("rssOutput").innerHTML="";
		    return;
			  }
			  if (window.XMLHttpRequest) {
		  // code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  } else {  // code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  xmlhttp.onreadystatechange=function() {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			  document.getElementById("rssOutput").innerHTML=xmlhttp.responseText;
			    }
			  }
			 xmlhttp.open("GET","getrss.php?q="+str,true);
			 xmlhttp.send();
			 }
		</script>

		<script type="text/javascript">
		
		function ajax_get_json(){
		
		    var hr = new XMLHttpRequest();
		    hr.open("GET", "mylist.json", true);
		    hr.setRequestHeader("Content-type", "application/json",true);
		    hr.onreadystatechange = function() {
			    if(hr.readyState == 4 && hr.status == 200) {
				    var data = JSON.parse(hr.responseText);
				    var results = document.getElementById("results");
				    results.innerHTML = data.u1.user + " is " + data.u1.age + " and he lives in " + data.u1.country;
			    }
		    }
		
		    hr.send(null); 
		    results.innerHTML = "Requesting data...";
		}
		</script><!-- Ajax data receiver -->



	
	<body>

		<!-- Pulls info from XML -->
		<script>
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		  if (xhttp.readyState == 4 && xhttp.status == 200) {
		        myFunction(xhttp);
		        myFunction1(xhttp);
		    }
		};
		xhttp.open("GET", "catalog.xml", true);
		xhttp.send();

		function myFunction(xml) {
		    var xmlDoc = xml.responseXML;
		    // Product 1 XML Retieval
		    
		    document.getElementById("prod1").innerHTML =
		    xmlDoc.getElementsByTagName("TITLE")[0].childNodes[0].nodeValue;
		    document.getElementById("type1").innerHTML =
		    xmlDoc.getElementsByTagName("TYPE")[0].childNodes[0].nodeValue;
		    document.getElementById("modalDesc1").innerHTML = 
		    xmlDoc.getElementsByTagName("DESC")[0].childNodes[0].nodeValue;
		}
		function myFunction1(xml){
			var xmlDoc = xml.responseXML;
		   	// Product 2 XML Retieval
		    document.getElementById("prod2").innerHTML =
		    xmlDoc.getElementsByTagName("TITLE")[4].childNodes[0].nodeValue;
		    document.getElementById("type2").innerHTML =
		    xmlDoc.getElementsByTagName("TYPE")[4].childNodes[0].nodeValue;
		    document.getElementById("modalDesc2").innerHTML = 
		    xmlDoc.getElementsByTagName("DESC")[4].childNodes[0].nodeValue;
		 	
		}
		</script>
		
		<script>
			function chk()
			{
				var name=document.getElementById('username').value;
				var password=document.getElementById('password').value;
				var dataString = 'Username'+ username +'&password='+password;
				$.ajax({
					type:"POST",
					url:"process.php",
					data:dataString,
					cache:false,
					success: function(html){
							$('#msg').html(html);
						
					}
					
					
				})
				return false;
				
			}
			
		</script>
		
		<header>
		<div id="logo"><img src="img/cd-logo.svg" alt="Homepage"></div>

		<div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div>
		<div id="cd-cart-trigger"><a class="cd-img-replace" href="#0">Cart</a></div>
	</header>

	<nav id="main-nav">
		<ul>
			<li><a href="#sec1">Home</a></li>
			<li><a href="#sec2">About</a></li>
			<li><a href="#sec3">Featured</a></li>
			<li><a href="#sec4">Products</a></li>
			<li><a href="#0" ezmodal-target="#logIn">Login</a></li>
			<li><a href="#0" ezmodal-target="#signUp">Sign Up</a></li>
		</ul>
	</nav>
	<!-- Shopping Cart -->
	<div id="cd-cart">
		<h2>Cart</h2>
		<ul class="cd-cart-items">
			
		</ul>
	</div>

	<!-- !important, this is where the login form is -->
		<!-- Easy Z Modal for Login -->
		 <div id="logIn" class="ezmodal" ezmodal-width="300">
	            <div class="ezmodal-container" style="background: #605E68;">
	                <div class="ezmodal-header" style="border-bottom: 1px solid #29282F;">
	                    <div class="ezmodal-close" style="text-shadow: none;" data-dismiss="ezmodal">x</div>
	                    <p style="color: #fff;">Login</p>
	                </div>
	                <div class="ezmodal-content">
	                	<form role="form" id="myForm2" action="login.php" method="POST">
	                		<div class="form-group">
	                			<label for="Email" style="color: #fff">Username</label>
	                			<input type="text" class="form-control" name="username" id="username">
	                		</div>
	                		<div class="form-group">
	                			<label for="pwd" style="color: #fff">Password</label>
	                			<input type="password" class="form-control" name="password" id="password">
	                		</div>
	                		<div class="checkbox">
							    <label style="color: #fff"><input type="checkbox"> Remember me</label>
							    <div id="ack" class="text-center" style="color: #fff;">Fill out the form</div>
							</div>
						<button type="submit" class="btn btn-primary center-block">Login</button> 
	                	</form>
	                </div>
	            </div>
	      </div>
	      
	      <!-- Easy Z Modal for Sign Up -->
		 <div id="signUp" class="ezmodal" ezmodal-width="300">
	            <div class="ezmodal-container" style="background: #605E68;">
	                <div class="ezmodal-header" style="border-bottom: 1px solid #29282F;">
	                    <div class="ezmodal-close" style="text-shadow: none;" data-dismiss="ezmodal">x</div>
	                    <p style="color: #fff;">Sign Up</p>
	                </div>
	                <div class="ezmodal-content">
	                	<form role="form" id="myForm" action="process.php" method="POST">
	                		<div class="form-group">
	                			<label for="Email" style="color: #fff">Username</label>
	                			<input type="text" class="form-control" id="username" name="username">
	                		</div>
	                		<div class="form-group">
	                			<label for="pwd" style="color: #fff">Password</label>
	                			<input type="password" class="form-control" id="password" name="password">
	                		</div>
	                		<div class="form-group">
	                			<label for="firstName" style="color: #fff">First Name</label>
	                			<input type="text" class="form-control" name="fname">
	                		</div>
	                		<div class="form-group">
	                			<label for="lastName" style="color: #fff">Last Name</label>
	                			<input type="text" class="form-control" name="lname">
	                			<br />
	                			<div id="ack" class="text-center" style="color: #fff;">Fill out the form</div>
	                			<button type="submit" class="btn btn-success center-block" style="position: relative; top: 10px;">Sign Up</button> 
	                		</div>
	                	</form>
	                </div>
	            </div>
	      </div>

	<main class="cd-main-content">
		<div id="sec1" class="cd-fixed-bg cd-bg-1">
		<h1>#believe this website will succeed</h1>
		</div> <!-- cd-fixed-bg -->

		<div id="sec2" class="cd-scrolling-bg cd-color-2">
			<div class="container text-center">
        
				<h2 class="subHead text-center">Selection of Oddities</h2>
				<div class="row">
					<div class="col-md-4">
						<img class="img-circle odds" src="http://media.firebox.com/pic/p6970_column_grid_3.jpg"/>
						<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
					</div>

					<div class="col-md-4">
						<img class="img-circle odds" src="http://media.firebox.com/pic/p7433_column_grid_3.jpg"/>
						<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
					</div>

					<div class="col-md-4">
						<img class="img-circle odds" src="http://media.firebox.com/pic/p7267_column_grid_3.jpg"/>
						<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
					</div>
				</div>
			</div> <!-- container -->
		</div> <!-- cd-scrolling-bg -->

		<div class="cd-fixed-bg cd-bg-2">
			<h2>Great Gifts for Christmas</h2>
		</div> <!-- cd-fixed-bg -->
		

		<div id="sec3" class="cd-scrolling-bg cd-color-3">
			<div class="container">
			<!-- Add Content Here -->
			
			<!-- Easy Z Modal for Product 1 -->
			 <div id="p1" class="ezmodal" ezmodal-width="400">
	            <div class="ezmodal-container">
	                <div class="ezmodal-header">
	                    <div class="ezmodal-close" data-dismiss="ezmodal">x</div>
	                    Unicorn Tears Gin Liqueur
	                </div>
	                <div class="ezmodal-content">
	                	<img class="img-rounded" src="http://media.firebox.com/pic/p6970_column_grid_3.jpg" width="40%" height="100%"/>
	                	<img class="img-rounded" style="position: relative; left: 70px;" src="img/unicorn2.jpg" width="40%" height="100%"/>
    			       	<p id="modalDesc1" style="position: relative;font-size: 15px;"></p>
    			       	<button type="button" id="addToCart" class="btn btn-success center-block" style="position: relative; left: 10px;" data-dismiss="ezmodal">Add to Cart</button>
	                </div>
	            </div>
	        </div>
	        
	        <!-- Easy Z Modal for Product 2 -->
			 <div id="p2" class="ezmodal" ezmodal-width="400">
	            <div class="ezmodal-container">
	                <div class="ezmodal-header">
	                    <div class="ezmodal-close" data-dismiss="ezmodal">x</div>
	                    Magical Unicorn Slippers
	                </div>
	                <div class="ezmodal-content">
	                	<img class="img-rounded" src="http://media.firebox.com/pic/p5988_column_grid_3.jpg" width="40%" height="100%"/>
	                	<img class="img-rounded" style="position: relative; left: 70px;" src="img/unicornSlippers2.jpg" width="40%" height="100%"/>
    			       	<p id="modalDesc2" style="position: relative;font-size: 15px;"></p>
    			       	<button type="button" class="btn btn-success center-block" style="position: relative; left: 10px;">Add to Cart</button>
	                </div>
	            </div>
	        </div>
			<h2 class="subHead text-center">Featured</h2>
				<div class="row">
					<div class="col-md-6">
						<a href="#0" ezmodal-target="#p1">
							<div id="subCont1">
								<img class="img-rounded" src="http://media.firebox.com/pic/p6970_column_grid_3.jpg" width="40%" height="100%"/>
								<p id="prod1" class="edChoice text-center"></p>
								<p id="type1" class="itemType text-center"></p>
							</div>
						</a>
					</div>
					
					<div class="col-md-6">
						<a href="#0" ezmodal-target="#p2">
							<div id="subCont1">
								<img class="img-rounded" src="http://media.firebox.com/pic/p5988_column_grid_3.jpg" width="40%" height="100%"/>
								<p id="prod2" class="edChoice text-center"></p>
								<p id="type2" class="itemType text-center"></p>
							</div>
						</a>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<a href="#0">
							<div id="subCont2">
								<img class="img-rounded" src="http://media.firebox.com/pic/p7215_column_grid_3.gif" width="100%" height="70%"/>
								<p id="prod3" class="related text-center">Related Items</p>
								<p class="itemType2 text-center">Gifts for Him</p>
							</div>
						</a>
					</div>
					
					<div class="col-md-3">
						<a href="#0">
							<div id="subCont2">
								<img class="img-rounded" src="http://media.firebox.com/pic/p7271_column_grid_3.gif" width="100%" height="70%"/>
								<p class="related text-center">Related Items</p>
								<p class="itemType2 text-center">Christmas</p>
							</div>
						</a>
					</div>
					
					<div class="col-md-3">
						<a href="#0">
							<div id="subCont2">
								<img class="img-rounded" src="http://media.firebox.com/pic/p7343_column_grid_3.gif" width="100%" height="70%"/>
								<p class="related text-center">Related Items</p>
								<p class="itemType2 text-center">Quirky</p>
							</div>
						</a>
					</div>
					
					<div class="col-md-3">
						<a href="#0">
							<div id="subCont2">
								<img class="img-rounded" src="http://media.firebox.com/pic/p7039_column_grid_3.jpg" width="100%" height="70%"/>
								<p class="related text-center">Related Items</p>
								<p class="itemType2 text-center">Board Games</p>
							</div>
						</a>
					</div>
				</div>
			</div> <!-- container -->
		</div> <!-- cd-scrolling-bg -->

		<div class="cd-fixed-bg cd-bg-3">
			<br><br><br><br>
			<h1>Enjoy your coffee guys, be back around 12 ~ . ~</h1>
			<img src="img/2.png" onmouseover="this.src='img/3.png'" onmouseout="this.src='img/2.png'" class="img-responsive center-block" id="subjects" />
		</div> <!-- cd-fixed-bg -->

		<div id="sec4" class="cd-scrolling-bg cd-color-1">
			<div class="container">
				<div class="row">
					<h2 class="subHead text-center" id="ajaxDesc">Products</h2>
					<!-- !important: Blank Columns help Center Content -->
					<div class="col-md-3"></div>
					
					<div class="col-md-3">
						<div class="targetDiv">
							<img class="img-rounded img-responsive" id="woofwoof padding" src="http://www.thisiswhyimbroke.com/images/darth-vader-melted-helmet-300x250.jpg" width="215px" height="215px" onmouseover="getData('AjaxD/ajaxdesc.txt','ajaxDesc')"/>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="targetDiv">
							<img class="img-rounded img-responsive" id="woofwoof padding" src="http://www.thisiswhyimbroke.com/images/the-gift-of-nothing-300x250.jpg" width="215px" height="215px" onmouseover="getData('AjaxD/ajaxdesc2.txt','ajaxDesc')"/>
						</div>
					</div>
					
					<div class="col-md-3"></div>
				</div>
				</br>
				
				<div class="row">
					<div class="col-md-3"></div>
					
					<div class="col-md-3">
						<div class="targetDiv">
							<img class="img-rounded img-responsive" id="woofwoof padding" src="http://www.thisiswhyimbroke.com/images/lab-shot-glasses1-300x250.jpg" width="215px" height="215px" onmouseover="getData('AjaxD/ajaxdesc3.txt','ajaxDesc')"/>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="targetDiv">
							<img class="img-rounded img-responsive" id="woofwoof padding" src="http://www.thisiswhyimbroke.com/images/motion-activated-toilet-night-light-300x250.jpg" width="215px" height="215px" onmouseover="getData('AjaxD/ajaxdesc4.txt','ajaxDesc')"/>
						</div>
					</div>
					
					<div class="col-md-3"></div>
				</div>
				</br>
				
				<div class="row">
					<div class="col-md-3"></div>
					
					<div class="col-md-3">
						<div class="targetDiv">
							<img class="img-rounded img-responsive" id="woofwoof padding" src="http://www.thisiswhyimbroke.com/images/glitter-rainbow-sugar-cookies-300x250.jpg" width="215px" height="215px" onmouseover="getData('AjaxD/ajaxdesc5.txt','ajaxDesc')"/>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="targetDiv">
							<img class="img-rounded img-responsive" id="woofwoof padding" src="http://www.thisiswhyimbroke.com/images/the-chaos-machine-300x250.jpg" width="215px" height="215px" onmouseover="getData('AjaxD/ajaxdesc6.txt','ajaxDesc')"/>
						</div>
					</div>
					
					<div class="col-md-3"></div>
				</div>
				</br>
				
				<div class="row">
					<div class="col-md-3"></div>
					
					<div class="col-md-3">
						<div class="targetDiv">
							<img class="img-rounded img-responsive" id="woofwoof padding" src="http://www.thisiswhyimbroke.com/images/pop-up-usb-socket-300x250.jpg" width="215px" height="215px" onmouseover="getData('AjaxD/ajaxdesc7.txt','ajaxDesc')"/>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="targetDiv">
							<img class="img-rounded img-responsive" id="woofwoof padding" src="http://www.thisiswhyimbroke.com/images/hylian-shield1-300x250.jpg" width="215px" height="215px" onmouseover="getData('AjaxD/ajaxdesc8.txt','ajaxDesc')"/>
						</div>
					</div>
					
					<div class="col-md-3"></div>
				</div>
			</div>
		</div> <!-- cd-scrolling-bg -->

		<div class="cd-fixed-bg cd-bg-4">
			<h2>Lorem ipsum dolor sit amet.</h2>
		</div> <!-- cd-fixed-bg -->
		
			<div class="cd-scrolling-bg cd-color-1">
			<div class="container">
				<div class="row">
					
		<div class="col-md-6">

		 <div id="results"></div>
		 <div id="msg"></div>
		 
		</div>
					
		<div class="col-md-6">
	
		<h1>Product Price Check:</h1><input type="text" id="product">
		<input type="submit" id="product-submit" value="Check Price">
		<div id="product-data"></div>


					</div>
				</div> <!-- end of row -->
			</div> <!-- cd-container -->
			<a href="#0" class="cd-top">Top</a>
		</div> <!-- cd-scrolling-bg -->
	</main> <!-- cd-main-content -->
	
	<!-- Add to Cart Script -->
	<script>
		$('#addToCart').click(function(){
			var itemAdd = $('#prod1').text();
			$('.cd-cart-items').append('<li>'+itemAdd+'</li>');
		});
	</script>
		<script src="js/main.js"></script><!-- Main Javascript -->
		<script type="text/javascript">ajax_get_json();</script>
		<script src="global.js"></script>
	</body>
</html>