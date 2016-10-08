<!DOCTYPE html>
<html>
	<head>
		<title>ItIsWhatItIs</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	
		<link rel="stylesheet" href="css/bootstrap.css"><!-- Twitter Bootstrap -->
		<link rel="stylesheet" href="css/style.css"><!-- Our Styles -->
		<link rel="stylesheet" href="css/reset.css"><!-- CSS reset -->
		<link rel="stylesheet" href="css/scroll.css"><!-- Scroll CSS -->
		<link rel="stylesheet" href="css/cart.css"><!-- Cart CSS -->
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
				    var results2 = document.getElementById("results2");
				    var results3 = document.getElementById("results3");
				    var results4 = document.getElementById("results4");
				    results.innerHTML = data.u1.user+" " + data.u1.age + " of " + data.u1.country;
				    results2.innerHTML = data.u2.user+" " + data.u2.age + " of " + data.u2.country;
				    results3.innerHTML = data.u3.user+ " " + data.u3.age + " of " + data.u3.country;
		
			    }
		    }
		
		    hr.send(null); 
		    results.innerHTML = "Requesting data...";
		}
		</script><!-- Ajax data receiver -->

		 <script src="http://code.jquery.com/jquery-latest.min.js"></script>
			 <?php
			 
			 $xml = new DOMDocument('1.0', 'utf-8');
			 $xml->formatOutput = true; 
			 $xml->preserveWhiteSpace = false;
			 $xml->load('mood.xml');
			
			 //Get item Element
			 $element = $xml->getElementsByTagName('person')->item(0);  
			
			 //Load child elements
			 $name = $element->getElementsByTagName('name')->item(0);
			 $comment = $element->getElementsByTagName('comment')->item(0) ;
			
			 //Replace old elements with new
			 $element->replaceChild($name, $name);
			 $element->replaceChild($comment, $comment);
			 ?>
			
			 <?php
			 if (isset($_POST['submit']))
			 {
			$name->nodeValue = $_POST['namanya'];
			$comment->nodeValue = $_POST['commentnya'];
			htmlentities($xml->save('mood.xml'));
			
			 }
			?>
		</script>
		<script>
		function check(){
		 $("#myForm").on("submit", function(e){
            e.preventDefault();
            $this = $(this);
            
            $.ajax({
               type: "POST",
               url: $this.attr('action'),
               data: $this.serialize(),
               success : function(){
                  alert('Done');
                  document.getElementById("myForm").reset();
               }
            });
        });
	}
	
	
	</script>
	
<audio controls autoplay loop>
  <source src="choice.ogg" type="audio/ogg">
  <source src="choice.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
	</head>
	<body>

<script>
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		  if (xhttp.readyState == 4 && xhttp.status == 200) {
		        changeMood(xhttp);
		       
		    }
		};
		xhttp.open("GET", "mood.xml", true);
		xhttp.send();
	
	
		function changeMood(xml) {
		    var xmlDoc1 = xml.responseXML;
		    document.getElementById("mood").innerHTML =
		    xmlDoc1.getElementsByTagName("comment")[0].childNodes[0].nodeValue;
		}
</script>
		<!-- Pulls info from XML -->
		<script>
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		  if (xhttp.readyState == 4 && xhttp.status == 200) {
		        myProduct1(xhttp);
		        myProduct2(xhttp);
		        myProduct3(xhttp);
		        myProduct4(xhttp);
		        myProduct5(xhttp);
		        myProduct6(xhttp);
		    }
		};
		xhttp.open("GET", "catalog.xml", true);
		xhttp.send();

		function myProduct1(xml) {
		    var xmlDoc = xml.responseXML;
		    // Product 1 XML Retieval
		    document.getElementById("prod1").innerHTML =
		    xmlDoc.getElementsByTagName("TITLE")[0].childNodes[0].nodeValue;
		    document.getElementById("type1").innerHTML =
		    xmlDoc.getElementsByTagName("TYPE")[0].childNodes[0].nodeValue;
		    document.getElementById("price1").innerHTML =
		    xmlDoc.getElementsByTagName("PRICE")[0].childNodes[0].nodeValue;
		    document.getElementById("modalDesc1").innerHTML = 
		    xmlDoc.getElementsByTagName("DESC")[0].childNodes[0].nodeValue;
		}
		function myProduct2(xml){
			var xmlDoc = xml.responseXML;
		   	// Product 2 XML Retieval
		    document.getElementById("prod2").innerHTML =
		    xmlDoc.getElementsByTagName("TITLE")[4].childNodes[0].nodeValue;
		    document.getElementById("type2").innerHTML =
		    xmlDoc.getElementsByTagName("TYPE")[4].childNodes[0].nodeValue;
		    document.getElementById("price2").innerHTML =
		    xmlDoc.getElementsByTagName("PRICE")[4].childNodes[0].nodeValue;
		    document.getElementById("modalDesc2").innerHTML = 
		    xmlDoc.getElementsByTagName("DESC")[4].childNodes[0].nodeValue;
		}
		function myProduct3(xml){
			var xmlDoc = xml.responseXML;
		   	// Product 3 XML Retieval
		    document.getElementById("prod3").innerHTML =
		    xmlDoc.getElementsByTagName("TITLE")[1].childNodes[0].nodeValue;
		    document.getElementById("type3").innerHTML =
		    xmlDoc.getElementsByTagName("TYPE")[1].childNodes[0].nodeValue;
		    document.getElementById("modalDesc3").innerHTML = 
		    xmlDoc.getElementsByTagName("DESC")[1].childNodes[0].nodeValue;
		}
		function myProduct4(xml){
			var xmlDoc = xml.responseXML;
		   	// Product 4 XML Retieval
		    document.getElementById("prod4").innerHTML =
		    xmlDoc.getElementsByTagName("TITLE")[2].childNodes[0].nodeValue;
		    document.getElementById("type4").innerHTML =
		    xmlDoc.getElementsByTagName("TYPE")[2].childNodes[0].nodeValue;
		    document.getElementById("modalDesc4").innerHTML = 
		    xmlDoc.getElementsByTagName("DESC")[2].childNodes[0].nodeValue;
		}
		function myProduct5(xml){
			var xmlDoc = xml.responseXML;
		   	// Product 5 XML Retieval
		    document.getElementById("prod5").innerHTML =
		    xmlDoc.getElementsByTagName("TITLE")[3].childNodes[0].nodeValue;
		    document.getElementById("type5").innerHTML =
		    xmlDoc.getElementsByTagName("TYPE")[3].childNodes[0].nodeValue;
		    document.getElementById("modalDesc5").innerHTML = 
		    xmlDoc.getElementsByTagName("DESC")[3].childNodes[0].nodeValue;
		}
		function myProduct6(xml){
			var xmlDoc = xml.responseXML;
		   	// Product 6 XML Retieval
		    document.getElementById("prod6").innerHTML =
		    xmlDoc.getElementsByTagName("TITLE")[5].childNodes[0].nodeValue;
		    document.getElementById("type6").innerHTML =
		    xmlDoc.getElementsByTagName("TYPE")[5].childNodes[0].nodeValue;
		    document.getElementById("modalDesc6").innerHTML = 
		    xmlDoc.getElementsByTagName("DESC")[5].childNodes[0].nodeValue;
		}
		</script>

	

		<script type="text/javascript">
			$(document).ready(function() {
			  var form = $('#myform'); // contact form
			  var submit = $('#submit');  // submit button
			  var alert = $('.alert'); // alert div for show alert message
			
			  // form submit event
			  form.on('submit', function(e) {
			    e.preventDefault(); // prevent default form submit
			
			    $.ajax({
			      url: 'process.php', // form action url
			      type: 'POST', // form submit method get/post
			      dataType: 'html', // request type html/json/xml
			      data: form.serialize(), // serialize form data 
			      beforeSend: function() {
			        alert.fadeOut();
			        submit.html('Sending....'); // change submit button text
			      },
			      success: function(data) {
			        alert.html(data).fadeIn(); // fade in response data
			        form.trigger('reset'); // reset form
			        submit.html('Send Email'); // reset submit button text
			      },
			      error: function(e) {
			        console.log(e)
			      }
			    });
			  });
				});
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
			<li><a href="#sec4">Upcoming</a></li>
			<li><a href="#sec5">Contact Us</a></li>
			<li><a href="#0" ezmodal-target="#logIn">Login</a></li>
			<li><a href="#0" ezmodal-target="#signUp">Sign Up</a></li>
		</ul>
	</nav>
	
	<!-- Shopping Cart -->
	<div id="cd-cart">
		<h2>Cart</h2>
		<ul class="cd-cart-items">
			
		</ul>
		
		<div class="cd-cart-total"></div> <!-- cd-cart-total -->
		
		<a href="#0" class="checkout-btn" onclick="error();">Checkout</a>
		<a href="#0" class="checkout-btn2" onclick="confirm();">Clear Cart</a>
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
	                			<button type="submit" id="submit" class="btn btn-success center-block" style="position: relative; top: 10px;">Sign Up</button> 
	                		</div>
	                	</form>
	                </div>
	            </div>
	      </div>

	<main class="cd-main-content">
		<div id="sec1" class="cd-fixed-bg cd-bg-1">
			<h1 style="font-family: 'Roboto', sans-serif; color: #fff; font-weight: bold;">Odds & Ends, That Sort of Thing</h1>
		</div> <!-- cd-fixed-bg -->

		<div id="sec2" class="cd-scrolling-bg cd-color-2" style="background-color: #252839;">
			<div class="container text-center">
				<h2 class="subHead text-center" style="font-family: 'Oswald', sans-serif;">Choose from a Selection of Oddities Every Month</h2>
				<div class="row">
					<div class="col-md-4">
						<img class="img-circle odds" src="img/catScratch.jpg"/>
						<h2 class="text-center" style="font-family: 'Oswald', sans-serif; font-weight: bold; font-size: 30px; color: #fff;">Step 1</h2>
						<p class="text-justify" style="color: #fff; font-family: 'Roboto', sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
					</div>

					<div class="col-md-4">
						<img class="img-circle odds" src="img/bigHugMug.jpg"/>
						<h2 class="text-center" style="font-family: 'Oswald', sans-serif; font-weight: bold; font-size: 30px; color: #fff;">Step 2</h2>
						<p class="text-justify" style="color: #fff; font-family: 'Roboto', sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
					</div>

					<div class="col-md-4">
						<img class="img-circle odds" src="img/fridgeZoo.jpg"/>
						<h2 class="text-center" style="font-family: 'Oswald', sans-serif; font-weight: bold; font-size: 30px; color: #fff;">Step 3</h2>
						<p class="text-justify" style="color: #fff; font-family: 'Roboto', sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
					</div>
				</div>
			</div> <!-- container -->
		</div> <!-- cd-scrolling-bg -->

		<div class="cd-fixed-bg cd-bg-2">
			<h2 style="font-family: 'Roboto', sans-serif; color: black; font-weight: bold;">December Selection for Christmas</h2>
		</div> <!-- cd-fixed-bg -->
		<div id="sec3" class="cd-scrolling-bg cd-color-3" style="background-color: #935347;">
			<div class="container">
			<!-- Add Content Here -->
			
			<!-- Easy Z Modal for Product 1 -->
			 <div id="p1" class="ezmodal" ezmodal-width="400">
	            <div class="ezmodal-container">
	                <div class="ezmodal-header" style="font-family: 'Oswald', sans-serif; font-weight: bold;">
	                    <div class="ezmodal-close" data-dismiss="ezmodal">x</div>
	                    Unicorn Tears Gin Liqueur
	                </div>
	                <div class="ezmodal-content">
	                	<img class="img-rounded" src="img/unicornTear1.jpg" width="40%" height="100%"/>
	                	<img class="img-rounded" style="position: relative; left: 70px;" src="img/unicornTear2.jpg" width="40%" height="100%"/>
    			       	<p id="modalDesc1" style="position: relative; font-size: 15px; font-family: 'Roboto', sans-serif;"></p>
    			       	<button type="button" id="addToCart1" class="btn btn-success center-block" style="position: relative; left: 10px;" data-dismiss="ezmodal">Add to Cart</button>
	                </div>
	            </div>
	        </div>
	        
	        <!-- Easy Z Modal for Product 2 -->
			 <div id="p2" class="ezmodal" ezmodal-width="400">
	            <div class="ezmodal-container">
	                <div class="ezmodal-header" style="font-family: 'Oswald', sans-serif; font-weight: bold;">
	                    <div class="ezmodal-close" data-dismiss="ezmodal">x</div>
	                    Magical Unicorn Slippers
	                </div>
	                <div class="ezmodal-content">
	                	<img class="img-rounded" src="img/unicornSlippers1.jpg" width="40%" height="100%"/>
	                	<img class="img-rounded" style="position: relative; left: 70px;" src="img/unicornSlippers2.jpg" width="40%" height="100%"/>
    			       	<p id="modalDesc2" style="position: relative; font-size: 15px; font-family: 'Roboto', sans-serif;"></p>
    			       	<button type="button" id="addToCart2" class="btn btn-success center-block" style="position: relative; left: 10px;" data-dismiss="ezmodal">Add to Cart</button>
	                </div>
	            </div>
	        </div>
	        
	        <!-- Easy Z Modal for Product 3 -->
			 <div id="p3" class="ezmodal" ezmodal-width="400">
	            <div class="ezmodal-container">
	                <div class="ezmodal-header" style="font-family: 'Oswald', sans-serif; font-weight: bold;">
	                    <div class="ezmodal-close" data-dismiss="ezmodal">x</div>
	                    Stress Sausage
	                </div>
	                <div class="ezmodal-content">
	                	<img class="img-rounded" src="img/stressSausage1.gif" width="40%" height="100%"/>
	                	<img class="img-rounded" style="position: relative; left: 70px;" src="img/sausage2.jpg" width="40%" height="100%"/>
    			       	<p id="modalDesc3" style="position: relative; font-size: 15px; font-family: 'Roboto', sans-serif;"></p>
    			       	<button type="button" id="addToCart3" class="btn btn-success center-block" style="position: relative; left: 10px;" data-dismiss="ezmodal">Add to Cart</button>
	                </div>
	            </div>
	        </div>
	        
	        <!-- Easy Z Modal for Product 4 -->
			 <div id="p4" class="ezmodal" ezmodal-width="400">
	            <div class="ezmodal-container">
	                <div class="ezmodal-header" style="font-family: 'Oswald', sans-serif; font-weight: bold;">
	                    <div class="ezmodal-close" data-dismiss="ezmodal">x</div>
	                    Ugly Christmas Sweater Kit
	                </div>
	                <div class="ezmodal-content">
	                	<img class="img-rounded" src="img/sweater1.gif" width="40%" height="100%"/>
	                	<img class="img-rounded" style="position: relative; left: 70px;" src="img/sweater2.jpg" width="40%" height="100%"/>
    			       	<p id="modalDesc4" style="position: relative; font-size: 15px; font-family: 'Roboto', sans-serif;"></p>
    			       	<button type="button" id="addToCart4" class="btn btn-success center-block" style="position: relative; left: 10px;" data-dismiss="ezmodal">Add to Cart</button>
	                </div>
	            </div>
	        </div>
	        
	        <!-- Easy Z Modal for Product 5 -->
			 <div id="p5" class="ezmodal" ezmodal-width="400">
	            <div class="ezmodal-container">
	               <div class="ezmodal-header" style="font-family: 'Oswald', sans-serif; font-weight: bold;">
	                    <div class="ezmodal-close" data-dismiss="ezmodal">x</div>
	                    Star Wars 3D Wall Lights
	                </div>
	                <div class="ezmodal-content">
	                	<img class="img-rounded" src="img/deathStar1.gif" width="40%" height="100%"/>
	                	<img class="img-rounded" style="position: relative; left: 70px;" src="img/notDeathStarlol2.jpg" width="40%" height="100%"/>
    			       	<p id="modalDesc5" style="position: relative; font-size: 15px; font-family: 'Roboto', sans-serif;"></p>
    			       	<button type="button" id="addToCart5" class="btn btn-success center-block" style="position: relative; left: 10px;" data-dismiss="ezmodal">Add to Cart</button>
	                </div>
	            </div>
	        </div>
	        
	        <!-- Easy Z Modal for Product 6 -->
			 <div id="p6" class="ezmodal" ezmodal-width="400">
	            <div class="ezmodal-container">
	                <div class="ezmodal-header" style="font-family: 'Oswald', sans-serif; font-weight: bold;">
	                    <div class="ezmodal-close" data-dismiss="ezmodal">x</div>
	                    Obama Llama
	                </div>
	                <div class="ezmodal-content">
	                	<img class="img-rounded" src="img/obamaLlama1.jpg" width="40%" height="100%"/>
	                	<img class="img-rounded" style="position: relative; left: 70px;" src="img/obamaLlama2.jpg" width="40%" height="100%"/>
    			       	<p id="modalDesc6" style="position: relative; font-size: 15px; font-family: 'Roboto', sans-serif;"></p>
    			       	<button type="button" id="addToCart6" class="btn btn-success center-block" style="position: relative; left: 10px;" data-dismiss="ezmodal">Add to Cart</button>
	                </div>
	            </div>
	        </div>
	        
			<h2 class="subHead text-center" style="font-family: 'Oswald', sans-serif;">Featured: December Selection</h2>
				<div class="row">
					<!-- Featured Product 1 -->
					<div class="col-md-6">
						<a href="#0" ezmodal-target="#p1">
							<div id="subCont1">
								<img class="img-rounded" src="img/unicornTear1.jpg" width="40%" height="100%"/>
								<p id="prod1" class="edChoice text-center" style="font-family: 'Oswald', sans-serif;"></p>
								<p id="type1" class="itemType text-center" style="font-family: 'Oswald', sans-serif;"></p>
								<p id="price1" class="edChoice text-center" style="font-family: 'Oswald', sans-serif;"></p>
							</div>
						</a>
					</div>
					<!-- Featured Product 2 -->
					<div class="col-md-6">
						<a href="#0" ezmodal-target="#p2">
							<div id="subCont1">
								<img class="img-rounded" src="img/unicornSlippers1.jpg" width="40%" height="100%"/>
								<p id="prod2" class="edChoice text-center" style="font-family: 'Oswald', sans-serif;"></p>
								<p id="type2" class="itemType text-center" style="font-family: 'Oswald', sans-serif;"></p>
								<p id="price2" class="edChoice text-center" style="font-family: 'Oswald', sans-serif;"></p>
							</div>
						</a>
					</div>
				</div>
				
				<div class="row">
					<!-- Featured Product 3 -->
					<div class="col-md-3">
						<a href="#0" ezmodal-target="#p3">
							<div id="subCont2">
								<img class="img-rounded" src="img/stressSausage1.gif" width="100%" height="70%"/>
								<p id="prod3" class="related text-center" style="font-family: 'Oswald', sans-serif;"></p>
								<p id="type3" class="itemType2 text-center" style="font-family: 'Oswald', sans-serif;"></p>
							</div>
						</a>
					</div>
					<!-- Featured Product 4 -->
					<div class="col-md-3">
						<a href="#0" ezmodal-target="#p4">
							<div id="subCont2">
								<img class="img-rounded" src="img/sweater1.gif" width="100%" height="70%"/>
								<p id="prod4" class="related text-center" style="font-family: 'Oswald', sans-serif;"></p>
								<p id="type4" class="itemType2 text-center" style="font-family: 'Oswald', sans-serif;"></p>
							</div>
						</a>
					</div>
					<!-- Featured Product 5 -->
					<div class="col-md-3">
						<a href="#0" ezmodal-target="#p5">
							<div id="subCont2">
								<img class="img-rounded" src="img/deathStar1.gif" width="100%" height="70%"/>
								<p id="prod5" class="related text-center" style="font-family: 'Oswald', sans-serif;"></p>
								<p id="type5" class="itemType2 text-center" style="font-family: 'Oswald', sans-serif;"></p>
							</div>
						</a>
					</div>
					<!-- Featured Product 6 -->
					<div class="col-md-3">
						<a href="#0" ezmodal-target="#p6">
							<div id="subCont2">
								<img class="img-rounded" src="img/obamaLlama1.jpg" width="100%" height="70%"/>
								<p id="prod6" class="related text-center" style="font-family: 'Oswald', sans-serif;"></p>
								<p id="type6" class="itemType2 text-center" style="font-family: 'Oswald', sans-serif;"></p>
							</div>
						</a>
					</div>
				</div>
			</div> <!-- container -->
		</div> <!-- cd-scrolling-bg -->

		<div class="cd-fixed-bg cd-bg-3">
			<br><br><br><br>
			<h1 style="font-family: 'Roboto', sans-serif; color: #fff; font-weight: bold;">Janaury Items</h1>
		</div> <!-- cd-fixed-bg -->

		<div id="sec4" class="cd-scrolling-bg cd-color-1" style="background-color: #252839;">
			<h2 class="subHead text-center" style="font-family: 'Oswald', sans-serif;">Upcoming Products: January</h2>
			<ul id="cd-gallery-items" class="cd-container">
				<!-- Captions Retrieved from Ajax Files -->
				<li onmouseover="getData('AjaxD/ajaxdesc.txt','ajaxDesc')">
					<p class="caption">
						<img src="img/product1.png" alt="Preview image">
						<span>
							<big id="ajaxDesc"></big><button onclick="error();" class="btn btn-warning">Reserve</button>
						</span>
					</p>
				</li>
	
				<li onmouseover="getData('AjaxD/ajaxdesc2.txt','ajaxDesc2')">
					<p class="caption">
						<img src="img/product2.png" alt="Preview image">
						<span>
							<big id="ajaxDesc2"></big><button onclick="error();" class="btn btn-warning">Reserve</button>
						</span>
					</p>
				</li>
	
				<li onmouseover="getData('AjaxD/ajaxdesc3.txt','ajaxDesc3')">
					<p class="caption">
						<img src="img/product3.png" alt="Preview image">
						<span>
							<big id="ajaxDesc3"></big><button onclick="error();" class="btn btn-warning">Reserve</button>
						</span>
					</p>
				</li>
	
				<li onmouseover="getData('AjaxD/ajaxdesc4.txt','ajaxDesc4')">
					<p class="caption">
						<img src="img/product4.png" alt="Preview image">
						<span>
							<big id="ajaxDesc4"></big><button onclick="error();" class="btn btn-warning">Reserve</button>
						</span>
					</p>
				</li>
	
				<li onmouseover="getData('AjaxD/ajaxdesc5.txt','ajaxDesc5')">
					<p class="caption">
						<img src="img/product5.png" alt="Preview image">
						<span>
							<big id="ajaxDesc5"></big><button onclick="error();" class="btn btn-warning">Reserve</button>
						</span>
					</p>
				</li>
	
				<li onmouseover="getData('AjaxD/ajaxdesc6.txt','ajaxDesc6')">
					<p class="caption">
						<img src="img/product6.png" alt="Preview image">
						<span>
							<big id="ajaxDesc6"></big><button onclick="error();" class="btn btn-warning">Reserve</button>
						</span>
					</p>
				</li>
	
				<li onmouseover="getData('AjaxD/ajaxdesc7.txt','ajaxDesc7')">
					<p class="caption">
						<img src="img/product7.png" alt="Preview image">
						<span>
							<big id="ajaxDesc7"></big><button onclick="error();" class="btn btn-warning">Reserve</button>
						</span>
					</p>
				</li>
	
				<li onmouseover="getData('AjaxD/ajaxdesc8.txt','ajaxDesc8')">
					<p class="caption">
						<img src="img/product8.png" alt="Preview image">
						<span>
							<big id="ajaxDesc8"></big><button onclick="error();" class="btn btn-warning">Reserve</button>
						</span>
					</p>
				</li>
	
				<li onmouseover="getData('AjaxD/ajaxdesc9.txt','ajaxDesc9')">
					<p class="caption">
						<img src="img/product9.png" alt="Preview image">
						<span>
							<big id="ajaxDesc9"></big><button onclick="error();" class="btn btn-warning">Reserve</button>
						</span>
					</p>
				</li>
			</ul> <!-- cd-gallery-items -->
			<div class="container">
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<h1 class="text-center" style="font-family: 'Oswald', sans-serif; font-size: 30px; color: #fff;">Product Price Check</h1>
						<h1 class="text-center text-justify" style="font-family: 'Roboto', sans-serif; font-size: 15px; color: #fff;">Check upcoming product prices and prepare for the future! (Don't misspell <span style="font-weight: bold;">*wink*</span>)</h1>
						<input type="text" class="form-control" id="product" placeholder="Input Product Name Here" size="27">
						<input type="submit" class="btn btn-info" id="product-submit" style="width: 100%;" value="Check Price">
						<div class="text-center" id="product-data" style="font-family: verdana; font-size: 20px; color: #fff;"></div>
						
					</div>
					<div class="col-md-4"></div>
				</div>
			</div>
		</div> <!-- cd-scrolling-bg -->

		<div class="cd-fixed-bg cd-bg-4">
			<h2 style="font-family: 'Roboto', sans-serif; color: black; font-weight: bold;">Send Us Your Thoughts</h2>
		</div> <!-- cd-fixed-bg -->
		
	<div id="sec5" class="cd-scrolling-bg cd-color-1" style="background-color: #935347;">
		<div class="container text-center">
			<h2 class="subHead text-center" style="font-family: 'Oswald', sans-serif;">Our Happy Little Customers</h2>
				<div class="row">
					<div class="col-md-4">
						<img class="img-circle odds" src="img/tyrion.png"/>
						</br>
						<img src="img/rating.png" width="30%"/>
						<div id="results" class="text-center" style="font-family: 'Oswald', sans-serif; font-size: 25px; color: #fff; font-weight: bold;"></div>
						<p class="text-justify" style="font-family: 'Roboto', sans-serif; color: #fff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
					</div>
	
					<div class="col-md-4">
						<img class="img-circle odds" src="img/varys.png"/>
						</br>
						<img src="img/rating.png" width="30%"/>
						<div id="results2" class="text-center" style="font-family: 'Oswald', sans-serif; font-size: 25px; color: #fff; font-weight: bold;"></div>
						<p class="text-justify" style="font-family: 'Roboto', sans-serif; color: #fff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
					</div>
	
					<div class="col-md-4">
						<img class="img-circle odds" src="img/jonsnowoverdose.png"/>
						</br>
						<img src="img/rating.png" width="30%"/>
						<div id="results3" class="text-center" style="font-family: 'Oswald', sans-serif; font-size: 25px; color: #fff; font-weight: bold;"></div>
						<p class="text-justify" style="font-family: 'Roboto', sans-serif; color: #fff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
					</div>
				</div>
				
				<div class="row" style="padding-top: 10px;">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<h2 class="text-center" style="font-size: 25px; font-family: 'Oswald', sans-serif; color: #fff;">Leave a Thought!</h2>
						<form method="POST" action=''>
							<h1 class="text-center" style="font-family: verdana; font-size: 20px; color: #fff;">Name</h1>
							<input type="text-name" class="form-control" name="namanya" />
							<h1 class="text-center" style="font-family: verdana; font-size: 20px; color: #fff;">Comment</h1>
							<input type="text-comment" class="form-control" name="commentnya"/>
							<input name="submit" class="btn btn-info" type="submit" style="padding-top: 5px;"/>
			 			</form>
					</div>
					<div class="col-md-4"></div>
				</div>
				
				<div class="row" style="padding-top: 15px;">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="text-justify" id="mood" type="text-comment" style="font-family: 'Roboto', sans-serif; color: #fff; background-color: #67433c; border-radius: 5px; padding: 7px;">
							<h1 style="font-family: verdana; font-size: 20px; color: #fff;">Name</h1>
							<?php echo $name->nodeValue ?>
							<h1 style="font-family: verdana; font-size: 20px; color: #fff;">Comment</h1>
						 	<?php echo $comment->nodeValue ?>
						</div>
					</div>
					<div class="col-md-4"></div>
				</div>
			</div> <!-- cd-container -->
			<a href="#0" class="cd-top">Top</a>
		</div> <!-- cd-scrolling-bg -->
	</main> <!-- cd-main-content -->
	
	<!-- Add to Cart Script -->
	<script>
	var incr = 0; // Cart Items Position in <ul>
	/*global success*/
		$('#addToCart1').click(function(){
			incr++;
			this.onclick = success();
			var itemAdd = $('#prod1').text();
			var price = 56.79;

			$('.cd-cart-items').append('<li>');
			$('.cd-cart-items').append('<span style="position: relative;" class="cd-qty">'+incr+'</span> '+itemAdd);
			$('.cd-cart-items').append('<div style="position: relative; left: 30px;" class="cd-price">$'+price+'</div>');
			$('.cd-cart-items').append('</li>');
		});
		$('#addToCart2').click(function(){
			incr++;
			this.onclick = success();
			var itemAdd = $('#prod2').text();
			var price = 9.00;
			
			$('.cd-cart-items').append('<li>');
			$('.cd-cart-items').append('<span style="position: relative;" class="cd-qty">'+incr+'</span> '+itemAdd);
			$('.cd-cart-items').append('<div style="position: relative; left: 30px;" class="cd-price">$'+price+'</div>');
			$('.cd-cart-items').append('</li>');
		});
		$('#addToCart3').click(function(){
			incr++;
			this.onclick = success();
			var itemAdd = $('#prod3').text();
			var price = 11.00;
			
			$('.cd-cart-items').append('<li>');
			$('.cd-cart-items').append('<span style="position: relative;" class="cd-qty">'+incr+'</span> '+itemAdd);
			$('.cd-cart-items').append('<div style="position: relative; left: 30px;" class="cd-price">$'+price+'</div>');
			$('.cd-cart-items').append('</li>');
		});
		$('#addToCart4').click(function(){
			incr++;
			this.onclick = success();
			var itemAdd = $('#prod4').text();
			var price = 41.69;
			
			$('.cd-cart-items').append('<li>');
			$('.cd-cart-items').append('<span style="position: relative;" class="cd-qty">'+incr+'</span> '+itemAdd);
			$('.cd-cart-items').append('<div style="position: relative; left: 30px;" class="cd-price">$'+price+'</div>');
			$('.cd-cart-items').append('</li>');
		});
		$('#addToCart5').click(function(){
			incr++;
			this.onclick = success();
			var itemAdd = $('#prod5').text();
			var price = 69.49;
			
			$('.cd-cart-items').append('<li>');
			$('.cd-cart-items').append('<span style="position: relative;" class="cd-qty">'+incr+'</span> '+itemAdd);
			$('.cd-cart-items').append('<div style="position: relative; left: 30px;" class="cd-price">$'+price+'</div>');
			$('.cd-cart-items').append('</li>');
		});
		$('#addToCart6').click(function(){
			incr++;
			this.onclick = success();
			var itemAdd = $('#prod6').text();
			var price = 27.79;
			
			$('.cd-cart-items').append('<li>');
			$('.cd-cart-items').append('<span style="position: relative;" class="cd-qty">'+incr+'</span> '+itemAdd);
			$('.cd-cart-items').append('<div style="position: relative; left: 30px;" class="cd-price">$'+price+'</div>');
			$('.cd-cart-items').append('</li>');
		});
	</script>
	
	<!-- Clear Cart -->
	<script>
	/*global incr*/
	
	function confirm() {
            notie.confirm('Are you sure you want to clear your cart?', 'Yes', 'Cancel', function() {
            	incr = 0;
            	$(".cd-cart-items").empty();
                notie.alert(1, 'Cart Cleared!', 2);
            });
        }
	</script>
	<script>
	/*global notie*/
    function success() {
        notie.alert(1, 'Item Added to Cart!', 2);
    }
    
    function error() {
                notie.alert(3, 'Not Available At This Time.', 2);
            }
    </script>
    	<script src="js/notie.js"></script><!-- Add to Cart Notifications -->
		<script src="js/main.js"></script><!-- Main Javascript -->
		<script type="text/javascript">ajax_get_json();</script>
		<script src="global.js"></script>
	</body>
</html>