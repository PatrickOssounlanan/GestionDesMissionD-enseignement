// var ch = $("#checkCt");

// if((document.getElementById("checkCt").onclick){
//     if(document.getElementById("checkCt").checked){
//         alert("Tchin");
//     }
// }

var tableau = document.getElementById('dataTableAdmin');
var rows = tableau.getElementsByTagName('tr');
var do_show= true;
var ancienStyle;
function afficherOuMasquerUneLigne(do_show, id ){
    console.log('jfj');
    for (var row = 0; row < rows.length; row++) {

        //On constate que les deux premiers éléments se suprimme mais à partir du 3ième ca va
            
        var cols = rows[row].children;

        for (var col_no = 0 ; col_no < cols.length; col_no++) {

            var cell = cols[col_no];
            if (cell.tagName == 'TH' || cell.tagName == 'TD'){
                if(!do_show &&  cell.id==id){
                    cell.id=id;
                    ancienStyle= cell.style;
                    cell.style.display ='none';
                }else if(cell.id==id){
                    cell.style= ancienStyle;
                }
            }
        } 
    }
}
$(document).ready(function(){
    // alert("do_show2");
    $("#checkCredit").change(function (){
        afficherOuMasquerUneLigne(document.getElementById("checkCredit").checked, "credit");
    });
    $("#checkCt").change(function (){
        afficherOuMasquerUneLigne(document.getElementById("checkCt").checked, "ct");
    });
    $("#checkTp").change(function (){
        afficherOuMasquerUneLigne(document.getElementById("checkTp").checked, "tp");
    });
    $("#checkTd").change(function (){
        afficherOuMasquerUneLigne(document.getElementById("checkTd").checked, "td");
    });
    $("#checkTpe").change(function (){
        afficherOuMasquerUneLigne(document.getElementById("checkTpe").checked, "tpe");
    });
    $("#checkMp").change(function (){
        afficherOuMasquerUneLigne(document.getElementById("checkMp").checked, "mp");
    });
    $("#checkMe").change(function (){
        afficherOuMasquerUneLigne(document.getElementById("checkMe").checked, "me");
    });
    
});