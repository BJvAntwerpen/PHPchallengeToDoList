var filterModule = (function() {
	var url, input, newUrl;
	var inputFilter = document.getElementById('inputFilter');
	var btnFilter = document.getElementById('btnFilter');
	
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
		}
		if (input != '' && !newUrl.includes('filter')) {
				if (!newUrl.includes('?')) {
					newUrl += '?';
				} else {
					newUrl += '&';
				}
				newUrl += 'filter=' + input;
			}
		location.href = newUrl;
	};

	btnFilter.addEventListener('click', updateUrlFilter);

	///////////////////////////////////////////////////////////////////////////
	//confirmation on delete all

	var deleteAll = document.getElementById('clearAll');

	var confirmDeleteAll = function() {
		if (confirm('Are you sure you want to delete all tasks?')) {
			url = location.href;
			url = url.split('/');
			newUrl = 'http://';
			url.shift();
			url.shift();
			var loc = url[url.length - 1].search(/\W/);
			if (loc != -1) {
				url[url.length - 1] = url[url.length - 1].slice(0,loc);
			}
			for (var i = 0; i < url.length; i++) {
				if (url[i].includes('index')) {
					newUrl += 'deleteAll';
				} else {
					newUrl += url[i];
				}
				if (i < 4) {

					newUrl += '/';
				}
			}
			console.log(url, newUrl);
			location.href = newUrl;
		}
	};

	deleteAll.addEventListener('click', confirmDeleteAll);
})();//console.log()