<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>555</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <h1 class="site__title">555</h1>
    <form action="#" class="site__content">
        <div class="inputs">
            <div class="form-field">
                <label for="r1">R1:</label>
                <select id="r1" name="r1">
                    <?php foreach($r_values as $name => $value): ?>
                    <option value="<?= $value ?>"><?= $name ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-field">
                <label for="r2">R2:</label>
                <select id="r2" name="r2">
                    <?php foreach($r_values as $name => $value): ?>
                    <option value="<?= $value ?>"><?= $name ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-field">
                <label for="C">C:</label>
                <select id="c" name="c">
                    <?php foreach($c_values as $name => $value): ?>
                    <option value="<?= $value ?>"><?= $name ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="outputs">
            <div class="output">
                <span class="output__caption">Time high:</span>
                <output class="output__value" id="oh"></output><span class="unit__value">&nbsp;s</span>
            </div>
            <div class="output">
                <span class="output__caption">Time low:</span>
                <output class="output__value" id="ol"></output><span class="unit__value">&nbsp;s</span>
            </div>
            <div class="output">
                <span class="output__caption">Total time:</span>
                <output class="output__value" id="ot"></output><span class="unit__value">&nbsp;s</span>
            </div>
            <div class="output">
                <span class="output__caption">Duty cycle:</span>
                <output class="output__value" id="od"></output><span class="unit__value">&nbsp;%</span>
            </div>
        </div>
    </form>
</body>

<script>

    var r1, r2, c, ln = 0.6931471805599453;
var oh, ol, ot, od;

function fton (r1, r2, c){
    return ln * c * (r1 + r2);
}

function ftoff (r1, r2, c){
    return ln * c * r2;
}

function fduty (ton, toff) {
    return ton / (ton + toff) * 100;
}

function change() {
    var vr1 = parseFloat(r1.value);
    var vr2 = parseFloat(r2.value);
    var vc = parseFloat(c.value);

    var ton = fton(vr1, vr2, vc);
    var toff = ftoff(vr1, vr2, vc);
    var duty = fduty(ton, toff);

    oh.innerText = ton.toFixed(3);
    ol.innerText = toff.toFixed(3);
    ot.innerText = (ton + toff).toFixed(3);
    od.innerText = duty.toFixed(1);
}

window.onload = function(){

    r1 = document.getElementById('r1');
    r2 = document.getElementById('r2');
    c = document.getElementById('c');

    oh = document.getElementById('oh');
    ol = document.getElementById('ol');
    ot = document.getElementById('ot');
    od = document.getElementById('od');

    r1.addEventListener('change', change);
    r2.addEventListener('change', change);
    c.addEventListener('change', change);

}

</script>
</html>

