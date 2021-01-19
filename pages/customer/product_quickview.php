<div class="modal fade" id="quickview" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" onClick="window.location.reload();" class="close" data-dismiss="modal">
                    <span>&times</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">

                        <!--  SIDE IMAGE SLIDE-->
                      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ul class="carousel-indicators">

                        </ul>
                        <div class="carousel-inner">

                        </div>

                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>

                    <!-- PRODUCT CONTENT -->
                    <div class="col-md-6 product_content">
                        <h4 id="s_product_name"></h4>
                        <div class="quickview-ratting-review">
                            <div class="quickview-stock">
                                <h6 id="s_product_storage" class="fa fa-check-circle-o"></h6>
                            </div>
                        </div>

                        <h3></h3>
                        <span></span>
                        <div class="product-details">
                          <div class="pi-text">
                              <div class="catagory-name">
                                <h5 id="s_product_cateid"></h5></div>
                              <div class="product-price">
                                <h4 style=" color: #e7ab3c; font-size: 20px;
                                font-weight: 700;" id="s_product_sale"></h4>
                                Original Price: <h6 id="s_product_price"></h6>
                                
                              </div>
                          </div>
                        </div>
                        <div class="product-details">
                          <p id="s_product_description"></p>
                        </div>
                        <div class="product-details">
                            <div class="add-to-cart">
                                Quantity
                            </div>
                            <!-- end col -->
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" />
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <div class="quick-button">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
