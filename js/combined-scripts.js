// Place all javascripts in this file. Minify before going to production.




// Script to display / hide the mobile navigation.

const toggleMenu = document.querySelector(".primary-navigation button");
const menu = document.querySelector(".primary-navigation ul");

toggleMenu.addEventListener("click", function () {
  const open = JSON.parse(toggleMenu.getAttribute("aria-expanded"));
  toggleMenu.setAttribute("aria-expanded", !open);
  menu.hidden = !menu.hidden;
});
// End script to display / hide the mobile navigation.