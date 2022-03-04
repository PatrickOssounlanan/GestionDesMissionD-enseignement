<!DOCTYPE html>
<html>
<head>
    <title>Pdf</title>
</head>
<style>
    table{
        border-collapse: collapse;
        border: 0px;
        width: 100%;
        text-align: center;
    }
    td,th{
      border: 1px solid;
      padding: 6px;
    }
    td{
        width: 65px;
    }
</style>
<body>
    <h1></h1>
    @if (Auth::user()->email=='admin@insti.com')
        
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
                                    
        @if ($lv=="*")
        
        @foreach ($profileTrait as $profile)
        @php
            $rowspan=0;
            $sqlTable= "select * from tableau_missions where Nom_enseignant ='"."".$profile->nom." ".$profile->prenom."'";
            $table=DB::select($sqlTable);
            $table2=DB::select($sqlTable);
            foreach ($table2 as $table) {
                $rowspan++;
            }
            echo "je marche";
        @endphp

        @if ($table!=null)
            <td class="text-center" rowspan="{{$rowspan}}">{{$profile->prenom}} {{$profile->nom}}</td>
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
        @php
            $sqlTable= "select * from tableau_missions where Nom_enseignant ='"."".request('selectNom')."'";
            $rowspan=0;
            $table=DB::select($sqlTable);
            $table2=DB::select($sqlTable);
            foreach ($table2 as $table) {
                $rowspan++;
            }
        @endphp
        @if ($table!=null)
            <td class="text-center" rowspan="{{$rowspan}}">{{request('selectNom')}}</td>
            @php
                $sqlTable= "select * from tableau_missions where nom_enseignant ='".request('selectNom')."'";
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
    @else
        <h1></h1>
        <div class="card shadow" data-aos="fade-up-left" data-aos-duration="600">
            <div class="card-body"><div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table dataTable my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">Qualité</th>
                            <th class="text-center">Adresse Compléte</th>
                            <th class="text-center">Date de Naissance</th>
                            <th class="text-center">Nationalité</th>
                            <th class="text-center">Matricule et / ou IFU</th>
                            <th class="text-center">Indice et Grafe</th>
                            <th class="text-center">Intitulé de UE</th>
                            <th class="text-center">Groupe pedagogique</th>
                            <th class="text-center">Année Academique</th>
                            <th class="text-center">Nombre d&#39;heure de L&#39;UE (de la Mission)</th>
                            <th class="text-center">Durée de la mission</th>
                            <th class="text-center">Date et jour d&#39;arrivé</th>
                            <th class="text-center">Date et jour de retour</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($table as $table)
                        <tr>
                            <td class="text-center">{{ $table->qualite }}</td>
                            <td class="text-center">{{ $table->adressse }}</td>
                            <td class="text-center">{{ $table->date_naissance }}</td>
                            <td class="text-center">{{ $table->nationalite }}</td>
                            <td class="text-center">{{ $table->Maticule }}</td>
                            <td class="text-center">{{ $table->grade }}</td>
                            <td class="text-center">{{ $table->Ue }}</td>
                            <td class="text-center">{{ $table->Groupe_Pedagogique }}</td>
                            <td class="text-center">{{ $table->Annee_academique }}</td>
                            <td class="text-center">{{ $table->missionHeure }}</td>
                            <td class="text-center">{{ $table->missionDuree." semaines" }}</td>
                            <td class="text-center">{{ $table->dateJourArrive }}</td>
                            <td class="text-center">{{ $table->dateJourRetour }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    
    </body>
    </html>
