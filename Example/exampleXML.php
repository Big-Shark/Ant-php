<?php

    use Classes\Currency\CountCurrency;
    use Classes\Currency\Service\CbrXMLDaily;

    $countCurrency = new CountCurrency(new CbrXMLDaily());

    $price = 1;
    $valute1 = "Австралийский доллар";
    $valute2 = "Австралийский доллар";

    $sum = round($countCurrency->calculate($price, $valute1, $valute2), 3);

    echo $sum;

