var alist;

jQuery(document).ready(function() {
	jQuery.post("https://www.cs.colostate.edu/~ct310/yr2017sp/more_assignments/project03masterlist.php", {}, function(data, status) {
		addRows(data);
		jQuery("#outp1").html(status);
	})
});

function addRows(lst) {
	var rt = "";
	var tab = document.getElementById('fedr');
	var i = tab.rows.length;
	var len = lst.length;
	for (j = len - 1; j >= 0; j--) {
		rt  = "<tr><td>";
		rt += "<a href=\"" + lst[j].baseURL + "\">" + lst[j].nameShort + "</a>";
		rt += "</td><td>";
    rt += lst[j].nameLong;
    rt += "</td><td>";
		rt += "<td bgcolor=\"Yellow\" id=\"" + lst[j].nameShort + "_status\"> not responding </td> </tr>";
		var rr = tab.insertRow(i);
		rr.innerHTML = rt;
	}
	for (j = 0; j < len; j++) {
		getStatus(lst[j].baseURL, lst[j].nameShort);
	}
}

function getStatus(n, t) {
  var siteStatus = n + "/ajax_status.php";

	jQuery.post(siteStatus, {a : n}, function(data, status) {
		target = "#" + t + "_status";
    jQuery(target).text(data.status);
    if (data.status == "open") {
      jQuery(target).css("background-color", "green");
    } else if (data.status == "closed") {
      jQuery(target).css("background-color", "red");
    }
	})
}
