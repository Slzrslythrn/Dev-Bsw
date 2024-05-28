$(window).load(function() {
	if (navigator.geolocation) { 
		navigator.geolocation.getCurrentPosition(handle_geolocation, koneksiGagal,{timeout:30000});
	}

	function koneksiGagal(p) {
		//$('#currently').hide();
		map.setCenter({lat: -6.3944475, lng: 106.8213664});
	}
	function handle_geolocation(p) {
		map.setCenter({lat: p.coords.latitude, lng: p.coords.longitude});
	}


var marker;
  
function taruhMarker(map, posisiTitik){
    
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: map
      });
    }
  
     // isi nilai koordinat ke form
    document.getElementById("lat").value = posisiTitik.lat();
    document.getElementById("lng").value = posisiTitik.lng();
    
}
  



 // var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

 //   google.maps.event.addListener(peta, 'click', function(event) {
 //    taruhMarker(this, event.latLng);
 //  });


	var map = new google.maps.Map(document.getElementById('map'), {
      zoom:18,
      center: {lat: -6.3778485, lng: 106.8293989}
    });

    google.maps.event.addListener(map, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });

    var input = document.getElementById('pac-input');
    var prefix = '';

    var options = {
	  componentRestrictions: {
	    country: 'ID'
	  }
	};
	var autocomplete = new google.maps.places.Autocomplete(input,options);

    var trafficLayer = new google.maps.TrafficLayer();
    trafficLayer.setMap(map);


	$(input).on('input',function(){
	    var str = input.value;
	    if(str.indexOf(prefix) == 0) {
	        // string already started with prefix
	        return;
	    } else {
	        if (prefix.indexOf(str) >= 0) {
	            // string is part of prefix
	            input.value = prefix;
	        } else {
	            input.value = prefix+str;
	        }
	    }
	});
	$(input).on('focus',function() {
		if ($(this).val() == "") {
			$("#drop-suggest").show();
		} else {
			$("#drop-suggest").hide();
		}
	});
	$(input).on('focusout',function() {
		
		if ($(this).val() == "") {
			$("#drop-suggest").show();
		} else {
			$("#drop-suggest").hide();
		}
	});
	$(input).on('keyup',function() {
		
		if ($(this).val() == "") {
			$("#drop-suggest").show();
		} else {
			$("#drop-suggest").hide();
		}
	});
	$(input).on('click',function() {
		
		if ($(this).val() != "") {
			$(this).select();
		}
	});

	$(".suggest-li").click(function() {
		input.value = $(this).find(".suggest-name").html();
		input.value = input.value + ", " + $(this).find(".suggest-description").html();
		setTimeout(function() {
			$("input").focus();
			google.maps.event.trigger(autocomplete, "focus");
			google.maps.event.trigger(autocomplete, "keydown", { keyCode:13 });
			$(input).select();
		}, 10);
		$("#drop-suggest").hide();
	});

    autocomplete.addListener('place_changed', function() {
      console.log(autocomplete.getPlace().geometry.location.lat());
      console.log(autocomplete.getPlace().geometry.location.lng());

      map.setCenter({lat: autocomplete.getPlace().geometry.location.lat(), lng: autocomplete.getPlace().geometry.location.lng()});
    });
	
});
