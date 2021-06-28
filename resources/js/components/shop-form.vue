<template>
  <div class="w-full md:w-1/5 md:pt-6">
    <div @click="showFilters = !showFilters" class="w-11/12 mx-auto bg-denim-blue text-center text-white px-5 py-2 rounded-md cursor-pointer transform hover:scale-105">
      <span class="inline-block px-5 font-bold">Filtros</span>
      <svg class="w-6 h-6 inline-block ml-5 border-white fill-current text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
    </div>
    <form action="" class="py-5" v-show="showFilters">
        <div class="w-11/12 m-auto text-md py-1 rounded-md shadow-md font-bold">
          <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
          Ordenar
        </div>
        <div class="py-2">
          <div class="w-11/12 m-auto py-1">
            <select v-model="selected.sort" id="" name="sort" class="block appearance-none w-full bg-white border border-blue-300 curosor-pointer hover:border-blue-500 px-4 py-1 pr-8 rounded shadow-lg leading-tight focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:shadow-outline">
                <option value="">Seleccione un elemento</option>
                <option value="asc" class="font-bold text-black italic" >Precio Menor a Mayor</option>
                <option value="desc" class="font-bold text-black italic" >Precio Mayor a Menor</option>
            </select>
          </div>
        </div>
        <div class="w-11/12 border-2 text-center m-auto py-2 text-lg rounded-md shadow-md font-bold">Marca</div>
        <div class="py-2">
          <div class="w-11/12 m-auto py-1 px-6" v-for="(brand, index) in brands" v-bind:key="brand.id" v-show="brand.products_count > 0">
            <input type="checkbox" name="brands[]" class="w-4 h-4" :value="brand.id" :id="'brand-'+ index" v-model="selected.brands">
            <label :for="'brand-'+ index" class="px-4 h-4"> <span>{{ brand.name }} ({{ brand.products_count }})</span></label>
          </div>
        </div>
        <div class="w-11/12 border-2 text-center m-auto py-2 text-lg rounded-md shadow-md font-bold">Tipo de Producto</div>
        <div class="py-2">
          <div class="w-11/12 m-auto py-1 px-6" v-for="(type, index) in types" v-bind:key="type.id" v-show="type.products_count > 0">
            <input type="checkbox" name="types[]" class="w-4 h-4" :value="type.id" :id="'type-'+ index" v-model="selected.types">
            <label :for="'type-'+ index" class="px-4 h-4"> <span>{{ type.name }} ({{ type.products_count }})</span></label>
          </div>
        </div>
    </form>
  </div>
  <div class="w-full md:w-4/5">
    <div class="w-11/12 py-5 flex flex-wrap mx-auto">
      <div class="w-1/2 md:w-1/6 md:mx-3 border-2 rounded-lg shadow transform hover:scale-105 flex flex-col justify-between"  v-for="product in products" v-bind:key="product.id">
        
          <a v-bind:href="'/product/' + product.slug"><img v-bind:src="'/storage/' + product.img_url" alt="" class="w-full h-full"></a>
          <div>            
            <p>{{ product.brand }}</p>
            <a v-bind:href="'/product/' + product.slug"><p class="py-2 text-sm md:text-md">{{ product.name }}</p></a>
            <p class="font-bold" v-bind:class="[product.product_discount ? 'text-xs line-through' : 'text-lg']">$ {{ product.price }}</p>
            <p v-if="product.product_discount" class="text-lg text-red-600 font-bold">$ {{ product.product_discount }}</p>
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
    <div class="w-full">
      <div class="w-2/3 md:w-1/5 border-2 bg-denim-blue mx-auto rounded-lg shadow flex justify-between items-center text-white font-bold">
        <a @click="loadPagination(this.links.prev)" v-bind:class="[this.links.prev == null ? 'opacity-50' : 'cursor-pointer']">
          <svg class="w-10 h-8 border-2 border-white rounded-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <p>pagina {{ this.pagination.current_page }} de {{ this.pagination.last_page }}</p>
        <a @click="loadPagination(this.links.next)" v-bind:class="[this.links.next == null ? 'opacity-50' : 'cursor-pointer']">
          <svg class="w-10 h-8 border-2 border-white rounded-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
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
      showFilters : false,
      categories: [],
      brands: [],
      types: [],
      products: [],
      selected: {
          brands: [],
          types: [],
          subcategories: this.subCatId,
          sort: null,               
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
    if (localStorage.brands) {
      this.selected.brands = localStorage.brands.split(",");
      this.showFilters = screen.width < 760 ? false:true;
    }
    if (localStorage.types) {
      this.selected.types = localStorage.types.split(",");
      this.showFilters = screen.width < 760 ? false:true;
    }
    if (localStorage.sort) {
      this.selected.sort = localStorage.sort;
      this.showFilters = screen.width < 760 ? false:true;
    }
    this.loadProducts();
    this.loadBrands();
    this.loadTypes();
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
    loadTypes: function () {
      axios.get('/api/types', {
          params: _.omit(this.selected, 'types')
      })
      .then((response) => {
          this.types = response.data.data;
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
        localStorage.brands = this.selected.brands;
        localStorage.types = this.selected.types;
        if (this.selected.sort) {
          localStorage.sort = this.selected.sort;
        }
        this.loadProducts();
        this.loadBrands();
        this.showFilters = screen.width < 760 ? false:true;
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