import {
    slideShowOptions, productsHomeSwipeOptions, articlesHomeSwipeOptions,
    testimonialHomeSwipeOptions, whyChooseHomeSwipeOptions,awardAboutSwipeOptions
} from './utils/options-slide';
import Splide from '@splidejs/splide';
import '@splidejs/splide/css';
import './stores/drawer-store';
import './bootstrap';

if (document.querySelector('#homepage')) {
    new Splide('.splide.slideshow-home', slideShowOptions).mount();
    new Splide('.splide.products-home', productsHomeSwipeOptions).mount();
    new Splide('.splide.articles-home', articlesHomeSwipeOptions).mount();
    new Splide('.splide.testimonial-home', testimonialHomeSwipeOptions).mount();
    new Splide('.splide.why-choose-home', whyChooseHomeSwipeOptions).mount();

}
new Splide('.splide.award-about', awardAboutSwipeOptions).mount();
