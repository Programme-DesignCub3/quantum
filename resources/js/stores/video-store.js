document.addEventListener('alpine:init', () => {
    Alpine.store('videoModal', {
        open: false,
        data: null,
        openVideo(data) {
            this.open = true
            this.data = data
        },
        closeVideo() {
            this.open = false
            this.data = null
        },
    })
})
