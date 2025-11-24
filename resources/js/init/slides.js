import Splide from '@splidejs/splide';
import {
    slideShow, slidePagination, swipeable,
    swipeNormal
} from '../utils/options-slide';
import '@splidejs/splide/css';

// Homepage Slides
if (document.querySelector('#homepage')) {
    new Splide('.splide.slideshow-home', slideShow).mount();
    new Splide('.splide.products-home', {
        ...swipeable,
        gap: '1rem',
        padding: '1.5rem'
    }).mount();
    new Splide('.splide.articles-home', {
        ...swipeable,
        gap: '0.65rem',
        padding: '1.5rem'
    }).mount();
    new Splide('.splide.testimonial-home', slidePagination).mount();
    new Splide('.splide.why-choose-home', {
        ...swipeable,
        gap: '2rem',
        padding: '1rem'
    }).mount();
}

// About Page Slides
if (document.querySelector('#about')) {
    new Splide('.splide.award-about', {
        ...swipeable,
        gap: '2rem',
        padding: '1.5rem'
    }).mount();
}

// Product Page Slides
if (document.querySelector('#product')) {
    new Splide('.splide.superior-product', {
        ...swipeable,
        gap: '2rem',
        padding: '1rem'
    }).mount();
    new Splide('.splide.guide-product', {
        ...swipeable,
        gap: '2rem',
        padding: '1rem'
    }).mount();
}

// Product Detail Page Slides
if (document.querySelector('#product-detail')) {
    new Splide('.splide.recommendation-product', {
        ...swipeable,
        gap: '1rem',
        padding: '1rem'
    }).mount();
    new Splide('.splide.feature-product', {
        ...swipeable,
        gap: '2rem',
        padding: '1rem'
    }).mount();
    let main = new Splide('.splide.main-product-detail', {
        type: 'fade',
        heightRatio: 0.75,
        pagination: false,
        arrows: false,
        cover: true,
    })
    let thumbnails = new Splide('.splide.thumbnail-product-detail', {
        isNavigation: true,
        fixedWidth: 70,
        fixedHeight: 60,
        perPage: 3,
        gap: '0.5rem',
        pagination: false,
        dragMinThreshold: {
            mouse: 4,
            touch: 10,
        },
        breakpoints: {
            350: {
                perPage: 2,
            }
        }
    })
    main.sync(thumbnails)
    main.mount()
    thumbnails.mount()
}

// News Event Page Slides
if (document.querySelector('#news-event')) {
    new Splide('.splide.news-event', {
        ...swipeable,
        gap: '0.8rem',
        padding: '1rem'
    }).mount();
}

// News Event Detail Page Slides
if (document.querySelector('#news-event-detail')) {
    new Splide('.splide.recommendation-products-news-event', {
        ...swipeNormal,
        gap: '2rem',
        padding: '1rem'
    }).mount();
    new Splide('.splide.other-news-event', {
        ...swipeable,
        gap: '2rem',
        padding: '1rem'
    }).mount();
}

// Education Guidance Detail Page Slides
if (document.querySelector('#guidance-detail')) {
    new Splide('.splide.guidance-step', {
        ...swipeable,
        gap: '2rem',
        padding: '1.5rem'
    }).mount();
    new Splide('.splide.other-guidance', {
        ...swipeable,
        gap: '2rem',
        padding: '1rem'
    }).mount();
}

// Customer Service Page Slides
if (document.querySelector('#customer-service')) {
    new Splide('.splide.solution-cs', {
        ...swipeable,
        gap: '2rem',
        padding: '1.5rem'
    }).mount();
    new Splide('.splide.education-cs', {
        ...swipeable,
        gap: '2rem',
        padding: '1rem'
    }).mount();
    new Splide('.splide.guide-cs', {
        ...swipeable,
        gap: '2rem',
        padding: '1rem'
    }).mount();
}
