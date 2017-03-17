<?php if (isset($sign, $calculatedMoney)): ?>
    <h1><?php echo $sign; ?><?php echo $calculatedMoney; ?></h1>
<?php endif; ?>

    <form>
        <div>
            <label for="money">
                Enter Amount
            </label>
            <input id="money" type="number" name="money"/>
        </div>
        <div>
            <input id="usd" type="radio" name="currency" value="USD"/>
            <label for="usd">
                USD
            </label>
            <input id="eur" type="radio" name="currency" value="EUR"/>
            <label for="eur">
                EUR
            </label>
            <input id="bgn" type="radio" name="currency" value="BGN"/>
            <label for="bgn">
                BGN
            </label>
        </div>
        <div>
            <label for="interest">
                Compound Interest Amount
            </label>
            <input id="interest" type="number" name="interest"/>
        </div>
        <div>
            <select name="period">
                <option value="6">6 Months</option>
                <option value="12">1 Year</option>
                <option value="24">2 Years</option>
                <option value="60">5 Years</option>
            </select>
            <input type="submit" name="Calculate" value="Calculate"/>
        </div>
    </form>

<?php
if (isset($_GET['Calculate'])) {

    $validCurrencies = ['USD' => '$', 'BGN' => 'лв.', 'EUR' => '€'];
    $validPeriods = [6, 12, 24, 60];

    $money = filter_var($_GET['money'], FILTER_VALIDATE_INT);
    if ($money === false) {
        throw new Exception("Invalid money.");
    }

    $currency = $_GET['currency'];
    if (!array_key_exists($currency, $validCurrencies)) {
        throw new Exception("Invalid currency type.");
    }
    $sign = $validCurrencies[$currency];

    $interest = filter_var($_GET['interest'], FILTER_VALIDATE_INT);
    if ($interest === false) {
        throw new Exception("Invalid interest.");
    }

    $period = filter_var($_GET['period'], FILTER_VALIDATE_INT);
    if ($period === false || !in_array($period, $validPeriods)) {
        throw new Exception("Invalid period.");
    }

    $calculatedMoney = $money + (($money * $interest) / $period);
}