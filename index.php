<? require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>
		<? 
			$loggedIn = false;
			if ($loggedIn) {
				// redirect to some kind of feed
			}
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
		</script>
		<div class="wrapper">
			<div id="slider">
				<ul>
					<li style="background: url('/images/landing/guitar.png'); width: 900px; height: 300px; text-align: right;">via <a href="http://www.flickr.com/photos/eioua/4961350049/in/photostream/">flickr</a></li>
					<li style="background: url('/images/landing/mic.png'); width: 900px; height: 300px; text-align: right;">via <a href="http://www.flickr.com/photos/ernestduffoo/5741454316/in/photostream/">flickr</a></li>
					<li style="background: url('/images/landing/mpc.png'); width: 900px; height: 300px; text-align: right;">via <a href="http://www.flickr.com/photos/oceann/5513395919/in/photostream/">flickr</a></li>
					<li style="background: url('/images/landing/drums.png'); width: 900px; height: 300px; text-align: right;">via <a href="http://www.flickr.com/photos/ed_welker/4258097293/in/photostream/">flickr</a></li>
				</ul>
			</div><!--/#slider-->
		</div>
<? require_once($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>