<template>
	<div class="flex flex-col bg-[#252525] h-[12%] p-4 fixed w-full top-[10%]" id="search-container">
		<div class="w-full h-2/3 flex flex-row mb-2 rounded-md px-4">
			<form class="w-11/12 h-full rounded-md" onsubmit="return false">
				<input type="text" placeholder="Search a challenge ..." name="search-bar" class="w-full rounded-3xl p-2" />
			</form>
			<button class="w-1/12 h-full ml-4 mr-2">
				<span class="material-icons-round text-white h-full" style="font-size: 300%">search</span>
			</button>
		</div>
		<div class="w-full h-1/3 flex flex-row justify-center items-center">
			<button class="w-1/4">
				<router-link to="/search/challenge" class="text-white" active-class="activeMenu">Challenges</router-link>
			</button>
			<button class="w-1/4">
				<router-link to="/search/user" class="text-white" active-class="activeMenu">People</router-link>
			</button>
		</div>
	</div>
	<section class="p-4">
		<div v-for="user in userList" class="rounded-xl bg-rose-200 duration-200 hover:scale-105 hover:shadow-xl w-full p-2 flex flex-col mt-5">
			<h1>{{ user.username }}</h1>
			<h1>{{ user.id }}</h1>
		</div>
	</section>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import axios from "axios";

interface OnearthUsers {
	username: string;
	imageLink: string;
	id: number;
}

export default defineComponent({
	name: "ShopWCDI",
	data() {
		return {
			userList: [] as OnearthUsers[],
		};
	},
	methods: {
		async getUserList() {
			const userResApi = await axios.get<OnearthUsers[]>("http://api.cleboost.ovh/wcdi/index.php?type=mineur");
			this.userList = userResApi.data;
		},
		async getUserBySearch(username) {
			const userResApi = await axios.get<OnearthUsers[]>("http://api.cleboost.ovh/wcdi/index.php?type=mineur");//oula
			this.userList = userResApi.data;
		},
	},
	async mounted() {
    window.scrollTo(0,0);
		//await this.getUserList();
		this.userList = [
			{
				username: "First challenge",
				imageLink: "https://cdn.discordapp.com/attachments/888888888888888888/888888888888888888/unknown.png",
				id: 1,
			},
			{
				username: "Second challenge",
				imageLink: "https://cdn.discordapp.com/attachments/888888888888888888/888888888888888888/unknown.png",
				id: 2,
			},
		];
	},
});
</script>

<style scoped>
.activeMenu {
	color: #008100;
}
</style>
