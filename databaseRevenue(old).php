<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>Search Results</title>
   </head>
   <body>
		<?php
         $grossIncome = intval($_GET['q']); // creates variable $searchInput
		 echo ($grossIncome);
		 $grossCost = 0;
         // build SELECT query
         $query = "SELECT * FROM employee";

         // Connect to MySQL
         if ( !( $database = mysql_connect( "localhost",
            "root", "" ) ) )                      
            die( "Could not connect to database </body></html>" );
   
         // open Products database
         if ( !mysql_select_db( "testdb", $database ) )
            die( "Could not open employees database </body></html>" );
         // query Products database
		 
         if ( !( $result = mysql_query( $query, $database ) ) ) 
         {
            print( "<p>Could not execute query!</p>" );
            die( mysql_error() . "</body></html>" );
         } // end if
		
   
		echo "<table border = '1'>
				<tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Hours</th>
				<th>HourlyPay</th>
				</tr>";
		
		
		while($row = mysql_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['FirstName'] . "</td>";
				echo "<td>" . $row['LastName'] . "</td>";
				echo "<td>" . $row['Hours'] . "</td>";
				echo "<td>" . $row['HourlyPay'] . "</td>";
				$grossCost += ($row['Hours']* $row['HourlyPay']) ;
				echo "</tr>";
		}
		
		echo ("<tr>");
		echo ("<td colspan=\"2\"><strong>Total Cost</strong></td>");
		echo ("<td colspan=\"2\">".$grossCost."</td>");
		echo ("</tr>");
		
		echo "</table>";
		
		echo ("<p>Gross Profit:");
		echo ($grossIncome-$grossCost);
		echo ("</p>");
		
		mysql_close( $database );
		?>     
   </body>
</html>
