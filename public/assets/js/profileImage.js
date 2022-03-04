$("#profileImage").click(function(e) {

    $("#imageUpload").click();

});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
          $('#profileImgNav').attr('src', 
            window.URL.createObjectURL(uploader.files[0]) );
          document.getElementById("btnSaveDiv").style.display="block";    
    }
}

$("#saveImgProfil").click(function() {
    document.getElementById("btnSaveDiv").style.display="none";
});

$("#imageUpload").change(function(){
    fasterPreview( this );
});