<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Received - BUK Verify</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; margin: 0; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    <tr style="background-color: #2d89ef;">
                        <td style="padding: 20px; text-align: center;">
                        <img src="{{ asset('buk.png') }}" alt="BUK Verify Logo" width="120" style="margin-bottom: 10px;">
                            <h2 style="color: #ffffff; margin: 0;">BUK Verify</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px;">
                            <h3 style="color: #333;">Hello {{ $organization->name }},</h3>
                            <p style="color: #555; line-height: 1.6;">
                                We’re pleased to inform you that your registration with <strong>BUK Verify</strong> has been successfully received on <strong>{{ $organization->created_at->format('F j, Y \a\t g:i A') }}</strong>.
                            </p>
                            <p style="color: #555; line-height: 1.6;">
                                Our team is currently reviewing your information. You will be contacted once your organization has been successfully verified and approved for full access to our services.
                            </p>
                            <p style="color: #555; line-height: 1.6;">
                                In the meantime, if you have any questions or additional documents to provide, feel free to reach out to us.
                            </p>
                            <p style="color: #555; line-height: 1.6;">
                                Thank you for choosing <strong>BUK Verify</strong>.
                            </p>
                            <br>
                            <p style="color: #555;">
                                Best regards,<br>
                                <strong>BUK Verify Team</strong><br>
                                <a href="mailto:support@bukverify.ng" style="color: #2d89ef;">bukverify@buk.edu.ng</a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #f1f1f1; padding: 15px; text-align: center; font-size: 12px; color: #888;">
                            &copy; {{ date('Y') }} BUK Verify. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
