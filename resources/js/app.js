import { MultiStepForm } from './multi-step-form.js';
import { Modal } from './modal.js';
import { Toggle } from './toggle.js';

function initializePage() {
    new MultiStepForm();
    new Modal({
        modalId: 'privacyModal',
        triggerClass: 'js-privacy-link',
        closeBtnId: 'closePrivacyModal',
        closeIconId: 'closePrivacyModalIcon'
    });
    new Modal({
        modalId: 'termsModal',
        triggerClass: 'js-terms-link',
        closeBtnId: 'closeTermsModal',
        closeIconId: 'closeTermsModalIcon'
    });
    new Toggle('.toggle-detail');
}

document.addEventListener('DOMContentLoaded', initializePage);
