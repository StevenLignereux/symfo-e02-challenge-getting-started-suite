# Challenge J02

On continue de travailler sur le getting started, avec les "basics" de Symfony.

- **Ajouter un menu dans le layout global** pour naviguer sur les routes principales du site : `Liste des étudiants, Emoji textes, Emoji images`.
- **Mettre un titre HTML différent à chaque page**, qui sera défini depuis le template enfant via `block title` (héritage Twig !).
- **Ajouter des champs de type différents dans le modèle des étudiants et les afficher** dans la page étudiant ou sur la liste (une image, un booléen qui indiquerait une info ou une autre selon qu'il soit true ou false, un sous-tableau contenant une liste de qualités ou autre), **par ex.** :
    - dans la liste, barrer le prénom si `student.inClassroom` est à `false`,
    - afficher une photo de profil `student.profile` (à mettre dans le dossier `web/images`),
    - afficher la liste des objets présents sur son bureau (via un array qui contient cette liste, ie `student.objects`).
- **Ajouter d'autres choses dans la session** (date/heure du dernier étudiant visité, nombre de pages vues, autres).
- **Renvoyer un JSON** des étudiants depuis une URL du type `/api/students/all` ou l'information d'un seul étudiant via `/api/student/{id}` **=> voir Controller > JSON Helper**.
- **Débarrassez-vous du DefaultController** et faites de votre liste d'étudiants la page d'accueil du site.
