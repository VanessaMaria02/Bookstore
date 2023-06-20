$host = "localhost";
$dbuser = "hoteladmin";
$dbpassword = "hoteladmin";
$dbname = "buchhaus";

unterschiedliche rollen der user: 0 aktiver normaler user, 1 aktiver admin, 2 inaktiver user

Git-hub link: https://github.com/VanessaMaria02/Bookstore.git

Falls es Probleme bei dem hochladen des Produktbildes bei Produkt erstellung gibt kann es sein das man folgendes im php.init von xamp machen muss:
in php.ini -> extension=gd einkommentieren (; weglöschen) -> speichern