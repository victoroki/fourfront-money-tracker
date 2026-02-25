<x-admin-layout>
    <x-slot name="pageTitle">
        Profile Settings
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="space-y-6">
            <!-- Profile Information -->
            <div class="bg-white rounded-xl shadow-card overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Profile Information</h2>
                    <p class="mt-1 text-sm text-gray-500">Update your account profile information and email address.</p>
                </div>
                <div class="p-6">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white rounded-xl shadow-card overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Update Password</h2>
                    <p class="mt-1 text-sm text-gray-500">Ensure your account is using a long, random password to stay secure.</p>
                </div>
                <div class="p-6">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-white rounded-xl shadow-card overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Delete Account</h2>
                    <p class="mt-1 text-sm text-gray-500">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                </div>
                <div class="p-6">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
