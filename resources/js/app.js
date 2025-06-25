import './privacy-modal.js';
import './terms-modal.js';

document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('multiStepForm');
  if (!form) return;

  let currentStep = 1;
  const totalSteps = 4;
  const steps = form.querySelectorAll('.step');

  function showStep(step) {
    steps.forEach((el, idx) => {
      if (idx === step - 1) {
        el.classList.remove('hidden');
      } else {
        el.classList.add('hidden');
      }
    });
    currentStep = step;
    updateProcessBar(step);
  }

  function updateProcessBar(step) {
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

  function validateStep(step) {
    let valid = true;
    form.querySelectorAll('.js-error').forEach(e => e.remove());
    form.querySelectorAll('.border-red-500').forEach(e => e.classList.remove('border-red-500'));

    if (step === 1) {
      const selected = form.querySelector('[name="property_type"]:checked');
      const stepError = form.querySelector('.step[data-step="1"] .step-error');
      if (!selected) {
        form.querySelectorAll('[name="property_type"]').forEach(radio => {
          radio.parentElement.classList.add('border-red-500');
        });
        
        stepError.innerText = '物件種別を選択してください';
        stepError.classList.remove('hidden');
        valid = false;
      } else {
        if (!stepError.classList.contains('hidden')) {
          stepError.classList.add('hidden');
        }
      }
    }
    if (step === 2) {
      const errorMessages = {
        postcode: '郵便番号を入力してください',
        prefecture: '都道府県を選択してください',
        address: '住所を入力してください'
      };
      const fields = ['postcode', 'prefecture', 'address'];
      fields.forEach(name => {
        const input = form.querySelector(`[data-step="2"] [name="${name}"]`);
        if (input && !input.value.trim()) {
          input.classList.add('border-red-500');
          const err = document.createElement('div');
          err.className = 'js-error text-red-500 text-xs mt-1';
          err.innerText = errorMessages[name] || '必須項目です';
          input.parentNode.appendChild(err);
          valid = false;
        }
      });
    }
    if (step === 3) {
      const company = form.querySelector('[data-step="3"] input[name="company"]');
      if (company && !company.value.trim()) {
        const err = document.createElement('div');
        company.classList.add('border-red-500');
        err.className = 'js-error text-red-500 text-xs mt-2';
        err.innerText = 'ガス会社名を入力してください';
        company.parentNode.appendChild(err);
        valid = false;
      }
    }
    if (step === 4) {
      const errorMessages = {
        name: 'お名前を入力してください',
        phone: '電話番号を入力してください',
        email: 'メールアドレスを入力してください'
      };
      const fields = ['name', 'phone', 'email'];
      fields.forEach(name => {
        const input = form.querySelector(`[data-step="4"] [name="${name}"]`);
        if (input && !input.value.trim()) {
          input.classList.add('border-red-500');
          const err = document.createElement('div');
          err.className = 'js-error text-red-500 text-xs mt-1';
          err.innerText = errorMessages[name] || '必須項目です';
          input.parentNode.appendChild(err);
          valid = false;
        }
      });
    }
    return valid;
  }

  form.querySelectorAll('[data-step="1"] button').forEach(btn => {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      form.querySelectorAll('[data-step="1"] button').forEach(b => b.classList.remove('selected', 'border-blue-600'));
      btn.classList.add('selected', 'border-blue-600');
    });
  });

  form.addEventListener('click', function (e) {
    const target = e.target;
    if (target.matches('button')) {
      const btnText = target.innerText.trim();
      if (btnText === '次へ') {
        e.preventDefault();
        if (validateStep(currentStep)) {
          if (currentStep < totalSteps) {
            showStep(currentStep + 1);
          }
        }
      } else if (btnText === '戻る') {
        e.preventDefault();
        if (currentStep > 1) {
          showStep(currentStep - 1);
        }
      } else if (btnText === '【無料】料金を比較する') {
        e.preventDefault();
        if (validateStep(currentStep)) {
          form.submit();
        }
      }
    }
  });

  showStep(1);

  document.querySelectorAll('.toggle-detail').forEach(function(toggle) {
    toggle.addEventListener('click', function() {
      var content = toggle.parentNode.querySelector('.toggle-detail-content');
      var arrows = toggle.querySelectorAll('.toggle-arrow');
      if (content) {
        var isOpen = !content.classList.toggle('hidden');
        if (arrows.length === 2) {
          arrows[0].style.display = isOpen ? 'inline' : 'none'; // arrow-up
          arrows[1].style.display = isOpen ? 'none' : 'inline'; // arrow-down
        }
      }
    });
    var content = toggle.parentNode.querySelector('.toggle-detail-content');
    var arrows = toggle.querySelectorAll('.toggle-arrow');
    if (content && arrows.length === 2) {
      arrows[0].style.display = 'inline';
      arrows[1].style.display = 'none';
    }
  });

  document.querySelectorAll('input[name="property_type"]').forEach(radio => {
    radio.addEventListener('change', function() {
      document.querySelectorAll('input[name="property_type"]').forEach(r => {
        r.parentElement.classList.remove('border-red-500')
        r.parentElement.classList.remove('border-blue-600', 'ring-2', 'ring-blue-100');
      });
      if (this.checked) {
        this.parentElement.classList.add('border-blue-600', 'ring-2', 'ring-blue-100');
      }
    });
  });
});
