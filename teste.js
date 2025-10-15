window.onload = function() {
    // Function to create falling elements
    function createFallingElement() {
        const element = document.createElement('div');
        element.innerHTML = '🤍'; // Horned demon emoji for ugly effect
        element.className = 'falling-element';
        element.style.left = Math.random() * 100 + 'vw'; // Random horizontal position
        element.style.animationDuration = (Math.random() * 3 + 2) + 's'; // Random fall speed
        document.body.appendChild(element);

        // Remove element after animation
        setTimeout(() => {
            element.remove();
        }, 5000);
    }

    // Create multiple falling elements
    for (let i = 0; i < 50; i++) {
        setTimeout(createFallingElement, Math.random() * 5000); // Stagger creation
    }

    // Continuously create more elements
    setInterval(createFallingElement, 200);
};
