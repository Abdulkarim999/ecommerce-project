<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __(' Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('verify.store') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="code" class="block mt-1 w-full"
                            type="text"
                            name="code"
                            required  />

            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
