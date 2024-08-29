# API Pokémon PHP

Este projeto é uma API para buscar informações de Pokémon usando PHP e MySQL. 
Ele permite que você obtenha detalhes de Pokémon com base no nome ou número através de endpoints RESTful.

## Funcionalidades

- Listar todos os atuais 1025 Pokémon
- Buscar Pokémon por número
- Buscar Pokémon por nome
- Retornar dados em formato JSON, com 
- Incluir URLs completas para imagens dos Pokémon

## Requisitos

- PHP 7.0 ou superior
- MySQL
- Servidor Apache (ou outro servidor web que suporte PHP)
- phpMyAdmin (opcional, mas recomendado para gerenciar o banco de dados)

## Configuração

1. Clone o repositório
2. Importe o arquivo `pokemon_api_backup.sql` para o seu banco de dados MySQL
3. Configure o servidor web para apontar para o diretório do projeto
4. Configure as credenciais do banco de dados no arquivo `conexao.php`

## Configure o banco de dados:

1. Importe o arquivo SQL para configurar a tabela pokemon,
Você pode usar o phpMyAdmin ou o comando de terminal para importar:
```mysql -u seu_usuario -p seu_banco_de_dados < caminho_para_arquivo/pokemon_api_backup.sql```

2. Configurar a conexão com o banco de dados:
Edite `conexao.php` com as informações corretas do seu banco de dados

```conexao
$host = 'localhost';
$db = 'seu_banco_de_dados';
$user = 'seu_usuario';
$pass = 'sua_senha';
```

## Configure seu servidor web:

- Certifique-se de que o servidor Apache (ou equivalente) está configurado corretamente para apontar para o diretório do projeto.

- Edite o arquivo .htaccess se for necessário para redirecionar corretamente as URLs.

## Como Usar

- Listar todos os Pokémon:

  GET ```http://localhost:8000/api-pokemon-php/```

- Buscar Pokémon por número:

  GET ```http://localhost:8000/api-pokemon-php/1```

- Buscar Pokémon por nome:

  GET ```http://localhost:8000/api-pokemon-php/bulbasaur```

## Exemplo de Resposta JSON

```json
[
  {
    "id": 376,
    "nome": "bulbasaur",
    "imagem": "http://localhost:8000/api-pokemon-php/img/1.png",
    "altura": "0.70",
    "peso": "6.90",
    "nivel_base_experiencia": 64,
    "habilidades": "overgrow, chlorophyll",
    "tipo": "grass, poison",
    "numero": 1
  }
  {
    "id": 377,
    "nome": "ivysaur",
    "imagem": "http://localhost:8000/api-pokemon-php/img/2.png",
    "altura": "1.00",
    "peso": "13.00",
    "nivel_base_experiencia": 142,
    "habilidades": "overgrow, chlorophyll",
    "tipo": "grass, poison",
    "numero": 2
  },
  {
    "id": 378,
    "nome": "venusaur",
    "imagem": "http://localhost:8000/api-pokemon-php/img/3.png",
    "altura": "2.00",
    "peso": "100.00",
    "nivel_base_experiencia": 263,
    "habilidades": "overgrow, chlorophyll",
    "tipo": "grass, poison",
    "numero": 3
  },
]

```
## Contribuição

Contribuições são bem-vindas! Se você encontrar algum problema ou tiver alguma sugestão de melhoria, por favor, abra uma issue ou envie um pull request.

## Créditos

- Desenvolvido por [João Marcos](https://links.jm7087.com/)

## Licença

Este projeto é licenciado sob a Licença MIT - veja o arquivo [LICENSE](LICENSE) para mais detalhes.
