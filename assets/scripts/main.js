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

$(document).ready(function () {
    var dt = new Date();
    var oldDate = (dt.getFullYear() - 1) + '-' + (dt.getMonth()+1) + '-' + dt.getDate();
    var newDate = dt.getFullYear() + '-' + (dt.getMonth()+1) + '-' + dt.getDate();
    console.log(oldDate);
    console.log(newDate);
    
    $.getJSON('https://api.archives-ouvertes.fr/search/?q=collCode_s:LTDS%20AND%20docType_s:*%20AND%20NOT%20popularLevel_s:1%20AND%20(producedDate_tdate:[' + oldDate + 'T00:00:00Z%20TO%20' + newDate + 'T00:00:00Z]%20OR%20publicationDate_tdate:[' + oldDate +'T00:00:00Z%20TO%20'+newDate+'T00:00:00Z])%20AND%20submittedDate_tdate:['+oldDate+'T00:00:00Z%20TO%20'+newDate+'T00:00:00Z]&rows=10&fl=*&sort=submittedDate_tdate%20desc&wt=json', function (data) {
        console.log($(data.response.docs)[0]);
        (data.response.docs).forEach(element => {
            $("#publi_container").append('<div class="publi m-4 rounded-lg p-3">' + element["citationFull_s"] + '.' +'</div>')
        });
        
    });

});
