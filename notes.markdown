# Bloco de Notas

## Campos
- [ ] Lista 1
- [x] Lista 2

> Citação

Projeto Biricotico: O QR Code Inteligente para Bares do Rio

O Biricotico é um projeto inovador que visa promover a cultura do Rio de Janeiro, especialmente a música, a dança e a alegria do povo carioca. Com um QR Code único, os clientes podem acessar uma plataforma que oferece uma variedade de serviços e informações, tornando a experiência de beber e se divertir ainda mais emocionante!

Funcionalidades:

1. - [x] Notícias sobre Samba e Pagode: O Biricotico oferece notícias atualizadas sobre os principais eventos e shows de samba e pagode do Rio de Janeiro.
2. - [ ] Histórias de Cantores: Os clientes podem ler histórias e biografias de cantores e compositores cariocas, incluindo suas carreiras, sucessos e curiosidades.
3. - [x] Show: O Biricotico oferece informações sobre os principais shows e eventos musicais do Rio de Janeiro, incluindo ingressos e horários.
4. - [ ] União dos Bares: O Biricotico é a plataforma oficial da união dos bares de um determinado bairro, promovendo a integração e a cooperação entre os estabelecimentos.
5. - [x] Localizado: O Biricotico é localizado, ou seja, os clientes podem encontrar os bares e estabelecimentos participantes próximos a eles.
6. - [ ] Mulher no Bar: O Biricotico é um espaço acolhedor para as mulheres, que podem scanejar o QR Code e acessar conteúdo exclusivo, incluindo promoções e descontos especiais.
7. - [x] Anúncios de Produtos: O Biricotico oferece anúncios de produtos e serviços relacionados à música, à dança e à noite carioca.
8. - [ ] Histórias de Bar: Os clientes podem ler histórias e anedotas sobre os bares e estabelecimentos participantes, incluindo suas histórias, especialidades e personalidades.

Outras Ideias:

- Concurso de Samba: O Biricotico pode promover concursos de samba e pagode, com prêmios e reconhecimento para os melhores artistas.
- Aulas de Dança: O Biricotico pode oferecer aulas de dança e workshops de samba e pagode, com professores experientes e qualificados.
- Festa do Biricotico: O Biricotico pode promover festas e eventos exclusivos para os clientes, com música ao vivo e DJs.

Tecnologia:

- QR Code: O Biricotico utiliza QR Codes para que os clientes possam acessar a plataforma.
- Plataforma Web: A plataforma é desenvolvida em HTML5, CSS3 e JavaScript, garantindo uma experiência de usuário fluida e responsiva.
- Banco de Dados: O Biricotico utiliza um banco de dados seguro e escalável para armazenar as informações dos clientes e as transações.

Modelo de Negócio:

- Comissão: O Biricotico cobra uma comissão sobre as transações feitas através do Pix do bar.
- Publicidade: O Biricotico oferece anúncios e promoções para os bares, gerando receita adicional.

Próximos Passos:

- Desenvolvimento: Desenvolver a plataforma e o QR Code.
- Testes: Realizar testes para garantir a estabilidade e segurança da plataforma.
- Lançamento: Lançar o Biricotico em bares selecionados do Rio de Janeiro.

O Biricotico é um projeto inovador que tem o potencial de promover a cultura do Rio de Janeiro e revolucionar a experiência dos clientes em bares e estabelecimentos noturnos. Com uma plataforma robusta e uma variedade de serviços, o Biricotico é o futuro da diversão noturna!


# Comands

composer require filament/filament:"^3.3" -W

php artisan filament:install --panels

### criar link simbólico
php artisan storage:link

php artisan migrate

php artisan db:seed


### Ngrok
ngrok http 80 --host-header=cardapiovirtual


### Criar um link simbólico (symlink)
cd /home/u233139548/domains/you.tec.br/public_html/biricotico/public

ln -s /home/u233139548/domains/you.tec.br/public_html/biricotico/storage/app/public storage
