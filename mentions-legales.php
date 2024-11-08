<?php
$pageTitle = "Mentions Légales";
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<main>
    <div class="container">
        <div class="legal-content">
            <h1 class="legal-title">Mentions légales</h1>

            <section class="legal-section">
                <h2>1. Présentation du site</h2>
                <p>Conformément aux dispositions des articles 6-III et 19 de la Loi n° 2004-575 du 21 juin 2004 pour la Confiance dans l'économie numérique, dite L.C.E.N., nous portons à la connaissance des utilisateurs et visiteurs du site les informations suivantes :</p>
            </section>

            <section class="legal-section">
                <h2>2. Informations légales</h2>
                <div class="legal-card">
                    <h3>Propriétaire du site :</h3>
                    <p>
                        RICHE Vanessa<br>
                        Auto-entrepreneur<br>
                        56 AV JEAN JAURES<br>
                        70400 HERICOURT<br>
                        SIRET : 95279815500018
                    </p>
                </div>

                <div class="legal-card">
                    <h3>Directeur de la publication :</h3>
                    <p>RICHE Vanessa</p>
                </div>
            </section>

            <section class="legal-section">
                <h2>3. Hébergement</h2>
                <div class="legal-card">
                    <p>
                        OVH SAS<br>
                        SAS au capital de 50 000 000 €<br>
                        2 rue Kellermann<br>
                        59100 Roubaix - France<br>
                        RCS Lille Métropole 424 761 419 00045<br>
                        Code APE 2620Z<br>
                        N° TVA : FR 22 424 761 419
                    </p>
                </div>
            </section>

            <section class="legal-section">
                <h2>4. Propriété intellectuelle</h2>
                <p>L'ensemble des éléments constituant ce site (textes, photos, images, logos, etc.) sont la propriété exclusive de La Fabrique à Douceurs. Toute reproduction, représentation, modification, publication, adaptation totale ou partielle des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable.</p>
            </section>

            <section class="legal-section">
                <h2>5. Protection des données personnelles</h2>
                <p>Conformément au Règlement Général sur la Protection des Données (RGPD), les informations collectées via le formulaire de contact sont destinées à La Fabrique à Douceurs dans le but de répondre à vos demandes. Vous disposez d'un droit d'accès, de rectification, de suppression et d'opposition aux données personnelles vous concernant. Pour exercer ce droit, adressez votre demande à l'adresse postale indiquée ci-dessus.</p>
            </section>

            <section class="legal-section">
                <h2>6. Loi applicable et juridiction</h2>
                <p>Les présentes mentions légales sont régies par la loi française. En cas de litige, les tribunaux français seront seuls compétents.</p>
            </section>
        </div>
    </div>
</main>

<style>
.legal-content {
    max-width: 800px;
    margin: 4rem auto;
    padding: 0 1rem;
}

.legal-title {
    font-family: 'Playfair Display', serif;
    color: var(--secondary);
    font-size: 2.5rem;
    margin-bottom: 3rem;
    text-align: center;
}

.legal-section {
    margin-bottom: 3rem;
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.legal-section h2 {
    color: var(--primary-dark);
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    font-family: 'Playfair Display', serif;
}

.legal-section h3 {
    color: var(--secondary);
    font-size: 1.2rem;
    margin: 1.5rem 0 1rem;
}

.legal-section p {
    line-height: 1.8;
    margin-bottom: 1rem;
    color: var(--text);
}

.legal-card {
    background: var(--background);
    padding: 1.5rem;
    border-radius: 10px;
    margin-bottom: 1.5rem;
}

@media (max-width: 768px) {
    .legal-content {
        margin: 2rem auto;
    }

    .legal-section {
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .legal-title {
        font-size: 2rem;
    }
}
</style>

<?php include __DIR__ . '/includes/footer.php'; ?>
