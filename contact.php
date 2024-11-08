<?php
header('Content-Type: text/html; charset=UTF-8');
$pageTitle = "Contact";
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';

$success_message = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nettoyage et validation des données
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Validation supplémentaire
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "L'adresse email n'est pas valide.";
    } elseif (empty($nom) || empty($prenom) || empty($message)) {
        $error_message = "Tous les champs sont obligatoires.";
    } else {
        // Configuration de l'email
        $to = "lafabriqueadouceurs70@gmail.com";
        $subject = "Nouveau message de La Fabrique à Douceurs";
        
        $email_content = "Nouveau message reçu :\n\n";
        $email_content .= "Nom : " . $nom . "\n";
        $email_content .= "Prénom : " . $prenom . "\n";
        $email_content .= "Email : " . $email . "\n";
        $email_content .= "Téléphone : " . $telephone . "\n\n";
        $email_content .= "Message :\n" . $message . "\n";

        // En-têtes de l'email
        $headers = array(
            'From' => $email,
            'Reply-To' => $email,
            'X-Mailer' => 'PHP/' . phpversion(),
            'Content-Type' => 'text/plain; charset=UTF-8'
        );

        if (mail($to, $subject, $email_content, implode("\r\n", $headers))) {
            $success_message = "Votre message a bien été envoyé. Nous vous répondrons dans les plus brefs délais.";
        } else {
            $error_message = "Une erreur s'est produite lors de l'envoi du message. Veuillez réessayer ou nous contacter directement par téléphone.";
        }
    }
}
?>

<main>
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <h1 class="contact-title">Contactez-nous</h1>
            <p class="contact-subtitle">Pour donner vie à vos envies sucrées</p>
        </div>
    </section>

   <!-- Partie à modifier dans la section contact -->
<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <!-- Informations de contact modifiées -->
            <div class="contact-info" data-aos="fade-right">
                <div class="info-section">
                    <h2 class="info-title text-center">Comment nous contacter ?</h2>
                    <div class="info-cards">
                        <div class="info-card text-center">
                            <span class="info-icon">📝</span>
                            <h3>Comment commander ?</h3>
                            <p>Utilisez le formulaire ci-contre pour me décrire votre projet. Je vous répondrai dans les plus brefs délais avec toutes les informations nécessaires.</p>
                        </div>
                        
                        <div class="info-card text-center">
                            <span class="info-icon">⏰</span>
                            <h3>Délais de commande</h3>
                            <p>Pour garantir la meilleure qualité, merci de commander au minimum 1 semaine à l'avance.</p>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Formulaire -->
                <div class="form-container" data-aos="fade-left">
                    <?php if ($success_message): ?>
                        <div class="success-message" role="alert">
                            <span class="success-icon">✓</span>
                            <?php echo htmlspecialchars($success_message); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($error_message): ?>
                        <div class="error-message" role="alert">
                            <span class="error-icon">⚠</span>
                            <?php echo htmlspecialchars($error_message); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="contact-form">
                        <div class="form-row">
                            <div class="input-group">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" 
                                       id="nom" 
                                       name="nom" 
                                       class="form-input" 
                                       required 
                                       value="<?php echo isset($nom) ? htmlspecialchars($nom) : ''; ?>"
                                       pattern="[A-Za-zÀ-ÿ\s-]+"
                                       title="Lettres et tirets uniquement">
                            </div>
                            <div class="input-group">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" 
                                       id="prenom" 
                                       name="prenom" 
                                       class="form-input" 
                                       required
                                       value="<?php echo isset($prenom) ? htmlspecialchars($prenom) : ''; ?>"
                                       pattern="[A-Za-zÀ-ÿ\s-]+"
                                       title="Lettres et tirets uniquement">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="input-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       class="form-input" 
                                       required
                                       value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                            </div>
                            <div class="input-group">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="tel" 
                                       id="telephone" 
                                       name="telephone" 
                                       class="form-input" 
                                       required
                                       value="<?php echo isset($telephone) ? htmlspecialchars($telephone) : ''; ?>"
                                       pattern="[0-9\s+()-]+"
                                       title="Numéro de téléphone valide">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-label">Votre message</label>
                            <textarea id="message" 
                                      name="message" 
                                      class="form-textarea" 
                                      required
                                      rows="6"
                                      placeholder="Décrivez votre projet (type de gâteau, nombre de parts, date souhaitée, etc.)"><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea>
                        </div>

                        <button type="submit" class="form-submit">
                            Envoyer mon message
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>