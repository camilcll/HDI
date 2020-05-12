
//Institution rapport
function addInstitu()
{
    let institu = document.getElementById("institu");
    let template = document.getElementById("institutionTemplate");
    let clone = document.importNode(template.content, true);
    institu.appendChild(clone);
}
function deleteInstitu(ev)
{
    let target = ev.target;
    let p1 = target.parentNode;
    let p2 = p1.parentNode;
    p2.remove();
}

//organisme delivrance these
function addOrga()
{
    let orga = document.getElementById("orga");
    let template = document.getElementById("organismeTemplate");
    let clone = document.importNode(template.content, true);
    orga.appendChild(clone);
}
function deleteOrga(ev)
{
    let target = ev.target;
    let p1 = target.parentNode;
    let p2 = p1.parentNode;
    p2.remove();
}
//organisme delivrance hdr
function addOrgaHdr()
{
    let orga = document.getElementById("orga");
    let template = document.getElementById("organismeTemplate");
    let clone = document.importNode(template.content, true);
    orga.appendChild(clone);
}
function deleteOrgaHdr(ev)
{
    let target = ev.target;
    let p1 = target.parentNode;
    let p2 = p1.parentNode;
    p2.remove();
}
//president jury hdr
function addPre()
{
    let pre = document.getElementById("pre");
    let template = document.getElementById("presidentTemplate");
    let clone = document.importNode(template.content, true);
    pre.appendChild(clone);
}
function deletePre(ev)
{
    let target = ev.target;
    let p1 = target.parentNode;
    let p2 = p1.parentNode;
    p2.remove();
}
//directeur de these
function addDirect()
{
    let direct = document.getElementById("direct");
    let template = document.getElementById("directeurTemplate");
    let clone = document.importNode(template.content, true);
    direct.appendChild(clone);
}
function deleteDirect(ev)
{
    let target = ev.target;
    let p1 = target.parentNode;
    let p2 = p1.parentNode;
    p2.remove();
}

function changementType() {
				var type = document.getElementById("type").value;
				if (type == "article" ){
					document.getElementById("journal-element").style.display="block";
					document.getElementById("date-id-element").style.display="block";
					document.getElementById("inPress-element").style.display="block";
				}else{
					document.getElementById("journal-element").style.display="none";
					document.getElementById("date-id-element").style.display="none";
					document.getElementById("inPress-element").style.display="none";
				}
				if (type == "comm" ){
					document.getElementById("conferenceTitle-element").style.display="block";
					document.getElementById("congres-date-id-element").style.display="block";
					document.getElementById("city-element").style.display="block";
					document.getElementById("country-element").style.display="block";
				}else{
					document.getElementById("conferenceTitle-element").style.display="none";
					document.getElementById("congres-date-id-element").style.display="none";
					document.getElementById("city-element").style.display="none";
					document.getElementById("country-element").style.display="none";
				}
				if (type == "poster" ){
					document.getElementById("conferenceTitle-element").style.display="block";
					document.getElementById("congres-date-id-element").style.display="block";
					document.getElementById("city-element").style.display="block";
					document.getElementById("country-element").style.display="block";
				}else{
					document.getElementById("conferenceTitle-element").style.display="none";
					document.getElementById("congres-date-id-element").style.display="none";
					document.getElementById("city-element").style.display="none";
					document.getElementById("country-element").style.display="none";
				}
				if (type == "ouvrage") {
					document.getElementById("date-pub-ouvrage").style.display="block";
					document.getElementById("inPress-ouvrage").style.display="block";
				} else{
					document.getElementById("date-pub-ouvrage").style.display="none";
					document.getElementById("inPress-ouvrage").style.display="none";
				}
				if (type == "chapOuvrage") {
					document.getElementById("bookTitle-element").style.display="block";
					document.getElementById("date-pub-chap-ouvrage").style.display="block";
					document.getElementById("inPress-chap-ouvrage").style.display="block";
				} else{
					document.getElementById("bookTitle-element").style.display="none";
					document.getElementById("date-pub-ouvrage").style.display="none";
					document.getElementById("inPress-chap-ouvrage").style.display="none";
				}
				if (type == "directionOuvrage") {
					document.getElementById("date-pub-direction").style.display="block";
					document.getElementById("inPress-direction").style.display="block";
				} else{
					document.getElementById("date-pub-direction").style.display="none";
					document.getElementById("inPress-direction").style.display="none";
				}
				if (type == "brevet" ){
					document.getElementById("date-brevet").style.display="block";
					document.getElementById("number-element").style.display="block";
					document.getElementById("country-brevet").style.display="block";
				}else{
					document.getElementById("date-brevet").style.display="none";
					document.getElementById("number-element").style.display="none";
					document.getElementById("country-brevet").style.display="none";
				}
				if (type == "autrePub" ){
					document.getElementById("journal-autre-pub").style.display="block";
					document.getElementById("bookTitle-autre-pub").style.display="block";
					document.getElementById("date-autre-pub").style.display="block";
					document.getElementById("description-element").style.display="block";
				}else{
					document.getElementById("journal-autre-pub").style.display="none";
					document.getElementById("bookTitle-autre-pub").style.display="none";
					document.getElementById("date-autre-pub").style.display="none";
					document.getElementById("description-element").style.display="none";
				}
				if (type == "rapport" ){
					document.getElementById("reportType-element").style.display="block";
					document.getElementById("date-rapport").style.display="block";
					document.getElementById("authorityInstitution-element").style.display="block";
				}else{
					document.getElementById("reportType-element").style.display="none";
					document.getElementById("date-rapport").style.display="none";
					document.getElementById("authorityInstitution-element").style.display="none";
				}
				if (type == "these") {
					document.getElementById("abstract-element").style.display="block";
                    document.getElementById("keyword-element").style.display="block";
                    document.getElementById("date-soutenance-these").style.display="block";
                    document.getElementById("organisme-element").style.display="block";
                    document.getElementById("directeur-element").style.display="block";
				} else{
					document.getElementById("abstract-element").style.display="none";
                    document.getElementById("keyword-element").style.display="none";
                    document.getElementById("date-soutenance-these").style.display="none";
                    document.getElementById("organisme-element").style.display="none";
                    document.getElementById("directeur-element").style.display="none";
                }
                if (type == "hdr") {
					document.getElementById("keywordHdr-element").style.display="block";
                    document.getElementById("date-soutenance-hdr").style.display="block";
                    document.getElementById("organisme-hdr-element").style.display="block";
                    document.getElementById("president-element").style.display="block";
				} else{
					document.getElementById("keywordHdr-element").style.display="none";
                    document.getElementById("date-soutenance-hdr").style.display="none";
                    document.getElementById("organisme-hdr-element").style.display="none";
                    document.getElementById("president-element").style.display="none";
				}

				if (type == "video" ){
					document.getElementById("licence-element").style.display="block";
				}else{
					document.getElementById("licence-element").style.display="none";
				}

				if (type == "son" ){
					document.getElementById("licence-element").style.display="block";
				}else{
					document.getElementById("licence-element").style.display="none";
				}
				
				if (type == "carte" ){
					document.getElementById("licence-element").style.display="block";
				}else{
					document.getElementById("licence-element").style.display="none";
				}

			}