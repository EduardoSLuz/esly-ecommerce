<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style type="text/css">

    * {
      margin:0;
      padding:0;
      font-family: Helvetica, Arial, sans-serif;
    }
  
    img {
      max-width: 100%;
      outline: none;
      text-decoration: none;
      -ms-interpolation-mode: bicubic;
    }
  
    .image-fix {
      display:block;
    }
  
    .collapse {
      margin:0;
      padding:0;
    }
  
    body {
      -webkit-font-smoothing:antialiased;
      -webkit-text-size-adjust:none;
      width: 100%!important;
      height: 100%;
      text-align: center;
      color: #747474;
      background-color: #ffffff;
    }
  
    h1,h2,h3,h4,h5,h6 {
      font-family: Helvetica, Arial, sans-serif;
      line-height: 1.1;
    }
  
    h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
      font-size: 60%;
      line-height: 0;
      text-transform: none;
    }
  
    h1 {
      font-weight:200;
      font-size: 44px;
    }
  
    h2 {
      font-weight:200;
      font-size: 32px;
      margin-bottom: 14px;
    }
  
    h3 {
      font-weight:500;
      font-size: 27px;
    }
  
    h4 {
      font-weight:500;
      font-size: 23px;
    }
  
    h5 {
      font-weight:900;
      font-size: 17px;
    }
  
    h6 {
      font-weight:900;
      font-size: 14px;
      text-transform: uppercase;
    }
  
    .collapse {
      margin:0!important;
    }
  
    td, div {
      font-family: Helvetica, Arial, sans-serif;
      text-align: center;
    }
  
    p, ul {
      margin-bottom: 10px;
      font-weight: normal;
      font-size:14px;
      line-height:1.6;
    }
  
    p.lead {
      font-size:17px;
    }
  
    p.last {
      margin-bottom:0px;
    }
  
    ul li {
      margin-left:5px;
      list-style-position: inside;
    }
  
    a {
      color: #747474;
      text-decoration: none;
    }
  
    a img {
      border: none;
    }
  
    .head-wrap {
      width: 100%;
      margin: 0 auto;
      background-color: #f9f8f8;
      border-bottom: 1px solid #d8d8d8;
    }
  
    .head-wrap * {
      margin: 0;
      padding: 0;
    }
  
    .header-background {
      background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
    }
  
    .header {
      height: 42px;
    }
  
    .header .content {
      padding: 0;
    }
  
    .header .brand {
      font-size: 16px;
      line-height: 42px;
      font-weight: bold;
    }
  
    .header .brand a {
      color: #464646;
    }
  
    .body-wrap {
      width: 505px;
      margin: 0 auto;
      background-color: #ffffff;
    }
  
    .soapbox .soapbox-title {
      font-size: 21px;
      color: #464646;
      padding-top: 35px;
    }
  
    .content .status-container.single .status-padding {
      width: 80px;
    }
  
    .content .status {
      width: 90%;
    }
  
    .content .status-container.single .status {
      width: 300px;
    }
  
    .status {
      border-collapse: collapse;
      margin-left: 15px;
      color: #656565;
    }
  
    .status .status-cell {
      border: 1px solid #b3b3b3;
      height: 50px;
    }
  
    .status .status-cell.success,
    .status .status-cell.active {
      height: 65px;
    }
  
    .status .status-cell.success {
      background: #f2ffeb;
      color: #51da42;
    }
  
    .status .status-cell.success .status-title {
      font-size: 15px;
    }
  
    .status .status-cell.active {
      background: #fffde0;
      width: 135px;
    }
  
    .status .status-title {
      font-size: 16px;
      font-weight: bold;
      line-height: 23px;
    }
  
    .status .status-image {
      vertical-align: text-bottom;
    }
  
    .body .body-padded,
    .body .body-padding {
      padding-top: 34px;
    }
  
    .body .body-padding {
      width: 41px;
    }
  
    .body-padded,
    .body-title {
      text-align: left;
    }
  
    .body .body-title {
      font-weight: bold;
      font-size: 17px;
      color: #464646;
    }
  
    .body .body-text .body-text-cell {
      text-align: left;
      font-size: 14px;
      line-height: 1.6;
      padding: 9px 0 17px;
    }
  
    .body .body-text-cell a {
      color: #464646;
      text-decoration: underline;
    }
  
    .body .body-signature-block .body-signature-cell {
      padding: 25px 0 30px;
      text-align: left;
    }
  
    .body .body-signature {
      font-family: "Comic Sans MS", Textile, cursive;
      font-weight: bold;
    }
  
    .footer-wrap {
      width: 100%;
      margin: 0 auto;
      clear: both !important;
      background-color: #e5e5e5;
      border-top: 1px solid #b3b3b3;
      font-size: 12px;
      color: #656565;
      line-height: 30px;
    }
  
    .footer-wrap .container {
      padding: 14px 0;
    }
  
    .footer-wrap .container .content {
      padding: 0;
    }
  
    .footer-wrap .container .footer-lead {
      font-size: 14px;
    }
  
    .footer-wrap .container .footer-lead a {
      font-size: 14px;
      font-weight: bold;
      color: #535353;
    }
  
    .footer-wrap .container a {
      font-size: 12px;
      color: #656565;
    }
  
    .footer-wrap .container a.last {
      margin-right: 0;
    }
  
    .footer-wrap .footer-group {
      display: inline-block;
    }
  
    .container {
      display: block !important;
      max-width: 505px !important;
      clear: both !important;
    }
  
    .content {
      padding: 0;
      max-width: 505px;
      margin: 0 auto;
      display: block;
    }
  
    .content table {
      width: 100%;
    }
  
  
    .clear {
      display: block;
      clear: both;
    }
  
    table.full-width-gmail-android {
      width: 100% !important;
    }
  
    </style>
  
    <style type="text/css" media="only screen">
  
    @media only screen {
  
      table[class*="head-wrap"],
      table[class*="body-wrap"],
      table[class*="footer-wrap"] {
        width: 100% !important;
      }
  
      td[class*="container"] {
        margin: 0 auto !important;
      }
  
    }
  
    @media only screen and (max-width: 505px) {
  
      *[class*="w320"] {
        width: 320px !important;
      }
  
      table[class="soapbox"] td[class*="soapbox-title"],
      table[class="body"] td[class*="body-padded"] {
        padding-top: 24px;
      }
    }
    </style>
</head>
  
  <body style="background-color: #ffffff;">
  
    <div style="text-align: center;">
      <table class="body-wrap" style="background-color: #f9f8f8;border: 0;" cellpadding="0" cellspacing="0">
        <tr>
          <td style="background-color: #32a1ce;" width="100%" height="8" valign="top">
            <div height="8">
            </div>
          </td>
        </tr>
        <tr class="header-background">
          <td class="header container" style="text-align: center;">
            <div class="content" style="text-align: center;">
              <span class="brand">
                <a href="#">
                  <?php echo htmlspecialchars( $store["nameStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> E-Commerce
                </a>
              </span>
            </div>
          </td>
        </tr>
      </table>
  
      <table class="body-wrap w320">
        <tr>
          <td></td>
          <td class="container">
            <div class="content">
              <table cellspacing="0">
                <tr>
                  <td>
                    <table class="soapbox">
                      <tr>
                        <td class="soapbox-title">Recuperação de Senha</td>
                      </tr>
                    </table>
                    <table class="body">
                      <tr>
                        <td class="body-padding"></td>
                        <td class="body-padded">
                          <div class="body-title">Olá <?php echo htmlspecialchars( $name, ENT_COMPAT, 'UTF-8', FALSE ); ?>,</div>
                          <table class="body-text">
                            <tr>
                              <td class="body-text-cell">
                                Para redefinir a sua senha acesse o link <a href="<?php echo htmlspecialchars( $link, ENT_COMPAT, 'UTF-8', FALSE ); ?>">aqui</a>.
                              </td>
                            </tr>
                          </table>
                          <div>
                            <a style="cursor: pointer;padding: 10px;border-radius: 10px;background-color: #32a1ce;border-color: #32a1ce;color: white;" href="<?php echo htmlspecialchars( $link, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i>Redefinir Senha</i></a></div>
                          <table class="body-signature-block">
                            <tr>
                              <td class="body-signature-cell">
                                <p>Obrigado!</p>
                                <p class="body-signature"><img src="http://<?php echo htmlspecialchars( $store["HTTP"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/resources/clients/<?php echo htmlspecialchars( $store["nameBase"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/imgs/logo.png" alt="Logo"></p>
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td class="body-padding"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </div>
          </td>
          <td></td>
        </tr>
      </table>
  
      <table class="body-wrap " style="background-color: #e5e5e5;">
        <tr>
          <td></td>
          <td class="container">
            <div class="content">
              <span class="footer-group">
                <?php if( count($store["social"]) > 0 ){ ?>

                <?php $counter1=-1;  if( isset($store["social"]) && ( is_array($store["social"]) || $store["social"] instanceof Traversable ) && sizeof($store["social"]) ) foreach( $store["social"] as $key1 => $value1 ){ $counter1++; ?>

                <a href="<?php echo htmlspecialchars( $value1["linkSocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nameSocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?> | </a>
                <?php } ?>

                <?php } ?>

                <a href="https://astemac.com.br">Astemac</a>
              </span>
            </div>
          </td>
          <td></td>
        </tr>
      </table>
    </div>
</body>
</html>
