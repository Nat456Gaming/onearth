<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Onearth</title>
        <link rel="shortcut icon" type="image/png" href="icon.png" >
		<link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/home.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
        <script type="text/javascript" src="javascript.js"></script>
	</head>
	<body>
        <header>
            <h1>Onearth</h1>
            <button onclick="goal_progress(2,10)"><span class="material-icons" style="color: #252525">settings</span></button>
        </header>
        <?php //load all the files/pages
            foreach (array_filter(glob('./pages/*'), 'is_file') as $file)
            {
                include('./pages/'.basename($file));
            }
        ?>
        <footer>
                <div class="progress-status">
                    <p id="global_progress-text" class="progress-bar-text">0%</p>
                    <p id="global_progress" class="progress-bar" style="width: 0%"></p>
                </div>
                <nav>
                        <button onclick="show('home')"><span class="material-icons">home</span></button>
                        <button onclick="show('search')"><span class="material-icons">search</span></button>
                        <button onclick="show('friends')"><span class="material-icons">perm_identity</span></button>
                </nav>
            </footer>
    </body>
</html>
