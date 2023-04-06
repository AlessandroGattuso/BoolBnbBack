const ctx = document.getElementById('myChart');
console.log(views);
let newarray = [];
for (let i = 0; i < views.length; i++) {
	newarray.push(views[i].apartment_id);
};
console.log(newarray);
new Chart(ctx, {
	type: 'bar',
	data: {
		labels: newarray,
		datasets: [{
			label: '# of Votes',
			data: [12, 19, 3, 5, 2, 3],
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
