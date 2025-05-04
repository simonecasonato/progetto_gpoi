document.getElementById('languageSwitcher').addEventListener('change', function () {
  const lang = this.value;
  fetch(`lang/${lang}.json`)
    .then(res => res.json())
    .then(translations => {
      document.querySelectorAll('[data-i18n]').forEach(elem => {
        const key = elem.getAttribute('data-i18n');
        if (translations[key]) {
          elem.textContent = translations[key];
        }
      });
    });
});
