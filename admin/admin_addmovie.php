<?php
	require_once('phpscripts/config.php');

	$tbl = "tbl_genre";
	$genQuery = getAll($tbl);

	if(isset($_POST['submit'])){
		$cover = $_FILES['cover'];
		$title = $_POST['title'];
		$year = $_POST['year'];
		$run = $_POST['run'];
		$story = $_POST['story'];
		$trailer = $_POST['trailer'];
		$release = $_POST['release'];
		$genre = $_POST['genList'];
		$result = addMovie($cover, $title, $year, $run, $story, $trailer, $release, $genre);
		$message = $result;
	}
?>
<!doctype html>
<html class="no-js">
  <head>
    <meta charset="UTF-8">
    <title>Add Movie</title>
    <!-- Font & Icons -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="grid-x grid-margin-x">
      <div class="cell medium-4 large-offset-4" style="margin-top: 10%;">
        <div class="card" style="width: auto;">
          <div class="card-divider">
            <h4>Add Movie</h4>
            <a href="phpscripts/caller.php?caller_id=logout" class="button hollow float-right">Sign Out</a>
          </div>
          <div class="card-section">
			<form action="admin_addmovie.php" method="post" enctype="multipart/form-data">
				<div class="grid-container">
					<div class="grid-x grid-padding-x">
						<div class="medium-6 cell">
							<label>Cover Image
								<div class="input-group">
									<span class="input-group-label"><i style="color:white" class="fa fa-file"></i></span>
									<input class="input-group-field" id"coverField" type="file" name="cover" value="">
								</div>
							</label>
						</div>
						<div class="medium-6 cell">
							<label>Movie Title
								<div class="input-group">
									<span class="input-group-label"><i style="color:white" class="fa fa-title"></i></span>
									<input class="input-group-field" id"titleField" type="text" name="title" value="">
								</div>
							</label>
						</div>
						<div class="medium-6 cell">
							<label>Movie Year
								<div class="input-group">
									<span class="input-group-label"><i style="color:white" class="fa fa-calendar"></i></span>
									<input class="input-group-field" id"yearField" type="text" name="year" value="">
								</div>
							</label>
						</div>
						<div class="medium-6 cell">
							<label>Movie Runtime
								<div class="input-group">
									<span class="input-group-label"><i style="color:white" class="fa fa-clock"></i></span>
									<input class="input-group-field" id"runField" type="text" name="run" value="">
								</div>
							</label>
						</div>
						<div class="medium-6 cell">
							<label>Movie Storyline
								<div class="input-group">
									<span class="input-group-label"><i style="color:white" class="fa fa-book"></i></span>
									<input class="input-group-field" id"storyField" type="text" name="story" value="">
								</div>
							</label>
						</div>
						<div class="medium-6 cell">
							<label>Movie Trailer
								<div class="input-group">
									<span class="input-group-label"><i style="color:white" class="fa fa-video"></i></span>
									<input class="input-group-field" id"trailerField" type="text" name="trailer" value="">
								</div>
							</label>
						</div>
						<div class="medium-6 cell">
							<label>Movie Release
								<div class="input-group">
									<span class="input-group-label"><i style="color:white" class="fa fa-calendar"></i></span>
									<input class="input-group-field" id"releaseField" type="text" name="release" value="">
								</div>
							</label>
						</div>
						<div class="medium-6 cell">
							<label>Movie Genre
								<select name="genList">
									<option>Please select a movie genre...</option>
									<?php
										while($row = mysqli_fetch_array($genQuery)){
										echo "<option value=\"{$row['genre_id']}\">{$row['genre_name']}</option>";
										}
									?>
								</select>
							</label>
						</div>
						<div class="medium-6 cell">
							<a href="admin_index.php" class="button large">Go Back</a>
						</div>
						<div class="medium-6 cell">
							<input type="submit" class="button large float-right" name="submit" value="Add Movie">
						</div>
						<div class="medium-12 cell">
							<p class="help-text"><?php if(!empty($message)){ echo $message;} ?></p>
						</div>
					</div>
				</div>
			</form>
          </div>
        </div>
      </div>
    </div>
  </body>
  <!-- Compressed JQuery & Foundation JavaScript -->
  <script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
  <script type="text/javascript">
  function togglePassword() {
    // Reference the password input field
    var passwordField = document.getElementById("passwordField");
    // Switch between types 'text' and 'password' to toggle visibility of password
    if (passwordField.type === "password") {
      passwordField.type = "text";
    }else{
      passwordField.type = "password";
    }
  }
  </script>
</html>