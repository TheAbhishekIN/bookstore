
<template>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <form @submit.prevent="login">
                    <h3>Admin Login</h3>
                    <p class="text-danger" v-if="error">{{ error }}</p>
                    <div class="form-group mt-2">
                        <label for="">Email</label>
                        <input type="text" class="form-control" v-model="form.email">
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Password</label>
                        <input type="password" class="form-control" v-model="form.password">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>
<script>
import { reactive, ref } from 'vue';
import { useRouter } from 'vue-router';
import { useStore } from 'vuex';
export default {
    setup() {
        const router = useRouter();
        const store = useStore();
        let form = reactive({
            email: '',
            password: ''
        });

        const error = ref('');

        const login = async () => {
            await axios.post('api/login', form).then(res => {
                if (res.data.success) {
                    store.dispatch('setToken', res.data.data.token)
                    store.dispatch('setName', res.data.data.name)

                    router.push({ name: "Book" })
                } else {
                    error.value = res.data.message
                }
            })
        }

        return {
            form,
            login,
            error
        }
    }
}
</script>