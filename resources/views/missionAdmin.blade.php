@extends('template')
@section('content')
    
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: #4e73df;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text mx-3"><span>Menu</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="/programme"><i class="fas fa-table"></i><span>Programme</span></a><a class="nav-link active" href="/mission"><i class="fas fa-table"></i><span>Mission</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="/programmerCours"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-table">
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
            <form method="POST">
            @csrf
            <h3 class="text-dark mb-4" data-aos="fade-left" data-aos-duration="600">Mission d'enseignements</h3>
            
            
                
                <select class="custom-select chosen" id="selectNomA" name="selectNomA" required="" style="color: #232323;" value="{{old('selectNomA')}}">
                    @isset($lv)
                        <option value="{{$lv}}">{{$lv}}</option>
                    @endisset
                    <option value="*">*</option>
                    @foreach ($profile as $profil)<option value="{{$profil->nom}} {{$profil->prenom}}">{{$profil->nom}} {{$profil->prenom}}</option>@endforeach
                                             
                </select>
                <div style="padding-top: 10px"><input class="btn btn-primary" id="ChangeTable" type="submit" name="ChangeTable" value="Changer"></div>
            </form>                                
            <div class="card mb-3" data-aos="fade-up-left" data-aos-duration="600" id="cardV">
                <div class="card-body text-center shadow" id="cardId">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
<table class="table dataTable my-0" id="dataTable">
<thead>
    <tr>
        <th>Nom et Prénoms</th>
        <th>Qualité</th>
        <th>Adresse Compléte</th>
        <th>Date de Naissance</th>
        <th>Nationalité</th>
        <th>Matricule et / ou IFU</th>
        <th>Indice et Grafe</th>
        <th>Intitulé de UE</th>
        <th>Groupe pedagogique</th>
        <th>Année Academique</th>
        <th>Nombre d&#39;heure de L&#39;UE (de la Mission)</th>
        <th>Durée de la mission</th>
        <th>Date et jour d&#39;arrivé</th>
        <th>Date et jour de retour</th>
    </tr>
</thead>
<tbody>
    
    @isset($profileTrait)
                                                 
        @if (request('selectNomA')=="*")
            @foreach ($profileTrait as $profile)
            @php
                $rowspan=0;
                $sqlTable= "select * from tableau_missions where Nom_enseignant ='"."".$profile->nom." ".$profile->prenom."'";
                $table=DB::select($sqlTable);
                $table2=DB::select($sqlTable);
                foreach ($table2 as $table) {
                    $rowspan++;
                }
            @endphp
            
            @if ($table!=null)
                <td class="text-center" rowspan="{{$rowspan+1}}">{{$profile->prenom}} {{$profile->nom}}</td>
                @php
                    $sqlTable= "select * from tableau_missions where Nom_enseignant ='"."".$profile->nom." ".$profile->prenom."'";
                    $table=DB::select($sqlTable);
                    foreach ($table as $table) {
                        echo '
                            <tr>
                                <td>'.$table->qualite.'</td>
                                <td>'.$table->adressse.'</td>
                                <td>'.$table->date_naissance.'</td>
                                <td>'.$table->nationalite.'</td>
                                <td>'.$table->Maticule.'</td>
                                <td>'.$table->grade.'</td>
                                <td>'.$table->Ue.'</td>
                                <td>'.$table->Groupe_Pedagogique.'</td>
                                <td>'.$table->Annee_academique.'</td>
                                <td>'.$table->missionHeure.'</td>
                                <td>'.$table->missionDuree.'</td>
                                <td>'.$table->dateJourArrive.'</td>
                                <td>'.$table->dateJourRetour.'</td>
                            </tr>
                        ';
                    }
                @endphp
            @endif
            @endforeach
        @else
        <tr>
            @php
                $sqlTable= "select * from tableau_missions where Nom_enseignant ='"."".request('selectNomA')."'";
                $rowspan=0;
                $table=DB::select($sqlTable);
                $table2=DB::select($sqlTable);
                foreach ($table2 as $table) {
                    $rowspan++;
                }
            @endphp
            @if ($table!=null)
                <td class="text-center" rowspan="{{$rowspan+1}}">{{request('selectNomA')}}</td>
                @php
                    $sqlTable= "select * from tableau_missions where nom_enseignant ='".request('selectNomA')."'";
                    $table=DB::select($sqlTable);
                    foreach ($table as $table) {
                       
                        echo '
                            <tr>
                                <td>'.$table->qualite.'</td>
                                <td>'.$table->adressse.'</td>
                                <td>'.$table->date_naissance.'</td>
                                <td>'.$table->nationalite.'</td>
                                <td>'.$table->Maticule.'</td>
                                <td>'.$table->grade.'</td>
                                <td>'.$table->Ue.'</td>
                                <td>'.$table->Groupe_Pedagogique.'</td>
                                <td>'.$table->Annee_academique.'</td>
                                <td>'.$table->missionHeure.'</td>
                                <td>'.$table->missionDuree.'</td>
                                <td>'.$table->dateJourArrive.'</td>
                                <td>'.$table->dateJourRetour.'</td>
                            </tr>
                        ';

                    }
                @endphp
            @endif
        @endif
        
    @endisset
    
</tbody>
</table>
</div></div>
            </div>
        </div>
    </div>
    <form action="/pdfM" method="get">
        <input type="hidden" name="selectNom" id="selectNom" value="{{request('selectNomA')}}"/>
        <div id="btn-Exporter"><input class="btn btn-primary btn-sm" type="submit" id="exporterPdfAdmin" name="exporterPdf" value="Exporter PDF" /></div>
    </form>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
@endsection
