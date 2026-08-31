<template>
    <div class="page">

        <!-- HEADER -->
        <div class="header">

            <div>
                <span class="eyebrow">TRAJET</span>

                <h1>Détails du trajet</h1>

                <p>
                    Consultez les informations et les passagers du trajet.
                </p>
            </div>

            <RouterLink
                to="/admin/trajets"
                class="back"
            >
                ← Retour aux trajets
            </RouterLink>

        </div>


        <!-- ROUTE -->
        <section class="route-card">

            <div class="location">

                <span class="label">DÉPART</span>

                <strong>Abomey-Calavi</strong>

                <span>31 août 2026</span>

            </div>


            <div class="arrow">
                →
            </div>


            <div class="location">

                <span class="label">DESTINATION</span>

                <strong>Cotonou</strong>

                <span>Arrivée prévue : 08:15</span>

            </div>


            <div class="status">
                ● En cours
            </div>

        </section>


        <!-- INFORMATIONS -->
        <div class="grid">

            <!-- CHAUFFEUR -->
            <section class="card">

                <h2>Chauffeur</h2>

                <div class="driver">

                    <div class="avatar">
                        A
                    </div>

                    <div>
                        <strong>Aubin</strong>
                        <span>Chauffeur vérifié</span>
                    </div>

                </div>


                <div class="info">

                    <div>
                        <span>Téléphone</span>
                        <strong>+229 97 00 00 00</strong>
                    </div>

                    <div>
                        <span>Note</span>
                        <strong>⭐ 4.8 / 5</strong>
                    </div>

                    <div>
                        <span>Véhicule</span>
                        <strong>Toyota Corolla</strong>
                    </div>

                    <div>
                        <span>Immatriculation</span>
                        <strong>AB 1234 RB</strong>
                    </div>

                </div>

            </section>


            <!-- TRAJET -->
            <section class="card">

                <h2>Informations du trajet</h2>

                <div class="info">

                    <div>
                        <span>Date</span>
                        <strong>31 août 2026</strong>
                    </div>

                    <div>
                        <span>Heure de départ</span>
                        <strong>07:30</strong>
                    </div>

                    <div>
                        <span>Nombre de places</span>
                        <strong>4 places</strong>
                    </div>

                    <div>
                        <span>Réservations</span>
                        <strong>3 / 4</strong>
                    </div>

                    <div>
                        <span>Prix par place</span>
                        <strong>1 000 FCFA</strong>
                    </div>

                    <div>
                        <span>Suivi GPS</span>
                        <strong class="active">● Actif</strong>
                    </div>

                </div>

            </section>

        </div>


        <!-- PASSAGERS -->
        <section class="card passengers">

            <div class="card-header">

                <div>
                    <h2>Passagers</h2>
                    <p>3 passagers ont réservé ce trajet.</p>
                </div>

            </div>


            <div class="passenger-list">

                <div class="passenger">

                    <div class="avatar">
                        R
                    </div>

                    <div class="passenger-info">
                        <strong>Ranti</strong>
                        <span>ranti@example.com</span>
                    </div>

                    <span class="confirmed">
                        ✓ Confirmée
                    </span>

                </div>


                <div class="passenger">

                    <div class="avatar">
                        M
                    </div>

                    <div class="passenger-info">
                        <strong>Maurice</strong>
                        <span>maurice@example.com</span>
                    </div>

                    <span class="confirmed">
                        ✓ Confirmée
                    </span>

                </div>


                <div class="passenger">

                    <div class="avatar">
                        D
                    </div>

                    <div class="passenger-info">
                        <strong>David</strong>
                        <span>david@example.com</span>
                    </div>

                    <span class="confirmed">
                        ✓ Confirmée
                    </span>

                </div>

            </div>

        </section>


        <!-- ACTIONS -->
        <section class="card actions">

            <h2>Actions administrateur</h2>

            <div class="buttons">

                <button class="primary">
                    Voir le suivi GPS
                </button>

                <button class="warning">
                    Suspendre le trajet
                </button>

                <button class="danger">
                    Annuler le trajet
                </button>

            </div>

        </section>

    </div>
</template>


<style scoped>

.page {
    max-width: 1200px;
    margin: auto;
}


/* HEADER */

.header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;

    margin-bottom: 25px;
}

.eyebrow {
    color: #2563eb;

    font-size: 10px;
    font-weight: 700;
}

h1 {
    margin: 6px 0;

    font-size: 26px;
}

.header p {
    margin: 0;

    color: #64748b;

    font-size: 13px;
}

.back {
    color: #2563eb;

    font-size: 11px;
    font-weight: 600;

    text-decoration: none;
}


/* ROUTE */

.route-card {
    display: flex;
    align-items: center;

    gap: 30px;

    padding: 25px;

    margin-bottom: 20px;

    background: white;

    border: 1px solid #e2e8f0;
    border-radius: 12px;
}

.location {
    flex: 1;
}

.location span,
.location strong {
    display: block;
}

.location .label {
    color: #94a3b8;

    font-size: 9px;
    font-weight: 700;
}

.location strong {
    margin: 7px 0;

    font-size: 17px;
}

.location span:last-child {
    color: #64748b;

    font-size: 10px;
}

.arrow {
    color: #2563eb;

    font-size: 25px;
    font-weight: 700;
}

.status {
    padding: 7px 10px;

    border-radius: 20px;

    background: #f0fdf4;
    color: #16a34a;

    font-size: 9px;
}


/* GRID */

.grid {
    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 20px;

    margin-bottom: 20px;
}

.card {
    padding: 22px;

    background: white;

    border: 1px solid #e2e8f0;
    border-radius: 12px;
}

.card h2 {
    margin-top: 0;

    font-size: 15px;
}


/* DRIVER */

.driver {
    display: flex;

    align-items: center;

    gap: 12px;

    padding-bottom: 18px;

    margin-bottom: 18px;

    border-bottom: 1px solid #e2e8f0;
}

.avatar {
    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #dbeafe;
    color: #2563eb;

    font-weight: 700;
}

.driver strong,
.driver span {
    display: block;
}

.driver strong {
    font-size: 12px;
}

.driver span {
    margin-top: 3px;

    color: #16a34a;

    font-size: 9px;
}


/* INFO */

.info {
    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 18px;
}

.info span,
.info strong {
    display: block;
}

.info span {
    color: #64748b;

    font-size: 9px;
}

.info strong {
    margin-top: 5px;

    font-size: 11px;
}

.active {
    color: #16a34a;
}


/* PASSENGERS */

.passengers {
    margin-bottom: 20px;
}

.card-header {
    margin-bottom: 15px;
}

.card-header h2 {
    margin-bottom: 5px;
}

.card-header p {
    margin: 0;

    color: #64748b;

    font-size: 10px;
}

.passenger {
    display: flex;

    align-items: center;

    gap: 12px;

    padding: 14px 0;

    border-top: 1px solid #e2e8f0;
}

.passenger-info {
    flex: 1;
}

.passenger-info strong,
.passenger-info span {
    display: block;
}

.passenger-info strong {
    font-size: 11px;
}

.passenger-info span {
    margin-top: 3px;

    color: #64748b;

    font-size: 9px;
}

.confirmed {
    padding: 5px 8px;

    border-radius: 20px;

    background: #f0fdf4;
    color: #16a34a;

    font-size: 9px;
}


/* ACTIONS */

.actions {
    margin-bottom: 20px;
}

.buttons {
    display: flex;

    gap: 10px;

    margin-top: 15px;
}

.buttons button {
    padding: 10px 15px;

    border: none;

    border-radius: 7px;

    font-size: 10px;

    cursor: pointer;
}

.primary {
    background: #2563eb;
    color: white;
}

.warning {
    background: #fff7ed;
    color: #ea580c;
}

.danger {
    background: #fef2f2;
    color: #dc2626;
}


/* RESPONSIVE */

@media(max-width: 750px) {

    .header {
        display: block;
    }

    .back {
        display: inline-block;

        margin-top: 15px;
    }

    .route-card {
        flex-direction: column;

        align-items: flex-start;

        gap: 15px;
    }

    .arrow {
        transform: rotate(90deg);
    }

    .grid {
        grid-template-columns: 1fr;
    }

    .info {
        grid-template-columns: 1fr;
    }

    .buttons {
        flex-direction: column;
    }

}

</style>