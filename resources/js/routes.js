import { createWebHistory, createRouter } from "vue-router";
import Home from "./pages/Home.vue";
import Login from "./pages/Login.vue";
import Books from "./pages/book/Index.vue";
import AddBook from "./pages/book/Create.vue";

const routes = [
    {
        path: '/',
        name: 'Home',
        component : Home,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/login',
        name: 'Login',
        component : Login,
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/books',
        name: 'Books',
        component : Books,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/add-book',
        name: 'AddBook',
        component : AddBook,
        meta: {
            requiresAuth: true
        }
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from) => {
    if(to.meta.requiresAuth && !localStorage.getItem('token')){
        return {name : 'Login'}
    }

    if(to.meta.requiresAuth == false && localStorage.getItem('token')){
        return {name : 'Home'}
    }
})


export default router;