<?php
    // Application logic:
    include('./config.inc.php');
    $messages = array();   

    // Form checkings:
    if (isset($_POST['send'])) {
        //print_r($_FILES);
        foreach($_FILES as $file) {
            if ($file['error'] == 4);   // There was no file uploaded
            elseif (!in_array($file['type'], $MEDIATYPES))
                $messages[] = " The type is not correct: " . $file['name'];
            elseif ($file['error'] == 1   // The file size exceeds the limit allowed in php.ini
                        or $file['error'] == 2   // The file size exceeds the limit allowed in HTML Form
                        or $file['size'] > $MAXSIZE) 
                $messages[] = " Too big file: " . $file['name'];
            else {
                $target_dir = $FOLDER.strtolower($file['name']);
                if (file_exists($target_dir))
                    $messages[] = '<img src="./images/' . $file['name'] . '">';
                else {
                    move_uploaded_file($file['tmp_name'], $target_dir);
                    $messages[] = ' Ok: ' . $file['name'];
                }
            }
        }        
    }
    // Visualization logic:
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Images</title>
    <style type="text/css">
        label { display: block; }
        <style type="text/css">
        div#gallery {margin: 0 auto; width: 620px;}
        div.image { display: inline-block; }
        div.image img { width: 200px; }
    </style>
    </style>
</head>
<body>
    <h1>Uploading:</h1>
<?php
    if (!empty($messages))
    {
        echo '<ul>';
        foreach($messages as $m)
            echo "<li>$m</li>";
        echo '</ul>';
    }
?>
<?php
    $images = array();
    $reader = opendir($FOLDER);
    while (($file = readdir($reader)) !== false) {
        if (is_file($FOLDER.$file)) {
            $end = strtolower(substr($file, strlen($file)-4));
            if (in_array($end, $TYPES)) {
                $images[$file] = filemtime($FOLDER.$file);
            }
        }
    }
    closedir($reader);
?>

<div id="gallery">
<?php
    arsort($images);
    foreach($images as $file => $date)
    {
    ?>
        <div class="image">
            <a href="<?php echo $FOLDER.$file ?>">
                <img src="<?php echo $FOLDER.$file ?>">
            </a>            
            <p>Name:  <?php echo $file; ?></p>
            <p>Date:  <?php echo date($DATEFORMAT, $date); ?></p>
        </div>
    <?php
    }
    ?>
    <form action="?page=images" method="post"
                enctype="multipart/form-data">
        <label>File:
            <input type="file" name="first" required>
        </label>
        <input type="submit" name="send">
      </form>
</div>
    

</body>
</html>
