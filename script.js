const langSelector = document.getElementById('languageSwitcher');

langSelector.addEventListener('change', (e) => {
  const lang = e.target.value;
  loadTranslations(lang);
});

function loadTranslations(lang) {
  fetch(`lang/${lang}.json`)
    .then(res => res.json())
    .then(translations => {
      document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.getAttribute('data-i18n');
        if (translations[key]) {
          el.textContent = translations[key];
        }
      });
    });
}

// Carica lingua predefinita all'avvio
loadTranslations('it');
