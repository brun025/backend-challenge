
# backend-challenge

## Rodar o Laravel

Clone Repositório
```sh
git clone https://github.com/brun025/backend-challenge.git backend-challenge
```

```sh
cd backend-challenge/
```

Remova o versionamento (opcional)
```sh
rm -rf .git/
```

Listagem dos comandos disponíveis
```sh
make help
```

Primeira execução, instalação de dependências, setup das configurações e inicialização do container.
Após rodar o comando abaixo, acesse http://localhost:8000/api/items
```sh
make setup
```

Inicialização do container
Após rodar o comando abaixo, acesse http://localhost:8000/api/items
```sh
make up
```

Parar e remover todos as imagens, containers, volumes criados
```sh
make down
```

Acessa o container e roda os testes
```sh
make run:test
```

## Rodar a aplicação sem comando make

Crie o Arquivo .env
```sh
cp .env.example .env
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container app
```sh
docker-compose exec app bash
```

Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```


Acesse o projeto
[http://localhost:8000/api](http://localhost:8000/api)



There's this legacy API that contains info gathered across decades of existence. Your team needs to use one of the endpoints of that API to build a new web app.
The problem is that this specific endpoint returns millions of items, paginated at 100 per page.
Since you will need more flexibility in terms of page size, your team decides to build a frontend for this legacy API that will allow a user defined value for the number of items per page.
You'll be in charge of this task.
Here's what you need to do:

- Create a simple API with just one required endpoint: `GET /items`.
- This new API will return the list of items of the legacy API, but will accept a `page` and `perPage` arguments returning accordingly.

Here's what you need to know about the legacy API:
- The legacy API is at http://sf-legacy-api.now.sh
- A simple `GET /items` will return the first 100 items.
- To go to a specific page you use `GET /items?page=20` for instance.
- The response will contain info about the total number of items, the current page and how many items per page.

## Guidelines
Here's the important stuff that we take into account when reviewing this exercise:
- It should be done in Javascript/Node.js or PHP/Laravel
- It should be done using docker
- It should be simple to start your solution
- It should contain some setup instructions
- It should work correctly
- It should have an automated way to prove it's working correctly

**Ideally** we want this exercise to take you **around 90 minutes**. This time limit is just a reference so you can infer the level of polish we expect from your solution. You're free to spend as much time on it as you wish.
## Delivery
You will be given access to a github repository to work on your exercise. To submit your solution, open a pull request against the master branch. Use the body of the pull request to briefly describe your solution, what might be incomplete and why, etc.
## Important
We will **not** consider submissions that either don't work when following provided instructions nor that were pushed directly to master (you need to open a pull request and leave it open).
