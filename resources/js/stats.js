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
		let count = 0;
		let sameday = 0;

		// se l'apartment id della view ciclata è = all'id dell'apartment attuale...
		if (views[i].apartment_id == aparId) {
			console.log(views[i].apartment_id);

			// se la data della view attuale non è presente nell'array delle date...
			if (!datesArray.includes(yymmdd)) {
				count++
				countsArray.push(count);
				// ...pusho la data nell'array
				datesArray.push(yymmdd);

				sameday++;

			} else { // altrimenti...
				// ...aumento contatore views
				countsArray[sameday]++;
			}

		}

		// console.log(datesArray);
		console.log(countsArray);
	};
	// console.log(datesArray);
	new Chart(ctx, {
		type: 'bar',
		data: {
			labels: datesArray,
			datasets: [{
				label: '# of Votes',
				data: countsArray,
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});
})






