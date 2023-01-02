<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title></title>
  
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        color: #585858;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
    }

    body {
        width: 80%;
        margin: auto;
    }

    .display {
        display: flex;
        justify-content: space-around;
    }

    .container {
        page-break-after: always;
        position: relative;
    }

    .article {
        margin-left: 40%;
    }

    .bottompage p {
        
        
        color: rgb(77, 187, 187);
    }

    .bottompage {
        position: absolute;
        bottom: 2%;margin-left: auto;margin-right: auto;left: 0;right: 0;text-align: center;
    }

    .signature {
        display: flex;
        justify-content: space-around;
    }

    p {
        margin: 0;
    }

    .green {
        border: 1px solid rgb(77, 187, 187);

    }
    .carre li{
        list-style: none;
       
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
            <p style="margin: 5px;"><b><i>ET</i></b></p>
            <hr>
            <p><b>Le CO-CONTRACTANT</b></p>
            <p style="margin: 5px;"><b>NOM – PRÉNOM </b>: {{ $getUser->nom }} {{ $getUser->prenom }}</p>
            <p style="margin: 5px;"><b>ADRESSE </b>: {{ $getUser->adresse }}</p>
            <p style="margin: 5px;"><b>PROFESSION </b>: {{ $getUser->status }}</p>
            <p style="margin: 5px;"><b>TEL </b>:  {{ $getUser->telephone }}</p>
            <p style="margin: 5px;"><b>MAIL </b>:  {{ $getUser->email }}</p>
            <p style="margin: 5px;"><i><b>Ci-après désigné le stagiaire</b></i></p>
            <p>Est conclu en une convention de formation professionnelle en application des articles L 6353-3 à L 6353-7 du code du travail.</p> 
        </div>
        <div>
            <p style="margin: 5px;"><b>Article 1: Objet du contrat</b></p>
            <hr>
            <p>En exécution du présent contrat, l’organisme de formation s’engage à organiser l’action de formation suivante intitulée :<b> {{ $userFormation[0]->FormNom }}</b>, telle que prévue au programme de formation joint et dans les conditions fixées par les articles suivants.</p>
        </div>
        <br>
        <div>
            <p style="margin: 5px;"><b>Article 2: Nature, programme et caractéristiques de l'action de formation</b></p>
            <hr>
            <p>Les actions de formation envisagées entre dans l'une des catégories prévues aux articles L.6313-1 et suivants du code du travail. Il revient a l'entreprise signataire d'identifier la (ou les) catégorie(s) en cochant la ou les case(s) correspondante(s):</p>
            <ul class="carre">
                <li><i class="fa-regular fa-square"></i>Action de préformation et de prépartation à la vie prifessionnelle pour toute personne sans qualification et sans contrat de travail. </li>
                <p><b>Action d'adaptation et de développement des compétences des salariés</b></p>
                <li>&#9634; Action d'acquisition,d'entretien ou de perfectionnement des connaisances des travailleurs </li>
                <li>&#9634; Action de promotion professionnelle des travailleurs</li>
                <li>&#9634; Action de prévention pour des salariés</li>
                <li>&#9634; Action de conversion pour des salariés ou travailleurs non-salariés</li>
                <li>&#9634; Aciton de qualification pour des travailleurs</li>
                <li>&#9634; action de formation diplômante</li>
                <li>&#9634; Action de lutte contre l'illettrisme et pour l'apprentissage de la langue française</li>
                <li>&#9634; Action de formation relative à l'économie et à la gestion de l'entreprise pour des salariés</li>
                <li>&#9634; Action de formation relative à l'intéressement, à la partication et aux dispositifs d'épargne salariale et d'actionnariat salarié</li>
                <li>&#9634; Action d'accompagnement, d'information et de conseil dispensées aux créateurs ou repreneurs d'entreprise(agricoles, artisanales, commerciales ou libérales) exerçant ou non une activité.</li>
                
            </ul>
            <br>
            <p><b>La durée de la formation est fixée a <i>Ajouter en bdd</i></b></p>
            <p>Le programme de l'action de formation figure en annexe de la présente convention.</p>
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

     {{-- page2  --}}

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
            <p style="margin: 5px;"><b>Article 3: Modalités de l'action de formation</b></p>
            <hr>
            <p>Les actions de formation professionnelle continue doivent être réalisées conformément aux dispositions de l'article L6353-3 a l.6353-7 du Code du travail.</p>
            <p>A ce titre, les actions doivent être rélisées conformément à un programmen préétabli qui, en fonction d'objectifs déterminés, précise :</p>
            <ul>
                <li><b>Les moyens pédagogiques, techniques et d'encadrement mis en &#x153;uvre;</b></li>
                <li><b>Les Moyens permettant de suivre son exécution et d'en apprécier les résultats par le biais de systèmes de vérification de l'acquisition des compétences par les stagiaires en cours et/ou en fin de formation.</b></li>
            </ul>
            <br>
            <p>Toutes les modalités de l'action de mise en &#x153;uvre de formation figure dans le programme de formation. Afin de suivre au mieux l'action de formation susvisée, <b>le stagiaire est informé qu'aucun prérequis est nécessaire de posséder, avant l'entrée en formation.</b></p>
        </div>
        <br>
        <div>
            <p style="margin: 5px;"><b>Article 4: Organisation de l'action de formation</b></p>
            <hr>
            <ul>
                <li><b>Dates et horaires de la formation</b></li>
            </ul>
            <p>L'action de formation aura du <b> {{ $userFormation[0]->date_debut }} </b> au <b>{{ $userFormation[0]->date_fin }}</b></p>
            <p>Les Horaires sont <b>AJOUTER EN BDD</b></p>
            <p>Les horaires de la formation sons susceptibles d'être modifiés. Le stagiaire et l'employeur seront informées de tout modification</p>
            <ul>
                <li><b>Lieu de la formation</b></li>
            </ul>
            <p>Le lieu de la formation se situe au : </p>
            <p><b>Ajouter en Bdd (adresse)</b></p>
            <ul>
                <li><b>Effectif de la formation</b></li>
            </ul>
            <p>Elle est organisée pour un effectif de <b>Ajouter en bdd</b> participant(s)</p>
        </div>   
        <br>
        <div>
            <p style="margin: 5px;"><b>Article 5 : Contrôle des connaissances et validation</b></p>
            <hr>
            <p><b>Une attestation de réalisation et de fin de formation</b>sera délivrée au stagiaire. Les modalités pédagogiques sont précisées dans le programme de formation. </p>
        </div>
        <br>
        <div>
            <p style="margin: 5px;"><b>Article 6 : Référents/Contacts</b></p>
            <hr>
            <p>Au sein de l’organisme Insersite, <b>le référent du stagiaire et de l'employeur est Ibrahima CAMARA, Responsable pédagogique et formateur.</b></p>
        </div>
        <br>
        <div>
            <p style="margin: 5px;"><b>Article 7 : Délai de rétractation</b></p>
            <hr>
            <p>À compter de la signature du présent contrat, le stagiaire dispose d’un délai de 14 jours pour se rétracter. Le stagiaire souhaitant se rétracter en informe l’organisme de formation par écrit.</p>
            <p>Dans ce cas aucune somme ne peut être exigée du stagiaire. </p>
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
    {{-- page3  --}}

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
            <p style="margin: 5px;"><b>Article 8 : Dispositions financières</b></p>
            <hr>
            <p>L'entreprise signataire, en contrepartie de l'action de formation réalisée, s'engage à verser à l'organisme de formation, la somme correspondant aux frais de formation. </p>
            <p>L'organisme de formation, en contrepartie des sommes reçues, s'engage à réaliser toutes les actions prévues dans le cadre de la présente convention ainsi qu'à fournir tout document et pièce de nature à justifier la réalité et la validité des dépenses de formation engagées à ce titre. </p>
            <br>
            <p>La formation de <b>{{ $getUser->nom }} {{ $getUser->prenom }}</b> est prise en charge par ????</p>
            <p>Le prix de l'action de formation prévue à la présente convention s'élève à : </p>
            <p><b>Montant net de Taxe: ????</b></p>
        </div>
        <br>
        <div>
            <p style="margin: 5px;"><b>Article 9 : Interruption de l’action de formation - absences et retards.</b></p>
            <hr>
            <ul>
                <li><b>Résiliation de la convention de formation par Insersite </b></li>
            </ul>
            <p>Conformément à l'article L.6353-3 a l.6353-7 du Code du travail, en cas de non-réalisation totale ou partielle de la prestation de formation dans les délais prévus, <b>Insersite</b> remboursera au financeur les sommes indûment perçues de ce fait.</p>
            <br>
            <ul>
                <li><b>Résiliation de la convention de formation par L’entreprise</b></li>
            </ul>
            <p>En cas de résiliation de la présente convention par l'entreprise, <b>Insersite</b> retiendra, sur le coût total, les sommes que la structure aura réellement dépensée ou engagée pour la réalisation de ladite action.</p>
            <br>
            <ul>
                <li><b>Modalités financières suivant la résiliation</b></li>
            </ul>
            <p>Si le stagiaire est empêché de suivre la formation de manière temporaire (absence) par suite de force majeure dûment reconnue, la convention de formation professionnelle est résiliée. Dans ce cas, seules les prestations effectivement dispensées sont dues au prorata temporis de leur valeur prévue à la présente convention. Tout module de formation commencée est dû dans son intégralité et fera l’objet d’une facturation par <b>Insersite.</b></p>
            <p>Dans tous les autres cas, c'est-à-dire en cas d'absences injustifiées, ou d'arrêt injustifié, les prestations de formation sont dues par l'entreprise dans leur intégralité.</p>
            <br>
            <ul>
                <li><b>Absences</b></li>
            </ul>
            <p>Le contrôle de la présence du stagiaire sera assuré par la vérification de son assiduité, et ce par le biais d'une feuille d'émargement pour chaque demi-journée de formation. Chaque absence doit être accompagnée d'un justificatif écrit. </p>
            <p>En cas d’absence, d’interruption ou d’annulation, la facturation <b>Insersite</b> distinguera le prix correspondant aux journées effectivement suivies par le stagiaire et les sommes dues au titre des absences ou de l’interruption de la formation. Il est rappelé que les sommes dues par le Client à ce titre ne peuvent être imputées par le client sur son obligation de participer à la formation professionnelle continue, ni faire l’objet d’une demande de prise en charge par un OPCO. Le Client s’engage à régler les sommes qui resteraient à sa charge directement à Insersite.</p>
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
    {{-- page3  --}}

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
            <p style="margin: 5px;"><b>Article 10 : Clause de Dédit</b></p>
            <hr>
            <p>En cas d’annulation de la formation par le Client, Insersite se réserve le droit de facturer au Client des frais d’annulation calculées comme suit :</p>
            <ul>
                <li>Si l’annulation intervient plus de 10 jours ouvrables avant le démarrage de la formation : aucuns frais d’annulation.</li>
                <li>Si l’annulation intervient entre 10 jours et 7 jours ouvrables avant le démarrage de la formation : les frais d’annulation sont de 50% du coût de la formation.</li>
                <li>Si l’annulation intervient moins de 7 jours ouvrables avant le démarrage de la formation : les frais d’annulation sont de 100% du coût de la formation.</li>
            </ul>
           
        </div>
        <br>
        <div>
            <p style="margin: 5px;"><b>Article 11 : Cas de différend</b></p>
            <hr>
            <p>Si une contestation ou un différend n’ont pu être réglés à l’amiable, le tribunal de Versailles sera seul compétent pour régler le litige.</p>
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

</html>
