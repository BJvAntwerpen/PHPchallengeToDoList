var filterModule = (function() {
	var url, input, newUrl;
	var inputFilter = document.getElementById('inputFilter');
	var btnFilter = document.getElementById('btnFilter');
	var btnClear = document.getElementById('btnClear');
	
	var getValues = function() {
		input = inputFilter.value;
		url = location.href;
	};

	var splitUrl = function() {
		getValues();
		url = url.split('?');
		if (url[1] != undefined) {
			url[1] = url[1].split('&');
		}
	};

	var updateUrlFilter = function() {
		splitUrl();
		newUrl = url[0]
		if (url[1] != undefined) {
			if (!newUrl.includes('sort')) {
				for (var i = 0; i < url[1].length; i++) {
					if (url[1][i].includes('sort')) {
						if (!newUrl.includes('?')) {
							newUrl += '?';
						} else {
							newUrl += '&';
						}				
						newUrl += url[1][i];
					}
				}
			}
			if (input != '' && !newUrl.includes('filter')) {
				if (!newUrl.includes('?')) {
					newUrl += '?';
				} else {
					newUrl += '&';
				}
				newUrl += 'filter=' + input;
			}
		}
		location.href = newUrl;
	};

	var clearFilter = function() {
		splitUrl();
		newUrl = url[0];
		if (url[1] != undefined) {
			//if (url[1])
		}
		/*
		url1 + '?' + url[sort]



















		

		var locate1 = url.search('filter');
		var locate2 = url.search('&');
		if (locate1 > locate2) {
			console.log(locate1, locate2);
			newUrl = url.slice(0, locate2);
		}




		*/
		console.log(newUrl);
		//location.href = newUrl;
	};

	btnFilter.addEventListener('click',updateUrlFilter);
	btnClear.addEventListener('click',clearFilter);
})();//console.log()