<!DOCTYPE html>
<html>
	<head>
		<title>GarageSlam</title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
		<!--Stylesheets-->
		<link rel="stylesheet" type="text/css" href="/style.css" />
		<link rel="stylesheet" type="text/css" href="/fonts/FreeSans.css" />

		<link rel="icon" type="image/ico" href="/favicon.ico" />

		<!--Scripts-->
		<script type="text/javascript" src="/include/jquery-1.7.1.min.js"></script>
	</head>
	<body>
		<header>
			<div class="wrapper">
				<div id="login">
					<div id="fb-root"></div>
					<a href="/search.php">Search</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<script type="text/javascript">
						var currentUser;
						window.fbAsyncInit = function() {
				          FB.init({
				            appId      : '283313805059550',
				            status     : true, 
				            cookie     : true,
				            xfbml      : true,
				            oauth      : true,
				          });
				          FB.Event.subscribe('auth.login', function () {
				          	FB.api("/me", function(user) {
  								$.ajax({
					          		type: "GET",
					          		url: "/api/setUser.php",
					          		data: "id=" + user.id +
					          			"&fname=" + user.first_name +
					          			"&lname=" + user.last_name +
					          			"&location=" + user.location.name +
					          			"&school=" + user.education[user.education.length - 1].school.name,
				          			async: false
					          	});	
  							});
					        window.location = document.URL;
					      });
				          FB.getLoginStatus(function(response) {
  							if (response.status === 'connected') {
  								$(".fb-login-button").toggle();
							    $("#fbPicture").attr("src", "https://graph.facebook.com/" + response.authResponse.userID + "/picture");
  								$.ajax({
					          		type: "GET",
					          		url: "/api/getUser.php",
					          		data: "id=" + response.authResponse.userID,
				          			async: false,
				          			dataType: "json",
				          			success: function(data) {
				          				currentUser = data;
				          				$(document).trigger("currentUserLoaded");
						          		$(".currentName").html("<a href='/profile.php?id=" + currentUser.id + "'>" + currentUser.first + " " + currentUser.last + "</a>");
  									}
  								});
  							}
  						  });
				        };
				        (function(d){
				           var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
				           js = d.createElement('script'); js.id = id; js.async = true;
				           js.src = "//connect.facebook.net/en_US/all.js";
				           d.getElementsByTagName('head')[0].appendChild(js);
				        }(document));

				        $.ajaxSetup({
				        	cache: false
				        });
					</script>

					<img id="fbPicture" /> <span class="currentName"></span><div class="fb-login-button inline" data-scope="user_about_me, user_education_history, user_hometown, user_location, email"></div>
				</div>
				<h1><a href="/">GarageSlam</a></h1><span class="small">alpha</span>
			</div><!--/.wrapper-->
		</header>