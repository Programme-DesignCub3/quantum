import {
    slideShow, slidePagination, swipeable
} from './utils/options-slide';
import Splide from '@splidejs/splide';
import '@splidejs/splide/css';
import './stores/drawer-store';
import './bootstrap';

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

if (document.querySelector('#about')) {
    new Splide('.splide.award-about', {
        ...swipeable,
        gap: '2rem',
        padding: '1.5rem'
    }).mount();
}

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


// const container = document.querySelector('.zoom-container');
// const img = container.querySelector('.zoom-image');
// const zoomLevel = 2; // ubah sesuai keinginan (semakin besar semakin zoom)

// container.addEventListener('mousemove', (e) => {
//   const rect = container.getBoundingClientRect();
//   const x = ((e.clientX - rect.left) / rect.width) * 100;
//   const y = ((e.clientY - rect.top) / rect.height) * 100;

//   img.style.transformOrigin = `${x}% ${y}%`;
//   img.style.transform = `scale(${zoomLevel})`;
// });

// container.addEventListener('mouseleave', () => {
//   img.style.transform = 'scale(1)';
// });

