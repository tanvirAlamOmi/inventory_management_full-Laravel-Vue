<template>

    <div class="col-lg-4"  style="padding-top:5vh;">
        <div class="well" style="  background-image: linear-gradient(#ff9200 , ivory);
                height: 80vh;
                margin: 0;
                position: fixed; 
                right: 12px;
                color:black;
                width: 25vw    ;
                overflow-x: hidden;
                overflow-y: scroll;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="notify"><span id="notifyType" class=""></span></div>
                <ul style="margin-top:0px">
                    <b-field label="Name">
                        <b-input name="name" id="name" placeholder="Name" type="text"></b-input>
                    </b-field>
                    <b-field label="Mobile Num">
                        <b-input name="phone"  id="phone" placeholder="01***-******" type="tel" min="0" max="9"  pattern="[0-9]{5}-[0-9]{6}"></b-input>
                    </b-field>
                </ul>

            <hr>
            <div style="right:50px"> 
                <table class="table table-bordered">
                    <thead style="background-color:rgba(255,255,0,0.3); color:floralwhite">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody v-for="productdata in productdatas" :key="productdata.id">
                    <td>{{productdata.name}}</td>
                    <td>{{productdata.price}}</td>
                    <td>
                        <a v-on:click="incrementquantity(productdata)" style="text-decoration:none;">
                         <span class="fa-stack fa-sm decbutton">
                            <i class="fa fa-square fa-stack-2x light-grey"></i>
                            <i class="fa fa-plus fa-stack-1x fa-inverse white"></i>
                        </span>
                        </a>

                        {{productdata.quantity}}

                        <a v-on:click="decrementquantity(productdata)" style="text-decoration:none;">
                        <span class="fa-stack fa-sm decbutton">
                            <i class="fa fa-square fa-stack-2x light-grey"></i>
                            <i class="fa fa-minus fa-stack-1x fa-inverse white"></i>
                        </span>
                        </a>
                    </td>
                    <td>{{productdata.total}}</td>
                    </tbody>
                    <thead>
                    <tr style="background-color:rgba(255,255,0,0.3)">
                        <th></th>
                        <th></th>
                        <th>Total</th>
                        <th id='totalprice'>{{ grandtotal }}</th>
                    </tr>
                    <tr  style="background-color:rgba(255,255,0,0.3); color:floralwhite;">
                        <th></th>
                        <th></th>
                        <th>Paid</th>
                        <th ><input class="form-control" v-model="paid" type="text" pattern="\d+"></th>
                    </tr>
                    <tr  style="background-color:rgba(255,255,0,0.3); color:black;">
                        <th></th>
                        <th></th>
                        <th>Due</th>
                        <th>{{due}}</th>
                    </tr>
                    </thead>
                </table>
                
                <b-button class="is-danger" style="width:50%"  v-on:click="confirmCancel">Cancel</b-button>
                <b-button class="is-success"  style="float:right;width:50%" v-on:click="details(productdatas)" >Invoice</b-button>
                </div>
            
        </div>
    </div>
            
</template>
<script>
import {EventBus} from '../app';
    export default {
        data:function(){
             return{
                productdatas:[],
                grandtotal: 0,
                paid: 0,
             }
        },
        created(){
            EventBus.$on('productid',(data)=>{

                let flag = this.productdatas.find(p => p.id == data.id);
                // console.log(flag);
                if(flag != undefined){
                    for(let i=0;i<this.productdatas.length;i++){
                        if(this.productdatas[i].id == flag.id){
                            if(this.productdatas[i].quantity<flag.current_stock){
                                this.productdatas[i].quantity++;
                                this.productdatas[i].total+=flag.price;
                                this.grandtotal += data.price;
                            }
                        else{
                            $(".notify").toggleClass("active");
                            $("#notifyType").toggleClass("empty");
                            
                            setTimeout(function(){
                                $(".notify").removeClass("active");
                                $("#notifyType").removeClass("empty");
                            },1000);
                        }
                        }
                     }
                    }
                else{
                    data.quantity = 1;
                    data.total = data.price;
                    this.productdatas.push(data);
                    this.grandtotal += data.price;
                }
            })
        }, 

        computed: {
    	due(){
           var due = parseInt(this.grandtotal) - parseInt(this.paid);
           if(isNaN(due)){
                return this.grandtotal;
           }
           else{
                return due;
           }
        }
        },
        methods:{
            incrementquantity: function(p){
                for(let i=0;i<this.productdatas.length;i++){
                    if(this.productdatas[i].id == p.id ){
                        if(this.productdatas[i].quantity<p.current_stock){
                        this.productdatas[i].quantity++;
                        this.productdatas[i].total+=p.price;
                        this.grandtotal += p.price;
                        }
                        else{
                             $(".notify").toggleClass("active");
                            $("#notifyType").toggleClass("empty");
                            
                            setTimeout(function(){
                                $(".notify").removeClass("active");
                                $("#notifyType").removeClass("empty");
                            },1000);
                        }
                    }
                }
            },

            decrementquantity: function(p){
                for(let i=0;i<this.productdatas.length;i++){
                    if(this.productdatas[i].id == p.id){
                        if(p.quantity>=1){
                            this.productdatas[i].quantity--;
                            this.productdatas[i].total -= p.price;
                            this.grandtotal -= p.price;
                            }
                        else if(p.quantity == 0){
                            
                                this.productdatas.splice(i,1);
                        }
                    }
                
                }
            },

            confirmCancel:function(){
                var r = confirm("Are You Sure to Cancel!");
                 if (r == true) {
                location.href='/posIndex/view';
                } else {
                }
            },

            call:function(p){
                for(let i=0;i<p.length;i++){
                let product = p[i].name;
                let quantity = p[i].quantity;
                const data = {};
                data['product'] = product;
                data['quantity'] = quantity;
                axios.post('/posIndex/invoice', data)
                    .then(response => {
                        this.product=response.data;
                        console.log(response);
                    })
                    .catch(function (error) {
                    console.log(error);
                    });
                }
            },
            
            details:function(p){
                const data = {};

                data['name'] = $('#name')[0].value;
                data['phone'] = $('#phone')[0].value;
                data['total'] = $('#totalprice')[0].innerHTML;
                axios.post('/posIndex/saleData',data)
                    .then(response => {
                        
                        console.log(response);
                    })
                    .catch(function (error) {
                    console.log(error);
                    });

                
                this.call(p);
                
            },
            
        }
    }
</script>

<style>
.notify{  
  position:sticky;
  top: 0px;
  right: 0px;
  width: 100%;
  box-sizing:border-box;
  color:white;  
  text-align:center;
  background:red;
  overflow:hidden;
  box-sizing:border-box;
  transition:height .2s;
}

#notifyType:before{
  display:block;
  margin-top:10px; 
  
}

.active{  
  height:50px;
  z-index: 2;
}

.empty:before{
  Content:"Empty Inventory!";
}

</style>
