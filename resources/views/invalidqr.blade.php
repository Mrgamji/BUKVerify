<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Invalid</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f7f6;
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 90%;
        }
        h1 {
            color: #dc3545;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        .message {
            font-size: 1rem;
            color: #555;
            margin-bottom: 20px;
        }
        .icon {
            font-size: 50px;
            color: #dc3545;
            margin-bottom: 15px;
        }
        .button {
            display: inline-block;
            padding: 12px 20px;
            font-size: 1rem;
            font-weight: 500;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">🚫</div>
        <h1>Invalid QR Code</h1>
        <p class="message">
            @if(isset($message) && $message === 'expired')
                This QR code has <strong>expired</strong>. Please generate a new one.
            @elseif(isset($message) && $message === 'invalid')
                The QR code is <strong>invalid</strong>. Try scanning again or request a new one.
            @else
                An unknown error occurred. Please try again later.
            @endif
        </p>
        <p class="message">If you believe this is an error, please contact support.</p>
        <p class="message">Thank you for your understanding!</p>

        <div style="background-color: #d1ecf1; color: #0c5460; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            You can also access the BUK Verify system to generate another QR code below.
        </div>
        <a href="/" class="button">Request New QR Code</a>
    </div>
</body>
</html>
