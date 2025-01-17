let nombreArticleElement = document.getElementById('nombreArticle');
let nombreArticle = 0;

function addToCart(id) {
    console.log('Ajout au panier de l\'article avec l\'ID:', id);
    nombreArticle += 1;
    nombreArticleElement.innerHTML = nombreArticle;

    fetch('controller/panier_controller_fetch.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded', 
        },
        body: 'productId=' + encodeURIComponent(id)+'&action=add',
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