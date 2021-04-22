# OXID for OXID API Coding Days 2021

### Requirements
1. Docker with Docker-Compose
2. Composer 2.0
3. webvariants Dev-Stack

### Initialize
- Initialize environment: `./docker-init`
- Start the container: `docker-compose up -d`
- Install dependencies: `docker-compose exec oxid composer install -n`
- After waiting one or two minutes run the example request.
- If resolving the domain `oxid-coding-days.docker.localhost` fails, just run `echo '127.0.0.1' | sudo tee -a /etc/hosts`

### Access
OXID:
- http://oxid-coding-days.docker.localhost/
- https://oxid-coding-days.docker.localhost/

Admin:
- http://oxid-coding-days.docker.localhost/admin/
- https://oxid-coding-days.docker.localhost/admin/

Credentials:
- User: `dev@marmalade.de`
- Pass: `m4rm4l4d3`

### Example request
```shell
curl \
    -X POST \
    -H "Content-Type: application/json" \
    --data '{"query": "{token(username: \"dev@marmalade.de\", password: \"m4rm4l4d3\")}"}' \
    http://oxid-coding-days.docker.localhost/graphql/
```
