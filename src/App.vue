<script setup>
import { RouterView } from 'vue-router'
import MenuHeader from './components/HeaderMenu.vue'
import MenuFooter from './components/FooterMenu.vue'
</script>

<template>
  <MenuHeader />
  <RouterView />
  <MenuFooter />
</template>

<style>
  section {
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