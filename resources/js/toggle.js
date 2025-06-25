export class Toggle {
    constructor(selector) {
        this.selector = selector;
        this.init();
    }
    init() {
        document.querySelectorAll(this.selector).forEach(toggle => {
            toggle.addEventListener('click', function() {
                const content = toggle.parentNode.querySelector('.toggle-detail-content');
                const arrows = toggle.querySelectorAll('.toggle-arrow');
                if (content) {
                    const isOpen = !content.classList.toggle('hidden');
                    if (arrows.length === 2) {
                        arrows[0].style.display = isOpen ? 'inline' : 'none'; // arrow-up
                        arrows[1].style.display = isOpen ? 'none' : 'inline'; // arrow-down
                    }
                }
            });
            const content = toggle.parentNode.querySelector('.toggle-detail-content');
            const arrows = toggle.querySelectorAll('.toggle-arrow');
            if (content && arrows.length === 2) {
                arrows[0].style.display = 'inline';
                arrows[1].style.display = 'none';
            }
        });
    }
} 
