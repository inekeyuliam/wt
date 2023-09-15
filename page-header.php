
<header>
      <nav class="navbar d-flex flex-column justify-content-between navbar-expand-md navbar-light">
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          
        </button> -->
        <div class="notif">
          <p>ORIGINAL item & WARRANTY - Best price  - Buy Back WARRANTY</p>
        </div>
        <div class="d-flex align-items-center flex-row justify-content-between nav-2">
          <img src="assets/img/ic-menu.svg"  id="openMenu" />
          <div class="d-flex justify-content-between menu">

            <a class="navbar-brand" href="#"><img src="assets/img/logo-wt.svg"></a>
            <div class="d-flex justify-content-between align-items-center cta">
              <form id="search-form" action="search.php" action="GET">
                <input  name="key" type="search" class="form-control search-nav" placeholder="Search by brand or model"/>

              </form>
              <a class="navbar-brand" href="#"><img src="assets/img/ic-search.svg"></a>
              <a class="navbar-brand" href="#"><img src="assets/img/ic-message.svg"></a>
              <a class="navbar-brand wishlist" href="#"><img src="assets/img/ic-cart.svg"></a>
            </div>
          </div>
        </div>
      </nav>
   
    </header>
      <nav class="slideMenu d-flex flex-column "style="left: -576px;">
        <a onclick="closeMenu()">
        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="16" viewBox="0 0 29 16" fill="none">
        <path d="M28.1404 7.06245H3.69268L9.31738 1.43774L7.99158 0.111938L0.103516 8L7.99158 15.8881L9.31738 14.5623L3.69256 8.93745H28.1404V7.06245Z" fill="black"/>
        </svg></a>
        <img src="assets/img/logo-wt.svg" style="height: 64px;width: 64px;">
        <ul>
            <li><a class="side-menu side-index active" href="index.php" >Home</a></li>
            <li><a class="side-menu side-about " href="about.php">About</a></li>
            <li>
              <div class="side-menu dropdown">
                <button class="side-menu btn btn-dropdown dropdown-toggle brand" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  brands
                </button>
                <?php
                  $str = 'select * from master_jenis';
                  $sql = mysqli_query($conn,$str);
                ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <?php
								    while($row = mysqli_fetch_array($sql)){
                      $nama = $row['nama'];
                      echo '<li><a class="side-menu dropdown-item" href="collection.php?brand='.$row['id'].'">'.$nama.'</a></li>';
                    }
                  ?>
                </ul>
              </div>
            </li>
            <li>
              <div class="side-menu dropdown ">
                <button class="side-menu btn btn-dropdown dropdown-toggle collection" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  collections
                </button>
                <?php
                  $str = 'select * from master_collections';
                  $sql = mysqli_query($conn,$str);
                ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <?php
								    while($row = mysqli_fetch_array($sql)){
                      $nama = $row['name'];
                      echo '<li><a class="side-menu dropdown-item" href="collection.php?collection='.$row['id'].'">'.$nama.'</a></li>';
                    }
                  ?>
                </ul>
              </div>
            </li>
            <li><a class="side-menu side-sell" href="sell.php">Sell/Trade</a></li>
        </ul>
      </nav>
      <div id="whatsapp-button">
				<a  href="https://wa.me/6281234560784"  target="_blank"><img src="assets/img/wa.png" style="height: 34px;width: 34px;"/></a>
			</div>
      <div id="wishlist-popup" class="popup d-none">
          <div class="popup-content d-flex flex-column">
            <div class="header-your-wishlist">your wishlist</div>
            <!-- <span class="close-popup">&times;</span> -->
            <div class="d-flex flex-column" id="wishlist-items">
                  <!-- Favorite items will be added here dynamically -->
            </div>
            <div class="footer-your-wishlist d-flex justify-content-end">
              <button class="close-popup">Close</button>
              <a href="https://wa.me/6281234560784" class="buy-now-wishlist">Buy Now</a>

            </div>
          </div>
      </div>


