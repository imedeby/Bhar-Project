<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Facture</title>
    <style type = "text/css">
        @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        }   

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }


        body {
            position: relative;
            width: 18cm;  
            height: 29.7cm; 
            margin: 0 auto; 
            color: #555555;
            background: #FFFFFF; 
            font-family: Arial, sans-serif; 
            font-size: 14px; 
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            margin: 0 0 0 230;
        }


        #details {
            margin-bottom: 100px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #cea632;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            margin: 0 0 0 209;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 20px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;        
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3{
            color: #cea632;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #cea632;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {
        }

        table .total {
            background: #cea632;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap; 
            border-top: 1px solid #AAAAAA; 
        }

        table tfoot tr:first-child td {
            border-top: none; 
        }

        table tfoot tr:last-child td {
            color: #cea632;
            font-size: 1.4em;
            border-top: 1px solid #cea632; 

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks{
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices{
            padding-left: 6px;
            border-left: 6px solid #cea632;  
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }

    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
      <img src="{{ asset('images/backend_images/logo.png') }}" alt="logo">
      </div>
      <div id="company">
        <h2 class="name">AFRAH BHAR</h2>
        <div>Adresse: 98 AV Mohamed Salah Belhaj-Ariana</div>
        <div>Mobile: 29 212 510 - 28 507 214</div>
        <div>Mail: contact1@afrahbhar.com</div>
        <div>Site web: www.afrahbhar.com</div>
      </div>
      
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div>Client: {{ $factures->N_client }}</div>
          <div>Mobile: {{ $factures->p_num }}</div>
          <div>Address: {{ $factures->adress }}</div>  
          <div>Matricule fiscal: 0</div>
        </div>
        <div id="invoice">
          <div><h2 class="name">Bon de Location N° {{ $factures->N_facture }}</h2></div>
          <div>Ariana le: 01/06/2014</div>
          <div>Date De Debut: {{ $factures->date_debut }}</div>
          <div>Due De Fin: {{ $factures->date_fin }}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no"></th>
            <th class="desc">Article</th>
            <th class="qty">Quantité</th>
            <th class="unit">Prix Unitaire</th>
            <th class="total">Prix</th>
          </tr>
        </thead>
        <tbody>
            {{ $n = 0 }}
            @foreach($items as $item)
            <tr>
                <td class="no">{{ $n++ }}</td>
                <td class="desc">{{ $item->article_i }}</td>
                <td class="qty">{{ $item->quantity_i }}</td>
                <td class="unit">{{ $item->prix_i }}</td>
                <td class="total">{{ $item->prix_i * $item->quantity_i }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>

        </tfoot>
      </table>
      <div id="notices">
        <div>ARRETEE LA PRESENTE FACTURE A LA SOMME DE:</div>
      </div>
    </main>
  
</body></html>