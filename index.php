<?php

    require_once __DIR__ . '/vendor/autoload.php';

    use Classes\Currency\CountCurrency;

    $beginInp = isset($_GET['begin_inp']) ? $_GET['begin_inp'] : 0;
    $beginCurrency = isset($_GET['begin_currency']) ? $_GET['begin_currency'] : 0;
    $endCurrency = isset($_GET['end_currency']) ? $_GET['end_currency'] : 0;
    $sum = "";

    try {
        $countCurrency = new CountCurrency();
        $array = $countCurrency->getCurrency();

        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $sum = $countCurrency->calculate($beginInp, $beginCurrency, $endCurrency);
        }

    } catch (Exception $e) {
        die("Ошибочка: {$e->getMessage()}");
    }

?>

    <form method="GET">
        <table>
            <tr>
                <td>
                    Исходная валюта:
                </td>
                <td>
                    <input type="text" name="begin_inp" value="<?= $beginInp ?>">
                </td>
                <td>
                    <select name="begin_currency">
                        <?php foreach ($array as $key => $value) : ?>
                            <option value="<?= $key ?>" <?= ($key == $beginCurrency) ? "selected" : "" ?> ><?= $key ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Перевести в:
                </td>
                <td></td>
                <td>
                    <select name="end_currency">
                        <?php foreach ($array as $key => $value) : ?>
                            <option value="<?= $key ?>" <?= ($key == $endCurrency) ? "selected" : "" ?> ><?= $key ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>
                    <input type="submit" value="Применить">
                </td>
            </tr>
        </table>
    </form>

    <br>

    <b><?= $beginInp . " " .  $beginCurrency ?></b>
    перевести в
    <b><?= $endCurrency ?></b> = <?= $sum ?>





