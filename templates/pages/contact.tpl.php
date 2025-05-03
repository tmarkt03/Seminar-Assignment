<h2>Contact</h2>
<p><input type="text"><label><strong>Message</strong></label></input></p>
<p>E-mail: <strong>somebody@assignmentsite.com</strong></p>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2726.3375296155727!2d19.66695091525771!3d46.89607994478184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da7a6c479e1d%3A0xc8292b3f6dc69e7f!2sPallasz+Ath%C3%A9n%C3%A9+Egyetem+GAMF+Kar!5e0!3m2!1shu!2shu!4v1475753185783" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
<br>

<?php
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=databaselesson', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_general_ci');
		$sqlInsert = "insert into messages(msgid, userid, message, timestamp)
						  values(0, :firstname, :lastname, :username, :password)";
		$sth = $dbh->prepare($sqlSelect);
		$sth->execute(array(':usern' => $_POST['username'], ':pwd' => $_POST['password']));
		$row = $sth->fetch(PDO::FETCH_ASSOC);

		if($row) {
		  $_SESSION['fn'] = $row['first_name']; 
		  $_SESSION['ln'] = $row['last_name']; 
		  $_SESSION['user'] = $_POST['username'];
		}  
    }
    catch (PDOException $e) {
        $errormessage = "Error: ".$e->getMessage();
    }      
?>
