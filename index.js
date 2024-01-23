let pepperoni = document.getElementById('pepperoni');
let boeuf = document.getElementById('boeuf');
let chorizo = document.getElementById('chorizo');

let bigmac = document.getElementById('bigmac');
let chevremiel = document.getElementById('chevremiel');
let steak = document.getElementById('steak');

let nombreArticleElement = document.getElementById('nombreArticle');
let nombreArticle = 0;

marguarita.onclick = function(event) {
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
}