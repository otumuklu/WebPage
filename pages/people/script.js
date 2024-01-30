window.addEventListener('scroll', function() {
  var scrollingText = document.getElementById('scrolling-text');
  var scrollPosition = window.scrollY;

  // You can adjust the value (300) to control when the text appears
  if (scrollPosition > 300) {
    scrollingText.classList.add('visible');
    scrollingText.classList.remove('hidden');
  } else {
    scrollingText.classList.remove('visible');
    scrollingText.classList.add('hidden');
  }
});
