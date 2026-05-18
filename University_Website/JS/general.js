(function() {
    const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('nav-menu');
        if (hamburger && navMenu) {
            hamburger.addEventListener('click', function(e) {
            e.stopPropagation();
                navMenu.classList.toggle('active');
                });
                 // optional: close menu when clicking a link
                 const navLinks = navMenu.querySelectorAll('a');
                 navLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        if (window.innerWidth <= 768) {
                            navMenu.classList.remove('active');
                        }
                    });
            });
        }

    function attachMobileDropdownHandlers() {
        if (mobileHandlersAttached) return;
        
        // Handle main dropdowns (Our Services)
        const mainDropdowns = document.querySelectorAll('.dropdown');
        mainDropdowns.forEach(dropdown => {
            const toggleLink = dropdown.querySelector(':scope > a');
            const menu = dropdown.querySelector(':scope > .dropdown-menu');
            if (toggleLink && menu) {
                const handler = function(e) {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        e.stopPropagation();
                        // Close other open dropdowns
                        document.querySelectorAll('.dropdown-menu.show-mobile').forEach(otherMenu => {
                            if (otherMenu !== menu) otherMenu.classList.remove('show-mobile');
                        });
                        menu.classList.toggle('show-mobile');
                    }
                };
                toggleLink.addEventListener('click', handler);
                dropdownClickHandlers.push({ element: toggleLink, handler });
            }
        });
        // Handle subdropdown (Training Services, Software Products)
        const subdropdown = document.querySelectorAll('.subdropdown');
        subdropdown.forEach(subdropdown => {
            const toggleSpan = subdropdown.querySelector(':scope > span');
            const submenu = subdropdown.querySelector(':scope > .submenu');
            if (toggleSpan && submenu) {
                const handler = function(e) {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        e.stopPropagation();
                        // Close sibling submenus within same parent dropdown
                        const parentMenu = subdropdown.closest('.dropdown-menu');
                        if (parentMenu) {
                            parentMenu.querySelectorAll('.submenu.show-mobile').forEach(otherSub => {
                                if (otherSub !== submenu) otherSub.classList.remove('show-mobile');
                            });
                        }
                        submenu.classList.toggle('show-mobile');
                    }
                };
                toggleSpan.addEventListener('click', handler);
                dropdownClickHandlers.push({ element: toggleSpan, handler });
            }
        });  
        mobileHandlersAttached = true;
    }
    // Initial check
    checkScreenAndApply();
})();