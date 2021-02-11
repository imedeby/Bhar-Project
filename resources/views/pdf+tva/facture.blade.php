
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <style type = "text/css">
        * {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

body {
	font-family: "Times New Roman", Times, serif;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	align-items: center;
	height: 297mm;
	width: 100%;
}

header {
	margin: 20px 0;
}
header .container {
	height: 80px;
	width: 70vw;
	display: flex;
	align-items: flex-start;
	justify-content: space-around;
	border: 1px solid black;
	padding: 2px;
}
.BharName {
	height: 100%;
	flex: 4;
	border: 1px solid black;
	text-align: center;
	margin-right: 2px;
}
.Information {
	flex: 2;
	height: 100%;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	align-items: center;
	font-size: 1.1rem;
	border: 1px solid black;
	padding: 5px 0;
}
.InformationClient {
	width: 70vw;
	display: flex;
	flex-direction: row;
	justify-content: space-between;
	align-items: center;
	top: 0;
}
img {
	width: 200px;
}
.Info {
	margin-right: 20px;
}
.Info p {
	font-size: 1.2rem;
	margin-right: 10px;
}
.title {
	margin-bottom: 15px;
}
.Client,
.AddandMf,
.Date {
	display: flex;
}
main {
	width: 100%;
	display: flex;
	justify-content: center;
}
.Tab {
	width: 60vw;
}

table,
tr,
td {
	border: 1px solid black;
}
tr:first-child {
	color: white;
	background: black;
}

table {
	width: 100%;
	font-size: 1rem;
	font-weight: bold;
}

.Resultat p {
	font-size: 1.2rem;
	font-weight: 2000;
}
footer {
	bottom: 5px;
}
.FooterOne {
	width: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-size: 1.3rem;
	text-transform: uppercase;
	margin-bottom: 80px;
}

.FooterOne .text {
	font-weight: bold;
}
.Line {
	height: 1px;
	width: 70vw;
	background: black;
	margin: 20px 0;
}
.FooterTwo {
	display: flex;
	flex-direction: column;
	align-items: center;
	margin-bottom: 10px;
}

.FooterTwo p {
	margin-right: 15px;
	font-size: 14px;
}
.Line2 {
	display: flex;
}
.Line1 {
	display: flex;
}

        </style>
		<title>Invoice</title>
	</head>
	<body>
        <header>
		<header>
			<div class="container">
				<div class="BharName">
					<h1>
						Société Afrah Bhar
					</h1>
				</div>
				<div class="Information">
					<h3 class="facture">
						Facture N: {{ $factures->N_facture }}
					</h3>
					<h3 class="date">
						Ariana le: ....
					</h3>
				</div>
			</div>
		</header>
		<section class="InformationClient">
			<div class="LogoSection">
				<img src="{{ asset('images/backend_images/logo.png') }}" alt="Logo" srcset="" />
			</div>
			<div class="Info">
				<h3 class="title">
					Information Client
				</h5>
				<div class="Client">
					<p class="Nom">
						<b> Nom: {{ $factures->N_client }}</b>...
					</p>
					<p class="Mobile1">
						<b> Mobile1: {{ $factures->p_num }}</b>...
					</p>
					<p class="Mobile2">
						<b> Mobile2: </b>...
					</p>
				</div>
				<div class="AddandMf">
					<p class="Addresse">
						<b> Adresse: {{ $factures->adress }}</b>...
					</p>
					<p class="Mf">
						<b> MF: 0</b>...
					</p>
				</div>
				<div class="Date">
					<p class="DateDebut">
						<b> Date De Début: {{ $factures->date_debut }}</b>
					</p>
					<p class="DateFin">
						<b> Dade De Fin: {{ $factures->date_fin }}</b>
					</p>
				</div>
			</div>
        </section>
        </header>
		<main class="Tab">
			<table>
                <thead>
				<tr>
					<td>
						Quantité
					</td>
					<td>
						Article
					</td>
					<td>
						Prix Unitaire
					</td>
					<td>
						Prix
					</td>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->quantity_i }}</td>
                    <td>{{ $item->article_i }}</td>
                    <td>{{ $item->prix_i }}</td>
                    <td>{{ $item->prix_i * $item->quantity_i }}</td>
                </tr>
                @endforeach
                </tbody>
				<!-- Houni li bch yezed Automatique -->
			</table>
		</main>
        <section class="Resultat">
            <p>
                TOTAL HT:  {{ $factures->net_payer }}
            </p>
            <p>
                TVA 19 % :  {{ $tva = ($factures->net_payer * 19) /100 }}
            </p>
            <p>
                TIMBRE FISCALE : {{$tf = 600}}
            </p>
            <p>
                TOTAL TTC : {{ $ttc = $factures->net_payer + $tva + $tf }}
            </p>
        </section>
		<footer>
			<div class="FooterOne">
				<p class="text">
					Arrete la presence de la facture la somme:
				</p>
				<p class="Sommme">
					....................................
				</p>
			</div>
			<div class="Line"></div>
			<div class="FooterTwo">
				<div class="Line1">
					<p><b> Adresse: </b>Adresse: 78 Avenue Taieb Mhiri, Ariana</p>
					<p><b> Tel/Fax: </b>70319178</p>
					<p><b> Mobile: </b>28507215</p>
				</div>
				<div class="Line2">
					<p><b> E-mail: </b>contactar@afrahbhar.com</p>
					<p class=""><b> M.F: </b>1195591X/A/M/000</p>
				</div>
			</div>
		</footer>
	</body>
</html>
