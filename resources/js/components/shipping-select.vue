<template>
    <div class="w-full md:w-1/3">
        <h1 class="font-bold text-lg border-b-2 py-1 pl-5 md:pl-1">Datos de Envio</h1>
        <div class="w-full py-2 md:px-4 pl-4">
            <label for="c_direccion" class="md:px-1 w-1/4 text-gray-600 inline-block">Direccion:</label>
            <input type="text" name="c_direccion" placeholder="Ingreasa tu direccion" required class="w-4/6 inline-block bg-gray-50 border-2 text-sm lg:text-md rounded border-blue-300 p-1 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-700">
        </div>
        <div class="w-full py-2 md:px-4 pl-4">
            <label for="c_region" class="md:px-1 w-1/4 text-gray-600 inline-block">Region:</label>
            <select v-model="regionSelected" name="c_region" id="" class="w-4/6 inline-block bg-gray-50 border-2 text-sm lg:text-md rounded border-blue-300 p-1 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-700">
                <option selected disabled>Selecciona tu Region</option>
                <option class="font-bold text-black italic" v-for="region in regiones" v-bind:key="region.regionId" v-bind:value="region.regionId">{{ region.regionName }}</option>
            </select>
        </div>
        <div class="w-full py-2 md:px-4 pl-4">
            <label for="c_comuna" class="md:px-1 w-1/4 text-gray-600 inline-block">Comuna:</label>
            <select v-model="comunaSelected" name="c_comuna" id="" class="w-4/6 inline-block bg-gray-50 border-2 text-sm lg:text-md rounded border-blue-300 p-1 shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-700">
                <option selected disabled>Selecciona tu Comuna</option>
                <option class="font-bold text-black italic" v-for="comuna in comunas" v-bind:key="comuna.countyCode" v-bind:value="comuna.countyCode">{{ comuna.countyName }}</option>
            </select>
        </div>
    </div>
    <div class="w-full md:w-2/3 py-4 md:py-8 text-center md:justify-between md:flex md:px-12">
        <div class="text-left pl-5 md:pl-0">
            <p class="">Sub Total: <strong class="px-2 text-lg md:text-xl"> {{ new Intl.NumberFormat('es-CL', {currency: 'CLP', style: 'currency'}).format(total) }}</strong></p>
            <p class="">Sub Total: <strong class="px-2 text-lg md:text-xl"> {{ new Intl.NumberFormat('es-CL', {currency: 'CLP', style: 'currency'}).format(this.envio) }}</strong></p>
            <!-- <p class="">Envio: <strong class="px-2 text-lg md:text-xl"> $ {{ number_format(3000,  0, '.', '.') }}</strong></p>
            <p class="">Total: <strong class="px-2 text-lg md:text-xl"> $ {{ number_format($total,  0, '.', '.') }}</strong></p> -->
        </div>
        <button type="submit" class="w-1/2 md:w-2/5 bg-denim-blue border-0 rounded-lg p-2 text-white">Avanzar</button>
    </div>
</template>

<script>
export default {
    data(){
        return{
            regiones: [],
            comunas: [],
            envio: 80,
            comunaSelected: String,
            regionSelected: String,
        }
    },
    props: {'total' : Number, 
            'cartIds' : Array},
    mounted(){
        this.loadRegiones();
    },
    methods: {
        loadRegiones: function () {
            axios.get('https://testservices.wschilexpress.com/georeference/api/v1.0/regions', {        
            }).then((response) => {
                this.regiones = response.data.regions;
            }).catch(function (error) {
                console.log(error);
            });
        },
        loadComunas(id) {
            axios.get('https://testservices.wschilexpress.com/georeference/api/v1.0/coverage-areas?RegionCode=' + id +'&type=0').then((response) => {
                this.comunas = response.data.coverageAreas;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        setEnvio(comuna){
            console.log(this.cartIds);
            axios.get('/api/shipping', {
                params: {
                    cartIds: this.cartIds,
                }
            }).then((response) => {
                console.log(response);
            }).catch(function (error) {
                console.log(error);
            });
            // axios({
            //     method: 'post', //you can set what request you want to be
            //     url: 'https://testservices.wschilexpress.com/rating/api/v1.0/rates/courier',
            //     data: {
            //         "originCountyCode": "SFER",
            //         "destinationCountyCode": comuna,
            //         "package": {
            //             "weight": "16",
            //             "height": "1",
            //             "width": "1",
            //             "length": "1"
            //         },
            //         "productType": 3,
            //         "contentType": 1,
            //         "declaredWorth": "2333",
            //         "deliveryTime": 0
            //     },
            //     headers: {
            //         "Content-Type": "application/json",
            //         "Cache-Control": "no-cache",
            //         "Ocp-Apim-Subscription-Key": "3cd47c22f3d54a89affc94f957b30e64",
            //     }
            // })
            // .then(function (response) {
            //     console.log(response.data.data.courierServiceOptions[0].serviceValue);
            // })
            // .catch(function (error) {
            //     console.log(error);
            // }); 
        }
    },
    watch: {
    regionSelected: {
      handler: function () {
        this.loadComunas(this.regionSelected);
      }
    },
    comunaSelected: {
      handler: function () {
        this.setEnvio(this.comunaSelected);
      }
    }
  }
}
</script>

<style>

</style>