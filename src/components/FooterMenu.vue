<template>
	<div class="bg-[#4CAF50] h-[3%] fixed bottom-[15%] justify-center items-center flex flex-raw" style="width: 50%" v-bind:class="{ hidden: !curentlyLogin }"><p class="w-full justify-center items-center text-center text-xl">50%</p></div>
	<nav class="p-6 flex flex-raw bg-[#252525] text-white h-[15%] w-full fixed bottom-0 justify-center items-center">
		<RouterLink to="/" class="flex w-1/3 justify-center" active-class="activeRoute"><span class="material-icons-round text-[10vh]">home</span></RouterLink>
		<RouterLink to="/search/user" class="flex w-1/3 justify-center" active-class="activeRoute"><span class="material-icons-round text-[10vh]">search</span></RouterLink>
		<RouterLink to="/friends" class="flex w-1/3 justify-center" active-class="activeRoute"><span class="material-icons-round text-[10vh]">perm_identity</span></RouterLink>
	</nav>
</template>

<script lang="ts">
import axios from "axios";
export default {
	name: "",
	data() {
		return {
			username: "",
			bio: "",
			pictureLink: "",
			badge: "",
			curentlyLogin: false,
		};
	},
	mounted() {
		this.curentlyLogin = true;
		this.verifLogin();
	},
	methods: {
		async verifLogin() {
			if (localStorage.getItem("token") == null) {
				this.curentlyLogin = false;
        return;
			}
			const loginResApi = await axios.get(`https://api.cleboost.ovh/onearth/user/testLogin.php?token=${localStorage.getItem("token")}`);
			if (loginResApi.data.state == "false") {
				this.curentlyLogin = false;
				return localStorage.removeItem("token");
			}
			this.curentlyLogin = true;
			this.username = loginResApi.data.username;
			const userResApi = await axios.get(`http://api.cleboost.ovh/onearth/user/getInfo.php?username=${this.username}`);
			this.username = userResApi.data[0].username;
			this.pictureLink = userResApi.data[0].picturelink;
			this.bio = userResApi.data[0].bio;
			this.badge = userResApi.data[0].badge;
			return;
		},
	},
};
</script>

<style scoped>
.activeRoute {
	color: #42b983;
	transform: scale(1.2);
	transition: 0.2s;
}
</style>
