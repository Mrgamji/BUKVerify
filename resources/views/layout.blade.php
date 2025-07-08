<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
    <head><base href="{{ asset('mechatronics') }}/"/>
        <title>BUK Verification System</title>
        <link rel="icon" href="{{ asset('mechatronics/favicon.ico') }}" type="image/x-icon" />
        <meta charset="utf-8" />
        <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
        <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Vendor Stylesheets(used for this page only)-->
        <link href="dist/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->

		<!--begin::Icon Fonts-->
		<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
		<!--end::Icon Fonts-->
        @livewireStyles
    </head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		
        
    <!-- Toast/Alert Notifications -->
    <style>
        .custom-toast {
            min-width: 340px;
            max-width: 420px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
            border-radius: 1rem;
            font-size: 1.08rem;
            opacity: 0.98;
            animation: fadeInUp 0.7s;
        }
        @keyframes fadeInUp {
            from { transform: translateY(40px); opacity: 0; }
            to { transform: translateY(0); opacity: 0.98; }
        }
        .custom-toast .btn-close {
            font-size: 1.3rem;
            color: #333;
            opacity: 0.7;
        }
        .custom-toast .alert-icon {
            font-size: 1.5rem;
            margin-right: 0.7rem;
            vertical-align: middle;
        }
    </style>

    <div style="position: fixed; top: 2.5rem; right: 2.5rem; z-index: 20000;">
        @if (session('success'))
            <div class="alert alert-success custom-toast d-flex align-items-center justify-content-between mb-3 shadow-lg" role="alert" id="successAlert">
                <div class="d-flex align-items-center">
                    <span class="alert-icon">✅</span>
                    <span>
                        <span class="fw-bold">Success:</span> {{ session('success') }}
                    </span>
                </div>
                <button onclick="closeAlert('successAlert')" type="button" class="btn-close ms-3" aria-label="Close"></button>
            </div>
        @endif

        @if (session('PaymentMessage'))
            <div class="alert alert-success custom-toast d-flex align-items-center justify-content-between mb-3 shadow-lg" role="alert" id="paymentAlert">
                <div class="d-flex align-items-center">
                    <span class="alert-icon">✅</span>
                    <span>
                        <span class="fw-bold">Success:</span> {{ session('PaymentMessage') }}
                    </span>
                </div>
                <button onclick="closeAlert('paymentAlert')" type="button" class="btn-close ms-3" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger custom-toast d-flex align-items-center justify-content-between mb-3 shadow-lg" role="alert" id="errorAlert">
                <div class="d-flex align-items-center">
                    <span class="alert-icon">❌</span>
                    <span>
                        <span class="fw-bold">Error:</span> {{ session('error') }}
                    </span>
                </div>
                <button onclick="closeAlert('errorAlert')" type="button" class="btn-close ms-3" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <script>
        function closeAlert(id) {
            var el = document.getElementById(id);
            if (el) el.style.display = 'none';
        }
    </script>

				<!--begin::Content-->
					<div class="d-flex flex-column flex-lg-row flex-column-fluid" style="padding-top: 3.5rem;">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl pt-5">
       

                            @yield('content')

                            <!--begin::Footer-->
<div class="footer py-4 d-flex flex-lg-column mt-12" id="buk_verify_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">2024&copy;</span>
            <a href="https://buk.edu.ng" target="_blank" class="text-gray-800 text-hover-primary">Bayero University Kano</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="https://buk.edu.ng/about" target="_blank" class="menu-link px-2">About</a>
            </li>
            <li class="menu-item">
                <a href="https://buk.edu.ng/contact" target="_blank" class="menu-link px-2">Contact</a>
            </li>
            <li class="menu-item">
                <a href="/admin" wire:navigate class="menu-link px-2 text-danger">Admin</a>
            </li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>
<!--end::Footer-->

				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		
		</div>
		<!--end::Modal - Users Search-->
		<!--end::Modals-->
		<!--begin::Javascript-->
		<script>var hostUrl = "dist/assets/";</script>
        <script>
                    const facultyToDepartments = {
                        "Computing": ["Computer Science", "Information Technology", "Software Engineering"],
                        "Engineering": ["Civil Engineering", "Electrical Engineering", "Mechanical Engineering"],
                        "Sciences": ["Biology", "Chemistry", "Physics"]
                        // Add more faculties and their departments as needed
                    };

                    const facultySelect = document.getElementById('faculty');
                    const departmentSelect = document.getElementById('department');

                    facultySelect.addEventListener('change', function () {
                        const selectedFaculty = this.value;

                        // Clear previous department options
                        departmentSelect.innerHTML = '<option value="" disabled selected>Select your department</option>';

                        if (selectedFaculty && facultyToDepartments[selectedFaculty]) {
                            // Enable the department select
                            departmentSelect.disabled = false;

                            // Populate department options based on selected faculty
                            facultyToDepartments[selectedFaculty].forEach(department => {
                                const option = document.createElement('option');
                                option.value = department;
                                option.textContent = department;
                                departmentSelect.appendChild(option);
                            });
                        } else {
                            // Disable the department select if no valid faculty is selected
                            departmentSelect.disabled = true;
                        }
                    });
                </script>

                <script>
    function closeAlert(id) {
        const el = document.getElementById(id);
        if (el) {
            el.style.transition = "opacity 0.5s ease-out";
            el.style.opacity = 0;
            setTimeout(() => el.remove(), 500);
        }
    }

    // Auto-hide after 2 seconds
    window.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            closeAlert('successAlert');
            closeAlert('errorAlert');
        }, 2000);
    });
</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="dist/assets/plugins/global/plugins.bundle.js"></script>
		<script src="dist/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="dist/assets/js/custom/apps/support-center/tickets/create.js"></script>
		<script src="dist/assets/js/widgets.bundle.js"></script>
		<script src="dist/assets/js/custom/widgets.js"></script>
		<script src="dist/assets/js/custom/apps/chat/chat.js"></script>
		<script src="dist/assets/js/custom/utilities/modals/users-search.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
        @livewireScripts
        <x-toaster-hub />
	</body>
	<!--end::Body-->
</html>
