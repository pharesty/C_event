  // Optional interactivity
  const cards = document.querySelectorAll('.card');
        
  cards.forEach(card => {
      card.addEventListener('mouseenter', () => {
          card.style.transform = 'scale(1.03)';
          card.style.boxShadow = '0 10px 20px rgba(0,0,0,0.1)';
      });

      card.addEventListener('mouseleave', () => {
          card.style.transform = 'scale(1)';
          card.style.boxShadow = 'none';
      });
  });