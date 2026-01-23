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
Alpine.store('productFilterDrawer', {
    open: false,
    openDrawer() { this.open = true },
    closeDrawer() { this.open = false },
})
Alpine.store('productVariantDrawer', {
    open: false,
    openDrawer() { this.open = true },
    closeDrawer() { this.open = false },
})
Alpine.store('productTypeDrawer', {
    open: false,
    openDrawer() { this.open = true },
    closeDrawer() { this.open = false },
})
Alpine.store('productSortDrawer', {
    open: false,
    openDrawer() { this.open = true },
    closeDrawer() { this.open = false },
})
Alpine.store('distributorProvinceDrawer', {
    open: false,
    openDrawer() { this.open = true },
    closeDrawer() { this.open = false },
})
Alpine.store('placeDetailDrawer', {
    open: false,
    openDrawer() { this.open = true },
    closeDrawer() { this.open = false },
})
Alpine.store('guaranteeCategoryProductDrawer', {
    open: false,
    openDrawer() { this.open = true },
    closeDrawer() { this.open = false },
})
Alpine.store('guaranteeModelProductDrawer', {
    open: false,
    openDrawer() { this.open = true },
    closeDrawer() { this.open = false },
})
Alpine.store('guaranteePurchaseDateDrawer', {
    open: false,
    openDrawer() { this.open = true },
    closeDrawer() { this.open = false },
})
Alpine.store('guaranteePlacePurchaseDrawer', {
    open: false,
    openDrawer() { this.open = true },
    closeDrawer() { this.open = false },
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
    openDrawer() {this.open = true },
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
    isPremium: false,
    formShown: false,
    footerShown: false,
    openDrawer() { this.open = true },
    closeDrawer() { this.open = false },
    registerPremium() {
        this.formShown = false;
        this.footerShown = true;
        this.open = false;
    }
})
Alpine.store('catalogDrawer', {
    open: false,
    catalog_id: null,
    openDrawer(id) {
        this.open = true
        this.catalog_id = id
    },
    closeDrawer() {
        this.open = false
        this.catalog_id = null
    },
})

