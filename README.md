# MAC LANCHES

O MAC LANCHES é um sistema de gerenciamento de pedidos e cardápio desenvolvido para lanchonetes. Ele permite que um administrador crie e gerencie o cardápio, e também controle o fluxo de pedidos dos clientes, desde o recebimento até a entrega.

Este projeto está sendo desenvolvido como parte da disciplina de Desenvolvimento de Aplicações Backend com Framework na UTFPR (2025.1), sob a orientação do Professor Andres Jesse.

## Ambiente de desenvolvimento e ferramentas

Esse repositório foi desenvolvido com as seguintes ferramentas:

-   Linguagem de Programação: PHP
-   Framework: Laravel
-   Banco de Dados: SQLite

### Ferramentas de Frontend:

-   Blade
-   Tailwind CSS
-   Vite

### Outras Ferramentas:

-   Composer

## Funcionalidades a serem implementadas

-   Exibição do Cardápio; (PRIORITÁRIA)
-   Gerenciamento de Produtos (CRUD para Administrador); (PRIORITÁRIA)
-   Sistema de Pedidos (Lado do Cliente); (PRIORITÁRIA)
-   Gerenciamento de Pedidos (Lado do Administrador/Cozinha); (PRIORITÁRIA)

### Observações:

-   Link para o protótipo de telas: https://www.figma.com/design/sSDi620SNUJKnU4aNlIyqb/MAC-Lanches?m=auto&t=iP3F9w9VFzu8Apif-1
-   Link para a modelagem do banco de dados: https://drive.google.com/file/d/1p-L4FFxY8SgCGnf9xQSA-7aMm-pIlrMX/view?usp=drive_link

## Planejamento de sprints:

### Semana 1:

-   Setup do Ambiente e Base do Cardápio
    -   [DONE] Criar projeto.
    -   [DONE] Instalar bibliotecas necessárias.
    -   [DONE] Modelar o banco de dados SQLite e configurar no .env e criar o arquivo database.sqlite.
    -   [DONE] Definir as rotas básicas para a página inicial (cardápio) e uma página de detalhes de produto.
    -   [DONE] Criar migração para a tabela products (nome, descrição, preço, image_path).
    -   [DONE] Criar as views Blade (index.blade.php e show.blade.php) para exibir o cardápio e detalhes.
    -   [DONE] Estilizar o index.blade.php com TailwindCSS.

### Semana 2:

-   Gerenciamento Básico de Produtos (Admin)
    -   [DONE] Implementar rotas e views para criar e editar produtos.
    -   [DONE] Criar formulários Blade para adição e edição de produtos.
    -   [DONE] Implementar a validação inicial dos formulários de produto.
    -   [DONE] Criar um seeder para popular alguns produtos no banco de dados.
    -   [DONE] Criar um usuário administrador.
    -   [DONE] Implementar login e logout básicos para o administrador (Autenticação).
    -   [DONE]Proteger as rotas de gerenciamento de produtos com o middleware 'auth'.

### Semana 3:

-   Funcionalidade de Carrinho e Persistência de Pedidos
    -   [] Criar as tabelas orders e order_items com suas migrações.
    -   [] Definir os relacionamentos Eloquent: Order com User (se houver), Order com Order_Item, Product com Order_Item (um-para-muitos).
    -   [] Implementar a lógica de adição de produtos ao carrinho (pode ser via sessão ou banco de dados).
    -   [] Criar rotas e views para a página do carrinho, exibindo os itens e o subtotal.
    -   [] Criar a rota e view para o checkout com formulário.
    -   [] Implementar a lógica para persistir um pedido finalizado no banco de dados (orders e order_items).
    -   [] Adicionar validações no formulário de checkout (dados do cliente, etc.).

### Semana 4:

-   Gerenciamento de Pedidos (Admin) e Seeders/Factories
    -   [] Criar rotas e views para listar todos os pedidos (/admin/orders).
    -   [] Criar uma view para os detalhes de um pedido específico, incluindo os itens e dados do cliente.
    -   [] Implementar funcionalidade para atualizar o status do pedido (ex: "Pendente", "Em Preparo", "Concluído", "Cancelado").
    -   [] Garantir que apenas usuários autenticados (administradores) acessem essas rotas.
    -   [] Criar Factories para Order e OrderItem para facilitar testes e seeders.
    -   [] Criar seeders para gerar pedidos de exemplo no banco de dados.

### Semana 5:

-   Autorização com Policies
    -   [] Implementar Policies para Product (apenas admin pode criar/editar/deletar).
    -   [] Implementar Policies para Order (cliente só pode ver/cancelar seus próprios pedidos; admin pode ver/gerenciar todos).
    -   [] Aplicar as regras de autorização nos Controllers e/ou nas Form Requests.
    -   [] Escrever testes de feature específicos para verificar as regras de autorização (ex: um não-admin tentando criar um produto).

### Semana 6:

-   Upload de Imagens de Produtos
    -   [] Atualizar a migração da tabela products para incluir um campo image_path (se não fez na Sprint 1).
    -   [] Configurar o sistema de Storage do Laravel (armazenamento local).
    -   [] Implementar a funcionalidade de upload de imagens ao criar/editar produtos (formulário, controller).
    -   [] Exibir as imagens no cardápio e nos detalhes do produto.
    -   [] Implementar a exclusão da imagem ao deletar o produto ou ao atualizar por uma nova.

### Semana 7:

-   Ajustes Finais, Refatoração e Documentação
    -   [] Realizar ajustes finais na interface do usuário (melhorias de UI/UX com TailwindCSS).
    -   [] Revisar o código, refatorar seções complexas e adicionar comentários onde necessário.
    -   [] Otimizar queries do banco de dados (se necessário).
    -   [] Preparar um README.md detalhado (como o que geramos antes), explicando como configurar o projeto localmente, suas funcionalidades e tecnologias.
    -   [] Revisar o plano de trabalho e o conhecimento adquirido na disciplina.
