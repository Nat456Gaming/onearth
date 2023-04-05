<!-- <script setup lang="ts">
  
</script> -->

<template>
	<!-- <img src="https://www.gif-maniac.com/gifs/51/50643.gif" class=" mt-44 h-[55%] w-full" v-bind:class="{ hidden: !loading }"> -->

	<div class="bb z-50" v-bind:class="{ hidden: !loading }"></div>
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
		<!-- <h1>This page is in developpement !</h1> -->
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
				<div class="h-full flex flex-col justify-end">
					<div class="form-control">
						<label class="label cursor-pointer">
							<span class="label-text mr-4 text-xl">Compte privé</span>
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
			curentlyLogin: true,
			succesMessage: false,
			errorMessage: false,
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
			console.log("envoie request en cours");
			this.loading = true;
			const loginResApi = await axios.get("http://api.cleboost.ovh/onearth/user/getToken.php?username=" + this.usernameInput + "&password=" + this.passwordInput);
			console.log(loginResApi.data);
			this.loading = false;
			if (loginResApi.data.state == "true") {
				this.curentlyLogin = true;
				localStorage.setItem("token", loginResApi.data.token);
				console.log("log with " + loginResApi.data.token);
				// Message de succes
			} else {
				this.curentlyLogin = false;
				// Message d'erreur
			}
		},
		async unLogin() {
			const loginResApi = await axios.get("http://api.cleboost.ovh/onearth/user/unLogin.php?token=" + localStorage.getItem("token"));
			if (loginResApi.data.state == "true") {
				localStorage.removeItem("token");
				this.curentlyLogin = false;
				// Message de succes
			} else {
				// Message d'erreur
			}
		},
	},
};
</script>

<style scoped lang="scss">
$anime-time: 5s;

$box-size: 300px;
$clip-distance: .05;
$clip-size: $box-size * (1 + $clip-distance * 2);
$path-width: 2px;

$main-color: #69ca62;

$codepen-logo-path: url('http://localhost:5173/icon.png');

%full-fill {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}

.bb {
  @extend %full-fill;
  width: $box-size;
  height: $box-size;
  margin: auto;
  background: $codepen-logo-path no-repeat 50% / 70% rgba(#000, .1);
  color: $main-color;
  box-shadow: inset 0 0 0 1px rgba($main-color, .5);

  &::before,
  &::after {
    @extend %full-fill;
    content: '';
    z-index: -1;
    margin: -1 * $clip-distance * 100%;
    box-shadow: inset 0 0 0 $path-width; 
    animation: clipMe $anime-time linear infinite;
  }

  &::before {
    animation-delay: $anime-time * -.5;
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
  0%, 100% {clip: rect(0px, $clip-size, $path-width, 0px); }
  25% {clip: rect(0px, $path-width, $clip-size, 0px); }
  50% {clip: rect($clip-size - $path-width, $clip-size, $clip-size, 0px); }
  75% {clip: rect(0px, $clip-size, $clip-size, $clip-size - $path-width); }
}

*,
*::before,
*::after {
  box-sizing: border-box;
}
</style>