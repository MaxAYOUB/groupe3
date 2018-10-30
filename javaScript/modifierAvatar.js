var Avatar = {
    /**
     * Arguments
     */
    'slug': "",
    /**
     * Setter
     */
    'setSlug': function (n) {
        this.slug = n;
        return;
    },
    'getSlug': function (n) {
        return this.slug;
    }
}
Sonslug="";
function modifAvatar(s){

    if (Sonslug != "") {
        document.getElementById(Sonslug).style.border = "1.5px hidden";
        document.getElementById(Sonslug).style.margin = "3px";
    }
    Sonslug = s;
    document.getElementById(Sonslug).style.margin = "1.5px";
    document.getElementById(Sonslug).style.border = "1.5px solid green";
    document.getElementById(Sonslug).style.borderRadius = "30px";

    var sonAvatar = Object.create(Avatar);
    sonAvatar.setSlug(s);

    var result ={'slug_avatar':sonAvatar.getSlug()}
    myAjaxAvatar(result);
}

function myAjaxAvatar(obj) {
    console.log(obj);
    $.ajax({
        url: "ctrlGeneral/modifierAvatar",
        type: "POST",
        dataType: 'html',
        data: obj,
        success: function (result) {
            console.log(result);
            // document.getElementById('article').innerHTML=result;
            var result2 = JSON.parse(result);
            console.log(result2);
            
            if (result2.erreur==true){
                console.log("vrai");
                location.assign("ctrlGeneral/getParametre/passe");
            }else{
                // document.getElementById("confirmation").style.display="modal";
                location.assign("ctrlGeneral/getParametre/PasPasse");
                console.log({result2});
            }
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