FROM node:20.15.0

WORKDIR /var/www

COPY package.json ./

RUN npm install

COPY . .

CMD npm run dev -- --host
