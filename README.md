# Ponto-RecFacial

## Visão Geral
    Ponto-RecFacial é um sistema de reconhecimento facial construído com Node.js, Express e MySQL. O sistema permite que os usuários registrem suas imagens faciais e recuperem uma lista de usuários registrados.

## Recursos
    Registro de usuário com upload de imagem facial
    Recuperação de lista de usuários registrados
    Reconexão automática ao banco de dados MySQL em caso de perda de conexão

# Início Rápido
## Pré-requisitos
    Node.js (versão 14 ou superior)
    MySQL (versão 8 ou superior)
    Express.js (versão 4 ou superior)
    Body-parser (versão 1.19 ou superior)
    Dotenv (versão 8 ou superior)
## Instalação
    Clone o repositório: git clone https://github.com/pedroh-dev255/Ponto-RecFacial
    Instale as dependências: npm install
    Crie um arquivo .env com as seguintes variáveis:
      DBHOST: Host do banco de dados MySQL
      DBUSER: Usuário do banco de dados MySQL
      DBPASS: Senha do banco de dados MySQL
      DBDB: Nome do banco de dados MySQL
      PORT: Porta do servidor (padrão: 3000)
      Inicie o servidor: node app.js
## Uso
    Registre um usuário: POST /registrar_usuario com corpo JSON contendo campos nome e imagem_rosto
    Recupere lista de usuários registrados: GET /obter_usuarios

# Detalhes Técnicos
## Arquitetura
    O sistema consiste em um servidor Node.js construído com Express.js, que interage com um banco de dados MySQL. O servidor usa um middleware para parsear requisições JSON e serve arquivos estáticos do diretório public.

## Banco de Dados
    O sistema usa um banco de dados MySQL para armazenar informações de usuários, incluindo suas imagens faciais. A conexão com o banco de dados é configurada para reconectar automaticamente em caso de perda de conexão.

## Licença
    Ponto-RecFacial é licenciado sob a Licença Apache(2.0).

## Autor
    Pedro Henrique (pedro@phsolucoes.site)

    Agradecimentos
    Express.js: https://expressjs.com/
    MySQL: https://www.mysql.com/
    Body-parser: https://www.npmjs.com/package/body-parser
    Dotenv: https://www.npmjs.com/package/dotenv