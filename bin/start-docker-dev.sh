#!/usr/bin/env bash

IFS=$'\n\t'
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

# project root
cd "$(dirname "$DIR")"

set -exuo pipefail

docker-compose pull
docker-compose up --build -d
docker-compose exec php composer install

#docker-compose exec php bin/console doctrine:database:create --if-not-exists
#docker-compose exec php bin/console doctrine:migrations:migrate
