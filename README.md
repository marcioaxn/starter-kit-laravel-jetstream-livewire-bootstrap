<p align="center">
  <a href="https://laravel.com" target="_blank" rel="noopener noreferrer">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="320" alt="Laravel">
  </a>
</p>

# Projeto Base - Laravel 12 + Jetstream (Livewire) + Bootstrap 5

Starter kit opinativo para aplicacoes Laravel com autenticacao Jetstream/Livewire, interface baseada em Bootstrap 5 e tooling pronto para desenvolvimento local.

## Stack principal
- Backend: Laravel 12, Jetstream, Livewire 3, Sanctum, Spatie HTML
- Frontend: Bootstrap 5.3 (SCSS via Vite), Bootstrap Icons, Alpine.js, Alpine Mask, Sortable.js
- Ferramentas: Vite, Axios, Concurrently, Pest/PHPUnit
- Banco: PostgreSQL com chaves primarias UUID (`users`, `sessions`, `personal_access_tokens`)

## Pre-requisitos
- PHP 8.2+
- Composer 2.x
- Node.js 20 LTS (npm 10+) - tambem funciona com Node 18, mas recomendamos 20.x para ambientes novos
- Banco de dados PostgreSQL 13+ (ajuste `.env` conforme o seu ambiente)

## Passo a passo inicial
```bash
# Clonar e acessar o projeto
git clone <seu-fork-ou-repo> projeto-base
cd projeto-base

# Dependencias PHP
composer install

# Arquivo .env e chave da aplicacao
cp .env.example .env
php artisan key:generate

# Ajuste o .env para seu banco e rode as migrations
php artisan migrate --seed

# Dependencias front-end e build inicial
npm install
npm run build   # ou npm run dev para modo HMR
```

> Dica: o comando `php artisan migrate --seed` já cria o usuário padrão (`user_adm@user_adm.com` / `1352@765@1452`) e popula 25 leads de demonstração. Para recursos de storage (avatars etc.), execute `php artisan storage:link`.

## Comandos uteis
- `php artisan serve` - servidor HTTP local
- `npm run dev` - Vite com hot reload
- `npm run build` - build de producao
- `composer run dev` - supervisor que inicia `php artisan serve`, `queue:listen` e `npm run dev` em paralelo
- `composer test` - suite de testes (Pest) **(execução automatizada opcional; não é requisito deste starter kit)**

## Estrutura de front-end
- `resources/scss/app.scss` - ponto de entrada do Bootstrap e estilos utilitarios
- `resources/js/bootstrap.js` - inicializacao de Axios e bundle do Bootstrap
- `resources/js/app.js` - ponto de carga principal para JS
- `vite.config.js` - compila `app.scss` e `app.js` via Laravel Vite Plugin

## Jetstream + Livewire adaptados
- Navegacao, dropdowns, formularios e modais reescritos com classes do Bootstrap
- Componentes reutilizaveis (`x-form-section`, `x-action-section`, `x-modal`, `x-banner`, botoes etc.) sem resquicios de Tailwind
- Paginas de perfil, tokens de API, termos e politica de privacidade ja migradas para Bootstrap
- CRUD de Leads pronto (Livewire + Bootstrap), com filtros reativos, exportacao CSV e modais de criar/editar/remover

## Proximos passos sugeridos
1. Revisar `.env` para e-mail, filas e cache (Redis, se desejar)
2. Rodar `php artisan storage:link` para habilitar upload de avatar
3. Ajustar seeders/factories conforme o dominio do projeto (mantendo o usuario padrao se for util)
4. Configurar deploy/CI de acordo com o seu pipeline (sem obrigatoriedade de executar suites automatizadas)
5. Se optar por testes automatizados, habilite-os manualmente (nao executados por padrao neste starter kit)

## Por que usar UUID como chave primaria?
- Reduz previsibilidade: evita que IDs sequenciais exponham volume de dados ou permitam enumeracao simples.
- Facilita integracao multi-tenant: dados podem ser mesclados entre ambientes sem risco de colisao.
- Atende workloads distribuidos: cada instancia consegue gerar chaves localmente sem coordenacao adicional.
- Sessions e personal access tokens usam o mesmo formato, simplificando caches/filas e auditorias.


## Licenca
Projeto distribuido sob licenca [MIT](LICENSE).  
Autor: Marcio Alessandro Xavier Neto.  
Este Starter Kit foi produzido com auxilio da IA (Codex GPT-5).

