<template>
    <div class="page">

        <div class="header">
            <div>
                <span class="eyebrow">ADMINISTRATION</span>
                <h1>Dashboard</h1>
                <p>Vue globale de la plateforme Student-Ride.</p>
            </div>
        </div>


        <div class="stats">

            <div class="stat">
                <span>Utilisateurs</span>
                <strong>1 248</strong>
                <small>+8,4% ce mois</small>
            </div>

            <div class="stat">
                <span>Chauffeurs</span>
                <strong>86</strong>
                <small>74 actifs</small>
            </div>

            <div class="stat">
                <span>Trajets</span>
                <strong>342</strong>
                <small>+24 cette semaine</small>
            </div>

            <div class="stat">
                <span>Réservations</span>
                <strong>2 481</strong>
                <small>+12,7%</small>
            </div>

        </div>


        <div class="grid">

            <section class="card">

                <div class="card-header">
                    <h2>Activité récente</h2>

                    <button>
                        Voir tout
                    </button>
                </div>


                <div class="activity">

                    <div class="icon">👤</div>

                    <div>
                        <strong>Nouvel utilisateur</strong>
                        <span>Un étudiant vient de créer un compte.</span>
                    </div>

                    <small>Il y a 5 min</small>

                </div>


                <div class="activity">

                    <div class="icon">🚗</div>

                    <div>
                        <strong>Nouveau trajet</strong>
                        <span>Abomey-Calavi → Cotonou</span>
                    </div>

                    <small>Il y a 18 min</small>

                </div>


                <div class="activity">

                    <div class="icon">🎫</div>

                    <div>
                        <strong>Nouvelle réservation</strong>
                        <span>Réservation #SR-2451</span>
                    </div>

                    <small>Il y a 32 min</small>

                </div>

            </section>


            <section class="card">

                <h2>État de la plateforme</h2>

                <div class="system">
                    <span>Serveur</span>
                    <strong class="online">● Opérationnel</strong>
                </div>

                <div class="system">
                    <span>API</span>
                    <strong class="online">● Opérationnelle</strong>
                </div>

                <div class="system">
                    <span>Base de données</span>
                    <strong class="online">● Opérationnelle</strong>
                </div>

                <div class="system">
                    <span>Suivi temps réel</span>
                    <strong class="online">● Actif</strong>
                </div>

            </section>

        </div>


        <section class="card quick">

            <h2>Actions rapides</h2>

            <div class="quick-grid">

                <RouterLink to="/admin/users">
                    👥
                    <strong>Gérer les utilisateurs</strong>
                    <span>Comptes étudiants et chauffeurs</span>
                </RouterLink>

                <RouterLink to="/admin/trajets">
                    🚗
                    <strong>Gérer les trajets</strong>
                    <span>Consulter et modérer les trajets</span>
                </RouterLink>

                <RouterLink to="/admin/reservations">
                    🎫
                    <strong>Réservations</strong>
                    <span>Consulter toutes les réservations</span>
                </RouterLink>

            </div>

        </section>

    </div>
</template>


<style scoped>

.page {
    max-width: 1300px;
    margin: auto;
}

.header {
    margin-bottom: 25px;
}

.eyebrow {
    color: #2563eb;
    font-size: 10px;
    font-weight: 700;
}

h1 {
    margin: 6px 0;
    font-size: 27px;
}

.header p {
    color: #64748b;
    font-size: 13px;
}

.stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-bottom: 20px;
}

.stat,
.card {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    box-shadow: 0 2px 5px rgba(15,23,42,.04);
}

.stat {
    padding: 20px;
}

.stat span,
.stat small {
    display: block;
    color: #64748b;
    font-size: 11px;
}

.stat strong {
    display: block;
    margin: 8px 0 4px;
    font-size: 25px;
}

.stat small {
    color: #16a34a;
}

.grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
}

.card {
    padding: 22px;
}

.card h2 {
    font-size: 15px;
}

.card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
}

.card-header button {
    border: none;
    background: transparent;
    color: #2563eb;
    font-size: 11px;
}

.activity {
    display: grid;
    grid-template-columns: 38px 1fr auto;
    align-items: center;
    gap: 12px;
    padding: 15px 0;
    border-top: 1px solid #e2e8f0;
}

.icon {
    width: 35px;
    height: 35px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 8px;
    background: #eff6ff;
}

.activity strong,
.activity span {
    display: block;
}

.activity strong {
    font-size: 12px;
}

.activity span,
.activity small {
    color: #64748b;
    font-size: 10px;
}

.system {
    display: flex;
    justify-content: space-between;
    padding: 14px 0;
    border-bottom: 1px solid #e2e8f0;
    font-size: 11px;
}

.online {
    color: #16a34a;
    font-weight: 500;
}

.quick {
    margin-top: 20px;
}

.quick-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
}

.quick-grid a {
    padding: 18px;

    border: 1px solid #e2e8f0;
    border-radius: 9px;

    color: #0f172a;
    text-decoration: none;
}

.quick-grid a:hover {
    border-color: #2563eb;
}

.quick-grid a:first-letter {
    font-size: 20px;
}

.quick-grid strong,
.quick-grid span {
    display: block;
}

.quick-grid strong {
    margin-top: 10px;
    font-size: 12px;
}

.quick-grid span {
    margin-top: 4px;
    color: #64748b;
    font-size: 10px;
}

@media(max-width: 900px) {
    .stats {
        grid-template-columns: 1fr 1fr;
    }

    .grid {
        grid-template-columns: 1fr;
    }
}

@media(max-width: 600px) {
    .stats,
    .quick-grid {
        grid-template-columns: 1fr;
    }

    .activity {
        grid-template-columns: 38px 1fr;
    }

    .activity small {
        grid-column: 2;
    }
}

</style>