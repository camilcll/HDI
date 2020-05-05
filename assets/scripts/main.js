function visibilite(thingId) {
    var targetElement;
    targetElement = document.getElementById(thingId);
    if (targetElement.style.display == "none") {
        targetElement.style.display = "";
    } else {
        targetElement.style.display = "none";
    }
}


var openFile = function (event) {
    $('.rfp').hide();
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function () {
        var dataURL = reader.result;
        var output = document.getElementById('avatarPreview');
        output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
};



function sendTrash(id) {
    if(document.getElementById("noUser") == null){
        $("#tid").val(id);
        $("#avatarpp").hide();
        $("#avatarPreview").hide();
        $("#pp").append('<i id="noUser" class="fa fa-user-circle-o rfp"></i>');
    }
    else{
        return;
    }     
}
