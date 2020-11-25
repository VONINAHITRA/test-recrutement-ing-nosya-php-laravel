@extends('layouts.app')

@section('main-content')
    <section class="content section-form" id="section-form">
            <form class="form-horizontal" method="post" action="{{route('utilisateur.store')}}" enctype="multipart/form-data" onsubmit=" return confirmAdd();">
                  @csrf
					<div class="nav-tabs-custom">
							<span style="text-align: center;margin-bottom: 2%;"><h3 style="color: #000; ">Ajout/Modif</h3></span> <br>
						<div class="tab-content">
          @if ($errors->any())
               <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <span style="text-align: center; margin-left: 30% ">L'adresse email doit être unique pour chanque utilisateur, veuillez vérifier votre email</span>
               </div>
           @endif

           @if ($succesAdd==true)
               <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <span style="text-align: center; margin-left: 35% ">L'utilisateur à été bien ajouté dans la base</span>
               </div>
           @endif

           @if ($succesEdit==true)
               <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <span style="text-align: center; margin-left: 35% ">L'utilisateur à été bien modifié dans la base</span>
               </div>
           @endif
							<div class="active tab-pane" >
								<input type="hidden" name="id" id="id">
								<div class="form-group">
									<label for="nom" class="col-md-4 control-label">Nom : </label>
									<div class="col-md-4" >
									  <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" autocomplete="off" required>
									</div>
								</div>
								<div class="form-group">
									<label for="prenom" class="col-md-4 control-label">Prénom : </label>
									<div class="col-md-4">
									  <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom" autocomplete="off" required>
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-md-4 control-label">Email : </label>
									<div class="col-md-4">
									  <input type="email" class="form-control" name="email" id="email" placeholder="ex: x@y.z" autocomplete="off" required>
									</div>
							</div>
						</div>
					 <div class="form-group" style="margin-left: 34%; position: relative;" >
							<button type="submit" class="btn btn-info">Enregistrer</button>
					 </div>
					</div>
					<br/>
			</form>
  </section>
  <hr>
<div class="col-md-12">
	<div class="container">
	 <div class="box box-white">
<div class="container">
   <div class="col-md-8"><h3>Liste des utilisateurs</h3></div>
   <div class="col-md-3 col-md-offset-1">
    <form class="d-flex mr-3" action="{{route('utilisateur.recherche')}}" id="myFormSearch" name="myFormSearch">
      <input type="text" class="form-control input-small" name="recherche" id="recherche" placeholder="Recherche ..." autocomplete="off" onkeyup="return rechercheUser();">
      <input type="hidden" name="">
    </form>
  </div>
  
</div>

	  <div class="box-body no-padding col-md-12">
      <div  class="table-responsive box-body no-padding">
      	 <table class="table table-hover table-striped" id="tab-user">
      	 	  <thead>
      	 	  	<tr class="header" style="background-color:#00b0d3; color:#fff;">
      	 	  		<th>Modifier</th>
      	 	  		<th>Supprimer</th>
      	 	  		<th>Nom</th>
      	 	  		<th>Prénom</th>
      	 	  		<th>Email</th>
      	 	  		<th>Date de création</th>
      	 	  		<th>Date de modification</th>
      	 	  	</tr>
      	 	  </thead>
      	 	  @foreach($utilisateurs as $utilisateur)
      	 	    <tr>
      	 	    	<td>
                     <form action="{{route('utilisateur.edit', [$utilisateur->id])}}" method="post" class="">
                            @csrf
                            @method('GET')
                            <button class="btn btn-warning btn-xs" type="submit">
                             Modifier</button>
                        </form> 
                    </td>
                    <td> 
                      <form action = "{{route('utilisateur.destroy', [$utilisateur->id])}}" method="post" class="" onclick=" return confirmSup();">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-xs" type="submit"> Supprimer</button>
                     </form>
                    </td>
      	 	    	<td>{{$utilisateur->nom}}</td>
                <td>{{$utilisateur->prenom}}</td>
                <td>{{$utilisateur->email}}</td>
                <td>{{$utilisateur->created_at->format('j/m/Y')}}</td>
                <td>{{$utilisateur->updated_at->format('j/m/Y')}}</td>
      	 	    </tr>
      	 	  @endforeach
      	 </table>
      	   <span style="float: right;margin-right: 1rem">{{$utilisateurs->links()}}</span>
     <div>
    </div> 	
<div>
</div>	
</div>
</div>
</div>
@endsection
