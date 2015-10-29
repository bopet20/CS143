<html>
	<body>
		<?php include("homeui.php"); ?>
		
		<div ="main">
			Add new actor/director:<br />
			<form action="addactordir.php" method="GET">
				Identity: 
				<input type="radio" name="actordir" value="Actor">Actor
				<input type="radio" name="actordir" value="Director">Director
				<br />
				First Name: <input type="text" name="first">
				<br />
				Last Name: <input type="text" name="last">
				<br />
				Sex:
				<input type="radio" name="gender" value="Male">Male
				<input type="radio" name="gender" value="Female">Female
				<br />
				Date of Birth: <input type="text" name="dob"> (YYYY-MM-DD)
				<br />
				Date of Death: <input type="text" name="dod"> (YYYY-MM-DD, leave blank if still alive)
				<br />
				<input type="submit" name="AddActorDirButton" value="AddActorDir"><br />
			</form>
		</div>
		
		<?php include("footer.php");?>
	</body>
</html>