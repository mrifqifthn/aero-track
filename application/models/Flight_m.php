<?php

class Flight_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'flight';
		$this->data['primary_key']	= 'flight_id';
	}

	public function getTanggal()
	{
		$q = $this->db->query("SELECT CAST(tanggal as DATE) as tanggal FROM flight GROUP BY CAST(tanggal AS DATE)")->result();

		echo json_encode($q);
	}

	public function getFlight($tanggal)
	{
		$q = $this->db->query("SELECT aircraft_code FROM flight WHERE CAST(tanggal as DATE) = '$tanggal' AND aircraft_code != ''  GROUP BY icao24")->result();

		echo json_encode($q);
	}


	public function getIata($tanggal, $aircraft_code)
	{
		$q = $this->db->query("SELECT airline_iata FROM `flight` WHERE aircraft_code='$aircraft_code' AND CAST(tanggal as DATE) = '$tanggal' AND airline_iata != '' GROUP BY airline_iata ORDER BY tanggal asc")->result();

		echo json_encode($q);
	}

	public function getChart($tanggal, $aircraft_code, $iata)
	{
		if ($tanggal != '' && $aircraft_code != '' && $iata != '') {
			$q = $this->db->query("
			(SELECT DISTINCT(tanggal),DATE_FORMAT(tanggal,'%H:%i:%s') time,altitude,flight.* FROM `flight` WHERE aircraft_code='$aircraft_code' AND CAST(tanggal as DATE) = '$tanggal' AND airline_iata='$iata' AND altitude=0 ORDER BY tanggal DESC LIMIT 1)
				UNION ALL
			(SELECT DISTINCT(tanggal),DATE_FORMAT(tanggal,'%H:%i:%s') time,altitude,flight.* FROM `flight` WHERE aircraft_code='$aircraft_code' AND CAST(tanggal as DATE) = '$tanggal' AND airline_iata='$iata' AND altitude>0 ORDER BY tanggal asc LIMIT 59)")->result();
		} else {
			$q = [];
		}

		echo json_encode($q);
	}

	public function user()
	{
		return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function airport($id)
	{
		return $this->db->get_where('airport', ['id' => $id])->row_array();
	}

	public function select_airport()
	{
		$query = "SELECT airport.id, airport.name, airport.location FROM airport                 
                ";
		return $this->db->query($query)->result_array();
	}

	public function link($id)
	{
		$q = "SELECT link FROM airport WHERE id = '$id'                   
                ";
		$query = $this->db->query($q);
		foreach ($query->result() as $row) {
			return $row->link;
		}
		// return $this->db->query($query)->row_array();
	}

	public function code_airport($id)
	{
		$q = "SELECT code_airport FROM airport WHERE id = '$id'                   
                ";
		$query = $this->db->query($q);
		foreach ($query->result() as $row) {
			return $row->code_airport;
		}
		// return $this->db->query($q)->num_rows();
	}
}
