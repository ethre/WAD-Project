$("button#submit").click( function() {
 
  if( $("#username").val() == "" || $("#password").val() == "" )
    $("div#ack").html("Please enter both username and password");
  else
    $.post( $("#myForm2").attr("action"),
	        $("#myForm2 :input").serializeArray(),
			function(data) {
			  $("div#ack").html(data);
			});
 
	$("#myForm2").submit( function() {
	   return false;	
	});
 
});