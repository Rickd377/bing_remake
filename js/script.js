document.addEventListener('DOMContentLoaded', () => {
    const toggleShow = (element) => element.classList.toggle('show');
    const toggleRotate = (element) => element.classList.toggle('rotate-180');
    const stopPropagation = (event) => event.stopPropagation();

    const setupToggle = (btn, content) => {
        if (btn && content) {
            btn.addEventListener('click', (event) => {
                stopPropagation(event);
                toggleShow(content);
            });
            content.addEventListener('click', stopPropagation);
        }
    };

    setupToggle(document.querySelector('.dropdownBtn'), document.querySelector('.dropdown-content'));
    setupToggle(document.querySelector('.dropdownBarsBtn'), document.querySelector('.dropdown-bars-content'));

    document.querySelectorAll('.dropdown-submenu > a').forEach(submenuBtn => {
        submenuBtn.addEventListener('click', (event) => {
            stopPropagation(event);
            toggleShow(submenuBtn.nextElementSibling);
        });
    });

    document.querySelectorAll('.drop-toggle').forEach(dropToggle => {
        dropToggle.addEventListener('click', (event) => {
            stopPropagation(event);
            const dropdownSubSubContent = dropToggle.nextElementSibling;
            const arrow = dropToggle.querySelector('.fa-chevron-down');
            if (dropdownSubSubContent) {
                toggleShow(dropdownSubSubContent);
                if (arrow) toggleRotate(arrow);
            }
        });
    });

    document.querySelector('.last-drop-item')?.addEventListener('click', function() {
        this.classList.toggle('clicked');
    });

    document.querySelectorAll('.dropdown-sub-sub-content').forEach(content => {
        content.addEventListener('click', stopPropagation);
    });

    window.addEventListener('click', () => {
        document.querySelectorAll('.show').forEach(el => el.classList.remove('show'));
        document.querySelectorAll('.rotate-180').forEach(el => el.classList.remove('rotate-180'));
    });

    // slider container 
    const sliderTrack = document.querySelector('.slider-track');
    const prevButton = document.getElementById('prevItem');
    const nextButton = document.getElementById('nextItem');
    const itemsVisible = 8;
    const itemsToMove = 6; // Number of items to move on button click
    const itemWidth = sliderTrack.querySelector('.slider-item').offsetWidth;
    const offset = 2; // Offset in pixels to ensure proper alignment
    let currentIndex = 0;
    
    const updateSlider = () => {
        sliderTrack.style.transform = `translateX(calc(-${currentIndex * itemWidth}px - ${offset}px))`;
    };
    
    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex = Math.max(currentIndex - itemsToMove, 0);
            updateSlider();
        }
    });
    
    nextButton.addEventListener('click', () => {
        if (currentIndex < sliderTrack.children.length - itemsVisible) {
            currentIndex = Math.min(currentIndex + itemsToMove, sliderTrack.children.length - itemsVisible);
            updateSlider();
        }
    });
});

document.addEventListener('scroll', function() {
    const searchContainer = document.querySelector('.search-container');
    const scrollPosition = window.scrollY;

    if (scrollPosition > 0) {
        searchContainer.style.top = '7%'; // Top value when scrolling
    } else {
        searchContainer.style.top = '18%'; // Top value on the landing page
    }
});