document.addEventListener('alpine:init', () => {
    Alpine.store('scroll', {
        scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    })
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
