#!/usr/bin/env bash
IFS=$'\n\t'
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

# project root
cd "$(dirname "$DIR")"

set -exuo pipefail

docker-compose exec php /root/.composer/vendor/bin/phpstan analyse \
    --level 7 \
    --memory-limit 1G \
    --configuration phpstan.neon \
    src tests
