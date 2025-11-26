// JavaScript pour gérer le menu hamburger et l'overlay
    const hamburgerBtn = document.querySelector('.hamburger-btn');
    const mobileSidebar = document.querySelector('.mobile-sidebar');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');
    const closeSidebar = document.querySelector('.close-sidebar');

    hamburgerBtn.addEventListener('click', () => {
      mobileSidebar.classList.toggle('active');
      sidebarOverlay.classList.toggle('active');
      hamburgerBtn.classList.toggle('active');
      hamburgerBtn.setAttribute('aria-expanded', hamburgerBtn.classList.contains('active'));
    });

    closeSidebar.addEventListener('click', () => {
      mobileSidebar.classList.remove('active');
      sidebarOverlay.classList.remove('active');
      hamburgerBtn.classList.remove('active');
      hamburgerBtn.setAttribute('aria-expanded', 'false');
    });

    sidebarOverlay.addEventListener('click', () => {
      mobileSidebar.classList.remove('active');
      sidebarOverlay.classList.remove('active');
      hamburgerBtn.classList.remove('active');
      hamburgerBtn.setAttribute('aria-expanded', 'false');
    });

    // JavaScript pour gérer les accordéons dans le menu mobile
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    accordionHeaders.forEach(header => {
      header.addEventListener('click', () => {
        const content = header.nextElementSibling;
        const icon = header.querySelector('i');
        content.style.display = content.style.display === 'block' ? 'none' : 'block';
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
      });
    });