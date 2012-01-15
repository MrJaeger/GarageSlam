<? require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>
<script type="text/javascript">
var filter = "instrument";
$(document).ready(function() { 
	$('#filters li button').click(function() {
		filter = $(this).attr('name');
	});
	$('#search-form').submit(function () {
		$('#search-button').click();
		return false;
	});
	$('#search-button').click(function() {
		$('#search-results').html("");
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
					person = JSON.parse(data[i]);
					$('#search-results').append("<div class='result'><h2>"+person.first+" "+person.last+"</h2></div>")
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
	<form id="search-form" class="inline">
		<label>Search</label>
		<input id="search-box" type="text"></input>
	</form>
	<button class="inline" id="search-button">Jam!</button>
	<div id="search-results"></div>
</div>

<? require_once($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>
