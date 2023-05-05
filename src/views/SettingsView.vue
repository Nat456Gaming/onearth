<!-- <script setup lang="ts">
  
</script> -->

<template>
	<!-- <img src="https://www.gif-maniac.com/gifs/51/50643.gif" class=" mt-44 h-[55%] w-full" v-bind:class="{ hidden: !loading }"> -->

	<div class="loading z-50" v-bind:class="{ hidden: !loading }"></div>
	<!-- Toutes les bannière  -->
	<div class="top-[12%] fixed w-full flex flex- justify-center">
		<!-- connection reussie -->
		<div class="alert alert-success shadow-lg w-3/4" v-bind:class="{ hidden: !succesMessageState }" @click="this.succesMessageState = false">
			<div>
				<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
				<span>{{ succesMessage }}</span>
			</div>
		</div>
		<!-- connection echoue -->
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
					<input type="submit" value="Sign in" class="m-3 w-1/4 rounded-md bg-lime-700 p-2 active:bg-lime-800" @click="login()" v-bind:disabled="errorUsername || errorPassword" v-bind:class="{ 'bg-red-600': errorUsername || errorPassword }" />
					<input type="submit" value="Sign up" class="m-3 w-1/4 rounded-md bg-cyan-600 p-2 active:bg-cyan-700" @click="create()" v-bind:disabled="errorUsername || errorPassword" v-bind:class="{ 'bg-red-600': errorUsername || errorPassword }" />
				</div>
			</form>
		</div>
		<!-- Quand login -->
		<div v-bind:class="{ hidden: !curentlyLogin }">
			<form onsubmit="return false;" class="w-full h-1/2 rounded-3xl bg-slate-200 p-4 flex-col flex items-center mb-5 mt-5">
				<div class="h-full flex flex-col justify-end w-4/5">
					<div class="form-control">
						<label class="label cursor-pointer">
							<span class="label-text mr-4 text-xl">Private account : </span>
							<input type="checkbox" class="toggle toggle-lg bg-slate-500 checked:bg-lime-700" checked />
						</label>
					</div>

					<div class="form-control">
						<label class="label cursor-pointer">
							<span class="label-text mr-4 text-xl">Settings1</span>
							<input type="checkbox" class="toggle toggle-lg bg-slate-500 checked:bg-lime-700" checked />
						</label>
					</div>
				</div>
				<input type="submit" value="Save change" class="m-2 w-1/2 rounded-md bg-lime-700 p-2 active:bg-lime-800" @click="userMaj()" />
			</form>
			<form onsubmit="return false;" class="w-full h-1/2 rounded-3xl bg-slate-200 p-4 flex-col flex items-center mb-5 mt-5">
				<input type="text" name="username" id="username" v-model="usernameInput" class="m-2 w-5/6 rounded-md p-1" placeholder="Your new username" maxlength="30" size="3" />
				<input type="text" name="bio" id="bio" v-model="bioInput" class="m-2 w-5/6 rounded-md p-1" placeholder="Your new bio" maxlength="300" />
				<input type="submit" value="Save change" class="m-2 w-1/2 rounded-md bg-lime-700 p-2 active:bg-lime-800" />
			</form>
			<div class="w-full h-1/2 rounded-3xl bg-slate-200 p-4 flex-col flex items-center mb-5 mt-5">
				<button class="m-2 w-1/2 rounded-md bg-orange-600 p-2 active:bg-orange-700" @click="unLogin()">Disconnect</button>
				<!-- <button class="m-2 w-1/2 rounded-md bg-orange-600 p-2 active:bg-orange-700" @click="unLogin()">Supprimer mon compte</button> -->
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
			username: "",
			bioInput: "",
			pirvateInput: false,
			curentlyLogin: true,
			succesMessageState: false,
			succesMessage: "",
			errorMessageState: false,
			errorMessage: "",
			errorUsername: true,
			errorPassword: true,
			loading: false,
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

			if (loginResApi.data.state == "true") {
				this.curentlyLogin = true;
				this.username = loginResApi.data.username;
			} else {
				this.curentlyLogin = false;
				localStorage.removeItem("token");
				return;
			}

			this.loading = true;
			const userResApi = await axios.get("http://api.cleboost.ovh/onearth/user/getInfo.php?username=" + this.username);
			this.loading = false;
			this.username = userResApi.data[0].username;
			this.pictureLink = userResApi.data[0].picturelink;
			this.bioInput = userResApi.data[0].bio;
			this.badge = userResApi.data[0].badge;
			return;
		},
		async login() {
			this.fillUsername(this.usernameInput);
			this.fillPassword(this.passwordInput);
			if (this.errorPassword || this.errorUsername) {
				this.errorMsg("Your username or Password is not valid ");
				return;
			}
			this.loading = true;
			const loginResApi = await axios.get("http://api.cleboost.ovh/onearth/user/getToken.php?username=" + this.usernameInput + "&password=" + this.passwordInput);
			this.loading = false;
			if (loginResApi.data.state == "true") {
				this.curentlyLogin = true;
				localStorage.setItem("token", loginResApi.data.token);
				return this.succesMsg("Connection is successfull !");
			}
			this.curentlyLogin = false;
			return this.errorMsg("An error occure when login in !");
		},
		async unLogin() {
			const loginResApi = await axios.get("http://api.cleboost.ovh/onearth/user/unLogin.php?token=" + localStorage.getItem("token"));
			if (loginResApi.data.state == "true") {
				localStorage.removeItem("token");
				this.curentlyLogin = false;
				return this.succesMsg("You have been successfully disconnected !");
			}
			return this.errorMsg("An error occure when unlogin !");
		},
		async create() {
			//Vérifie si les champs sont remplis
			if (this.usernameInput == "" || this.passwordInput == "") {
				return this.errorMsg("Please fill all the fields !");
			}
			//valid le username
			if (await this.verifUserName(this.usernameInput)) {
				return this.errorMsg("Your username is not valid !\n(Minimum three characters)");
			}
			//valid le mdp
			if (await this.verifPassword(this.passwordInput)) {
				return this.errorMsg("Your password is not valid !\n(Minimum eight characters)");
			}
			this.loading = true;
			const loginResApi = await axios.get(`http://api.cleboost.ovh/onearth/user/createAcount.php?username=${this.usernameInput}&password=${this.passwordInput}`);
			this.loading = false;
			if (loginResApi.data.state == "true") {
				await this.succesMsg("Your account has been created !");
				return this.login();
			}
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
			await this.verifLogin();
			if (!this.curentlyLogin) return;
			console.log("loul");
		},
		//renvoi true si pas valide
		async verifUserName(username) {
			const regex = /^([a-zA-Z0-9_]{3,29})$/i;
			console.log(regex.test(username));
			return !regex.test(username);
		},
		async verifPassword(password) {
			const regex = /^[a-zA-Z0-9#?!@$%^&*-_]{8,99}$/i;
			return !regex.test(password);
		},
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

	// for debug
	//   &:hover {
	//     &::after,
	//     &::before {
	//       background-color: rgba(#f00, .3);
	//     }
	//   }
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
