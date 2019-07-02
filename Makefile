.PHONY: help

help:
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.DEFAULT_GOAL := help

# Sleep for 2 sec to ensure postgres is running
before:
	docker-compose up -d
	sleep 2

after:
	docker-compose down

unit: ## Run unit tests
	make before
	docker-compose exec php ./vendor/bin/codecept run unit
	make after

functional: ## Run functional tests
	make before
	docker-compose exec php ./vendor/bin/codecept run functional
	make after

acceptance: ## Run acceptance tests
	make before
	docker-compose exec php ./vendor/bin/codecept run acceptance
	make after