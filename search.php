<? require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>
<script type="text/javascript">
var filter = "instrument";
$(document).ready(function() { 
	$('#filters li button').click(function() {
		filter = $(this).attr('name');
	});
	$('#search-button').click(function() {
		var term = $('#search-box').val();
		$.ajax({
			type: "GET",
			url: "http://garageslam.slamwhale.com/api/search.php",
			data: "term=" + encodeURIComponent(term) + "&filter=" + encodeURIComponent(filter),
			async: false,
			dataType: "json",
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
				console.log(textStatus);
				console.log(jqXHR);
			},
			success: function(data) {
				console.log(data);
				for(var i = 0; i<data.length; i++) {
					$('#search-results').append("<div class='result'><h2>"+data[i].first+" "+data[i].last+"</h2></div>")
				}
			}
		});
	});
});
</script>
<div class="wrapper" id="search-left">
	<h1>Find People to Jam With</h1>
	<ul id="filters">
		<li><button name="instrument">Instrument</button></li>
		<li><button name="name">Name</button></li>
		<li><button name="location">Location</button></li>
		<li><button name="genre">Genre</button></li>
	</ul>
	<form class="inline">
		<label>Search</label>
		<input id="search-box" type="text"></input>
	</form>
	<button class="inline" id="search-button">Jam!</button>
	<div id="search-results"></div>
</div>

<? require_once($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>