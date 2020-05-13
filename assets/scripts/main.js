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

function paginationHandler() {
    // store pagination container so we only select it once
    var $paginationContainer = $(".pagination-container"),
        $pagination = $paginationContainer.find('.pagination ul');
    console.log("inside");
    // click event
    $pagination.find("li a").on('click.pageChange', function (e) {
        e.preventDefault();

        // get parent li's data-page attribute and current page
        var parentLiPage = $(this).parent('li').data("page"),
            currentPage = parseInt($(".pagination-container div[data-page]:visible").data('page')),
            numPages = $paginationContainer.find("div[data-page]").length;

        // make sure they aren't clicking the current page
        if (parseInt(parentLiPage) !== parseInt(currentPage)) {
            // hide the current page
            $paginationContainer.find("div[data-page]:visible").hide();

            if (parentLiPage === '+') {
                // next page
                $paginationContainer.find("div[data-page=" + (currentPage + 1 > numPages ? numPages : currentPage + 1) + "]").show();
            } else if (parentLiPage === '-') {
                // previous page
                $paginationContainer.find("div[data-page=" + (currentPage - 1 < 1 ? 1 : currentPage - 1) + "]").show();
            } else {
                // specific page
                $paginationContainer.find("div[data-page=" + parseInt(parentLiPage) + "]").show();
            }

        }
    });
    $('li').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });
};

function updateLastPub() {
    var dt = new Date();
    var oldDate = (dt.getFullYear() - 1) + '-' + (dt.getMonth() + 1) + '-' + dt.getDate();
    var newDate = dt.getFullYear() + '-' + (dt.getMonth() + 1) + '-' + dt.getDate();
    console.log(oldDate);
    console.log(newDate);

    $.getJSON('https://api.archives-ouvertes.fr/search/?q=collCode_s:LTDS%20AND%20docType_s:*%20AND%20NOT%20popularLevel_s:1%20AND%20(producedDate_tdate:[' + oldDate + 'T00:00:00Z%20TO%20' + newDate + 'T00:00:00Z]%20OR%20publicationDate_tdate:[' + oldDate + 'T00:00:00Z%20TO%20' + newDate + 'T00:00:00Z])%20AND%20submittedDate_tdate:[' + oldDate + 'T00:00:00Z%20TO%20' + newDate + 'T00:00:00Z]&rows=10&fl=*&sort=submittedDate_tdate%20desc&wt=json', function (data) {
        console.log($(data.response.docs)[0]);
        (data.response.docs).forEach(element => {
            $("#publi_container").append('<div class="publi m-4 rounded-lg p-3">' + element["citationFull_s"] + '.' + '</div>')
        });

    });
}

$(document).ready(function () {
    updateLastPub();
    paginationHandler();
});


