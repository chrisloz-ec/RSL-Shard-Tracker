  <div class="container-fluid px-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black-2 px-2">
      <div class="container-fluid">
        <a class="navbar-brand px-2" href="#"><img class="img-fluid" width="30" src="img/RAID_white.png"> &nbsp;Shard Tracker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <span class="v-line"></span>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="PanelControl.php">Homepage</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Record</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Setting
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark bg-black-2" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="Profile.php">Profile</a></li>
                <li><a class="dropdown-item disabled" href="#">Access History</a></li>
                <li><a class="dropdown-item" href="Documentation.php">Documentation</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">
                  <div id="google_translate_element"></div>
                  <script type="text/javascript">
                    function googleTranslateElementInit() {
                      new google.translate.TranslateElement(
                        {
                          pageLanguage: 'en', 
                          //includedLanguages: 'de,en,es,fr'
                          includedLanguages: 'de,zh,es,en,fr,ja,ko,pt,ru'
                        }, 
                        'google_translate_element');
                    }
                    var selectGoogle = document.getElementsByClassName("goog-te-combo");
                    selectGoogle.className += " form-select form-select-sm";
                  </script>
                  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="LogOut.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>