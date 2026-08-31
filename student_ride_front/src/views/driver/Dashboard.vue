<template>
    <div class="page">

        <div class="header">
            <div>
                <span class="eyebrow">ESPACE CHAUFFEUR</span>
                <h1>Bonjour, Aubin 👋</h1>
                <p>Voici un aperçu de votre activité.</p>
            </div>

            <RouterLink to="/driver/trajets/create" class="primary-btn">
                + Nouveau trajet
            </RouterLink>
        </div>


        <div class="stats">

            <div class="stat-card">
                <span>Trajets publiés</span>
                <strong>12</strong>
                <small>Ce mois-ci</small>
            </div>

            <div class="stat-card">
                <span>Réservations</span>
                <strong>34</strong>
                <small>+12% ce mois</small>
            </div>

            <div class="stat-card">
                <span>Places occupées</span>
                <strong>42</strong>
                <small>Sur vos trajets</small>
            </div>

            <div class="stat-card">
                <span>Revenus</span>
                <strong>21 500</strong>
                <small>FCFA ce mois</small>
            </div>

        </div>


        <div class="grid">

            <section class="card">

                <div class="card-header">
                    <h2>Prochains trajets</h2>

                    <RouterLink to="/driver/trajets">
                        Voir tout
                    </RouterLink>
                </div>

                <div class="trip">

                    <div class="date">
                        <strong>31</strong>
                        <span>AOÛT</span>
                    </div>

                    <div class="route">
                        <strong>Abomey-Calavi → Cotonou</strong>
                        <span>07:30 • 2 passagers</span>
                    </div>

                    <span class="status confirmed">
                        Confirmé
                    </span>

                </div>

                <div class="trip">

                    <div class="date">
                        <strong>01</strong>
                        <span>SEP</span>
                    </div>

                    <div class="route">
                        <strong>Calavi → Cotonou</strong>
                        <span>08:00 • 3 passagers</span>
                    </div>

                    <span class="status pending">
                        En attente
                    </span>

                </div>

            </section>


            <section class="card">

                <h2>Votre activité</h2>

                <div class="rating">
                    <strong>4.8</strong>
                    <span>★★★★★</span>
                    <small>Note moyenne</small>
                </div>

                <div class="activity">
                    <span>Trajets terminés</span>
                    <strong>28</strong>
                </div>

                <div class="activity">
                    <span>Passagers transportés</span>
                    <strong>76</strong>
                </div>

            </section>

        </div>

    </div>
</template>

<style scoped>
.page {
    max-width: 1300px;
    margin: auto;
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 28px;
}

.eyebrow {
    color: var(--primary);
    font-size: 11px;
    font-weight: 700;
}

h1 {
    margin: 6px 0;
    font-size: 27px;
}

.header p {
    color: var(--text-secondary);
    font-size: 13px;
}

.primary-btn {
    padding: 11px 17px;
    border-radius: 9px;
    background: var(--primary);
    color: white;
    font-size: 12px;
    font-weight: 600;
}

.stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-bottom: 20px;
}

.stat-card,
.card {
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
}

.stat-card {
    padding: 20px;
}

.stat-card span,
.stat-card small {
    display: block;
    color: var(--text-secondary);
    font-size: 11px;
}

.stat-card strong {
    display: block;
    margin: 8px 0 4px;
    font-size: 25px;
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
    font-size: 16px;
}

.card-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
}

.card-header a {
    color: var(--primary);
    font-size: 11px;
}

.trip {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 16px 0;
    border-top: 1px solid var(--border);
}

.date {
    width: 45px;
    text-align: center;
}

.date strong {
    display: block;
    font-size: 19px;
}

.date span {
    color: var(--text-secondary);
    font-size: 9px;
}

.route {
    flex: 1;
}

.route strong {
    display: block;
    font-size: 12px;
}

.route span {
    color: var(--text-secondary);
    font-size: 10px;
}

.status {
    padding: 5px 9px;
    border-radius: 20px;
    font-size: 10px;
}

.confirmed {
    background: #f0fdf4;
    color: var(--success);
}

.pending {
    background: #fff7ed;
    color: #ea580c;
}

.rating {
    text-align: center;
    padding: 25px 0;
}

.rating strong {
    display: block;
    font-size: 34px;
}

.rating span {
    display: block;
    margin: 5px;
}

.rating small {
    color: var(--text-secondary);
    font-size: 10px;
}

.activity {
    display: flex;
    justify-content: space-between;
    padding: 14px 0;
    border-top: 1px solid var(--border);
    font-size: 12px;
}

.activity span {
    color: var(--text-secondary);
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
    .header {
        align-items: flex-start;
        flex-direction: column;
        gap: 15px;
    }

    .stats {
        grid-template-columns: 1fr;
    }
}
</style>