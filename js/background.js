document.addEventListener('DOMContentLoaded', () => {
    const backgrounds = [
        '',
        'url(../assets/backgrounds/background-one.webp)',
        'url(../assets/backgrounds/background-two.webp)',
        'url(../assets/backgrounds/background-three.webp)',
        'url(../assets/backgrounds/background-four.webp)'
    ];
    let currentBackgroundIndex = 0;

    const body = document.body;
    const prevButton = document.getElementById('prevBackground');
    const nextButton = document.getElementById('nextBackground');

    const updateBackground = () => {
        body.style.backgroundImage = backgrounds[currentBackgroundIndex];
    };

    prevButton.addEventListener('click', () => {
        currentBackgroundIndex = (currentBackgroundIndex - 1 + backgrounds.length) % backgrounds.length;
        updateBackground();
    });

    nextButton.addEventListener('click', () => {
        currentBackgroundIndex = (currentBackgroundIndex + 1) % backgrounds.length;
        updateBackground();
    });

    updateBackground();
});