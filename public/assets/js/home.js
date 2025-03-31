       // Optional interactive effects
       const icons = document.querySelectorAll('.icon');
        
       icons.forEach(icon => {
           icon.addEventListener('mouseenter', () => {
               icon.style.transform = 'scale(1.1) rotate(5deg)';
           });

           icon.addEventListener('mouseleave', () => {
               icon.style.transform = 'scale(1) rotate(0deg)';
           });
       });