import {
    slideShowOptions, productsHomeSwipeOptions, articlesHomeSwipeOptions,
    testimonialHomeSwipeOptions, whyChooseHomeSwipeOptions
} from './utils/options-slide';
import Splide from '@splidejs/splide';
import '@splidejs/splide/css';
import './bootstrap';

if (document.querySelector('#homepage')) {
    new Splide('.splide.slideshow-home', slideShowOptions).mount();
    new Splide('.splide.products-home', productsHomeSwipeOptions).mount();
    new Splide('.splide.articles-home', articlesHomeSwipeOptions).mount();
    new Splide('.splide.testimonial-home', testimonialHomeSwipeOptions).mount();
    new Splide('.splide.why-choose-home', whyChooseHomeSwipeOptions).mount();
}
