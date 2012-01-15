<?
	require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php"); 
	
	$id = $_GET['id'];
?>
		
		<!--script type="text/javascript" src="/include/autocomplete.js"></script-->
		<script src="http://connect.soundcloud.com/sdk.js" type="text/JavaScript"></script>
		<script type="text/JavaScript">
			SC.initialize({
				client_id: "557ccdf7556d180c0f1d38332930af9d",
				redirect_uri: "http://example.com/callback.html",
			});

			$(document).ready(function() {
				$.ajax({
	          		type: "GET",
	          		url: "/api/getUser.php",
	          		data: "id=<? echo $id ?>",
	      			async: false,
	      			dataType: "json",
	      			success: function(data) {
	      				profileUser = data;
		          		$(".profileName").html("<a href='/profile.php'>" + profileUser.first + " " + profileUser.last + "</a>");
		          		$(".location").html(profileUser.location);
		          		var i;
		          		for (i = 0; i < profileUser.influences.length; i++) {
							$.ajax({
								type: "GET",
								url: "http://developer.echonest.com/api/v4/artist/images",
								data: "api_key=LKUB0RKYGDIVF956W" + 
									"&name=" + profileUser.influences[i] +
									"&format=json" +
									"&results=1",
								dataType: "json",
								async: false,
								success: function(data) {
									$("#influences").append("<div class=\"influence\" id=\"" + i + "\"><div class=\"innerImage\"><img src=\"" + data.response.images[0].url +"\" /></div>" + profileUser.influences[i] + "</div><!--/.influence-->");
									if (i % 3 == 0) {
										$(".influence#" + i).addClass("first");
									}
								}
							});
						}
						$("#influences").append("<div class=\"influence new\" id=\"" + profileUser.influences.length + "\"><div class=\"innerImage\"><a href=\"#\">+</a></div><div id=\"add\">Add an influence</div></div>");
						$(".influence.new a").live("click", function() {
							$(".influence.new #add").html("<form id=\"addInfluence\" action=\"\"><input type=\"text\" class=\"grey\" id=\"addInfluenceInput\" name=\"addInfluenceInput\" value=\"Add an influence\"></input></form>");
							$(".influence.new #addInfluenceInput").focus();
							$(".influence.new #addInfluenceInput").live("blur" , function() {
								if ($(this).attr("value") === "Add an influence") {
									$(".influence.new #add").html("Add an influence");
								}
							});
							$("form#addInfluence").submit(function() {
								$.ajax({	
					          		type: "GET",
					          		url: "/api/setInfluence.php",
					          		data: "id=" + currentUser.id +
					          			"&name=" + $("input#addInfluenceInput").val(),
				          			dataType: "json",
				          			success: function(data) {
				          				profileUser.influences[profileUser.influences.length] = $("input#addInfluenceInput").val();
				          				$.ajax({
											type: "GET",
											url: "http://developer.echonest.com/api/v4/artist/images",
											data: "api_key=LKUB0RKYGDIVF956W" + 
												"&name=" + profileUser.influences[profileUser.influences.length - 1] +
												"&format=json" +
												"&results=1",
											dataType: "json",
											async: false,
											success: function(data) {
						          				$(".influence.new").html("<div class=\"innerImage\"><img src=\"" + data.response.images[0].url +"\" /></div>" + profileUser.influences[profileUser.influences.length - 1] + "</div>");
						          				$(".influence.new").removeClass("new");
						          				$("#influences").append("<div class=\"influence new\" id=\"" + profileUser.influences.length + "\"><div class=\"innerImage\"><a href=\"#\">+</a></div><div id=\"add\">Add an influence</div></div>");
						          			}
						          		});	
  									}
  								});
  								return false;
							});
						});
						if (profileUser.influences.length % 3 == 0) {
							$(".influence#" + profileUser.influences.length).addClass("first");
						}

						for (i = 0; i < profileUser.genres.length; i++) {
							$("#genres").append("<span class=\"genre\" id=" + i + ">" + profileUser.genres[i] + "</span>");
							if (i != profileUser.genres.length - 1) {
								$("#genres").append(" &bull; ");
							}
						}
						$("#genres").append("<span class=\"genre new\" id=" + profileUser.genres.length + "><a href=\"#\">Add a genre</a></span>");
						$(".genre.new a").live("click", function() {
							$(".genre.new #add").html("<form id=\"addGenre\" action=\"\"><input type=\"text\" class=\"grey\" id=\"addGenreInput\" name=\"addGenreInput\" value=\"Add a genre\"></input></form>");
							$(".genre.new #addGenreInput").focus();
							$(".genre.new #addGenreInput").live("blur" , function() {
								if ($(this).attr("value") === "Add a genre") {
									$(".genre.new #add").html("Add a genre");
								}
							});
							$("form#addGenre").submit(function() {
								$.ajax({	
					          		type: "GET",
					          		url: "/api/setGenre.php",
					          		data: "id=" + currentUser.id +
					          			"&name=" + $("input#addGenreInput").val(),
				          			dataType: "json",
				          			success: function(data) {
				          				profileUser.genres[profileUser.genres.length] = $("input#addGenreInput").val();
				          				$.ajax({
											type: "GET",
											url: "http://developer.echonest.com/api/v4/artist/images",
											data: "api_key=LKUB0RKYGDIVF956W" + 
												"&name=" + profileUser.genres[profileUser.genres.length - 1] +
												"&format=json" +
												"&results=1",
											dataType: "json",
											async: false,
											success: function(data) {
						          				$(".genre.new").html("<div class=\"innerImage\"><img src=\"" + data.response.images[0].url +"\" /></div>" + profileUser.genres[profileUser.genres.length - 1] + "</div>");
						          				$(".genre.new").removeClass("new");
						          				$("#genres").append("<div class=\"genre new\" id=\"" + profileUser.genres.length + "\"><div class=\"innerImage\"><a href=\"#\">+</a></div><div id=\"add\">Add a genre</div></div>");
						          			}
						          		});	
  									}
  								});
  								return false;
							});
						});

						for (i = 0; i < profileUser.instruments.length; i++) {
							$("#instruments").append("<span class=\"instrument\" id=" + i + ">" + profileUser.instruments[i] + "</span>");
							if (i != profileUser.instruments.length - 1) {
								$("#instruments").append(" &bull; ");
							}
						}
						$("#instrument").append("<span class=\"instrument new\" id=" + profileUser.instrument.length + "><a href=\"#\">Add an instrument</a></span>");
						$(".instrument.new a").live("click", function() {
							$(".instrument.new #add").html("<form id=\"addInstrument\" action=\"\"><input type=\"text\" class=\"grey\" id=\"addInstrumentInput\" name=\"addInstrumentInput\" value=\"Add an instrument\"></input></form>");
							$(".instrument.new #addInstrumentInput").focus();
							$(".instrument.new #addInstrumentInput").live("blur" , function() {
								if ($(this).attr("value") === "Add an instrument") {
									$(".instrument.new #add").html("Add an instrument");
								}
							});
							$("form#addInstrument").submit(function() {
								$.ajax({	
					          		type: "GET",
					          		url: "/api/setInstrument.php",
					          		data: "id=" + currentUser.id +
					          			"&name=" + $("input#addInstrumentInput").val(),
				          			dataType: "json",
				          			success: function(data) {
				          				profileUser.instrument[profileUser.instrument.length] = $("input#addInstrumentInput").val();
				          				$.ajax({
											type: "GET",
											url: "http://developer.echonest.com/api/v4/artist/images",
											data: "api_key=LKUB0RKYGDIVF956W" + 
												"&name=" + profileUser.instrument[profileUser.instrument.length - 1] +
												"&format=json" +
												"&results=1",
											dataType: "json",
											async: false,
											success: function(data) {
						          				$(".instrument.new").html("<div class=\"innerImage\"><img src=\"" + data.response.images[0].url +"\" /></div>" + profileUser.instrument[profileUser.instrument.length - 1] + "</div>");
						          				$(".instrument.new").removeClass("new");
						          				$("#instrument").append("<div class=\"instrument new\" id=\"" + profileUser.instrument.length + "\"><div class=\"innerImage\"><a href=\"#\">+</a></div><div id=\"add\">Add an instrument</div></div>");
						          			}
						          		});	
  									}
  								});
  								return false;
							});
						});
					}
				});
			});
		</script>
		<div class="wrapper">
			<div class="actions">
				Friend<br>
				Message<br>
				Print
			</div><!--/.actions-->
			<img class="profile" src="/images/profile-default.png" />
			<h1><span class="profileName"></span> <span class="location"></span></h1>
			<span class="small"><h6>Genres:</h6> <span class="grey" id="genres"></span></span>
			<hr />
			<span class="small"><h6>Instruments:</h6> <span class="grey" id="instruments"></span></span>
			<hr />
			<span class="small"><h6>Looking for a band</h6></span>
			<div class="clear"></div>
			<div class="block-third">
				<h2>Projects</h2>
				<div class="project">
					<div class="text">
						<h4><a href="/project.php">Coolest Band Like Ever</a></h4>
						<div class="small grey">post-rock</div>
						<div><span class="small members">4 members</span></div>
					</div><!--/.text-->
				</div><!--/.project-->
				<div class="project">
					<div class="text">
						<h4>Worst Band I Was Ever In</h4>
						<div class="small grey">country</div>
						<div><span class="small members">2 members</span></div>
					</div><!--/.text-->
				</div><!--/.project-->
				<div class="project">
					<div class="text">
						<h4>Somewhat Alright Solo Project</h4>
						<div class="small grey">folk</div>
						<div><span class="small members">1 member</span></div>
					</div><!--/.text-->
				</div><!--/.project-->
			</div>
			<div class="block-third" id="influences">
				<h2>Influences</h2>
			</div>
			<div class="block-third" id="Demos">
				<h2>Demos</h2>
				<script type="text/javascript">
					$(document).live("currentUserLoaded", function() {
						if (currentUser.soundcloud) {
							SC.oEmbed("http://soundcloud.com/" + currentUser.soundcloud + "/tracks", {auto_play: false}, function(oembed){
								$("#soundcloud").html(oembed.html);
							});
						}
					});
				</script>
				<div id="soundcloud"></div>
			</div>
		</div><!--/.wrapper-->
<? require_once($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>