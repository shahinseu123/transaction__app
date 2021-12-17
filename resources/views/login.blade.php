<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
    <style>
        body {
            background: cornsilk
        }

    </style>
</head>

<body>
    <section>
        <div class="shadow-md rounded-md bg-white mx-auto w-2/6 mt-20">
            <h1 class="uppercase text-center text-3xl font-semibold p-4 border-b-2 border-gray-300">Login</h1>

            <form action="{{ route('login.action') }}" method="post">
                @csrf
                <div class="px-5 pt-3 pb-4">
                    <label for="email">Email <span class="text-red-500">*</span></label>
                    <div>
                        <input type="text" class="px-2 py-1 rounded border-2 border-gray-300 mt-1 w-full" name="email"
                            id="email" placeholder="Email">
                    </div>
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="px-5 pb-4">
                    <label for="password">Password <span class="text-red-500">*</span></label>
                    <div>
                        <input type="password" class="px-2 py-1 rounded border-2 border-gray-300 mt-1 w-full"
                            name="password" id="password" placeholder="Password">
                        @error('password')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="px-5">
                    <p>Don't have an ID? <a href="{{ route('register') }}">Register</a></p>
                </div>
                <div class="px-5 pb-4 mt-2">
                    <button type="submit"
                        class="shadow-md px-5 py-1 border-2 border-green-500 bg-green-500 text-white rounded uppercase">submit</button>
                </div>
            </form>
        </div>

    </section>
</body>

</html>
