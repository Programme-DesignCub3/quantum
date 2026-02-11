import Splide from '@splidejs/splide';
import {
    slideShow, slidePagination, swipeable,
    swipeNormal
} from '../utils/options-slide';
import '@splidejs/splide/css';

// Function to initialize or reinitialize
const productsHomeSlide = () => {
    if(document.querySelector('.splide.products-home')) {
        new Splide('.splide.products-home', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 4,
            gap: '1rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    perPage: 3,
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 2,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                }
            }
        }).mount();
    }
}

const awardsAboutSlide = () => {
    if(document.querySelector('.splide.award-about')) {
        new Splide('.splide.award-about', {
            ...swipeable,
            gap: '2rem',
            padding: '1.5rem'
        }).mount();
    }
}

// Homepage Slides
if (document.querySelector('#homepage')) {
    if(document.querySelector('.splide.slideshow-home')) {
        new Splide('.splide.slideshow-home', slideShow).mount();
    }

    productsHomeSlide();

    if(document.querySelector('.splide.articles-home')) {
        new Splide('.splide.articles-home', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 4,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    perPage: 3,
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    gap: '0.65rem',
                    perPage: 2,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                }
            }
        }).mount();
    }

    if(document.querySelector('.splide.testimonial-home')) {
        new Splide('.splide.testimonial-home', {
            arrows: false,
            pagination: true,
            perPage: 1,
            width: '440px',
            gap: '0.5rem',
            padding: '0rem',
            breakpoints: {
                767: {
                    pagination: false,
                    gap: '0.5rem',
                    padding: '1.5rem',
                    autoWidth: true,
                    width: '100%',
                }
            }
        }).mount();
    }

    if(document.querySelector('.splide.why-choose-home')) {
        new Splide('.splide.why-choose-home', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 3,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    gap: '2rem',
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 2,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                    padding: '1rem',
                }
            }
        }).mount();
    }

    Livewire.on('products-home-reinit', () => {
        productsHomeSlide();
    });
}

// About Page Slides
if (document.querySelector('#about')) {
    awardsAboutSlide();

    if(document.querySelector('.splide.history-about')) {
        new Splide('.splide.history-about', {
            ...swipeable,
            gap: '2rem',
            padding: '1rem'
        }).mount();
    }

    Livewire.on('awards-about-reinit', () => {
        awardsAboutSlide();
    });
}

// Product Page Slides
if (document.querySelector('#product')) {
    if(document.querySelector('.splide.superior-product')) {
        new Splide('.splide.superior-product', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 3,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    gap: '2rem',
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 2,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                    padding: '1rem',
                }
            }
        }).mount();
    }

    if(document.querySelector('.splide.guide-product')) {
        new Splide('.splide.guide-product', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 3,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    gap: '2rem',
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 2,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                    padding: '1rem',
                }
            }
        }).mount();
    }
}

// Product Detail Page Slides
if (document.querySelector('#product-detail')) {
    if(document.querySelector('.splide.recommendation-product')) {
        new Splide('.splide.recommendation-product', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 3,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    gap: '2rem',
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 2,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                    padding: '1rem',
                }
            }
        }).mount();
    }

    if(document.querySelector('.splide.feature-product')) {
        new Splide('.splide.feature-product', {
            ...swipeable,
            gap: '2rem',
            padding: '1rem'
        }).mount();
    }

    if(document.querySelector('.splide.main-product-detail') && document.querySelector('.splide.thumbnail-product-detail')) {
        let main = new Splide('.splide.main-product-detail', {
            type: 'fade',
            heightRatio: 0.75,
            pagination: false,
            arrows: false,
            cover: true,
        });

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
        });

        main.sync(thumbnails);
        main.mount();
        thumbnails.mount();
    }
}

// News Event Page Slides
if (document.querySelector('#news-event')) {
    if(document.querySelector('.splide.news-event')) {
        new Splide('.splide.news-event', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 4,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    perPage: 3,
                    gap: '2rem',
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 2,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                    padding: '1rem',
                }
            }
        }).mount();
    }
}

// News Event Detail Page Slides
if (document.querySelector('#news-event-detail')) {
    if(document.querySelector('.splide.recommendation-products-news-event')) {
        new Splide('.splide.recommendation-products-news-event', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 3,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    gap: '2rem',
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 1,
                },
                550: {
                    padding: '1rem',
                }
            }
        }).mount();
    }

    if(document.querySelector('.splide.other-news-event')) {
        new Splide('.splide.other-news-event', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 4,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    perPage: 3,
                    gap: '2rem',
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 2,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                    padding: '1rem',
                }
            }
        }).mount();
    }
}

// Recipe Page Slides
if (document.querySelector('#recipe')) {
    if(document.querySelector('.splide.recipe-articles')) {
        new Splide('.splide.recipe-articles', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 4,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    perPage: 3,
                },
                1024: {
                    perPage: 2,
                    gap: '0.8rem',
                },
                768: {
                    perPage: 2,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                    padding: '1rem',
                }
            }
        }).mount();
    }
}

// Recipe Detail Page Slides
if (document.querySelector('#recipe-detail')) {
    if(document.querySelector('.splide.how-to-step')) {
        new Splide('.splide.how-to-step', {
            ...swipeable,
            gap: '1rem',
            padding: '1.5rem'
        }).mount();
    }

    if(document.querySelector('.splide.recommendation-products-recipe')) {
        new Splide('.splide.recommendation-products-recipe', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 3,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    gap: '2rem',
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 1,
                },
                550: {
                    padding: '1rem',
                }
            }
        }).mount();
    }

    if(document.querySelector('.splide.other-recipe')) {
        new Splide('.splide.other-recipe', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 4,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    perPage: 3,
                    gap: '2rem',
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 2,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                    padding: '1rem',
                }
            }
        }).mount();
    }
}

// Education Guidance Detail Page Slides
if (document.querySelector('#guidance-detail')) {
    if(document.querySelector('.splide.guidance-step')) {
        new Splide('.splide.guidance-step', {
            ...swipeable,
            gap: '2rem',
            padding: '1.5rem'
        }).mount();
    }

    if(document.querySelector('.splide.other-guidance')) {
        new Splide('.splide.other-guidance', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 4,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    perPage: 3,
                    gap: '2rem',
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 2,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                    padding: '1rem',
                }
            }
        }).mount();
    }
}

// Customer Service Page Slides
if (document.querySelector('#customer-service')) {
    if(document.querySelector('.splide.solution-cs')) {
        new Splide('.splide.solution-cs', {
            arrows: false,
            pagination: false,
            drag: 'free',
            gap: '1.25rem',
            padding: '1.5rem',
            perPage: 3,
            breakpoints: {
                1280: {
                    gap: '2rem',
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 2,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                    padding: '1rem'
                }
            }
        }).mount();
    }

    if(document.querySelector('.splide.education-cs')) {
        new Splide('.splide.education-cs', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 4,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    perPage: 3,
                    gap: '2rem',
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 2,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                    padding: '1rem',
                }
            }
        }).mount();
    }

    if(document.querySelector('.splide.guide-cs')) {
        new Splide('.splide.guide-cs', {
            arrows: false,
            pagination: false,
            drag: 'free',
            perPage: 4,
            gap: '1.25rem',
            padding: '1.5rem',
            breakpoints: {
                1280: {
                    perPage: 3,
                    gap: '2rem',
                },
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 1,
                    autoWidth: true,
                },
                550: {
                    perPage: 1,
                    autoWidth: true,
                    padding: '1rem',
                }
            }
        }).mount();
    }
}
