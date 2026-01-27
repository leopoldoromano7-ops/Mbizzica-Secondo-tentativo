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
11. creato CRUD mentre ero a lezione quindi non concentratissimo infatti ho avuto problemi con i file storati.
12. reinvento un po perche' aiuto
13. filtro e tag aggiunto, problema? con il seeders potevo fare una pull di tag gia' pronti ma famo che li mettano gli utenti, problema? eh che q si creeranno 800 mila tag inutili dopo di che inizio a smattare conil filtro
14. ho trovato https://laravel.com/docs/12.x/telescope#filtering daje. Ci sono riuscito ma lascio i tag cosi perche' boh
15. ho ripreso in mano il codice dopo che per tre ore mi hanno spiegato la messa online di un sito forse lo faro' anche con uesto se rieasco. Comunque aggiunto e modificato lo scope della visibilita', perche' mi ero dimenticato i non etichettati, problema? Che ho ovviamente dovuto modificare tutta la logica, poi faro' i test ma le query sono il motivo vero del perche' la'lopecia avanza inesorabile.
16. prima di laravel i filtri implementavo con fetch() e quindi con js mo, al corso ci fanno usare liveware ma dato che l'ultima volta ho riscritto tutto questo esercizio per colpa di livewere non lo uso e non uso nemmeno js, si e' meno dinamico e immediato ma meglio che funzioni per ora, comuqneu gia' ho fatto un paio di esercizi su questo, volendo potrei riguardarmeli per vedere bene come implementare
17. testato un po e mannaggia non avevo messo le rotte giuste nel middlewere, poi avevo messo funzioni nelle rotte male male. ho finito la many to many, ho corretto alcune cose rotte nel paste controller non so perche' ma avevo sbagliato sintassi varie.
18. rivisto le blade
19. to do: l'email degli eventi!