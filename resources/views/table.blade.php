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

            <li class="nav-item"><a class="nav-link" href="/profile"><i class="fas fa-user"></i>Profil</a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>
@include('NavBar')
<div class="container-fluid">
    <h3 class="text-dark mb-4" data-aos="fade-left" data-aos-duration="600">Programme de cours</h3>
    <div class="card shadow" data-aos="fade-up-left" data-aos-duration="600">
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center"><strong>UE</strong></th>
                            <th class="text-center"><strong>Crédits</strong></th>
                            <th class="text-center"><strong>CT</strong></th>
                            <th class="text-center"><strong>TD</strong></th>
                            <th class="text-center"><strong>TP</strong></th>
                            <th class="text-center"><strong>TPE</strong></th>
                            <th class="text-center"><strong>&nbsp;Groupe pédagogique</strong><br></th>
                            <th class="text-center"><strong>Masse programmée</strong><br></th>
                            <th class="text-center"><strong>Masse exécutée</strong><br></th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($table)
                        @foreach ($table as $table)
                        <tr>
                            <td class="text-center">{{$table->nom_ue}}</td>
                            <td class="text-center">{{$table->credit}}</td>
                            <td class="text-center">{{$table->ct}}</td>
                            <td class="text-center">{{$table->td}}</td>
                            <td class="text-center">{{$table->tp}}</td>
                            <td class="text-center">{{$table->tpe}}</td>
                            <td class="text-center">{{$table->gpe}}</td>
                            <td class="text-center">{{$table->mp}}</td>
                            <td class="text-center">{{$table->me}}</td>
                        </tr>
                        @endforeach
                        @endisset



                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-body" style="margin-top: 40px;">
            <div class="table-responsive table mt-2" id="table" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center"><strong>Total</strong></th>
                            <th class="text-center"><strong>Difference</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tfoot>
                            <tr>
                                @isset($mp)
                                <td class="text-center">{{ $mp."h" }}
                                </td>
                                <td class="text-center">{{ $dif."h" }}</td>

                                @endisset
                            </tr>
                        </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="btn-Exporter"><a class="btn btn-primary btn-sm" role="button" id="exporterPdf" name="exporterPdf" href="/pdfT">Exporter PDF</a></div>
    </div>
</div>
</div>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
@endsection
