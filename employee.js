	view = "";
	
	function showDatabase(){
		view = "database";
		revenue.style = "display : none";
		search.style = "display : none";
		databaseEmployees.style = "";
		addEntry.style = "display : none";
	}
		
		
	function showAllEmployees(){
		showDatabase();
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
		view = "search";
		revenue.style = "display : none";
		search.style = "";
		databaseEmployees.style = "display : none";
		addEntry.style = "display : none";
		document.getElementById("searchInput").focus();
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
		view = "revenue";
		revenue.style = "";
		search.style = "display : none";
		databaseEmployees.style = "display : none";
		addEntry.style = "display : none";
		document.getElementById("income").focus();
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
		view = "add";
		revenue.style = "display : none";
		search.style = "display : none";
		databaseEmployees.style = "display : none";
		addEntry.style = "display";
		document.getElementById("first").focus();
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
		document.getElementById("first").value= "";
		document.getElementById("last").value= "";
		document.getElementById("hours").value= "0";
		document.getElementById("hourly").value= "";
	}
	
	function deleteEmployee(item){
		if(document.getElementById("delCheck").checked || confirm("Are you sure you want to delete "+item.name+"?")){
			id = +(item.id);
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","databaseMain.php?request=delete&id="+id,false);
			xmlhttp.send();
			if (view == "database")showAllEmployees();
			if (view == "search") searchEmployee();
		}
	}
	
	function deleteHours(item){
		hours = +(item.name);
		id =  +(item.id);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","databaseMain.php?request=deleteHours&id="+id+"&hours="+hours,false);
        xmlhttp.send();
		if (view == "database")showAllEmployees();
		if (view == "search") searchEmployee();
	}
	
	function addHours(item){
		hours = +(item.name);
		id =  +(item.id);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","databaseMain.php?request=addHours&id="+id+"&hours="+hours,false);
        xmlhttp.send();
		if (view == "database") showAllEmployees();
		if (view == "search") searchEmployee();
	}
	
	function deleteHourly(item){
		hourly = +(item.name);
		id =  +(item.id);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","databaseMain.php?request=deleteHourly&id="+id+"&hourly="+hourly,false);
        xmlhttp.send();
		if (view == "database")showAllEmployees();
		if (view == "search") searchEmployee();
	}
	
	function addHourly(item){
		hourly = +(item.name);
		id =  +(item.id);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","databaseMain.php?request=addHourly&id="+id+"&hourly="+hourly,false);
        xmlhttp.send();
		if (view == "database") showAllEmployees();
		if (view == "search") searchEmployee();
	}
	
	function clearAddResponse(){
		document.getElementById("addResponse").innerHTML = "";
	}