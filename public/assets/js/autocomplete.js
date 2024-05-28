
var input = document.getElementById('address');
var prefix = '';

var options = {
	componentRestrictions: {
		country: 'ID'
	}
};
var autocomplete = new google.maps.places.Autocomplete(input,options);
