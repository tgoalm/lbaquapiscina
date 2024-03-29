<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Contatos</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,300italic,400,700%7CArvo:400,700">
    <link rel="stylesheet" href="css/style.css">
		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
		<![endif]-->
  </head>
  <body>
    <div class="page">
      <main class="page-content" id="perspective">
        <div class="content-wrapper">
          <div class="page-header page-header-perspective">
            <div class="page-header-left"><a class="brand" href="index.php"><img src="images/logo.png" alt="" width="75" height="75"/></a></div>
          </div>
          <div id="wrapper">
            <div class="page-title">
              <div class="page-title-content">
                <div class="shell">
                  <p class="page-title-header">Contatos</p>
                </div>
              </div>
            </div>
            <section class="box-wrap box-wrap-md bg-white">
              <div class="box-wrap-map">
                <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                  <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                  var setting = {"height":window.screen.height-350,"width":window.screen.width,"zoom":14,"queryString":"Rua Salvador Dali, 150 - Pedreira, São Paulo - SP, Brasil","place_id":"ChIJpVP6cZ5FzpQREuKVcgHIC5Y","satellite":false,"centerCoord":[-23.709516206974108,-46.655474649999995],"cid":"0x960bc8017295e212","lang":"pt","cityUrl":"/brazil/sao-paulo","cityAnchorText":"","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"899250"};
                  var d = document;
                  var s = d.createElement('script');
                  s.src = 'https://1map.com/js/script-for-user.js?embed_id=899250';
                  s.async = true;
                  s.onload = function (e) {
                    window.OneMap.initMap(setting)
                  };
                  var to = d.getElementsByTagName('script')[0];
                  to.parentNode.insertBefore(s, to);
                })();</script><a href="https://1map.com/pt/map-embed">1 Map</a>
                </div>
              </div>
              <div class="box-wrap-content">
                <div class="shell">
                  <div class="range">
                    <div class="cell-xs-12">
                      <div class="box-contacts box-contacts-horizontal box-wrap-content-interactive">
                        <div class="box-contacts-col">
                          <div class="box-contacts-block">
                            <h3>Endereço</h3>
                            <address">Rua Salvador Dali, 150 - Jardim Apurá</address>
                          </div>         
                        </div>
                        <div class="box-contacts-col box-contacts-right">
                          <div class="box-contacts-block">
                              <h3>Fale Conosco</h3>
                              <p>Informe seu nome e telefone que entraremos em contato com você.</p>
                              <?php
                              $nome = $_POST['name'];
                              $telefone = $_POST['phone'];
                              $email = $_POST['email'];
                              $mensagem = $_POST['message'];
                              ?>
                              <form method="post" name="dados" action="">
                                  <div class="form-group form-wrap">
                                      <label class="form-label-outside" for="contact-full-name">Nome
                                          completo</label>
                                      <input class="form-control" id="contact-full-name" type="text"
                                             name="name" required>
                                  </div>
                                  <div class="form-group form-wrap">
                                      <label class="form-label-outside" for="contact-phone">Telefone</label>
                                      <input class="form-control" id="contact-phone" type="text" name="phone" required>
                                  </div>
                                  <div class="form-group form-wrap">
                                      <label for="contact-email" class="form-label-outside">E-Mail</label>
                                      <input id="contact-email" type="email" name="email" class="form-input form-control" required>
                                  </div>
                                  <div class="form-group form-wrap">
                                      <label for="contact-message" class="form-label-outside">Mensagem</label>
                                      <textarea id="contact-message" name="message"
                                                class="form-input form-control"></textarea>
                                  </div>
                                  <button class="btn btn-sm btn-primary btn-block btn-circle" type="submit""
                                          style="width: auto">SOLICITAR CONTATO
                                  </button>
                                  <?php

                                  use PHPMailer\PHPMailer\PHPMailer;
                                  use PHPMailer\PHPMailer\SMTP;
                                  use PHPMailer\PHPMailer\Exception;

                                  require 'vendor/autoload.php';

                                  $mail = new PHPMailer(true);
                                  try {
                                      date_default_timezone_set('America/Sao_Paulo');
                                      $data = date('d/m/Y H:i:s');
                                      //
                                      //Conteúdo
                                      $mail->isHTML(true);
                                      $mail->Subject = 'Contato';
                                      $mail->Body = "Cliente solictou contato em $data.<br>
                                                    Seguem dos dados de contato:<br>
                                                    <ul>
                                                        <li><b>Nome:</b> $nome</li>
                                                        <li><b>Telefone:</b> $telefone</li>
                                                        <li><b>E-mail:</b> $email</li>
                                                        <li><b>Assunto:</b> $mensagem</li>
                                                    </ul>";


                                      $mail->send();

                                      echo "A mensagem foi enviada com sucesso.";
                                  } catch (Exception $exception) {
                                      echo "A mensagem não pode ser enviada. Erro: {$mail->ErrorInfo}";
                                  }
                                  ?>
                              </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <section>
              <footer class="page-footer page-footer-default">
                <div class="shell">
                  <div class="range range-xs-center">
                    <div class="cell-lg-10"><a class="brand" href="index.php"><img src="images/logo.png" alt="" width="75" height="75"/></a>
                      <div class="text-highlighted-wrap">
                        <p class="text-highlighted">Limpeza e manutençao de piscinas em São Paulo e litoral. Aproveite cada momento de lazer.
                      </div>
                      <ul class="footer-navigation footer-navigation-horizontal">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.html">Sobre nós</a></li>
                        <li class="active"><a href="services.html">Serviços</a></li>
                        <li><a href="contacts-1.html">Contatos</a></li>
                      </ul>
                      <div class="divider divider-small divider-light block-centered"></div>
                      <ul class="inline-list inline-list-md">
                        <li><a class="icon icon-xs link-gray-base fa-instagram" href="https://www.instagram.com/lb_aquaa/"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </footer>
            </section>
          </div>
          <div id="perspective-content-overlay"></div>
        </div>
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-sidebar" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-sidebar" data-stick-up-clone="false">
            <div class="rd-navbar-inner">
              <div class="rd-navbar-panel">
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <div class="rd-navbar-brand"><a class="brand-name" href="index.php"><img src="images/logo.png" alt="" width="75" height="75"/></a></div>
              </div>
              <div class="rd-navbar-nav-wrap">
                <div class="rd-navbar-nav-inner">
                  <ul class="rd-navbar-nav">
                    <ul class="footer-navigation footer-navigation-horizontal">
                      <li><a href="index.php">Home</a></li>
                      <li><a href="about.html">Sobre nós</a></li>
                      <li class="active"><a href="services.html">Serviços</a></li>
                      <li><a href="contacts-1.html">Contatos</a></li>
                    </ul>
                  </ul>
                  <div class="rd-navbar-nav-footer">
                    <ul class="inline-list inline-list-md">
                      <li><a class="icon icon-xs link-gray-base fa-instagram" href="https://www.instagram.com/lb_aquaa/"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </main>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
            <button class="pswp__button pswp__button--share" title="Share"></button>
            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__cent"></div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>