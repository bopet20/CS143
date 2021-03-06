<html>
	<body>
		<?php include("homeui.php"); ?>
		
		<div ="main">
			Search for actors/movies: <br />
			<form action="search.php" method="GET">
			Search: <input type="text" name="keywords"> <input type="submit" name="submit" value="Search">
			</form>
			<hr>
			<?php
				if($_GET["submit"]) {
					$keywords = $_GET["keywords"];
					
					// Put search keywords into an array
					$keywords_array = explode(" ", trim($keywords));
					
					// Formulate compounded like clauses if necessary for MySQL queries
					$name_like_clauses = ""; // if 0 keywords in search, display all of the names
					if (count($keywords_array) == 1)
						$name_like_clauses = "WHERE first OR last LIKE '%" . $keywords_array[0]. "%'";
					else if (count($keywords_array) == 2)
						$name_like_clauses = "WHERE (first LIKE '%". $keywords_array[0] . "%' AND last LIKE '%" . $keywords_array[1] . "%') OR 
											  (first LIKE '%". $keywords_array[1] . "%' AND last LIKE '%" . $keywords_array[0] . "%')";
					else if (count($keywords_array) >= 3)
						$name_like_clauses = "WHERE id = -1"; // if >= 3, only first and last names available to check, so fail results
					$title_like_clauses = "title LIKE '%" . $keywords . "%'";
					
					
					// Create Actor/Movie relation queries
					$actor_query = "SELECT DISTINCT *
									FROM Actor
									$name_like_clauses
									ORDER BY last, first ASC;";
			
					$movie_query = "SELECT DISTINCT *
									FROM Movie
									WHERE $title_like_clauses
									ORDER BY title ASC;";
					
					/* Debugging query 
					echo "$name_like_clauses <br>";
					echo "$actor_query <br>";
					echo "$movie_query <br>";
					*/
					
					// Connect to CS143 database
					$db_connection = mysql_connect("localhost", "cs143", "");
					mysql_select_db("CS143", $db_connection);
							
					// Run queries on database
					$actor_results = mysql_query($actor_query, $db_connection);
					$movie_results = mysql_query($movie_query, $db_connection);
					$num_actor_fields = mysql_num_fields($actor_results);
					$num_movie_fields = mysql_num_fields($movie_results);
					
					// Output actor results
					$actor_count = 0;
					echo "Searching for actors/actresses in the database: <br><br>";
					while ($actor_row = mysql_fetch_row($actor_results)) {
						$last = $actor_row[1];
						$first = $actor_row[2];
						echo "$first $last <br>";
						$actor_count++;
					}
					echo "Displayed $actor_count actors based on the search keywords. <br><br>";
					
					// Output movie results
					$movie_count = 0;
					echo "Searching for movies in the database: <br><br>";
					while ($movie_row = mysql_fetch_row($movie_results)) {
						$title = $movie_row[1];
						echo "$title <br>";
						$movie_count++;
					}
					echo "Displayed $movie_count movies based on the search keywords.";
					
					mysql_close($db_connection);				
					
				}
			?>
		</div>
		
		<?php include("footer.php");?>
	</body>
</html>