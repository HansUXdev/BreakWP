FROM node:10

WORKDIR /usr/src/app

COPY package*.json ./

COPY break.php ./

RUN npm install


COPY . .

EXPOSE 3000

CMD ["npm", "start"]