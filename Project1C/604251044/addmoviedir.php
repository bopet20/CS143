<html>
	<body>
		<?php include("homeui.php"); ?>
		
		<div ="main">
			Update a director's filmography: <br />
			<form action="addmoviedir.php" method="GET">
				Movie: 
					 <?php
							// Establish connection and choose CS143 database
							$movie = "SELECT title FROM Movie ORDER BY title ASC;";
							$db_connection = mysql_connect("localhost", "cs143", "");
							mysql_select_db("CS143", $db_connection);
							
							// Run query on database and keep track of number of fields
							$results = mysql_query($movie, $db_connection);
							
							// Put results into each option select
							echo "<select name='movies'>";
							while($row = mysql_fetch_row($results)) {
								$field1 = $row[0];
								$field2 = $row[1];
								echo "<option value='{$field1}'>{$field1}</option>";
							}
							echo  "</select>";
							mysql_close($db_connection);
					 ?>
				<br />
				Director: 
					 <?php
							// Establish connection and choose CS143 database
							$director = "SELECT CONCAT(first, ' ', last) AS DirectorName FROM Director ORDER BY DirectorName ASC;";
							$db_connection = mysql_connect("localhost", "cs143", "");
							mysql_select_db("CS143", $db_connection);
							
							// Run query on database and keep track of number of fields
							$results = mysql_query($director, $db_connection);
							
							// Put results into each option select
							echo "<select name='directors'>";
							while($row = mysql_fetch_row($results)) {
								$field1 = $row[0];
								echo "<option value='{$field1}'>{$field1}</option>";
							}
							echo  "</select>";
							mysql_close($db_connection);
					 ?>
				<br />
				<input type="submit" name="AddMovieDirButton" value="AddMovieDir"><br />
			</form>
		</div>
		
		<?php include("footer.php");?>
	</body>
</html>