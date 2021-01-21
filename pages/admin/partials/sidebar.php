<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#detail" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-star menu-icon"></i>
              <span class="menu-title">Shop Detail</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="detail">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="shop_detail.php"> Show shop detail </a></li>
                <li class="nav-item"> <a class="nav-link" href="shop_detail_edit.php"> Edit shop detail</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#cate" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-book menu-icon"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cate">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="category_list.php"> Show category list </a></li>
                <li class="nav-item"> <a class="nav-link" href="category_add.php"> Add new category</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#pro" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-book-open-page-variant menu-icon"></i>
              <span class="menu-title">Product</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pro">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="product_list.php"> Show product list </a></li>
                <li class="nav-item"> <a class="nav-link" href="product_add.php"> Add new product </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-account-card-details menu-icon"></i>
              <span class="menu-title">User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="user_list.php"> Show user list </a></li>
                <li class="nav-item"> <a class="nav-link" href="user_add.php"> Add new user</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-calendar-multiple-check menu-icon"></i>
              <span class="menu-title">Order</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="order">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./order_list.php"> Show order list </a></li>
                <li class="nav-item"> <a class="nav-link" href=""> Add new order</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
