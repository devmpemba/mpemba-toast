function showToast(message, type = 'success', duration = 3000) {
    const toastContainer = document.querySelector('.toast-container');
    const toast = document.createElement('div');
    toast.classList.add('toast', 'show', type);
    toast.textContent = message;
  
    toastContainer.appendChild(toast);
  
    setTimeout(() => {
      toast.classList.remove('show');
      toast.style.opacity = '0';
  
      setTimeout(() => {
        toastContainer.removeChild(toast);
      }, 300);
    }, duration);
  }
  