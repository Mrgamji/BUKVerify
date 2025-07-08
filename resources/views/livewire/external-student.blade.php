<div class="container mt-5">
    <ul class="nav nav-tabs" id="studentTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab">Personal Info</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="academic-tab" data-bs-toggle="tab" data-bs-target="#academic" type="button" role="tab">Academic Info</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="upload-tab" data-bs-toggle="tab" data-bs-target="#upload" type="button" role="tab">Uploads</button>
        </li>
    </ul>
    <div class="tab-content p-4 border border-top-0 rounded-bottom shadow-sm" id="studentTabContent">
        <!-- Personal Info -->
        <div class="tab-pane fade show active" id="personal" role="tabpanel">
            <div class="mb-3">
                <label>First Name</label>
                <input type="text" class="form-control" wire:model.defer="first_name">
                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label>Last Name</label>
                <input type="text" class="form-control" wire:model.defer="last_name">
                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" wire:model.defer="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" class="form-control" wire:model.defer="phone">
            </div>
            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label>Date of Birth</label>
                <input type="date" class="form-control" wire:model.defer="date_of_birth">
            </div>
            <div class="mb-3">
                <label>Gender</label>
                <select class="form-select" wire:model.defer="gender">
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label>Address</label>
                <input type="text" class="form-control" wire:model.defer="address">
                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
           
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>City</label>
                    <input type="text" class="form-control" wire:model.defer="city">
                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
               
                <div class="col-md-4 mb-3">
                    <label>State</label>
                    <input type="text" class="form-control" wire:model.defer="state">
                    @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
               
                <div class="col-md-4 mb-3">
                    <label>Country</label>
                    <input type="text" class="form-control" wire:model.defer="country">
                    @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              
            </div>
        </div>

        <!-- Academic Info -->
        <div class="tab-pane fade" id="academic" role="tabpanel">
            <div class="mb-3">
                <label>Matriculation Number</label>
                <input type="text" class="form-control" wire:model.defer="matriculation_number">
                @error('matriculation_number') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label>JAMB Registration Number</label>
                <input type="text" class="form-control" wire:model.defer="jamb_registration_number">
            </div>
            @error('jamb_registration_number') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label>JAMB Score</label>
                <input type="text" class="form-control" wire:model.defer="jamb_score">
            </div>
            @error('jamb_score') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label>Admission Year</label>
                <input type="number" class="form-control" wire:model.defer="admission_year">
            </div>
            @error('admission_year') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label>Expected Graduation Year</label>
                <input type="number" class="form-control" wire:model.defer="expected_year_of_graduation">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Department</label>
                    <input type="text" class="form-control" wire:model.defer="department">
                    @error('department') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
               
                <div class="col-md-6 mb-3">
                    <label>Faculty</label>
                    <input type="text" class="form-control" wire:model.defer="faculty">
                    @error('faculty') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              
            </div>
            <div class="mb-3">
                <label>CGPA</label>
                <input type="text" class="form-control" wire:model.defer="cgpa">
            </div>
            @error('cgpa') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="mb-3">
                <label>HOD Name</label>
                <input type="text" class="form-control" wire:model.defer="hod_name">
            </div>
            @error('hod_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Uploads -->
        <div class="tab-pane fade" id="upload" role="tabpanel">
            <div class="mb-3">
                <label>Birth Certificate</label>
                <input type="file" class="form-control" wire:model="birth_certificate">
            </div>
            <div class="mb-3">
                <label>WAEC Certificate</label>
                <input type="file" class="form-control" wire:model="waec_certificate">
            </div>
            <div class="mb-3">
                <label>Passport Photo</label>
                <input type="file" class="form-control" wire:model="picture">
            </div>
            @error('picture') <span class="text-danger">{{ $message }}</span> @enderror

            <div class="text-end">
                <button wire:click="submitStudentForm" wire:loading.attr="disabled" class="btn btn-success">
                    <span wire:loading.remove wire:target="submitStudentForm">Submit Registration</span>
                    <span wire:loading wire:target="submitStudentForm">
                        <span class="spinner-border spinner-border-sm"></span> Submitting...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>