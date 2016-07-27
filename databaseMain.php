<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>Results</title>
   </head>
   <body>
		<?php
		 $request = $_GET['request'];
		 
		 if ($request == "show"){
         $query = "SELECT * FROM employee";
		 }
		 
		 if ($request == "search"){
         $searchInput = $_GET['q'];
         $query = "SELECT * FROM employee WHERE LastName Like '" . $searchInput ."%' OR FirstName Like '" . $searchInput ."%'";
		 }
		 
		 if ($request == "add"){
         $fName = $_GET["first"]; 
		 $lName = $_GET["last"];
		 $hours = intval($_GET["hours"]);
		 $hourly = intval($_GET["hourly"]);
		 if ($fName == "" || $lName == "") die("Name Cannot be Blank! </body></html>");
         $query = "INSERT INTO employee ( FirstName, LastName, Hours, HourlyPay ) VALUES ('".$fName."', '".$lName."', '".$hours."', '".$hourly."')";
		 }
		 
		 if ($request == "revenue"){
         $grossIncome = intval($_GET['q']);
		 $grossCost = 0;
         $query = "SELECT * FROM employee";
		 }
		 
		 if ($request == "delete"){
         $id = intval($_GET['id']);
         $query = "DELETE FROM employee WHERE id = '". $id . "'";
		 }
		 
		 if ($request == "addHours"){
         $id = intval($_GET['id']);
		 $hours = intval($_GET['hours']);
		 $hours++;
         $query = "UPDATE employee SET Hours ='". $hours ."' WHERE id = '". $id . "'";
		 }
		 
		 if ($request == "deleteHours"){
         $id = intval($_GET['id']);
		 $hours = intval($_GET['hours']);
		 $hours--;
         $query = "UPDATE employee SET Hours ='". $hours ."' WHERE id = '". $id . "'";
		 }
		 
		 if ($request == "addHourly"){
         $id = intval($_GET['id']);
		 $hourly = intval($_GET['hourly']);
		 $hourly++;
         $query = "UPDATE employee SET HourlyPay ='". $hourly ."' WHERE id = '". $id . "'";
		 }
		 
		 if ($request == "deleteHourly"){
         $id = intval($_GET['id']);
		 $hourly = intval($_GET['hourly']);
		 $hourly--;
         $query = "UPDATE employee SET HourlyPay ='". $hourly ."' WHERE id = '". $id . "'";
		 }
		 
		 		 
         // Connect to MySQL
         if ( !( $database = mysql_connect( "localhost",
            "root", "" ) ) )                      
            die( "Could not connect to database </body></html>" );
   
         // open Employee database
         if ( !mysql_select_db( "testdb", $database ) )
            die( "Could not open employees database </body></html>" );
		
         // query Employee database
		  if ( !( $result = mysql_query( $query, $database ) ) ) 
         {
            print( "<p>Could not execute query!</p>" );
            die( mysql_error() . "</body></html>" );
         }
		 if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
		
		if ($request == "show" || $request == "search" || $request == "revenue"){
			
			echo "<table border = '1'>
				<tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Hours</th>
				<th>Hourly Pay</th>";
				if ($request == "show" || $request == "search"){
					echo ("<th colspan=\"2\">Hours</th>");
					echo ("<th colspan=\"2\">Hourly Pay</th>");
					echo "<th>Delete</th>";					
				}
				if ($request == "revenue"){
					echo "<th>Salary</th>";	
				}
			echo "</tr>";
		
		
			while($row = mysql_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['FirstName'] . "</td>";
				echo "<td>" . $row['LastName'] . "</td>";
				echo "<td class = \"num\">" . $row['Hours'] . "</td>";
				echo "<td class = \"num\">" . $row['HourlyPay'] . "</td>";
				
				if ($request == "show" || $request == "search"){
					echo "<td class = \"del\">";
					echo "<input type=\"button\" id=\"".$row['id']."\" name=\"".$row['Hours']."\" value = \"-\" onClick = \"deleteHours(this)\"></input>";
					echo "</td>";
					
					echo "<td class = \"del\">";
					echo "<input type=\"button\" id=\"".$row['id']."\" name=\"".$row['Hours']."\" value = \"+\" onClick = \"addHours(this)\"></input>";
					echo "</td>";
					
					echo "<td class = \"del\">";
					echo "<input type=\"button\" id=\"".$row['id']."\" name=\"".$row['HourlyPay']."\" value = \"-\" onClick = \"deleteHourly(this)\"></input>";
					echo "</td>";
					
					echo "<td class = \"del\">";
					echo "<input type=\"button\" id=\"".$row['id']."\" name=\"".$row['HourlyPay']."\" value = \"+\" onClick = \"addHourly(this)\"></input>";
					echo "</td>";
					
					echo "<td class = \"del\">";
					echo "<input type=\"button\" id=\"".$row['id']."\" name=\"".$row['FirstName']."\" value = \"Delete\" onClick = \"deleteEmployee(this)\"></input>";
					echo "</td>";
				}
				
				if ($request == "revenue"){
					echo "<td class = \"num\">" . ($row['Hours']* $row['HourlyPay']) . "</td>";
					$grossCost += ($row['Hours']* $row['HourlyPay']) ;
				}
				
				echo "</tr>";
			}

			if ($request == "revenue"){
				echo ("<tr>");
				echo ("<td colspan=\"2\"><strong>Total Cost</strong></td>");
				echo ("<td colspan=\"3\">".$grossCost."</td>");
				echo ("</tr>");
			}
		
			echo "</table>";
		
			if ($request == "revenue"){
				echo ("<p>Gross Profit: ");
				echo ($grossIncome-$grossCost);
				echo ("</p>");
			}
		}
		if ($request == "add"){
			echo "Added Successfully";
		}
		
		mysql_close( $database );
		?>     
   </body>
</html>
