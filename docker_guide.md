# What is Docker?
[Read More](https://www.docker.com/resources/what-container)

# Dockerfile
### DOCKERFILE PARTS
- FROM - The os used. Common is alpine, debian, ubuntu
- ENV - Environment variables
- RUN - Run commands/shell scripts, etc
- EXPOSE - Ports to expose
- CMD - Final command run when you launch a new container from image
- WORKDIR - Sets working directory (also could use 'RUN cd /some/path')
- COPY # Copies files from host to container

# Using DOCKER COMPOSE
Configure relationships between containers
Save our docker container run settings in easy to read file
2 Parts: YAML File (docker.compose.yml) + CLI tool (docker-compose)

### To run
```docker-compose up```

### You can run in background with
```docker-compose up -d```

### To cleanup
```docker-compose down```

### List running containers
``` docker container ls  ```
OR
``` docker ps ```

### Stop all running containers
```  docker stop $(docker ps -aq)  ```
### Remove all containers
```  docker rm $(docker ps -aq)  ```