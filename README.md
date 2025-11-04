# 🌵 Espetinho Sabor Sertanejo

Bem-vindo(a) ao **Espetinho Sabor Sertanejo** — um cardápio digital desenvolvido com amor, tecnologia e o sabor da nossa cultura nordestina.  
O projeto foi criado como parte de um trabalho acadêmico no curso de **Ciência da Computação**, com o objetivo de unir design, programação e gastronomia regional em uma aplicação funcional e atrativa.

---

## 🍢 Sobre o Projeto

O **Espetinho Sabor Sertanejo** é um sistema de cardápio digital onde os clientes podem visualizar os produtos disponíveis, como espetinhos, caldinhos, petiscos e bebidas de um estabelecimento real.  
A proposta é oferecer uma experiência moderna e simples para que o cliente conheça o cardápio antes mesmo de fazer o pedido.

---

## 💡 Funcionalidades

- Visualização dos produtos por categoria (Espetinhos, Caldinhos, Petiscos e Bebidas)  
- Cadastro, edição e exclusão de produtos e clientes *(área administrativa)*  
- Exibição de clientes cadastrados em cards elegantes  
- Mapa de localização do estabelecimento  
- Layout totalmente responsivo  
- Organização do projeto em **template (topo, menu, conteúdo e rodapé)**

---

## 🧱 Tecnologias Utilizadas

| Tecnologia | Função |
|-------------|--------|
| **HTML5** | Estrutura das páginas |
| **CSS3** | Estilização e layout responsivo |
| **PHP** | Lógica de backend e integração com o banco de dados |
| **MySQL** | Armazenamento das informações |
| **JavaScript** | Interações básicas na interface |
| **Git & GitHub** | Controle de versão e hospedagem do código |

---

## 🗺️ Estrutura do Projeto

```bash
📦 Espetinho-Sabor-Sertanejo
│
├── 📁 admin/
│   ├── 📁 assets/
│   │   ├── 📁 css/
│   │   │   ├── formulario.css
│   │   │   ├── global.css
│   │   │   └── login.css
│   │   └── 📁 js/
│   │
│   ├── 📁 uploads/
│   │   ├── 📁 clientes/
│   │   ├── 📁 icons/
│   │   └── 📁 produtos/
│   │
│   ├── .htaccess
│   ├── auth.php
│   ├── clientes-admin.php
│   ├── clientes-altera-forms.php
│   ├── clientes-altera.php
│   ├── clientes-cadastro-forms.php
│   ├── clientes-cadastro.php
│   ├── clientes-excluir.php
│   ├── config.inc.php
│   ├── criar_admin.php   # executa apenas uma vez
│   ├── dashboard.php
│   ├── index.php
│   ├── login.php
│   ├── logout.php
│   ├── produtos-cadastrar.php
│   ├── produtos-editar.php
│   ├── produtos-excluir.php
│   ├── produtos-listar.php
│   └── verifica-login.php
│
├── 📁 assets/
│   ├── 📁 css/
│   │   ├── clientes.css
│   │   ├── global.css
│   │   ├── produtos.css
│   │   └── quem-somos.css
│   └── 📁 img/
│
├── clientes.php
├── conteudo.php
├── faleconosco.php
├── index.php
├── menu.php
├── produtos.php
├── quem-somos.php
├── rodape.php
├── topo.php
└── README.md


## Estrutura do Banco de Dados

```sql
-- Cria o banco de dados
CREATE DATABASE IF NOT EXISTS projeto_1c;
USE projeto_1c;

-- Tabela admins
CREATE TABLE admins (
  id INT(11) NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(50) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY usuario (usuario)
);

-- Tabela clientes
CREATE TABLE clientes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  cliente VARCHAR(150) DEFAULT NULL,
  cidade VARCHAR(150) DEFAULT NULL,
  estado VARCHAR(150) DEFAULT NULL,
  imagem VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id)
);

-- Tabela produtos
CREATE TABLE produtos (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  descricao TEXT DEFAULT NULL,
  preco DECIMAL(10,2) NOT NULL,
  categoria ENUM('Espetinhos','Bebidas','Petiscos','Caldinhos') NOT NULL,
  imagem VARCHAR(255) DEFAULT NULL,
  criado_em TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

## 🎓 Créditos

Desenvolvido por **Ana Beatriz Linhares**  
💻 Projeto acadêmico – Curso de **Ciência da Computação**  

---

## 📜 Licença

Este projeto foi desenvolvido para fins **educacionais e demonstrativos**.
