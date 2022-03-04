@extends('template')
@section('content')
<div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: #4e73df;">
        <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-text mx-3"><span>Menu</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"><a class="nav-link" href="/programme"><i class="fas fa-table"></i><span>Programme</span></a><a class="nav-link" href="/mission"><i class="fas fa-table"></i><span>Mission</span></a></li>
                <li class="nav-item"><a class="nav-link" href="/programmerCours"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-table">
                            <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"></path>
                        </svg><span>&nbsp;Programmer Cours</span></a><a class="nav-link" href="/programmerMission"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-table">
                            <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"></path>
                        </svg><span>&nbsp;Programmer Mission</span></a><a class="nav-link active" href="/ajouterProf"><i class="material-icons">add_box</i><span>Inscrire Enseignants</span></a></li>
                <li class="nav-item"><a class="nav-link" href="/profile"><i class="fas fa-user"></i>Profil</a></li>
            </ul>
            <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </nav>
    @include('NavBar')
    <div class="container-fluid" data-aos="fade-up-left" data-aos-duration="600" >
        @include('flash::message')
        <h3 class="text-dark mb-4">Ajouter/ Modifier le programme</h3>
        
        <form method="POST" action="/ajouterProf" id="containerAddProf" name="containerAddProf">
                @csrf
            <div class="card-body">

            </div>
        
    </div>
    <div id="btnDiv">
        <div style="display: flex; float: right;">
            <button type="button" class="btn btn-primary btn-sm" id="addLigneProf" name="addLigneProf" style="margin-right: 20px;">Ajouter</button>
            <input type="submit" class="btn btn-primary btn-sm " id="save" name="save" value="Enregistrer" >
            <input type="hidden" class="btn btn-primary btn-sm " id="compteur" name="compteur" value="" >
        </div>
    </div> </form>
</div>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script  type="text/javascript">
    $(document).ready(function () {
        var counter = 0;
                $("#addLigneProf").on("click", function () {
                    var newCard='<div class="card shadow" style="margin-top: 30px;">'+
                    '<div class="card-body" style="margin-top: 30px;">'+
                    '<div class="form-row">'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="first_name"><strong>Nom</strong><br /></label><input type="text" class="form-control" placeholder="Flavien" name="first_name'+counter+'" required /></div>'+
                    '</div>'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="last_name"><strong>Prenoms</strong><br /></label><input type="text" class="form-control" placeholder="LANMANTCHION" name="last_name'+counter+'" required /></div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-row">'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="email"><strong>Email </strong></label><input type="email" class="form-control" placeholder="flavienProf@gmail.com" name="email'+counter+'" required /></div>'+
                    '</div>'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="first_name"><strong>Mots de passe par defaut</strong><br /></label><input type="text" class="form-control" id="pass" placeholder="admin" name="pass'+counter+'" required /></div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-row">'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="last_name"><strong>Date de naissance</strong><br /></label><input class="form-control" name="date'+counter+'" type="date" required /></div>'+
                    '</div>'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="last_name"><strong>Lieu de naissance</strong><br /></label><input class="form-control" name="lieu_naissance'+counter+'" type="text" required /></div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-row">'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="first_name"><strong>Genre</strong><br /></label><select class="custom-select chosen" id="genre" required style="color: #232323;" name="genre'+counter+'">'+
                    '<option value="Masculin" selected>Masculin</option>'+
                    '<option value="Feminin" selected>Feminin</option>'+
                    '</select></div>'+
                    '</div>'+
                    '<div class="col">'+
                    '<div class="form-group"><label id="num" for="last_name" name><strong>Numéro de telephone </strong><br /></label><input type="text" class="form-control" id="num" placeholder="67000000" name="num'+counter+'" required/></div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-row">'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="first_name"><strong>Diplome</strong><br /></label><select class="custom-select chosen" id="diplome" required style="color: #232323;" name="diplome'+counter+'">'+
                    '<option value="12">Bac</option>'+
                    '<option value="13">Licence</option>'+
                    '<option value="14">Master</option>'+
                    '<option value="15" selected>Doctorat</option>'+
                    '</select></div>'+
                    '</div>'+
                    '<div class="col">'+
                    '<div class="form-group"><label id="num-1" for="last_name" name><strong>Numéro matricule </strong><br /></label><input type="text" class="form-control" id="matricule" placeholder="E632541" name="matricule'+counter+'" required/></div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-row">'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="first_name"><strong>Adresse</strong><br /></label><input type="text" class="form-control" id="adresse" name="adresse'+counter+'" placeholder="Lokossa, BP201" required/></div>'+
                    '</div>'+
                    '<div class="col">'+
                    '<div class="form-group"><label for="last_name" name><strong>Type</strong><br /></label><select class="custom-select chosen" id="type" required style="color: #232323;" name="type'+counter+'">'+
                    '<option value="12">Permanent</option>'+
                    '<option value="13">Vacataire</option>'+
                    '<option value="14">Missionnaire</option>'+
                    '</select></div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>';
                    $("#containerAddProf").append(newCard);
                    document.getElementById('compteur').value=counter;
                    counter++;

                });
       });

   </script>
@endsection
