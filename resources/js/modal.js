export class Modal {
    constructor({ modalId, triggerClass, closeBtnId, closeIconId }) {
        this.modalId = modalId;
        this.triggerClass = triggerClass;
        this.closeBtnId = closeBtnId;
        this.closeIconId = closeIconId;
        this.init();
    }
    init() {
        this.modal = document.getElementById(this.modalId);
        this.closeBtn = document.getElementById(this.closeBtnId);
        this.closeIcon = document.getElementById(this.closeIconId);
        this.triggers = document.querySelectorAll(`.${this.triggerClass}`);
        this.bindEvents();
    }
    bindEvents() {
        this.triggers.forEach(el => {
            el.addEventListener('click', (e) => this.handleShow(e));
        });
        this.closeBtn?.addEventListener('click', () => this.handleClose());
        this.closeIcon?.addEventListener('click', () => this.handleClose());
        this.modal?.addEventListener('click', (e) => {
            if (e.target === this.modal) this.handleClose();
        });
    }
    handleShow(e) {
        e.preventDefault();
        this.modal?.classList.remove('hidden');
    }
    handleClose() {
        this.modal?.classList.add('hidden');
    }
} 
