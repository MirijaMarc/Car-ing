# Dockerfile pour Vue.js Frontend
FROM node:18 as build-stage

WORKDIR /app
COPY ./fiarako_frontend /app
RUN npm install
RUN npm run build

FROM nginx:alpine as production-stage
COPY --from=build-stage /app/dist /usr/share/nginx/html
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
