const token = document.querySelector('meta[name="csrf-token"]').content;

async function deconnexion() {
    try {
        const response = await fetch("/logout", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token
            },
        });
        if (response.ok) {
            // Redirige manuellement vers la page d'accueil
            window.location.href = '/home';
        } else {
            console.error("Erreur lors de la déconnexion");
        }
    } catch (error) {
        console.error("Erreur réseau :", error);
    }
}