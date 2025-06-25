window.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.js-terms-link').forEach(el => {
    el.addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById('termsModal').classList.remove('hidden');
    });
  });
  // Đóng modal khi click nút
  const closeBtn = document.getElementById('closeTermsModal');
  if (closeBtn) {
    closeBtn.addEventListener('click', function() {
      document.getElementById('termsModal').classList.add('hidden');
    });
  }
  // Đóng modal khi click icon X
  const closeIcon = document.getElementById('closeTermsModalIcon');
  if (closeIcon) {
    closeIcon.addEventListener('click', function() {
      document.getElementById('termsModal').classList.add('hidden');
    });
  }
  // Đóng khi click ra ngoài
  const modal = document.getElementById('termsModal');
  if (modal) {
    modal.addEventListener('click', function(e) {
      if (e.target === this) this.classList.add('hidden');
    });
  }
}); 
