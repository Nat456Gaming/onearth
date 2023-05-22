<template>
	<nav class="p-6 flex flex-raw bg-[#252525] text-white h-[15%] w-full fixed bottom-0 justify-center items-center">
		<RouterLink to="/" class="flex w-1/3 justify-center" active-class="activeRoute"><span class="material-icons-round text-[10vh]">home</span></RouterLink>
		<RouterLink to="/search/user" class="flex w-1/3 justify-center" active-class="activeRoute"><span class="material-icons-round text-[10vh]">search</span></RouterLink>
		<RouterLink to="/friends" class="flex w-1/3 justify-center" active-class="activeRoute"><span class="material-icons-round text-[10vh]">perm_identity</span></RouterLink>
	</nav>
</template>

<style scoped>
.activeRoute {
	color: #42b983;
	transform: scale(1.2);
	transition: 0.2s;
}
</style>
