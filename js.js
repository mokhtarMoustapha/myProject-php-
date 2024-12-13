let clients_nav = document.getElementById("nav_clients");
let clients_flech = document.getElementById("flech_cl"); 
let clients_sous_liste = document.getElementById("s_liste_clients");
let ajt_clients = document.getElementById("ajt_clients")
let clients_aff = document.getElementById("aff_clients");
let page_ajoute_clients = document.getElementById("ajoute_clients");
let page_affiche_clients = document.getElementById("affiche_clients");

let commandes_nav = document.getElementById("nav_commande");
let commandes_flech = document.getElementById("flech_cmm");
let commandes_sous_liste = document.getElementById("s_liste_commandes");
let commandes_ajt = document.getElementById("ajt_commandes");
let commandes_aff = document.getElementById("aff_commandes");
let page_ajoute_commandes = document.getElementById("ajoute_commandes");
let page_affiche_commandes = document.getElementById("affiche_commandes");

let produits_nav = document.getElementById("nav_produits");
let produits_flech = document.getElementById("flech_pr");
let produits_sous_liste = document.getElementById("s_liste_produits");
let produits_ajt = document.getElementById("ajt_produits");
let produits_aff = document.getElementById("aff_produits");
let page_ajoute_produits = document.getElementById("ajoute_produits");
let page_affiche_produits = document.getElementById("affiche_produits");




clients_flech.addEventListener ('click', () => {
    if (clients_sous_liste.style.display === "none") {
        clients_sous_liste.style.display = "block";
        clients_flech.classList.remove("fa-angle-down");
        clients_flech.classList.add("fa-angle-up");
    }
    else {
        clients_sous_liste.style.display = "none";
        clients_flech.classList.remove("fa-angle-up");
        clients_flech.classList.add("fa-angle-down");
    }
});


commandes_flech.addEventListener ('click', () => {
    if (commandes_sous_liste.style.display === "none") {
        commandes_sous_liste.style.display = "block";
        commandes_flech.classList.remove("fa-angle-down");
        commandes_flech.classList.add("fa-angle-up");
    }
    else {
        commandes_sous_liste.style.display = "none";
        commandes_flech.classList.remove("fa-angle-up");
        commandes_flech.classList.add("fa-angle-down");
    }
});


produits_flech.addEventListener ('click', () => {
    if (produits_sous_liste.style.display === "none") {
        produits_sous_liste.style.display = "block";
        produits_flech.classList.remove("fa-angle-down");
        produits_flech.classList.add("fa-angle-up");
    }
    else {
        produits_sous_liste.style.display = "none";
        produits_flech.classList.remove("fa-angle-up");
        produits_flech.classList.add("fa-angle-down");
    }
});


window.onload = () => {
    let pdf=document.getElementById('pdf').addEventListener('click', () => { 
        html2canvas(document.querySelector("#content-to-print")).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const pdf = new jspdf.jsPDF();
            pdf.addImage(imgData, 'PNG', 10, 10);
            pdf.save('download.pdf');
            });
        });
    }