<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            <label for="select">Request:</label>
            <select onchange="location = this.value;" style="color: #333;">
                <option value="">Request</option>
                <option value="/mission_request">Mission Request</option>
                <option value="/leave_request">Leave Request</option>
            </select>
            <br><br><br>
            <label for="select">Approval:</label>
            <select onchange="location = this.value;" style="color: #333;">
                <option value="">Approval</option>
                <option value="/mission_approve">Mission Approve</option>
                <option value="/leave_approve">Leave Approve</option>
            </select>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
