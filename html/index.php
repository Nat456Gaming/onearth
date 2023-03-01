<!DOCTYPE html>
<html>
	<head>
		<title>Onearth</title>
		<link rel="stylesheet" href="styles/style.css">
	</head>
	<body>
        <h1>En cours</h1>
		<div class="flex-container">
            <?php
                $i = 1;
                while ($i <= 3) {
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
                while ($i <= 6) {
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
        <div class="end-page">
            <nav>
                    <a src=""><img src="images/house.jpg" class="icons"></a>
                    <a src=""><img src="images/loupe.png" class="icons"></a>
                    <a src=""><img src="images/profil.png" class="icons"></a>
            </nav>
        </div>
    </body>
</html>
