export class MultiStepForm {
    constructor() {
        this.init();
    }
    init() {
        this.form = document.getElementById('multiStepForm');
        if (!this.form) return;
        this.currentStep = 1;
        this.totalSteps = 4;
        this.steps = this.form.querySelectorAll('.step');
        this.propertyTypeInputs = this.form.querySelectorAll('input[name="property_type"]');
        this.bindEvents();
        this.showStep(this.currentStep);
        this.updateProcessBar(this.currentStep);
    }
    bindEvents() {
        this.propertyTypeInputs.forEach(radio => {
            radio.addEventListener('change', () => this.handleStep1RadioChange());
        });
        this.form.addEventListener('click', (e) => this.handleFormClick(e));
    }
    handleStep1RadioChange() {
        this.propertyTypeInputs.forEach(r => {
            r.parentElement.classList.remove('border-lightblue', 'ring-2', 'ring-blue-100', 'border-red-500');
        });
        const checked = this.form.querySelector('input[name="property_type"]:checked');
        checked?.parentElement.classList.add('border-lightblue', 'ring-2', 'ring-blue-100');
        this.form.querySelector('.step[data-step="1"] .step-error')?.classList.add('hidden');
    }
    handleFormClick(e) {
        const target = e.target;
        if (!target.matches('button')) return;
        e.preventDefault();
        const btnText = target.innerText.trim();
        if (btnText === '次へ') {
            this.handleNextStep();
        } else if (btnText === '戻る') {
            this.handlePrevStep();
        } else if (btnText === '【無料】料金を比較する') {
            this.handleSubmitForm();
        }
    }
    handleNextStep() {
        if (this.validateStep(this.currentStep) && this.currentStep < this.totalSteps) {
            this.showStep(this.currentStep + 1);
        }
    }
    handlePrevStep() {
        if (this.currentStep > 1) {
            this.showStep(this.currentStep - 1);
        }
    }
    handleSubmitForm() {
        if (this.validateStep(this.currentStep)) {
            this.form.submit();
        }
    }
    showStep(step) {
        this.steps.forEach((el, idx) => {
            if (idx === step - 1) {
                el.classList.remove('hidden');
            } else {
                el.classList.add('hidden');
            }
        });
        this.currentStep = step;
        this.updateProcessBar(step);
    }
    updateProcessBar(step) {
        document.querySelectorAll('.processbar-step').forEach((el, idx) => {
            if (idx + 1 < step) {
                el.setAttribute('data-done', '1');
                el.removeAttribute('data-active');
            } else if (idx + 1 === step) {
                el.setAttribute('data-active', '1');
                el.removeAttribute('data-done');
            } else {
                el.removeAttribute('data-active');
                el.removeAttribute('data-done');
            }
        });
    }
    validateStep(step) {
        this.form.querySelectorAll('.js-error').forEach(e => e.remove());
        this.form.querySelectorAll('.border-red-500').forEach(e => e.classList.remove('border-red-500'));
        switch(step) {
            case 1:
                return this.validateFields({
                    fields: ['property_type'],
                    stepSelector: '.step[data-step="1"]',
                    type: 'radio',
                    errorSelector: '.step-error',
                    errorMessages: {
                        property_type: '物件種別を選択してください'
                    },
                });
            case 2:
                return this.validateFields({
                    fields: ['postcode', 'prefecture', 'address'],
                    stepSelector: '.step[data-step="2"]',
                    type: 'input',
                    errorMessages: {
                        postcode: '郵便番号を入力してください',
                        prefecture: '都道府県を選択してください',
                        address: '住所を入力してください'
                    }
                });
            case 3:
                return this.validateFields({
                    fields: ['company'],
                    stepSelector: '.step[data-step="3"]',
                    type: 'input',
                    errorMessages: {
                        company: 'ガス会社名を入力してください'
                    },
                    errorClass: 'mt-2'
                });
            case 4:
                return this.validateFields({
                    fields: ['name', 'phone', 'email'],
                    stepSelector: '.step[data-step="4"]',
                    type: 'input',
                    errorMessages: {
                        name: 'お名前を入力してください',
                        phone: '電話番号を入力してください',
                        email: 'メールアドレスを入力してください'
                    }
                });
            default:
                return true;
        }
    }
    validateFields({ fields, stepSelector, type, errorSelector, errorMessage, errorMessages, errorClass }) {
        let valid = true;
        if (type === 'radio') {
            const selected = this.form.querySelector(`[name="${fields[0]}"]:checked`);
            const stepError = this.form.querySelector(`${stepSelector} ${errorSelector}`);
            if (!selected) {
                this.propertyTypeInputs.forEach(radio => {
                    radio.parentElement.classList.add('border-red-500');
                });
                if (stepError) {
                    stepError.classList.remove('hidden');
                }
                valid = false;
            } else if (!stepError?.classList.contains('hidden')) {
                stepError?.classList.add('hidden');
            }
        }
        if (type === 'input') {
            fields.forEach(name => {
                const input = this.form.querySelector(`${stepSelector} [name="${name}"]`);
                if (input && !input.value.trim()) {
                    input.classList.add('border-red-500');
                    const err = document.createElement('div');
                    err.className = `js-error text-red-500 text-xs mt-1${errorClass ? ' ' + errorClass : ''}`;
                    err.innerText = (errorMessages && errorMessages[name]) ? errorMessages[name] : '必須項目です';
                    input.parentNode?.appendChild(err);
                    valid = false;
                }
            });
        }
        return valid;
    }
} 
