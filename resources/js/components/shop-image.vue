<template>
    <div class="w-full md:w-1/3 mx-auto">
        <img v-bind:src="currentImage" alt="" class="w-full md:w-10/12">
        <div class="w-full md:w-10/12 flex justify-center">
            <div v-for="(productImage, index) in productImages" v-bind:key="productImage.id" class="w-1/5 border-2 border-gray-300 mx-2 cursor-pointer">
                <img v-bind:src="'/storage/' + productImage.img_url" alt="" @click="changeCurrentImage(index)" class="w-full">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return{
            productImages: [],
            currentImage: "",
        }
    },  
    mounted() {
        this.loadProductImages(this.productId);
    },
    props: ['productId'],
    methods: {
        loadProductImages(productId){
            axios.get('/api/product-images/' + productId)
            .then((response) => {
                this.productImages = response.data.data;
                this.currentImage = "/storage/" + response.data.data[0].img_url;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
        },
        changeCurrentImage(index){
            this.currentImage = "/storage/" + this.productImages[index].img_url;
        },
    }
}
</script>

<style>

</style>