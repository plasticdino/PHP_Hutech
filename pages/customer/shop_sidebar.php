<div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter border-right border-warning">
    <div class="filter-widget">
        <h4 class="fw-title">Categories</h4>
        <ul class="filter-catagories">
          <?php foreach($cates as $item) { ?>
            <li>
              <a href="shop.php?cateid=<?php echo $item["CategoryId"]; ?>"><?php echo $item["CategoryName"]; ?></a>
            </li>
          <?php } ?>
        </ul>
    </div>
    <!-- <div class="filter-widget">
        <h4 class="fw-title">Color</h4>
        <div class="fw-color-choose">
            <div class="cs-item">
                <input type="radio" id="cs-black">
                <label class="cs-black" for="cs-black">Black</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-violet">
                <label class="cs-violet" for="cs-violet">Violet</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-blue">
                <label class="cs-blue" for="cs-blue">Blue</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-yellow">
                <label class="cs-yellow" for="cs-yellow">Yellow</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-red">
                <label class="cs-red" for="cs-red">Red</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-green">
                <label class="cs-green" for="cs-green">Green</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Size</h4>
        <div class="fw-size-choose">
            <div class="sc-item">
                <input type="radio" id="s-size">
                <label for="s-size">s</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="m-size">
                <label for="m-size">m</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="l-size">
                <label for="l-size">l</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="xs-size">
                <label for="xs-size">xs</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Tags</h4>
        <div class="fw-tags">
            <a href="#">Towel</a>
            <a href="#">Shoes</a>
            <a href="#">Coat</a>
            <a href="#">Dresses</a>
            <a href="#">Trousers</a>
            <a href="#">Men's hats</a>
            <a href="#">Backpack</a>
        </div>
    </div> -->
</div>
