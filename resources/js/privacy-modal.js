window.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.js-privacy-link').forEach(el => {
    el.addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById('privacyModal').classList.remove('hidden');
    });
  });

  const closeBtn = document.getElementById('closePrivacyModal');
  if (closeBtn) {
    closeBtn.addEventListener('click', function() {
      document.getElementById('privacyModal').classList.add('hidden');
    });
  }
  
  const closeIcon = document.getElementById('closePrivacyModalIcon');
  if (closeIcon) {
    closeIcon.addEventListener('click', function() {
      document.getElementById('privacyModal').classList.add('hidden');
    });
  }
  
  const modal = document.getElementById('privacyModal');
  if (modal) {
    modal.addEventListener('click', function(e) {
      if (e.target === this) this.classList.add('hidden');
    });
  }
}); 
