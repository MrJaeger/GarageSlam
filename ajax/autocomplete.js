$("#artist" ).autocomplete({
    source: function( request, response ) {
        $.ajax({
            url: "http://developer.echonest.com/api/v4/artist/suggest",
            dataType: "jsonp",
            data: {
                results: 12,
                api_key: "N6E4NIOVYMTHNDM8J",
                format:"jsonp",
                name:request.term
            },
            success: function( data ) {
                response( $.map( data.response.artists, function(item) {
                    return {
                        label: item.name,
                        value: item.name,
                        id: item.id
                    }
                }));
            }
        });
    },
    minLength: 2,
    select: function( event, ui ) {
    	$.ajax({
			type: "GET",
			url: "http://garageslam.slamwhale.com/api/influences/set.php",
			data: "id=" + id +
				"&name=" + ui.item.label,
			success: function(data) {
				//acknowledge that the update happened
			}
		});
    	$.ajax({
			type: "GET",
			url: "http://developer.echonest.com/api/v4/artist/images",
			data: "api_key=LKUB0RKYGDIVF956W" + 
				"&name=" + ui.item.label +
				"&format=json" +
				"&results=1",
			dataType: "json",
			success: function(data) {
				//up to you
				$("#influences").append("<div class=\"influence\" id=\"" + i + "\"><div class=\"innerImage\"><img src=\"" + data.response.images[0].url +"\" /></div>" + profileUser.influences[i] + "</div><!--/.influence-->");
				if (i % 3 == 0) {
					$(".influence#" + i).addClass("first");
				}
			}
		});
    },
});