<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$find['file'].'.php')) { include("./logicals/{$find['file']}.php"); } ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $pagetitle['title'] . ( (isset($pagetitle['motto'])) ? ('|' . $pagetitle['motto']) : '' ) ?></title>
	<link rel="stylesheet" href="./styles/style.css" type="text/css">
	<?php if(file_exists('./styles/'.$find['file'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $find['file']?>.css" type="text/css"><?php } ?>
</head>
<body>
	<header>
	<img src="./images/<?=$header['imagesource']?>" alt="<?=$header['imagealt']?>" width, height="<?=$header['imgsize']?>">
		<h1><?= $header['title'] ?></h1>
		<?php if (isset($header['motto'])) { ?><h2><?= $header['motto'] ?></h2><?php } ?>
		<?php if(isset($_SESSION['user'])) { ?>Logged in: <strong><?= $_SESSION['user']." &nbsp ".$_SESSION['fn']." ".$_SESSION['ln']." "?></strong><?php } ?>
	</header>
    <div id="wrapper">
        <aside id="nav">
            <nav class="target" class="wrapper">
				<ul>
					<?php foreach ($pages as $url => $page) { ?>
						<?php if(! isset($_SESSION['user']) && $page['menun'][0] || isset($_SESSION['user']) && $page['menun'][1]) { ?>
							<li<?= (($page == $find) ? ' class="active"' : '') ?>>
							<a href="<?= ($url == '/') ? '.' : ('?page=' . $url) ?>">
							<?= $page['text'] ?></a>
							</li>
						<?php } ?>
					<?php } ?>
				</ul>
            </nav>
        </aside>
        <div id="content">
            <?php include("./templates/pages/{$find['file']}.tpl.php"); ?>
        </div>
    </div>
    <footer>
        <?php if(isset($footer['copyright'])) { ?>&copy;&nbsp;<?= $footer['copyright'] ?> <?php } ?>
		&nbsp;
        <?php if(isset($footer['firm'])) { ?><?= $footer['firm']; ?><?php } ?>
    </footer>
</body>
</html>
