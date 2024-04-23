<?php
defined('BASEPATH') or exit('No direct script allowed');
header('Access-Control-Allow-Origin: *');
class Home extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->module = 'frontend';
		$this->load->model('flight_m');
	}

	public function home()
	{
		redirect('frontend/home/index/1');
	}

	public function index($id)
	{
		// if (!$this->session->userdata('email')) {
		// 	redirect('auth');
		// }

		$data['title']    = 'Home';
		$data['content']  = 'home';
		if (!$this->session->userdata('email')) {
			$data['user'] = array("name" => "User");
		} else {
			$data['user'] = $this->flight_m->user();
		}
		$data['airport'] = $this->flight_m->airport($id);
		$data['airport_select'] = $this->flight_m->select_airport();
		$this->load->view('frontend/layouts/header');
		$this->load->view('frontend/home', $data);
		$this->load->view('frontend/layouts/footer');
		// $this->template($this->data, $this->module);
	}

	public function get_data($id)
	{
		$url = $this->flight_m->link($id);
		$curl = curl_init();
		curl_setopt_array($curl, array(
			// CURLOPT_URL => 'https://data-live.flightradar24.com/zones/fcgi/feed.js?bounds=-4.604277,-5.514977,118.937654,120.170854',
			// CURLOPT_URL => 'https://data-live.flightradar24.com/zones/fcgi/feed.js?bounds=0.918139,0.007439,100.828653,102.061853',
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
	}

	public function create($id)
	{
		$code = $this->flight_m->code_airport($id);
		$pesawat = json_decode($this->post('pesawat'));
		if ($pesawat[12] == $code || ($pesawat[11] == $code)) {
			$data = [
				'icao24' => $pesawat[0],
				'latitude' => $pesawat[1],
				'longitude' => $pesawat[2],
				'heading' => $pesawat[3],
				'altitude' => $pesawat[4],
				'ground_speed' => $pesawat[5],
				'squawk' => $pesawat[6],
				'radar' => $pesawat[7],
				'aircraft_code' => $pesawat[8],
				'registration' => $pesawat[9],
				'time' => $pesawat[10],
				'departure' => $pesawat[11],
				'destination' => $pesawat[12],
				'number' => $pesawat[13],
				'airline_iata' => $pesawat[13],
				'on_ground' => $pesawat[14],
				'vertical_speed' => $pesawat[15],
				'callsign' => $pesawat[16],
				'airline_icao' => $pesawat[18]
			];
			// $insert = $this->flight_m->insert($data);
			if ($insert['sts'] == '1') {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			echo json_encode($insert);
		}
	}

	public function select()
	{
		$id =  $this->input->post("id");
		redirect("frontend/home/index/$id");
	}

	public function getTanggal()
	{
		$this->flight_m->getTanggal();
	}

	public function getFlight()
	{
		$tanggal = $this->get('tanggal');

		$this->flight_m->getFlight($tanggal);
	}

	public function getIata()
	{
		$tanggal = $this->get('tanggal');
		$aircraft_code = $this->get('aircraft_code');

		$this->flight_m->getIata($tanggal, $aircraft_code);
	}

	public function getChart()
	{
		$tanggal = $this->get('tanggal');
		$aircraft_code = $this->get('aircraft_code');
		$iata = $this->get('iata');

		$this->flight_m->getChart($tanggal, $aircraft_code, $iata);
	}
}
