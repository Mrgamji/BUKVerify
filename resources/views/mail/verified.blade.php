<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Approved - BUK Verify</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; margin: 0; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    <tr style="background-color: #198754;">
                        <td style="padding: 20px; text-align: center;">
                            <img src="{{ asset('buk.png') }}" alt="BUK Verify Logo" width="120" style="margin-bottom: 10px;">
                            <h2 style="color: #ffffff; margin: 0;">BUK Verify</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px;">
                            <h3 style="color: #333;">Dear {{ $organization->name }},</h3>

                            <p style="color: #555; line-height: 1.6;">
                                Sequel to your application on <strong>{{ $organization->created_at->format('F j, Y \a\t g:i A') }}</strong>, we are pleased to inform you that your institution has been successfully verified and approved by <strong>BUK Verify</strong>.
                            </p>

                            <p style="color: #555; line-height: 1.6;">
                                You can now fully access all verification services on the platform using your unique access code:
                            </p>

                            <h2 style="background-color: #f1f1f1; color: #2d89ef; padding: 10px 20px; border-radius: 6px; text-align: center;">
                                {{ $organization->organization_access_code }}
                            </h2>

                            <p style="color: #555; line-height: 1.6;">
                                Please keep this access code safe and secure. It will be required for all verification-related activities your institution performs on the platform.
                            </p>

                            <p style="color: #555; line-height: 1.6;">
                                If you have any questions or encounter any issues, don’t hesitate to reach out to our support team.
                            </p>

                            <br>
                            <p style="color: #555;">
                                Warm regards,<br>
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
