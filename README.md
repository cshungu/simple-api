# SIMPLE REST API CLIENT

Table: Livre
------------
| Nom           | Type          |
| ------------- | ------------- |
| annee_edition | datetime      |
| id            | inte(11)      |
| isbn          | varchar(255)  |
| prix          | decimal(10,0) |
| titre         | varchar(255)  |

Api Rest
-------

Route: Livre
------------
| Route             | Verbe  |
| ----------------- | ------ |
| /createOne.php    | POST   |
| /deleteOne.php    | DELETE |
| /read.php         | GET    |
| /readOne.php?id=1 | GET    |
| /updateOne.php    | PUT    |
