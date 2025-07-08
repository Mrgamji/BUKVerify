<?php

namespace App\Imports;

use App\Models\Organization;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportOrganizations implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Organization([
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'] ?? null,
            'address' => $row['address'] ?? null,
            'certificate_number' => $row['certificate_number'],
            'certificate_picture' => $row['certificate_picture'] ?? null,
            'application_letter_picture' => $row['application_letter_picture'] ?? null,
            'status' => $row['status'] ?? 'pending',
            'is_email_verified' => $row['is_email_verified'] ?? 0,
            'organization_access_code' => $row['organization_access_code'] ?? Str::upper(Str::random(10)),
        ]);
    }
}
