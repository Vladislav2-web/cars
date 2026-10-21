import './bootstrap';

// Кнопка «Наверх»
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.createElement('button');
    btn.textContent = '↑ Наверх';
    btn.style.cssText = 'position: fixed; bottom: 20px; right: 20px; display: none; padding: 8px 12px; background: #2b6cb0; color: #fff; border: none; border-radius: 6px; cursor: pointer; z-index: 1000;';
    document.body.appendChild(btn);

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            btn.style.display = 'block';
        } else {
            btn.style.display = 'none';
        }
    });

    btn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});