<!-- <script setup lang="ts">
  
</script> -->

<template>
  <section class="flex flex-col">
    <h1>This page is in developpement !</h1>
    <!-- Quand pas login -->
    <div v-bind:class="{ 'hidden': curentlyLogin }">
      <form onsubmit="return false;" id="connect" class="w-full h-1/2 rounded-3xl bg-slate-200 p-4 flex-col flex items-center mb-5 mt-5">
        <h3>Connect or register to Onearth : </h3>
        <input type="text" name="username" id="usernamec" v-model="usernameInput" class="m-2 w-5/6 rounded-md p-1" placeholder="Your username">
        <input type="password" name="password" id="password" v-model="passwordInput" class="m-2 w-5/6 rounded-md p-1" placeholder="Your password">
        <div class="w-full flex flex-raw justify-center text-xl">
          <input type="submit" value="Sign in" class="m-3 w-1/4 rounded-md bg-lime-700 p-2 active:bg-lime-800">
          <input type="submit" value="Sign up" class="m-3 w-1/4 rounded-md bg-cyan-600 p-2 active:bg-cyan-700">
        </div>
      </form>
    </div>
    
    <!-- Quand login -->
    <div v-bind:class="{ 'hidden': !curentlyLogin }">
      <form onsubmit="return false;" class="w-full h-1/2 rounded-3xl bg-slate-200 p-4 flex-col flex items-center mb-5 mt-5">
        <div class="form-control">
          <label class="label cursor-pointer">
            <span class="label-text mr-4 text-xl">Settings1</span> 
            <input type="checkbox" class="toggle toggle-lg bg-slate-500 checked:bg-lime-700" checked />
          </label>
        </div>
        <input type="submit" value="Save change" class="m-2 w-1/2 rounded-md bg-lime-700 p-2 active:bg-lime-800">
      </form>
    </div>
  </section>
</template>

<script lang="ts">
import axios from 'axios';
export default {
  name: '',
  data() {
    return {
      usernameInput: '',
      passwordInput: '',
      curentlyLogin: false,
    }
  },
  mounted() {
    //By default, the user is logged in
    this.curentlyLogin = false;
    // localStorage.setItem('token', '3d35868cbd04a1094db574677578a871e9e9e01865e1d1edcd33ea91826475b6');
    this.verifLogin();
  },
  methods: {
    async verifLogin() {
      const loginResApi = await axios.get(`https://api.cleboost.ovh/onearth/user/testLogin.php?token=${localStorage.getItem('token')}`);
      console.log(loginResApi.data);
      
      if (loginResApi.data.state == "true") {
        this.curentlyLogin = true;
      } else {
        this.curentlyLogin = false;
      }
    },
    async login() {
        const loginResApi = await axios.get("http://api.cleboost.ovh/onearth/user/getInfo.php?username=" + this.usernameRouter);
    },
    async unLogin() {

    }
  },
}
</script>