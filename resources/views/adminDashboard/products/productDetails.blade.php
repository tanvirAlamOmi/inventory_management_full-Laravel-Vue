@extends('adminDashboard.master')

@section('title')
    View Product
@endsection

@section('mainContent')

<style>
  #app {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  width: 600px;
  max-width: 100%;
  margin: 50px auto;
  position: relative;
}

.image {
  width: 400px;
  max-width: 100%;
}

.expandable-image {
  position: relative;
  transition: 0.25s opacity;
  cursor: zoom-in;
}

body > .expandable-image.expanded {
  position: fixed;
  z-index: 999999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: black;
  display: flex;
  align-items: center;
  opacity: 0;
  padding-bottom: 0 !important;
  cursor: default;
}

body > .expandable-image.expanded > img {
  width: 100%;
  max-width: 1200px;
  max-height: 100%;
  object-fit: contain;
  margin: 0 auto;
}

body > .expandable-image.expanded > .close-button {
  display: block;
}

.close-button {
  position: fixed;
  top: 10px;
  right: 10px;
  display: none;
  cursor: pointer;
}
svg {
  filter: drop-shadow(1px 1px 1px rgba(0,0,0,0.5));
}
svg path {
  fill: #FFF;
}
.expand-button {
  position: absolute;
  z-index: 999;
  right: 10px;
  top: 10px;
  padding: 0px;
  align-items: center;
  justify-content: center;
  padding: 3px;
  opacity: 0;
  transition: 0.2s opacity;
}

.expandable-image:hover .expand-button {
  opacity: 1;
}
.expand-button svg {
  width: 20px;
  height: 20px;
}
.expand-button path {
  fill: #FFF;
}

.expandable-image img {
  width: 100%;
}

</style>
<br>
<div id="page-wrapper"  style="background-color:"><br>
    <h3 class="text-center text-primary"> View Product</h3>
    <hr>
    <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
    <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3> 
<div class="row">



{{-- 
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalQuickView">Launch
    modal</button>
  <!-- Modal: modalQuickView -->
  <div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true"> --}}
    <div class="modal-dialog modal-lg" role="document">



      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-5">
              <!--Carousel Wrapper-->
              <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                data-ride="carousel">
                <!--Slides-->
                <div id="app" class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    {{-- <img class="d-block w-100" --}}

                    <expandable-image class="image" 
                    src="{{asset($products->image)}}" alt="dog" title="dog"></expandable-image>

                      {{-- <img src="{{asset($products->image)}}" alt=""class="d-block w-100" width="472px" height="708px"> --}}
                      {{-- src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(23).jpg" --}}
                      {{-- alt="First slide"> --}}
                  </div>
                  {{-- <div class="carousel-item">
                    <img class="d-block w-100"
                      src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(24).jpg"
                      alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100"
                      src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(25).jpg"
                      alt="Third slide">
                  </div> --}}
                </div>
                <!--/.Slides-->
                <!--Controls-->
                {{-- <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a> --}}
                <!--/.Controls-->
                {{-- <ol class="carousel-indicators">
                  <li data-target="#carousel-thumb" data-slide-to="0" class="active">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(23).jpg" width="60">
                  </li> --}}
                  {{-- <li data-target="#carousel-thumb" data-slide-to="1">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(24).jpg" width="60">
                  </li>
                  <li data-target="#carousel-thumb" data-slide-to="2">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(25).jpg" width="60">
                  </li> --}}
                {{-- </ol> --}}
              </div>
              <!--/.Carousel Wrapper-->
            </div>
            <div class="col-lg-7">
              <center><h2  class="h2-responsive product-name">
              <strong>{{$products->name}}</strong>
              </h2></center>
             <center> <h4 class="h4-responsive">
                <span class="green-text">
                  <strong>{{$products->price}} tk</strong>
                </span>
                <span class="grey-text">
                  <small>
                    <s>$89</s>
                  </small>
                </span>
              </h4></center>
  
              <!--Accordion wrapper-->
              <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
               
               
                {{-- <div class="card" style="background-color:ivory">
                  <!-- Card header -->
                  <div class="card-header" role="tab" id="headingOne1" style="display:flexbox">
                    <p data-toggle="collapse" data-parent="#accordionEx" ria-expanded="true"
                      aria-controls="collapseOne1">
                      <h4 class="mb-0">Category :</h4>
                  </p>
                  </div>
                  <!-- Card body -->
                  <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                    data-parent="#accordionEx" >
                    <div class="card-body">{!! $product->category_name !!}
                    </div>
                  </div>
                </div>
                <hr> --}}

                <!-- Accordion card -->
                <div class="card" style="background-color:ivory">
  
                  <!-- Card header -->
                  
                  <div class="card-header" role="tab" id="headingOne1" style="display:flexbox">
                    <p data-toggle="collapse" data-parent="#accordionEx" ria-expanded="true"
                      aria-controls="collapseOne1">
                      <h4 class="mb-0">Product Description :</h4>
                  </p>
                  </div>
  
                  <!-- Card body -->
                  <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                    data-parent="#accordionEx" >
                    <div class="card-body">{{ $products->description }}
                    </div>
                  </div>
                </div>

                <hr>

                <div class="card" style="background-color:ivory">
  
                    <!-- Card header -->
                    
                    <div class="card-header" role="tab" id="headingOne1" style="display:flexbox">
                      <p data-toggle="collapse" data-parent="#accordionEx" ria-expanded="true"
                        aria-controls="collapseOne1">
                        <h4 class="mb-0">Product Code :</h4>
                    </p>
                    </div>
    
                    <!-- Card body -->
                    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                      data-parent="#accordionEx" >
                      <div class="card-body">{{ $products->code }}
                      </div>
                    </div>
                  </div>
                  <hr>
                
                  <div class="card" style="background-color:ivory">
  
                      <!-- Card header -->
                      
                      <div class="card-header" role="tab" id="headingOne1" style="display:flexbox">
                        <p data-toggle="collapse" data-parent="#accordionEx" ria-expanded="true"
                          aria-controls="collapseOne1">
                          <h4 class="mb-0">Product Bar Code :</h4>
                      </p>
                      </div>
      
                      <!-- Card body -->
                      <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                        data-parent="#accordionEx" >
                        <div class="card-body">{{ $products->barCode }}
                        </div>
                      </div>
                    </div>
                    <hr>

                    <div class="card" style="background-color:ivory">
  
                        <!-- Card header -->
                        
                        <div class="card-header" role="tab" id="headingOne1" style="display:flexbox">
                          <p data-toggle="collapse" data-parent="#accordionEx" ria-expanded="true"
                            aria-controls="collapseOne1">
                            <h4 class="mb-0">Product Status :</h4>
                        </p>
                        </div>
        
                        <!-- Card body -->
                        <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                          data-parent="#accordionEx" >
                          <div class="card-body">{{ $products->is_published == 1 ? 'Published' : 'Unpublished' }}
                          </div>
                        </div>
                      </div>
                <!-- Accordion card -->
              </div>
              <!-- Accordion wrapper -->
  
  
              <!-- Add to Cart -->
              <br>
              <div class="card-body">
                {{-- <div class="row">
                  <div class="col-md-6">
  
                    <label>Select color</label>
                    <select class="md-form mdb-select colorful-select dropdown-primary">
                      <option value="" disabled selected>Choose your option</option>
                      <option value="1">White</option>
                      <option value="2">Black</option>
                      <option value="3">Pink</option>
                    </select>
  
                  </div>
                  <div class="col-md-6">
  
                    <label>Select size</label>
                    <select class="md-form mdb-select colorful-select dropdown-primary">
                      <option value="" disabled selected>Choose your option</option>
                      <option value="1">XS</option>
                      <option value="2">S</option>
                      <option value="3">L</option>
                    </select>
  
                  </div>
                </div> --}}
                <br><hr>

                <div class="text-center">

                    <a class="btn btn-danger" style="width:100%" href="{{url('/products/manage')}}" >
                    <strong>Close</strong>  
                  </a>
                  {{-- <button class="btn btn-primary">Add to cart
                    <i class="fas fa-cart-plus ml-2" aria-hidden="true"></i>
                  </button> --}}
                </div>
                <hr>
              </div>
              <!-- /.Add to Cart -->
            </div>
          </div>
        </div>
      {{-- </div> --}}



    </div>
  </div>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>

  <script type="text/x-template" id="expandable-image">
    <div
      class="expandable-image"
      :class="{
        expanded: expanded
      }"
      @click="expanded = true"
    >
      <i
        v-if="expanded"
        class="close-button"
      >
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
          <path fill="#666666" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
        </svg>
      </i>
      <i
        v-if="!expanded"
        class="expand-button"
      >
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
          <path fill="#000000" d="M10,21V19H6.41L10.91,14.5L9.5,13.09L5,17.59V14H3V21H10M14.5,10.91L19,6.41V10H21V3H14V5H17.59L13.09,9.5L14.5,10.91Z" />
        </svg>
      </i>
      <img v-bind="$attrs"/>
    </div>
  </script>


<script>
    $(document).ready(function() {
    $('.mdb-select').materialSelect();
    });
    Vue.component('expandable-image', {
    template: '#expandable-image',
    data () {
      return {
        expanded: false,
        closeButtonRef: null
      }
    },

    methods: {
      closeImage (event) {
        this.expanded = false
        event.stopPropagation()
      },
      freezeVp (e) {
        e.preventDefault()
      }
    },

    watch: {
      expanded (status) {
        this.$nextTick(() => {
          if (status) {
            this.cloned = this.$el.cloneNode(true)
            this.closeButtonRef = this.cloned.querySelector('.close-button')
            this.closeButtonRef.addEventListener('click', this.closeImage)
            document.body.appendChild(this.cloned)
            document.body.style.overflow = 'hidden'
            this.cloned.addEventListener('touchmove', this.freezeVp, false);
            setTimeout(() => {
              this.cloned.style.opacity = 1
            }, 0)
          } else {
            this.cloned.style.opacity = 0
            this.cloned.removeEventListener('touchmove', this.freezeVp, false);
            setTimeout(() => {
              this.closeButtonRef.removeEventListener('click', this.closeImage)
              this.cloned.remove()
              this.cloned = null
              this.closeButtonRef = null
              document.body.style.overflow = 'auto'
            }, 250)
          }
        })
      }
    }
  })

  new Vue({
    el: '#app',
    mounted () {
      const viewportMeta = document.createElement('meta')
      viewportMeta.name = 'viewport'
      viewportMeta.content = 'width=device-width, initial-scale=1'
      document.head.appendChild(viewportMeta)
    }
  })
</script>
  
@endsection