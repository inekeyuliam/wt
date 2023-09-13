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
    const currentPageUrl = window.location.href;
    var parts = currentPageUrl.split("/");

    // Get the last part of the URL
    var lastPart = parts[parts.length - 1];
    console.log(lastPart)


    // Loop through menu items to check if they match the current URL
    menuItems.forEach((menuItem) => {
        const menuItemLink = menuItem.querySelector('a');
        const menuItemUrl = menuItemLink.attr('href');

        if (lastPart === menuItemUrl) {
            // If the current URL matches the menu item's URL, add an 'active' class
            $('.side-menu').removeClass('active');

            menuItemLink.classList.add('active');
        }
    });
    </script>