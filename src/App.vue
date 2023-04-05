<script setup lang="ts">
import { RouterView } from 'vue-router'
import MenuHeader from './components/HeaderMenu.vue'
import MenuFooter from './components/FooterMenu.vue'
</script>

<template>
  <MenuHeader />
  <RouterView />
  <MenuFooter />
</template>

<script lang="ts">
  //Quand on clique la suite de touche "onearth" sur le clavier
  // document.addEventListener('keydown')
  document.addEventListener('keydown', function onEvent(event) {
    const key = event.key.toLowerCase();
    if (key === 'o') {
      const nextKey = function(event) {
        const key = event.key.toLowerCase();
        if (key === 'n') {
          const thirdKey = function(event) {
            const key = event.key.toLowerCase();
            if (key === 'e') {
              const fourthKey = function(event) {
                const key = event.key.toLowerCase();
                if (key === 'a') {
                  const fifthKey = function(event) {
                    const key = event.key.toLowerCase();
                    if (key === 'r') {
                      const sixthKey = function(event) {
                        const key = event.key.toLowerCase();
                        if (key === 't') {
                            const sevenKey = function(event) {
                              const key = event.key.toLowerCase();
                              if (key === "h") { 
                                window.location.href = "/html/index.php";
                                console.log("EASTER EGG !!!!");
                                console.log("GG mec, tu m'as trouvé ! (ou meuf au passage)");
                              } else {
                                document.removeEventListener('keydown', sevenKey);
                              }
                            }
                            document.addEventListener('keydown', sevenKey);
                          document.removeEventListener('keydown', onEvent);
                        } else {
                          document.removeEventListener('keydown', sixthKey);
                        }
                      }
                      document.addEventListener('keydown', sixthKey);
                    } else {
                      document.removeEventListener('keydown', fifthKey);
                    }
                  }
                  document.addEventListener('keydown', fifthKey);
                } else {
                  document.removeEventListener('keydown', fourthKey);
                }
              }
              document.addEventListener('keydown', fourthKey);
            } else {
              document.removeEventListener('keydown', thirdKey);
            }
          }
          document.addEventListener('keydown', thirdKey);
        } else {
          document.removeEventListener('keydown', nextKey);
        }
      }
      document.addEventListener('keydown', nextKey);
    }
  });
</script>

<style>
  section {
    padding: 1%;
    width: 95%;
    position: static;
    margin-top: 7%;
    margin-left: 4%;
    margin-right: 2%;
  }
@media (max-width: 1080px) and (max-height: 1920px) {
  section {
    position: static;
    margin-top: 25%;
    margin-left: 3%;
    margin-right: 3%;
    margin-bottom: 0%;
  }
}
</style>