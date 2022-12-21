<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="generator" content="LibreOffice 7.4.0.3 (Windows)" />
    <meta name="author" content="Haby CAMARA" />
    <meta name="created" content="2022-09-13T10:00:00" />
    <meta name="changed" content="2022-12-19T15:39:46.338000000" />
    <meta name="AppVersion" content="16.0000" />
    <meta name="ComplianceAssetId" content="" />
    <meta name="ContentTypeId" content="0x01010032762DE308F24C409F04099B846BFE58" />
    <meta name="TriggerFlowInfo" content="" />
    <meta name="_ExtendedDescription" content="" />
    <meta name="_SharedFileIndex" content="" />
    <meta name="_SourceUrl" content="" />
    <style type="text/css">
        @page {
            size: 21cm 29.7cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-top: 1cm;
            margin-bottom: 1cm
        }

        p {
            line-height: 115%;
            orphans: 2;
            widows: 2;
            direction: ltr;
            background: transparent
        }

        a:link {
            color: #0563c1;
            text-decoration: underline
        }
    </style>
</head>

<body lang="fr-FR" link="#0563c1" vlink="#800000" dir="ltr">
    <div title="header">
        <p align="right" style="line-height: 100%; margin-bottom: 0cm">
            <font color="#009999"> </font><img
                src="{{ public_path("img/logo.png") }}" name="Image 16"
                align="left" width="176" height="95" border="0" />

        </p>
    </div>
    <p align="justify" style="line-height: 108%; margin-bottom: 0cm">
        <br />

    </p>
    <p align="justify" style="line-height: 108%; margin-bottom: 0cm"><br />

    </p>
    <p align="justify" style="line-height: 108%; margin-bottom: 0cm"><br />

    </p>
    <p style="line-height: 108%; margin-bottom: 0cm">
        <font size="4" style="font-size: 16pt"><b> </b></font>
    </p>
    <p align="center" style="line-height: 108%; margin-bottom: 0cm">
        <font color="#009999">
            <font size="5" style="font-size: 20pt"><b>ATTESTATION
                    D'ENTRÉE EN FORMATION</b></font></font></p>
    <p style="line-height: 108%; margin-bottom: 0cm"><br /></p>
   
    <p align="justify" style="line-height: 108%; margin-bottom: 0.21cm">
        <font size="3" style="font-size: 12pt">Je
            soussigné, Monsieur Ibrahima CAMARA, agissant en qualité de
            responsable de formation de l’organisme INSERSITE déclaré sous le
            numéro </font>
        <font size="3" style="font-size: 12pt"><b>11788465078</b></font>
        <font size="3" style="font-size: 12pt">
            enregistré auprès de la DRIEETS Ile de France</font>, atteste<font size="3" style="font-size: 12pt">
            que </font>
    </p>
    <p align="left" style="line-height: 108%; margin-bottom: 0cm">
        <font size="3" style="font-size: 12pt">Monsieur/Madame
        </font>
        <font size="3" style="font-size: 12pt"><b>{{ $getUser->nom }} {{ $getUser->prenom }}</b> actuellement en <b>{{ $getUser->status }}</b> </font>
    </p>
    <p align="left" style="line-height: 108%; margin-bottom: 0cm">
        <font size="3" style="font-size: 12pt">est
            entré(e) en formation le&nbsp;: </font>
        <font size="3" style="font-size: 12pt"><b>{{ $userFormation[0]->date_debut }}</b></font>
        
    </p>

    <p align="left" style="line-height: 108%; text-indent: 1.25cm; margin-bottom: 0.21cm">
        <font size="3" style="font-size: 12pt">Intitulé de la formation :
        </font>
        <font size="3" style="font-size: 12pt"><b>{{ $userFormation[0]->FormNom }}</b></font>
    </p>
    <p align="left" style="line-height: 108%; text-indent: 1.25cm; margin-bottom: 0.21cm">
        <font size="3" style="font-size: 12pt">Période de la formation : du
        </font>
        <font size="3" style="font-size: 12pt"><b>{{ $userFormation[0]->date_debut }}</b> au <b>{{ $userFormation[0]->date_fin }}</b></font>
    </p>
    <p style="line-height: 108%; text-indent: 1.25cm; margin-bottom: 0.21cm">
        <font size="3" style="font-size: 12pt">Lieu de réalisation de la
            formation :</font>
        <font face="Times New Roman, serif">
            <font size="1" style="font-size: 7pt">
            </font>
        </font>
        <font size="3" style="font-size: 12pt"><b>A Rajouter en BDD</b></font>
    </p>
    <p style="line-height: 108%; text-indent: 1.25cm; margin-bottom: 0.21cm">
        <font size="3" style="font-size: 12pt">Durée en heures : </font>
        <font size="3" style="font-size: 12pt"><b>A Rajouter en BDD</b></font>
    </p>
    <p style="line-height: 108%; margin-bottom: 0cm"><br />

    </p>
    <p style="line-height: 108%; margin-bottom: 0cm">
        <font size="3" style="font-size: 12pt">Pour
            servir et valoir ce que de droit,</font>
    </p>
    <p style="line-height: 108%; margin-bottom: 0cm"><br/></p>

    <p style="line-height: 108%; margin-bottom: 0cm">
        <font size="3" style="font-size: 12pt">Fait
            à Les Mureaux, Le <?= date('j F Y') ?></font>
    </p>
    <p style="line-height: 108%; margin-bottom: 0cm"><br />

    </p>
    <p align="justify" style="line-height: 108%; margin-bottom: 0cm"><br />

    </p>
    <p align="justify" style="line-height: 100%; margin-left: 10cm; margin-bottom: 0cm">
        <font face="Times New Roman, serif">
            <font size="3" style="font-size: 12pt">
                <font face="Calibri, serif"><b>INSERSITE</b></font>
                <font face="Calibri, serif">&nbsp;</font>
            </font>
        </font>
    </p>
    <p align="justify" style="line-height: 100%; margin-left: 10cm; margin-bottom: 0cm">
        <font face="Times New Roman, serif">
            <font size="3" style="font-size: 12pt">
                <font face="Calibri, serif">Représenté
                    par Ibrahima CAMARA</font>
                <font face="Calibri, serif">&nbsp;</font>
            </font>
        </font>
    </p>
    <p align="justify" style="line-height: 100%; margin-left: 10cm; margin-bottom: 0cm">
        <font face="Times New Roman, serif">
            <font size="3" style="font-size: 12pt">
                <font face="Calibri, serif">Responsable pédagogique</font>
                <img src="{{ public_path("img/SignatureAttestationEntree.png") }}" name="Forme1"
                        alt="Forme1" align="left" width="304" height="117" />
                <font face="Calibri, serif">&nbsp;</font>
            </font>
        </font>
    </p>
    <p align="justify" style="line-height: 108%; margin-bottom: 0cm"><br />

    </p>
    <p align="justify" style="line-height: 108%; margin-bottom: 0cm"><br />

    </p>
    
    <p style="line-height: 108%; margin-bottom: 0cm"><br />

    </p>
    <p style="line-height: 108%; margin-bottom: 0cm"><a name="_Hlk111067931"></a>
        <font size="3" style="font-size: 12pt"> </font>
    </p>
    <p align="center" style="line-height: 108%; margin-bottom: 0cm">
        <font size="3" style="font-size: 12pt"><b>Attestation
                à conserver sans limite de temps</b></font>
        <font size="3" style="font-size: 12pt">.</font>
    </p>
    <div title="footer">
        <p align="center"
            style="line-height: 108%; margin-bottom: 0cm; border-top: 1px solid #000000; border-bottom: none; border-left: none; border-right: none; padding-top: 0.04cm; padding-bottom: 0cm; padding-left: 0cm; padding-right: 0cm">
            <font color="#009999">
                <font size="1" style="font-size: 8pt"><b>INSERSITE - Association loi 1901</b></font>
            </font>
        </p>
        
        <p align="center" style="line-height: 108%; margin-bottom: 0cm; margin-top: 0cm ">
            <font color="#009999">
                <font size="1" style="font-size: 8pt"><b>N°
                        Siret : 538 876 970 000 38 – Code APE : 8899B – N° de
                        déclaration : W781003468</b></font>
            </font>
        </p>
        <p align="center" style="line-height: 108%; margin-bottom: 0cm; margin-top: 0cm">
            <font color="#009999">
                <font size="1" style="font-size: 8pt"><b>Enregistré
                        auprès de la DRIEETS Ile de France sous le numéro de déclaration
                        d’activité : 11788465078</b></font>
            </font>
        </p>
        <p align="center" style="line-height: 108%; margin-bottom: 0cm ; margin-top: 0cm">
            <font color="#009999">
                <font size="1" style="font-size: 8pt"><b>Siège
                        : </b></font>
            </font>
            <font color="#009999">
                <font size="1" style="font-size: 8pt"><b>35
                        Avenue de l’Europe - 78130 Les Mureaux </b></font>
            </font>
        </p>
        <p align="center" style="line-height: 108%; margin-bottom: 0cm ; margin-top: 0cm">
            <font color="#009999">
                <font size="1" style="font-size: 8pt"><b>Tél&nbsp;:</b></font>
            </font>
            <font color="#009999">
                <font size="2" style="font-size: 10pt"><b>
                    </b></font>
            </font>
            <font color="#009999">
                <font size="1" style="font-size: 8pt"><b>01
                        30 22 12 92 </b></font>
            </font>
            <font color="#009999">
                <font size="2" style="font-size: 10pt"><b>-
                    </b></font>
            </font>
            <font color="#009999">
                <font size="1" style="font-size: 8pt"><b>Email
                        : </b></font>
            </font>
            <font color="#0563c1"><u><a href="mailto:contact@insersite.org">
                        <font color="#009999">
                            <font size="1" style="font-size: 8pt"><b>contact@insersite.org</b></font>
                        </font>
                    </a></u></font>
        </p>
    </div>
</body>

</html>
