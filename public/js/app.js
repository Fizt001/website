// ─── SLIDER ───────────────────────────────────────────────────────────
document.querySelectorAll('[data-slider]').forEach(wrapper => {
    const track = wrapper.querySelector('.slider-track');
    const dots  = wrapper.querySelectorAll('.slider-dot');
    const items = wrapper.querySelectorAll('.slider-item');
    let current = 0;
    let timer;

    if (!track || items.length === 0) return;

    const go = (idx) => {
        current = (idx + items.length) % items.length;
        track.style.transform = `translateX(-${current * 100}%)`;
        dots.forEach((d, i) => d.classList.toggle('active', i === current));
    };

    const start = () => { timer = setInterval(() => go(current + 1), 4500); };
    const stop  = () => clearInterval(timer);

    wrapper.querySelector('.slider-btn.prev')?.addEventListener('click', () => { stop(); go(current - 1); start(); });
    wrapper.querySelector('.slider-btn.next')?.addEventListener('click', () => { stop(); go(current + 1); start(); });
    dots.forEach((d, i) => d.addEventListener('click', () => { stop(); go(i); start(); }));

    wrapper.addEventListener('mouseenter', stop);
    wrapper.addEventListener('mouseleave', start);

    // Touch/swipe support
    let touchStartX = 0;
    track.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; stop(); }, { passive: true });
    track.addEventListener('touchend', e => {
        const diff = touchStartX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 50) go(diff > 0 ? current + 1 : current - 1);
        start();
    }, { passive: true });

    go(0); start();
});

// ─── NAVBAR SCROLL ────────────────────────────────────────────────────
const navbar = document.querySelector('.navbar');
if (navbar) {
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 30);
    });
}

// ─── HAMBURGER MENU ───────────────────────────────────────────────────
const hamburger = document.querySelector('.navbar-hamburger');
const menu      = document.querySelector('.navbar-menu');
if (hamburger && menu) {
    hamburger.addEventListener('click', () => menu.classList.toggle('open'));
    document.addEventListener('click', e => {
        if (!navbar.contains(e.target)) menu.classList.remove('open');
    });
}

// ─── SCROLL REVEAL ────────────────────────────────────────────────────
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
            setTimeout(() => entry.target.classList.add('visible'), i * 80);
            revealObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// ─── COUNTER ANIMATION ────────────────────────────────────────────────
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const el  = entry.target;
            const end = parseInt(el.dataset.count, 10);
            const dur = 1800;
            const step = 16;
            const inc  = end / (dur / step);
            let cur = 0;
            const tick = setInterval(() => {
                cur = Math.min(cur + inc, end);
                el.textContent = Math.floor(cur).toLocaleString('id-ID') + (el.dataset.suffix || '');
                if (cur >= end) clearInterval(tick);
            }, step);
            counterObserver.unobserve(el);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('[data-count]').forEach(el => counterObserver.observe(el));

// ─── PARTICLES (Aurora / Future themes) ───────────────────────────────
function initParticles() {
    const canvas = document.getElementById('particles-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    const theme = document.documentElement.dataset.theme;

    // Only run on aurora or future theme
    if (!['aurora', 'future'].includes(theme)) return;

    const color = theme === 'aurora' ? '0,229,255' : '168,85,247';
    let W = canvas.width = canvas.offsetWidth;
    let H = canvas.height = canvas.offsetHeight;

    const particles = Array.from({ length: 60 }, () => ({
        x: Math.random() * W, y: Math.random() * H,
        r: Math.random() * 1.5 + 0.5,
        vx: (Math.random() - 0.5) * 0.4,
        vy: (Math.random() - 0.5) * 0.4,
        o: Math.random() * 0.4 + 0.1,
    }));

    const draw = () => {
        ctx.clearRect(0, 0, W, H);
        particles.forEach(p => {
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(${color},${p.o})`;
            ctx.fill();
            p.x += p.vx; p.y += p.vy;
            if (p.x < 0) p.x = W; if (p.x > W) p.x = 0;
            if (p.y < 0) p.y = H; if (p.y > H) p.y = 0;
        });
        requestAnimationFrame(draw);
    };
    draw();

    window.addEventListener('resize', () => {
        W = canvas.width = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
    });
}
initParticles();

// ─── SMOOTH ACTIVE NAV ────────────────────────────────────────────────
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.navbar-menu a[href^="#"]');
window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => {
        if (window.scrollY >= s.offsetTop - 100) current = s.id;
    });
    navLinks.forEach(a => {
        a.classList.toggle('active', a.getAttribute('href') === '#' + current);
    });
});
