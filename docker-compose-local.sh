#!/bin/bash

PWD=$(cd $(dirname $0) && pwd)

# Create Network
COUNT_DOCKER_NETWORK="$(docker network ls -f name=docker-template -q | wc -l | sed 's/^[ \t]*//')"
if [ $COUNT_DOCKER_NETWORK != "1" ]; then
    docker network create docker-template
fi

# Install node_modules
directory="$PWD/node_modules"
if [ -z "$(ls $directory)" ]; then
    $PWD/yarn.sh install
fi

docker-compose -p docker-template -f $PWD/.local/docker-compose-local/docker-compose.yml $@