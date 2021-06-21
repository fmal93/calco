<template>
  <div class="flex justify-between flex-wrap relative sticky top-0 bg-denim-blue md:bg-white pt-2 z-10">
    <div class="order-1 w-1/2 md:w-1/6 flex items-center text-white">
      <svg class="w-8 h-8 mx-2" fill="none" stroke="currentColor" @touchstart="showLinks = !showLinks" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 6h16M4 12h16M4 18h16"></path></svg>
      <img src="/storage/calco4.png" alt="logo" class="w-1/3 mx-2">
    </div>
    <div class="order-2 md:order-3 w-1/2 md:w-1/6 flex justify-end items-center text-white md:text-blue-700">
      <svg @touchstart="showSearch = true" class="w-10 h-10 mx-2 stroke-1 md:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
      <svg class="w-10 h-10 mx-2 stroke-1 md:mx-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
      <div class="relative">
        <a href="/carrito">
          <svg class="w-10 h-10 mx-2 stroke-1 md:mx-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </a>
        <span class="absolute badge font-bold rounded-full h-6 w-6 text-center text-blue-700 md:text-white bg-white md:bg-denim-blue">{{ badge }}</span>
      </div>
    </div>
    <transition name="fade">
      <div class="order-3 md:order-2 w-full md:w-4/6 absolute top-3.5 right-0 md:static md:block m-auto" v-if="showSearch">
        <form action="" class="flex items-center">
          <div class="bg-denim-blue text-white relative left-0 md:hidden" @touchstart="showSearch = false">
            <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
          </div>
          <input type="text" name="" id="" class="rounded-l-lg h-12 w-full px-3 border border-gray-300 focus:outline-none focus:ring-0" placeholder="¿Que Estas Buscando?">
          <button type="submit" class="bg-denim-blue text-white rounded-r-lg relative right-0">
            <svg class="w-12 h-12 mx-2 stroke-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
          </button>
        </form>
      </div>
    </transition>
    <transition name="fade">
      <div class="order-4 w-full h-screen md:h-auto absolute md:static top-0 bg-white" v-show="showLinks">
        <div class="w-full bg-blue-700 h-auto py-1 flex justify-end md:hidden">
          <div class="w-1/4" @touchstart="showLinks = false">
              <svg class="w-10 h-10 m-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </div>
        </div>
        <ul class="w-full block md:flex relative md:border-t-2" @mouseleave="showCat = false">
          <li class="py-2 order-1 md:order-2">
            <svg class="w-6 h-6 mx-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <a href="/" class="inline-block text-lg">Home</a>
          </li>
          <li class="py-2 order-2 md:order-3">
            <svg class="w-6 h-6 mx-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
            </svg>
            <a href="#" class="inline-block text-lg">Destacados</a>
          </li>
          <li class="py-2 order-3 md:order-4">
            <svg class="w-6 h-6 mx-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <a href="#" class="inline-block text-lg">Contactanos</a>
          </li>
          <hr>
          <li class="py-2 mx-4 order-4 md:order-1 cursor-pointer" @mouseenter="showCat = true, showSubCat = false">
            <svg class="w-6 h-6 mx-4 hidden md:inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <p href="#" class="inline-block font-bold text-lg" @touchstart="showCat = !showCat">Categorías</p>
          </li>
          <div class="md:absolute md:transform md:translate-y-10 w-full z-10 md:flex" @mouseleave="showCat = false, showSubCat = false">
            <div class="md:ml-8 w-1/6 md:bg-denim-blue md:text-white rounded-l-lg" v-if="showCat">
              <li class="py-2" v-for="category in categories" v-bind:key="category.id">
                  <span class="ml-10 md:text-sm cursor-pointer hover:underline transform hover:scale-105" @mouseenter="loadSubCategories(category.id)">{{ category.name }}</span>
              </li>
            </div>
            <div class="w-4/6 md:bg-denim-blue md:text-white rounded-r-lg" v-if="showSubCat && showCat">
              <li class="py-2" v-for="subCategory in subCategories" v-bind:key="subCategory.id">
                  <a v-bind:href="'/category/' + subCategory.s_cat_slug" class="mx-10 md:text-sm hover:underline cursor-pointer">{{ subCategory.name }}</a>
              </li>
            </div>
          </div>
        </ul>
      </div>
    </transition>
  </div>  
</template>

<script>
export default {
  data() {
    return {
      showSearch: screen.width < 760 ? false:true,
      showLinks: screen.width < 760 ? false:true,
      showCat: false,
      showSubCat: screen.width < 760 ? true:false,
      categories: [],
      subCategories: [],
    }
  },
  props: ['badge'],
  mounted(){
    window.addEventListener('resize', this.onResize);
    this.loadCategories();
  },
  methods: {
    onResize(event) {
      this.showLinks = screen.width < 760 ? false:true;
      this.showCat = screen.width < 760 ? true:false;
    },
    loadCategories: function(){
      axios.get('/api/categories').then((response) => {
          this.categories = response.data.data;
      }).catch(function (error) {
        console.log(error);
      }); 
    },
    loadSubCategories: function(id){
      axios.get('/api/category/' + id).then((response) => {
        this.subCategories = response.data.data.subCategories;
        this.showSubCat = true;
      }).catch(function (error) {
        console.log(error);
      });
    },
  },
}
</script>

<style scoped>
  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 0.5s ease;
  }

  .fade-enter-from,
  .fade-leave-to {
    opacity: 0;
  }

  .badge{
    top: -20%;
    right: 5%;
  }
  @media only screen and (min-width: 600px) {
      .badge{
        top: -20%;
        right: 25%;
      }
    }
</style>>