#!/bin/bash
# start postgres in docker port 2723 interactive shell
# delete after use
# docker run -it --rm -e POSTGRES_HOST_AUTH_METHOD=trust -p 2723:5432 postgres

# create db with name bulletin3
docker run -it --rm -e POSTGRES_HOST_AUTH_METHOD=trust -p 2723:5432 postgres
