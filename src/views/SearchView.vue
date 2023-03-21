<template>
    <div class="flex flex-col bg-[#252525] h-[12%] p-4 fixed w-full top-[10%]" id="search-container">
        <div class="w-full h-2/3 flex flex-row mb-2 rounded-md">
            <form class="w-11/12 h-full rounded-md">
                <input type="text" placeholder="Search ..." name="search-bar" class="w-full">
            </form>
            <button class="w-1/12 h-full">
                <span class="material-icons-round text-white h-full" style="font-size: 300%">search</span>
            </button>
        </div>
        <div class="w-full h-1/3 flex flex-row justify-center items-center">
            <button class="w-1/4">
                <h2 class="text-white">Challenges</h2>
            </button>
            <button class="w-1/4">
                <h2 class="text-white">People</h2>
            </button>
        </div>
    </div>
    <section >
        <h1>In dev...</h1>
    </section>
</template>