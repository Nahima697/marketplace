window.addEventListener('load', () => {
    const getPrice = () => {
        let url = 'https://api.coingecko.com/api/v3/simple/price?ids=ethereum&vs_currencies=eur';
        fetch(url)
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error: ${response.status}`);
                }
                return response.json();
            })
            .then((json) => {
                const ethereumPrice = json.ethereum.eur;
                document.querySelector('#cours_eth').innerHTML = `Le prix d'un Ethereum est de ${ethereumPrice} EUR.`;
            })
            .catch((err) => console.error(`Fetch problem: ${err.message}`));
    };

    getPrice();
    setInterval(getPrice, 30000);

    document.querySelector('.inscription').addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelector('.connexionFormulaire').classList.toggle('disabled');
    });

    // Get the modal
    let modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Attach click event listener to the delete button
    let deleteButton = document.querySelector('.deletebtn');
    if (deleteButton) {
        deleteButton.addEventListener('click', handleDeleteButtonClick);
    }
});
