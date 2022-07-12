const buttonElements = document.querySelectorAll('button');

let wordElements = document.querySelectorAll('.word-row');
var randomWord;
let row = 1;
let letter = 1;
// for default game value = 6
let rowMax = 6;

// true for time mode (daily and normal time mode)
var timeMode = false;
// true indicates countdown mode --
// false indicates count up mode
var modeCD = false;

// handle current game state
let gameOver = false;
let guessedCorrectly = false;


// fallback word is SHOOT
function setRandomWord(randWord) {
    if (randWord.length !== 5) {
        randomWord = 'SHOOT';
        console.log('The fallback word has been triggered!');
    } else {
        randomWord = randWord;
        console.log('Word set!');
    }
}


function setTimeModeForGame(mode) {
    timeMode = mode;
}


// counts the char occurences
function getLettersAsMap() {
    const map = new Map();
    let word = randomWord.toUpperCase();

    for (let i=0;i<word.length;i++) {
        map.set(word[i], (word.match(new RegExp(word[i], "g"))).length);
    }
    
    return map;
}



function populateWord(key) {
    if (letter < 6) {
        wordElements[row - 1].querySelectorAll('.word')[letter - 1].innerHTML = key;
        letter += 1;
    }
}


function checkForGameEnd(numOfCorrectAlphabets, timeEnded) {
    if (numOfCorrectAlphabets === 5) {
        gameOver = true;
        guessedCorrectly = true;
        // add data to invisible inputs and run the php script
        
        if (timeMode) {
            clearInterval(cdInterval);
            console.log(minutes);
            var hiddenInput;
            if (modeCD) {
                hiddenInput = document.querySelector('#timeFieldCD');
                hiddenInput.value=minutes;
            } else {
                hiddenInput = document.querySelector('#timeFieldCU');
                hiddenInput.value=minutes;
            }
        }

        // popup with continue button -> transfers data to database
        document.querySelector('.popup').classList.remove('display-none');
    } else if (timeEnded) {
        gameOver = true;
        window.location.replace("/gamemodis.php");
    } else if (timeMode === true && row === rowMax) {
        rowMax += 1;
        // adds one more word-row
        document.querySelector('.words-container').innerHTML += '<div class="word-row"><div class="word"></div><div class="word"></div><div class="word"></div><div class="word"></div><div class="word"></div></div>';
        wordElements = document.querySelectorAll('.word-row');
    } else if (row === rowMax) {
        gameOver = true;
        window.location.replace("/gamemodis.php");
        alert('You lose! Try again.');
    }
}

/**Implements the core color grading logic for the three known cases.
 * It also checks if a char has already enough occurences in the user given
 * string.
 * 
 * Example: 
 * Word is: Shout
 * User enters: Shoot
 * 
 * -> The second 'o' will be marked red on the game field, as the first 'o' is already
 *  in the right spot and thus the program knows all following 'o's are too many.
 *
 * If a letter on the keyboard is already marked green it will not change its color back
 * to yellow.
*/
function checkWord() {
    const letterElements = wordElements[row - 1].querySelectorAll('.word');
    // referance map
    const wordMap = getLettersAsMap();
    const letterMap = getLettersAsMap();
    let numOfCorrectAlphabets = 0;

    letterElements.forEach((element, index) => {
        var indexOfLetterInWord = randomWord.toUpperCase().indexOf(element.innerText.toUpperCase());
        if (wordMap.get(element.innerText.toUpperCase()) > 1) {
            indexOfLetterInWord = randomWord.toUpperCase().indexOf(element.innerText.toUpperCase(), index);
        }
        var idForKeyboard = document.getElementById(element.innerText.toUpperCase());

        if (indexOfLetterInWord === index && letterMap.get(element.innerText.toUpperCase()) > 0) {
            idForKeyboard.classList.remove('yellow-bg');
            idForKeyboard.classList.add('green-bg');
            element.classList.add('green-bg');

            var size = letterMap.get(element.innerText.toUpperCase()) - 1;
            letterMap.set(element.innerText.toUpperCase(), size);
            numOfCorrectAlphabets += 1;
        } else if (indexOfLetterInWord >= 0 && letterMap.get(element.innerText.toUpperCase()) > 0) {

            if (!idForKeyboard.classList.contains('green-bg')){
                idForKeyboard.classList.add('yellow-bg');
            }
            
            element.classList.add('yellow-bg');
        } else {
            
            if (!idForKeyboard.classList.contains('green-bg') && !idForKeyboard.classList.contains('yellow-bg')) {
                idForKeyboard.classList.add('red-bg');
            }
                
            element.classList.add('red-bg');
        }

        if (wordMap.get(element.innerText.toUpperCase()) > 1 && letterMap.get(element.innerText.toUpperCase()) === 0) {
            alert('All ' + wordMap.get(element.innerText.toUpperCase()) + ' ' + element.innerText.toUpperCase() + ' are in the right spot.');
        }
    });
    letterMap.clear();
    checkForGameEnd(numOfCorrectAlphabets);
}


function enterWord() {
    if (letter < 6) {
        alert('Not enough letters');
    } else {
        checkWord();
        row += 1;
        letter = 1;
    }
}


function deleteLetter() {
    const letterElements = wordElements[row - 1].querySelectorAll('.word');
    
    for (let index = letterElements.length - 1; index >= 0; index--) {
        const element = letterElements[index];
        
        if (element.innerText !== '') {
            element.innerText = '';
            letter -= 1;
            break;
        }

    }
    
}

function keypress(key) {
    if (!gameOver) {
        if (key.toUpperCase() === 'ENTER') {
            enterWord();
        } else if (key.toUpperCase() === 'BACKSPACE') {
             deleteLetter();
        } else {
            populateWord(key);
        }
    } else {
        // call popup for play again (only if time runs out or all rows have been used)
        
    }

}

var cdInterval;
var minutes;

function startTimerCD(durationInSeconds, display, hiddenInputForMinutes) {
    var timer = durationInSeconds, seconds;

    cdInterval = setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            alert('Time is up! Try again or choose another mode.');
            hiddenInputForMinutes.value=minutes;
            clearInterval(cdInterval);
            checkForGameEnd(0, true);
        }
    }, 1000);

}

var cuInterval;
var minutesUp;

function startTimerCU(maxDurationInSeconds, display, hiddenInputForMinutes) {
    var timer = 0, seconds;

    cuInterval = setInterval(function () {
        minutesUp = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutesUp = minutesUp < 10 ? "0" + minutesUp : minutesUp;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutesUp + ":" + seconds;

        if (++timer > maxDurationInSeconds) {
            alert('Time is up! Come again tomorrow.');
            hiddenInputForMinutes.value=minutesUp;
            clearInterval(cuInterval);
            checkForGameEnd(0, true);
        }
    }, 1000);

}


// allows clicks on the alphabet on the right side
buttonElements.forEach((element) => {
    element.addEventListener('click', function() {
        keypress(element.attributes["data-key"].value)
    });
});

// allows keyboard interactions for a selected range of input
window.addEventListener('keydown', function(e) {
    let acceptedValues = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ BACKSPACE';
    if (acceptedValues.includes(e.key.toUpperCase())) {
        keypress(e.key.toUpperCase());
    }
});


function setInitGameValues(w, mode, modecd, t = 15) {
    setRandomWord(w);
    console.log(w);
    setTimeModeForGame(mode);
    if (mode) {
        time = t;
        modeCD = modecd;
    }
}