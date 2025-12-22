<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Biricotico — O QR Code Inteligente para Bares do Rio</title>
    <meta name="description" content="Biricotico — QR Code inteligente para bares do Rio: shows, histórias, promoções e união dos bares." />
    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        /* Small custom animations and styles */
        .samba-wave {
            background: linear-gradient(90deg, #f97316 0%, #ef4444 50%, #f43f5e 100%);
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-6px);
            }

            100% {
                transform: translateY(0);
            }
        }

        .float {
            animation: float 4s ease-in-out infinite;
        }

        .glass {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(6px);
        }
    </style>
</head>

<body class="min-h-screen text-slate-900 bg-slate-800">
    <header class="w-full fixed top-0 left-0 z-40 bg-slate-800">
        <nav class="max-w-6xl mx-auto flex items-center justify-between p-4 md:p-6">
            <div class="flex items-center gap-3">
                <a href="/">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo Biricotico" class="w-32 md:w-40 object-contain">
                </a>
            </div>
            <div class="hidden md:flex gap-4 items-center">
                <a href="#ads" class="text-white text-sm ">Promoções</a>
                <a href="#news" class="text-white text-sm ">Notícias & Histórias</a>
                <a href="#events" class="text-white text-sm ">Shows</a>
                <a href="/register" class="text-white px-3 py-2 rounded-md bg-amber-500 text-white font-semibold shadow">Gerar QR</a>
                <a href="/admin" class="text-white px-3 py-2 rounded-md bg-amber-500 text-white font-semibold shadow">Área Restrita</a>
            </div>
        </nav>
    </header>

    <main class="pt-28">
        <section class="relative min-h-screen flex items-center justify-center bg-gray-900">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-50" style="background-image: url({{ $user->cover_image ?? asset('img/biricotico.jpg') }})"></div>
            <div class="absolute inset-0 bg-amber-500 opacity-5"></div>
            <div class="relative max-w-7xl mx-auto w-full py-12 md:py-20 px-4 sm:px-6 lg:px-8 text-center">
                <span class="animate-pulse" style="animation-duration: 4s;">
                    <div class="inline-block mb-3">
                        <img class="w-20 h-20 rounded-full object-cover ring-2 ring-amber-500" src="{{ $user->image ?? 'https://images.unsplash.com/photo-1665686310934-8fab52b3821b?auto=format&fit=crop&w=256&q=60' }}" alt="avatar" />

                    </div>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 leading-tight">
                        <span class="text-white block mt-2">{{ $user->name }}</span>
                    </h1>
                    <div class="flex items-center justify-center gap-4 mb-6">
                        <div class="text-left text-white">
                            <p class="text-sm">{{ $user->address }}{{ $user->number ? ', '.$user->number : '' }} – {{ $user->neighborhood ?? $user->city }}{{ $user->state ? ', '.$user->state : '' }}</p>
                            <p class="text-sm">{{ $user->phone }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-3 mb-8">
                        @if($user->facebook)<a class="text-white" href="{{ $user->facebook }}" target="_blank"><i class="fa-brands fa-facebook text-2xl"></i></a>@endif
                        @if($user->instagram)<a class="text-white" href="{{ $user->instagram }}" target="_blank"><i class="fa-brands fa-instagram text-2xl"></i></a>@endif
                        @if($user->twitter)<a class="text-white" href="{{ $user->twitter }}" target="_blank"><i class="fa-brands fa-x-twitter text-2xl"></i></a>@endif
                        @if($user->linkedin)<a class="text-white" href="{{ $user->linkedin }}" target="_blank"><i class="fa-brands fa-linkedin text-2xl"></i></a>@endif
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                        <a href="#contato" class="group inline-flex items-center gap-2 py-3 px-6 rounded-md bg-primary text-white hover:bg-amber-500 transition duration-300">
                            Procurar bares
                        </a>
                        <a href="" class="inline-flex items-center gap-2 py-3 px-6 rounded-md border border-border text-midnight_text dark:text-white hover:border-primary transition duration-300">
                            Gere seu QR Code
                        </a>

                    </div>

                </span>
            </div>
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
                <a href="#services" class="">
                    <div class="inline-flex flex-col items-center text-white">
                        <div class="flex justify-center items-center my-5">
                            <img id="qrPreview" src="https://api.qrserver.com/v1/create-qr-code/?size=140x140&data={{ env('APP_URL') }}{{ $user->slug }}" alt="QR" class="w-28 h-28 object-contain" />
                        </div>
                        <a href="#events" class="text-xs sm:text-sm mb-2 flex items-center flex-col gap-2">
                            <p>
                                Veja mais
                            </p>
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </a>
                    </div>
                </a>
            </div>
        </section>

        <section id="ads" class="max-w-6xl mx-auto px-6 py-12">
            <h3 class="text-2xl font-bold text-center text-white">Promoções</h3>
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($user->advertisements as $ad)
                <div class="antialiased text-gray-900 ">
                    <div class="bg-white rounded-lg overflow-hidden shadow-2xl  group overflow-hidden transition-transform duration-300 hover:translate-y-[-10px]">
                        <div class="h-48 w-full overflow-hidden">
                            <img class="h-full w-full object-cover transform overflow-hidden transition-transform duration-[300ms] group-hover:scale-125 object-end" src="{{ $ad->banner ?? 'https://images.unsplash.com/photo-1512428559087-560fa5ceab42?auto=format&fit=crop&w=1200&q=60' }}" alt="Home in Countryside" />
                        </div>

                        <div class="p-6 pb-4 group-hover:bg-gray-700 duration-[0.3s]">
                            <h4 class="mt-1 font-semibold text-xl leading-tight truncate group-hover:text-amber-600 duration-[0.3s]">{{ $ad->name }}</h4>
                            <p class="Card-info text-gray-500 mt-2 group-hover:text-amber-400">{{ $ad->description }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-slate-300">Nenhuma promoção cadastrada.</p>
                @endforelse
            </div>
        </section>

        <section id="news" class="max-w-6xl mx-auto px-6 py-12">
            <h3 class="text-2xl font-bold text-center text-white">Notícias & Histórias</h3>
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($user->news as $news)
                <div class="antialiased text-gray-900 ">
                    <div class="bg-white rounded-lg overflow-hidden shadow-2xl group overflow-hidden transition-transform duration-300 hover:translate-y-[-10px]">
                        <div class="h-48 w-full overflow-hidden">
                            <img class="h-full w-full object-cover transform overflow-hidden transition-transform duration-[300ms] group-hover:scale-125 object-end" src="{{ $news->banner ?? 'https://images.unsplash.com/photo-1512428559087-560fa5ceab42?auto=format&fit=crop&w=1200&q=60' }}" alt="Home in Countryside" />
                        </div>

                        <div class="p-6 pb-4 group-hover:bg-gray-700 duration-[0.3s]">
                            <h4 class="mt-1 font-semibold text-xl leading-tight truncate group-hover:text-amber-600 duration-[0.3s]">{{ $news->name }}</h4>
                            <p class="Card-info text-gray-500 mt-2 group-hover:text-amber-400">{{ $news->description }}</p>
                            <div class="mt-4 flex items-center">
                                <div class="flex-shrink-0">
                                    <a href="#">
                                        <span class="sr-only text-amber-600">{{ $user->name }}</span>
                                        <img class="h-10 w-10 rounded-full" src="{{ $user->image }}" alt="">
                                    </a>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">
                                        <a href="#" class="hover:text-amber-600 group-hover:text-amber-600 duration-[0.3s]">{{ $user->name }}</a>
                                    </p>
                                    <div class="flex space-x-1 text-sm text-gray-500 group-hover:text-amber-400 duration-[0.3s] ">
                                        <time datetime="{{ $news->created_at->format('Y-m-d') }}">{{ $news->created_at->format('d/m/Y') }}</time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-slate-300">Nenhuma notícia cadastrada.</p>
                @endforelse
            </div>
        </section>

        <section id="events" class="max-w-6xl mx-auto px-6 py-12">
            <h3 class="text-2xl font-bold text-center text-white">Próximos Shows</h3>
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($user->events as $event)
                <div class="antialiased text-gray-900">
                    <div class="bg-white rounded-lg overflow-hidden shadow-2xl group transition-transform duration-300 hover:-translate-y-2 relative">
                        <div class="h-48 w-full overflow-hidden relative">
                            <img
                                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-125 object-end"
                                src="{{ $event->banner ?? 'https://images.unsplash.com/photo-1512428559087-560fa5ceab42?auto=format&fit=crop&w=1200&q=60' }}"
                                alt="{{ $event->name }}" />
                        </div>

                        <div class="p-6 pt-8 transition-colors duration-300 group-hover:bg-gray-700">
                            <h4
                                class="mt-1 font-semibold text-xl leading-tight truncate transition-colors duration-300 group-hover:text-amber-600">
                                {{ $event->name }}
                            </h4>

                            <p class="Card-info text-gray-500 mt-2 transition-colors duration-300 group-hover:text-amber-400">
                                {{ $event->description }}
                            </p>

                            <div class="mt-4 text-sm text-black space-y-1 transition-colors duration-300 group-hover:text-amber-600">
                                @if($event->date_open)
                                <div class="flex items-center gap-2">
                                    <span>• Abertura: {{ \Carbon\Carbon::parse($event->date_open)->format('d/m/Y') }}</span>
                                    @if($event->time_open)
                                    <span>Horário: {{ $event->time_open }}</span>
                                    @endif
                                </div>
                                @endif

                                @if($event->date_close)
                                <div class="flex items-center gap-2">
                                    <span>• Fechamento: {{ \Carbon\Carbon::parse($event->date_close)->format('d/m/Y') }}</span>
                                    @if($event->time_close)
                                    <span>Horário: {{ $event->time_close }}</span>
                                    @endif
                                </div>
                                @endif
                            </div>

                            <div class="mt-4 flex items-center">
                                <div class="flex-shrink-0">
                                    <a href="#">
                                        <span class="sr-only text-amber-600">{{ $user->name }}</span>
                                        <img class="h-10 w-10 rounded-full" src="{{ $user->image  ?? 'https://images.unsplash.com/photo-1512428559087-560fa5ceab42?auto=format&fit=crop&w=1200&q=60' }}" alt="">
                                    </a>
                                </div>
                                <div class="ml-3">
                                    <span class="text-sm font-medium hover:text-amber-600 duration-[0.3s] group-hover:text-amber-600">{{ $user->name }}</span>
                                    <div class="flex space-x-1 text-sm text-gray-500 duration-[0.3s] group-hover:text-amber-400 ">
                                        <span aria-hidden="true">Preço: R$:</span>
                                        <span>{{ $event->price }}</span>
                                    </div>
                                </div>
                            </div>

                            @if($event->external_link)
                            <div class="mt-3">
                                <a href="{{ $event->external_link }}" target="_blank" class="text-amber-600 font-semibold">
                                    Saiba mais
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                @empty
                <p class="text-center text-slate-300">Nenhum evento cadastrado.</p>
                @endforelse
            </div>
        </section>

        <section id="women" class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-pink-500 via-rose-500 to-amber-500 opacity-90"></div>
            <div class="relative max-w-7xl mx-auto px-6 py-20 md:py-32 text-center text-white">
                <h2 class="text-4xl md:text-6xl font-extrabold tracking-tight drop-shadow-lg">
                    Mulher no Bar
                </h2>
                <p class="mt-4 text-lg md:text-xl max-w-3xl mx-auto drop-shadow">
                    Segurança, descontos e voz — um espaço feito por elas, para elas.
                    Junte-se à revolução rosa e âmbar que transforma a noite carioca.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#women-details" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white text-rose-600 font-semibold shadow-lg hover:scale-105 transition">
                        <i class="fa-solid fa-gift"></i> Ver vantagens
                    </a>
                    <a href="#women-details" class="inline-flex items-center gap-2 px-6 py-3 rounded-full border-2 border-white text-white font-semibold hover:bg-white hover:text-rose-600 transition">
                        <i class="fa-solid fa-shield-halved"></i> Quero segurança
                    </a>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-slate-800 to-transparent"></div>
        </section>

        <!-- Mulher no Bar Details -->
        <section id="women-details" class="max-w-6xl mx-auto px-6 py-12">
            <div class="md:flex md:items-center md:gap-6">
                <div class="md:w-1/2">
                    <h3 class="text-2xl font-bold text-white">Espaço acolhedor & empoderado</h3>
                    <p class="mt-2 text-white">Promoções, central de segurança, contatos úteis e eventos exclusivos. Incentivamos estabelecimentos a adotarem práticas seguras.</p>
                </div>
                <div class="md:w-1/2 mt-4 md:mt-0">
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <li class="p-3 bg-gradient-to-br from-pink-500 via-rose-500 to-amber-500 opacity-90 text-white font-bold rounded">Descontos para mulheres</li>
                        <li class="p-3 bg-gradient-to-br from-pink-500 via-rose-500 to-amber-500 opacity-90 text-white font-bold rounded">Canal de denúncia</li>
                        <li class="p-3 bg-gradient-to-br from-pink-500 via-rose-500 to-amber-500 opacity-90 text-white font-bold rounded">Eventos exclusivos</li>
                        <li class="p-3 bg-gradient-to-br from-pink-500 via-rose-500 to-amber-500 opacity-90 text-white font-bold rounded">Check-in de segurança</li>
                    </ul>
                </div>
            </div>
        </section>


        <footer class="mt-12 bg-slate-900 text-white py-12">
            <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-6">
                <div>
                    <h4 class="text-xl font-bold">Biricotico</h4>
                    <p class="text-sm text-slate-300 mt-2">QR Code inteligente para bares do Rio — cultura, segurança e diversão.</p>
                </div>
                <div>
                    <h5 class="font-semibold">Links</h5>
                    <ul class="mt-2 text-sm text-slate-400 space-y-1">
                        <a href="#ads" class="text-white hover:text-amber-400 transition"><li>Promoções</li></a>
                        <a href="#news" class="text-white hover:text-amber-400 transition"><li>Notícias & Histórias</li></a>
                        <a href="#events" class="text-white hover:text-amber-400 transition"><li>Shows</li></a>
                        <a href="#women" class="text-white hover:text-amber-400 transition"><li>Mulheres no Bar</li></a>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold">Contato</h5>
                    <p class="text-sm text-slate-400 mt-2">{{ $user->email }}</p>
                    <p class="text-sm text-slate-400 mt-2">{{ $user->phone }}</p>
                    <p class="text-sm text-slate-400 mt-2">{{ $user->address . ', ' . $user->number . ', ' . $user->neighborhood . ', ' . $user->city . ', ' . $user->state }}</p>
                    <!-- <div class="mt-3 flex gap-2">
                        <button class="px-3 py-2 bg-amber-500 text-white rounded">Quero meu QR</button>
                        <button class="px-3 py-2 border border-amber-500 rounded">Seja parceiro</button>
                    </div> -->

                    <div class="mt-4 w-full md:w-1/2">
                        @if($user->location_link)
                             <div class="mb-2">
                                <a href="{{ $user->location_link }}" target="_blank" class="inline-flex items-center gap-2 text-amber-500 hover:text-amber-400 font-semibold transition">
                                    <i class="fa-solid fa-map-location-dot"></i> Ver no Google Maps
                                </a>
                             </div>
                        @endif
                        <iframe
                            src="https://maps.google.com/maps?q={{ urlencode(($user->address ?? '') . ' ' . ($user->number ?? '') . ', ' . ($user->neighborhood ?? '') . ', ' . ($user->city ?? '') . ' - ' . ($user->state ?? '')) }}&t=&z=15&ie=UTF8&iwloc=&output=embed"
                            width="100%"
                            height="250"
                            class="rounded-lg shadow-lg border-0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

            </div>
            <a href="https://phelipecurty.vercel.app" target="_blank">
                <div class="mt-8 text-center text-slate-500 text-sm">© 2025 Phelipe Curty</div>
            </a>
        </footer>
    </main>

    <script>
        function generateQR() {
            const url = prompt('Informe o link para o QR (ex: https://seubardigital.com)') || 'https://biricotico.local';
            const size = 300;
            const api = `https://api.qrserver.com/v1/create-qr-code/?size=${size}x${size}&data=${encodeURIComponent(url)}`;
            document.getElementById('qrPreview').src = api;
        }

        function downloadQR() {
            const img = document.getElementById('qrPreview');
            const a = document.createElement('a');
            a.href = img.src;
            a.download = 'biricotico-qr.png';
            a.click();
        }
    </script>
</body>

</html>