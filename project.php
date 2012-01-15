<? require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>
		<script src="http://connect.soundcloud.com/sdk.js" type="text/JavaScript"></script>
		<script type="text/JavaScript">
			SC.initialize({
				client_id: "557ccdf7556d180c0f1d38332930af9d",
				redirect_uri: "http://example.com/callback.html",
			});
		</script>
		<div class="wrapper">
			<!--div class="actions">
				Ask to Join<br>
				Message<br>
				Print
			</div><!--/.actions-->
			<!--img class="profile" src="/images/profile-default.png" /-->
			<h1>Coolest Band Like Ever <span class="location">Freehold, NJ</span></h1>
			<span class="small"><h6>Genre:</h6> <span class="grey">post-rock </span></span>
			<hr />
			<span class="small"><h6>Members:</h6> <span class="grey"><a href="/profile.php?id=816980152">Dan Mundy</a> &bull; Some other guys</span></span>
			<div class="clear"></div>
			<div class="block-half">
				<h2>Shows</h2>
				<h3>Upcoming</h3>
				<div class="show">
					<div class="text">
						<h4>The Stone Pony</h4>
						<div class="small grey">Asbury Park, NJ &bull; 1/23 @ 8PM</div>
						<div class="small grey">$3 &bull; All ages</span></div>
					</div><!--/.text-->
				</div><!--/.show-->
				<h3>Past</h3>
				<div class="show">
					<div class="text">
						<h4>Trinity and the Pope</h4>
						<div class="small grey">Asbury Park, NJ</div>
						<div class="small grey">Free &bull; 21+</div>
					</div><!--/.text-->
				</div><!--/.show-->
				<div class="show">
					<div class="text">
						<h4>Langosta Lounge</h4>
						<div class="small grey">Asbury Park, NJ</div>
						<div class="small grey">Free &bull; 21+</span></div>
					</div><!--/.text-->
				</div><!--/.show-->
			</div>
			<div class="block-half">
				<h2>Demos</h2>
				<script type="text/javascript">
					SC.oEmbed("http://soundcloud.com/matas/tracks", {auto_play: false}, function(oembed){
						$("#soundcloud").html(oembed.html);
					});
				</script>
				<div id="soundcloud"></div>
			</div>
			<div class="block-half clear">
				<h2>Biography</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras placerat volutpat blandit. Suspendisse ac odio a mi rhoncus hendrerit. Cras non placerat libero. Praesent sodales, elit vitae tristique vestibulum, magna ante laoreet dui, sed congue dui urna quis nibh. Ut mollis neque et nunc varius vitae elementum odio fermentum. Phasellus a mi urna. Curabitur rhoncus bibendum dictum. Fusce quis augue neque. Morbi pharetra ligula eget ipsum viverra vel gravida risus rutrum. Integer id augue nec orci dictum mollis. Quisque neque ante, suscipit ac molestie et, posuere congue neque.</p>

				<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla pretium consectetur dui. Proin enim ante, congue vel egestas ut, elementum sit amet nibh. Ut tristique aliquet mi sit amet interdum. Nam ligula nisi, ornare elementum feugiat a, ornare condimentum odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed gravida facilisis imperdiet. Etiam turpis risus, faucibus sed porttitor sed, blandit ac nulla. Praesent blandit rhoncus orci, eget fringilla purus faucibus sed. Pellentesque vel viverra massa. Duis a nulla turpis, venenatis malesuada dui. Pellentesque pretium tellus ac nisl luctus non aliquam est commodo. Proin lobortis nisl ut ante egestas a mattis neque convallis.</p>
			</div>
			<div class="block-half">
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
				<div class="influence">
					<img src="/images/album-art.png" />
					Some guys
				</div><!--/.influence-->
				<div class="influence first">
					<img src="/images/album-art.png" />
					Some guys
				</div><!--/.influence-->
			</div>
		</div><!--/.wrapper-->
<? require_once($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>