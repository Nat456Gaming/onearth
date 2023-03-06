<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Onearth</title>
		<link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script type="text/javascript" src="javascript.js"></script>
	</head>
	<body>
        <header>
            <h1>Onearth</h1>
            <button onclick="goal_progress(2,10)"><span class="material-icons" style="color: #252525">settings</span></button>
        </header>
            <section>
            <h2 style="margin-top: 10px">In progress</h2>
            <div class="flex-container">
                <?php
                    $i = 1;
                    while ($i <= 17) {
                        if ($i<10) {
                            echo '<button onclick="goal_progress('.$i.')" class="stg-button goal'.$i.'"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-0'.$i.'.jpg" class="sdg-pict goal'.$i.'" /><div class="stg-progress-container goal'.$i.'"><p class="stg-progress-text goal'.$i.'">0/5</p><p class="stg-progress goal'.$i.'" style="width: 0%"></p><div></button>';
                        } else {
                            echo '<button onclick="goal_progress('.$i.')" class="stg-button goal'.$i.'"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-'.$i.'.jpg" class="sdg-pict goal'.$i.'" /><div class="stg-progress-container goal'.$i.'"><p class="stg-progress-text goal'.$i.'">0/5</p><p class="stg-progress goal'.$i.'" style="width: 0%"></p><div></button>';
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
                            echo '<button onclick="goal_progress('.$i.')" class="stg-button goal'.$i.'"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-0'.$i.'.jpg" class="sdg-pict goal'.$i.'" /><div class="stg-progress-container goal'.$i.'"><p class="stg-progress-text goal'.$i.'">0/5</p><p class="stg-progress goal'.$i.'" style="width: 0%"></p><div></button>';
                        } else {
                            echo '<button onclick="goal_progress('.$i.')" class="stg-button goal'.$i.'"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-'.$i.'.jpg" class="sdg-pict goal'.$i.'" /><div class="stg-progress-container goal'.$i.'"><p class="stg-progress-text goal'.$i.'">0/5</p><p class="stg-progress goal'.$i.'" style="width: 0%"></p><div></button>';
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
                            echo '<button onclick="goal_progress('.$i.')" class="stg-button goal'.$i.'"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-0'.$i.'.jpg" class="sdg-pict goal'.$i.'" /><div class="stg-progress-container goal'.$i.'"><p class="stg-progress-text goal'.$i.'">0/5</p><p class="stg-progress goal'.$i.'" style="width: 0%"></p><div></button>';
                        } else {
                            echo '<button onclick="goal_progress('.$i.')" class="stg-button goal'.$i.'"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-'.$i.'.jpg" class="sdg-pict goal'.$i.'" /><div class="stg-progress-container goal'.$i.'"><p class="stg-progress-text goal'.$i.'">0/5</p><p class="stg-progress goal'.$i.'" style="width: 0%"></p><div></button>';
                        }
                        $i ++ ;
                    }
                ?>
            </div>
            <div style="height: 23%">
                <p>cc</p>
            </div>
        </section>
            <footer>
                <div class="progress-status">
                    <p id="global_progress-text" class="progress-bar-text">0%</p>
                    <p id="global_progress" class="progress-bar" style="width: 0%"></p>
                </div>
                <nav>
                        <button onclick="global_progress(10)"><span class="material-icons">home</span></button>
                        <button onclick="global_progress(50)"><span class="material-icons">search</span></button>
                        <button onclick="global_progress(5)"><span class="material-icons">perm_identity</span></button>
                </nav>
            </footer>
    </body>
</html>
