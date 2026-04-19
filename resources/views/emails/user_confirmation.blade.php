<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Thank You for Contacting</title>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background: #f5f5f5;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f5f5f5; padding: 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
                    <tr>
                        <td style="background-color: #198754; color: #fff; padding: 20px; text-align: center;">
                            <h2 style="margin: 0;">Thank You, {{ $data['name'] }}!</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px;">
                            <p>I’ve received your message and will get back to you shortly.</p>
                            <p><strong>Your Message:</strong></p>
                            <div style="background: #f1f1f1; padding: 15px; border-radius: 6px;">
                                {{ $data['message'] }}
                            </div>
                            <p style="margin-top: 25px;">Till then, feel free to explore more at <a
                                    href="https://www.z1iinnovation.com"
                                    style="color: #198754;">www.z1iinnovation.com</a></p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="background-color: #f0f0f0; text-align: center; padding: 15px; font-size: 13px; color: #888;">
                            <p>Zero one Innovations | {{ now()->format('d M Y, h:i A') }}</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
