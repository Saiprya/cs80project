<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>Search Results</title>
   </head>
   <body>
		<?php
		 $id = 0;
         $id = intval($_GET['id']); // creates variable $searchInput
         // build SELECT query
         $query = "DELETE FROM employee WHERE id = '". $id . "'";

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
		
        $outcome = "Deleted Successfully!";
		mysql_close( $database );
		?>     
   </body>
</html>
