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
    Alpine.store('contactCallDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    }),
    Alpine.store('contactWhatsAppDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    }),
    Alpine.store('contactEmailDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    }),
    Alpine.store('contactOfficeDrawer', {
        open: false,
        openDrawer() { this.open = true },
        closeDrawer() { this.open = false },
    }),
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
})

