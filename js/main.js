function loadProgressBars() {
    const progressBarElements = document.querySelectorAll('.custom-progress-bar');
    progressBarElements.forEach((bar) => {
        const progress = bar.getAttribute('data-progress');
        bar.style.width = progress + '%';
        bar.textContent = progress + '%';
    });
}

// Trigger the function when the window loads
window.onload = loadProgressBars;