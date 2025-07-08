<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Token Purchase Initiated</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');
        body {
            background: linear-gradient(135deg, #1a2980 0%, #26d0ce 100%);
            font-family: 'Montserrat', Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 480px;
            margin: 40px auto;
            background: rgba(30, 42, 73, 0.92);
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            padding: 40px 32px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .glow {
            font-size: 2.2em;
            letter-spacing: 2px;
            color: #fff;
            text-shadow: 0 0 8px #26d0ce, 0 0 24px #1a2980, 0 0 32px #26d0ce;
            margin-bottom: 18px;
            animation: glowPulse 2.5s infinite alternate;
        }
        @keyframes glowPulse {
            from { text-shadow: 0 0 8px #26d0ce, 0 0 24px #1a2980, 0 0 32px #26d0ce; }
            to { text-shadow: 0 0 24px #26d0ce, 0 0 48px #1a2980, 0 0 64px #26d0ce; }
        }
        .token-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 18px auto;
            display: block;
            filter: drop-shadow(0 0 16px #26d0ce);
            animation: spin 4s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg);}
            100% { transform: rotate(360deg);}
        }
        .message {
            font-size: 1.15em;
            margin-bottom: 28px;
            color: #e0f7fa;
            line-height: 1.6;
        }
        .cta {
            display: inline-block;
            margin-top: 18px;
            padding: 12px 32px;
            background: linear-gradient(90deg, #26d0ce 0%, #1a2980 100%);
            color: #fff;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            box-shadow: 0 4px 16px 0 rgba(38, 208, 206, 0.25);
            transition: background 0.3s, box-shadow 0.3s;
        }
        .cta:hover {
            background: linear-gradient(90deg, #1a2980 0%, #26d0ce 100%);
            box-shadow: 0 8px 32px 0 rgba(38, 208, 206, 0.35);
        }
        .wave {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 80px;
            z-index: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="token-icon" src="https://img.icons8.com/fluency/96/000000/coin-in-hand.png" alt="Token Icon">
        <div class="glow">Your Token Purchase Has Begun!</div>
        <div class="message">
            <p>
                We have received your request to purchase <span style="color:#ffd700;font-weight:bold;">{{($payment->amount/100)}} tokens at &#8358;{{ number_format($payment->amount, 2) }} through BUK Verify.</span>.<br>
                <span style="color:#ffd700;font-weight:bold;">Sit back and watch the magic unfold.</span>
            </p>
            <p>
                <div style="margin: 24px 0; text-align: center;">
                    <a href="{{ $payment->payment_url ?? '#' }}" 
                       style="display: inline-block; padding: 14px 36px; background: linear-gradient(90deg, #26d0ce 0%, #1a2980 100%); color: #fff; border-radius: 30px; text-decoration: none; font-weight: bold; font-size: 1.15em; box-shadow: 0 4px 16px 0 rgba(38, 208, 206, 0.25); transition: background 0.3s, box-shadow 0.3s;"
                       target="_blank">
                        Complete Your Purchase
                    </a>
                    <div style="margin-top: 10px; color: #b2ebf2; font-size: 0.98em;">
                        If the button doesn't work, copy and paste this link into your browser:<br>
                        <span style="color:#ffd700;">{{ $payment->payment_url ?? $payment_url ?? '#' }}</span>
                    </div>
                </div>
            <p>
                You will receive another email once your tokens are credited.<br>
                <span style="color:#ffd700;font-weight:bold;">{{($payment->amount/100)}} tokens will be added to your account.</span>
                If you have any questions, our support team is here for you.
            </p>
        </div>
        <a href="{{ url('/student-profile') }}" class="cta">Return to Dashboard</a>
        <svg class="wave" viewBox="0 0 500 80" preserveAspectRatio="none">
            <path d="M0,30 Q150,80 300,30 T500,30 V80 H0 Z" fill="#26d0ce" fill-opacity="0.18"/>
            <path d="M0,50 Q150,100 300,50 T500,50 V80 H0 Z" fill="#1a2980" fill-opacity="0.12"/>
        </svg>
    </div>
</body>
</html>
