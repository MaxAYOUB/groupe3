<style>

    @media screen and (max-width: 767px) {
        #icon {
            display: inline-block;
            padding-left: 95%;
            padding-right: 10%;
        }

        #menutext {
            text-align: right;
            padding: 10px;
        }

        #menutextconnecte {
            text-align: right;
            padding: 10px;
        }

        #logo {
            width: 90px;
        }
    }

    html, body {
        height: 100%;
        margin: 0;
    }

    h2, .h2 {
        font-size: 30px;
        color: rgb(248, 245, 245);
    }

    .imgpara {
        width: 100%;
        height: 248px;
        margin: 0 auto;

        background-image: url("img.jpg");
        background-attachment: fixed;
        z-index: 1;
    }

</style>




<div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
        <a class="navbar-brand" id="logo" style='padding: 0 0 0 4%;' href="#">
            <img class="img-responsive logo" src="images/logo.png" alt="">
        </a>
        <div class="container">
            <div id="ajounavelement" class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right">

                    <li><a class="lien" href="#" style="padding: 0px;padding-top: 4px; padding-right: 20px"><img
                                    src="images/androidicon.png " id="icon"></a>
                    </li>

                    <li><a class="lien" href="#" style="padding: 0px;padding-top: 4px; padding-right: 20px; "><img
                                    src="images/appleicon.png " id="icon"></a>
                    </li>
                    <li><a id="menutext" href="ctrlGeneral/getForm" style="  padding-left: 10px;">S'inscrire</a></li>

                    <li><a id="menutextconnecte" href="ctrlGeneral/getAuthentification" style="padding-left: 10px;">Se connecter</a></li>
                    <li class="active"><a id="menutext" href="">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>