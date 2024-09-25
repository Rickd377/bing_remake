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
});