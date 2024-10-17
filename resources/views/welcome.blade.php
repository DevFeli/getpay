<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GetPay - Bem-vindo!</title>

    <!-- Styles -->
    @vite('resources/css/app.css')

    {{-- fonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50" style="font-family: 'Roboto', sans-serif;">
    <header class="w-full absolute bg-[#145259] bg-opacity-90 backdrop-blur-lg shadow-lg">
        <section class="max-w-7xl flex justify-between m-auto p-6">
            <a href="{{ route('welcome') }}" class="w-36 cursor-pointer">
                <img src="{{ asset('images/logo/logo-getpay.png') }}" alt="logo" class="rounded-md">
            </a>
            @if (Route::has('login'))
                <nav class="flex flex-1 justify-end gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 bg-[#45858C] hover:bg-[#18B9D2] text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Acessar
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 bg-[#45858C] hover:bg-[#18B9D2] text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Criar conta
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </section>
    </header>

    <main class="m-0 p-0 h-screen">
        <img src="{{ asset('images/background/pexels-shvetsa-4482896.jpg') }}" alt="foto de backgorund do site"
            class="w-full h-full object-cover">
    </main>
    <section class="absolute top-[30%] w-full m-auto flex justify-center">
        <div class="w-[700px] max-w-[80%] bg-white/40 backdrop-blur-lg border border-white/20 rounded-lg p-6 shadow-lg">
            <p class="text-justify text-xl" style="font-family: 'Roboto', sans-serif;">
                Transforme a gestão de assinaturas da sua empresa com o <strong>GETPAY</strong>, a plataforma completa
                para automatizar cobranças recorrentes. Ofereça aos seus clientes a facilidade de adquirir planos e
                realizar pagamentos mensais de forma automática, sem complicações. Com o <strong>GETPAY</strong>, você
                acompanha métricas em tempo real, gerencia usuários, pagamentos, cria planos personalizados e monitora
                sua receita. Tudo isso com diversos meios de pagamento integrados. Simplifique suas cobranças e foque no
                crescimento do seu negócio!
            </p>
        </div>
    </section>
</body>

</html>
