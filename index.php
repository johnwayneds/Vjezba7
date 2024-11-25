<?php
$result = "";
$finalGrade = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $grades = [
        "firstExam" => $_POST["firstExam"],
        "secondExam" => $_POST["secondExam"]
    ];

    if (
        $grades["firstExam"] >= 1 && $grades["firstExam"] <= 5 &&
        $grades["secondExam"] >= 1 && $grades["secondExam"] <= 5
    ) {
        $average = ($grades["firstExam"] + $grades["secondExam"]) / 2;

        if ($grades["firstExam"] < 2 || $grades["secondExam"] < 2) {
            $finalGrade = "Negativna ocjena";
        } else {
            $finalGrade = round($average);
        }

        $result = "Prosjek: " . number_format($average, 2) . "<br>Konačna ocjena: $finalGrade";
    } else {
        $result = "Ocjene moraju biti između 1 i 5!";
    }
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izračun ocjene</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Izračun prosjeka i konačne ocjene</h1>
        <form method="post">
            <label for="firstExam">Ocjena I. kolokvija:</label>
            <input type="number" id="firstExam" name="firstExam" min="1" max="5" required>

            <label for="secondExam">Ocjena II. kolokvija:</label>
            <input type="number" id="secondExam" name="secondExam" min="1" max="5" required>

            <button type="submit">Izračunaj</button>
        </form>
        <div class="result">
            <?php if ($result) echo $result; ?>
        </div>
    </div>
</body>
</html>
