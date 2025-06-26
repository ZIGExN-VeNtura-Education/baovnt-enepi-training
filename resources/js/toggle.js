export class Toggle {
    constructor(selector) {
        this.selector = selector;
        this.init();
    }

    init() {
        document.querySelectorAll(this.selector).forEach(toggle => {
            toggle.addEventListener('click', () => {
                const content = toggle.parentNode.querySelector('.toggle-detail-content');
                const arrows = toggle.querySelectorAll('.toggle-arrow');
                if (!content || arrows.length !== 2) return;
                const isOpen = !content.classList.toggle('hidden');
                this.setArrowState(content, arrows, isOpen);
            });
            const content = toggle.parentNode.querySelector('.toggle-detail-content');
            const arrows = toggle.querySelectorAll('.toggle-arrow');
            this.setArrowState(content, arrows, true);
        });
    }

    setArrowState(content, arrows, isOpen) {
        if (!content || arrows.length !== 2) return;
        arrows[0].style.display = isOpen ? 'inline' : 'none'; // arrow-up
        arrows[1].style.display = isOpen ? 'none' : 'inline'; // arrow-down
    }
} 
