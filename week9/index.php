<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-image: url('https://digwallpapers.com/wallpapers/full/0/e/f/36722-3840x2160-persona-3-hd-wallpaper-desktop-4k.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
	.vertical-rectangle {
      position: left;
      top: 0px;
      left: 10px;
      height: 950px;
      width: 500px;
      background-color: black;
	  opacity: 0.95;
	  position: left;
    }
	.circle-image {
	margin-top: 50px;
	border-radius: 50%;
	overflow: hidden;
	width: 200px;
	height: 200px;
	}
	.circle-image img {
	width: 100%;
	}
	.circle-image-container{
    display: flex;
    align-items: center;
    justify-content: center;
	}
	.image-caption{
    margin-top: 30px;
    text-align:center;
	color: white;
	font-family: verdana;
	font-size: 200%;
	}
	.text-inside-rectangle {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	}
	.aboutme{
	margin-top: 150px;
	text-align: left;
	color: white;
	font-family: verdana;
	font-size: 130%;
	left: 40%;
	transform: translate(5%, -40%);
	.formvalidation{
	position: left;
	}
	form {
	display: flex;
	text-alight: middle;
	position: center;
}

  </style>
</head>
<body>
 <div class='bg-image'>
		<div class="vertical-rectangle">
			<div class="circle-image-container">
				<div class="circle-image">
				<img src="rjavier.jpg" alt="Circular Image">
				</div>
			</div>
			  <p class="image-caption">Jude Romulo Javier</p>
			<div class="aboutme">
				<p>Age: 22<br></p>
				<p>School: Asia Pacific College<br></p>
				<p>Hobbies: Gaming, Watching, Listening to music<br></p>
				<p>Email: jcjavier@student.apc.edu.ph<br></p>
		  </div>
	</div>
<div class='form'>
	<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
</div>
</body>
</html>