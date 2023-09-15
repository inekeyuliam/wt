  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
    const openMenuButton = document.getElementById('openMenu');
    const slideMenu = document.querySelector('.slideMenu');
    const content = document.querySelector('.content');

        
    // Function to close the menu
    function closeMenu() {
        slideMenu.style.left = '-576px';
        // content.classList.remove('menu-opened');
    }

    openMenuButton.addEventListener('click', function () {
        if (slideMenu.style.left === '-576px') {
            slideMenu.style.left = '0';
            // content.classList.add('menu-opened');
        } else {
            closeMenu(); // Close the menu when the button is clicked again
        }
    });

    // Close the menu when a menu item is clicked
    const menuItems = document.querySelectorAll('.slideMenu ul li a');
    menuItems.forEach((menuItem) => {
        menuItem.addEventListener('click', () => {
            closeMenu();
        });
    });

    // Get the current page URL (you can replace this with the actual URL)
    const currentUrl = window.location.href;
    var parts = currentUrl.split("/");

    // Get the last part of the URL
    var lastPart = parts[parts.length - 1];
    console.log(lastPart)

    // Get all the links in the unordered list
    var links = document.querySelectorAll('.side-menu');
    console.log(links)
        $('.side-menu').removeClass('active');

        if(currentUrl.includes('collection.php?collection')){
            if(currentUrl.includes('collection.php?collection=0')){
                $('.brand').addClass('active')
            }else{
                $('.collection').addClass('active')
            }
        }
        else if(currentUrl.includes('collection.php?brand') ){
            $('.brand').addClass('active')
        }else if(currentUrl.includes('index.php')){
            $('.side-index').addClass('active')
        }else if(currentUrl.includes('about.php')){
            $('.side-about').addClass('active')
        }else if(currentUrl.includes('sell.php')){
            $('.side-sell').addClass('active')
        }
       

            // function removeItemFromFavorites(itemId) {
            //     const favorites = getFavorites();
            //     const index = favorites.indexOf(itemId);
            //     console.log(favorites)
            //     console.log(itemId)

            //     if (index !== -1) {
            //         console.log('tes')
            //         favorites.splice(index, 1);
            //         setFavorites(favorites);
            //         closeWishlistPopup();

            //     }
            // }
          
        $(document).ready(function () {
            $(document).on('click', '.remove-from-wishlist', function () {
                var itemId = $(this).data('item-id');
                itemId = itemId.toString();
                console.log(itemId);

                // Check if the item is already in favorites
                if (!isInFavorites(itemId)) {
                    // Add the item to favorites
                    addToFavorites(itemId);
                    // Change button color and add class
                   
                } else {
                    // Remove the item from favorites
                    removeFromFavorites(itemId);
                    // Reset button color and class
                    $('.add-to-favorite[data-item-id="'+itemId+'"]').html('Add to Favorites');
                    $('.add-to-favorite[data-item-id="'+itemId+'"]').removeClass('remove-from-favorite');
                    closeWishlistPopup();
                }
            })
            function removeFromFavorites(itemId) {
                const favorites = getFavorites();
                const index = favorites.indexOf(itemId);
                console.log(index);
                console.log(favorites);
                if (index !== -1) {
                    favorites.splice(index, 1);
                    setFavorites(favorites);
                }
            }
            function isInFavorites(itemId) {
                const favorites = getFavorites();
                return favorites.includes(itemId);
            }
            function addToFavorites(itemId) {
                const favorites = getFavorites();
                favorites.push(itemId);
                setFavorites(favorites);
            }
            function getFavorites() {
                var cookieValue = getCookie("favorites");

                var favoriteItems = [];

                if (cookieValue) {
                    favoriteItems = JSON.parse(cookieValue);
                }

                return favoriteItems;
            }
             
            function getCookie(name) {
                var cookieName = name + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var cookieArray = decodedCookie.split(';');

                for (var i = 0; i < cookieArray.length; i++) {
                    var cookie = cookieArray[i].trim();
                    if (cookie.indexOf(cookieName) === 0) {
                        return cookie.substring(cookieName.length, cookie.length);
                    }
                }

                return null;
            }
             // Function to set a cookie
            function setCookie(name, value, days) {
                const expirationDate = new Date();
                expirationDate.setDate(expirationDate.getDate() + days);
                const cookieValue = encodeURIComponent(value) + '; expires=' + expirationDate.toUTCString();
                document.cookie = name + '=' + cookieValue;
            }
            function setFavorites(favorites) {
                const favoritesCookie = JSON.stringify(favorites);
                setCookie('favorites', favoritesCookie, 365); // Cookie expires in 365 days
            }
            // Function to close the wishlist pop-up
            function closeWishlistPopup() {
                $("#wishlist-popup").addClass('d-none');
            }
            // Function to open the wishlist pop-up
            function openWishlistPopup() {
                // Get favorite items from cookies (implement this part)
                var favoriteItems = getFavorites();

                // Dynamically populate the wishlist
                var wishlistItems = $("#wishlist-items");
                wishlistItems.empty();
                var url = 'get_favorites.php';
                $.post( url, { ids: favoriteItems})
                    .done(function( data ) {
                        var html = "";
                        var obj = JSON.parse(data);


                        $.each( obj.Data , function( key, value ) {          
                            html += ` 
                            <div class="item item-wishlist d-flex align-items-center justify-content-between" data-id="${value.ID}">
                                <div class="image-wishlist">${value.Image}</div>
                                <div class="d-flex flex-column detail-item-wishlist">
                                    <h3 class="brand">${value.Brand}</h3>
                                    <div class="desc">${value.Nama}</div>
                                    <div class="price">IDR ${value.Price}</div>
                                </div>
                                <div data-item-id="${value.ID}" class="remove-from-wishlist" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M13.0605 12L18 7.0605L16.9395 6L12 10.9395L7.0605 6L6 7.0605L10.9395 12L6 16.9395L7.0605 18L12 13.0605L16.9395 18L18 16.9395L13.0605 12Z" fill="#6A6A6A"/>
                                    </svg>
                                </div>
                            </div>`;
                        
                            
                        });
                        wishlistItems.append(html);

                    }, "json");
	
                // Loop through favorite items and add them to the wishlist
                // for (var i = 0; i < favoriteItems.length; i++) {
                //     wishlistItems.append("<li>" + favoriteItems[i] + "</li>");
                // }

                // Show the popup
                $("#wishlist-popup").removeClass('d-none');
            }
          

            

            // Open wishlist pop-up when Wishlist icon is clicked
            $(".wishlist").click(function () {
                openWishlistPopup();
            });

            // Close pop-up when the close button is clicked
            $(".close-popup").click(function () {
                closeWishlistPopup();
            });
          

        });


    </script>