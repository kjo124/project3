var boolSite;

jQuery(document).ready(function() {
	jQuery.post("https://www.cs.colostate.edu/~ct310/yr2017sp/more_assignments/project03masterlist.php", {}, function(data, status) {

		var masterListLen = data.length;
		// alert("Debug");
		// for each entry in master list
		for (i = masterListLen - 1; i >= 0; i--) {

			alert(data[i].nameShort);


			var shortName = data[i].nameShort;

			var siteStatus = data[i].baseURL + "/ajax_status.php";
			var n = data[i].baseURL;
			var siteListing = data[i].baseURL + "/ajax_listing.php";

			// put this into a separate function? /////////
			jQuery.post(siteStatus, {a : n}, function(statusData, statusStatus) {
				// check if the status is "open"
				if (statusData.status == "open") {
					// open that sites listing
					jQuery.post(siteListing, {}, function(listing, siteListingStatus) {
						// addRows for each ingredient listed, need nameShort for URL
						addRows(listing, shortName);
					});
				} else {

				}
			});
			////////////
		}
		jQuery("#outp1").html(status);
	})
});


// jQuery(document).ready(function() {
// 	jQuery.post("https://www.cs.colostate.edu/~ct310/yr2017sp/more_assignments/project03masterlist.php", {}, function(data, status) {
// 		var len = data.length;
// 		// for each entry in master list
// 		for (j = len - 1; j >= 0; j--) {
// 			//check if the status is "open"
// 			if (getStatus(lst[j].baseURL, lst[j].nameShort) == true) {
// 				var siteStatus = lst[j].baseURL + "/ajax_listing.php";
// 				// open that sites listing
// 				jQuery.post(siteStatus, {a : n}, function(siteListing, siteStatus) {
// 					// addRows for each ingredient listed, need nameShort for URL
// 					addRows(siteListing, lst[j].nameShort);
// 				}
// 			}
// 		}
// 		jQuery("#outp1").html(status);
// 	})
// });

function addRows(lst, nameShort) {
	var rt = "";
	var tab = document.getElementById('ings');
	var i = tab.rows.length;
	var len = lst.length;
  var page = "ingredients_display.php?site=";
  var ing = "&ing=";
	for (j = len - 1; j >= 0; j--) {
		var pageAdd = page + nameShort + ing + lst[j].name;
    rt  = "<tr><td>";
		rt += "<a href=\"" + pageAdd + "\">" + lst[j].name + "</a>";
		// rt += "<a href=\"" + page + nameShort + ing + lst[j].name "\">" + lst[j].name + "</a>";
		rt += "</td><td>";
    rt += lst[j].short;
    rt += "</td><td>";
		rt += lst[j].cost + " / " + lst[j].unit;
  	rt += "</td></tr>";
  	var rr = tab.insertRow(i);
  	rr.innerHTML = rt;
  }
}

function handle(data){
  boolSite = data;
}

function setBool(data){
  boolSite = data;
}

function getBool(){
  return boolSite;
}
