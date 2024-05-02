// Animate container entrance (similar effect as before)
anime({
  targets: '.container',
  translateY: [-100, 0],
  opacity: [2, 1],
  easing: 'easeOutExpo',
  duration: 1500,
});

// Animate label transformation on focus
const inputContainers = document.querySelectorAll('.input-container');

inputContainers.forEach(container => {
  const input = container.querySelector('input');
  input.addEventListener('focus', () => {
    const label = container.querySelector('label');
    anime({
      targets: label,
      translateY: [-50, -110],
      scale: [1, 0.8],
      color: ['#aaa', '#fff'],
      duration: 300,
      easing: 'easeOutCubic',
    });
  });
});

