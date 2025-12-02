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
                <div class="w-12 h-12 rounded-full samba-wave flex items-center justify-center text-white text-xl font-bold shadow-lg">B</div>
                <div>
                    <h1 class="text-lg font-bold text-white">Biricotico</h1>
                    <!-- <p class="text-xs text-amber-700">QR Code | Samba | Bares do Rio</p> -->
                </div>
            </div>
            <div class="hidden md:flex gap-4 items-center">
                <a href="#features" class="text-white text-sm ">Funcionalidades</a>
                <a href="#events" class="text-white text-sm ">Shows</a>
                <a href="#bars" class="text-white text-sm ">Bares</a>
                <a href="/register" class="text-white px-3 py-2 rounded-md bg-amber-500 text-white font-semibold shadow">Gerar QR</a>
                <a href="/admin" class="text-white px-3 py-2 rounded-md bg-amber-500 text-white font-semibold shadow">Área Restrita</a>
            </div>
        </nav>
    </header>

    <main class="pt-28">
        <section class="relative min-h-screen flex items-center justify-center bg-gray-900">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-50" style="background-image: url({{ asset('img/biricotico.jpg') }})"></div>
            <div class="absolute inset-0 bg-amber-500 opacity-5"></div>
            <div class="relative max-w-7xl mx-auto w-full py-12 md:py-20 px-4 sm:px-6 lg:px-8 text-center">
                <span class="animate-pulse" style="animation-duration: 4s;">
                    <div class="inline-block mb-5">
                        <span class="font-medium text-white rounded-lg p-4 bg-amber-500">O melhor da sua cidade</span>
                    </div>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 leading-tight">
                        <span class="text-white block mt-2">Conectando bares, samba e gente do Brasil</span>
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl text-white mb-6 sm:mb-8 leading-relaxed max-w-3xl mx-auto">
                        Aumente a festa: notícias de samba, histórias de cantores, shows, promoções exclusivas para mulheres e a união dos bares da sua cidade — tudo acessível com um único QR Code ou Link.</p>
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                        <a href="#contato" class="group inline-flex items-center gap-2 py-3 px-6 rounded-md bg-primary text-white hover:bg-amber-500 transition duration-300">
                            Procurar bares
                        </a>
                        <a href="#portfolio" class="inline-flex items-center gap-2 py-3 px-6 rounded-md border border-border text-midnight_text dark:text-white hover:border-primary transition duration-300">
                            Gere seu QR Code
                        </a>

                    </div>

                </span>
            </div>
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
                <a href="#services" class="">
                    <div class="inline-flex flex-col items-center text-white">
                        <div class="flex justify-center items-center my-5">
                            <img id="qrPreview" src="https://api.qrserver.com/v1/create-qr-code/?size=140x140&data=https://biricotico.local" alt="QR" class="w-28 h-28 object-contain" />
                        </div>
                        <span class="text-xs sm:text-sm mb-2">Veja mais</span>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </div>
                </a>

            </div>
        </section>

        <section id="features" class="max-w-6xl mx-auto px-6 py-12 ">
            <h3 class="text-2xl font-bold text-white text-center">Funcionalidades</h3>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-6 ">
                <div class="p-6 bg-amber-300 rounded-xl shadow glass flex flex-col items-center ">
                    <div class="h-10 w-10 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <h4 class="mt-3 font-bold text-black">Notícias</h4>
                    <p class="text-sm mt-1 text-black text-center">Agenda e notícias sobre samba e pagode no Rio.</p>
                </div>
                <div class="p-6 bg-amber-800 rounded-xl shadow glass flex flex-col items-center ">
                    <div class="h-10 w-10 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <h4 class="mt-3 font-bold text-white">Histórias</h4>
                    <p class="text-sm mt-1 text-white text-center">Biografias de cantores e causos dos bares.</p>
                </div>
                <div class="p-6 bg-amber-300 rounded-xl shadow glass flex flex-col items-center ">
                    <div class="h-10 w-10 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <h4 class="mt-3 font-bold text-black">União dos Bares</h4>
                    <p class="text-sm mt-1 text-slate-600 text-center">Plataforma oficial para integração de estabelecimentos.</p>
                </div>
                <div class="p-6 bg-amber-800 rounded-xl shadow glass flex flex-col items-center ">
                    <div class="h-10 w-10 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center">
                        <i class="fa-solid fa-tags"></i>
                    </div>
                    <h4 class="mt-3 font-bold text-white">Promoções</h4>
                    <p class="text-sm mt-1 text-white text-center">Anúncios, descontos e campanhas especiais — com comissão por transação.</p>
                </div>
            </div>
        </section>

        <section id="events" class="max-w-6xl mx-auto px-6 py-12">
            <!-- <div class="flex items-center justify-between "> -->
            <h3 class="text-2xl font-bold text-center text-white">Próximos Shows</h3>
            <!-- <a href="#" class="text-amber-600 font-semibold">Ver calendário</a> -->
            <!-- </div> -->


            <div class="mt-6 grid grid-cols-3 gap-6">

                <div class="antialiased text-gray-900 ">
                    <div class="bg-white rounded-lg overflow-hidden shadow-2xl  group overflow-hidden transition-transform duration-300 hover:translate-y-[-10px]">
                        <div class="h-48 w-full overflow-hidden">
                            <img class="h-full w-full object-cover transform overflow-hidden transition-transform duration-[300ms] group-hover:scale-125 object-end" src="https://images.unsplash.com/photo-1570797197190-8e003a00c846?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=968&q=80" alt="Home in Countryside" />
                        </div>

                        <div class="p-6 pb-4 group-hover:bg-gray-700 duration-[0.3s]">
                            <h4 class="mt-1 font-semibold text-xl leading-tight truncate group-hover:text-amber-600 duration-[0.3s]">Show de Samba no Rio</h4>
                            <p class="Card-info text-gray-500 mt-2 group-hover:text-amber-400">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </p>

                            <div class="mt-4 flex items-center">
                                <div class="flex-shrink-0">
                                    <a href="#">
                                        <span class="sr-only text-amber-600">Daniela Metz</span>
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                                    </a>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">
                                        <a href="#" class="hover:underline hover:text-amber-600  duration-[0.3s]">Daniela Metz</a>
                                    </p>
                                    <div class="flex space-x-1 text-sm text-gray-500 group-hover:text-white duration-[0.3s] ">
                                        <time datetime="2020-02-12 ">Feb 12, 2020</time>
                                        <span aria-hidden="true">·</span>
                                        <span>Entrada Franca</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>

        <!-- Bars / Localizado -->
        <section id="bars" class="max-w-6xl mx-auto px-6 py-12">
            <h3 class="text-2xl font-bold text-white">Bares Participantes </h3>            

            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="w-full flex flex-col bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-500 rounded-xl pb-4">
                    <div
                        class="h-[3.5rem] relative rounded-t-xl bg-cover bg-center bg-[url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxMXx8Z3JvdXAlMjBwaG90byUyMG9mZmljZXxlbnwwfDB8fHwxNzQ0MTExNDU5fDA&ixlib=rb-4.0.3&q=80&w=1080')]">
                        <img class=" absolute -bottom-8 left-2 z-10 w-[3.5rem] h-[3.5rem] rounded-full object-cover" src="https://images.unsplash.com/photo-1665686310934-8fab52b3821b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw2fHx3b21hbnxlbnwwfDB8fHwxNzQ0MTExNjkzfDA&ixlib=rb-4.0.3&q=80&w=1080" alt="avater" />
                    </div>
                    <div class="mt-10 pl-4 w-[88%] flex flex-col">
                        <h4 class="text-[14px] font-semibold dark:text-white">
                            Arts Project Manager
                            British Council
                        </h4>
                        <p class=" text-[13px] mt-1 text-gray-600 dark:text-gray-300">
                            Addis Ababa, Addis Ababa, Ethiopia
                        </p>

                        <hr class="border-[1.5px] w-12 mt-6 mb-2 border-gray-200 dark:border-gray-600 rounded" />

                        <p class="text-[13px] text-gray-600 dark:text-gray-300">3 months ago</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- Mulher no Bar -->
        <!-- Mulher no Bar Hero -->
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
                    <a href="/register" class="inline-flex items-center gap-2 px-6 py-3 rounded-full border-2 border-white text-white font-semibold hover:bg-white hover:text-rose-600 transition">
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
                        <li class="p-3 bg-white rounded">Descontos para mulheres</li>
                        <li class="p-3 bg-white rounded">Canal de denúncia</li>
                        <li class="p-3 bg-white rounded">Eventos exclusivos</li>
                        <li class="p-3 bg-white rounded">Check-in de segurança</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Stories / Histórias de Cantores e Bar -->
        <section id="stories" class="max-w-6xl mx-auto px-6 py-12">
            <h3 class="text-2xl font-bold text-white">Notícias e Histórias</h3>
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-4 bg-white rounded-xl shadow">
                    <h4 class="font-bold">Cartola — O mito</h4>
                    <p class="text-sm text-slate-600 mt-2">Biografia resumida com curiosidades e discos que marcaram época.</p>
                </div>
                <div class="p-4 bg-white rounded-xl shadow">
                    <h4 class="font-bold">Boteco da Gema — O ponto</h4>
                    <p class="text-sm text-slate-600 mt-2">A história do bar, os causos e as noites memoráveis.</p>
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
                        <li>Notícias</li>
                        <li>Shows</li>
                        <li>Bares</li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold">Contato</h5>
                    <p class="text-sm text-slate-400 mt-2">contato@biricotico.com</p>
                    <div class="mt-3 flex gap-2">
                        <button class="px-3 py-2 bg-amber-500 text-white rounded">Quero meu QR</button>
                        <button class="px-3 py-2 border border-amber-500 rounded">Seja parceiro</button>
                    </div>
                </div>
            </div>
            <div class="mt-8 text-center text-slate-500 text-sm">© 2025 Biricotico • Feito com samba ❤️</div>
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