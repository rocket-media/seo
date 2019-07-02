.PHONY: help

help: ## This help
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.DEFAULT_GOAL := help

unit: ## Run unit tests
	docker-compose run --rm php ./vendor/bin/codecept run unit

functional: ## Run functional tests
	docker-compose run --rm php ./vendor/bin/codecept run functional

acceptance: ## Run acceptance tests
	docker-compose run --rm php ./vendor/bin/codecept run acceptance