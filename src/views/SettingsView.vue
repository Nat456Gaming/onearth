<!-- <script setup lang="ts">
  
</script> -->

<template>
	<!-- <img src="https://www.gif-maniac.com/gifs/51/50643.gif" class=" mt-44 h-[55%] w-full" v-bind:class="{ hidden: !loading }"> -->

	<div class="loading z-50" v-bind:class="{ hidden: !loading }"></div>
	<!-- Toutes les bannière  -->
	<div class="top-[12%] fixed w-full flex flex- justify-center">
		<!-- pop-up succes -->
		<div class="alert alert-success shadow-lg w-3/4" v-bind:class="{ hidden: !succesMessageState }" @click="this.succesMessageState = false">
			<div>
				<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
				<span>{{ succesMessage }}</span>
			</div>
		</div>
		<!-- pop-up error -->
		<div class="alert alert-error shadow-lg w-3/4" v-bind:class="{ hidden: !errorMessageState }" @click="this.errorMessageState = false">
			<div>
				<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
				<span>{{ errorMessage }}</span>
			</div>
		</div>
	</div>

	<section class="flex flex-col">
		<!-- <h1>This page is in developpement !</h1> -->
		<!-- Quand pas login -->
		<div v-bind:class="{ hidden: curentlyLogin }">
			<form onsubmit="return false;" id="connect" class="w-full h-1/2 rounded-3xl bg-slate-200 p-4 flex-col flex items-center mb-5 mt-5">
				<h3>Connect or register to Onearth :</h3>
				<label for="username">Username :</label><br />
				<input type="text" name="username" id="username" v-model="usernameInput" class="m-2 w-5/6 rounded-md p-1" placeholder="Your username" maxlength="30" size="3" @input="fillUsername()" v-bind:class="{ 'bg-red-200': errorUsername }" />
				<label for="password">Password :</label><br />
				<input type="password" name="password" id="password" v-model="passwordInput" class="m-2 w-5/6 rounded-md p-1" placeholder="Your password" maxlength="100" size="3" @input="fillPassword()" v-bind:class="{ 'bg-red-200': errorPassword }" />
				<div class="w-full flex flex-raw justify-center text-xl">
					<input type="submit" value="Sign in" class="m-3 w-1/4 rounded-md bg-lime-700 p-2 active:bg-lime-800" @click="login()" v-bind:disabled="errorUsername || errorPassword" v-bind:class="{ 'bg-red-500': errorUsername || errorPassword }" />
					<input type="submit" value="Sign up" class="m-3 w-1/4 rounded-md bg-cyan-600 p-2 active:bg-cyan-700" @click="create()" v-bind:disabled="errorUsername || errorPassword" v-bind:class="{ 'bg-red-500': errorUsername || errorPassword }" />
				</div>
			</form>
		</div>
		<!-- Quand login -->
		<div v-bind:class="{ hidden: !curentlyLogin }">
			<form onsubmit="return false;" class="w-full h-1/2 rounded-3xl bg-slate-200 p-4 flex-col flex items-center mb-5 mt-5">
				<h1 class="text-2xl">Setting :</h1>
				<div class="h-full flex flex-col justify-end w-4/5">
					<div class="form-control">
						<label class="label cursor-pointer">
							<span class="label-text mr-4 text-xl">Private account </span>
							<input type="checkbox" class="toggle toggle-lg bg-slate-500 checked:bg-lime-700" checked />
						</label>
					</div>
					<div class="form-control">
						<label class="label cursor-pointer">
							<span class="label-text mr-4 text-xl">In dev…</span>
							<input type="checkbox" class="toggle toggle-lg bg-slate-500 checked:bg-lime-700" checked disabled />
						</label>
					</div>
				</div>
				<input type="submit" value="Save change" class="m-2 w-1/4 rounded-md bg-lime-700 p-2 active:bg-lime-800" @click="userMaj()" />
			</form>
			<div class="w-full h-1/2 rounded-3xl bg-slate-200 p-4 mb-5 mt-5 flex flex-col items-center">
				<h1 class="text-2xl">Your are connect with the account called : {{ username }}</h1>
				<button class="m-2 w-1/4 rounded-md bg-cyan-700 p-2 active:bg-cyan-800" @click="modifProfile(true)" v-bind:class="{ hidden: modifProfil }">Edit your profile</button>
				<form onsubmit="return false;" class="w-full h-full flex-col flex items-center" v-bind:class="{ hidden: !modifProfil }">
					<label for="username">Your new username :</label><br />
					<input type="text" name="username" id="usernamenew" v-model="usernameInput" class="m-2 w-5/6 rounded-md p-1" placeholder="Your new username" maxlength="30" size="3" @input="fillUsername()" v-bind:class="{ 'bg-red-200': errorUsername }" />
					<label for="username">Your new bio :</label><br />
					<input type="text" name="bio" id="bio" v-model="bioInput" class="m-2 w-5/6 rounded-md p-1" placeholder="Your new bio" maxlength="300" />
					<div class="flex flex-raw w-8/12 items-center">
						<input type="submit" value="Save change" class="m-2 w-1/2 rounded-md bg-lime-700 p-2 active:bg-lime-800" v-bind:disabled="errorUsername" v-bind:class="{ 'bg-red-500': errorUsername }" @click="userMaj()" />
						<input type="submit" value="Cancel" class="m-2 w-1/2 rounded-md bg-orange-700 p-2 active:bg-orange-800" @click="modifProfile(false)" />
					</div>
				</form>
			</div>
			<div class="w-full h-1/2 rounded-3xl bg-slate-200 p-4 flex-raw flex items-center mb-5 mt-5 justify-center">
				<button class="m-2 w-1/4 rounded-md bg-orange-600 p-2 active:bg-orange-700" @click="unLogin()">Disconnect</button>
				<button class="m-2 w-1/4 rounded-md bg-red-700 p-2 active:bg-orange-800" @click="deleteAcc()">Delete my account</button>
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
			pirvateInput: false,
			bioInput: "",
			username: "",
			bio: "",
			curentlyLogin: true,
			succesMessageState: false,
			succesMessage: "",
			errorMessageState: false,
			errorMessage: "",
			errorUsername: true,
			errorPassword: true,
			loading: false,
			modifProfil: false,
		};
	},
	mounted() {
		window.scrollTo(0,0);
		this.curentlyLogin = true;
		this.verifLogin();
	},
	methods: {
		async verifLogin() {
			if (localStorage.getItem("token") == null) return (this.curentlyLogin = false);
			const loginResApi = await axios.get(`https://api.cleboost.ovh/onearth/user/testLogin.php?token=${localStorage.getItem("token")}`);
			if (loginResApi.data.state == "false") {
				this.curentlyLogin = false;
				return localStorage.removeItem("token");
			}
			this.curentlyLogin = true;
			this.username = loginResApi.data.username;
			this.loading = true;
			const userResApi = await axios.get(`http://api.cleboost.ovh/onearth/user/getInfo.php?username=${this.username}`);
			this.loading = false;
			this.username = userResApi.data[0].username;
			this.usernameInput = userResApi.data[0].username;
			this.pictureLink = userResApi.data[0].picturelink;
			this.bio = userResApi.data[0].bio;
			this.badge = userResApi.data[0].badge;
			this.mod
			return;
		},
		async login() {
			this.fillUsername(this.usernameInput);
			this.fillPassword(this.passwordInput);
			if (this.errorPassword || this.errorUsername) return this.errorMsg("Your username or Password is not valid ");
			this.loading = true;
			const loginResApi = await axios.get(`http://api.cleboost.ovh/onearth/user/getToken.php?username=${this.usernameInput}&password=${this.passwordInput}`);
			this.loading = false;
			if (loginResApi.data.state == "true") {
				this.curentlyLogin = true;
				localStorage.setItem("token", loginResApi.data.token);
				this.succesMsg("Connection is successfull !");
				return this.verifLogin();
			}
			this.curentlyLogin = false;
			return this.errorMsg("An error occure when login in !");
		},
		async unLogin() {
			const loginResApi = await axios.get(`http://api.cleboost.ovh/onearth/user/unLogin.php?token=${localStorage.getItem("token")}`);
			if (loginResApi.data.state == "true") {
				localStorage.removeItem("token");
				this.curentlyLogin = false;
				this.username = "";
				this.usernameInput = "";
				this.pictureLink = "";
				this.bioInput = "";
				this.bio = "";
				this.badge = "";
				this.passwordInput = "";
				this.errorUsername = true;
				this.errorPassword = true;
				return this.succesMsg("You have been successfully disconnected !");
			}
			return this.errorMsg("An error occure when unlogin !");
		},
		async create() {
			//Vérifie si les champs sont remplis
			if (this.usernameInput == "" || this.passwordInput == "") return this.errorMsg("Please fill all the fields !");
			//valid le username
			if (await this.verifUserName(this.usernameInput)) return this.errorMsg("Your username is not valid !\n(Minimum three characters)");
			//valid le mdp
			if (await this.verifPassword(this.passwordInput)) return this.errorMsg("Your password is not valid !\n(Minimum eight characters)");
			this.loading = true;
			const loginResApi = await axios.get(`http://api.cleboost.ovh/onearth/user/createAcount.php?username=${this.usernameInput}&password=${this.passwordInput}`);
			if (loginResApi.data.state == "true") {
				const loginResApi = await axios.get(`http://api.cleboost.ovh/onearth/user/getToken.php?username=${this.usernameInput}&password=${this.passwordInput}`);
				this.loading = false;
				if (loginResApi.data.state == "true") {
					this.curentlyLogin = true;
					localStorage.setItem("token", loginResApi.data.token);
					this.succesMsg("Your account has been created !");
					return this.verifLogin();
				}
			}
			this.loading = false;
			return this.errorMsg(loginResApi.data.moreInfo);
		},
		async fillUsername() {
			//Vérifie avec regex si les pseudo n'ont pas de caractères spéciaux et le nombre de caractères
			return (this.errorUsername = await this.verifUserName(this.usernameInput));
		},
		async fillPassword() {
			//Vérifie avec regex si les mdp n'ont pas de caractères spéciaux et le nombre de caractères
			return (this.errorPassword = await this.verifPassword(this.passwordInput));
		},
		async userMaj() {
			//cette fct sert pour les setting ou le profile ???
			await this.verifLogin();
			if (!this.curentlyLogin) return;
			this.loading = true;
			//requete API à faire :
			const loginResApi = await axios.get(`http://api.cleboost.ovh/onearth/user/saveProfil.php?token=${localStorage.getItem("token")}&username=${this.usernameInput}&bio=${this.bioInput}`);
			this.loading = false;
			if (loginResApi.data.state == "false") {
				return this.errorMsg("An error occure during the process !");
			}
			return this.succesMsg("Your profile's informations have been updated !");
		},
		//renvoi true si pas valide
		async verifUserName(username) {
			const regex = /^([a-zA-Z0-9_]{3,29})$/i;
			return !regex.test(username);
		},
		async verifPassword(password) {
			const regex = /^[A-a-zZ0-9#?!@$%^&*-_]{8,99}$/i;
			return !regex.test(password);
		},
		//les pop-up :
		async errorMsg(text) {
			this.errorMessage = text;
			this.errorMessageState = true;
			return setTimeout(() => {
				this.errorMessageState = false;
			}, 3000);
		},
		async succesMsg(text) {
			this.succesMessage = text;
			this.succesMessageState = true;
			return setTimeout(() => {
				this.succesMessageState = false;
			}, 3000);
		},
		async modifProfile(state) {
			this.usernameInput = this.username;
			this.fillUsername();
			this.bioInput = this.bio;
			return (this.modifProfil = state);
		},
		async deleteAcc() {
			await this.verifLogin();
			if (!this.curentlyLogin) return;
			const v = window.confirm("Do you realy want to delete your account ?\nThis action is irrevrsible.");
			if (!v) return;
			this.loading = true;
			//requete API à faire :
			const loginResApi = await axios.get(`http://api.cleboost.ovh/onearth/user/deleteAcount.php?username=${this.username}&password=${this.password}`);
			this.loading = false;
			if (loginResApi.data.state == "false") {
				console.log(loginResApi.data.moreInfo);
				
				return this.errorMsg(`An error occure during the process !${loginResApi.data.moreInfo}`);
			}
			return this.succesMsg("Your account has been deleted !");
		},
	},
};
</script>

<style scoped lang="scss">
$anime-time: 5s;
$box-size: 300px;
$clip-distance: 0.05;
$clip-size: $box-size * (1 + $clip-distance * 2);
$path-width: 2px;

$main-color: #69ca62;

$codepen-logo-path: url("http://localhost:5173/icon.png");

%full-fill {
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
}

.loading {
	@extend %full-fill;
	width: $box-size;
	height: $box-size;
	margin: auto;
	background: $codepen-logo-path no-repeat 50% / 70% rgba(#000, 0.1);
	color: $main-color;
	box-shadow: inset 0 0 0 1px rgba($main-color, 0.5);

	&::before,
	&::after {
		@extend %full-fill;
		content: "";
		z-index: -1;
		margin: -1 * $clip-distance * 100%;
		box-shadow: inset 0 0 0 $path-width;
		animation: clipMe $anime-time linear infinite;
	}

	&::before {
		animation-delay: $anime-time * -0.5;
	}
}

@keyframes clipMe {
	0%,
	100% {
		clip: rect(0px, $clip-size, $path-width, 0px);
	}
	25% {
		clip: rect(0px, $path-width, $clip-size, 0px);
	}
	50% {
		clip: rect($clip-size - $path-width, $clip-size, $clip-size, 0px);
	}
	75% {
		clip: rect(0px, $clip-size, $clip-size, $clip-size - $path-width);
	}
}

*,
*::before,
*::after {
	box-sizing: border-box;
}
</style>
