<?
	require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php"); 


?>
<script type="text/javascript">
var filter = "name";
$(document).ready(function() {
	$('form#search-form').submit(function () {
		var term = $('#search-box').val();
		$("#search-results").html("");
		$.ajax({
			type: "GET",
			url: "/api/search.php",
			data: "term=" + term + "&filter=" + filter,
			async: false,
			dataType: "json",
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
				console.log(textStatus);
				console.log(jqXHR);
			},
			success: function(data) {
				$('#search-results').append("<h1>Results</h1>");
				for(var i = 0; i<data.length; i++) {
					var genres = "";
					for (var j = 0; j < data[i].genres.length; j++) {
						genres += "<span class='genre' id='genre" + j + "'>" + data[i].genres[j] + "</span>";
						if (j != data[i].genres.length - 1) {
							genres += " &bull; ";
						}
					}
					var instruments = "";
					for (var j = 0; j < data[i].instruments.length; j++) {
						instruments += "<span class='instrument' id='instrument" + j + "'>" + data[i].instruments[j] + "</span>";
						if (j != data[i].instruments.length - 1) {
							instruments += " &bull; ";
						}
					}
					$('#search-results').append("<div class='result' id='result" + i + "'><img class='result' /><div class='text'><h3><a href='/profile.php?id=" + data[i].id + "'>"+data[i].first+" "+data[i].last+"</a> <span class='location'>" + data[i].location + "</span></h3><span class='small'><h6>Genres:</h6> <span class='grey'>" + genres + "</span></span><hr><span class='small'><h6>Instruments:</h6> <span class='grey'>" + instruments + "</span></span></div></div>");
					$(".result#result" + i + " img.result").attr("src", "https://graph.facebook.com/" + data[i].id + "/picture");
				}
			}
		});
		return false;
	});
	$("ul#filters li button").click(function() {
		$("button.active").removeClass("active");
		$(this).addClass("active");
		filter = $(this).attr('name');
	});
});
</script>
<div class="wrapper">
	<div class="search-center">
		<h1>Musician Search</h1>
		<br>
		<form id="search-form" class="search" action="#">
			<input id="search-box" type="text"></input>
			<input type="submit" id="search-button" value=""></input>
		</form>
		<ul id="filters">
			<li>Search by: <button name="name" class="active">Name</button></li>
			<li><button name="location">Location</button></li>
			<li><button name="instrument">Instrument</button></li>
			<li><button name="genre">Genre</button></li>
		</ul>
		<div id="search-results"></div>
	</div>
</div>

<? require_once($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>
