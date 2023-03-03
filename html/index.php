<!DOCTYPE html>
<html>
	<head>
		<title>Onearth</title>
		<link rel="stylesheet" href="styles/style.css">
        <link href="/dist/output.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
	</head>
	<body>
        <h1 class="text-3xl font-bold underline">Hello world!</h1>
		<div class="flex-container">
            <?php
                $i = 1;
                while ($i <= 16) {
                    if ($i<10) {
                        echo '<a src=""><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-0'.$i.'.jpg" class="sdg-pict" /></a>';
                    } else {
                        echo '<a src=""><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-'.$i.'.jpg" class="sdg-pict" /></a>';
                    }
                    $i ++ ;
                }
            ?>
		</div>
        <h1>En cours</h1>
        <div class="flex-container">
            <?php
                $i = 4;
                while ($i <= 8) {
                    if ($i<10) {
                        echo '<a src=""><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-0'.$i.'.jpg" class="sdg-pict" /></a>';
                    } else {
                        echo '<a src=""><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-'.$i.'.jpg" class="sdg-pict" /></a>';
                    }
                    $i ++ ;
                }
            ?>
		</div>
        <h1>Recommendations</h1>
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
        <footer>
            <nav class="">
                    <a href="./images/loupe.png"><span class="material-icons">home</span></a>
                    <a href="https://www.w3schools.com/csS/css_navbar.asp"><span class="material-icons">search</span> </a>
                    <a href=""><span class="material-icons">perm_identity</span> </a>
            </nav>
        </footer>
    </body>
</html>
