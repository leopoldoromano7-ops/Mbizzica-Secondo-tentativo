1. DIPENDENCY VARIE FATTE, BOOTSTRAP e vitem, npm install e run dev
2. env configurato e mariadb server avviato con terminale -> create database nome_db, migrato
4. creati i model php artisan make:model
3. creato il controller php artisan php artisan make:controller 
4. crud evito per ora e faccio normale paste, ovviamente components e layout.
5. passaggio dati per la compoent form e card
6. filestorage quindi  enctype="multipart/form-data
7.  salvataggio dei txt nella cartella storage php artisan storage:link
8. creio auth con fortify quindi -> composer require Laravel/fortify -> php artisan fortify:install
9. poi come sempre -> rotta ->  controller    ->  vista per le varie auth register-log in- confirm pass e two factor. modificato file config di fortify e provider per implemntare le citate oltre che poi l'ho fatto pure per il recupero password, si ringrazia la documentazione e sopratutto mailtrapper
10. guerra per lo scope dei paste per cio che concerne la vibilita. Smadonnato sul paste controller e creato lo show, implementato la colonna users_id (make:mig... add...colum_to...table) ed implementati nei model la many to many, inizialmente la 1 to m ma poi mi sono accorto che altrimenti il link non fungeva se lo inviavo, insomma l'alopecia areata ringrazia.
11. 