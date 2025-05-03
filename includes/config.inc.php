<?php
$pagetitle = array(
    'title' => 'Assignment Website',
);

$header = array(
    'imagesource' => 'school.jpg',
    'imgsize'=> '70',
    'imagealt' => 'school',
	'title' => 'Assignment Website',
	'motto' => ''
);

$footer = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'firm' => 'Assignment Website'
);

$pages = array(
	'/' => array('file' => 'home', 'text' => 'Home', 'menun' => array(1,1)),
    'images' => array('file' => 'images', 'text' => 'Images', 'menun' => array(0,1)),
	'contact' => array('file' => 'contact', 'text' => 'Contact', 'menun' => array(0,1)),
    'messages' => array('file' => 'messages', 'text' => 'Messages', 'menun' => array(0,1)),
	'login' => array('file' => 'login', 'text' => 'Login', 'menun' => array(1,0)),
    'logout' => array('file' => 'logout', 'text' => 'Logout', 'menun' => array(0,1)),
	'login2' => array('file' => 'login2', 'text' => '', 'menun' => array(0,0)),
    'registration' => array('file' => 'registration', 'szoveg' => '', 'menun' => array(0,0))
);

$error_page = array ('file' => '404', 'text' => 'Page not found!');

$FOLDER = './images/';
$TYPES = array ('.jpg', '.png');
$MEDIATYPES = array('image/jpeg', 'image/png');
$DATEFORMAT = "m/d/Y H:i";
$MAXSIZE = 500*1024;
?>
