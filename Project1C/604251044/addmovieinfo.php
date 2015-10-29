<html>
	<body>
		<?php include("homeui.php"); ?>
		
		<div ="main">
			Add new movie: <br />
			<form action="addmovieinfo.php" method="GET">
				Title: <input type="text" name="title">
				<br />
				Year: <input type="number" name="year">
				<br />
				Rating: <input type="text" name="rating">
				<br />
				Company: <input type="text" name="company">
				<br />
				Genre:
				<input type="checkbox" name="genre" value="Action">Action
				<input type="checkbox" name="genre" value="Adult">Adult
				<input type="checkbox" name="genre" value="Adventure">Adventure
				<input type="checkbox" name="genre" value="Animation">Animation
				<input type="checkbox" name="genre" value="Comedy">Comedy
				<input type="checkbox" name="genre" value="Crime">Crime
				<input type="checkbox" name="genre" value="Documentary">Documentary
				<input type="checkbox" name="genre" value="Drama">Drama
				<input type="checkbox" name="genre" value="Family">Family
				<input type="checkbox" name="genre" value="Fantasy">Fantasy
				<input type="checkbox" name="genre" value="Horror">Horror
				<input type="checkbox" name="genre" value="Musical">Musical
				<input type="checkbox" name="genre" value="Mystery">Mystery
				<input type="checkbox" name="genre" value="Romance">Romance
				<input type="checkbox" name="genre" value="Sci-Fi">Sci-Fi
				<input type="checkbox" name="genre" value="Short">Short
				<input type="checkbox" name="genre" value="Thriller">Thriller
				<input type="checkbox" name="genre" value="War">War
				<input type="checkbox" name="genre" value="Western">Western
				<br />
				<input type="submit" name="AddMovieInfoButton" value="AddMovieInfo"><br />
			</form>
		</div>
		
		<?php include("footer.php");?>
	</body>
</html>