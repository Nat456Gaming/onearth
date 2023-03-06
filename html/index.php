<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Onearth</title>
        <link rel="shortcut icon" type="image/png" href="ico.png" >
		<link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script type="text/javascript" src="javascript.js"></script>
	</head>
	<body>
        <header>
            <h1>Onearth</h1>
            <button onclick="init_progress()"><span class="material-icons">settings</span></button>
        </header>
        <?php include("./pages/home.php"); ?>
    </body>
    <footer>
        <div id="progress-status">
            <p id="progress-bar-text">0%</p>
            <div id="progress-bar" style="width: 0%"></div>
        </div>
        <nav class="">
                <button onclick="init_progress(10)"><span class="material-icons">home</span></button>
                <button onclick="init_progress(50)"><span class="material-icons">search</span></button>
                <button onclick="init_progress(5)"><span class="material-icons">perm_identity</span></button>
        </nav>
    </footer>
</html>
