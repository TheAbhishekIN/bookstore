
<template>
    <div class="container bg-white">
        <form @submit.prevent="saveBook">
            <p class="text-danger" v-if="error">{{ error }}</p>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="">Title</label>
                        <input type="text" class="form-control" v-model="form.title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="">Author</label>
                        <input type="text" class="form-control" v-model="form.author">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="">Genre</label>
                        <input type="text" class="form-control" v-model="form.genre">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="">ISBN</label>
                        <input type="text" class="form-control" v-model="form.isbn">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="">Publisher</label>
                        <input type="text" class="form-control" v-model="form.publisher">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="">Published</label>
                        <input type="text" class="form-control" v-model="form.published">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="">Cover Image</label>
                        <input type="image" class="form-control" v-model="form.coverImage">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="">Short Description</label>
                        <textarea class="form-control" v-model="form.description"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </div>
        </form>

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
                    title : '',
                    author : '',
                    genre : '',
                    isbn : '',
                    publisher : '',
                    published : '',
                    description : ''
                });

        let errors = reactive('');
            
        let headers = {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'Authorization': 'Bearer '+store.getters.getToken,
                        }
                    };

        // const error = ref('');

        const saveBook = async () => {
            await axios.post('api/book', form, headers).then(res => {
                errors = res.data.data;
                console.log(errors);
                // if (res.data.success) {
                //     store.dispatch('setToken', res.data.data.token)
                //     store.dispatch('setName', res.data.data.name)

                //     router.push({ name: "Book" })
                // } else {
                //     error.value = res.data.message
                // }
            })
        }

        return {
            form,
            saveBook,
            errors
        }
    }
}
</script>