<script setup>
import { RouterLink, RouterView } from 'vue-router'
import MenuHeader from './components/HeaderMenu.vue'
import MenuFooter from './components/FooterMenu.vue'
</script>

<template>
  <MenuHeader />
  <RouterView />
  <MenuFooter />
</template>

<style scoped>
  section {
    position: static;
    margin-top: 18%;
  }
</style>