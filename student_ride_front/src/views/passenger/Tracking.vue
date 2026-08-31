<template>
    <div class="page">

        <div class="header">
            <div>
                <span class="eyebrow">SUIVI EN TEMPS RÉEL</span>
                <h1>Suivi de votre trajet</h1>
                <p>Position actuelle du chauffeur.</p>
            </div>

            <span class="live">
                ● EN DIRECT
            </span>
        </div>


        <div class="grid">

            <section class="map">

                <div class="map-placeholder">

                    <div class="map-content">

                        <div class="location driver-location">
                            🚗
                            <span>Chauffeur</span>
                        </div>

                        <div class="location destination-location">
                            📍
                            <span>Destination</span>
                        </div>

                        <div class="route-line"></div>

                        <div class="map-text">
                            Carte interactive
                        </div>

                    </div>

                </div>

            </section>


            <aside class="card">

                <h2>Informations</h2>

                <div class="driver">

                    <div class="avatar">
                        A
                    </div>

                    <div>
                        <strong>Aubin</strong>
                        <span>Votre chauffeur</span>
                    </div>

                </div>


                <div class="status-box">

                    <span>Statut</span>

                    <strong>
                        En route
                    </strong>

                </div>


                <div class="info">

                    <div>
                        <span>Départ</span>
                        <strong>Abomey-Calavi</strong>
                    </div>

                    <div>
                        <span>Destination</span>
                        <strong>Cotonou</strong>
                    </div>

                    <div>
                        <span>Arrivée estimée</span>
                        <strong>08:15</strong>
                    </div>

                </div>

            </aside>

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
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.eyebrow {
    color: var(--primary);
    font-size: 11px;
    font-weight: 700;
}

h1 {
    margin: 6px 0;
    font-size: 26px;
}

.header p {
    color: var(--text-secondary);
    font-size: 13px;
}

.live {
    padding: 7px 12px;
    border-radius: 20px;
    background: #fef2f2;
    color: #dc2626;
    font-size: 10px;
    font-weight: 700;
}

.grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
}

.map {
    min-height: 550px;
    overflow: hidden;
    border-radius: var(--radius-md);
}

.map-placeholder {
    height: 100%;
    min-height: 550px;
    position: relative;
    background: #e2e8f0;
}

.map-content {
    position: relative;
    width: 100%;
    height: 100%;
    min-height: 550px;
}

.location {
    position: absolute;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-size: 25px;
}

.location span {
    padding: 4px 8px;
    margin-top: 3px;
    border-radius: 5px;
    background: white;
    font-size: 10px;
    box-shadow: var(--shadow-sm);
}

.driver-location {
    top: 35%;
    left: 35%;
}

.destination-location {
    right: 25%;
    bottom: 25%;
}

.route-line {
    position: absolute;
    width: 45%;
    height: 2px;
    top: 48%;
    left: 37%;
    transform: rotate(25deg);
    border-top: 2px dashed var(--primary);
}

.map-text {
    position: absolute;
    bottom: 20px;
    left: 20px;
    padding: 8px 12px;
    background: white;
    border-radius: 7px;
    color: var(--text-secondary);
    font-size: 11px;
}

.card {
    padding: 25px;
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
}

.card h2 {
    font-size: 16px;
    margin-bottom: 25px;
}

.driver {
    display: flex;
    align-items: center;
    gap: 12px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--border);
}

.avatar {
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: var(--primary-light);
    color: var(--primary);
    font-weight: 700;
}

.driver strong {
    display: block;
    font-size: 13px;
}

.driver span {
    color: var(--text-secondary);
    font-size: 11px;
}

.status-box {
    padding: 15px 0;
    border-bottom: 1px solid var(--border);
}

.status-box span,
.info span {
    display: block;
    color: var(--text-secondary);
    font-size: 10px;
}

.status-box strong {
    color: var(--success);
    font-size: 14px;
}

.info {
    padding-top: 20px;
}

.info div {
    margin-bottom: 18px;
}

.info strong {
    font-size: 12px;
}

@media(max-width: 850px) {
    .grid {
        grid-template-columns: 1fr;
    }

    .map {
        min-height: 400px;
    }
}
</style>