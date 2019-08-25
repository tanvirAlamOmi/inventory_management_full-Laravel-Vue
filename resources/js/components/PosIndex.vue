<template>
    <div class="col-lg-8 " style="padding-top:15px">
        <div class="well" style="  background-color: #fff;color: #636b6f;
                font-family: 'Nunito', sans-serif;
                height: 90vh;
                overflow-x: hidden;
                overflow-y: scroll;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                ">
          <div class="field has-addons">
              <div class="control">
                <input class="input" type="text" placeholder="Search here" v-model="search" >
              </div>

              <div class="control">
                <a class="button is-primary is-rounded" @click="searchproduct()" style="text-decoration:none;background-image: linear-gradient(to bottom right, rgba(255,255,255,0.5), rgba(255,255,255,0.2) 40%, rgba(0,0,0,0.15) 60%, rgba(0,0,0,0.05));">
                  <i class="fa fa-search"></i>
                </a>
              </div>
          </div>

          <div class="productDetails">
              <productTile  :products="products"></productTile>
          </div>

        </div>
    </div>
     

</template>

<script>
  import productTile from './productTile.vue';

export default{
components:{
  productTile
},
  data: function () {
    return {
      products: [],

      search:""

    }
  },
created:function () {
  this.getdata();
},
methods:{
   getdata() {
             axios.get('/posIndex/index')
                 .then(response => {
                  this.products = response.data;
                // console.log(response);
                 })
                 .catch(errors => {
                     console.log(errors);
                 });
         },
searchproduct(){

    // console.log(this.search);
    axios.get('/posIndex/search?search_result=' + this.search)
        .then(response => {

       this.products=response.data;
      // console.log(response);


        })
        .catch(errors => {
            console.log(errors);
        });
},
}
}
</script>

<style>

</style>
