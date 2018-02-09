# SAVEC

**System of AVC**



## Local development in docker

### Start

#### Docker ports
To publish ports copy `docker-compose.override.yml.sample` to `docker-compose.override.yml`

Then nginx will be available at [https://localhost:8001](https://localhost:8001) / [http://localhost:8000](http://localhost:8000)  and adminer at [http://localhost:8010](http://localhost:8010)

#### Docker start

```bash
bin/start-docker-dev.sh
```

### For executing commands inside container
```bash
docker-compose exec php <command>
docker-compose exec php bin/console
```
- Workdir is set to `/src`, where the current project folder is mounted.
- creating alias is recomanded `alias svc="docker-compose exec php"`

#### SSL
Self-signed certs generated for:
```
  DNS.1 = *.savec.local
  DNS.2 = savec.local
  DNS.3 = *.savec.dev
  DNS.4 = savec.dev
  DNS.5 = *.savec.docker
  DNS.6 = savec.docker
```
Root cert at `docker/dev/nginx`.


### Custom local docker setup

For editing docker setup on your local machine use `docker-compose.override.yml` see [Docker docs](https://docs.docker.com/compose/extends/#multiple-compose-files) 

### Stop

see [docker-compose CLI docs](https://docs.docker.com/compose/reference/)

#### Pause
```bash
docker-compose pause
```
- just pauses all running processes inside containers

#### Stop
```bash
docker-compose stop
```
- stops all containers

#### Stop
```bash
docker-compose down
```
- stops & removes all containers & networks
- volumes are not removed


