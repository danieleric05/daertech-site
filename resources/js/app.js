(function () {
  var t = document.querySelector('.nav-toggle'), n = document.getElementById('nav');
  if (t && n) {
    var close = function () { n.classList.remove('open'); t.setAttribute('aria-expanded', 'false'); };
    t.addEventListener('click', function () {
      var o = n.classList.toggle('open');
      t.setAttribute('aria-expanded', o ? 'true' : 'false');
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && n.classList.contains('open')) { close(); t.focus(); }
    });
    n.addEventListener('click', function (e) { if (e.target.closest('a')) close(); });
  }
  document.addEventListener('submit', function (e) {
    var m = e.target.getAttribute && e.target.getAttribute('data-confirm');
    if (m && !window.confirm(m)) e.preventDefault();
  });
  document.addEventListener('change', function (e) {
    var i = e.target;
    if (i.type !== 'file' || !i.dataset.preview) return;
    var img = document.getElementById(i.dataset.preview);
    if (img && i.files && i.files[0]) { img.src = URL.createObjectURL(i.files[0]); img.hidden = false; }
  });

  /* Effets visuels : reveal au scroll + spotlight. Désactivés si prefers-reduced-motion. */
  var calm = window.matchMedia && matchMedia('(prefers-reduced-motion: reduce)').matches;
  var rv = document.querySelectorAll('[data-reveal]');
  if (calm || !('IntersectionObserver' in window)) {
    rv.forEach(function (e) { e.removeAttribute('data-reveal'); });
  } else {
    var io = new IntersectionObserver(function (list) {
      list.forEach(function (x) {
        if (!x.isIntersecting) return;
        var e = x.target;
        io.unobserve(e);
        e.style.transitionDelay = ([].indexOf.call(e.parentNode.children, e) % 4) * 80 + 'ms';
        e.classList.add('in');
        setTimeout(function () { e.removeAttribute('data-reveal'); e.style.transitionDelay = ''; }, 1100);
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
    rv.forEach(function (e) { io.observe(e); });
    document.addEventListener('pointermove', function (e) {
      var c = e.target.closest && e.target.closest('.card');
      if (!c) return;
      var r = c.getBoundingClientRect();
      c.style.setProperty('--mx', e.clientX - r.left + 'px');
      c.style.setProperty('--my', e.clientY - r.top + 'px');
    }, { passive: true });
  }
})();
