<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lazon ID</title>
  <style>
    img {
      border: none;
      -ms-interpolation-mode: bicubic;
      max-width: 100%;
    }

    body {
      background-color: #f6f6f6;
      font-family: sans-serif;
      -webkit-font-smoothing: antialiased;
      font-size: 14px;
      line-height: 1.4;
      margin: 0;
      padding: 0;
      -ms-text-size-adjust: 100%;
      -webkit-text-size-adjust: 100%;
    }

    table {
      border-collapse: separate;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      width: 100%; }
      table td {
        font-family: sans-serif;
        font-size: 14px;
        vertical-align: top;
    }
    /* -------------------------------------
        OTHER STYLES THAT MIGHT BE USEFUL
    ------------------------------------- */
    .last {
      margin-bottom: 0;
    }

    .first {
      margin-top: 0;
    }

    .align-center {
      text-align: center;
    }

    .align-right {
      text-align: right;
    }

    .align-left {
      text-align: left;
    }

    .clear {
      clear: both;
    }

    .mt0 {
      margin-top: 0;
    }

    .mb0 {
      margin-bottom: 0;
    }
    .pb50 {
      padding-bottom: 50px !important;
    }
    /**
     * Design
     */
    .main {
      max-width: 768px;
      width: 100%;
      margin: 0 auto;
    }
    .header {
      width: 100%;
      position: relative;
      background-color: #000;
      height: 80px;
    }
    .logo-lazon {
      position: absolute;
      width: 133px;
      left: calc(50% - 66.5px);
      top: 0;
    }
    .logo-lazon img {
      max-width: 100%;
      height: auto;
    }
    .content {
      background-color: #fff;
      padding: 80px 50px 0;
    }

    .content * {
      line-height: 1.3;
      margin: 0;
    }
    .btn-link {
      padding: 10px 16px;
      background-color: #ec2427;
      color: #fff;
      font-size: 16px;
      text-transform: uppercase;
      font-weight: bold;
      text-decoration: none;
    }
    .btn-link:hover {
      opacity: .8;
    }
    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
      .ExternalClass p,
      .ExternalClass span,
      .ExternalClass font,
      .ExternalClass td,
      .ExternalClass div {
        line-height: 100%;
      }
    }
  </style>
</head>
<body>
  <table role="presentation" cellpadding="0" border="0" cellspacing="0" class="main">
    <tr>
      <td style="width:100%; float: left;">
        <div class="header">
          <div class="logo-lazon">
            <img src="{{ asset('static/images/img_logo_email.png')}}" alt="Logo Lazon">
          </div>
        </div>
      </td>
      <td style="width: 100%; float: left;">
        <div class="content" style="text-align: center">
          <span style="display: block; font-size: 24px; color: #444;">Hi,</span>
          <b style="display: block; font-size: 24px; color: #000">[NAMA ACARA LIVE STREAMING]</b>
          <p style="color: #444; font-size: 24px;">sebentar lagi akan dimulai nih!</p>
        </div>
      </td>
    </tr>
    <tr>
      <td style="width: 100%; float: left;">
        <div class="content pb50" style="padding-top: 40px; text-align: center;">
          <p style="text-align: center; font-size: 18px; color: #2a2a2a; max-width: 510px; width: 100%; margin: 0 auto;">
            Live Streaming akan dimulai dalam <strong style="color: red;">30 menit</strong> lagi. Jangan sampai ketinggalan nonton ya! Klik tombol di bawah ini untuk pergi ke halaman Live Streaming.
          </p>
          <br>
          <br>
          <br>
          <a href="#" class="btn-link" style="display: inline-block;">Watch Live Streaming Now</a>
        </div>
      </td>
    </tr>
  </table>
</body>
</html>