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
                    <li class="nav-item"><a class="nav-link active" href="/programmerCours"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-table">
                                <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"></path>
                            </svg><span>&nbsp;Programmer Cours</span></a><a class="nav-link" href="/programmerMission"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-table">
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
                        <div class="card-body"><div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">

<form action="/programmerCours" method="POST">
    @csrf
    <table  id="dataTable" class=" table order-list">
        <thead style="font-weight: bold; text-align: center;">
            <tr>
                <td>Nom</td>
                <td>UE</td>
                <td>Crédit</td>
                <td>CT</td>
                <td>TD</td>
                <td>TP</td>
                <td>TPE</td>
                <td>GPE</td>
                <td>MP</td>
                <td>ME</td>
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
    <script  type="text/javascript" >
        // alert('hello');
        // $(document).ready(function () {
        //     

        
        var counter = 0;

        document.getElementById('addrow').onclick= function () {addNewLine()};

        function addNewLine(){
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><select class="custom-select chosen" style="width: 200px;" required style="color: #555555;" name="selectNom'+counter+'">@foreach ($user as $user)<option value="{{$user->nom}} {{$user->prenom}}">{{$user->nom}} {{$user->prenom}}</option>@endforeach</select></td>';
            cols += '<td><select class="custom-select chosen" style="width: 120px;" required style="color: #232323;" name="selectUE'+counter+'">@foreach ($ue as $ue)<option value="'+'{{$ue->abreviation}}">{{$ue->abreviation}}</option>@endforeach</select></select></td>';
            cols += '<td ><input type="number" style="width: 70px;" required name="credit'+counter+'" class="form-control"></td>';
            cols += '<td ><input type="number" style="width: 70px;" required name="ct'+counter+'" class="form-control"></td>';
            cols += '<td ><input type="number" style="width: 70px;" required name="td'+counter+'" class="form-control"></td>';
            cols += '<td ><input type="number" style="width: 70px;" required name="tp'+counter+'" class="form-control"></td>';
            cols += '<td ><input type="number" style="width: 70px;" required name="tpe'+counter+'" class="form-control"></td>';
            cols += '<td><select class="custom-select chosen" required style="width: 100px;" name="selectGPE'+counter+'">@foreach ($gpe as $gpe)<option value="'+'{{$gpe->designation}}">{{$gpe->designation}}</option>@endforeach</select></td>';
            cols += '<td ><input type="number" name="mp'+counter+'" required style="width: 70px;" class="form-control"></td>';
            cols += '<td ><input type="number" name="me'+counter+'" required style="width: 70px;" class="form-control"></td>';
            
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