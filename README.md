## Build

Para rodar o projeto é necessário ter o docker instalado na máquina e seguir a sequência:
1. Clonar e acessar o repositório;
2. Na pasta raiz do repositório, executar o comando que irá gerar o vendor do projeto: <br /><code>docker run --rm \\
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \\
    -w /var/www/html \\
    laravelsail/php83-composer:latest \\
    composer install --ignore-platform-reqs</code><br />
3. Executar o container:<br/><code>./vendor/bin/sail up -d</code>
4. Gerar o arquivo .env:<br/>
<code>cp .env.example .env</code>
5. Gerar a chave:
<br/><code>./vendor/bin/sail php artisan key:generate</code>
6. Rodar os migrations (irá também criar e configurar o banco):
<br/><code>./vendor/bin/sail php artisan migrate</code>

## Linha de desafio

Para implementar a importação dos arquivos é necessário acessar as rotas da api que simulam os endpoints das apis dos dois arquivos simulados
<br /><code>
localhost/api/revandamais/api/estoque
localhost/api/webmotors/api/v1/estoque
</code>
ao acessar estas rotas, é pilhado em uma fila os jobs que pode ser executados rodado com o comando
<br /><code>
./vendor/bin/sail php artisan queue:work
</code>
Alguns patterns e padrões implementados:
- Validação dos requests de entrada;
- Camada de Service
- Camada de DTO
- Padronização do repository com interface, apesar do ORM já trabalhar como um repository, foi implementada uma camada separada da Model para ilustrar como posso trabalhar outros recursos do sistema que podem variar de fornecedor
- Inversão de dependência
- Padronização da saída da API com resources e Adapter

Pelo prazo de entrega por min estabelecido estar se finalizando, não conseguirei implementar o último requisito, o qual utilizaria o liveware para solucionar.
- Uma vez carregada a tela de estoque as requisições subsequentes não devem recarregar
a página.
