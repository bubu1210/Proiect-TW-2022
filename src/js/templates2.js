// class Header extends HTMLElement {
//   connectedCallback() {
//     this.innerHTML = `
//         <div class="nav-menu">
//         <div class="logo-wrapper">
//           <a href="./homeBE.php">
//             <img id="logo" src="../../public/assets/logo-small.png" alt="AuCo - logo">
//             <span>Autograph Collector</span>
//           </a>
//         </div>
    
//         <div class="searchbar-wrapper">
//           <img id="search-icon" src="../../public/assets/icons/search_black_24dp.svg" alt="Search icon">
//           <input type="text" name="searchbar" id="searchbar">
//         </div>
    
//         <div class="profile-menu-wrapper">
//         <a href="./loginBE.php" id="login-btn">Login</a>
    
//           <div class="profile-menu">
//             <img id="user-avatar" src="../../public/assets/avatar-default.svg" alt="User avatar">
//             <nav class="profile-menu__dropdown">
              
//               <a href="../pages/UserPage/user-page-add-autograph.html">My profile</a>
//               <a href="">Theme</a>
//               <a href="./logoutBE.php">Log out</a>
//             </nav>
//           </div>
//         </div>
//       </div>


//       `;
//   }
// }


class Footer extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
        <footer>
            <div class="content-wrapper">
                <div class="social-media">
                    <h3> Follow us </h3>
                    <div class="social-media-icons-wrapper">
                        <a href="#FacebookPage">
                            <img src="../../public/assets/icons/icons8-facebook-48.svg" alt="Facebook icon">
                        </a>

                        <a href="#InstagramPage">
                            <img src="../../public/assets/icons/icons8-instagram-48.svg" alt="Instagram icon">
                        </a>

                        <a href="#TwitterPage">
                            <img src="../../public/assets/icons/icons8-twitter-48.svg" alt="Twitter icon">
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

customElements.define('main-header', Header);
customElements.define('main-footer', Footer);


