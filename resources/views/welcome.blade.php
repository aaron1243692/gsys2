

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full w-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Welcome | {{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-full w-full min-h-screen min-w-full">

        <main class="w-full h-full flex justify-center items-center
        bg-[#fafafae0]">

            <form action="" method="post" class="w-[22rem]
            flex flex-col gap-4 p-8 rounded-lg bg-white shadow-lg
            items-center">

                <h4 class="text-center text-md">Sign In</h4>

                <div class="w-full
                flex-flex-col gap-[0.2rem]">
                    <label for="">Email or Username:</label>
                    <input type="text" name="" id=""
                    class="w-full">
                </div>

                <div class="w-full
                flex-flex-col gap-[0.2rem]">
                    <label for="">Password:</label>
                    <input type="password" name="" id=""
                    class="w-full">
                </div>

                <button type="submit"
                class="w-full bg-red-500 p-[0.3rem] text-md font-medium text-white rounded-md">Sign In</button>

            </form>

        </main>

    </body>
</html>
