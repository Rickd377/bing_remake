document.addEventListener('DOMContentLoaded', () => {
    const dropdownBtn = document.querySelector('.dropdownBtn');
    const dropdownContent = document.querySelector('.dropdown-content');
    const submenuBtns = document.querySelectorAll('.dropdown-submenu > a');
    const dropdownBarsBtn = document.querySelector('.dropdownBarsBtn');
    const dropdownBarsContent = document.querySelector('.dropdown-bars-content');
    const lastDropItem = document.querySelector('.last-drop-item');
    const dropToggles = document.querySelectorAll('.drop-toggle');
    const dropdownSubSubContents = document.querySelectorAll('.dropdown-sub-sub-content');

    const toggleShow = (element) => element.classList.toggle('show');
    const toggleRotate = (element) => element.classList.toggle('rotate-180');

    if (dropdownBtn && dropdownContent) {
        dropdownBtn.addEventListener('click', (event) => {
            event.stopPropagation();
            toggleShow(dropdownContent);
        });
    }

    if (submenuBtns.length > 0) {
        submenuBtns.forEach(submenuBtn => {
            submenuBtn.addEventListener('click', (event) => {
                event.stopPropagation();
                const submenuContent = submenuBtn.nextElementSibling;
                if (submenuContent) {
                    toggleShow(submenuContent);
                }
            });
        });
    }

    if (dropdownBarsBtn && dropdownBarsContent) {
        dropdownBarsBtn.addEventListener('click', (event) => {
            event.stopPropagation();
            toggleShow(dropdownBarsContent);

            const rect = dropdownBarsContent.getBoundingClientRect();
            const viewportHeight = window.innerHeight;

            if (rect.bottom > viewportHeight) {
                dropdownBarsContent.style.top = 'auto';
                dropdownBarsContent.style.bottom = '40px'; // Adjust as needed
            } else {
                dropdownBarsContent.style.top = '40px';
                dropdownBarsContent.style.bottom = 'auto';
            }
        });
    }

    if (lastDropItem) {
        lastDropItem.addEventListener('click', function() {
            this.classList.toggle('clicked');
        });
    }

    if (dropToggles.length > 0) {
        dropToggles.forEach(dropToggle => {
            dropToggle.addEventListener('click', (event) => {
                event.stopPropagation();
                const dropdownSubSubContent = dropToggle.nextElementSibling;
                const arrow = dropToggle.querySelector('.fa-chevron-down');
                if (dropdownSubSubContent) {
                    toggleShow(dropdownSubSubContent);
                    if (arrow) {
                        toggleRotate(arrow);
                    }
                }
            });
        });
    }

    window.addEventListener('click', () => {
        if (dropdownContent && dropdownContent.classList.contains('show')) {
            dropdownContent.classList.remove('show');
        }
        if (submenuBtns.length > 0) {
            submenuBtns.forEach(submenuBtn => {
                const submenuContent = submenuBtn.nextElementSibling;
                if (submenuContent && submenuContent.classList.contains('show')) {
                    submenuContent.classList.remove('show');
                }
            });
        }
        if (dropdownBarsContent && dropdownBarsContent.classList.contains('show')) {
            dropdownBarsContent.classList.remove('show');
        }
        if (dropdownSubSubContents.length > 0) {
            dropdownSubSubContents.forEach(dropdownSubSubContent => {
                if (dropdownSubSubContent.classList.contains('show')) {
                    dropdownSubSubContent.classList.remove('show');
                }
            });
        }
        dropToggles.forEach(dropToggle => {
            const arrow = dropToggle.querySelector('.fa-chevron-down');
            if (arrow && arrow.classList.contains('rotate-180')) {
                arrow.classList.remove('rotate-180');
            }
        });
    });
});