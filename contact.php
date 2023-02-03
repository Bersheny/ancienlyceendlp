<html>

<head>

	<title>Anciens NDLP - Accueil</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<meta charset="utf-8">

	<style>


	</style>
</head>

<body>

	<?php
		include 'navigation.php'
	?>

<?php
            $nameErr = $emailErr = $genderErr = $commentErr = "";
            $name = $email = $gender = $comment = "";
            function test_input($data) { // Fonction empêchant les différentes injections HTML / PHP 
                $data = trim($data);
                $data = stripcslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            /*
            function test_input2($data) { // Fonction empêchant les différentes injections HTML / PHP  
                return trim(stripcslashes(htmlspecialchars($data))):
            }
            */
            
            if ($_SERVER["REQUEST_METHOD"] == "POST"){

                if (empty($_POST['name'])){
                    $nameErr = "Name is required";
                }
                else{
                    $name = test_input($_POST['name']);
                    if (!preg_match('/^[a-zA-Z \p{L}]+$/ui', $name)){
                        $nameErr = "Only letters and white space allowed";
                    }
                    print('name = '. $name) . '</br>'; 
                }

                if (empty($_POST['email'])){
                    $emailErr = "Email is required";
                }
                else{
                    $email = test_input($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      $emailErr = "Invalid email format";
                    }                  
                    print('email = '. $email) . '</br>';
                }
            
            
                if (empty($_POST['comment'])){
                    $commentErr = "comment is required";
                }
                else{
                    $comment = test_input($_POST['comment']);
                    if (!preg_match('/^[a-zA-Z \p{L}]+$/ui', $comment)){
                        $nameErr = "Only letters and white space allowed";
                    }
                    print('comment = '. $comment) . '</br>';
                }

                if (empty($_POST['gender'])){
                    $genderErr = "gender is required";
                }
                else{
                    $gender = test_input($_POST['gender']);
                    if (!preg_match('/^[a-zA-Z \p{L}]+$/ui', $gender)){
                        $nameErr = "Only letters and white space allowed";
                    }
                    print('gender = '. $gender) . '</br>';
                }
            }

        ?>
        <form action="<?php print(htmlspecialchars($_SERVER["PHP_SELF"]))?>" method='POST'>
			<div align=center>
			Nom : <span class='error' style="color: red;">*<?php print($nameErr);?></span>
			</div>
			<div class="form-group has-icon fa-envelope-o">
				<input type='text' name='name' value='<?php print($name);?>' class="form-field required email">		
			</div>
			<div align=center>
				<br>
           		E-mail: <span class='error' style="color: red;">*<?php print($emailErr);?></span><br>
			</div>
			<div class="form-group has-icon fa-user-o">
				<input type='text' name='email' value='<?php print($email);?>'class="form-field required email">
			</div>
			<br>
			
			<div align=center>
				Message : <span class='error' style="color: red;">*<?php print($commentErr);?></span><br>
				<div class="form-group has-icon fa-comment-o">
					<textarea rows='5' cols='40' name='comment' value='<?php print($comment);?>' class="form-field required"></textarea>
					<div class="form-group">
						<button type="submit" class="form-submit">Envoyer</button>
					</div>
				</div>
			</div>
        </form>

</body>

<footer>

	<div class="bottom">
		<h1 style="font-size:15px; color:white"><br></h1>
		<img src="images\logo_ndlp-removebg-preview.png" width=13%>

		<h3 style="font-size:15px; color:#CCCCCC"><br><u><b>Contact</u></b></h3>
		<h3 style="font-size:12px; color:#CCCCCC">
		Siège social : Institut Notre-Dame, 
		9 Rue Chanoine 
		Béranger, 
		BP 340, 
		50303 AVRANCHES CEDEX<br>
		Téléphone : 02 33 58 02 22</h3>
		<h1 style="font-size:35px; color:#CCCCCC">Anciens NDLP</h1>
		<p style="text-align:center"><a href="#accueil" class="to-top">Revenir en haut de la page</a></p>
		<h1 style="font-size:15px; color:white"><br></h1>
	</div>
	
</footer>

</html>