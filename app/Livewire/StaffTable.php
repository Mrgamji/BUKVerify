<?php

namespace App\Livewire;

use App\Models\Students;
use Spatie\Browsershot\Browsershot;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Livewire\Component;

class StaffTable extends Component
{
    public $students = [];
    public $search = '';
    public  $student;

    public function updatedSearch()
    {
        if (empty($this->search)) {
            $this->students = []; // Clear results when search is empty
        } else {
            $this->students = Students::whereRaw("first_name || ' ' || last_name = ?", [$this->search])
            ->orWhere('matriculation_number', $this->search)
            ->get();
        }
    }

    public function generateVerificationPage($id)
    {
        $this->student = Students::find($id);
        if (!$this->otp_expire_at || $this->qr_expire_at < now()) {
            // Generate a new unique token (QR code) since it's expired
            $this->student->unique_token = \Illuminate\Support\Str::uuid()->toString();
            $this->student->save();
        }
        $verificationUrl = route('student.verify', ['token' => $this->student->unique_token]);
        // Generate the QR code
        $qrCode = new QrCode($verificationUrl);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        $qrPath = public_path('images/qr/' . $this->student->unique_token . '.png');
        $result->saveToFile($qrPath);

        // Save the QR code path in the database
        $this->student->verification_qr = 'images/qr/' . $this->student->unique_token . '.png';
        $this->student->qr_expire_at = now()->addHours(24); // Set expiration date to 24 hours from now
        $this->student->save();
       

        $html = view('pdfs.profile', ['student' => $this->student])->render();
        $fileName = 'BUK-verify_' . str_replace(' ', '_', ucfirst($this->student->first_name) . '_' . ucfirst($this->student->last_name)) . '_' . now()->format('Ymd_His') . '.pdf';
        $pdfPath = storage_path('app/public/' . $fileName);

        Browsershot::html($html)
            ->setOption('no-sandbox', true)
            ->setOption('disable-setuid-sandbox', true)
            ->format('A4')
            ->save($pdfPath);

        return response()->download($pdfPath)->deleteFileAfterSend(true);
    }
    

    public function render()
    {
        return view('livewire.staff-table');
    }
}
