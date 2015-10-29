<html>
	<body>
		<?php include("homeui.php"); ?>
		
		<div ="main">
			Add a review about a movie: <br />
			<form action="review.php" method="GET">
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
								echo "<option value='{$field1}'>{$field1}</option>";
							}
							echo  "</select>";
							mysql_close($db_connection);
					   ?>
				<br />
				Your Name: <input type="text" name="name">
				<br />
				Rating: <select name="rating">
							<option value="1">1 Star out of 5</option>
							<option value="2">2 Stars out of 5</option>
							<option value="3">3 Stars out of 5</option>
							<option value="4">4 Stars out of 5</option>
							<option value="5">5 Stars out of 5</option>
					    </select>
				<br />
				Comments:
				<br />
				<textarea name="comment" rows="10" cols="65"></textarea>
				<br />
				<input type="submit" name="AddReviewButton" value="AddReview"><br />
			</form>
		</div>
		
		<?php include("footer.php");?>
	</body>
</html>