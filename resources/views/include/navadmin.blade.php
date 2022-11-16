<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Admin</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('admin.formation') }}">Formation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.chapitre') }}">Chapitre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.fichier') }}">Fichier</a>
        </li>
      </ul>
    </div>
  </nav>