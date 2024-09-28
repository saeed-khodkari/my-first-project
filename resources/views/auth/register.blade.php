<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- CSS jalaali-datepicker -->
    <link href="https://cdn.jsdelivr.net/npm/jalalidatepicker@0.6.0/dist/jalalidatepicker.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- First Name -->
            <div>
                <label for="first_name">{{ __('First Name') }}</label>
                <input id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus autocomplete="given-name" />
                @error('first_name')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <label for="last_name">{{ __('Last Name') }}</label>
                <input id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name" />
                @error('last_name')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Mobile Number -->
            <div class="mt-4">
                <label for="mobile">{{ __('Mobile Number') }}</label>
                <div class="flex items-center">
                    <span class="inline-flex items-center px-3 text-gray-500 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">
                        +989
                    </span>
                    <input id="mobile_suffix" class="block mt-1 w-full rounded-none rounded-r-md" type="text" name="mobile_suffix" value="{{ old('mobile_suffix') }}" required maxlength="9" pattern="[0-9]{9}" placeholder="912345678" />
                </div>
                @error('mobile_suffix')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Birthdate -->
            <div class="mt-4">
                <label for="birthdate">{{ __('Birthdate') }}</label>
                <input id="birthdate" class="block mt-1 w-full" type="text" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="off" data-jdp="true" />
                @error('birthdate')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Address -->
            <div class="mt-4">
                <label for="address">{{ __('Address') }}</label>
                <textarea id="address" class="block mt-1 w-full" name="address" rows="3" required>{{ old('address') }}</textarea>
                @error('address')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Profile Picture (اختیاری) -->
            <div class="mt-4">
                <label for="profile_picture">{{ __('Profile Picture (Optional)') }}</label>
                <input id="profile_picture" class="block mt-1 w-full" type="file" name="profile_picture" accept="image/png, image/jpeg" />
                @error('profile_picture')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <button type="submit" class="ms-4 bg-blue-500 text-white py-2 px-4 rounded">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>

    <!-- JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jalalidatepicker@0.6.0/dist/jalalidatepicker.min.js"></script>

    <!-- فعال‌سازی تقویم جلالی -->
    <script>
        jalaliDatepicker.startWatch();
    </script>
</body>
</html>
