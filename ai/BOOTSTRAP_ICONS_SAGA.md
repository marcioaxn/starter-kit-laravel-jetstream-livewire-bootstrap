# Diagnóstico e Resolução: Bootstrap Icons (Saga Recorrente)

**Data de Início do Documento:** 06/01/2026
**Status:** Resolvido (CDN)
**Contexto:** O problema ocorre de forma intermitente. Funciona em alguns ambientes (ex: dev local), mas falha em outros (ex: após clonar em nova máquina, hard refresh, ou build de produção).

## O Problema
Ícones do Bootstrap (`bi-*`) não são renderizados. O navegador falha ao carregar os arquivos de fonte (`.woff`, `.woff2`) ou tenta carregá-los de caminhos incorretos.

## Histórico de Tentativas (Resumo)
1.  **Importação via CSS Padrão (`@import ...css`) no SCSS:** Falha na resolução de caminhos pelo Vite/Sass.
2.  **Importação via SCSS (`@import ...scss`) no SCSS:** Falha em caminhos relativos internos da lib.
3.  **Override de Variável `$bootstrap-icons-font-dir`:** Solução frágil que depende de estrutura de diretórios específica e falha com `APP_URL` complexa.
4.  **Importação via JS (`import ...css`):** O Vite processa os arquivos corretamente e gera os hashes, mas o problema persistiu em alguns ambientes, indicando possíveis conflitos de caminho em tempo de execução (`APP_URL`) ou cache agressivo.

## Solução Definitiva (06/01/2026)
**Mudança de Estratégia:** Uso de CDN (jsDelivr).

Apesar de não ser a prática "purista" de ter todos os assets locais, o uso de CDN elimina completamente a complexidade de:
*   Build pipelines (Vite/Webpack) resolvendo caminhos de fontes.
*   Diferenças entre servidor de desenvolvimento (`npm run dev`) e produção (`npm run build`).
*   Configurações de subdiretórios ou `APP_URL` incorretas no servidor web.

**Ações Realizadas:**
1.  **Limpeza:** Removida qualquer importação de `bootstrap-icons` dos arquivos JS e SCSS locais.
2.  **Implementação:** Adicionada a tag `<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">` diretamente nos layouts principais:
    *   `resources/views/layouts/app.blade.php`
    *   `resources/views/layouts/guest.blade.php`

**Resultado:**
Os ícones são carregados de uma fonte externa confiável e independente da configuração local do projeto.

**Observação para o Futuro:**
Se for estritamente necessário voltar para assets locais (ex: ambiente offline/intranet), será necessário investigar a fundo a configuração do servidor web (Nginx/Apache) para servir os arquivos estáticos com os cabeçalhos corretos e verificar se o `ASSET_URL` do Laravel está alinhado com o manifesto do Vite.
