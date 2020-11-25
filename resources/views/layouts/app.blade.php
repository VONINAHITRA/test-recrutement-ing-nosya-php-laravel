<!DOCTYPE html>
<html lang="fr">
@section('htmls')
	@include('layouts.partials.htmls')
@show
<body>
	 <div class="wrapper">
	<!-- Menu de la page Accueil et utilisateurs -->
	  @include('layouts.partials.title')
	 </div>
	 <div class="content-wrapper">
	  <!-- Le contenu de la page -->
	  @yield('main-content')
	 </div>
	  @include('sweet::alert')

	 @section('scripts')
    @include('layouts.partials.scripts')
@show
</body>
</html>