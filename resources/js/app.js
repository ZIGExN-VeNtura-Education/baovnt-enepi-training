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
  }

  // Validate từng step (cơ bản, có thể mở rộng)
  function validateStep(step) {
    let valid = true;
    // Xóa lỗi cũ
    form.querySelectorAll('.js-error').forEach(e => e.remove());
    form.querySelectorAll('.border-red-500').forEach(e => e.classList.remove('border-red-500'));

    if (step === 1) {
      // Step 1: chọn loại bất động sản
      const selected = form.querySelector('[data-step="1"] button.selected');
      if (!selected) {
        const btns = form.querySelectorAll('[data-step="1"] button');
        btns.forEach(btn => btn.classList.add('border-red-500'));
        const err = document.createElement('div');
        err.className = 'js-error text-red-500 text-xs text-center mt-2';
        err.innerText = '物件種別を選択してください';
        btns[btns.length-1].parentNode.appendChild(err);
        valid = false;
      }
    }
    if (step === 2) {
      // Step 2: validate các trường địa chỉ
      const fields = ['postcode', 'prefecture', 'city', 'address'];
      fields.forEach(name => {
        const input = form.querySelector(`[data-step="2"] [name="${name}"]`);
        if (input && !input.value.trim()) {
          input.classList.add('border-red-500');
          const err = document.createElement('div');
          err.className = 'js-error text-red-500 text-xs mt-1';
          err.innerText = '必須項目です';
          input.parentNode.appendChild(err);
          valid = false;
        }
      });
    }
    if (step === 3) {
      // Step 3: chọn usage
      const usage = form.querySelector('[data-step="3"] input[name="usage"]:checked');
      if (!usage) {
        const radios = form.querySelectorAll('[data-step="3"] input[name="usage"]');
        const err = document.createElement('div');
        err.className = 'js-error text-red-500 text-xs mt-2';
        err.innerText = '利用状況を選択してください';
        radios[radios.length-1].parentNode.appendChild(err);
        valid = false;
      }
    }
    if (step === 4) {
      // Step 4: validate liên lạc
      const fields = ['name', 'phone', 'email'];
      fields.forEach(name => {
        const input = form.querySelector(`[data-step="4"] [name="${name}"]`);
        if (input && !input.value.trim()) {
          input.classList.add('border-red-500');
          const err = document.createElement('div');
          err.className = 'js-error text-red-500 text-xs mt-1';
          err.innerText = '必須項目です';
          input.parentNode.appendChild(err);
          valid = false;
        }
      });
    }
    return valid;
  }

  // Xử lý chọn loại bất động sản (step 1)
  form.querySelectorAll('[data-step="1"] button').forEach(btn => {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      form.querySelectorAll('[data-step="1"] button').forEach(b => b.classList.remove('selected', 'border-blue-600'));
      btn.classList.add('selected', 'border-blue-600');
    });
  });

  // Xử lý nút "次へ" và "戻る"
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
      } else if (btnText === '完了') {
        e.preventDefault();
        if (validateStep(currentStep)) {
          // Submit toàn bộ form
          form.submit();
        }
      }
    }
  });

  // Ẩn/hiện step đầu tiên
  showStep(1);
});
