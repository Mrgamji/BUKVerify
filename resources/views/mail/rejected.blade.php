<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Status - BUK Verify</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; margin: 0; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    <tr style="background-color: #dc3545;">
                        <td style="padding: 20px; text-align: center;">
                            <img src="{{ asset('logo/bukverify-logo.png') }}" alt="BUK Verify Logo" width="120" style="margin-bottom: 10px;">
                            <h2 style="color: #ffffff; margin: 0;">BUK Verify</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px;">
                            <h3 style="color: #333;">Dear {{ $organization->name }},</h3>

                            <p style="color: #555; line-height: 1.6;">
                                We appreciate your interest in partnering with <strong>BUK Verify</strong> and thank you for your application submitted on <strong>{{ $organization->created_at->format('F j, Y \a\t g:i A') }}</strong>.
                            </p>

                            <p style="color: #555; line-height: 1.6;">
                                However, we regret to inform you that due to certain circumstances, your application could not scale through our verification process at this time.
                            </p>

                            <p style="color: #555; line-height: 1.6;">
                                As much as BUK Verify is committed to enabling transparent access to authentic student records, we are equally committed to upholding the privacy and data security of every individual whose information is stored on our platform.
                            </p>

                            <p style="color: #555; line-height: 1.6;">
                                If you believe this decision was made in error or would like further clarification, we encourage you to contact us directly for further details or to initiate an appeal process.
                            </p>

                            <p style="color: #555; line-height: 1.6;">
                                Our team is available and happy to assist you in resolving any concerns you may have.
                            </p>

                            <br>
                            <p style="color: #555;">
                                Sincerely,<br>
                                <strong>BUK Verify Team</strong><br>
                                <a href="mailto:bukverify@buk.edu.ng" style="color: #dc3545;">bukverify@buk.edu.ng</a>
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
