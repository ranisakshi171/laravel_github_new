// Dark Mode Toggle
function toggleDarkMode() {
    const body = document.getElementById('dashboardBody');
    if (!body) return;

    body.classList.toggle('dark-mode');
    const isDark = body.classList.contains('dark-mode');
    localStorage.setItem('dashboardDarkMode', isDark ? 'true' : 'false');

    const btn = document.querySelector('[onclick="toggleDarkMode()"]');
    const text = document.getElementById('darkModeText');
    if (btn) {
        const icon = btn.querySelector('i');
        if (icon) {
            icon.className = isDark ? 'bi bi-sun-fill me-2' : 'bi bi-moon-fill me-2';
        }
    }
    if (text) {
        text.textContent = isDark ? 'Light Mode' : 'Dark Mode';
    }
}

// Load dark mode preference
document.addEventListener('DOMContentLoaded', function () {
    const body = document.getElementById('dashboardBody');
    if (body && localStorage.getItem('dashboardDarkMode') === 'true') {
        body.classList.add('dark-mode');
        const text = document.getElementById('darkModeText');
        if (text) text.textContent = 'Light Mode';
        const btn = document.querySelector('[onclick="toggleDarkMode()"]');
        if (btn) {
            const icon = btn.querySelector('i');
            if (icon) icon.className = 'bi bi-sun-fill me-2';
        }
    }
});

// Toast notification system
function showToast(message, type) {
    const container = document.getElementById('toastContainer');
    if (!container) return;

    const icons = {
        success: 'bi-check-circle-fill',
        error: 'bi-exclamation-triangle-fill',
        info: 'bi-info-circle-fill',
    };

    const toast = document.createElement('div');
    toast.className = 'toast-notification ' + type;
    toast.innerHTML = `
        <i class="bi ${icons[type] || icons.info} toast-icon"></i>
        <span>${message}</span>
    `;
    container.appendChild(toast);

    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        toast.style.transition = 'all 0.3s ease';
        setTimeout(() => toast.remove(), 300);
    }, 3500);
}

// Auto-dismiss alerts
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.alert-dismissible').forEach(alert => {
        setTimeout(() => {
            if (alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
    });
});

// Smooth scroll
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
});
