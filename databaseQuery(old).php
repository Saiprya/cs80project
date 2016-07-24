<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>Search Results</title>
   </head>
   <body>
		<?php
         $searchInput = $_GET['q']; // creates variable $searchInput
         // build SELECT query
         $query1 = "SELECT * FROM employee WHERE LastName Like '" . $searchInput ."%'";
		 $query2 = "SELECT * FROM employee WHERE FirstName Like '" . $searchInput ."%'";
		
         // Connect to MySQL
         if ( !( $database = mysql_connect( "localhost",
            "root", "" ) ) )                      
            die( "Could not connect to database </body></html>" );
   
         // open Products database
         if ( !mysql_select_db( "testdb", $database ) )
            die( "Could not open employees database </body></html>" );
         // query Products database
		 
         if ( !( $result1 = mysql_query( $query1, $database ) ) ) 
         {
            print( "<p>Could not execute query!</p>" );
            die( mysql_error() . "</body></html>" );
         } // end if
		 
		 if ( !( $result2 = mysql_query( $query2, $database ) ) ) 
         {
            print( "<p>Could not execute query!</p>" );
            die( mysql_error() . "</body></html>" );
         } // end if
		
        echo"<p>Your Search for ". $searchInput . ":</p>";
		
		echo "<table border = '1'>
				<tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Hours</th>
				<th>HourlyPay</th>
				</tr>";
		while($row = mysql_fetch_assoc($result2)) {
				echo "<tr>";
				echo "<td>" . $row['FirstName'] . "</td>";
				echo "<td>" . $row['LastName'] . "</td>";
				echo "<td>" . $row['Hours'] . "</td>";
				echo "<td>" . $row['HourlyPay'] . "</td>";
				echo "</tr>";
		}
				
		while($row = mysql_fetch_assoc($result1)) {
				echo "<tr>";
				echo "<td>" . $row['FirstName'] . "</td>";
				echo "<td>" . $row['LastName'] . "</td>";
				echo "<td>" . $row['Hours'] . "</td>";
				echo "<td>" . $row['HourlyPay'] . "</td>";
				echo "</tr>";
		}
		echo "</table>";
		
		mysql_close( $database );
		?>     
   </body>
</html>
