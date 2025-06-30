<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background: #f8f9fa;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8f9fa; padding: 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
                    <tr>
                        <td style="background-color: #0d6efd; color: #fff; padding: 20px; text-align: center;">
                            <h2 style="margin: 0;">New Contact Form Submission</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px;">
                            <p><strong>Name:</strong> {{ $data['name'] }}</p>
                            <p><strong>Email:</strong> {{ $data['email'] }}</p>
                            <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
                            <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
                            <p><strong>Message:</strong></p>
                            <div style="background: #f1f1f1; padding: 15px; border-radius: 6px; font-style: italic;">
                                {{ $data['message'] }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="background-color: #f0f0f0; text-align: center; padding: 15px; font-size: 13px; color: #888;">
                            <p>Contacted via Portfolio Website | {{ now()->format('d M Y, h:i A') }}</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
