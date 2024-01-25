let nombreArticleElement = document.getElementById('nombreArticle');
let nombreArticle = 0;

let pepperoni = document.getElementById('pepperoni');
let boeuf = document.getElementById('boeuf');
let chorizo = document.getElementById('chorizo');

let bigmac = document.getElementById('bigmac');
let chevremiel = document.getElementById('chevremiel');
let steak = document.getElementById('steak');

let ajouterAuPanierBtn = document.getElementById('ajouterAuPanierBtn');
ajouterAuPanierBtn.onclick = function(event) {
    addPanier();
};

pepperoni.onclick = function(event) {
    addPanier();
}

boeuf.onclick = function(event) {
    addPanier();
}

chorizo.onclick = function(event) {
    addPanier();
}

bigmac.onclick = function(event) {
    addPanier();
}

chevremiel.onclick = function(event) {
    addPanier();
}

steak.onclick = function(event) {
    addPanier();
}

function addPanier() {
    nombreArticle += 1;
    nombreArticleElement.innerHTML = nombreArticle;

    fetch('panier.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ itemCount: nombreArticle }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
