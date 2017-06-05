var Send = confirm('Voulez-vous envoyer ce mail ? (rechargez la page pour réafficher ce message)');
if (Send == true) {
    document.location.href="../newsletterSend.php";
}
window.onload = loaded;