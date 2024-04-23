$(function () {
	getTanggal();
});

function getTanggal() {
	$.get({
		url: base_url + "frontend/home/getTanggal",
		success: function (data) {
			data = JSON.parse(data);
			let htm = '';
			htm += `<option value="">--Tanggal--</option>`;
			for (i in data) {
				htm += `<option value="` + data[i].tanggal + `">` + data[i].tanggal + `</option>`;
			}
			$("#set-tanggal").html(htm);
		}
	});
}

$("#set-tanggal").change(function () {
	let tanggal = $(this).val(),
		flight = $("#set-flight").val(),
		iata = $("#set-iata").val();

	$("#set-flight").val('');
	$("#set-iata").val('');
	getFlight(tanggal);
});


$("#set-flight").change(function () {
	let flight = $(this).val(),
		tanggal = $("#set-tanggal").val(),
		iata = $("#set-iata").val();

	$("#set-iata").val('');
	getIata(tanggal, flight);
});

$("#set-iata").change(function () {
	let iata = $(this).val(),
		tanggal = $("#set-tanggal").val(),
		flight = $("#set-flight").val();

	if (flight != '' && tanggal != '' && iata != '') {
		getChart(tanggal, flight, iata);
	}
});

function getFlight(tanggal) {
	$.get({
		url: base_url + "frontend/home/getFlight",
		data: { tanggal: tanggal },
		success: function (data) {
			data = JSON.parse(data);
			console.log(data);
			let htm = '';
			htm += `<option value="">-- Aircraft --</option>`;
			for (i in data) {
				htm += `<option value="` + data[i].aircraft_code + `">` + data[i].aircraft_code + `</option>`;
			}
			$("#set-flight").html(htm);
		}
	});
}

function getIata(tanggal, aircraft_code) {
	$.get({
		url: base_url + "frontend/home/getIata",
		data: { tanggal: tanggal, aircraft_code: aircraft_code },
		success: function (data) {
			data = JSON.parse(data);
			console.log(data);
			let htm = '';
			htm += `<option value="">-- Maskapai --</option>`;
			for (i in data) {
				htm += `<option value="` + data[i].airline_iata + `">` + data[i].airline_iata + `</option>`;
			}
			$("#set-iata").html(htm);
		}
	});
}

function getChart(tanggal, aircraft_code, iata) {
	$.get({
		url: base_url + "frontend/home/getChart",
		data: { tanggal: tanggal, aircraft_code: aircraft_code, iata: iata },
		success: function (data) {
			xdata = JSON.parse(data);
			console.log([tanggal, aircraft_code, iata]);

			if (xdata.length > 0) {
				$('#chart').remove();
				$('#graph-container').append('<div id="chart"><div>');

				renderChart(data);
			}
		}
	});
}


function renderChart(data) {
	data = JSON.parse(data);
	let waktu = [];
	let no = [];
	let altitude = [];
	let start = 0;

	for (i in data) {
		start++;
		waktu.push(data[i].time);
		no.push(start);
		altitude.push(data[i].altitude);
	}
	var options = {
		chart: {
			height: 480,
			width: 480,
			type: "line",
			zoom: {
				type: "x",
				enabled: true
			},
			toolbar: {
				autoSelected: "zoom"
			}
		},
		dataLabels: {
			enabled: false,
		},
		colors: ["#FF1654"],
		series: [
			{
				name: "Series A",
				data: altitude
			},
		],
		stroke: {
			width: [1]
		},
		plotOptions: {
			bar: {
				columnWidth: "20%"
			}
		},
		xaxis: {
			categories: no
		},
		yaxis: [
			{
				axisTicks: {
					show: true
				},
				axisBorder: {
					show: true,
					color: "#247BA0"
				},
				labels: {
					style: {
						colors: "#247BA0"
					}
				},
				title: {
					text: "ALTITUDE",
					style: {
						color: "#247BA0"
					}
				}
			}
		],
		tooltip: {
			shared: false,
			intersect: true,
			x: {
				show: false
			}
		},
		legend: {
			horizontalAlign: "left",
			offsetX: 40
		}
	};

	var chart = new ApexCharts(document.querySelector("#chart"), options);

	chart.render();
}

function download() {
	const imageLink = document.createElement('a');
	const canvas = document.getElementById('chart')
	imageLink.href = canvas
	imageLink.download = 'chart.png'
	imageLink.click()
}