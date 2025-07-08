<?php

namespace App\Imports;

use App\Models\Students;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
  
    public function model(array $row)
    {
        return new Students([
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'phone' => $row['phone'] ?? null,
            'date_of_birth' => $row['date_of_birth'] ?? null,
            'gender' => $row['gender'] ?? null,
            'address' => $row['address'] ?? null,
            'city' => $row['city'] ?? null,
            'state' => $row['state'] ?? null,
            'country' => $row['country'] ?? null,
            'matriculation_number' => $row['matriculation_number'],
            'birth_certificate' => $row['birth_certificate'] ?? null,
            'waec_certificate' => $row['waec_certificate'] ?? null,
            'jamb_registration_number' => $row['jamb_registration_number'] ?? null,
            'jamb_score' => $row['jamb_score'] ?? null,
            'admission_year' => $row['admission_year'] ?? null,
            'expected_year_of_graduation' => $row['expected_year_of_graduation'] ?? null,
            'picture' => $row['picture'] ?? null,
            'department' => $row['department'] ?? null,
            'level' => $row['level'] ?? null,
            'faculty' => $row['faculty'] ?? null,
            'cgpa' => $row['cgpa'] ?? null,
            'hod_name' => $row['hod_name'] ?? null,
            'verification_qr' => $row['verification_qr'] ?? null,
            'unique_token' => $row['unique_token'] ?? null,
            'qr_expire_at' => $row['qr_expire_at'] ?? null,
        ]);
    }
}
