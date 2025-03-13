<?php
    $selected_language = $_GET["language"];

    require("db_connection.php");
    $pdo = Database::getConnection();
    $selected_language = $_GET["language"];

    // a kiválasztott érték alapján meghatározzuk mi annak a nyelvnek az ID-ja
    // ha megvan az ID, akko a navbar_szoveg táblából kiszedjük az azonos 
    // language_id-val rendelkező sorokat és elmentjük őket egy arrayba
    // navbar_id, mint kulcs és a szöveget, mint érték
    try{
        $stmt = $pdo->prepare("SELECT navbar_id, szoveg FROM navbar_szoveg WHERE language_id = (SELECT id FROM languages
        WHERE language_code = ?);");
        $stmt->execute([$selected_language]);
    } catch(PDOException $e) {
        die("Hiba a lekérdezés során: " . $e->getMessage());
    }

    $nav = array();
    while($row = $stmt->fetch()) {
        $nav[$row["navbar_id"]-1] = $row["szoveg"];
    }

    // visszaküldjük json-ként kódolva a tömböt az ajaxnak
    echo json_encode($nav);
?>