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
                    @if (Auth::user()->email=='admin@insti.com')
                        <li class="nav-item"><a class="nav-link" href="/programmerCours"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-table">
                            <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"></path>
                        </svg><span>&nbsp;Programmer Cours</span></a><a class="nav-link" href="/programmerMission"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-table">
                            <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"></path>
                        </svg><span>&nbsp;Programmer Mission</span></a><a class="nav-link" href="/ajouterProf"><i class="material-icons">add_box</i><span>Inscrire Enseignants</span></a>
                        </li>
                    @endif
                    <li class="nav-item"><a class="nav-link active" href="/profile"><i class="fas fa-user"></i>Profil</a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        @include('NavBar')
                <div class="container-fluid">
                    @include('flash::message')
                    <h3 class="text-dark mb-4" data-aos="fade-left" data-aos-duration="600">Profil</h3>
                    <div class="row mb-3" data-aos="slide-up" data-aos-duration="600">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow" id="profile">
                                    @php
                                    $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
                                    $table=$profil->image
                                    @endphp
                                    @if($table!=null)
                                    <img class="rounded-circle mb-3 mt-4" id="profileImage" src="{{$table}}" width="160" height="160" name="profileImage">
                                    @else
                                    <img class="rounded-circle mb-3 mt-4" id="profileImage" src="assets/img/logoEnseignants.jpg" width="160" height="160" name="profileImage">
                                    @endif
                                    <div id="btnP" class="mb-3">
                                        <form enctype="multipart/form-data" method="POST" action="{{route('image.upload.post')}}">
                                            @csrf
                                            <input type="file" id="imageUpload" name="imageUpload" placeholder="Changer Photo">
                                            @if ($errors->has('imageUpload'))
                                            <p style="color: red">{{$errors->first('imageUpload')}}</p>
                                            @endif
                                            <h5>Photo de profil</h5>
                                            <div id="btnSaveDiv" name="btnSaveDiv">
                                                <button class="btn btn-primary" id="saveImgProfil" type="submit" name="saveImgProfil">Enregistrer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body text-center shadow" id="profilePass">
                                    <form method="POST" action="/profilPass">
                                        @csrf
                                        <h5>Changer mot de passe</h5>
                                        {{-- <input type="password" id="oldPass" class="form-control" placeholder="Ancien mot de passe" name="oldPass" required />
                                        @if ($errors->has('oldPass'))
                                            <p style="color: red">{{$errors->first('oldPass')}}</p>
                                        @endif --}}
                                        <input style="margin-top: 10px" type="password" id="password" class="form-control" placeholder="Nouveau mot de passe" name="password" required />
                                        @if ($errors->has('password'))
                                            <p style="color: red">{{$errors->first('password')}}</p>
                                        @endif
                                        <input style="margin-top: 10px" type="password" id="password_confirmation" class="form-control" placeholder="Confirmer mot de passe" name="password_confirmation" required />
                                        @if ($errors->has('password_confirmation'))
                                            <p style="color: red">{{$errors->first('password_confirmation')}}</p>
                                        @endif
                                        <button style="margin-top: 10px" class="btn btn-primary" id="btnChangePass" type="submit" name="btnChangePass" required>Modifier</button>
                                        <input type="hidden" name='type_formulaire' value="mot_de_pass">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Paramètre utilisateur</p>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST"  action="/profilInfo">
                                                @csrf
                                                @php
                                                    $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
                                                @endphp
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="first_name"><strong>Nom</strong><br></label><input class="form-control" type="text" value="{{$profil->nom}}" name="first_name" required></div>
                                                    </div>
                                                    <div class="col">
                                                           <div class="form-group"><label for="last_name"><strong>Prenoms</strong><br></label><input class="form-control" type="text" value="{{$profil->prenom}}" name="last_name" required></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                            <div class="form-group"><label for="email"><strong>Date de naissance&nbsp;</strong></label><input class="form-control" type="date" value="{{$profil->birthday}}" name="birthday" required></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="address"><strong>Addresse</strong></label><input class="form-control" type="text" value="{{$profil->adresse}}" name="adresse" required></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group"><label for="city"><strong>Numero matricule</strong></label><input class="form-control" type="text" value="{{$profil->num_mat}}" name="mat" required></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group"><label for="country"><strong>Numero de telephone </strong></label><input class="form-control" type="text" value="{{$profil->num_tel}}" name="phone" required></div>
                                                        </div>
                                                </div>
                                                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Enregistrer</button></div>
                                                <input type="hidden" name='type_formulaire' value="info_pers">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-5"></div>
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
@endsection


