<template>
  <div class="w-full md:w-1/5">
    <form action="" class="py-5">
      <div class="w-11/12 border-2 text-center m-auto py-2 text-lg rounded-md shadow-md font-bold">Marca</div>
        <div class="py-2">
          <div class="w-11/12 m-auto py-1 px-6" v-for="(brand, index) in brands" v-bind:key="brand.id" v-show="brand.products_count > 0">
            <input type="checkbox" name="brands[]" class="w-4 h-4" :value="brand.id" :id="'brand-'+ index" v-model="selected.brands">
            <label :for="'brand-'+ index" class="px-4 h-4"> <span>{{ brand.name }} ({{ brand.products_count }})</span></label>
          </div>
      </div>
    </form>
  </div>
  <div class="w-full md:w-4/5">
    <div class="w-full py-5 flex flex-wrap">
      <div class="w-1/2 md:w-1/6 md:mx-3 border-2 rounded-lg shadow transform hover:scale-105 cursor-pointer flex flex-col justify-between"  v-for="product in products" v-bind:key="product.id">
          
        <img v-bind:src="'/storage/' + product.img_url" alt="" class="w-full h-full">
        <div>            
          <p>Einhell</p>
          <p class="py-2 text-sm md:text-md">{{ product.name }}</p>
          <p class="text-lg text-red-600 font-bold">$ {{ product.price }}</p>
        </div>      
        
        <p class="pt-3 text-sm tracking-wider flex justify-around items-center">
          Entrega a domicilio 
          <span>
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
              </svg>
          </span>
        </p>
        <a v-bind:href="'/add-to-cart/' + product.id" class="block w-11/12 border-2 bg-denim-blue m-auto py-2 rounded-lg shadow my-3 text-white flex items-center justify-center">
            <p>Agregar</p>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: true,
      categories: [],
      brands: [],
      types: [],
      products: [],
      selected: {
          brands: [],
          subcategories: this.subCatId,                    
      },
      product_id: '',
      pagination: {},
      links: {},      
    }
  },
  props: {
    subCatId: Array,
  },
  mounted() {
    // if (localStorage.brands) {
    //   this.selected.brands = localStorage.brands.split(",");
    // }
    this.loadProducts();
    this.loadBrands();    
  },
  methods: {
    loadProducts: function () {
      axios.get('/api/products', {
          params: this.selected
      })
      .then((response) => {
          this.products = response.data.data;
          this.pagination = response.data.meta;
          this.links = response.data.links;
          this.loading = false;
      })
      .catch(function (error) {
          console.log(error);
      });
    },
    loadBrands: function () {
      axios.get('/api/brands', {
          params: _.omit(this.selected, 'brands')
      })
      .then((response) => {
          this.brands = response.data.data;
      })
      .catch(function (error) {
          console.log(error);
      });
    },
    loadPagination(link){
      axios.get(link, {
          params: this.selected
      })
      .then((response) => {
          this.products = response.data.data;
          this.pagination = response.data.meta;
          this.links = response.data.links;
          this.loading = false;
      })
      .catch(function (error) {
          console.log(error);
      });
    },
    scrollToTop() {
        window.scrollTo(0,0);
    }
  },
  watch: {
    selected: {
      handler: function () {
        this.loadProducts();
        this.loadBrands();
      },
      deep: true
    }
  }
}
</script>

<style>
  /* Chrome, Safari, Edge, Opera */
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
</style>