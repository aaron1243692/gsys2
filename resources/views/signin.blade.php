@extends('layout.app')

@section('title', 'Login')

@section('content')

    <main class="relative flex min-h-screen w-full items-center justify-center overflow-hidden bg-[radial-gradient(circle_at_top,_#e0f2fe,_#f8fafc_42%,_#dbeafe_100%)] px-4 py-10
    bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('images/square.jpg') }}');">

        <article class="w-[70%] rounded-xl shadow-xl shadow-black/20
        flex flex-row">

            <div class="relative w-[60%] overflow-hidden rounded-l-2xl text-white p-2">

                <div
                    class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                    style="background-image: url('{{ asset('images/square.jpg') }}');"
                ></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black via-black/70 via-black/80 via-black/90 to-transparent"></div>
`
                <div class="relative flex h-full flex-col justify-between p-8"

                <!-- Top Section -->
                <div class="flex flex-col justify-center items-center gap-5">
                    <!-- Logo Container -->
                    <div class="flex h-40 w-40 items-center justify-center overflow-hidden rounded-full border border-black/40 bg-white/15 shadow-xl ring-4 ring-white/10 backdrop-blur-md">
                        <img src="{{ asset('images/square.jpg') }}" alt="GSYS temporary logo" class="h-full w-full object-cover">
                    </div>
                </div>

                <!-- Middle Content -->
                <div class="mt-10 max-w-md">

                    <h3 class="font-bold leading-tight">
                        Welcome to GSYS
                    </h3>

                    <p class="mt-2 text-blue-100 text-sm leading-relaxed">
                        View and manage student grades, academic results, and performance reports in real time.
                        A centralized system designed for accuracy, efficiency, and academic control.
                    </p>

                </div>

                <!-- Bottom -->
                <div class="text-xs text-blue-100 mt-10">
                    © 2026 GSYS Academic System, Cauayan National High School.
                </div>

                </div>

            </div>

            <form class="w-[40%] p-4 gap-3 rounded-r-xl
            flex flex-col items-center justify-center
            bg-white border-1 border-black/30">

                <h3>Sign In</h3>

                <div class="w-full
                flex flex-col justify-center">
                    <label for="email" class="ml-1">Email or Username</label>
                    <input type="text" id="email"
                    class="border-1 border-black/50 px-2 py-1 rounded-full
                    outline-none
                    ">
                </div>

                <div class="w-full
                flex flex-col justify-center">
                    <label for="password" class="ml-1">Password</label>
                    <input type="password" id="password"
                    class="border-1 border-black/50 px-2 py-1 rounded-full
                    outline-none
                    ">
                </div>

                <button type="submit"
                style="border-radius: 2rem;"
                class="w-full
                flex items-center justify-center
                text-white border-radius-full
                hover:scale-105 transition duration-200
                bg-black p-2">Sign In</button>

                <p>Don't Have An Account? <a href="/signup" class="text-blue-500 hover:underline">Sign Up</a></p>

            </form>

        </article>

    </main>

@endsection
