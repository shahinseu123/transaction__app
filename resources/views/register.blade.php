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
            <h1 class="uppercase text-center text-3xl font-semibold p-4 border-b-2 border-gray-300">Register</h1>
            <form action="{{ route('register.action') }}" method="post">
                @csrf
                <div class="px-5 pt-3 pb-4">
                    <label for="name">Name <span class="text-red-500">*</span></label>
                    <div>
                        <input required type="text" class="px-2 py-1 rounded border-2 border-gray-300 mt-1 w-full"
                            name="name" id="name" placeholder="Name">
                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="px-5  pb-4">
                    <label for="email">Email <span class="text-red-500">*</span></label>
                    <div>
                        <input required type="text" class="px-2 py-1 rounded border-2 border-gray-300 mt-1 w-full"
                            name="email" id="email" placeholder="Email">
                        @error('email')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="px-5 pb-4">
                    <label for="password">Password <span class="text-red-500">*</span></label>
                    <div>
                        <input required type="password" class="px-2 py-1 rounded border-2 border-gray-300 mt-1 w-full"
                            name="password" id="password" placeholder="Password">
                        @error('password')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="px-5 pb-4">
                    <label for="password_confirmation">Confirm password <span class="text-red-500">*</span></label>
                    <div>
                        <input required type="password" class="px-2 py-1 rounded border-2 border-gray-300 mt-1 w-full"
                            name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                        @error('password_confirmation')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="px-5">
                    <p>Already registered? <a href="{{ route('login') }}">Login</a></p>
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
