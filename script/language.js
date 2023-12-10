$(document).ready(function() {
  localStorage.setItem('lang', 'nl');

  setLanguage();

  $('#btnEnglish').click(function() {
    localStorage.setItem('lang', 'en');
    setLanguage();
  });

  $('#btnDutch').click(function() {
    localStorage.setItem('lang', 'nl');
    setLanguage();
  });

  function setLanguage() {
    const selectedLang = localStorage.getItem('lang');

    document.querySelectorAll('[data-lang]').forEach(function(elem) {
      if (elem.getAttribute('data-lang') === selectedLang) {
        elem.style.display = 'block';
      } else {
        elem.style.display = 'none';
      }
    });
  }
});
