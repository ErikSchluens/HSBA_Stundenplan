<?php include_once('header.php')?>

    <title>Stundenplan</title>
    <h2 style="margin: 0.5%">Stundenplan erstellen:</h2>

    <div class="homepage_optioncontainer">

        <div>
            <h5>Modulname</h5>
            <div class="tooltip-container" style="margin-left: 95%; margin-top: -15.5%;">
                <img src='Info.png' alt='Info-Icon' style="width: 20px; height: 30px;">
                <span class="tooltip">Bitte gib dem Modul einen Namen z.B. "Mathe-BI1".</span>
            </div>
            <div>
                <input type="text" style="height: 38px;" placeholder="Kursname eingeben">
                <button type="submit" name="submit" class="btn btn-dark" style="background-color: #032d57; margin-bottom: 1.1%">Bestätigen</button>
            </div>
        </div>

        <div>
            <h5>Kurszusammensetzung</h5>

            <div class="tooltip-container" style="margin-left: 105%; margin-top: -15.5%;">
                <img src='Info.png' alt='Info-Icon' style="width: 20px; height: 30px;">
                <span class="tooltip">Bitte wähle mehrere Kurse aus, die an dem Modul teilnehmen sollen.</span>
            </div>
            <div style="margin-top: 4%">
                <select name="dropdown1" id="dropdown1" onchange="showDropdown(1)">
                    <option value="">Keinen Kurs</option>
                    <option value="22A-BA1">22A-BA1</option>
                    <option value="22A-BA2">22A-BA2</option>
                    <option value="22A-BA3">22A-BA3</option>
                    <option value="22A-BA4">22A-BA4</option>
                    <option value="22A-BI1">22A-BI1</option>
                </select>
                <select name="dropdown2" id="dropdown2">
                    <option value="">Keinen Kurs</option>
                    <option value="22A-BA1">22A-BA1</option>
                    <option value="22A-BA2">22A-BA2</option>
                    <option value="22A-BA3">22A-BA3</option>
                    <option value="22A-BA4">22A-BA4</option>
                    <option value="22A-BI1">22A-BI1</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-dark" style="background-color: #032d57; margin-top: 8%">Bestätigen</button>
        </div>
    </div>

    <div style="height: 500px; width: 100%;"></div>
<?php include_once('footer.php')?>