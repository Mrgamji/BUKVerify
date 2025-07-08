<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class QrController extends Controller
{


    public function verify(Request $request)
    {
        $request->validate([
            'unique_token' => 'required|string',
        ]);
        $student = Students::where('unique_token', $request->unique_token)->first();

        if ($student) {
            return response()->json(['student' => $student]);
        }

        return response()->json(['message' => 'Invalid QR code'], 404);
    }
}
