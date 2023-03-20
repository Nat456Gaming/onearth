<section id="home" class="pages" style="display: block">
    <h2 style="margin-top: 10px">In progress</h2>
    <div class="flex-container">
        <?php
            $i = 1;
            while ($i < 17) {
                if ($i<10) {
                    echo '<button onclick="goal_progress('.$i.')" class="sdg-button goal'.$i.'"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-0'.$i.'.jpg" class="sdg-pict goal'.$i.'" /><div class="sdg-progress-container goal'.$i.'"><p class="sdg-progress-text goal'.$i.'">0/5</p><p class="sdg-progress goal'.$i.'" style="width: 0%"></p></div></button>';
                } else {
                    echo '<button onclick="goal_progress('.$i.')" class="sdg-button goal'.$i.'"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-'.$i.'.jpg" class="sdg-pict goal'.$i.'" /><div class="sdg-progress-container goal'.$i.'"><p class="sdg-progress-text goal'.$i.'">0/5</p><p class="sdg-progress goal'.$i.'" style="width: 0%"></p></div></button>';
                }
                $i ++ ;
            }
        ?>
    </div>
    <h2>For you</h2>
    <div class="flex-container">
        <?php
            $i = 1;
            while ($i < 17) {
                if ($i<10) {
                    echo '<button onclick="goal_progress('.$i.')" class="sdg-button goal'.$i.'"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-0'.$i.'.jpg" class="sdg-pict goal'.$i.'" /><div class="sdg-progress-container goal'.$i.'"><p class="sdg-progress-text goal'.$i.'">0/5</p><p class="sdg-progress goal'.$i.'" style="width: 0%"></p></div></button>';
                } else {
                    echo '<button onclick="goal_progress('.$i.')" class="sdg-button goal'.$i.'"><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-'.$i.'.jpg" class="sdg-pict goal'.$i.'" /><div class="sdg-progress-container goal'.$i.'"><p class="sdg-progress-text goal'.$i.'">0/5</p><p class="sdg-progress goal'.$i.'" style="width: 0%"></p></div></button>';
                }
                $i ++ ;
            }
        ?>
    </div>
    <h2>Done</h2>
    <div class="flex-container done">
        <?php
            $i = 1;
            while ($i < 17) {
                if ($i<10) {
                    echo '<button onclick="select_goal('.$i.')"  class="sdg-button goal'.$i.'" style="display: none"><span class="material-icons check">done</span><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-0'.$i.'.jpg" class="sdg-pict goal'.$i.'" /></button>';
                } else {
                    echo '<button onclick="select_goal('.$i.')" class="sdg-button goal'.$i.'" style="display: none"><span class="material-icons check">done</span><img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-'.$i.'.jpg" class="sdg-pict goal'.$i.'" /></button>';
                }
                $i++;
            }
        ?>
    </div>
</section>