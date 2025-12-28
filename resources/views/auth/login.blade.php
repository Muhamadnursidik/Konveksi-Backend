<!doctype html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" dir="ltr">

<head>
    <title>Login</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
    <div class="auth-main relative">
        <div class="auth-wrapper v1 flex items-center w-full h-full min-h-screen">
            <div class="auth-form flex items-center justify-center grow flex-col min-h-screen relative p-6 ">
                <div class="w-full max-w-[350px] relative">
                    <div class="auth-bg ">
                        <span
                            class="absolute top-[-100px] right-[-100px] w-[300px] h-[300px] block rounded-full bg-theme-bg-1 animate-[floating_7s_infinite]"></span>
                        <span
                            class="absolute top-[150px] right-[-150px] w-5 h-5 block rounded-full bg-primary-500 animate-[floating_9s_infinite]"></span>
                        <span
                            class="absolute left-[-150px] bottom-[150px] w-5 h-5 block rounded-full bg-theme-bg-1 animate-[floating_7s_infinite]"></span>
                        <span
                            class="absolute left-[-100px] bottom-[-100px] w-[300px] h-[300px] block rounded-full bg-theme-bg-2 animate-[floating_9s_infinite]"></span>
                    </div>
                    <!-- END BACKGROUND -->
                    <div class="w-full max-w-[350px]">

                        <div class="card shadow-none">
                            <div class="card-body !p-10">

                                <div class="text-center mb-6">
                                    <img src="{{ asset('assets/images/logo-dark.svg') }}" class="mx-auto auth-logo" />
                                </div>

                                <h4 class="text-center mb-4">Login</h4>

                                <!-- session status -->
                                <x-auth-session-status class="mb-3" :status="session('status')" />

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="{{ old('email') }}" required autofocus />
                                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" required />
                                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                                    </div>

                                    <!-- Remember -->
                                    <div class="flex justify-between items-center mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input input-primary" type="checkbox"
                                                name="remember" id="remember" />
                                            <label class="form-check-label text-muted" for="remember">
                                                Remember me
                                            </label>
                                        </div>

                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-primary-500">
                                                Forgot Password?
                                            </a>
                                        @endif
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-full">
                                            Login
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/icon/custom-icon.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/component.js') }}"></script>
        <script src="{{ asset('assets/js/theme.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>

        <script>
            layout_change('false');
        </script>


        <script>
            layout_theme_sidebar_change('dark');
        </script>


        <script>
            change_box_container('false');
        </script>

        <script>
            layout_caption_change('true');
        </script>

        <script>
            layout_rtl_change('false');
        </script>

        <script>
            preset_change('preset-1');
        </script>

        <script>
            main_layout_change('vertical');
        </script>
</body>

</html>
