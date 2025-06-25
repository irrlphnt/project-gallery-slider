(function(){
    document.addEventListener('DOMContentLoaded', function(){
        if ( typeof Swiper === 'undefined' ) {
            return; // Swiper failed to load.
        }
        document.querySelectorAll('.pgs-swiper').forEach(function(container){
            const delay = parseInt(container.getAttribute('data-autoplay'),10)||0;
            new Swiper(container, {
                loop: true,
                navigation: {
                    nextEl: container.querySelector('.swiper-button-next'),
                    prevEl: container.querySelector('.swiper-button-prev')
                },
                pagination: { el: container.querySelector('.swiper-pagination'), clickable: true },
                autoplay: delay ? { delay: delay } : false
            });
        });
    });
})();
