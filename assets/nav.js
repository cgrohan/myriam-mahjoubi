
const btnOpen = document.querySelector('#btnOpen');
const btnClose = document.querySelector('#btnClose');
const media = window.matchMedia('(width < 40em)');
const topNavMenu = document.querySelector('.topnav__menu');
const main = document.querySelector('main');
const links = document.querySelector('.topnav__links')

function setupTopNav(e) {
    if (e.matches){
        //is mobile
        console.log('is mobile');
        topNavMenu.setAttribute('inert', '');
        topNavMenu.style.transition = 'none';
    } else {
        //is tablet/desktop
        console.log('is tablet/desktop');
        topNavMenu.removeAttribute('inert');
    }
}

function openMobileMenu(){
    btnOpen.setAttribute('aria-expanded', 'true');
    topNavMenu.removeAttribute('inert');
    topNavMenu.removeAttribute('style');
    main.setAttribute('inert', '');
    btnClose.focus();
}

function closeMobileMenu(){
    btnOpen.setAttribute('aria-expanded', 'false');
    topNavMenu.setAttribute('inert', '');
    main.removeAttribute('inert');
    btnOpen.focus();

    setTimeout(() => {
        topNavMenu.style.transition = "none";
    }, 500);
}

function fetchSection(){
    btnOpen.setAttribute('aria-expanded', 'false');
}

setupTopNav(media);

btnOpen.addEventListener('click', openMobileMenu);
btnClose.addEventListener('click', closeMobileMenu);

//permet de fermer le menu mobile au clique d'un menu
Array.from(links.children).forEach(function(link) {
    link.addEventListener('click', fetchSection);
});

media.addEventListener('change', function (e) {
    setupTopNav(e);
})