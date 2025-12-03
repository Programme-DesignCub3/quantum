document.addEventListener('alpine:init', () => {
    Alpine.store('menuDrawer', {
        open: false,
        isMenuOpen: true,
        currentMenu: null,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
        openMenu(menu) {
            this.isMenuOpen = false;
            this.currentMenu = menu;
        },
        closeMenu() {
            this.isMenuOpen = true;
            this.currentMenu = null;
        }
    })
    Alpine.store('searchDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    })
    Alpine.store('contactDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    })
    Alpine.store('productDrawer', {
        open: false,
        data: null,
        openDrawer(data) {
            this.open = true
            this.data = data
        },
        closeDrawer() {
            this.open = false
            this.data = null
        },
    })
    Alpine.store('contactCallDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    })
    Alpine.store('contactWhatsAppDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    })
    Alpine.store('contactEmailDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    })
    Alpine.store('contactOfficeDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    })
    Alpine.store('contactSocmedDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    })
    Alpine.store('shareDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    })
    Alpine.store('numberModelDrawer', {
        open: false,
        isMenuOpen: true,
        currentMenu: null,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
        openMenu(menu) {
            this.isMenuOpen = false;
            this.currentMenu = menu;
        },
        closeMenu() {
            this.isMenuOpen = true;
            this.currentMenu = null;
        }
    })
    Alpine.store('premiumRecipeDrawer', {
        open: false,
        isPremium: true,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
        registerPremium(status) {
            this.isPremium = status;
            this.open = false;
        }
    })
    Alpine.store('brochureCatalogDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    })
})

