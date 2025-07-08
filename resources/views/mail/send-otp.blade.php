<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verify Your OTP</title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4; padding: 40px 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <tr>
            <td style="padding: 30px;">
                <h2 style="color: #333333; margin-bottom: 10px;">Hello, {{ $student->first_name }}</h2>
                <p style="color: #555555; font-size: 15px; line-height: 1.6;">
                    We received a request to verify your email address on <strong>BUK Verify</strong>. Please use the OTP code below to complete your verification process:
                </p>

                <div style="text-align: center; margin: 30px 0;">
                    <span style="display: inline-block; background-color: #2d89ef; color: #ffffff; padding: 15px 30px; font-size: 24px; font-weight: bold; letter-spacing: 3px; border-radius: 6px;">
                        {{ $otp }}
                    </span>
                </div>

                <p style="color: #777777; font-size: 14px;">
                    If you did not request this verification, please ignore this email or contact BUK Verify for assistance.
                </p>

                <p style="color: #444444; margin-top: 30px;">
                    Thank you,<br>
                    <strong>BUK Verify Team</strong>
                </p>
            </td>
        </tr>

        <tr>
            <td style="background-color: #f0f0f0; padding: 20px; text-align: center; font-size: 12px; color: #999999; border-top: 1px solid #dddddd;">
                &copy; {{ date('Y') }} BUK Verify. All rights reserved.
            </td>
        </tr>
    </table>
</body>
</html>
