// select elements with class
const singleCards = document.querySelectorAll('.card-top');

// add event listener for selected elements
singleCards.forEach((card) => card.addEventListener
    ('click', () => {
        if (card.parentNode.classList.contains('active')){
            card.parentNode.classList.toggle('active');
            card.parentNode.classList.add('light-blue-bg')
        }
        else{
            // reset all cards to standard
            singleCards.forEach(
                (card) => card.parentNode.classList.remove('active', 'blue-bg')
            );
            singleCards.forEach(
                (card) => card.parentNode.classList.add('light-blue-bg')
            );

            // style opened card
            card.parentNode.classList.remove('light-blue-bg');
            card.parentNode.classList.add('active');
            card.parentNode.classList.add('blue-bg');
        }
    })
);