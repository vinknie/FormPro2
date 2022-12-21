<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title></title>
</head>
<style>
    *{
     margin: 0;
     padding: 0;
     color: #585858;
     font-family: Arial, Helvetica, sans-serif;
     font-size:14px;  
    }
    body{
        width: 80%;
        margin: auto;
    }
    .display{
        display: flex;
        justify-content: space-around;
    }
    .container{
        page-break-after: always;
        position: relative;
    }
   
    .article{
    margin-left: 40%;
    }
    .bottompage p{
        text-align: center;
        color: rgb(77, 187, 187);
    }
    .bottompage{
        position: absolute;
        bottom: 2%;
    }
    .signature{
        display: flex;
        justify-content: space-around;
    }
  
    p{
        margin: 0;
    }
  .green{
        border: 1px solid rgb(77, 187, 187);
       
    }
    
</style>

<body>
{{-- page1  --}}

<div class="container">
<div class="display">
    <img src="{{ public_path('img/logo.png') }}">
    <div class="float" style="float: right; width:50%;">
        <p><b style="font-size:20px !important">CONTRAT DE FORMATION<br>PROFESSIONNELLE CONTINUE</b></p>
    </div>
</div>

<div class="article"><i>(Articles : L.6353-3 a l.6353-7 du code du travail)</i></div>
<hr class="green">

<div>
    <p style="margin: 10px;"><i><b>Entre les soussignés</b></i></p>
    <p><b>1 - Organisme de formation : </b></p>
    <div class="insersite" style="box-shadow: 1px 1px 5px rgb(88 171 139); padding: 10px;">
        <p><b>INSERSITE</b></p>
        <p><b>Enregistré sous le numéro de déclaration d’activité</b> n° 11 78 84 650 78 auprès de la Préfecture de Région </p>
        <p>Immatriculé auprès du R.C.S de Versailles sous le n°538 876 970 00038 - APE : 7022Z</p>
        <p>Adresse : 35 avenue de l’Europe 78130 Les Mureaux ;</p>
        <p>Représenté par :  Monsieur Ibrahima CAMARA, agissant en sa qualité de Responsable de formation</p>
    </div>
</div>

<div class="contractant" >
    <p style="margin: 10px;"><b><i>ET</i></b></p>
    <hr>
    <p><b>Le CO-CONTRACTANT</b></p>
    <br>
    <p style="margin: 10px;"><b>NOM – PRÉNOM </b>: {{ $getUser->nom }} {{ $getUser->prenom }}</p>
    <p style="margin: 10px;"><b>ADRESSE </b>: {{ $getUser->adresse }}</p>
    <p style="margin: 10px;"><b>PROFESSION </b>: {{ $getUser->status }}</p>
    <p style="margin: 10px;"><b>TEL </b>:  {{ $getUser->telephone }}</p>
    <p style="margin: 10px;"><b>MAIL </b>:  {{ $getUser->email }}</p>
    <p style="margin: 10px;"><i><b>Ci-après désigné le stagiaire</b></i></p>
    <p>Est conclu un contrat de formation professionnelle en application des articles L 6353-3 à L 6353-7 du code du travail.</p> 
</div>
<div>
    <p style="margin: 5px;"><b>I. OBJET</b></p>
    <hr>
    <p>En exécution du présent contrat, l’organisme de formation s’engage à organiser l’action de formation suivante intitulée :<b> {{ $userFormation[0]->FormNom }}</b></p>
    <p>Elle a pour objet : (objectifs)</p>
    <ul>
        <li><p>Objectif a rajouter en BDD</p></li>
        <li><p>Objectif a rajouter en BDD</p></li>
    </ul>
</div>
<div>
    <p style="margin: 5px;"><b>II. NATURE ET CARACTÉRISTIQUES DE L’ACTION DE FORMATION</b></p>
    <hr>
    <p>L’action de formation entre dans la catégorie des actions de formation d’acquisition, d’entretien ou de perfectionnement des connaissances prévues à l’article L.6313-1 du code du travail. </p>
    <p>Sa durée est fixée à (a rajouter en bdd) heures.</p>
    <p>Le programme détaillé de l’action de formation figure en annexe du présent contrat.</p>
</div>
<div>
    <p style="margin: 5px;"> <b>III. NIVEAU DE CONNAISSANCES PREALABLES NECESSAIRES REQUIS </b></p>
    <hr>
    <p>Afin de suivre au mieux l’action de formation susvisée et obtenir la ou les qualifications auxquelles elle prépare, le stagiaire est informé qu’aucun prérequis n’est nécessaire de posséder avant l’entrée en formation.</p>
</div>

<div class="bottompage">
    <hr class="green">
    <p>INSERSITE - Association loi 1901</p>
    <p>N° Siret : 538 876 970 000 38 – Code APE : 8899B – N° de déclaration : W7810034681</p>
    <p>Enregistré auprès de la DRIEETS Ile de France sous le numéro de déclaration d’activité : 11788465078</p>
    <p>Siège : 35 Avenue de l’Europe - 78130 Les Mureaux </p>
    <p>Tél : 01 30 22 12 92 - Email : contact@insersite.org</p>
</div>
</div>
{{-- page 2  --}}
<div class="container">

<div class="display">
    <img src="{{ public_path('img/logo.png') }}">
    <div class="float" style="float: right; width:50%;">
        <p><b style="font-size:20px !important" >CONTRAT DE FORMATION<br>PROFESSIONNELLE CONTINUE</b></p>
    </div>
</div>

<div class="article"><i>(Articles : L.6353-3 a l.6353-7 du code du travail)</i></div>
<hr class="green">
<div>

    <p style="margin: 5px;"><b>IV. ORGANISATION DE L’ACTION DE FORMATION</b></p>
    <hr>
    <p>L’action de formation aura lieu du <b>{{ $userFormation[0]->date_debut }}</b> au <b>{{ $userFormation[0]->date_fin }}</b> au lieu de formation situé au <b>A rajouter en BDD</b>.</p>
    <p>Les horaires seront déterminés conjointement avec le stagiaire. Un planning de formation sera remis au stagiaire avant le début de la formation.</p>
    <p>Elle est organisée pour un effectif de <b>A ajouter en BDD</b> stagiaire</p>
    <p>Les conditions générales dans lesquelles la formation est dispensée, notamment : </p>
    <p><b>Les moyens pédagogiques et techniques : </b></p>
    <ul>
        <li>Salle de formation équipée d’ordinateur avec accès internet. </li>
        <li>Accès aux supports pédagogiques pour chaque séquence de formation. </li>
        <li>Utilisation du matériel multimédia (ordinateurs, imprimante)</li>
    </ul>
    <p><b>Les modalités de contrôle de connaissances sont les suivantes :</b></p>
    <ul>
        <li>Certificat de réalisation de la formation</li>
        <li>Passage de la certification à l’issue de la formation</li>
    </ul>
    <p>Les conditions détaillées figurent dans le programme de formation en annexe du présent contrat.</p>
</div>
<div>
    <p style="margin: 5px;"><b>V.  MOYENS PERMETTANT D’APPRECIER LES RESULTATS DE L’ACTION</b></p>
    <hr>
    <p>L’appréciation des résultats doit pouvoir se faire à travers la mise en œuvre d’une procédure d’évaluation qui permette de déterminer si le stagiaire à acquis les connaissances ou les gestes professionnels dont la maîtrise constitue l’objectif initial de l’action. Les procédures d’évaluation peuvent se concrétiser par des QCM, grille d’évaluation, travaux pratiques, tests réguliers de contrôle de connaissances, des examens professionnels, des fiches d’évaluation ou des entretiens avec un jury professionnel. </p>
    <p>Il ne s’agit pas d'auto-évaluation ou d’appréciation du stage par le stagiaire.</p>
</div>
<div>
    <p style="margin: 5px;"><b>VI. SANCTION DE LA FORMATION</b></p>
    <hr>
    <p>En application de l’article L. 6313-7 du Code du travail, une attestation de réussite, la nature et la durée de l’action et les résultats de l’évaluation des acquis de la formation peut être remise au stagiaire à l’issue de la formation.</p>

</div>
<div>
    <p style="margin: 5px;"><b>VII. MOYENS PERMETTANT DE SUIVRE L'EXÉCUTION DE L’ACTION</b></p>
    <hr>
    <p>Des feuilles de présence signées par le stagiaire et le ou les formateurs et par demi-journée de formation sont mis en place, l’objectif étant de justifier la réalisation de la formation.</p>

</div>
<div>
    <p style="margin: 5px;"><b>VIII. DELAI DE RETRACTATION</b></p>
    <hr>
    <p>A compter de la signature du présent contrat, le stagiaire a un délai de quatorze jours pour se rétracter. 
        Il en informe l’organisme de formation par simple lettre. Dans ce cas, aucune somme ne peut être exigée du stagiaire.</p>

</div>
<div>
    <p style="margin: 5px;"><b>IX. DISPOSITIONS FINANCIERES </b></p>
    <hr>
    <p>Le coût de l’action de formation <b>est fixé à AJOUTER EN BDD euros</b> net de charge </p>
    <p>Dont contribution éventuelle des financeurs publics : <b>(Ajouter bdd?)	€</b></p>
    <p>Les modalités de paiement de la somme de <b>Ajouter en BDD</b> euros net incombant au stagiaire sont les suivantes : </p>
    <p><b>La formation est financée dans le cadre du compte personnel de formation du stagiaire</b>.</p>
    <p>Après le délai de rétractation mentionné à l’article 8 du présent contrat, les modalités de versement de la somme sont fixées dans le cadre des conditions générales de vente du compte personnel de formation.</p>
</div>

<div class="bottompage">
    <hr class="green">
    <p>INSERSITE - Association loi 1901</p>
    <p>N° Siret : 538 876 970 000 38 – Code APE : 8899B – N° de déclaration : W7810034681</p>
    <p>Enregistré auprès de la DRIEETS Ile de France sous le numéro de déclaration d’activité : 11788465078</p>
    <p>Siège : 35 Avenue de l’Europe - 78130 Les Mureaux </p>
    <p>Tél : 01 30 22 12 92 - Email : contact@insersite.org</p>
</div>
</div>
{{-- page 3 --}}
<div class="container">

    <div class="display">
    <img src="{{ public_path('img/logo.png') }}">
    <div class="float" style="float: right; width:50%;">
        <p><b style="font-size:20px !important">CONTRAT DE FORMATION<br>PROFESSIONNELLE CONTINUE</b></p>
    </div>
</div>

<div class="article"><i>(Articles : L.6353-3 a l.6353-7 du code du travail)</i></div>
<hr class="green">
<div>
    <p style="margin: 5px;"><b>X. INTERRUPTION DU STAGE </b></p>
    <hr>
    <p>En cas de cessation anticipée de la formation du fait de l’organisme de formation ou l’abandon du stage par le stagiaire pour un autre motif que la force majeure dûment reconnue, le présent contrat est résilié. L’organisme de formation <b>Insersite</b> se réserve le droit de facturer au Client des frais d’annulation selon les <b>conditions générales d’utilisation et de financement du CPF</b> </p>
    <p>En application de l’article L6354-1 du Code du travail, il est convenu entre les signataires du présent contrat, que faute de résiliation totale ou partielle de la prestation de formation du fait de l’organisme de formation<b>Insersite</b> dans les temps impartis, l’organisme de formation <b>Insersite</b> pourra proposer un report de la formation et/ou le remboursement des sommes indûment perçues de ce fait</p>
    <p>Si le stagiaire est empêché de suivre la formation par suite de force majeure dûment reconnue, le contrat de formation professionnelle est résilié. Dans ce cas, seules les prestations effectivement dispensées sont dues au prorata temporis de leur valeur prévue au présent contrat et selon les dispositions financières du personnel de formation.</p>
</div>
<div>
    <p style="margin: 5px;"> <b>XI. CAS DE DIFFÉREND </b></p>
    <hr>
    <p>Si une contestation ou un différend n’ont pu être réglés à l’amiable, les médiateurs de la consommation dont relève l’organisme de formation pourront intervenir.</p>
    <p>Si une contestation ou un différend n’ont pu être réglés à la suite de la médiation, le tribunal de Versailles sera seul compétent pour régler le litige.
    </p>
</div>

<div class="signature">
    <div>
        <p style="margin: 5px;">Le présent contrat prend effet à compter de sa signature par le stagiaire.</p>
        <p style="margin: 5px;">Fait en double exemplaire à Les Mureaux,<b>le <?= date('j F Y') ?></b> </p>
    
        <p style="margin: 5px;">Le stagiaire <b>{{ $getUser->nom }} {{ $getUser->prenom }}</b></p>
        <p style="margin: 5px;">Signature « lu et approuvé »</p>
    </div>
    <div  class="float" style="margin-left:55%">
        <p><b>INSERSITE</b></p>
        <p>Représenté par Ibrahima CAMARA</p>
        <p>Responsable pédagogique</p>
        <img src="{{ public_path("img/SignatureAttestationEntree.png") }}">
    </div>
    
</div>

<div class="bottompage">
    <hr class="green">
    <p>INSERSITE - Association loi 1901</p>
    <p>N° Siret : 538 876 970 000 38 – Code APE : 8899B – N° de déclaration : W7810034681</p>
    <p>Enregistré auprès de la DRIEETS Ile de France sous le numéro de déclaration d’activité : 11788465078</p>
    <p>Siège : 35 Avenue de l’Europe - 78130 Les Mureaux </p>
    <p>Tél : 01 30 22 12 92 - Email : contact@insersite.org</p>
</div>
		
</div></body></html>