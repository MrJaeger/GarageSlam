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
				for(var i = 0; i<data.length; i++) {
					person = data[i];
					$('#search-results').append("<div class='result'><h2>"+person.first+" "+person.last+"</h2></div>")
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
