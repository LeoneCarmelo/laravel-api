<section>
    <header>
        <h2 class="text-lg font-medium text-light fw-semibold">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-muted fw-semibold">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-2">
            <label for="current_password" class="text-light">{{__('Current Password')}}</label>
            <input class="mt-1 form-control bg-transparent border-0 border-bottom rounded-0 fw-semibold" type="password" name="current_password" id="current_password" autocomplete="current-password">
            @error('current_password')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('current_password') }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="password" class="text-light">{{__('New Password')}}</label>
            <input class="mt-1 form-control border-bottom fw-semibold" type="password" name="password" id="password" autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('password')}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-2">

            <label for="password_confirmation" class="text-light">{{__('Confirm Password')}}</label>
            <input class="mt-1 form-control bg-transparent border-0 border-bottom rounded-0 fw-semibold" type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password">
            @error('password_confirmation')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('password_confirmation')}}</strong>
            </span>
            @enderror
        </div>

        <div class="d-flex align-items-center justify-content-end gap-4">
            <button type="submit" class="btn fw-bold fs-3">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
            <script>
                const show = true;
                setTimeout(() => show = false, 2000)
                const el = document.getElementById('status')
                if (show) {
                    el.style.display = 'block';
                }
            </script>
            <p id='status' class=" fs-5 text-muted">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
