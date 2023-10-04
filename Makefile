BLACK        := $(shell tput -Txterm setaf 0)
RED          := $(shell tput -Txterm setaf 1)
GREEN        := $(shell tput -Txterm setaf 2)
YELLOW       := $(shell tput -Txterm setaf 3)
LIGHTPURPLE  := $(shell tput -Txterm setaf 4)
PURPLE       := $(shell tput -Txterm setaf 5)
BLUE         := $(shell tput -Txterm setaf 6)
WHITE        := $(shell tput -Txterm setaf 7)

RESET := $(shell tput -Txterm sgr0)

setup:
ifeq (,$(wildcard .env))
	echo "Criando .env ... Iniciando setup da aplicação..."
	cp .env.example .env && docker-compose up -d && docker-compose exec app composer install && docker-compose exec app php artisan key:generate
else
	echo "Iniciando setup da aplicação..."
	docker-compose up -d && docker-compose exec app composer install && docker-compose exec app php artisan key:generate
endif

up:
	docker-compose up -d

build:
	docker-compose build

stop:
	docker-compose stop

down:
	docker-compose down
	
run\:test:
	docker-compose exec app php artisan test

run\:app:
	docker-compose exec app bash
	
help:
	@echo ""
	@echo "${RED}BÁSICO${RESET}"
	@echo "${YELLOW}make setup${RESET} 	${LIGHTPURPLE}|${RESET} Instalação das dependências e inicialização dos containers"
	@echo "${YELLOW}make up${RESET} 	${LIGHTPURPLE}|${RESET} Iniciar os containers"
	@echo "${YELLOW}make build${RESET} 	${LIGHTPURPLE}|${RESET} Criar as imagens, containers e volumes"
	@echo "${YELLOW}make stop${RESET} 	${LIGHTPURPLE}|${RESET} Parar a execução de todos os containers"
	@echo "${YELLOW}make down${RESET} 	${LIGHTPURPLE}|${RESET} Parar e remover todos as imagens, containers, volumes criados"
	@echo ""
	@echo "${RED}AVANÇADO: ADENTRANDO OS CONTAINERS${RESET}"
	@echo "${YELLOW}make run:test${RESET}${LIGHTPURPLE}|${RESET} Acessa o container e roda os testes"
	@echo "${YELLOW}make run:app${RESET} ${LIGHTPURPLE}|${RESET} Acessa o container do backend (API)"
	@echo ""