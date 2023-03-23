<template>
    <section class="p-4">
        <!-- Mode pc -->
        <div class="w-full bg-slate-300 rounded-2xl p-4 space-y-5" id="pc-version">
            <div class="w-full flex flex-row space-x-5">
                <div class="flex flex-col">
                  <div class="w-full">
                    <img :src="pictureLink" alt="Profile Picture" class="w-[17vh] h-[16vh] lg:w-[30vh] lg:h-[30vh] pr-1 rounded-full">
                  </div>
                  <div class="w-full flex mt-2 p-4">
                      <h1 class="text-4xl">{{ username }}</h1>
                  </div>
                </div>
                <div class="flex flex-col justify-center space-x-8">
                    <p class="text-center">0 friends</p>
                    <button>Add to my friends</button>
                </div>
                <div class="w-full mt-3 bg-slate-400 rounded-2xl p-3">
                    <p>{{ bio }}</p>
                </div>
            </div>
        </div>
        
        <!-- Mode téléphone -->
        <div class="flex-col w-full bg-slate-300 rounded-2xl p-4 justify-center" id="tel-version">
            <div class="w-full flex justify-center">
                <img :src="pictureLink" alt="Profile Picture" class="w-[24vh] h-[23vh] lg:w-[30vh] lg:h-[30vh] pr-1 rounded-full">
            </div>
            <div class="w-full flex justify-center mt-2">
                <h1 class="text-4xl text-center">{{ username }}</h1>
            </div>
            <div class="flex lfex-row justify-center space-x-8 mt-3">
                <p class="text-center">0 friends</p>
                <button>Add to my friends</button>
            </div>
            <div>
                <p v-for="badge in badgeList">{{   badge.name }}</p>
            </div>
            <div class="w-full mt-5 bg-slate-400 rounded-2xl p-3">
                <p>{{ bio }}</p>
            </div>
        </div>
    </section>
</template>

<script lang="ts">

import axios from 'axios';
export default {
  name: '',
  data() {
    return {
        usernameRouter: this.$route.params.id,
        username: "",
        pictureLink: "",
        bio: "",
        badgeList: [],
    }
  },
  mounted() {
    this.getUserInfo();
  },
  methods: {
    async getUserInfo() {
        const userResApi = await axios.get("http://api.cleboost.ovh/onearth/user/getInfo.php?username=" + this.usernameRouter);
        this.username = userResApi.data[0].username;
        this.pictureLink = userResApi.data[0].picturelink;
        this.bio = userResApi.data[0].bio;

        if (userResApi.data[0].username == "Cleboost") {
            this.badgeList = [
                {
                    name: "developpeur"
                }
            ]
        }
    }
  },
}
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