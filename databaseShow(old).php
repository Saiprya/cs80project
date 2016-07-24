<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>Search Results</title>
   </head>
   <body>
		<?php
        
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
         }
		 if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
		
		echo "<table border = '1'>
				<tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Hours</th>
				<th>HourlyPay</th>
				<th>Delete</th>
				</tr>";
		
		
		while($row = mysql_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['FirstName'] . "</td>";
				echo "<td>" . $row['LastName'] . "</td>";
				echo "<td>" . $row['Hours'] . "</td>";
				echo "<td>" . $row['HourlyPay'] . "</td>";
				
				echo "<td>";
				echo "<input type=\"button\" id=\"".$row['id']."\" value=\"Delete\" onClick = \"deleteEmployee(this.id)\"></input>";
				echo "</td>";
				echo "</tr>";
		}

		echo "</table>";

		mysql_close( $database );
		?>     
   </body>
</html>
