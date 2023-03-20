<script setup>
import { RouterLink, RouterView } from 'vue-router'
import MenuHeader from './components/HeaderMenu.vue'
import MenuFooter from './components/FooterMenu.vue'
</script>

<template>
  <MenuHeader class="fixed h-[10%]"/>
  <RouterView class="h-[90%] top-[10%]"/>
  <MenuFooter />
</template>