document.addEventListener('DOMContentLoaded', function() {
    const wrapper = document.querySelector('.carousel-inner');
    const prevButton = document.querySelector('.carousel-prev');
    const nextButton = document.querySelector('.carousel-next');
    const itemWidth = document.querySelector('.artist-item').offsetWidth;
    const gap = parseInt(getComputedStyle(wrapper).gap);
    const scrollAmount = itemWidth + gap;
    let autoScrollInterval;

    function scrollCarousel(direction) {
        wrapper.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    }

    function startAutoScroll() {
        autoScrollInterval = setInterval(function() {
            scrollCarousel(1);
        }, 3000); // Ajuste o tempo conforme necessário
    }

    function stopAutoScroll() {
        clearInterval(autoScrollInterval);
    }

    prevButton.addEventListener('click', function() {
        stopAutoScroll();
        scrollCarousel(-1);
        startAutoScroll();
    });

    nextButton.addEventListener('click', function() {
        stopAutoScroll();
        scrollCarousel(1);
        startAutoScroll();
    });

    // Inicia o rolar automático
    startAutoScroll();

    // Opcional: Adicionar loop contínuo
    wrapper.addEventListener('scroll', function() {
        if (wrapper.scrollLeft <= 0) {
            wrapper.scrollLeft = wrapper.scrollWidth / 2;
        } else if (wrapper.scrollLeft >= wrapper.scrollWidth / 2) {
            wrapper.scrollLeft = 0;
        }
    });
});
