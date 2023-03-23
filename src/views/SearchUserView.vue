<template>
    <div class="flex flex-col bg-[#252525] h-[12%] p-4 fixed w-full top-[10%]" id="search-container">
        <div class="w-full h-2/3 flex flex-row mb-2 rounded-md px-4">
            <form class="w-11/12 h-full rounded-md" onsubmit="return false;" @input="getUserBySearch()">
                <input type="text" placeholder="Search a username ..." class="w-full rounded-3xl p-2" id="search-bar" v-model="searchBar">
            </form>
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
      <div v-bind:class="{ 'hideProgress': isNotProgress }"  class="w-full justify-center">
        <!-- <h1 class="w-full text-center text-xl">Loading ...</h1> -->
        <progress class="progress w-full h-8 mt-3"></progress>
      </div>
      <div v-for="user in userList" class="rounded-xl border-solid border-2 border-black duration-200 hover:scale-101 hover:shadow-xl w-full p-2 flex flex-col mt-5">
        <router-link :to="{name: 'user', params: { id: user.username },}" class="flex flex-row space-x-4">
          <img :src="user.picturelink" alt="Profile Picture" class="w-[10vh] h-[9vh] lg:w-[30vh] lg:h-[30vh] pr-1 rounded-xl">
          <div class="flex flex-col">
            <h1 class="text-xl">{{ user.username }}</h1>
            <h1 class="text-lg">{{ user.badge }}</h1>
          </div>
        </router-link>
      </div>
    </section>
</template>


<script lang="ts">
import { defineComponent } from 'vue'
import axios from 'axios'
import router from '../router';

interface OnearthUsers {
  id: number,
  username: string,
  picturelink: string,
  badge: string
}

export default defineComponent({
    name: "OnearthSearchUserView",
    data() {
        return {
            userList: [] as OnearthUsers[],
            searchBar: "",
            isNotProgress: false
        };
    },
    methods: {
        async getUserList() {
            this.userList = [];
            this.isNotProgress = false;
            const userResApi = await axios.get<OnearthUsers[]>("http://api.cleboost.ovh/onearth/user/getAcount.php");
            this.userList = userResApi.data;
            this.isNotProgress = true;
        },
        async getUserBySearch() {
            // Vérification si la barre de recherche est vide
            if (this.searchBar == "") {
                await this.getUserList();
                return;
            }

            // Affichage de la barre de chargement
            this.userList = [];
            this.isNotProgress = false;

            // Récupération des données
            const userResApi = await axios.get<OnearthUsers[]>("http://api.cleboost.ovh/onearth/user/getAcount.php?username=" + this.searchBar);

            // Vérification si la recherche n'a rien trouvé
            if (userResApi.data.length == 0) {
                this.userList = [
                    {
                        id: 1,
                        username: "There is no user call " + this.searchBar,
                        pictureLink: ""
                    }
                ];
            }
            else {
                this.userList = userResApi.data;
            }
            this.isNotProgress = true;
        }
    },
    async mounted() {
        // Chargement de la liste des utilisateurs
        await this.getUserList();
        this.isNotProgress = true;
    },
    components: { router }
})
</script>

<style scoped>
  .activeMenu {
    color: #008100;
  }

  .hideProgress {
    display: none;
  }
  section {
    margin-top: 11%;
  }
  @media (max-width: 1080px) and (max-height: 1920px) {
    section {
      margin-top: 45%;
    }
  }
</style>