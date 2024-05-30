<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tailwind Volt Template</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/images/favicon.png')}}"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
        @livewireStyles
    </head>
    <body class="h-full bg-gray-100">
        <div class="min-h-full">
            <livewire:shared.topnav/>
            <header class="bg-white shadow">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$title}}</h1>
                </div>
            </header>
            <main>
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{$slot}}
                </div>
            </main>
        </div>
        @livewireScripts
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @if (session()->has('message'))
                    toastr.options = {
                        "positionClass": "toast-bottom-right",
                    }

                    switch ("{{session('type')}}") {
                        case "success":
                            toastr.success("{{session('message')}}")
                            break;
                        case 'warning':
                            toastr.warning("{{session('message')}}")
                            break;
                        case 'error':
                            toastr.error("{{session('message')}}")
                            break;
                        default:
                            toastr.info("{{session('message')}}")
                            break;
                    }
                @endif

                Livewire.on('alert', param => {
                    toastr.options = {
                        "positionClass": "toast-bottom-right",
                    }

                    switch (param.type) {
                        case "success":
                            toastr.success(param.message)
                            break;
                        case 'warning':
                            toastr.warning(param.message)
                            break;
                        case 'error':
                            toastr.error(param.message)
                            break;
                        default:
                            toastr.info(param.message)    
                            break;
                    }
                });
            });
        </script>
        @yield('script')
    </body>
</html>