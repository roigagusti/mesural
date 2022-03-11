<?php
require('conexion.php');

function token($longitud) {
  $key = '';
  $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $max = strlen($pattern)-1;
  for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
  return $key;
}
$token = token(64);
$database->update("users", [
  "token" => $token
  ], ["email" => $to]);

$subject = "Recuperar password Mesural";
$body = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
  <style>
  body{
    background-color:#e6e6e6;
  }
  .header{
    /*background-color:#303f9f;*/
    background-color:#a00000;
    margin: 0 auto
  }
  .header-content, .content-content, .footer-content{
    margin: 0 auto;
  }
  .logo{
    display:block;
    line-height:0;
    font-size:0;
    border:0;
  }
  .icon-center{
    fill:#e2b2b2;
  }
  .main-text{
    color:#fff;
    font-size: 30px;
    font-weight: 700;
    font-family: lato, Helvetica, sans-serif;
    mso-line-height-rule: exactly;
  }
  .date-text{
    color: #ffffff;
    font-size: 12px;
    font-weight: 300;
    font-family: lato, Helvetica, sans-serif;
    mso-line-height-rule: exactly;
  }
  .content{
    margin: 0 auto;
    background-color: #fff;
    color: #333;
    font-size: 15px;
    line-height: 1.5;
    font-weight: 500;
    font-family: lato, Helvetica, sans-serif;
    mso-line-height-rule: exactly;
  }
  .cta-activate{
    /*background-color:#303f9f;*/
    background-color:#a00000;
    border-radius:4px;
  }
  .cta-activate a{
    text-decoration:none;
    color:#fff;
  }
  .btn-cta{
    background-color:#a00000;
    border-radius:4px;
    color:#fff;  	
  }
  .footer{
    margin: 0 auto;
    background-color:#e6e6e6;
  }
  .footer-text{
    color:#999;
    font-size:12px;
    line-height:1.5;
    font-weight:400;
    font-family:lato, Helvetica, sans-serif;
    mso-line-height-rule: exactly;
  }
  .footer-text a{
    color:#666;
    text-decoration:none;
  }
  </style>
</head>


<body>
  <tbody>
    <tr>
      <td height="70"></td>
    </tr>
    <tr>
      <td>
        <!-- CONTAINER -->
        <table class="header" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
          <tbody>
            <tr>
              <td height="25"></td>
            </tr>
            <tr>
              <td>
                <table class="header-content" width="520" cellspacing="0" cellpadding="0" border="0" align="center">
                  <tbody>
                    <tr>
                      <td>
                        <!-- LOGO -->
                        <table width="50%" cellspacing="0" cellpadding="0" border="0" align="left">
                          <tbody>
                            <tr>
                              <td align="left">
                                <a href="//www.mesural.com" target="_blank">
                                <img class="logo" src="https://app.mesural.com/img/logo-dark.png" alt="logo" height="22" border="0">
                                </a>
                              </td>
                            </tr>
                            <tr>
                              <td height="22"></td>
                            </tr>
                          </tbody>
                        </table>
                        <!-- OPTIONS -->
                        <table width="50%" cellspacing="0" cellpadding="0" border="0" align="right">
                          
                          <tbody>
                            <tr>
                              <td height="3"></td>
                            </tr>
                            <tr>
                              <td align="right">
                                <a style="border-style: none !important; display: block; border: 0 !important;">
                                <img src="">
                                </a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td height="60"></td>
                    </tr>
                    <!-- ICONO -->
                    <tr>
                      <td align="center">
                      	<img src="https://app.mesural.com/img/mail/icon-lifebuoy.png" height="100" border="0">
                      </td>
                    </tr>
                    <tr>
                      <td height="40"></td>
                    </tr>
                    <tr>
                      <td class="main-text" align="center">
                        Recover password
                      </td>
                    </tr>
                    <tr>
                      <td height="30"></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td height="104"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table class="content" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
  <tbody>
    <tr>
      <td height="60"></td>
    </tr>
    <tr>
      <td>
        <table class="content-content" width="400" cellspacing="0" cellpadding="0" border="0" align="center">
          <tbody>
            <tr>
              <td align="center">
              	Hemos recibido la solicitud de recuperacion de password. Haz click en el botón para generar una nueva password.
              </td>
            </tr>
            <tr>
              <td height="50"></td>
            </tr>
            <tr>
              <td align="center">
                <table width="225" cellspacing="0" cellpadding="0" border="0" align="center">
                  <tbody>
                    <tr>
                      <td class="cta-activate" valign="middle" align="center" style="height:50px;">
                        <a href="https://app.mesural.com/conexiones/validar_usuario.php?token='.$token.'">Recover password</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td height="60"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table class="footer" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
          <tbody>
            <tr>
              <td height="20"></td>
            </tr>
            <tr>
              <td>
                <!-- COLUMNA 1 -->
                <table class="footer-content" width="600" cellspacing="0" cellpadding="0" border="0" align="left">
                  <tbody>
                    <tr>
                      <td class="footer-text" align="left">
                        You are receving this newsletter because you subscribed to our mailing list via: <a href="//www.mesural.com">www.mesural.com</a>
                      </td>
                    </tr>
                    <tr>
                      <td height="20"></td>
                    </tr>
                    <tr>
                      <td class="footer-text" align="left">
                        <a href="//www.mesural.com/legal.php">Visit our legal advice</a>
                      </td>
                    </tr>
                    <tr>
                      <td class="footer-text" align="left">
                        <a href="//app.mesural.com/conexiones/update-settings.php?action=unsubscribe&email=agusti.roig@outlook.com">Unsubscribe</a>
                      </td>
                    </tr>
                    <tr>
                      <td height="30"></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td height="70"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</body>
</html>';
$returnsuccess = "https://app.mesural.com/login.php?event=success";
$returnfail = "https://app.mesural.com/login.php?event=email-fail";
?>