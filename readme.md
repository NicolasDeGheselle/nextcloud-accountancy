# Développement

Tuto mise en place de l'environnement de dev (avec docker) : [lien](https://www.a-broad-view.com/tech-talk/setting-up-a-development-environment-to-work-on-a-new-nextcloud-app-with-docker/)

Tuto création de l'application : [lien](https://docs.nextcloud.com/server/19/developer_manual/app/tutorial.html)

Doc composants nextcloud : [lien]](https://nextcloud-vue-components.netlify.app/#/Components)

## Lancer

Lancer docker :
```
docker-compose up
```

Webpack :
```
docker exec -it nextcloud-accountancy_app_1 npm run watch
```

## Migration

```
docker exec -u 33 -it nextcloud-accountancy_app_1  /bin/bash
php occ migration:execute accountancy 000001Date20221123204731
```