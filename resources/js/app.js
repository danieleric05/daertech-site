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
})();
