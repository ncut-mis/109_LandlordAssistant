<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('image/login.png') }}" alt="Your Logo" style="width: 150px; height: 150px;">
        </x-slot>


        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2 style="text-align: center; font-size: 24px; color: #333;">登入</h2>
            <div>
                <x-label for="email" value="電子信箱" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="密碼" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">

            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('register') }}" class="ml-4" style="background-color: #000; border-radius: 9999px; color: #fff; padding: 4px 11px; text-decoration: none; font-family: '微軟正黑體', sans-serif; font-size: 15px;">
                    未有帳號前往註冊
                </a>

                <x-button class="ml-4" style="background-color: #000; border-radius: 9999px; color: #fff; font-family: '微軟正黑體', sans-serif;">
                    登入
                </x-button>
            </div>
        </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
