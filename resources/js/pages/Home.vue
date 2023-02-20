<script>
import Paginate from 'vuejs-paginate'
export default {
    components: {
        Paginate
    },
    data() {
        return {
            books: {},
            paginationLinks: {}
        }
    },
    methods: {
        loadBooks() {
            axios.get('api/books').then(res => {
                    this.books = res.data.data.data
                    this.paginationLinks = res.data.data
                    console.log(this.paginationLinks);
            })
        }, 

        handlePagination: function(pageNum) {
            console.log(pageNum)    
        }
    },
    mounted() {

    },
    created() {
        this.loadBooks();
    }
}

</script>
<template>
    <div class="container mt-4 mb-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col" v-for="book in books" :key="book.id">
                <div class="card shadow-sm">
                    <!-- <img v-bind:src="book.image" class="img-thumbnail" :alt="book.title"> -->
                    <!-- <img src="{{ book.image }}" alt="{{ book.title }}"> -->
                    <div class="card-body">
                        <h5 >{{ book.title }}</h5>
                        <p class="card-text"> {{ book.description }} </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                            </div>
                            <small class="text-muted"> <span class="text-bold">Author : </span>{{ book.author }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Paginate
            :page-count="20"
            :click-handler="handlePagination"
            :prev-text="'Prev'"
            :next-text="'Next'"
            :container-class="'className'">
        </Paginate>
    </div>
</template>