<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?> | Error</title>
  <link rel="stylesheet" href="<?= frontend_url()?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= frontend_url()?>css/fontawesome.min.css">
  <link rel="stylesheet" href="<?= frontend_url()?>css/animate.min.css">
  <link rel="stylesheet" href="<?= frontend_url()?>css/style.css">
</head>

<body class="gray-bg">
  <div class="middle-box animated fadeInDown">
    <div class="row">
      <div class="col-md-6 mx-auto">

        <h1 class="mt-5 text-center">Error</h1>
        <h3 class="font-bold text-center">Silahkan Aktifkan Fitur Notifikasi</h3>

        <div class="alert alert-danger text-center">
          Mohon maaf, website kami mengharuskan anda untuk mengizinkan fitur notifikasi browser.
          <br>
        </div>
        <div class="alert alert-warning text-center mt-5">
          <b>Silahkan untuk melihat Tutorial dibawah ini.</b>
        </div>


        <b>Chrome</b>
        <ul>
          <li>Open Chrome and navigate to: chrome://settings/content</li>
          <li>Scroll down and click on the Notifications bar</li>
          <li>Find the URL of the site you would like to allow or block and select the desired option. You can also change your global notification settings here by clicking on the toggle at the top of the page (default is “Ask before sending”)</li>
        </ul>

        <b>Chrome for Android</b>
        <ul>
          <li>Open the Chrome app and select the vertical elipses icon in the top-right corner of the screen</li>
          <li>Select the “Settings” option from the dropdown menu</li>
          <li>Select the “Site settings” option</li>
          <li>Select the “Notifications” option</li>
          <li>Here you can select a domain and either enable or disable notifications from that domain</li>
        </ul>

        <b>Firefox</b>
        <ul>
          <li>Open Firefox and navigate to: about:preferences</li>
          <li>Depending on your version of Firefox, you may need to select the “Content” tab choice. In the latest Firefox, click on the “Privacy and Security” tab instead</li>
          <li>Scroll to where it says “Notifications” and click the “Settings” button</li>
          <li>A menu will pop up where you can change the settings for various domains</li>
        </ul>

        <b>Microsoft Edge</b>
        <ul>
          <li>Open Edge and select the “...” button in the top-right corner of the browser window</li>
          <li>Scroll down and select the “Settings” option from the dropdown menu</li>
          <li>Scroll down and select the “Advanced Settings” option from the dropdown menu</li>
          <li>Scroll down and select the “Manage” button under the “Website Permissions” heading</li>
          <li>Here you can select a domain and either enable or disable notifications from that domain</li>
        </ul>

        <b>Safari</b>
        <ul>
          <li>Select “Safari” in the action bar at the top of the screen and select “Preferences”</li>
          <li>Click on the “Websites” tab and then select “Notifications” in the menu on the left-side of the preferences window</li>
          <li>Here you can select a domain and either enable or disable notifications from that domain</li>
        </ul>

        <div class="form-group text-center">
          <br>
          <div class="alert alert-info"> Jika sudah selesai silahkan menekan tombol dibawah ini</div>
          <a href="<?= base_url()?>" class="btn btn-primary text-white">Go Back</a>
        </div>

      </div>
    </div>
  </div>
  <script src="<?= frontend_url()?>js/jquery.min.js"></script>
  <script src="<?= frontend_url()?>js/popper.min.js"></script>
  <script src="<?= frontend_url()?>js/bootstrap.min.js"></script>
</body>
</html>