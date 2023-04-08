import axios from 'axios';

const ctx = document.getElementById('myChart');
console.log(views);
console.log(slug);
// chiamata axios per recuparer l'appartemnto corrente
axios.get(`http://127.0.0.1:8000/api/apartments/${slug}`).then((response) => {
	// il risultato lo assegno ad una variabile
	let apar = response.data.apartment;
	// salvo l'id dell'appartamento
	let aparId = apar.id;
	// array delle date ( asse x)
	let datesArray = [];
	// array delle views per appartamento
	let countsArray = [];

	// ciclo le views
	for (let i = 0; i < views.length; i++) {
		// salvo la data della view ciclata
		let date = views[i].created_at;
		// transofromo la stringa in formato 'dd/mm/yyyy'
		let yymmdd = date.split("-");
		yymmdd[2] = yymmdd[2].slice(0, 2);
		yymmdd = yymmdd.reverse();
		yymmdd = yymmdd.join('/');

		// console.log(yymmdd);
		// contatore views
		let count = 1;

		// se l'apartment id della view ciclata è = all'id dell'apartment attuale...
		if (views[i].apartment_id == aparId) {

			// se la data della view attuale non è presente nell'array delle date...
			if (!datesArray.includes(yymmdd)) {
				// ...pusho il contatore nell'array
				countsArray.push(count);
				// ...pusho la data nell'array
				datesArray.push(yymmdd);


			} else { // altrimenti...
				// ...aumento contatore views nella posizione attuale di 1
				countsArray[countsArray.length - 1]++;
			}

		}


	};
	let totalviews = 0;
	// calcolo il totale delle views dell'array count 
	for (let i = 0; i < countsArray.length; i++) {
		totalviews = totalviews + countsArray[i]
	}
	// calcolo la media delle views
	let media = totalviews / countsArray.length;
	// massimo due decimali
	let md = media.toFixed(2);


	datesArray.push('media views per giorno');
	countsArray.push(md);

	// console.log(datesArray);
	new Chart(ctx, {
		type: 'bar',
		data: {
			labels: datesArray,
			datasets: [{
				label: 'Numero di views',
				data: countsArray,
				borderWidth: 1,
				backgroundColor: [
					'#3FA9F580',
					'#FC9E1580',
					'#E3403D80'
				]
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			},
		},
		plugins: {
			legend: {
				display: true,
				labels: {
					color: 'rgb(5, 99, 132)'
				}
			}
		}
	});
})







