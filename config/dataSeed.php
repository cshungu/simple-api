<?php

function insertSeed($db): void
{
    $livres = [
        [
            "isbn"           => "9782226445605",
            "titre"          => "La Clé de votre énergie: 22 protocoles pour vous libérer émotionnellement",
            "auteur"         => "Albin Michel",
            "annee_edition" => date('Y-m-d H:i:s'),
            "prix"           => 6, 55
        ],
        [
            "isbn"           => "9782702183670",
            "titre"          => "L'Inconnue de la Seine",
            "auteur"         => "Calmann-Lévy",
            "annee_edition" => date('Y-m-d H:i:s'),
            "prix"           => 3, 44
        ],
        [
            "isbn"           => "9782892259551",
            "titre"          => "Père riche père pauvre - édition 20e anniversaire",
            "auteur"         => "Robert t ",
            "annee_edition" => date('Y-m-d H:i:s'),
            "prix"           => 4, 45
        ],
        [
            "isbn"           => "9782892259551",
            "titre"          => "Les Grandes oubliées",
            "auteur"         => "Titiou",
            "annee_edition" => date('Y-m-d H:i:s'),
            "prix"           => 3, 54
        ],
        [
            "isbn"           => "9782216157464",
            "titre"          => "Les nouveaux cahiers - PREVENTION SANTE ENVIRONNEMENT PSE CAP",
            "auteur"         => "Crosnier Sylvie",
            "annee_edition" => date('Y-m-d H:i:s'),
            "prix"           => 1, 64
        ],
        [
            "isbn"           => "9783869308197",
            "titre"          => "Images à la Sauvette",
            "auteur"         => "Henri Cartier-Bresson ",
            "annee_edition" => date('Y-m-d H:i:s'),
            "prix"           => 921, 55
        ],
        [
            "isbn"           => "9791095821199",
            "titre"          => "Les américains",
            "auteur"         => "Robert Frank",
            "annee_edition" => date('Y-m-d H:i:s'),
            "prix"           => 35, 00
        ],
        [
            "isbn"           => "9783865216922",
            "titre"          => "Peru",
            "auteur"         => "Robert Frank",
            "annee_edition" => date('Y-m-d H:i:s'),
            "prix"           => 19, 97
        ],
        [
            "isbn"           => "9782381960258",
            "titre"          => "Anne de Redmond",
            "auteur"         => " Lucy Maud Montgomery,",
            "annee_edition" => date('Y-m-d H:i:s'),
            "prix"           => 16, 50
        ],
        [
            "isbn"           => "9782381960258",
            "titre"          => "En harmonie. De Camille à Noholita",
            "auteur"         => "Robert Laffont",
            "annee_edition" => date('Y-m-d H:i:s'),
            "prix"           => 19, 90
        ],
    ];

    foreach ($livres as $livre) {
        $livre = (object) $livre;
        $sql = "INSERT INTO livre ";
        $sql .= "(isbn, titre, auteur, annee_edition, prix) ";
        $sql .= "VALUES (?, ?, ?, ?, ?)  ";
        $stmt = $db->prepare($sql);
        $stmt->execute(
            [
                $livre->isbn, $livre->titre,  $livre->auteur,
                $livre->annee_edition, $livre->prix
            ]
        );
    }
}
