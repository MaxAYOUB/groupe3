var Compte = {
    /**
     * Arguments
     */
    'motdepasse': "",
    'motdepasse1': "",
    'motdepasse2': "",
    erreur: false,
    /**
     * Setter
     */
    'setMotdepasse1': function (n) {
        this.motdepasse1 = n;
        return;
    },
    'setMotdepasse2': function (n) {
        this.motdepasse2 = n;
        return;
    },
    'setMotdepasse': function (n) {
        this.motdepasse = n;
        return;
    },
    'getMotdepasse': function (n) {
        return this.motdepasse;
    },
    'getMotdepasse1': function (n) {
        return this.motdepasse1;
    },
    'getMotdepasse2': function (n) {
        return this.motdepasse2;
    },
}
window.onload = verification;
// Fonction pour verifier les champs Identifiant et Mot de passe
function verification() {
    var bouton = document.getElementById("validerPassword");
    bouton.addEventListener("click", function () {
        console.log("click");
        var compte1 = Object.create(Compte);
        compte1.setMotdepasse(document.getElementById("motdepasse").value);
        var test1 = compte1.getMotdepasse();
        compte1.setMotdepasse1(document.getElementById("motdepasse1").value);
        var test2 = compte1.getMotdepasse1();
        compte1.setMotdepasse2(document.getElementById("motdepasse2").value);
        var test3 = compte1.getMotdepasse2();
        if (test1 != "" && test2 != "" && test2==test3) {
            var result = {'identifiant':test1,'motdepasse':test2};
            // result.identifiant = test1;
            // result.motdepasse = test2;
            // console.log("passe");
            // Convertion de la chaine de caractére en JSON 
            myAjax(result);
        } else {
            if (test1 != "") {
                document.getElementById("motdepasse").style.borderColor = "none";
            } else {
                document.getElementById("motdepasse").style.borderColor = "red";
            }
            if (test2 != "") {
                document.getElementById("motdepasse1").style.borderColor = "none";
            } else {
                document.getElementById("motdepasse1").style.borderColor = "red";
            }
            if (test3 == test2 && test3!="") {
                document.getElementById("motdepasse2").style.borderColor = "none";
            } else {
                document.getElementById("motdepasse2").style.borderColor = "red";
            }
        }
    }, false);
}
// Fonction ajax pour lancer VerifierAuthentification
function myAjax(obj) {
    console.log(obj);
    $.ajax({
        url: "ctrlGeneral/modifierMotDePasse",
        type: "POST",
        dataType: 'html',
        data: obj,
        success: function (result) {
            console.log(result);
            document.getElementById('article').innerHTML=result;
            // var result2 = JSON.parse(result);
            // console.log(result2);
            
            // if (result2.erreur==true){
            //     console.log("vrai");
            //     location.assign("ctrlGeneral/getParametre/passe");
            // }else{
            //     // document.getElementById("confirmation").style.display="modal";
            //     location.assign("ctrlGeneral/getParametre/PasPasse");
            //     console.log({result2});
            // }
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