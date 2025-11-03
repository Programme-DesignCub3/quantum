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

            console.log(this.data)
        },
        closeDrawer() {
            this.open = false
            this.data = null
        },
    })
})

