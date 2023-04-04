<!-- <script setup lang="ts">
  
</script> -->

<template>
	<!-- Toutes les bannière  -->
	<!-- connection reussie -->
	<div class="alert alert-success shadow-lg mt-[20%]" v-bind:class="{ hidden: !succesMessage }">
		<div>
			<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
			<span>You have been successfully connected !</span>
		</div>
	</div>
  <!-- connection echoue -->
	<div class="alert alert-error shadow-lg" v-bind:class="{ hidden: !errorMessage }">
		<div>
			<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
			<span>Connection failed successfully.</span>
		</div>
	</div>

	<section class="flex flex-col">
		<h1>This page is in developpement !</h1>
		<!-- Quand pas login -->
		<div v-bind:class="{ hidden: curentlyLogin }">
			<form onsubmit="return false;" id="connect" class="w-full h-1/2 rounded-3xl bg-slate-200 p-4 flex-col flex items-center mb-5 mt-5">
				<h3>Connect or register to Onearth :</h3>
				<input type="text" name="username" id="usernamec" v-model="usernameInput" class="m-2 w-5/6 rounded-md p-1" placeholder="Your username" />
				<input type="password" name="password" id="password" v-model="passwordInput" class="m-2 w-5/6 rounded-md p-1" placeholder="Your password" />
				<div class="w-full flex flex-raw justify-center text-xl">
					<input type="submit" value="Sign in" class="m-3 w-1/4 rounded-md bg-lime-700 p-2 active:bg-lime-800" @click="login()" />
					<input type="submit" value="Sign up" class="m-3 w-1/4 rounded-md bg-cyan-600 p-2 active:bg-cyan-700" />
				</div>
			</form>
		</div>
		<!-- Quand login -->
		<div v-bind:class="{ hidden: !curentlyLogin }">
			<form onsubmit="return false;" class="w-full h-1/2 rounded-3xl bg-slate-200 p-4 flex-col flex items-center mb-5 mt-5">
				<div class="form-control">
					<label class="label cursor-pointer">
						<span class="label-text mr-4 text-xl">Settings1</span>
						<input type="checkbox" class="toggle toggle-lg bg-slate-500 checked:bg-lime-700" checked />
					</label>
				</div>
				<input type="submit" value="Save change" class="m-2 w-1/2 rounded-md bg-lime-700 p-2 active:bg-lime-800" />
			</form>
			<div class="w-full h-1/2 rounded-3xl bg-slate-200 p-4 flex-col flex items-center mb-5 mt-5">
				<button class="m-2 w-1/2 rounded-md bg-orange-600 p-2 active:bg-orange-700" @click="unLogin()">Disconnect</button>
			</div>
		</div>
	</section>
</template>

<script lang="ts">
import axios from "axios";
export default {
	name: "",
	data() {
		return {
			usernameInput: "",
			passwordInput: "",
			curentlyLogin: false,
			succesMessage: false,
			errorMessage: true,
		};
	},
	mounted() {
		//By default, the user is logged in
		this.curentlyLogin = false;
		this.verifLogin();
	},
	methods: {
		async verifLogin() {
			if (localStorage.getItem("token") == null) {
				console.log("stop");
				this.curentlyLogin = false;
				return;
			}

			const loginResApi = await axios.get(`https://api.cleboost.ovh/onearth/user/testLogin.php?token=${localStorage.getItem("token")}`);

			if (loginResApi.data.state == "true") {
				this.curentlyLogin = true;
				console.log("relog with " + localStorage.getItem("token"));
			} else {
				this.curentlyLogin = false;
				localStorage.removeItem("token");
			}
		},
		async login() {
			const loginResApi = await axios.get("http://api.cleboost.ovh/onearth/user/getToken.php?username=" + this.usernameInput + "&password=" + this.passwordInput);
			console.log(loginResApi.data);
			if (loginResApi.data.state == "true") {
				this.curentlyLogin = true;
				localStorage.setItem("token", loginResApi.data.token);
				console.log("log with " + loginResApi.data.token);
			} else {
				this.curentlyLogin = false;
			}
		},
		async unLogin() {
			const loginResApi = await axios.get("http://api.cleboost.ovh/onearth/user/unLogin.php?token=" + localStorage.getItem("token"));
			if (loginResApi.data.state == "true") {
				this.curentlyLogin = false;
				localStorage.removeItem("token");
			} else {
				// Message d'erreur
			}
		},
	},
};
</script>
