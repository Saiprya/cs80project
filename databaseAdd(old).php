<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>Search Results</title>
   </head>
   <body>
		<?php
		 $fName = $lName = "";
		 $hours = $hourly = 0;
         $fName = $_GET["first"]; 
		 $lName = $_GET["last"];
		 $hours = intval($_GET["hours"]);
		 $hourly = intval($_GET["hourly"]);

         // build SELECT query
		 if ($fName == "" || $lName == "") die("Name Left Empty! </body></html>");
		 
         $query = "INSERT INTO employee ( FirstName, LastName, Hours, HourlyPay ) VALUES ('".$fName."', '".$lName."', '".$hours."', '".$hourly."')";

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
		
		mysql_close( $database );
		
		echo "Added Successfully";
		?>     
   </body>
</html>
