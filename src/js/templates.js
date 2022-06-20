class Header extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <div class="nav-menu">
        <div class="logo-wrapper">
          <a href="../Home/home.html">
            <img id="logo" src="../../../public/assets/logo-small.png" alt="AuCo - logo">
            <span>Autograph Collector</span>
          </a>
        </div>

        <div class="searchbar-wrapper">
          <img id="search-icon" src="../../../public/assets/icons/search_black_24dp.svg" alt="Search icon">
          <input type="text" name="searchbar" id="searchbar">
        </div>

        <div class="advanced-search">
          <form>
            <!-- COUNTRY -->
            <div class="filter-group">
              <h3>Country</h3>
              <div class="input-group input-group--search">
                <input type="text" id="country" placeholder="Search">
                <div class="country-suggestions-dropdown">
                  <ul>
                    <li><p>Romania</p></li>
                    <li><p>USA</p></li>
                    <li><p>UK</p></li>
                    <li><p>Canada</p></li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- DOMAINS -->
            <div class="filter-group">
              <h3>Domains</h3>
              <div class="input-group">
                <input type="checkbox" name="music" id="music" value="Music">
                <label for="music">Music</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="actors" id="actors" value="Actors">
                <label for="actors">Actors</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="sport" id="sport" value="Sport">
                <label for="sport">Sport</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="writers" id="writers" value="Writers">
                <label for="writers">Writers</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="influencers" id="influencers" value="Influencers">
                <label for="influencers">Influencers</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="business" id="business" value="Business">
                <label for="business">Business</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="others" id="others" value="Others">
                <label for="others">Others</label>
              </div>
            </div>

            <!-- GIVEN ON -->
            <div class="filter-group">
              <h3>Given on</h3>
              <div class="input-group">
                <input type="checkbox" name="book" id="book" value="Music">
                <label for="book">Music</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="paper" id="paper" value="Paper">
                <label for="paper">Paper</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="t-shirt" id="t-shirt" value="T-shirt">
                <label for="t-shirt">T-shirt</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="ball" id="ball" value="Ball">
                <label for="ball">Ball</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="skin" id="skin" value="Skin">
                <label for="skin">Skin</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="others" id="others" value="Others">
                <label for="others">Others</label>
              </div>
            </div>

            <!-- CONTEXT -->
            <div class="filter-group">
              <h3>Context</h3>
              <div class="input-group">
                <input type="checkbox" name="concert" id="concert" value="Concert">
                <label for="concert">Concert</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="meet-and-greet" id="meet-and-greet" value="Meet & greet">
                <label for="meet-and-greet">Meet & greet</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="book-launch" id="book-launch" value="Book launch">
                <label for="book-launch">Book launch</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="movie-premiere" id="movie-premiere" value="Movie premiere">
                <label for="movie-premiere">Movie premiere</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="sport-event" id="sport-event" value="Sport event">
                <label for="sport-event">Sport event</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="product-launch" id="product-launch" value="Product launch">
                <label for="product-launch">Product launch</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="others" id="others" value="Others">
                <label for="others">Others</label>
              </div>
            </div>

             <!-- PRICE -->
             <div class="filter-group">
              <h3>Price</h3>
              <div class="input-group">
                <input type="checkbox" name="0-10-euro" id="0-10-euro" value="0-10 Euro">
                <label for="0-10-euro">0-10 Euro</label>
              </div>

              <div class="input-group">
                <input type="checkbox" name="10-50-euro" id="10-50-euro" value="10-50 Euro">
                <label for="10-50-euro">10-50 Euro</label>
              </div>

              <div class="input-group">
                <input type="range" name="min" id="min" min="1" max="10000" value="50">
                <input type="range" name="max" id="max" min="1" max="10000" value="10000">
              </div>
            </div>

            <div class="input-group--submit">
              <input type="submit" value="Search">
            </div>
          </form>

          <button class="advanced-search__close">x</button>
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


customElements.define("main-header", Header);
customElements.define("side-menu", SideMenu);
customElements.define("main-footer", Footer);
