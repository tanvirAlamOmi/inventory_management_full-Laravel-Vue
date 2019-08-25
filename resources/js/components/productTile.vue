<template>

 <div class="columns is-multiline">
    <div class="column is-3" v-for="product in products" :key="product.id">
      <a v-on:click="counterid(product)" style="text-decoration:none;">
       <div class="card polaroid"  id="img-hover-zoom">
         <div class="card-image" style=" position: relative">
           <figure class="image is-3by4" >  
             <img :src="product.image" alt="Placeholder image"  >
           </figure>
          
         </div>
         <div class="card-content bottomleft">
             <div class="media-content" >
                 <p class="is-size-6 is-bold">{{product.name}}</p>
                 <!-- <p id="dispalyhide" class="">{{product.product_catagory}}</p> -->
                <p><span  class="is-size-6" ></span> BDT {{product.price }}</p>
           </div>
         </div>
       </div>
      </a>
    </div>
</div>
</template>

<script>
import {EventBus} from '../app';
 export default{
   props:{
     products:{
       type:Array
     }
   },
   data:function(){
   return{
      counter:0
   }
   },
   methods:{
     counterid: function(p){
      // this.counter++;
      EventBus.$emit('productid',p);
      // console.log(p);
     }
   }
 }
</script>

<style scoped>
/* #img-hover-zoom img{
  opacity: 0.6;
  filter: alpha(opacity=60);

  border: 1px solid rgb(75, 74, 74);
  background-color: white;
} */
#dispalyhide{
  display: none;

}
#img-hover-zoom:hover{
  /* filter: grayscale(0);
  transform: scale(1.0); */
  background-color: white;
  box-shadow: 0px 0px 10px 10px #aaaaaa;
  display: block; 
  color:black;
}
/* .bottomleft {
  position: absolute;
  bottom: 8px;
  left: 16px;
  font-size: 18px;
} */
div.polaroid {
  width: 80%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
}
</style>



