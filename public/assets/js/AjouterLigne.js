
// 	$(document).ready(function () {
//     var counter = 0;

//     $("#addrow").on("click", function () {
//         var newRow = $("<tr>");
//         var cols = "";
//         cols += '<td><select class="custom-select chosen" style="width: 200px;" required style="color: #555555;" name="selectNom'+counter+'"><option value="12">Dr Flavien LANMANTCHION</option><option value="13">Abel KONNON</option><option value="14">Géraud ZANNOU</option><option value="15" selected>Pelagie HOUNGUE</option><option value="17" selected>Alexis KEMAMOU</option><option value="16" selected>Romarique DUCHAMP</option><option value="16" selected>Basile DEGBO</option></select></td>';
//         cols += '<td><select class="custom-select chosen" style="width: 120px;" required style="color: #232323;" name="selectUE'+counter+'"><option value="12">AVN</option><option value="13">ANA</option><option value="14">ELP</option><option value="15" selected>CDY</option><option value="17" selected>ELA</option><option value="16" selected>PWR</option><option value="16" selected>POO</option></select></td>';
//         cols += '<td ><input type="number" style="width: 70px;" name="credit'+counter+'" class="form-control"></td>';
//         cols += '<td ><input type="number" style="width: 70px;" name="ct'+counter+'" class="form-control"></td>';
//         cols += '<td ><input type="number" style="width: 70px;" name="td'+counter+'" class="form-control"></td>';
//         cols += '<td ><input type="number" style="width: 70px;" name="tp'+counter+'" class="form-control"></td>';
//         cols += '<td><select class="custom-select chosen" required style="width: 100px;" name="selectGPE'+counter+'"><option value="12">GEI1-A</option><option value="13">GEI1-B</option><option value="14">GEI2-IT</option><option value="15" selected>GMP1</option><option value="17" selected>GEI2-EE</option><option value="16" selected>MS1</option><option value="16" selected>MS2</option></select></td>';
//         cols += '<td ><input type="number" name="mp'+counter+'" style="width: 70px;" class="form-control"></td>';
//         cols += '<td ><input type="number" name="me'+counter+'" style="width: 70px;" class="form-control"></td>';
        
//         $(".chosen").select2();

//         cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Supprimer"></td>';
//         newRow.append(cols);
//         $("table.order-list").append(newRow);
//         counter++;
//     })



//     $("table.order-list").on("click", ".ibtnDel", function (event) {
//         $(this).closest("tr").remove();       
//         counter -= 1
//     });


// });



// // function calculateRow(row) {
// //     var price = +row.find('input[td^="30"]').val();

// // }

// // function calculateGrandTotal() {
// //     var grandTotal = 0;
// //     $("table.order-list").find('input[name^="price"]').each(function () {
// //         grandTotal += +$(this).val();
// //     });
// //     $("#grandtotal").text(grandTotal.toFixed(2));
// // }