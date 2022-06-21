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

  const searchBar = menu.querySelector(".searchbar-wrapper input#searchbar");
  searchBar.addEventListener("focus", openAdvancedSearch);

  function openAdvancedSearch(_ev) {
    const advancedSearch = menu.querySelector(".advanced-search");
    advancedSearch.classList.add("open");


    const closeBtn = menu.querySelector(".advanced-search__close");
    closeBtn.addEventListener("click", closeAdvancedSearch);

    document.body.addEventListener("click", handleClickOutsideMenu);
  }

  function handleClickOutsideMenu(ev) {
    const isOutside = !ev.target.closest(".nav-menu");
    console.log(isOutside);
    if (isOutside) {
      closeAdvancedSearch();
      document.body.removeEventListener("click", handleClickOutsideMenu);
    }
  }

  function closeAdvancedSearch() {
    const advancedSearch = menu.querySelector(".advanced-search");
    advancedSearch.classList.remove("open");
  }


})();