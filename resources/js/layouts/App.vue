<script>
import { reactive } from 'vue';
import {useRouter} from 'vue-router';
import { useStore } from 'vuex';
export default {
    setup(){
        const router = useRouter();
        const store = useStore();
        let user = reactive({
            name: localStorage.getItem('name'),
            token: localStorage.getItem('token')
        });

        function logout(){
            // localStorage.removeItem('name'),
            // localStorage.removeItem('token')
            store.dispatch('removeUser');
            router.push({name: "Login"});
        }
        return {
            user,
            logout
        }
    }
}
</script>
<template>
     <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="">
                    Book Store {{ $store.getters.getUsername }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                                <li class="nav-item" >
                                    <router-link class="nav-link" :to="{name: 'Home'}">Home</router-link>
                                </li>
                                <li class="nav-item" v-if="!$store.getters.getUsername">
                                    <router-link class="nav-link" :to="{name: 'Login'}">Login</router-link>
                                </li>
                            <li class="nav-item dropdown" v-if="$store.getters.getUsername">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $store.getters.getUsername }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" @click.prevent="logout" >
                                        Logout
                                    </a>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
    <router-view></router-view>
</template>

