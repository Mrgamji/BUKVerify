<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Staff Widget -->
    <x-filament::widget class="bg-white p-6 shadow rounded-lg">
        <h3 class="text-xl font-semibold mb-4">Staff</h3>
        <div class="text-3xl font-bold">{{ $staffCount }}</div>
        <div class="text-sm text-gray-500">Total number of staff members</div>
    </x-filament::widget>

    <!-- Student Widget -->
    <x-filament::widget class="bg-white p-6 shadow rounded-lg">
        <h3 class="text-xl font-semibold mb-4">Students</h3>
        <div class="text-3xl font-bold">{{ $studentCount }}</div>
        <div class="text-sm text-gray-500">Total number of students</div>
    </x-filament::widget>

    <!-- Organization Widget -->
    <x-filament::widget class="bg-white p-6 shadow rounded-lg">
        <h3 class="text-xl font-semibold mb-4">Organizations</h3>
        <div class="text-3xl font-bold">{{ $organizationCount }}</div>
        <div class="text-sm text-gray-500">Total number of organizations</div>
    </x-filament::widget>

    <!-- User Widget -->
    <x-filament::widget class="bg-white p-6 shadow rounded-lg">
        <h3 class="text-xl font-semibold mb-4">Users</h3>
        <div class="text-3xl font-bold">{{ $userCount }}</div>
        <div class="text-sm text-gray-500">Total number of registered users</div>
    </x-filament::widget>
</div>
