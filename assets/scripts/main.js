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
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function () {
        var dataURL = reader.result;
        var output = document.getElementById('avatarPreview');
        output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
};

function hideOld() {
    $('.rfp').hide();
}


function sendTrash(id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#avatarpp").hide();
            $("#avatarPreview").hide();
            $("#pp").append('<i class="fa fa-user-circle-o"></i>');
        }
    };
    xmlhttp.open("POST", "index.php?page=parametre?tid=" + id, true);
    xmlhttp.send();
}
