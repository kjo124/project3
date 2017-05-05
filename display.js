var alist;

jQuery(document).ready(function() {
	jQuery.post("https://www.cs.colostate.edu/~ct310/yr2017sp/more_assignments/project03masterlist.php", {}, function(data, status) {
		var ingEl = document.getElementById('ing');
		var siteEl = document.getElementById('site');

		// get the ingredient and site short
		var ingredient = jQuery("#ing").text();
		var siteShort = jQuery("#site").text();

		var masterListLen = data.length;

		// for each entry in master list
		for (i = masterListLen - 1; i >= 0; i--) {
			if (siteShort == data[i].nameShort) {
				// Some pages work with this, some others do not:
				/*
				var ingredientSite = data[i].baseURL + "ajax_ingredient.php?ing=" + "\"" + ingredient + "\"";
				var imageSite = data[i].baseURL + "ajax_ingrimage.php?ing=" + "\"" + ingredient + "\"";
				*/

				// ingredientSite where the ingredient details are kept
				// This seems to be how most sites are doing their ajax's
				var ingredientSite = data[i].baseURL + "ajax_ingredient.php?ing=" + ingredient;
				// imageSite where the ingredient image is kept
				var imageSite = data[i].baseURL + "ajax_ingrimage.php?ing=" + ingredient;

				displayDes(ingredient, ingredientSite);
				loadImage(ingredient, imageSite);
			}
		}
		jQuery("#outp1").html(status);
	})
});

function displayDes(ingredient, ingredientSite) {
	jQuery.post(ingredientSite, {}, function(ingredientSiteData, ingredientSiteStatus) {
			var rt = "";
			var des = document.getElementById('description');
			rt += ingredientSiteData.desc;
			rt += "<br>";
			rt += "$" + ingredientSiteData.cost + " / " + ingredientSiteData.unit;
			rt += "<br>";
			rt += "Arrives in: " + ingredientSiteData.time;
			var rr = des;
			rr.innerHTML = rt;
	});
}

function loadImage(ingredient, imageSite) {
	jQuery.post(imageSite, {}, function(imageSiteData, imageSiteStatus) {
			var encoding_string = "data:image/png;base64,";
			var img;
			var image_element = document.getElementById("image");

			image_element.src = encoding_string + imageSiteData;
	});
}
