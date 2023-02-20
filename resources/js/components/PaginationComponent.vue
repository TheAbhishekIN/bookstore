<template>
    <div >
        <div class="flex flex-wrap mt-4">
            <template v-for="(link, p) in links.links" :key="p">
                <div v-if="link.url === null" class="btn btn-secondary"
                    v-html="link.label" />
                <a v-else
                    class="btn btn-secondary"
                    :class="{ 'btn btn-primary': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        links: Array,
    }
}
</script>