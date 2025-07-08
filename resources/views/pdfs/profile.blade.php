<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUK Student Verification</title>
    <style>
        body {
            background-image: url("{{ public_path('mechatronics/dist/assets/media/logos/specimen.png') }}");
            background-color: #f4f6f9;
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .verification-container {
            max-width: 900px;
            width: 100%;
            background: white;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header img {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .header h2 {
            color: #007bff;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .header h4 {
            color: #6c757d;
            font-size: 1rem;
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
            font-size: 1.3rem;
            margin-bottom: 10px;
        }

        .card p {
            margin: 5px 0;
            font-size: 1rem;
        }

        .qr-profile-container {
            display: flex;
            align-items: center;
        }

        .qr-code {
            margin-left: 20px;
            flex-shrink: 0;
        }

        .qr-code img {
            max-width: 120px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .profile-picture {
            margin-left: 20px;
        }

        .profile-picture img {
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

        .footer p {
            margin-bottom: 10px;
        }

        .footer h5 {
            font-size: 1.1rem;
            color: #007bff;
        }

        /* Responsiveness for smaller screens */
        @media (max-width: 768px) {
            .verification-container {
                padding: 20px;
            }

            .card {
                flex-direction: column;
                align-items: flex-start;
            }

            .qr-profile-container {
                flex-direction: column;
                align-items: center;
                margin-top: 20px;
            }

            .profile-picture {
                margin-top: 20px;
                margin-left: 0;
            }

            .stamp img, .signature img {
                width: 100px;
            }
        }
    </style>
</head>
<body>

    <div class="verification-container">
        <div class="header">
            <img src="{{ public_path('mechatronics/dist/assets/media/logos/buk.png') }}" alt="BUK Logo" class="buk-logo">
            <h2>Bayero University Kano</h2>
            <h4>Student Verification Page</h4>
        </div>

        <div class="card">
            <div class="card-details">
                <h5 class="card-title">Student Information</h5>
                <p><strong>Name:</strong> <span>{{$student->first_name}} {{$student->last_name}}</span></p>
                <p><strong>Matric No:</strong> <span>{{$student->matriculation_number}}</span></p>
                <p><strong>Department:</strong> <span>{{$student->department}}</span></p>
                <p><strong>Faculty:</strong> <span>{{$student->faculty}}</span></p>
                <p><strong>Level:</strong> <span>{{$student->level}}</span></p>
            </div>
            <div class="qr-profile-container">
                <div class="qr-code">
                    <img src="{{ public_path($student->verification_qr) }}" alt="QR Code">
                </div>
                <div class="profile-picture">
                    <img src="{{ public_path('mechatronics/dist/assets/media/avatars/gamjipic.jpg') }}" alt="Student Picture">
                </div>
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
                <img src="{{ public_path('mechatronics/dist/assets/media/logos/stamp.png') }}" alt="BUK Stamp">
            </div>
            <div class="signature">
                <img src="{{ public_path('mechatronics/dist/assets/media/logos/sign.png') }}" alt="Registrar Signature">
            </div>
            <p>Registrar, BUK</p>
        </div>

        <div class="footer">
            <h5>Powered by: Ahmad Muhammad Salisu, Level 400 Computer Science, Bayero University Kano (Final Year Project)</h5>
            <p>&copy; {{ date('Y') }} Bayero University Kano. All rights reserved.</p>
        </div>
    </div>

</body>
</html>
