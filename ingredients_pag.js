var boolSite;

jQuery(document).ready(function() {
	jQuery.post("https://www.cs.colostate.edu/~ct310/yr2017sp/more_assignments/project03masterlist.php", {}, function(data, status) {

		var masterListLen = data.length;

		// for each entry in master list
		for (i = masterListLen - 1; i >= 0; i--) {
			// siteStatus is the masterlist ajax_status.php
			var siteStatus = data[i].baseURL + "/ajax_status.php";
			// siteListing where the ingredient are
			var siteListing = data[i].baseURL + "/ajax_listing.php";
			// baseURL and shortName used for helping identify the site used and
			// constructing the table
			var baseURL = data[i].baseURL;
			var shortName = data[i].nameShort;

			// cannot make too many jQuery.post() calls or the thing mucks up so pass
			// it to a function to handle separate jQuery.post()'s
			handle(siteStatus, siteListing, baseURL, shortName );
			}
		jQuery("#outp1").html(status);
	})
});

function addRows(lst, nameShort) {
	var rt = "";
	var tab = document.getElementById('ings');
	var i = tab.rows.length;
	var len = lst.length;
  var page = "ingredients_display.php?site=";
  var ing = "&ing=";
	for (j = len - 1; j >= 0; j--) {
		// page add makes url = ROOT/ingredients_display.php?site=(nameShort)&ing=(ingredient)
		var pageAdd = page + nameShort + ing + lst[j].name;
		// start row
    rt  = "<tr><td>";
		// URL
		rt += "<a href=\"" + pageAdd + "\">" + lst[j].name + "</a>";
		rt += "</td><td>";
		// short description
    rt += lst[j].short;
    rt += "</td><td>";
		// $(cost) / (unit)
		rt += "$" + lst[j].cost + " / " + lst[j].unit;
  	rt += "</td></tr>";
  	var rr = tab.insertRow(i);
  	rr.innerHTML = rt;
  }
}

function handle(siteStatus, siteListing, baseURL, shortName ){
	// open /ajax_status.php
	jQuery.post(siteStatus, {a : baseURL}, function(statusData, statusStatus) {
		// check if the status is "open"
		if (statusData.status == "open") {
			// open that sites listing at /ajax_listing.php
			jQuery.post(siteListing, {}, function(listing, siteListingStatus) {
				// addRows for each ingredient listed, need nameShort for URL
				addRows(listing, shortName);
			});
		}
	});
}
