<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="max-w-4xl mx-auto px-6 grid grid-cols-8 gap-12 mt-16">
        <div class="col-span-2 border-r border-slate-200 space-y-6">
            @auth
            <ul>
                <li>
                    <span href="" class="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">
                        {{ auth()->user()->name }}
                    </span>
                </li>
                <li>
                    <a href="" class="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">
                        Feed
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="" class="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">
                        My books
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="" class="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">
                        Add a book
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="" class="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">
                        Friend
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="" class="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">
                        Logout
                    </a>
                </li>
            </ul>
            @endauth

            @guest
            <ul>
                <li>
                    <a href="" class="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">
                        Login
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="/auth/register" class="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">
                        Register
                    </a>
                </li>
            </ul>
            @endguest
        </div>
        <div class="col-span-6">
            @isset($header)
            <div class="font-bold text-2xl text-slate-800">
                {{ $header }}
            </div>
            @endisset
            {{ $slot }}
        </div>
    </div>
</body>

</html>
