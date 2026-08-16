# Refatoração de Backend — Laravel 10

## Sobre o projeto

Este projeto consiste na **refatoração do backend de uma aplicação originalmente desenvolvida em PHP 8**, criada no contexto de um **Trabalho de Conclusão de Curso (TCC)**.

A versão original apresentava características de um sistema legado, com diferentes módulos e responsabilidades concentrados nos mesmos arquivos, tornando a manutenção, evolução e compreensão do código mais complexas.

O objetivo deste trabalho foi realizar uma **refatoração estrutural do backend**, modernizando sua implementação, reorganizando suas responsabilidades e aplicando padrões e boas práticas de desenvolvimento de software.

> **Escopo:** a refatoração contempla exclusivamente o **backend da aplicação**. O projeto disponibiliza uma API responsável pela comunicação com o frontend já existente.

---

## Tecnologias

* **PHP 8**
* **Laravel 10**
* **MySQL**
* **Docker**
* **REST API**

---

## Contexto da refatoração

O sistema original foi desenvolvido utilizando **PHP 8** e possuía uma arquitetura com baixa separação de responsabilidades. Os módulos da aplicação estavam concentrados em arquivos que acumulavam diferentes funções e regras de negócio.

Essa estrutura dificultava:

* Manutenção do código;
* Evolução das funcionalidades;
* Reutilização de componentes;
* Identificação das regras de negócio;
* Testabilidade;
* Compreensão da estrutura da aplicação.

A refatoração teve como foco principal **preservar o comportamento e a finalidade da aplicação original**, enquanto sua estrutura interna era reorganizada.

---

## Arquitetura

O backend foi migrado para **Laravel 10** e reorganizado utilizando uma arquitetura baseada em **MVP (Model-View-Presenter)**, com o objetivo de promover uma melhor separação de responsabilidades.

Além disso, foram utilizados padrões para organizar as diferentes responsabilidades da aplicação:

### Service Pattern

Os serviços foram utilizados para centralizar e organizar as **regras e operações de negócio**, evitando a concentração dessa lógica nos controllers.

### Request Pattern

As classes de Request foram utilizadas para organizar a **validação e tratamento dos dados recebidos pela API**, mantendo os controllers mais enxutos e focados em suas responsabilidades.

### Clean Code

Durante o processo de refatoração foram aplicados princípios e técnicas de **Clean Code**, buscando:

* Melhor legibilidade;
* Métodos mais coesos;
* Responsabilidades bem definidas;
* Redução de duplicação;
* Padronização dos módulos;
* Maior facilidade de manutenção.

---

## Principais melhorias

A refatoração resultou nas seguintes mudanças:

* Migração do backend de PHP 8 para **Laravel 10**;
* Reorganização completa da estrutura da aplicação;
* Implementação de uma arquitetura baseada em **MVP**;
* Aplicação do **Service Pattern**;
* Aplicação do **Request Pattern**;
* Separação das responsabilidades;
* Padronização dos módulos;
* Aplicação de princípios de **Clean Code**;
* Organização das regras de negócio;
* Redução do acoplamento entre componentes;
* Melhoria da legibilidade e manutenção do código;
* Containerização do banco de dados com **Docker**;
* Manutenção da integração com o frontend existente através de uma **API REST**.

---

## Banco de dados

O sistema original utilizava **MySQL**, tecnologia que foi mantida durante a refatoração para preservar a compatibilidade com a aplicação.

A principal mudança ocorreu no ambiente de execução do banco.

O MySQL passou a ser executado através de **Docker**, permitindo maior padronização e isolamento do ambiente de desenvolvimento.

### Benefícios da utilização do Docker

* Ambiente de desenvolvimento mais consistente;
* Facilidade na configuração do banco;
* Isolamento do serviço;
* Maior facilidade para reproduzir o ambiente;
* Redução de problemas relacionados às configurações locais.

---

## Estrutura

A aplicação foi reorganizada buscando separar as responsabilidades de cada componente.

Uma representação simplificada da estrutura é:

```text
app/
├── Http/
│   ├── Controllers/
│   └── Requests/
│
├── Models/
│
├── Services/
│
└── ...
```

A separação permite que controllers, validações, regras de negócio e modelos tenham responsabilidades mais bem definidas.

---

## Funcionamento

O projeto consiste exclusivamente no **backend da aplicação**, disponibilizando uma API para o frontend desenvolvido anteriormente.

```text
┌──────────────────────┐
│  Frontend existente  │
└──────────┬───────────┘
           │
           │ HTTP / REST
           ▼
┌──────────────────────┐
│     Laravel 10       │
│         API          │
├──────────────────────┤
│ Controllers          │
│ Requests             │
│ Services             │
│ Models               │
└──────────┬───────────┘
           │
           ▼
┌──────────────────────┐
│    MySQL + Docker    │
└──────────────────────┘
```

O frontend não faz parte deste repositório. A API foi desenvolvida para manter a comunicação com a interface já existente.

---

## Objetivos

Os principais objetivos da refatoração foram:

1. Modernizar o backend da aplicação;
2. Migrar a implementação para Laravel 10;
3. Reduzir a complexidade do código legado;
4. Melhorar a separação de responsabilidades;
5. Padronizar a estrutura dos módulos;
6. Aplicar princípios de Clean Code;
7. Organizar as regras de negócio;
8. Facilitar a manutenção e evolução do sistema;
9. Melhorar a organização do ambiente através do Docker;
10. Preservar a integração com o frontend existente.

---

## Resultado

Ao final da refatoração, o backend passou de uma estrutura monolítica e pouco modularizada para uma aplicação organizada em diferentes responsabilidades, utilizando **Laravel 10, MVP, Service Pattern, Request Pattern e princípios de Clean Code**.

O banco de dados **MySQL** foi mantido, porém passou a ser executado em um ambiente virtualizado através do **Docker**.

A aplicação continua disponibilizando os recursos necessários através de uma **API REST**, permitindo que o frontend desenvolvido originalmente continue consumindo o backend refatorado.

---

## Contexto acadêmico

O sistema original foi desenvolvido no contexto de um **Trabalho de Conclusão de Curso (TCC)**.

Este projeto representa uma etapa posterior de **refatoração e modernização do software**, tendo como foco a melhoria da arquitetura, organização e manutenibilidade do backend existente.

---

## Status

**Backend refatorado e funcional.**

O projeto atualmente utiliza:

* Laravel 10;
* PHP 8;
* MySQL;
* Docker;
* API REST;
* Arquitetura baseada em MVP;
* Service Pattern;
* Request Pattern;
* Princípios de Clean Code.

---

## Autor

**Gabriel Lima**

Projeto desenvolvido como trabalho de refatoração e modernização de software, utilizando como base uma aplicação originalmente desenvolvida no contexto de um TCC.
