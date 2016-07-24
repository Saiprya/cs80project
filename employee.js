	function showDatabase(){
		revenue.style = "display : none";
		search.style = "display : none";
		databaseEmployees.style = "";
		addEntry.style = "display : none";
		comment.style = "display : none";
		showAllEmployees();
	}
		
		
	function showAllEmployees(){
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("Database").innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET","databaseMain.php?request=show",true);
        xmlhttp.send();
	}
	
	function showSearchForm(){
		revenue.style = "display : none";
		search.style = "";
		databaseEmployees.style = "display : none";
		addEntry.style = "display : none";
		
	}
	
	function searchEmployee(){
		var str = document.getElementById("searchInput").value;
		if (str == "") {
			document.getElementById("Names").innerHTML = "";
			return;
		} else {
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("Names").innerHTML = xmlhttp.responseText;
					}
				};
		}
		xmlhttp.open("GET","databaseMain.php?request=search&q="+str,true);
        xmlhttp.send();
	}
	
	
	
	function showRevenueForm(){
		revenue.style = "";
		search.style = "display : none";
		databaseEmployees.style = "display : none";
		addEntry.style = "display : none";
	}
	
	function calcRevenue(){
		rev = (+income.value) - (+costs.value);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("calculatedRevenue").innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET","databaseMain.php?request=revenue&q="+rev,true);
        xmlhttp.send();
	}
	
	function showAddEmployeeForm(){
		revenue.style = "display : none";
		search.style = "display : none";
		databaseEmployees.style = "display : none";
		addEntry.style = "display";
	}
	
	function addEmployee(){
		data = 	 'first=' + document.getElementById("first").value +
				 '&last=' + document.getElementById("last").value +
				 '&hours=' + document.getElementById("hours").value +
				 '&hourly=' + document.getElementById("hourly").value; 
	
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("addResponse").innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET","databaseMain.php?request=add&"+data,true);
        xmlhttp.send();
	}
	
	function deleteEmployee(num){
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","databaseMain.php?request=delete&id="+num,true);
        xmlhttp.send();
		document.getElementById("comment").innerHTML = "Deleted Successfully!";
		showAllEmployees();
	}