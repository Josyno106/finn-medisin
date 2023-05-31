<?php

require_once(__DIR__ . '/vendor/autoload.php');

$credentials = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(new GuzzleHttp\Client(),$credentials);

$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
     'subject' => 'from the PHP SDK!',
     'sender' => ['name' => 'Sendinblue', 'email' => 'contact@sendinblue.com'],
     'replyTo' => ['name' => 'Sendinblue', 'email' => 'joshuanderi@gmail.com'],
     'to' => [[ 'name' => 'Max Mustermann', 'email' => 'joshuanderi@gmail.com']],
     'htmlContent' => '<html><body><h1>This is a transactional email {{params.bodyMessage}}</h1></body></html>',
     'params' => ['bodyMessage' => 'made just for you!']
]);

try {
    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    print_r($result);
} catch (Exception $e) {
    echo $e->getMessage(),PHP_EOL;
}

?>
<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="keywords"
      content="finn, medisin, legemiddel, legemiddelmangel, lagerstatus"
    />
    <meta
      name="description"
      content="Hjemmeside for å finne medisiner på norske apotek"
    />
    <meta
      name="author"
      content="Patrik Oskar Graff, Iselin Sannes Stridsklev, Almin Dacic, Joachim Nyland Andersen, Sindre Rødne"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hjemmeside</title>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/about.css" />
    <link
      rel="icon"
      type="image/x-icon"
      href="../BOP3000/Logo/fm_favicon.ico"
    />
    <link
      id=""
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i"
    />
    <script></script>
  </head>
  <body>
    <?php include 'php/header.php';?>

    <!-- Seksjon 1 Beskrivelse -->
    <section class="section1_3">
      <div class="sec1_3_placement_outer">
        <div class="sec1_3_placement_inner_o">
          <div class="sec1_3_placement_inner_i">
            <h2>Om oss</h2>
            <p>
              Paragraph. Lorem ipsum dolor sit amet, consectetur adipiscing
              elit. Curabitur id suscipit ex. Suspendisse rhoncus laoreet purus
              quis elementum. Phasellus sed efficitur dolor, et ultricies
              sapien. Quisque fringilla sit amet dolor commodo efficitur.
              Aliquam et sem odio. In ullamcorper nisi nunc, et molestie ipsum
              iaculis sit amet.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Seksjon 2 Grafer -->
    <section class="section2_3">
      <div class="sec2_3_placement_outer">
        <div class="sec2_3_placement_inner">
          <ul role="tablist">
            <li role="presentation">
              <a
                href="#sec1_3_tab1"
                id="link_sec1_3_tab1"
                aria-controls="sec1_3_tab1"
                aria-selected="true"
                >Legemiddelmangel utvikling</a
              >
            </li>
            <li role="presentation">
              <a
                href="#sec1_3_tab2"
                id="link_sec1_3_tab2"
                aria-controls="sec1_3_tab2"
                aria-selected="false"
                >Legemiddelmangel i Europa</a
              >
            </li>
            <li role="presentation">
              <a
                href="#sec1_3_tab3"
                id="link_sec1_3_tab3"
                aria-controls="sec1_3_tab3"
                aria-selected="false"
                >Vårt bidrag</a
              >
            </li>
          </ul>
          <div class="sec2_3_tab_content_outer">
            <!-- Tab1 -->
            <div
              class="sec2_3_tab_content_inner_o"
              role="tabpanel"
              aria-labelledby="link_sec1_3_tab1"
            >
              <div id="sec1_3_tab1" class="sec2_3_tab_content_inner_i">
                <img src="Pictures/pic123.png" alt="" />
              </div>
            </div>
            <!-- Tab2 -->
            <div
              class="sec2_3_tab_content_inner_o"
              role="tabpanel"
              aria-labelledby="link_sec1_3_tab2"
            >
              <div id="sec1_3_tab2" class="sec2_3_tab_content_inner_i">
                <img src="Pictures/pic231.png" alt="" />
              </div>
            </div>
            <!-- Tab3 -->
            <div
              class="sec2_3_tab_content_inner_o"
              role="tabpanel"
              aria-labelledby="link_sec1_3_tab3"
            >
              <div id="sec1_3_tab3" class="sec2_3_tab_content_inner_i">
                <img src="Pictures/pic312.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer-style">
      <div class="footer_placement">
        <p>
          finnmedisin.no &copy; 2023<br />Nettsiden benytter
          <a href="">informasjonskapsler</a>
        </p>
      </div>
      <button>Til toppen</button>
    </footer>
  </body>
</html>
