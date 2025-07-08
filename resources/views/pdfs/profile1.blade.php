<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUK Student Verification</title>
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .verification-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        }
        .buk-logo {
            max-width: 120px;
            display: block;
            margin: 0 auto 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            color: #007bff;
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .header h4 {
            color: #6c757d;
            font-size: 1.2rem;
        }
        .card {
            background: #ffffff;
            border: 1px solid #007bff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-details {
            flex: 1;
        }
        .card-title {
            color: #007bff;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        .card p {
            margin: 5px 0;
            font-size: 1rem;
        }
        .qr-code {
            margin-left: 20px;
        }
        .qr-code img {
            max-width: 120px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        .alert {
            background-color: #fff3cd;
            color: #856404;
            border-radius: 5px;
            padding: 15px;
            font-size: 0.9rem;
            margin-top: 20px;
        }
        .signature-stamp-container {
            text-align: center;
            margin-top: 30px;
        }
        .stamp img, .signature img {
            width: 120px;
            margin: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="verification-container">
            <div class="header">
                <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px;">
                    <img src="{{ asset('mechatronics/dist/assets/media/logos/buk.png') }}" alt="BUK Logo" class="buk-logo" style="max-width: 120px; border: 1px solid #ddd; border-radius: 10px;">
                    
                </div>
                <h2>Bayero University Kano</h2>
                <h4>Student Verification Page</h4>
                <hr style="border: 1px solid #007bff; margin: 20px 0;">
                <h4 style="color: #28a745; font-size: 1.5rem; margin: 10px 0;">QR Code Result: <span style="font-weight: bold;">Valid</span></h4>
                <hr style="border: 1px solid #007bff; margin: 20px 0;">
            </div>
            
            <div class="card">
            <img src="{{ asset('mechatronics/dist/assets/media/avatars/gamjipic.jpg') }}" alt="Student Picture" style="max-width: 120px; border: 1px solid #ddd; border-radius: 10px;">
                <div class="card-details" style="text-align: center;">
                    <h5 class="card-title">Student Information</h5>
                    <p><strong>Name:</strong> <span>{{$student->first_name}} {{$student->last_name}}</span></p>
                    <p><strong>Matric No:</strong> <span>{{$student->matriculation_number}}</span></p>
                    <p><strong>Department:</strong> <span>{{$student->department}}</span></p>
                    <p><strong>Faculty:</strong> <span>{{$student->faculty}}</span></p>
                    <p><strong>Level:</strong> <span>{{$student->level}}</span></p>
                </div>
            </div>

            <div class="alert">
                <p>
                    <strong>Note:</strong> This verification was generated on 
                    <span>{{ \Carbon\Carbon::now()->format('l, F j, Y g:i A') }}</span> 
                    and will be invalid after 
                    <span>{{ \Carbon\Carbon::now()->addDay()->format('l, F j, Y g:i A') }}</span>.
                </p>
            </div>

            <div class="signature-stamp-container">
                <div class="stamp">
                    <img src="{{ asset('mechatronics/dist/assets/media/logos/stamp.png') }}" alt="BUK Stamp">
                </div>
                <div class="signature">
                    <img src="{{ asset('mechatronics/dist/assets/media/logos/sign.png') }}" alt="Registrar Signature">
                </div>
                <p>Registrar, BUK</p>
            </div>

            <div class="footer">
                <p>&copy; {{ date('Y') }} Bayero University Kano. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
