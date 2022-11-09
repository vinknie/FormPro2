<header id="comebacktop">
  <nav>
  <div class="menu-icon">
      <i class="fa fa-bars fa-2x"></i>
  </div>
  <div class="nameSite">
      FormPro
  </div>
  <ul id="scrolling-menu">
      <li><a href="{{ route('pages.index') }}">Accueil</a></li>
      <li><a href="{{ route('pages.elearning') }}">E-learning</a>
          <ul class="sous">
              <li><a href="{{ route('pages.cours') }}">Cours</a></li>
              <li><a href="{{ route('pages.video') }}">Vidéos</a></li>
              <li><a href="{{ route('pages.live') }}">Direct</a></li>
          </ul>
      </li>
      <li><a href="">Examen</a>
          <ul class="sous">
              <li><a href="">QCM</a>
              </li>
              <li><a href="">Enoncé</a></li>
          </ul>
      </li>
      
      <li><a href="#contactfooter">Contact</a></li>
      @auth <!-- Si log menu apparait -->
      <li><a href="{{ route('pages.profil') }}">Mon espace Personnel</a>
        <ul class="sous">
            <li><a href="">Profil</a>
            </li>
            <li><a href="">Notes</a></li>
        </ul>
    </li>
    @endauth
    <li><a href="{{ route('pages.satisfaction') }}">Satisfaction</a></li>  
      
      <li><a href="{{ route('pages.admin') }}">BackOffice</a></li>

      <li><a href="{{ route('admin.backoffice') }}">BackOffice2</a></li>

         <li class="nav-item">
              <a class="nav-link" href="{{ route('pages.register') }}">Inscription</a>
         </li>

         @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('pages.login') }}">Connexion</a>
          </li>

          @endguest
          @auth
          <li class="nav-item">
              <a class="nav-link" href="{{ route('pages.logout') }}">Déconnexion</a>
          </li>
          @endauth
      
  </ul>
</nav>

</header>