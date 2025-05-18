<?php

class Page
{
    private string $title;
    private string $javascriptFilename;

    public function __construct(string $title, string $javascriptFilename = '')
    {
        $this->title = $title;
        $this->javascriptFilename = $javascriptFilename;
    }

    private function getBodyHtml(): string
    {
        return match ($this->title) {
            'Home' => '
                <h1 class="page-heading">Home</h1>
                <p>This is my website! It includes a few projects I have completed and use on a daily-basis and a brief
                    description of me. Feel free to have a look around!</p>
                <p>If you have any suggestions for projects or change requests, visit my <a
                        href="https://github.com/guymarshall">GitHub</a>, or <a
                        href="mailto:guymarshall.c@gmail.com">email</a> me.</p>

                <h2 class="page-heading">About Me</h2>
                <p>I am Guy, a passionate software developer that likes to tinker with hardware through software. I am
                    interested in making software for the computers we use today to run, to improve our workflow.</p>
                <img src="https://avatars.githubusercontent.com/u/75757034?v=4"
                    class="rounded float-end mx-auto d-block img-fluid">
            ',
            'Insulin Calculator' => '
                <h1 class="page-heading">Insulin Calculator</h1>
                <div class="form-div" id="inputFields">
                    <label for="carbsPer100" class="input-label">Carbohydrate per 100g:</label>
                    <input class="input-field" autocomplete="nope" type="number" inputmode="decimal" id="carbsPer100"
                        name="carbsPer100" step="0.1" autocomplete="nope" min="0">
                    <br>
                    <label for="gramsOnScale" class="input-label">Grams on scale:</label>
                    <input class="input-field" autocomplete="nope" type="number" inputmode="decimal" id="gramsOnScale"
                        name="gramsOnScale" step="0.1" autocomplete="nope" min="0">
                    <br>
                    <label for="insulinRatio" class="input-label">Insulin ratio (insulin per 10g carbohydrate):</label>
                    <input class="input-field" autocomplete="nope" type="number" inputmode="decimal" id="insulinRatio"
                        name="insulinRatio" step="0.1" autocomplete="nope" min="0">
                    <br>
                    <button name="calculateInsulin" id="calculateInsulin" class="green-button">Calculate</button>
                    <button name="clearInputs" id="clearInputs" class="red-button">Reset</button>
                </div>
                <hr>
                <p name="carbsResult" id="carbsResult"></p>
                <p name="insulinResult" id="insulinResult"></p>
            ',
            'Name Generator' => '
                <h1 class="page-heading">Name Generator</h1>
                <div class="form-div">
                    <label for="number-of-names" class="input-label">Number to generate:</label>
                    <input type="number" id="number-of-names" name="number-of-names" class="input-field" required>
                    <br>
                    <label for="minimum-length" class="input-label">Minimum length:</label>
                    <input type="number" id="minimum-length" name="minimum-length" min="1" step="1" class="input-field"
                        required>
                    <br>
                    <label for="maximum-length" class="input-label">Maximum length:</label>
                    <input type="number" id="maximum-length" name="maximum-length" min="1" step="1" class="input-field"
                        required>
                    <br>
                    <button type="submit" id="generate-random-names" class="green-button">Generate</button>
                </div>
            ',
            'Dice Roller' => '
                <h1 class="page-heading">Dice Roller</h1>
                <div class="form-div">
                    <label for="number-of-dice" class="input-label">Number of dice to roll:</label>
                    <input type="number" id="number-of-dice" name="number-of-dice" class="input-field" required>
                    <br>
                    <label for="number-of-sides" class="input-label">Number of sides per die:</label>
                    <input type="number" id="number-of-sides" name="number-of-sides" min="1" step="1" class="input-field"
                        required>
                    <br>
                    <button type="submit" id="roll-dice" class="green-button">Roll Dice</button>
                </div>
            ',
            'Password Generator' => '
                <h1 class="page-heading">Password Generator</h1>
                <div class="form-div">
                    <button type="button" id="generate-password" class="green-button" onclick="location.reload()">Generate</button>
                    <div id="generated-password" class="input-field fs-3" style="user-select: all;">' . generatePassword() . '</div>
                </div>
            ',
            default => exit('Invalid title')
        };
    }

    public function render()
    {
        $scriptTag = $this->javascriptFilename ? '<script src="scripts/' . $this->javascriptFilename . '"></script>' : '';

        $head = '
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
                integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="styles/style.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous"></script>
            ' . $scriptTag . '
            <title>' . $this->title . '</title>
        ';

        $body = '
        <header>
            <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
                <div class="container">
                    <a class="navbar-brand" href="index.php">My Website</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                        <ul class="navbar-nav flex-grow-1">
                            <li class="nav-item">
                                <a class="nav-link' . ($this->title === 'Home' ? ' text-dark' : '') . '" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link' . ($this->title === 'Insulin Calculator' ? ' text-dark' : '') . '" href="insulincalculator.php">Insulin Calculator</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link' . ($this->title === 'Name Generator' ? ' text-dark' : '') . '" href="namegenerator.php">Name Generator</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link' . ($this->title === 'Dice Roller' ? ' text-dark' : '') . '" href="diceroller.php">Dice Roller</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link' . ($this->title === 'Password Generator' ? ' text-dark' : '') . '" href="passwordgenerator.php">Password Generator</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container">
            <main role="main" class="pb-3">
                ' . $this->getBodyHtml() . '
            </main>
        </div>
        ';

        echo '
            <!DOCTYPE html>
            <html lang="en">

            <head>
            ' . $head . '
            </head>
            <body>
            ' . $body . '
            </body>

            </html>
        ';
    }
}
