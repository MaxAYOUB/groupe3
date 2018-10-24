var Compte = {
    /**
     * Arguments
     */
    'identifiant': "",
    'motdepasse': "",
    erreur: false,
    /**
     * Setter
     */
    'setIdentifiant': function (n) {
        this.identifiant = n;
        return;
    },
    'setMotdepasse': function (n) {
        this.motdepasse = n;
        return;
    },
    'getIdentifiant': function (n) {
        return this.identifiant;
    },
    'getMotdepasse': function (n) {
        return this.motdepasse;
    },
}
window.onload = verification;
// Fonction pour verifier les champs Identifiant et Mot de passe
function verification() {
    var bouton = document.getElementById("Seconnecter");
    bouton.addEventListener("click", function () {
        var compte1 = Object.create(Compte);
        compte1.setIdentifiant(document.getElementById("inputEmail3").value);
        var test1 = compte1.getIdentifiant();
        compte1.setMotdepasse(document.getElementById("inputPassword3").value);
        var test2 = compte1.getMotdepasse();
        if (test1 != "" && test2 != "") {
            var result = {};
            result.identifiant = test1;
            result.motdepasse = test2;
            // Convertion de la chaine de caractére en JSON 
            myAjax(JSON.stringify(result));
        } else {
            if (test1 != "") {
                document.getElementById("inputEmail3").style.borderColor = "none";
            } else {
                document.getElementById("inputEmail3").style.borderColor = "red";
            }
            if (test2 != "") {
                document.getElementById("inputPassword3").style.borderColor = "none";
            } else {
                document.getElementById("inputPassword3").style.borderColor = "red";
            }
        }
    }, false);
}
// Fonction ajax pour lancer VerifierAuthentification
function myAjax(obj) {
    console.log(typeof obj);
    $.ajax({
        url: "ctrlGeneral/verifierAuthentification",
        type: "POST",
        dataType: 'html',
        data: obj,
        success: function (result) {
            document.getElementById("article").innerHTML = result;
            console.log(result);
        },
        error: function (result) {
            alert("error");
            console.log(result);
        },
        complete: function (result) {
            console.log('fini');
        }
    });
}