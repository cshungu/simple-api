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
--------
/read.php          GET
/readOne.php?id=1  GET
/updateOne.php     PUT
/deleteOne.php     DELETE