document.addEventListener('DOMContentLoaded', () => {
    const path = window.location.pathname;
    let currentFile = path.split('/').pop() || '';
    if (!currentFile) {
        currentFile = 'index.php';
    }

    // Динамічний title в залежності від сторінки
    const titleMap = {
        'login.php': 'AGFT — Вхід',
        'registration.php': 'AGFT — Реєстрація',
        '404.php': 'AGFT — Сторінку не знайдено',
        'index.php': 'AGFT — Головна',
        default: 'AGFT — Головна',
    };
    document.title = titleMap[currentFile] || titleMap.default;

    // Динамічна навігація (підсвітка активного пункту)
    const navLinks = document.querySelectorAll('nav a[href]');
    const normalizeHref = (href) => {
        if (!href || href === '#') return '';
        const file = href.split('/').pop();
        if (!file || file === '#') return '';
        return file;
    };
    navLinks.forEach(link => {
        const target = normalizeHref(link.getAttribute('href'));
        if (!target) return;
        if (target === currentFile) {
            link.parentElement?.classList.add('active');
        } else {
            link.parentElement?.classList.remove('active');
        }
    });

   
    const loginForm = document.querySelector('form');
    const loginInput = document.getElementById('login');

    if (loginForm && loginInput) {
        loginInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^a-zA-Z0-9_]/g, '');
        });

        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const emailInput = document.getElementById('email');
            const phoneInput = document.getElementById('phone');
            const passwordInput = document.getElementById('password');
            
            const login = loginInput.value;
            const email = emailInput.value.trim();
            const phone = phoneInput.value.trim();
            const password = passwordInput.value;

            const errors = [];

            if (login && !login.match(/^[a-zA-Z0-9_]{3,}$/)) {
                errors.push('Логін має містити мінімум 3 символи (латиниця, цифри, _)');
            }

            if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                errors.push('Невірний формат електронної пошти');
            }

            if (phone.search(/^\+380\d{9}$/) === -1) {
                errors.push('Телефон має бути у форматі +380XXXXXXXXX');
            }

            if (!password || password.search(/\s/) !== -1 || password.length < 8) {
                errors.push('Пароль має містити щонайменше 8 символів та не повинен містити пробілів.');
            }

            if (errors.length > 0) {
                alert(errors.join('\n'));
                return;
            }
        });
    }
});
