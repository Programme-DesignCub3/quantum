document.addEventListener('alpine:init', () => {
    Alpine.store('menuDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
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
    }),
    Alpine.store('contactCall', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    }),
    Alpine.store('contactWhatsApp', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    }),
    Alpine.store('contactEmail', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    }),
    Alpine.store('contactOffice', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    }),
    Alpine.store('contactSocmed', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    })
})

