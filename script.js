
window.addEventListener('load', (e) => {
let url = 'https://api.coingecko.com/api/v3/simple/price?ids=ethereum&vs_currencies=eur';
fetch(url)
.then((response) => { // Code appelé quand le navigateur reçoit la réponse
if (!response.ok) {
    throw new Error(`HTTP error: ${response.status}`);
}
return response.json();
})
.then((json) => document.querySelector('#cours_nft').innerHTML = json) // Code appelé si la réponse est OK
.catch((err) => console.error(`Fetch problem: ${err.message}`));

});

console.dir(response);

