<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Registrar — Biricotico</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[radial-gradient(ellipse_at_top_left,_var(--tw-gradient-stops))] from-amber-50 via-amber-100 to-yellow-50 text-slate-900">
    <header class="w-full">
        <nav class="max-w-md mx-auto flex items-center justify-center p-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-amber-500 flex items-center justify-center text-white text-lg font-bold">B</div>
                <h1 class="text-xl font-bold">Biricotico</h1>
            </div>
        </nav>
    </header>

    <main class="px-4">
        <section class="max-w-md mx-auto bg-white rounded-xl shadow p-6">
            <h2 class="text-2xl font-bold text-slate-900">Criar conta</h2>
            <p class="mt-2 text-sm text-slate-600">Preencha os dados para começar.</p>

            @if ($errors->any())
                <div class="mt-4 rounded-md bg-red-50 p-3 text-sm text-red-700">
                    <ul class="list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="mt-6 space-y-4" method="post" action="{{ route('register') }}">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700">Nome</label>
                    <input id="name" name="name" type="text" required autocomplete="name" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-500" />
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">E-mail</label>
                    <input id="email" name="email" type="email" required autocomplete="email" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-500" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700">Senha</label>
                    <input id="password" name="password" type="password" required autocomplete="new-password" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-500" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Confirmar senha</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 text-slate-900 focus:outline-none focus:ring-2 focus:ring-amber-500" />
                </div>

                <button type="submit" class="w-full rounded-md bg-amber-500 px-4 py-2.5 text-white font-semibold hover:bg-amber-600">Registrar</button>
            </form>
        </section>
    </main>
</body>
</html>