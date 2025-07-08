<?php

namespace App\Imports;

use App\Models\Organization;
use App\Models\Staff;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
class StaffImport implements ToModel, WithHeadingRow
{
    
    public function model(array $row)
    {
        return new Staff([
            'staff_id' => $row['staff_id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'phone_number' => $row['phone_number'] ?? null,
            'department' => $row['department'],
            'position' => $row['position'],
            'date_of_birth' => $row['date_of_birth'] ?? null,
            'gender' => $row['gender'] ?? null,
            'address' => $row['address'] ?? null,
            'otp' => $row['otp'] ?? null,
        ]);
    }
}
