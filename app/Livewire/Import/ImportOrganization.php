<?php

namespace App\Livewire\Import;

use App\Imports\ImportOrganizations;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ImportOrganization extends Component
{
    use WithFileUploads;

    public $file;
    public $error;
    public $success;

    // Validate the file on upload
    protected $rules = [
        'file' => 'required|mimes:xlsx,xls,csv|max:10240', // 10MB max size
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Handle file import
    public function import()
    {
        $this->validate();

        try {
            // Process the file
            Excel::import(new ImportOrganizations(), $this->file);

            // Success message
            $this->success = 'File imported successfully!';
            $this->error=null;
        } catch (\Exception $e) {
            // Error handling
            $this->error = 'There was an error importing the file: ' . $e->getMessage();
            $this->success=null;
        }

        // Reset the file input after processing
        $this->reset('file');
    }


    public function render()
    {
        return view('livewire.import.import-organization');
    }
}
