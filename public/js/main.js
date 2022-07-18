const linksNavbarList = document.querySelector('#links-navbar-list');
const burgerMenuNavbar = document.querySelector('#burger-menu');

console.log(linksNavbarList);
console.log(burgerMenuNavbar);

burgerMenuNavbar.addEventListener('click', function() {
  linksNavbarList.classList.toggle('active-navbar');
})