document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('multiStepForm');
  if (!form) return;

  let currentStep = 1;
  const totalSteps = 4;
  const steps = form.querySelectorAll('.step');

  function showStep(step) {
    steps.forEach((el, idx) => {
      if (idx === step - 1) {
        console.log("🚀 ~ steps.forEach ~ idx1:", idx, step);
        el.classList.remove('hidden');
      } else {
        console.log("🚀 ~ steps.forEach ~ idx1:", idx, step);
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
      const fields = ['postcode', 'prefecture', 'city', 'address'];
      fields.forEach(name => {
        const input = form.querySelector(`[data-step="2"] [name="${name}"]`);
        if (input && !input.value.trim()) {
          input.classList.add('border-red-500');
          const err = document.createElement('div');
          err.className = 'js-error text-red-500 text-xs mt-1';
          err.innerText = '必須項目です';
          input.parentNode.appendChild(err);
          valid = true;
        }
      });
    }
    if (step === 3) {
      const company = form.querySelector('[data-step="3"] input[name="company"]');
      if (!company) {
        const err = document.createElement('div');
        company.classList.add('border-red-500');
        err.className = 'js-error text-red-500 text-xs mt-2';
        err.innerText = '利用状況を選択してください';
        company.parentNode.appendChild(err);
        valid = true;
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
      } else if (btnText === '完了' || btnText === '【無料】料金を比較する') {
        e.preventDefault();
        if (validateStep(currentStep)) {
          // Submit toàn bộ form
          form.submit();
        }
      }
    }
  });

  showStep(1);

  // Toggle chi tiết step3 (dùng click, không dùng checkbox)
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
    // Mặc định mở: arrow-up hiện, arrow-down ẩn
    var content = toggle.parentNode.querySelector('.toggle-detail-content');
    var arrows = toggle.querySelectorAll('.toggle-arrow');
    if (content && arrows.length === 2) {
      arrows[0].style.display = 'inline';
      arrows[1].style.display = 'none';
    }
  });
});
