<? require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>
		<script src="http://connect.soundcloud.com/sdk.js" type="text/JavaScript"></script>
		<script type="text/JavaScript">
			SC.initialize({
				client_id: "557ccdf7556d180c0f1d38332930af9d",
				redirect_uri: "http://example.com/callback.html",
			});
		</script>
		<div class="wrapper">
			<div class="actions">
				Friend<br>
				Message<br>
				Print
			</div><!--/.actions-->
			<img class="profile" src="/images/profile-default.png" />
			<h1>Man Johnson <span class="location">Freehold, NJ</span></h1>
			<span class="small"><h6>Genres:</h6> <span class="grey">post-rock &bull; jazz &bull; hip hop</span></span>
			<hr />
			<span class="small"><h6>Instruments:</h6> <span class="grey">guitar &bull; turntables</span></span>
			<hr />
			<span class="small"><h6>Looking for a band</h6></span>
			<div class="clear"></div>
			<div class="block">
				<h2>Projects</h2>
				<h3>Current</h3>
				<div class="project">
					<img src="/images/album-art.png" />
					<div class="text">
						<h4>Coolest Band Like Ever</h4>
						<div class="small grey">post-rock</div>
						<div><span class="small members">4 members</span></div>
					</div><!--/.text-->
				</div><!--/.project-->
				<h3>Past</h3>
				<div class="project">
					<div class="text">
						<h4>Worst Band I Was Ever In. Not even a photo.</h4>
						<div class="small grey">country</div>
						<div><span class="small members">2 members</span></div>
					</div><!--/.text-->
				</div><!--/.project-->
				<div class="project">
					<img src="/images/album-art.png" />
					<div class="text">
						<h4>Somewhat Alright Solo Project</h4>
						<div class="small grey">folk</div>
						<div><span class="small members">1 member</span></div>
					</div><!--/.text-->
				</div><!--/.project-->
			</div>
			<div class="block">
				<h2>Influences</h2>
				<div class="influence first">
					<img src="/images/album-art.png" />
					Some guys that have a really stupid long name
				</div><!--/.influence-->
				<div class="influence">
					<img src="/images/album-art.png" />
					Some guys
				</div><!--/.influence-->
				<div class="influence">
					<img src="/images/album-art.png" />
					Some guys
				</div><!--/.influence-->
				<div class="influence first">
					<img src="/images/album-art.png" />
					Some guys
				</div><!--/.influence-->
				<div class="influence">
					<img src="/images/album-art.png" />
					Some guys
				</div><!--/.influence-->
			</div>
			<div class="block">
				<h2>Demos</h2>
				<script type="text/javascript">
					SC.oEmbed("http://soundcloud.com/matas/tracks", {auto_play: false}, function(oembed){
						$("#soundcloud").html(oembed.html);
					});
				</script>
				<div id="soundcloud"></div>
			</div>
		</div><!--/.wrapper-->
<? require_once($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>