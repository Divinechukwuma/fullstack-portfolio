document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('slider');
    const sliderInner = document.createElement('div');
    sliderInner.className = 'carousel-inner';
    slider.appendChild(sliderInner);

    const images = [
        {
            URL:'../productimages/carousel images (1).jpg'
        },
        {
            URL:'../productimages/carousel images (2).jpg'
        },
        {
            URL:'../productimages/carousel images (3).jpg'
        },
        {
            URL:'../productimages/caurousel images 4.jpg'
        }
    ];

    images.forEach((image, index) => {
        const item = document.createElement('div');
        item.className = 'carousel-item';
        item.innerHTML = `
            <img src="images/${image}" alt="Image ${index + 1}">
        `;
        sliderInner.appendChild(item);
    });

    let currentIndex = 0;

    function updateSlider() {
        const translateValue = -currentIndex * 100 + '%';
        sliderInner.style.transform = `translateX(${translateValue})`;
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % images.length;
        updateSlider();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateSlider();
    }

    // Auto slide every 3 seconds
    setInterval(nextSlide, 3000);
});