<!DOCTYPE html>
<html lang="en">
{{-- @php
    var_dump($userFormation);
@endphp --}}
<head>
     
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            color: #585858;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        h1 {
            font-size: 20px;
        }

        .text-grey {
            colo r: #7d7d7d;
        }

        .container {
            margin-top: 10px;
            padding: 40px;
        }

        .pdf_content {
            margin-top: 100px;
            position: relative;
        }

        .pdf-content * {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
       
        <img src="{{ public_path("img/logo.png") }}" id="img" style="position: absolute; right: 0;top: 20px;" />

        <!-- address content -->
        <div class="pdf_content">
            <div style="position: absolute; right: 0">

                <table class="customer_address">
                    <tr>
                        <th class="text-grey">INSERSITE</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="text-grey">35 AV DE L EUROPE 78130 Les Mureaux</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="text-grey">France</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="text-grey">0130221292</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="text-grey">contact@insersite.org</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="text-grey">Siret : 53887697000038</th>
                        <td></td>
                    </tr>
                </table>
            </div>

            <h1 style="position: absolute;  border: 1px solid grey; margin-left: auto; margin-right: auto; left: 0; right:0; text-align: center; top: 140px">Attestation de Formation</h1>

            <!-- table contents -->
            <div style="position: absolute; top: 180px; padding: 10px;margin-left: auto; margin-right: auto; left: 0; right:0; text-align: center;">
                <p>L'association INSERSITE atteste que <b>{{ $userFormation[0]->nom }} {{ $userFormation[0]->prenom }}</b> participe/a participer à la formation <b>{{ $userFormation[0]->FormNom }}</b> du
                    <b>{{ $userFormation[0]->date_debut }}</b> au <b>{{ $userFormation[0]->date_fin }}</b>.</p>
            </div>

            <div id="footer-note" style="text-align: center;position: absolute; bottom: -10px">
                <p>
                    INSERSITE - 35 AV DE L EUROPE 78130 Les Mureaux France - Tél. :
                    0130221292 - Email : contact@insersite.org
                </p>
                <p>
                    - Site web : https://www.insersite.org - IBAN FR76 1027 8061 1800
                    0201 3210 128 - Code NAF (APE) 8899B - Association au capital
                    social de 0 €
                </p>
                <p>- Siret : 53887697000038</p>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
