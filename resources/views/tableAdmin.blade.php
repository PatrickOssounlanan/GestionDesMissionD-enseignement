@extends('template')
@section('content')

    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: #4e73df;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text mx-3"><span>Menu</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="/programme"><i class="fas fa-table"></i><span>Programme</span></a><a class="nav-link" href="/mission"><i class="fas fa-table"></i><span>Mission</span></a></li>
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
                    <h3 class="text-dark mb-4" data-aos="fade-left" data-aos-duration="600">Programme de cours</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3" data-aos="fade-up" data-aos-duration="600">
                                <form method="POST">
                                    @csrf
                                    <div class="card-body text-center shadow">
                                        <div class="col"><select class="custom-select chosen" id="selectNom" name ="selectNom" required="" style="color: #232323;" value="{{old('selectNom')}}">
                                            @isset($lv)
                                            <option value="{{$lv}}">{{$lv   }}</option>
                                            @endisset

                                            <option value="*">*</option>
                                            @foreach ($profile as $profil)<option value="{{$profil->nom}} {{$profil->prenom}}">{{$profil->nom}} {{$profil->prenom}}</option>@endforeach
                                            </select>
                                            <div style="padding-top: 10px"><input class="btn btn-primary" id="ChangeTable" type="submit" name="ChangeTable" value="Changer"></div>
                                            <div id="checkDiv">
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="checkCredit" checked=""><label class="form-check-label">Credits</label></div>
                                                <div class="form-check" value="true"><input class="form-check-input" type="checkbox" id="checkCt" checked=""><label class="form-check-label" for="formCheck-2">CT&nbsp; &nbsp; &nbsp; &nbsp;</label></div>
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="checkTp" checked=""><label class="form-check-label" for="formCheck-2">TP&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</label></div>
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="checkTd" checked=""><label class="form-check-label" for="formCheck-2">TD&nbsp; &nbsp; &nbsp; &nbsp;</label></div>
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="checkTpe" checked=""><label class="form-check-label" for="formCheck-2">TPE&nbsp; &nbsp; &nbsp;&nbsp;</label></div>
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="checkMp" checked=""><label class="form-check-label" for="formCheck-2">MP&nbsp; &nbsp; &nbsp; &nbsp;</label></div>
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="checkMe" checked=""><label class="form-check-label" for="formCheck-2">ME&nbsp; &nbsp; &nbsp; &nbsp;</label></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-3" data-aos="fade-up-left" data-aos-duration="600">
                                <div class="card-body text-center shadow">
                                    <div class="table-responsive table mt-2" id="dataTableAdmin" role="grid" aria-describedby="dataTable_info">
                                        <table class="table dataTable my-0" id="dataTable">
                                            <thead>
                                                <tr id="tableauThead">
                                                    <th class="text-center"><strong>Nom et Prénoms</strong></th>
                                                    <th class="text-center"><strong>UE</strong></th>
                                                    <th class="text-center" id="credit"><strong>Crédits</strong></th>
                                                    <th class="text-center" id="ct"><strong>CT</strong></th>
                                                    <th id="td"><strong>TD</strong></th>
                                                    <th id="tp"><strong>TP</strong></th>
                                                    <th id="tpe"><strong>TPE</strong></th>
                                                    <th class="text-center"><strong>&nbsp;Groupe pédagogique</strong><br></th>
                                                    <th class="text-center" id="mp">Masse programmée</th>
                                                    <th class="text-center" id="me"><strong>Masse exécutée</strong><br></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($profileTrait)

                                                    @if (request('selectNom')=="*")
                                                        @foreach ($profileTrait as $profile)
                                                        @php
                                                            $rowspan=0;
                                                            $sqlTable= "select * from tableau_enseignants where nom_enseignant ='"."".$profile->nom." ".$profile->prenom."'";
                                                            $table=DB::select($sqlTable);
                                                            $table2=DB::select($sqlTable);
                                                            foreach ($table2 as $table) {
                                                                $rowspan++;
                                                            }
                                                        @endphp
                                                        @if ($table!=null)
                                                            <td class="text-center" rowspan="{{$rowspan+1}}">{{$profile->prenom}} {{$profile->nom}}</td>
                                                            @php
                                                                $sqlTable= "select * from tableau_enseignants where nom_enseignant ='"."".$profile->nom." ".$profile->prenom."'";
                                                                $table=DB::select($sqlTable);
                                                                foreach ($table as $table) {
                                                                    echo '
                                                                    <tr>
                                                                    <td class="text-center" >'.$table->nom_ue.'</td>
                                                                    <td class="text-center" id="credit">'.$table->credit.'</td>
                                                                    <td id="ct">'.$table->ct.'</td>
                                                                    <td id="td">'.$table->td.'</td>
                                                                    <td id="tp">'.$table->tp.'</td>
                                                                    <td class="text-center" id="tpe">'.$table->tpe.'</td>
                                                                    <td class="text-center">'.$table->gpe.'</td>
                                                                    <td class="text-center" id="mp">'.$table->mp.'</td>
                                                                    <td class="text-center" id="me">'.$table->me.'</td>
                                                                    </tr>';
                                                                }
                                                            @endphp
                                                        @endif
                                                        @endforeach
                                                    @else
                                                        @php
                                                            $rowspan=0;
                                                            $sqlTable= "select * from tableau_enseignants where nom_enseignant ='"."".request('selectNom')."'";
                                                            $table=DB::select($sqlTable);
                                                            $table2=DB::select($sqlTable);
                                                            foreach ($table2 as $table) {
                                                                $rowspan++;
                                                            }
                                                        @endphp
                                                        @if ($table!=null)
                                                            <td class="text-center" rowspan="{{$rowspan+1}}">{{request('selectNom')}}</td>
                                                            @php
                                                                $sqlTable= "select * from tableau_enseignants where nom_enseignant ='".request('selectNom')."'";
                                                                $table=DB::select($sqlTable);
                                                                foreach ($table as $table) {
                                                                    echo '
                                                                    <tr>
                                                                    <td class="text-center" >'.$table->nom_ue.'</td>
                                                                    <td class="text-center" id="credit">'.$table->credit.'</td>
                                                                    <td id="ct">'.$table->ct.'</td>
                                                                    <td id="td">'.$table->td.'</td>
                                                                    <td id="tp">'.$table->tp.'</td>
                                                                    <td class="text-center" id="tpe">'.$table->tpe.'</td>
                                                                    <td class="text-center">'.$table->gpe.'</td>
                                                                    <td class="text-center" id="mp">'.$table->mp.'</td>
                                                                    <td class="text-center" id="me">'.$table->me.'</td>
                                                                    </tr>';
                                                                }
                                                            @endphp
                                                        @endif
                                                    @endif

                                                @endisset

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="/pdfT" method="get">
                <input type="hidden" name="selectNom" id="selectNom" value="{{request('selectNom')}}"/>
                <div id="btn-Exporter">
                    <input class="btn btn-primary btn-sm" type="submit" id="exporterPdfAdmin" name="exporterPdf" value="Exporter PDF" />
                </div>
            </form>
            
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
@endsection
