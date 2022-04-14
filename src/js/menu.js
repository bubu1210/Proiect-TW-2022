(function onLoad() {
  const menu = document.querySelector(".nav-menu");
  const profileMenu = menu.querySelector(".profile-menu");
  profileMenu.addEventListener("click", openDropdown);

  function openDropdown(_ev) {
    const dropdown = profileMenu.querySelector(".profile-menu__dropdown");

    if (dropdown) {
      dropdown.classList.toggle("visible");
    }
  }
})();