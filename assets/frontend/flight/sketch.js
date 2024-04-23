const url = "https://opensky-network.org/api/states/all?lamin=-3.5247594284&lomin=103.8480387404&lamax=-2.4276253099&lomax=105.5838785842";
let mappa;
let planeMap;
let canvas;

let visible = false;

let planeImage, carImage;
let planes = [];

const toBeChecked = [RegExp(/^LUA\d*/), RegExp(/^WLDLIFE\d*/), RegExp(/^DFS\d*/), RegExp(/^RM\d*/), RegExp(/^SIPO\d*/), RegExp(/^V\d*/), RegExp(/^FRA\d*/), RegExp(/^EL\d*/), RegExp(/^APT\d*/), RegExp(/^LEOS\d*/), RegExp(/^FF\d*/), RegExp(/^FR\d*/)];

function setup() {
  canvas = createCanvas(1250, 500);
  //canvas = createCanvas(window.innerWidth, 400);
  canvas.parent("mapPlane");
  angleMode(DEGREES);

  mappa = new Mappa("Leaflet");
  planeMap = mappa.tileMap({
    lat: center_lat,
    lng: center_lng,
    minZoom: 4,
    zoom: 9,
    style: "http://{s}.tile.osm.org/{z}/{x}/{y}.png",
  });
  planeMap.overlay(canvas);
  getData();
  setInterval(getData, 5000);
}

const getData = async () => {
  visible = true;

  $.get({
    url: base_url + "frontend/home/get_data/" + id,
    success: function (data) {
      data = JSON.parse(data);
      let keyObject = Object.keys(data);
      if (keyObject.length > 2) {
        planes = [];
        for (var i = 2; i < keyObject.length; i++) {
          let objData = data[keyObject[i]];
          passtoDB(objData);
          planes.push(new Plane(objData));
        }
      }
    }
  });

};


function passtoDB(data) {
  $.post({
    url: base_url + 'frontend/home/create/' + id,
    data: { pesawat: JSON.stringify(data) },
    success: function (data) {
    }
  });
}

function draw() {
  clear();
  if (visible) {
    for (const plane of planes) {
      plane.show();
    }

    // const pos1 = planeMap.latLngToPixel(-4.604277, 118.937654);
    // const pos2 = planeMap.latLngToPixel(-4.604277, 120.170854);
    // const pos3 = planeMap.latLngToPixel(-5.514977, 120.170854);
    // const pos4 = planeMap.latLngToPixel(-5.514977, 118.937654);

    // const pos1 = planeMap.latLngToPixel(0.918139, 100.828653);
    // const pos2 = planeMap.latLngToPixel(0.918139, 102.061853);
    // const pos3 = planeMap.latLngToPixel(0.007439, 102.061853);
    // const pos4 = planeMap.latLngToPixel(0.007439, 100.828653);

    const pos1 = planeMap.latLngToPixel(lat1, lng1);
    const pos2 = planeMap.latLngToPixel(lat1, lng2);
    const pos3 = planeMap.latLngToPixel(lat2, lng2);
    const pos4 = planeMap.latLngToPixel(lat2, lng1);

    push();
    strokeWeight(2);
    stroke(255, 0, 0);
    line(pos1.x, pos1.y, pos2.x, pos2.y);
    line(pos2.x, pos2.y, pos3.x, pos3.y);
    line(pos3.x, pos3.y, pos4.x, pos4.y);
    line(pos4.x, pos4.y, pos1.x, pos1.y);
    pop();
  }
}

class Plane {
  constructor(states) {
    this.states = states;
  }

  show() {
    const callsign = this.states[16];
    const pos = planeMap.latLngToPixel(this.states[1], this.states[2]);
    const on_ground = this.states[14];
    const dir = this.states[3];
    //const dir = this.states[10]; // True track in decimal degrees clockwise from north (north=0°). Can be null.
    //const spi = this.states[15]; // Whether flight status indicates special purpose indicator.
    push();
    translate(pos.x, pos.y);
    if (callsign !== "") {
      text(callsign, 24, 13);
      beginShape();
      stroke(0);
      strokeWeight(1);
      noFill();
      vertex(cos(45) * 12, sin(135) * 12);
      vertex(20, 15);
      vertex(80, 15);
      endShape();
      strokeWeight(0.2);
      fill(0);
      rotate(dir);
      imageMode(CENTER);
      if (checkCallsign(callsign)) {
        image(carImage, 0, 0, 13, 23);
      } else {
        if (!on_ground) {
          tint(0, 255, 0);
        } else {
          tint(199, 21, 133);
        }
        //if (spi) tint(199, 21, 133);
        image(planeImage, 0, 0, 30, 30);
      }
    } else {
      tint(255, 0, 0);
      rotate(dir);
      imageMode(CENTER);
      image(planeImage, 0, 0, 30, 30);
    }
    pop();
  }
}

function checkCallsign(callsign) {
  /*for (const elt of toBeChecked) {
    if (elt.test(callsign)) return true;
  }
  return false;*/

  return false;
}
