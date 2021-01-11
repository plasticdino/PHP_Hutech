<div class="modal fade" id="quickview" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="max-height: 459px; overflow-y: auto;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ul class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ul>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                  <div class="parent d-flex justify-content-center">
                                      <img id="show_s_product_image" alt="Product Image" />
                                  </div>
                              </div>

                                <div class="carousel-item">
                                    <div class="parent d-flex justify-content-center">
                                        <img src="..\..\media\image\product\20210104082008z2093505129688_2a3ee6c78bff038ca22b33d02dbd7feb.jpg" alt="Second slide" />
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="parent d-flex justify-content-center">
                                        <img src="..\..\media\image\product\2021010408205051+W6NcUJtL.jpg" alt="Second slide" />
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="parent d-flex justify-content-center">
                                        <img src="..\..\media\image\category\72284160_373822990230201_2131402178047246336_n.jpg" alt="Second slide" />
                                    </div>
                                </div>
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
                    <div class="col-md-6 product_content">
                        <h4 id="s_product_name"></h4>
                        <div class="quickview-ratting-review">

                            <!-- rating view -->
                            <!-- <div class="quickview-ratting-wrap">
                                <div class="quickview-ratting">
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div> -->
                            <div class="quickview-stock">
                                <h6 id="s_product_storage"><i class="fa fa-check-circle-o"></i></h6>
                            </div>
                        </div>
                        <h3></h3>
                        <span></span>
                        <div class="product-details">
                          <div class="pi-text">
                              <div class="catagory-name">
                                <h5 id="s_product_cateid"></h5></div>
                              <div class="product-price">
                                <h4 id="s_product_price"></h4>
                                  <span></span>
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
                        <a href="#" class="primary-btn">Add to cart</a>
                        <!-- <a href="#" class="btn min"><i class="ti-heart"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
