import scrollSpy from "simple-scrollspy";

if (document.querySelector('#tabs-anchor')) {
    scrollSpy('#tabs-anchor', {
        sectionClass: '.scrollspy',
        menuActiveTarget: '.tab',
        offset: 100,
        onActive: (el) => {
            el.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        }
    })
}

if (document.querySelector('#tabs-border-anchor')) {
    scrollSpy('#tabs-border-anchor', {
        sectionClass: '.scrollspy',
        menuActiveTarget: '.tab-border',
        offset: 100,
        onActive: (el) => {
            el.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        }
    })
}
