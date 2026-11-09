<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

// Dane wejsciowe
$uczniowie = [
    ["imie" => "Adam", "punkty" => 85],
    ["imie" => "Kasia", "punkty" => 92],
    ["imie" => "Marek", "punkty" => 48],
    ["imie" => "Ola", "punkty" => 67],
    ["imie" => "Tomek", "punkty" => 35]
];

// Funkcja zwracajaca procent punktow (test max 100 punktow)
function obliczProcent($punkty)
{
    return $punkty / 100 * 100;
}

// Funkcja przyznajaca ocene (if...else)
function przyznajOcene($punkty)
{
    if ($punkty >= 90) {
        $ocena = 5;
    } elseif ($punkty >= 80) {
        $ocena = 4;
    } elseif ($punkty >= 60) {
        $ocena = 3;
    } elseif ($punkty >= 40) {
        $ocena = 2;
    } else {
        $ocena = 1;
    }
    return $ocena;
}

// Funkcja sprawdzajaca czy uczen zdal (minimum 40 punktow)
function czyZdal($punkty)
{
    if ($punkty >= 40) {
        return true;
    } else {
        return false;
    }
}

// Tablice na imiona uczniow
$zaliczyli = [];
$niezaliczyli = [];

echo "RAPORT WYNIKOW TESTU INFORMATYCZNEGO<br>";

// Petla foreach - wyswietlanie wynikow uczniow
foreach ($uczniowie as $uczen) {
    $imie = $uczen["imie"];
    $punkty = $uczen["punkty"];

    echo $imie . "<br>";
    echo "Punkty: " . $punkty . "<br>";
    echo "Procent: " . obliczProcent($punkty) . "%<br>";
    echo "Ocena: " . przyznajOcene($punkty) . "<br>";

    if (czyZdal($punkty)) {
        echo "Status: ZALICZONY<br>";
        $zaliczyli[] = $imie;
    } else {
        echo "Status: NIEZALICZONY<br>";
        $niezaliczyli[] = $imie;
    }
}

// Petla for - suma i srednia
$suma = 0;
$liczbaUczniow = count($uczniowie);

for ($i = 0; $i < $liczbaUczniow; $i++) {
    $suma = $suma + $uczniowie[$i]["punkty"];
}

$srednia = $suma / $liczbaUczniow;

echo "--------------------------------<br>";
echo "PODSUMOWANIE KLASY<br>";
echo "Liczba uczniow: " . $liczbaUczniow . "<br>";
echo "Suma punktow: " . $suma . "<br>";
echo "Srednia punktow: " . $srednia . "<br>";
echo "Zaliczylo: " . count($zaliczyli) . "<br>";
echo "Nie zaliczylo: " . count($niezaliczyli) . "<br>";

// Imiona uczniow, ktorzy nie zaliczyli
echo "Nie zaliczyli: ";
foreach ($niezaliczyli as $imie) {
    echo $imie . " ";
}
echo "<br>";

// Instrukcja switch - komentarz do sredniej
// Srednia zamieniamy na przedzial, zeby switch dzialal poprawnie
if ($srednia < 40) {
    $przedzial = 1;
} elseif ($srednia < 60) {
    $przedzial = 2;
} elseif ($srednia < 80) {
    $przedzial = 3;
} else {
    $przedzial = 4;
}

switch ($przedzial) {
    case 1:
        $komentarz = "Bardzo slaby wynik klasy";
        break;
    case 2:
        $komentarz = "Wynik klasy jest niezadowalajacy";
        break;
    case 3:
        $komentarz = "Dobry wynik klasy";
        break;
    case 4:
        $komentarz = "Bardzo dobry wynik klasy";
        break;
    default:
        $komentarz = "Brak danych";
}

echo "Komentarz: " . $komentarz . "<br>";

?>
</body>
</html>