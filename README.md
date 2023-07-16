## Instalación
- ejecutar desde la consola el siguiente comando para acceder al bash de contenedor:
```
docker exec -t bootcamp-cari /bin/bash
```
- Otra manera desde el docker, abrir una terminal de la image
```
composer i && npm i
```

- si muestra el siguiente error
  
![image](https://github.com/elmergustavo/bootcamp-cari/assets/42653934/25fcd790-c5f2-48cb-b95b-76ec084c600a)

- Ejecutar el siguiente comando para darle permisos al storage (en el bash del contenedor)
  
```
chmod -R 775 ./storage/*
chmod -R 777 ./storage/*
```

## migrar la base de datos
ejecutar el siguiente comando:
```
php artisan migrate
```

Comando para dar permisos de escritura:
```
sudo chown -R usuario ~/*
```


- enlaces
Install Tailwind CSS with Laravel
- https://tailwindcss.com/docs/guides/laravel
