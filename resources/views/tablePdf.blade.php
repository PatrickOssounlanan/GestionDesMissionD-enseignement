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
                            {{$lv}}
                            @if ($lv=="*")
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
                                    <td class="text-center" rowspan="{{$rowspan}}">{{$profile->prenom}} {{$profile->nom}}</td>
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
                                    <td class="text-center" rowspan="{{$rowspan}}">{{request('selectNom')}}</td>
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
    @else
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table width="100%" class="table dataTable my-0" id="dataTable" style="border-collapse:collapse ; border: 0px;">
                        <thead>
                            <tr>
                                <th style=" border :1px solid ; padding: 6px ;" class="text-center" width="20%"><strong>UE</strong></th>
                                <th style=" border :1px solid ; padding: 6px ;" class="text-center" width="20%"><strong>Crédits</strong></th>
                                <th style=" border :1px solid ; padding: 6px ;" class="text-center" width="20%"><strong>CT</strong></th>
                                <th style=" border :1px solid ; padding: 6px ;" class="text-center" width="20%"><strong>TD</strong></th>
                                <th style=" border :1px solid ; padding: 6px ;" class="text-center" width="20%"><strong>TP</strong></th>
                                <th style=" border :1px solid ; padding: 6px ;" class="text-center" width="20%"><strong>TPE</strong></th>
                                <th style=" border :1px solid ; padding: 6px ;" class="text-center" width="20%"><strong>&nbsp;Groupe pédagogique</strong><br></th>
                                <th style=" border :1px solid ; padding: 6px ;" class="text-center" width="20%"><strong>Masse programmée</strong><br></th>
                                <th style=" border :1px solid ; padding: 6px ;" class="text-center" width="20%"><strong>Masse exécutée</strong><br></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($table)
                            @foreach ($table as $table)
                            <tr>
                                <td style=" border :1px solid ; padding: 6px ;" class="text-center" align="center" >{{$table->nom_ue}}</td>
                                <td style=" border :1px solid ; padding: 6px ;" class="text-center" align="center" >{{$table->credit}}</td>
                                <td style=" border :1px solid ; padding: 6px ;" class="text-center" align="center" >{{$table->ct}}</td>
                                <td style=" border :1px solid ; padding: 6px ;" class="text-center" align="center" >{{$table->td}}</td>
                                <td style=" border :1px solid ; padding: 6px ;" class="text-center" align="center" >{{$table->tp}}</td>
                                <td style=" border :1px solid ; padding: 6px ;" class="text-center" align="center" >{{$table->tpe}}</td>
                                <td style=" border :1px solid ; padding: 6px ;" class="text-center" align="center" >{{$table->gpe}}</td>
                                <td style=" border :1px solid ; padding: 6px ;" class="text-center" align="center" >{{$table->mp}}</td>
                                <td style=" border :1px solid ; padding: 6px ;" class="text-center" align="center" >{{$table->me}}</td>
                            </tr>
                            @endforeach
                            @endisset



                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-body" style="margin-top: 40px;">
                <div class="table-responsive table mt-2" id="table" role="grid" aria-describedby="dataTable_info">
                    <table  class="table dataTable my-0" id="dataTable" style="border-collapse: collapse; border:0px" align="right" width="30%">
                        <thead>
                            <tr>
                                <th style=" border :1px solid ; padding: 6px ;" class="text-center"><strong>Total</strong></th>
                                <th style=" border :1px solid ; padding: 6px ;" class="text-center"><strong>Difference</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tfoot>
                                <tr>
                                    @isset($mp)
                                    <td style=" border :1px solid ; padding: 6px ;" class="text-center" align="center" >{{ $mp."h" }}
                                    </td>
                                    <td style=" border :1px solid ; padding: 6px ;" class="text-center" align="center" >{{ $dif."h" }}</td>

                                    @endisset
                                </tr>
                            </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    
</body>
</html>


