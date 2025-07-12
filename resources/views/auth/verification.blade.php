<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Verifikasi Akun Anda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body, table, td, a {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        table, td {
            mso-table-rspace: 0pt;
            mso-table-lspace: 0pt;
        }
        img {
            -ms-interpolation-mode: bicubic;
        }
        body {
            width: 100% !important;
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        table {
            border-collapse: collapse !important;
        }
        a {
            color: #1a82e2;
            text-decoration: none;
        }
        /* Set the background color */
        .email-background {
            background-color: #f4f4f4; /* Change this to your desired background color */
        }
    </style>
</head>
<body class="email-background">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center" bgcolor="#e9ecef">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                <tr>
                    <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                        <p>Hai {{ $user->name }},</p>
                        <p>Kami melihat Anda memulai proses pendaftaran di {{ config('app.name') }}, namun kami belum menerima verifikasi akun Anda. Untuk mengaktifkan akun Anda sepenuhnya dan menyelami pengalaman {{ config('app.name') }}, silakan klik tautan di bawah untuk memverifikasi alamat email Anda:</p>
                        <p><a href="{{ $verificationUrl }}" target="_blank" style="background-color: #1a82e2; color: #ffffff; padding: 10px 20px; text-decoration: none;">Verifikasi Akun Saya</a></p>
                        <p>Untuk bantuan atau pertanyaan apa pun, cukup balas email ini dan saya akan dengan senang hati membantu.</p>
                        <p>Hormat kami,<br>{{ config('app.name') }}</p>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>
</body>
</html>
