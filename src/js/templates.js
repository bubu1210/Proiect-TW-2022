class Header extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <div class="nav-menu">
          <div class="logo-wrapper">
            <img id="logo" src="../../../public/assets/logo-small.png" alt="AuCo - logo">
            <span>Autograph Collector</span>
          </div>

          <div class="searchbar-wrapper">
            <img id="search-icon" src="../../../public/assets/icons/search_black_24dp.svg" alt="Search icon">
            <input type="text" name="searchbar" id="searchbar">
          </div>

          <div class="profile-menu-wrapper">
            <a href="../Login/login.html" id="login-btn">Login</a>

            <div class="profile-menu">
              <img id="user-avatar" src="../../../public/assets/avatar-default.svg" alt="User avatar">
              <nav class="profile-menu__dropdown">
                <a href="../UserPage/user-page.html">My profile</a>
                <a href="../UserPage/user-page-add-autograph.html">Add autograph</a>
                <a href="#">Theme</a>
                <a href="../Login/login.html">Log out</a>
              </nav>
            </div>
          </div>
        </div>
      `;
    }
}

class Footer extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <footer>
            <div class="content-wrapper">
                <div class="social-media">
                    <h3> Follow us </h3>
                    <div class="social-media-icons-wrapper">
                        <a href="#FacebookPage">
                            <img src="../../../public/assets/icons/icons8-facebook-48.svg" alt="Facebook icon">
                        </a>

                        <a href="#InstagramPage">
                            <img src="../../../public/assets/icons/icons8-instagram-48.svg" alt="Instagram icon">
                        </a>

                        <a href="#TwitterPage">
                            <img src="../../../public/assets/icons/icons8-twitter-48.svg" alt="Twitter icon">
                        </a>
                    </div>
                </div>

                <div class="authors">
                    <p>Authors: B&icirc;zu Dan-Alexandru & G&icirc;rbea Dumitru-Andrei</p>
                </div>
            </div>
        </footer>
      `;
    }
}

class SideMenu extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <div class="side-menu">
      <img id="menu-avatar" src="../../../public/assets/avatar-default.svg" alt="User avatar">
      <p class="user-description">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt est fugiat dolor impedit deleniti aliquid
        eaque quas officiis, vero consectetur quod ducimus vel at dignissimos eos assumenda autem accusamus enim.
      </p>
        <nav class="side-menu__nav">
        <a class="side-menu__nav__item current" href="./user-page.html">
          My autographs
        </a>

        <a class="side-menu__nav__item" href="./user-page-add-autograph.html">
          Add autograph
        </a>

        <a class="side-menu__nav__item" href="./user-page-my-info.html">
          My info
        </a>

        <a class="side-menu__nav__item" href="#">
          Generate raport
        </a>

        <a class="side-menu__nav__item" href="#">
          Delete account
        </a>
      </nav>
    </div>
    `;
  }
}

customElements.define("main-header", Header);
customElements.define("side-menu", SideMenu);
customElements.define("main-footer", Footer);
