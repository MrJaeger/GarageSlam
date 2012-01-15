<? require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>
		<? 
			
		?>
		<script type="text/javascript" src="/include/easySlider1.7.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){	
				$("#slider").easySlider({
					auto: true,
					continuous: true,
					controlsShow: false,
					pause: 5000
				});
			});
			$(document).bind("currentUserLoaded", function() {
				window.location = "/profile.php?id=" + currentUser.id;
			});
		</script>
		<div class="wrapper">
			<div id="slider">
				<ul>
					<li style="background: url('/images/landing/guitar.png');">via <a href="http://www.flickr.com/photos/eioua/4961350049/in/photostream/">flickr</a></li>
					<li style="background: url('/images/landing/mic.png');">via <a href="http://www.flickr.com/photos/ernestduffoo/5741454316/in/photostream/">flickr</a></li>
					<li style="background: url('/images/landing/mpc.png');">via <a href="http://www.flickr.com/photos/oceann/5513395919/in/photostream/">flickr</a></li>
					<li style="background: url('/images/landing/drums.png');">via <a href="http://www.flickr.com/photos/ed_welker/4258097293/in/photostream/">flickr</a></li>
				</ul>
			</div><!--/#slider-->
			<div class="block-third">
				<h2 style="display: inline;">Find</h2> <img class="landing" src="/images/search.png" />
				<p>Locate musicians near you. Tell GarageSlam where you live or where you go to school, and we'll find musicians looking to collaborate right in your area. Based on what kinds of collaborations you're looking for, we'll find the perfect match.</p>
			</div><!--/.block-third-->
			<div class="block-third">
				<h2 style="display: inline;">Share</h2> <img class="landing" src="/images/speaker.png" />
				<p>With GarageSlam, you can create a sleek, professional profile in just a few clicks. Tell everyone what kind of music you play, who your influences are, and what projects you've been involved in. Connect to <a href="http://www.soundcloud.com/">SoundCloud</a> and showcase your demos.</p>
			</div><!--/.block-third-->
			<div class="block-third">
				<h2 style="display: inline;">Connect</h2> <img class="landing" src="/images/collab.png" />
				<p>Once you find the perfect arrangement, GarageSlam makes it easy to get in touch. Send messages and become friends, and in no time you'll be practicing for your next show.</p>
			</div><!--/.block-third-->
		</div>
<? require_once($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>