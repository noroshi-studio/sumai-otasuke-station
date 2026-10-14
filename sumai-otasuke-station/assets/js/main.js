(() => {
  'use strict';

  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const header = document.querySelector('.site-header');
  const progress = document.querySelector('.scroll-progress span');
  const menuButton = document.querySelector('.menu-button');
  const nav = document.querySelector('.global-nav');

  const onScroll = () => {
    const top = window.scrollY;
    const max = document.documentElement.scrollHeight - window.innerHeight;
    header?.classList.toggle('is-scrolled', top > 24);
    if (progress) progress.style.transform = `scaleX(${max > 0 ? top / max : 0})`;
    if (!reduceMotion) {
      document.documentElement.style.setProperty('--parallax', `${Math.min(top * .055, 48)}px`);
    }
  };
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  menuButton?.addEventListener('click', () => {
    const open = menuButton.getAttribute('aria-expanded') === 'true';
    menuButton.setAttribute('aria-expanded', String(!open));
    nav?.classList.toggle('is-open', !open);
    document.body.classList.toggle('menu-open', !open);
  });

  nav?.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => {
    menuButton?.setAttribute('aria-expanded', 'false');
    nav.classList.remove('is-open');
    document.body.classList.remove('menu-open');
  }));

  const revealItems = document.querySelectorAll('.reveal, .stagger');
  if (reduceMotion || !('IntersectionObserver' in window)) {
    revealItems.forEach((item) => item.classList.add('is-visible'));
  } else {
    const revealObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px' });
    revealItems.forEach((item) => revealObserver.observe(item));
  }

  const counters = document.querySelectorAll('[data-count]');
  const animateCount = (element) => {
    const target = Number(element.dataset.count || 0);
    const start = performance.now();
    const duration = 1100;
    const frame = (now) => {
      const progressValue = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progressValue, 3);
      element.textContent = String(Math.round(target * eased));
      if (progressValue < 1) requestAnimationFrame(frame);
    };
    requestAnimationFrame(frame);
  };
  if (reduceMotion || !('IntersectionObserver' in window)) {
    counters.forEach((counter) => { counter.textContent = counter.dataset.count; });
  } else {
    const countObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCount(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: .5 });
    counters.forEach((counter) => countObserver.observe(counter));
  }

  const tabs = document.querySelectorAll('[data-case-tab]');
  const panels = document.querySelectorAll('[data-case-panel]');
  tabs.forEach((tab) => tab.addEventListener('click', () => {
    tabs.forEach((item) => item.setAttribute('aria-selected', String(item === tab)));
    panels.forEach((panel) => {
      const active = panel.dataset.casePanel === tab.dataset.caseTab;
      panel.hidden = !active;
      if (active) requestAnimationFrame(() => panel.classList.add('is-visible'));
    });
  }));

  document.querySelector('form.demo-form')?.addEventListener('submit', (event) => {
    event.preventDefault();
    const status = event.currentTarget.querySelector('.form-status');
    status.textContent = '静的確認版のため送信されません。WordPress版でフォームのショートコードを設定できます。';
    status.focus?.();
  });
})();
