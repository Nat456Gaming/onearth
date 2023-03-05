<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Onearth</title>
		<link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="/dist/output.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script type="text/javascript" src="javascript.js"></script>
	</head>
	<body>
        <header>
            <h1>Onearth</h1>
            <button onclick="test_progress()"><span class="material-icons">settings</span></button>
        </header>
        <h2 style="margin-top: 10px">In progress</h2>
		<div class="flex-container">
            <?php
                $i = 1;
                while ($i <= 17) {
                    if ($i<10) {
                        echo '<button onclick="test_progress()"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-0'.$i.'.jpg" class="sdg-pict" /></button>';
                    } else {
                        echo '<button onclick="test_progress()"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-'.$i.'.jpg" class="sdg-pict" /></button>';
                    }
                    $i ++ ;
                }
            ?>
		</div>
        <h2>For you</h2>
        <div class="flex-container">
            <?php
                $i = 4;
                while ($i <= 8) {
                    if ($i<10) {
                        echo '<button onclick="test_progress()"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-0'.$i.'.jpg" class="sdg-pict" /></button>';
                    } else {
                        echo '<button onclick="test_progress()"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-'.$i.'.jpg" class="sdg-pict" /></button>';
                    }
                    $i ++ ;
                }
            ?>
		</div>
        <h2>Done</h2>
        <div class="flex-container">
            <?php
                $i = 7;
                while ($i <= 9) {
                    if ($i<10) {
                        echo '<a src=""><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-0'.$i.'.jpg" class="sdg-pict" /></a>';
                    } else {
                        echo '<a src=""><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-'.$i.'.jpg" class="sdg-pict" /></a>';
                    }
                    $i ++ ;
                }
            ?>
		</div>
    </body>
    <footer>
        <div id="progress-status">
            <p id="progress-bar-text">0%</p>
            <p id="progress-bar" style="width: 0%"></p>
        </div>
        <nav class="">
                <button onclick="test_progress()"><span class="material-icons">home</span></button>
                <button onclick="test_progress()"><span class="material-icons">search</span></button>
                <button onclick="test_progress()"><span class="material-icons">perm_identity</span></button>
        </nav>
    </footer>
</html>
