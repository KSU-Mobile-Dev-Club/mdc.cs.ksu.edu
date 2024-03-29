<?php
function request($url)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            "User-Agent: KSU-Mobile-Dev-Club"
        ),
    ));
    $results = json_decode(curl_exec($curl));
    curl_close($curl);
    return $results;
}

$projects = request('https://api.github.com/orgs/KSU-Mobile-Dev-Club/repos');
?>
<!DOCTYPE HTML>
<!--
Fractal by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
  <title>K-State MDC</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="The official website for the K-State Mobile Development Club.">
  <meta name="author" content="K-State Mobile Development Club">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="apple-touch-icon-precomposed" href="favicon.ico" />
  <!--[if lte IE 8]><script src="js/ie/html5shiv.js"></script><![endif]-->
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/styles.css" />
  <!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
  <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
</head>
<body id="top">
  <header id="header">
    <div class="content">
      <h1><a href="/">K-State MDC</a></h1>
      <p>K-State Mobile Development Club<br />
        Wednesdays @ 6:00pm in DUE 1117 <br /></p>
        <ul class="actions">
          <li><a href="https://orgcentral.k-state.edu/feeds?type=club&type_id=35679&tab=about" target="_blank" class="button special icon fa-external-link">OrgCentral</a></li>
          <li><a href="#projects" class="button icon fa-chevron-down scrolly">Learn More</a></li>
        </ul>
      </div>
      <div class="image phone"><div class="inner"><img src="images/ios.jpg" alt="The Mobile Development Club Logo displayed on a stylized phone" /></div></div>
    </header>
    <section id="projects" class="wrapper">
      <header class="major"><h2>Our Projects</h2></header>
        <?php foreach (array_reverse($projects) as $project) { ?>
        <section class="project">
          <div class="content">
            <h3><a href="<?= $project->html_url; ?>" target="_blank"><?= $project->name ?></a></h3>
            <?php $date = new dateTime($project->pushed_at); ?>
            <div class="info">
                <?php if ($project->language != "") { ?>
                <span><?= $project->language ?></span>
                <?php } else { ?>
                <span class="null"></span>
                <?php } ?>
              <span class="updated">Updated on <?= $date->format('F d, Y'); ?></span>
            </div>
            <p><?php if ($project->description != null) echo $project->description; ?></p>
          </div>
        </section>
        <?php } ?>
    </section>
    <section id="officers" class="wrapper">
      <header class="major"><h2>MDC Officers</h2></header>
      <section class="officer">
        <div class="image"><img src="images/awbooze.jpg" alt="A headshot of Andrew Booze" /></div>
        <div class="content">
          <h3>Andrew Booze</h3>
          <h4>President (2021-2022)</h4>
        </div>
      </section>
      <section class="officer">
        <div class="image"><img src="images/default.jpg" alt="The placeholder headshot" /></div>
        <div class="content">
          <h3>Jack Pleimann</h3>
          <h4>Vice President (2021-2022)</h4>
        </div>
      </section>
      <section class="officer">
        <div class="image"><img src="images/mneilsen.jpg" alt="A headshot of Dr. Neilsen" /></div>
        <div class="content">
          <h3>Dr. Mitch Neilsen</h3>
          <h4>Advisor</h4>
        </div>
      </section>
    </section>
    <footer id="footer">
      <a href="mailto:ksumdc@ksu.edu">ksumdc@ksu.edu</a>
      <p class="copyright">&copy; <?= date('Y') ?> Kansas State Mobile Development Club. Design: <a href="http://html5up.net" target="_blank">HTML5 UP</a></p>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.scrolly.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/util.js"></script>
    <!--[if lte IE 8]><script src="js/ie/respond.min.js"></script><![endif]-->
    <script src="js/main.js"></script>
  </body>
  </html>
