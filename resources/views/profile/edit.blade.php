<x-app-layout>
    <div class="background">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pb-4">
            <div class="pt-8 p-4 sm:p-8 layer1 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 layer1 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="pb-10 p-4 sm:p-8 layer1 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
