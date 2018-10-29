var contact = {
    'civilite': "",
    'nom': "",
    'prenom': "",
    'telephone': "",
    'email': "",
    'adresse': "",
    'ville': "",
    'codePostal': "",
    'conditionsGenerales': "",
    'avatar': "",
    'pseudo': "",
    'motdepasse': "",
    'confirmationmotdepasse': "",
    'appareil': "",
    'setCivilite': function (n) {
        this.civilite = n;
        return;
    },
    'setNom': function (n) {
        if (this.isAlpha(n) && n != "") {
            this.nom = n;
        } else {
            this.nom = "";
        }

        return;
    },
    'setPrenom': function (p) {
        if (this.isAlpha(p) && p != "") {
            this.prenom = p;
        } else {
            this.prenom = "";
        }

        return;
    },
    'setTel': function (t) {
        if (this.isNumerique(t) && t != "") {
            this.telephone = t;
        } else {
            this.telephone = "";
        }

        return;
    },
    'setEmail': function (e) {
        if (this.isEmail(e) && e != "") {
            this.email = e;
        } else {
            this.email = "";
        }

        return;
    },
    'setAdresse': function (n) {
        this.adresse = n;
        return;
    },
    'setVille': function (n) {
        if (this.isAlpha(n) && n != "") {
            this.ville = n;
        } else {
            this.ville = "";
        }

        return;
    },
    'setCodePostal': function (p) {
        if (this.isNumerique(p) && p != "") {
            this.codePostal = p;
        } else {
            this.codePostal = "";
        }

        return;
    },
    'setConditionsGenerales': function (t) {
        this.conditionsGenerales = t;
        return;
    },
    'setAvatar': function (e) {
        this.avatar = e;
        return bon;
    },
    'setPseudo': function (m) {
        this.pseudo = m;
        return;
    },
    'setMotdepasse': function (t) {
        this.motdepasse = t;
        return;
    },
    'setConfirmationmotdepasse': function (t) {
        this.confirmationmotdepasse = t;
        return;
    },
    'setAppareil': function (e) {
        this.appareil = e;
        return;
    },
    'getCivilite': function (n) {
        return this.civilite;
    },
    'getNom': function (n) {
        return this.nom;
    },
    'getPrenom': function (p) {
        return this.prenom;
    },
    'getTel': function (t) {
        return this.telephone;
    },
    'getEmail': function (e) {
        return this.email;
    },
    'getAdresse': function (n) {
        return this.adresse;
    },
    'getVille': function (n) {
        return this.ville;
    },
    'getCodePostal': function (p) {
        return this.codePostal;
    },
    'getConditionsGenerales': function (t) {
        return this.conditionsGenerales;
    },
    'getAvatar': function (e) {
        return this.avatar;
    },
    'getPseudo': function (m) {
        return this.pseudo;
    },
    'getMotdepasse': function (t) {
        return this.motdepasse;
    },
    'getConfirmationmotdepasse': function (t) {
        return this.confirmationmotdepasse;
    },
    'getAppareil': function (e) {
        return this.appareil;
    },
    'isAlpha': function (val) {
        var ok = false;
        if (val != '') {
            var regex = /^[a-zA-Z\-]*$/;
            ok = regex.test(val);

        }
        return ok;
    },
    'isNumerique': function (val) {
        var ok = false;
        if (val != '') {
            var regex = /^[0-9\.]*$/;
            ok = regex.test(val);
        }
        return ok;
    },
    'isEmail': function (val) {
        var ok = false;
        if (val != '') {
            var regex = /^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$/i;
            ok = regex.test(val);
        }
        return ok;
    }
}


var Sonslug = "";
window.onload = verification;

function verification() {
    var btn2 = document.getElementById("boutonFormulaire");
    btn2.addEventListener("click", function () {
        console.log("son slug "+Sonslug);
        var contact1 = Object.create(contact);

        contact1.setNom(document.getElementById("Nom").value);
        var test1 = contact1.getNom();
        contact1.setPrenom(document.getElementById("Prenom").value);
        var test2 = contact1.getPrenom();
        contact1.setTel(document.getElementById("Telephone").value);
        var test3 = contact1.getTel();
        contact1.setEmail(document.getElementById("Email").value);
        var test4 = contact1.getEmail();
        contact1.setCivilite(document.getElementById("Civilite").value);
        var test5 = contact1.getCivilite();
        contact1.setPseudo(document.getElementById("Pseudo").value);
        var test6 = contact1.getPseudo();
        contact1.setMotdepasse(document.getElementById("Motdepasse").value);
        var test7 = contact1.getMotdepasse();
        contact1.setConfirmationmotdepasse(document.getElementById("Confirmationmotdepasse").value);
        var test9 = contact1.getConfirmationmotdepasse();
        var test8 = Sonslug;
        var lesAppareils = document.getElementsByName("appareil");
        var test10 = "";
        for (var i = 0; i < lesAppareils.length; i++) {
            if (lesAppareils[i].checked)
                contact1.setAppareil(lesAppareils[i].value);
            test10 = contact1.getAppareil();

            if (i == lesAppareils.length - 1 && test10 == "") {
                contact1.setAppareil(test10)
            }
        }
        var condition = document.getElementById("ConditionsGenerales");
        if (condition.checked) {
            contact1.setConditionsGenerales(true);
        } else {
            contact1.setConditionsGenerales(false);
        }
        var test11 = contact1.getConditionsGenerales();
        contact1.setAdresse(document.getElementById("Adresse").value);
        var test12 = contact1.getAdresse();
        contact1.setVille(document.getElementById("Ville").value);
        var test13 = contact1.getVille();
        contact1.setCodePostal(document.getElementById("CodePostal").value);
        var test14 = contact1.getCodePostal();

        if (test1 != "" && test2 != "" && test3 != "" && test4 != "" && test5 != "" && test6 != "" && test7 != "" &&
            // test8 != "" && 
            test9 == test7 && test10 != "" && test11 == true) {
            var result = {};
            result.civilite = test5;
            result.nom = test1;
            result.prenom = test2;
            result.telephone = test3;
            result.email = test4;
            result.pseudo = test6;
            result.motdepasse = test7;
            result.avatar = test8;
            result.appareil = test10;
            result.conditionsGenerales = test11;
            result.adresse = test12;
            result.ville = test13;
            result.codePostal = test14;
            myAjax(result);
        } else {
            if (test1 != "") {
                document.getElementById("Nom").style.borderColor = "none";
            } else {
                document.getElementById("Nom").style.borderColor = "red";
            }
            if (test2 != "") {
                document.getElementById("Prenom").style.borderColor = "none";
            } else {
                document.getElementById("Prenom").style.borderColor = "red";
            }
            if (test3 != "") {
                document.getElementById("Telephone").style.borderColor = "none";
            } else {
                document.getElementById("Telephone").style.borderColor = "red";
            }
            if (test4 != "") {
                document.getElementById("Email").style.borderColor = "none";
            } else {
                document.getElementById("Email").style.borderColor = "red";
            }
            if (test6 != "") {
                document.getElementById("Pseudo").style.borderColor = "none";
            } else {
                document.getElementById("Pseudo").style.borderColor = "red";
            }
            if (test7 != "") {
                document.getElementById("Motdepasse").style.borderColor = "none";
            } else {
                document.getElementById("Motdepasse").style.borderColor = "red";
            }
            if (test9 == test7) {
                document.getElementById("Confirmationmotdepasse").style.borderColor = "none";
            } else {
                document.getElementById("Confirmationmotdepasse").style.borderColor = "red";
            }
            if (test11 != "") {
                document.getElementById("labelCG").style.color = "none";
            } else {
                document.getElementById("labelCG").style.color = "red";
            }
        }
    }, false);
}

function myAjax(obj) {
    $.ajax({
        url: "ctrlGeneral/enregForm",
        type: "POST",
        dataType: 'html',
        data: obj,
        success: function (result) {
            document.getElementById("article").innerHTML = result;
            console.log(typeof result);
            console.log({result});
            // var result2 = JSON.parse(result);
            // console.log(result2.erreur);
            
            // if (result2.erreur==undefined || result2.erreur==false){
            //     console.log("vrai");
            //     location.assign("ctrlGeneral/getAccueil");
            // }else{
            //     // document.getElementById("confirmation").style.display="modal";
            //     if (result2.erreur.email){
            //         document.getElementById("Email").style.borderColor = "red";
            //         document.getElementById("Email").value = "";
            //         document.getElementById("Email").placeholder= "email déjà utilisé";
            //     }
            //     if (result2.erreur.pseudo){
            //         document.getElementById("Pseudo").style.borderColor = "red";
            //         document.getElementById("Pseudo").value = "";
            //         document.getElementById("Pseudo").placeholder= "pseudo déjà utilisé";
            //     }
            //     console.log({result2});
            // }
            
        },
        error: function (result) {
            document.getElementById("article").innerHTML = result;
            // alert("error");
            console.log("pas "+{result2});
            // document.getElementById("confirmation").style.display="modal";
        },
        complete: function (result) {}
    });
}

function enrgAvatar(slug) {
    if (Sonslug != "") {
        document.getElementById(Sonslug).style.border = "1.5px hidden";
        document.getElementById(Sonslug).style.margin = "3px";
    }
    Sonslug = slug;
    document.getElementById(Sonslug).style.margin = "1.5px";
    document.getElementById(Sonslug).style.border = "1.5px solid green";
    document.getElementById(Sonslug).style.borderRadius = "30px";
    document.getElementById("textAvatar").innerHTML=Sonslug;
}