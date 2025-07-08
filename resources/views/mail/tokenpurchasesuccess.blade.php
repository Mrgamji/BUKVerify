<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Token Purchase Successful</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap');
        body {
            background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%);
            font-family: 'Montserrat', Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 480px;
            margin: 40px auto;
            background: rgba(30, 42, 73, 0.95);
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
            text-shadow: 0 0 8px #43cea2, 0 0 24px #185a9d, 0 0 32px #43cea2;
            margin-bottom: 18px;
            animation: glowPulse 2.5s infinite alternate;
        }
        @keyframes glowPulse {
            from { text-shadow: 0 0 8px #43cea2, 0 0 24px #185a9d, 0 0 32px #43cea2; }
            to { text-shadow: 0 0 24px #43cea2, 0 0 48px #185a9d, 0 0 64px #43cea2; }
        }
        .token-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 18px auto;
            display: block;
            filter: drop-shadow(0 0 16px #43cea2);
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
            background: linear-gradient(90deg, #43cea2 0%, #185a9d 100%);
            color: #fff;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            box-shadow: 0 4px 16px 0 rgba(67, 206, 162, 0.25);
            transition: background 0.3s, box-shadow 0.3s;
        }
        .cta:hover {
            background: linear-gradient(90deg, #185a9d 0%, #43cea2 100%);
            box-shadow: 0 8px 32px 0 rgba(67, 206, 162, 0.35);
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
        <div class="glow">Token Purchase Successful!</div>
        <div class="message">
            <p>
                Congratulations! Your purchase of 
                <span style="color:#ffd700;font-weight:bold;">
                    {{ ($payment->amount/100) }} token{{ ($payment->amount/100) == 1 ? '' : 's' }}
                </span>
                at <span style="color:#ffd700;">&#8358;{{ number_format($payment->amount, 2) }}</span> 
                has been successfully processed.
            </p>
            <p>
                <span style="color:#ffd700;font-weight:bold;">
                    {{ ($payment->amount/100) }} token{{ ($payment->amount/100) == 1 ? '' : 's' }}
                </span>
                have been added to your account.<br>
                Thank you for using <strong>BUK Verify</strong>!
            </p>
            <p>
                If you have any questions or need assistance, our support team is always here to help.
            </p>
        </div>
        <a href="{{ url('/student-profile') }}" class="cta">Go to Dashboard</a>
        <svg class="wave" viewBox="0 0 500 80" preserveAspectRatio="none">
            <path d="M0,30 Q150,80 300,30 T500,30 V80 H0 Z" fill="#43cea2" fill-opacity="0.18"/>
            <path d="M0,50 Q150,100 300,50 T500,50 V80 H0 Z" fill="#185a9d" fill-opacity="0.12"/>
        </svg>
    </div>
</body>
</html>
