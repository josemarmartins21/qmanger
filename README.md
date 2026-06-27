# 🚀 QoS Tel - QManager

> Sistema web gestão de clientes da QoS Tel.

---

## 📋 Descrição

Este projeto é uma aplicação web construída com o framework **Laravel**, desenvolvida com o objetivo de facilitar o gerênciamento dos dados dos clientes da QoS Tel. O sistema destina-se a funcionários da QoS Tel, oferecendo uma interface moderna, responsiva e de fácil utilização.

---

## 🛠️ Tecnologias utilizadas

| Tecnologia | Versão recomendada | Finalidade |
|---|---|---|
| PHP | >= 8.3 | Linguagem de programação principal |
| Laravel | >= 13.x | Framework back-end |
| Composer | >= 2.x | Gestão de dependências PHP |
| Node.js | >= 21.x | Ambiente de execução JavaScript |
| NPM | >= 10.x | Gestão de dependências front-end |
| Tailwind CSS | >= 4.x | Framework de estilização utilitária |
| Vite | >= 5.x | Bundler e servidor de desenvolvimento front-end |
| MySQL / PostgreSQL | >= 8.x / 15.x | Base de dados relacional |

---

## ✅ Pré-requisitos

Antes de iniciar, certifique-se de que o seu ambiente possui os seguintes recursos instalados e configurados:

- **PHP** >= 8.3 com as extensões: `pdo`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`
- **Composer** >= 2.x
- **Node.js** >= 20.x
- **NPM** >= 10.x
- **MySQL** >= 8.x ou **PostgreSQL** >= 15.x (ou outro banco suportado pelo Laravel)
- **Git**

---

## 📥 Clonando o repositório

```bash
git clone https://github.com/josemarmartins21/qmanager.git
cd qmanager
```

---

## 📦 Instalando as dependências

### Dependências PHP (back-end)

O Composer irá instalar todos os pacotes definidos no arquivo `composer.json`:

```bash
composer install
```

### Dependências JavaScript (front-end)

O NPM irá instalar todos os pacotes definidos no arquivo `package.json`, incluindo o Tailwind CSS e o Vite:

```bash
npm install
```

---

## ⚙️ Configuração do ambiente

### 1. Copiar o arquivo de ambiente

**Linux / macOS:**

```bash
cp .env.example .env
```

**Windows:**

```bash
copy .env.example .env
```

### 2. Gerar a chave da aplicação

O Laravel utiliza uma chave criptográfica para proteger sessões, cookies e dados sensíveis. Este comando gera e insere a chave automaticamente no arquivo `.env`:

```bash
php artisan key:generate
```

### 3. Configurar as variáveis de ambiente

Abra o arquivo `.env` e configure as seguintes variáveis de acordo com o seu ambiente local:

```env
APP_NAME="Nome do Projeto"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

> **Observação:** Garanta que o banco de dados já esteja criado antes de executar as migrations. Crie-o manualmente via cliente SQL ou pelo terminal com `CREATE DATABASE nome_do_banco;`.

---

## 🗄️ Executando as migrations

As **migrations** são a forma como o Laravel controla e versiona a estrutura do banco de dados. Cada migration representa uma alteração no esquema (criar tabelas, adicionar colunas, etc.).

Para criar todas as tabelas no banco configurado:

```bash
php artisan migrate
```

---

## 🌱 Seeders e Factories

### O que são Migrations

Migrations são arquivos PHP que descrevem a estrutura das tabelas do banco de dados. Permitem que toda a equipa compartilhe e versione o esquema do banco sem precisar exportar ou importar arquivos SQL manualmente.

### O que são Seeders

Seeders são classes responsáveis por popular o banco de dados com dados iniciais ou de teste. São úteis para criar registos padrão (como utilizadores administradores, categorias, configurações) que a aplicação necessita para funcionar.

### O que são Factories

Factories são classes utilizadas para gerar dados fictícios de forma automatizada e repetível. Trabalham em conjunto com a biblioteca **Faker** para criar registos realistas (nomes, e-mails, datas, etc.) durante o desenvolvimento e nos testes automatizados.

---

### Comandos disponíveis

**Executar apenas as migrations:**

```bash
php artisan migrate
```

**Executar migrations e popular o banco com seeders:**

```bash
php artisan migrate --seed
```

**Recriar completamente o banco (apaga tudo e recria):**

```bash
php artisan migrate:fresh
```

> **Observação:** Este comando apaga **todos os dados** existentes. Utilize apenas em ambiente de desenvolvimento.

**Recriar o banco e executar todos os seeders:**

```bash
php artisan migrate:fresh --seed
```

**Executar um seeder específico:**

```bash
php artisan db:seed --class=NomeDoSeeder
```

**Executar todos os seeders sem recriar o banco:**

```bash
php artisan db:seed
```

**Gerar dados com Factory via Tinker:**

```bash
php artisan tinker
```

Dentro do Tinker, execute:

```php
App\Models\User::factory()->count(10)->create();
```

#### Quando utilizar cada comando

| Situação | Comando recomendado |
|---|---|
| Primeira instalação com dados iniciais | `migrate --seed` |
| Resetar ambiente de testes | `migrate:fresh --seed` |
| Adicionar novas migrations sem perder dados | `migrate` |
| Popular apenas uma tabela específica | `db:seed --class=NomeDoSeeder` |
| Criar volumes grandes de dados fictícios | Tinker + Factory |

---

## 🎨 Compilação dos assets

O Vite é responsável por compilar e servir os ficheiros CSS (Tailwind) e JavaScript da aplicação.

### Modo desenvolvimento

Inicia o servidor Vite com Hot Module Replacement (HMR), que atualiza o browser automaticamente a cada alteração nos ficheiros front-end:

```bash
npm run dev
```

### Build para produção

Compila, minifica e optimiza todos os assets para o ambiente de produção:

```bash
npm run build
```

> **Observação:** Em produção, execute sempre `npm run build` antes de fazer o deploy. O modo `dev` não deve ser utilizado em ambientes produtivos.

---

## ▶️ Iniciando o projeto

### Servidor Laravel (back-end)

```bash
php artisan serve
```

O servidor ficará disponível em: `http://127.0.0.1:8000`

### Servidor Vite (front-end)

Em paralelo com o Laravel, inicie o servidor de desenvolvimento do Vite:

```bash
npm run dev
```

### Comando integrado (se configurado no projeto)

Alguns projetos Laravel configuram um script no `composer.json` que inicia ambos os servidores simultaneamente:

```bash
composer run dev
```

> **Observação:** Utilize `php artisan serve` + `npm run dev` em janelas de terminal separadas quando o comando `composer run dev` não estiver disponível no projeto.

---

## 🔄 Fluxo recomendado para primeira instalação

Execute os comandos abaixo na ordem indicada para configurar o projeto do zero:

```bash
# 1. Clonar o repositório
git clone https://github.com/seu-usuario/nome-do-projeto.git
cd nome-do-projeto

# 2. Instalar dependências PHP
composer install

# 3. Instalar dependências JavaScript
npm install

# 4. Criar o arquivo de ambiente (Linux/macOS)
cp .env.example .env
# Windows: copy .env.example .env

# 5. Gerar a chave da aplicação
php artisan key:generate

# 6. Configurar o banco de dados no arquivo .env
# (editar manualmente as variáveis DB_*)

# 7. Criar as tabelas e popular com dados iniciais
php artisan migrate --seed

# 8. Iniciar o servidor Vite (num terminal)
npm run dev

# 9. Iniciar o servidor Laravel (noutro terminal)
php artisan serve
```

Aceda à aplicação em: **http://127.0.0.1:8000**

---

## 📖 Resumo dos comandos

| Comando | Descrição |
|---|---|
| `composer install` | Instala as dependências PHP do projeto |
| `npm install` | Instala as dependências JavaScript do projeto |
| `cp .env.example .env` | Cria o arquivo de configuração do ambiente |
| `php artisan key:generate` | Gera e define a chave criptográfica da aplicação |
| `php artisan migrate` | Executa todas as migrations pendentes |
| `php artisan migrate --seed` | Executa migrations e popula o banco com seeders |
| `php artisan migrate:fresh` | Recria todo o esquema do banco do zero |
| `php artisan migrate:fresh --seed` | Recria o banco e executa todos os seeders |
| `php artisan db:seed` | Executa todos os seeders sem recriar o banco |
| `php artisan db:seed --class=Nome` | Executa um seeder específico |
| `php artisan tinker` | Abre o REPL interativo do Laravel |
| `npm run dev` | Inicia o servidor Vite em modo desenvolvimento |
| `npm run build` | Compila os assets para produção |
| `php artisan serve` | Inicia o servidor de desenvolvimento Laravel |
| `composer run dev` | Inicia Laravel e Vite simultaneamente (se configurado) |
| `php artisan optimize:clear` | Limpa todos os caches da aplicação |
| `php artisan config:clear` | Limpa o cache de configuração |
| `php artisan route:clear` | Limpa o cache de rotas |
| `php artisan cache:clear` | Limpa o cache da aplicação |
| `php artisan view:clear` | Limpa o cache de views compiladas |
| `composer dump-autoload` | Regenera o mapa de autoload do Composer |

---

## 📁 Estrutura do projeto

```text
qmanager/
├── app/                    # Núcleo da aplicação (Models, Controllers, Services, etc.)
│   ├── Http/
│   │   ├── Controllers/    # Controladores da aplicação
│   │   └── Middleware/     # Middlewares HTTP
│   ├── Models/             # Modelos Eloquent (representação das tabelas)
│   └── Providers/          # Service Providers do Laravel
├── bootstrap/              # Inicialização do framework
├── config/                 # Arquivos de configuração (database, mail, cache, etc.)
├── database/
│   ├── factories/          # Factories para geração de dados fictícios
│   ├── migrations/         # Migrations para controlo do esquema do banco
│   └── seeders/            # Seeders para popular o banco com dados iniciais
├── public/                 # Ponto de entrada da aplicação (index.php, assets compilados)
├── resources/
│   ├── css/                # Ficheiros CSS / Tailwind
│   ├── js/                 # Ficheiros JavaScript
│   └── views/              # Templates Blade (HTML da aplicação)
├── routes/
│   ├── web.php             # Rotas da interface web
│   └── api.php             # Rotas da API (se aplicável)
├── storage/                # Logs, cache, ficheiros enviados pelos utilizadores
├── tests/                  # Testes automatizados (Feature e Unit)
├── vendor/                 # Dependências PHP geridas pelo Composer (não versionar)
├── .env                    # Variáveis de ambiente locais (não versionar)
├── .env.example            # Modelo do arquivo de ambiente
├── composer.json           # Dependências e scripts PHP
├── package.json            # Dependências e scripts JavaScript
└── vite.config.js          # Configuração do Vite
```

---

## 🔧 Solução para erros comuns

### ❌ Erro: `No application encryption key has been specified`

A chave da aplicação não foi gerada. Execute:

```bash
php artisan key:generate
```

---

### ❌ Erro: `Permission denied` em `storage/` ou `bootstrap/cache/`

O servidor web não tem permissão de escrita nas pastas necessárias. Execute:

```bash
chmod -R 775 storage bootstrap/cache
```

---

### ❌ Erro de conexão com o banco de dados (`SQLSTATE[HY000] [2002]`)

Verifique se:
1. O serviço do banco de dados está em execução.
2. As credenciais no `.env` estão corretas (`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).
3. O banco de dados indicado em `DB_DATABASE` foi criado.

---

### ❌ Erro com o Vite: `Failed to resolve import` ou página sem estilos

Certifique-se de que o servidor Vite está em execução em modo desenvolvimento:

```bash
npm run dev
```

Se o problema persistir após um build de produção:

```bash
npm run build
php artisan optimize:clear
```

---

### ❌ Erro: `Class not found` ou problemas com autoload do Composer

Regenere o mapa de autoload:

```bash
composer dump-autoload
```

---

### ❌ Erro nas dependências do Node / `node_modules` corrompido

Apague a pasta `node_modules` e reinstale:

```bash
rm -rf node_modules
npm install
```

---

### ❌ Migrations não encontradas ou cache desatualizado

Limpe todos os caches da aplicação:

```bash
php artisan optimize:clear
```

Ou individualmente:

```bash
php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan view:clear
```

---

### ❌ Erros gerais após alterações de configuração

Sempre que alterar o ficheiro `.env` ou as configurações do projeto, limpe o cache antes de testar:

```bash
php artisan optimize:clear
composer dump-autoload
```

---

## 📄 Licença

Este projeto está licenciado sob a licença **MIT**. Consulte o arquivo [LICENSE](LICENSE) para mais informações.

---