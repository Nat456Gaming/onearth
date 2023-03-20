<template>
   <nav class=" p-6 flex flex-raw bg-[#252525] text-white h-[15%] w-full fixed bottom-0 justify-center items-center">
      <RouterLink to="/" class="flex w-1/3 justify-center"><span class="material-icons-round text-[100px]">home</span></RouterLink>
      <RouterLink to="/search" class="flex w-1/3 justify-center"><span class="material-icons-round text-[100px]">search</span></RouterLink>
      <RouterLink to="/friends" class="flex w-1/3 justify-center"><span class="material-icons-round text-[100px]">perm_identity</span></RouterLink>
   </nav>
</template>

<style scoped>
   nav RouterLink:active {
      transform: scale(0.90);
      transition: 0.2s;
   }
</style>