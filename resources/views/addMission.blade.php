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
                            </svg><span>&nbsp;Programmer Cours</span></a><a class="nav-link active" href="/programmerMission"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-table">
                                <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"></path>
                            </svg><span>&nbsp;Programmer Mission</span></a><a class="nav-link" href="/ajouterProf"><i class="material-icons">add_box</i><span>Inscrire Enseignants</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/profile"><i class="fas fa-user"></i>Profil</a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        @include('NavBar')
                <div class="container-fluid">
                    @include('flash::message')
                    <h3 class="text-dark mb-4" data-aos="fade-left" data-aos-duration="600">Ajouter/ Modifier le programme</h3>
                    <div class="card shadow" data-aos="fade-up-left" data-aos-duration="600">
                        <div class="card-body"><div>
    <div class="table-responsive table mt-2" id="dataTable" role="grid">
        <form  method="POST">
            @csrf
                <table id="dataTable" class="table order-list">
                    <thead style="  font-weight: bold; text-align: center;">
                    <tr>
                        <td >Nom et Prénoms</td>
                        <td >Qualité</td>
                        <td >Adresse Complète</td>
                        <td >Date de Naissance</td>
                        <td >Lieu de Naissance</td>
                        <td >Nationalité</td>
                        <td >Matricule et / ou IFU</td>
                        <td >Indice et Grade</td>
                        <td >Intitulé de l&#39;UE </td>
                        <td >Groupe pedagogique</td>
                        <td >Anée Academique</td>
                        <td >Nombre d&#39;heure de l&#39;UE (de la mission)</td>
                        <td >Durée de la mission </td>
                        <td >Date et jour d&#39;arrivé</td>
                        <td >Date et jour de retour</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>



                     </tr>
                </tbody>
                </table>
            </div>
            <div style="display: flex; float: right;">
                <button type="button" class="btn btn-primary btn-sm" id="addrow" style="margin-right: 20px;">Ajouter</button>
                <input type="submit" class="btn btn-primary btn-sm " id="save" name="save" value="Enregistrer" >
            </div>
            <input type="hidden" id="compteur" name="compteur">
        </form>
    </div>
    <div class="card-body" style="margin-top: 40px;"></div>
</div>
</div>
</div>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script  type="text/javascript">

var counter = 0;
document.getElementById('addrow').onclick= function (){addNewLine()};

function  addNewLine() {
    var newRow = $("<tr>");
    var cols = "";
    cols += '<td><select class="custom-select chosen" style="width: 200px;" required style="color: #555555;" name="selectNom'+counter+'">@foreach ($profile as $profil)<option value="{{$profil->nom}} {{$profil->prenom}}">{{$profil->nom}} {{$profil->prenom}}</option>@endforeach</select></td>';
    cols += '<td><select class="custom-select chosen" style="width: 150px;" required style="color: #232323;" name="selectQualite'+counter+'">@foreach ($qualite as $qualit)<option value="{{$qualit->qualite}}">{{$qualit->qualite}}</option>@endforeach</select></td>';
    cols += '<td ><input type="text" required style="width: 150px;" name="adresse_complet'+counter+'" class="form-control"></td>';
    cols += '<td ><input type="date" required style="width: 150px;" name="date_naissance'+counter+'" class="form-control"></td>';
    cols += '<td ><input type="text" required style="width: 150px;" name="lieu'+counter+'" class="form-control"></td>';
    cols += '<td ><input type="text" required style="width: 150px;" name="Nationalite'+counter+'" class="form-control"></td>';
    cols += '<td ><input type="text" required style="width: 150px;" name="matricul'+counter+'" class="form-control"></td>';
    cols += '<td ><input type="text" required style="width: 150px;" name="grade'+counter+'" class="form-control"></td>';
    cols += '<td><select class="custom-select chosen" style="width: 120px;" required style="color: #232323;" name="selectUE'+counter+'">@foreach ($ue as $Ue)<option value="{{$Ue->abreviation}}">{{$Ue->abreviation}}</option>@endforeach</select></td>';
    cols += '<td><select class="custom-select chosen" required style="width: 150px;" name="selectGPE'+counter+'">@foreach ($group as $groupe)<option value="{{$groupe->designation}}">{{$groupe->designation}}</option>@endforeach</select></td>';
    cols += '<td ><input type="text" name="Annee_academique'+counter+'" style="width: 150px;" class="form-control" required></td>';
    cols += '<td ><input type="text" name="heure_UE'+counter+'" style="width: 150px;" class="form-control" required></td>';
    cols += '<td ><input type="text" name="dure_mission'+counter+'" style="width: 150px;" class="form-control" required></td>';
    cols += '<td ><input type="date" name="dure_jourArrive'+counter+'" style="width: 150px;" class="form-control" required></td>';
    cols += '<td ><input type="date" name="dure_jourRetour'+counter+'" style="width: 150px;" class="form-control" required></td>';


    $(".chosen").select2();

    cols += '<td><button id="ibtnDel" class="ibtnDel btn btn-md btn-danger "  value="Supprimer">Supprimer</button></td>';
    newRow.append(cols);
    $("table.order-list").append(newRow);
    document.getElementById('compteur').value=counter;
    counter++;
  }


$("table.order-list").on("click", ".ibtnDel", function (event) {
    $(this).closest("tr").remove();
});

</script>
@endsection
