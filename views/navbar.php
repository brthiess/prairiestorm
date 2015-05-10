<?php	
	$pages = array('Bios', 'Blog', 'Gallery', 'Sponsors', 'Contact');
	if (!isset($page)) {
		$page = 'Home';
	}
?>
<div class="row">
	<nav class="navbar navbar-default nav-justified navbar-fixed-top">
	  <div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		  <a class="navbar-brand navbar-title" href="index.php"><p class="team-title">PRAIRIE</p>CHASERS<p>STORM</p>
		  </a>
		</div>
		<div class="collapse navbar-collapse" id="main-navbar">
			<ul class="nav navbar-nav pull-right">
<?php 
	for ($i = 0; $i < count($pages); $i++) {
		if ($pages[$i] == $page) {
			echo "<li class='active'><a class='active-page' href='" . strtolower($pages[$i]) . ".php'>$page<span class='sr-only'>(current)</span></a></li>";
		}
		else {
			echo "<li class='nav-button'><a href='" . strtolower($pages[$i]) . ".php'>$pages[$i]</a></li>";
		}	
	}
?>
			</ul>
		</div>
	  </div>
	</nav>
</div>

