<template>
    <header class="flex flex-row bg-[#252525] h-[10%] p-4 w-full justify-center items-center fixed top-0">
        <div class="flex flex-row w-3/4">
            <img src="/icon.png" alt="O" class="max-w-[7vh] max-h-[7vh] pr-1">
            <h3 class="logoSettings text-5xl  text-[#008100]">nearth</h3>
        </div>
        <div class="flex w-1/4 justify-end">
            <RouterLink to="/settings">
               <span class="material-icons-round text-[7vh] text-white">settings</span>
            </RouterLink>
        </div>
      </header>
</template>

<style scoped>
  header a:active{
    transform: scale(1);
    transform: rotate(0deg);
    transition: 0s;
  }
  header a:hover{
    transform: scale(1);
    transform: rotate(45deg);
    transition: 0.8s;
  }
  header a {
      transition: 0.3s;
      margin-right: 5%;
  }
  @media (max-width: 1080px) and (max-height: 1920px) {
    header a:active{
      transform: scale(1);
      transform: rotate(45deg);
      transition: 0.3s;
    }
    header a:hover{
      transform: scale(1);
      transform: rotate(0deg);
      transition: 0s;
    }
    header a {
      transition: 0.3s;
    }
  }
</style>