<script setup lang="ts">
import { RouterLink } from "vue-router";
</script>

<template>
	<section class="p-4" v-bind:class="{ hidden: notfound }">
		<!-- Mode pc -->
		<div class="w-full bg-slate-300 rounded-2xl p-4 space-y-5 items-center justify-center" id="pc-version">
			<div class="w-full flex flex-row space-x-5 p-1">
				<div class="avatar flex flex-col w-1/4 justify-center p-5 static">
					<div class="w-25 rounded-full ring ring-black ring-offset-base-100 ring-offset-0">
						<img :src="pictureLink" alt="Profile Picture" />
					</div>
				</div>
				<!-- div class="flex flex-col w-1/4 justify-center">
					<img :src="pictureLink" alt="Profile Picture" class="h-48 w-48 rounded-full border-8 border-black" />
				</div-->
				<div class="flex flex-col justify-center space-y-8 w-2/3 items-center">
					<h1 class="text-7xl w-full text-center">{{ username }}</h1>
					<div class="flex flex-row justify-center w-3/4">
						<p class="text-center text-2xl w-1/4">0 friends</p>
						<button class="text-2xl text-center px-1 bg-stone-400 w-1/2 rounded-md active:bg-stone-500"><span class="material-icons-round text-3xl translate-y-1">group_add</span> Add to my friends</button>
					</div>
					<p class="mt-3 bg-slate-400 rounded-2xl p-3 text-xl w-full">{{ bio }}</p>
				</div>
			</div>
		</div>

		<!-- Mode téléphone -->
		<div class="flex-col w-full bg-slate-300 rounded-2xl p-4 justify-center items-center" id="tel-version">
			<div class="w-full flex justify-center">
				<img :src="pictureLink" alt="Profile Picture" class="w-[24vh] h-[23vh] lg:w-[30vh] lg:h-[30vh] pr-1 rounded-full" />
			</div>
			<div class="w-full flex justify-center mt-2">
				<h1 class="text-4xl text-center">{{ username }}</h1>
			</div>
			<div class="flex flex-row justify-center space-x-8 mt-3">
				<p class="text-center">0 friends</p>
				<button>Add to my friends</button>
			</div>
			<div class="flex justify-center mt-1">
				<p class="bg-slate-400 rounded-3xl px-4 py-2">{{ badge }}</p>
			</div>
			<div class="w-full mt-5 bg-slate-400 rounded-2xl p-3">
				<p>{{ bio }}</p>
			</div>
		</div>
	</section>
	<section v-bind:class="{ hidden: !notfound }" class="flex flex-row justify-center">
		<div class="flex flex-col p-4">
			<h1 class="text-8xl text-red-600 mb-8">This user doesn't exist !</h1>
			<RouterLink to="/search/user" class="text-5xl text-center text-red-800 mt-8">> Go back to search &lt</RouterLink>
		</div>
	</section>
</template>

<script lang="ts">
import axios from "axios";
export default {
	name: "",
	data() {
		return {
			usernameRouter: this.$route.params.id,
			username: "",
			pictureLink: "",
			bio: "",
			badge: "member",
			notfound: false,
		};
	},
	mounted() {
		window.scrollTo(0,0);
		this.getUserInfo();
	},
	methods: {
		async getUserInfo() {
			const userResApi = await axios.get("http://api.cleboost.ovh/onearth/user/getInfo.php?username=" + this.usernameRouter);
			this.username = userResApi.data[0].username;
			this.pictureLink = userResApi.data[0].picturelink;
			this.bio = userResApi.data[0].bio;
			this.badge = userResApi.data[0].badge;

			if (this.username == "User not found") {
				this.notfound = true;
				console.log(this.notfound);
			}
		},
	},
};
</script>

<style scoped>
div#tel-version {
	display: none;
}
@media (max-width: 1080px) and (max-height: 1920px) {
	div#pc-version {
		display: none;
	}
	div#tel-version {
		display: flex;
	}
}
</style>
