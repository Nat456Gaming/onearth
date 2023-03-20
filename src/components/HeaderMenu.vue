<template>
    <div class="flex flex-row bg-[#252525] h-[10%] p-4 sticky w-full justify-center items-center">
        <div class="flex flex-row w-3/4">
            <img src="/icon.png" alt="O" class="max-w-[64px] max-h-[64px] pr-1">
            <h3 class="logoSettings text-5xl  text-[#008100]">nearth</h3>
        </div>
        <div class="flex w-1/4 justify-end">
            <RouterLink to="/settings">
               <span class="material-icons-round text-[64px] text-white">settings</span>
            </RouterLink>
        </div>
    </div>
</template>

<style scoped>
   @media (max-width: 1080px) and (max-height: 1920px) {
      header RouterLink:active{
         transform: scale(1);
         transform: rotate(45deg);
         transition: 0.3s;
      }
      header RouterLink:hover{
         transform: scale(1);
         transform: rotate(0deg);
         transition: 0s;
      }
      header RouterLink {
         transition: 0.3s;
      }
   }
   header RouterLink:active{
      transform: scale(1);
      transform: rotate(0deg);
      transition: 0s;
    }
    header RouterLink:hover{
      transform: scale(1);
      transform: rotate(45deg);
      transition: 0.8s;
   }
</style>