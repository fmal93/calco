<template>
    <div class="w-full md:w-1/2">
        <p class="font-semibold underline ml-8 py-3 flex" @touchstart="showAbout = !showAbout">Acerca de Calco <span class="ml-8" v-if="showIcons"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></span> </p>
        <ul v-show="showAbout">
            <li>
                <a href="" class="ml-8 py-1 md:text-lg">¿Quienes somos?</a>
            </li>
            <li>
                <a href="" class="ml-8 py-1 md:text-lg">Contactanos</a>
            </li>
            <li>
                <a href="" class="ml-8 py-1 md:text-lg">Despachos</a>
            </li>
        </ul>
    </div>
    <div class="w-full md:w-1/2">
        <p class="font-semibold underline ml-8 py-3 flex" @touchstart="showCat = !showCat">Categorias <span class="ml-8" v-if="showIcons"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></span> </p>
        <ul v-for="(category, index) in categories" v-bind:key="category.id" v-show="showCat">
            <li v-if="index < 5">
                <a v-bind:href="'/category/' + category.id" @click="clearSto()" class="ml-8 py-1 md:text-lg">{{ category.name }}</a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return{
            showAbout: screen.width < 760 ? false:true,
            showCat: screen.width < 760 ? false:true,
            showIcons: screen.width < 760 ? true:false,
            categories: [], 
        }
    },  
    mounted() {
        window.addEventListener('resize', this.onResize);
        this.loadCategories();
    },
    props: [],
    methods: {
        onResize(event) {
            this.showAbout = screen.width < 760 ? false:true;
            this.showCat = screen.width < 760 ? false:true;
            this.showIcons = screen.width < 760 ? true:false;
        },
        clearSto() {
            window.localStorage.clear();
        },
        loadCategories: function(){
            axios.get('/api/categories').then((response) => {
                this.categories = response.data.data;
            }).catch(function (error) {
                console.log(error);
            }); 
        },
    }
}
</script>

<style>

</style>