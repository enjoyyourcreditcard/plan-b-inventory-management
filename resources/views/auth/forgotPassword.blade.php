<!DOCTYPE html>

<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{asset(" dist/images/logo.svg")}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Dashboard - Tinker - Tailwind HTML Admin Template</title>
    <!-- BEGIN: CSS Assets-->
    <!-- END: CSS Assets-->


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />


</head>

<body>
    <div class="w-5/12 mx-auto">
        <div class="intro-y box mt-32">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <label for="current_password" class="font-medium text-base mr-auto">{{ __('Current Password') }}</label>
            </div>
            <div class="p-5">
                <form action="{{ route('updatePassword') }}" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label for="change-password-form-3" class="form-label">Old Password</label>
                        <input id="change-password-form-3" type="password" class="form-control" @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current_password" placeholder="Input Old Password">
                    </div>
                    <div>
                        <label for="change-password-form-1" class="form-label">New Password</label>
                        <input id="password" type="password" class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Input Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                    </div>
                    <div class="mt-3">
                        <label for="change-password-form-2" class="form-label">Confirm Password</label>
                        <input id="change-password-form-2" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Change Password</button>
                </form>
            </div>
        </div>  
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/whtransaction.js') }}"></script>
    <script src="{{ asset('dist/js/app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/master.js') }}" defer></script>
    <script src="{{ asset('js/token.js') }}" defer></script>


    @yield( "javaScript" )

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
</html>