<html>
	<body>
		<?php include("homeui.php"); ?>
		
		<div ="main">
			Update an actor's filmography: <br />
			<form action="addmovieactor.php" method="GET">
				Movie: 
					  <?php
							// Establish connection and choose CS143 database
							$movie = "SELECT title FROM Movie ORDER BY title ASC;";
							$db_connection = mysql_connect("localhost", "cs143", "");
							mysql_select_db("CS143", $db_connection);
							
							// Run query on database
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
				Actor: 
					  <?php
							// Establish connection and choose CS143 database
							$actor = "SELECT CONCAT(first, ' ', last) AS ActorName FROM Actor ORDER BY ActorName ASC;";
							$db_connection = mysql_connect("localhost", "cs143", "");
							mysql_select_db("CS143", $db_connection);
							
							// Run query on database and keep track of number of fields
							$results = mysql_query($actor, $db_connection);
							
							// Put results into each option select
							echo "<select name='actors'>";
							while($row = mysql_fetch_row($results)) {
								$field1 = $row[0];
								echo "<option value='{$field1}'>{$field1}</option>";
							}
							echo  "</select>";
							mysql_close($db_connection);
					  ?>
				<br />
				Role: <input type="text" name="role">
				<br />
				<input type="submit" name="AddMovieActorButton" value="AddMovieActor"><br />
			</form>
		</div>
		
		<?php include("footer.php");?>
	</body>
</html>