<template>
    <div class="page">

        <div class="back">
            <RouterLink to="/passenger/trajets">
                ← Retour aux trajets
            </RouterLink>
        </div>

        <div class="header">
            <div>
                <span class="eyebrow">DÉTAIL DU TRAJET</span>
                <h1>Abomey-Calavi → Cotonou</h1>
                <p>Découvrez les informations concernant ce trajet.</p>
            </div>

            <span class="status">Disponible</span>
        </div>

        <div class="grid">

            <section class="card main-card">

                <h2>Itinéraire</h2>

                <div class="route">

                    <div class="point">
                        <span class="dot departure"></span>

                        <div>
                            <strong>Abomey-Calavi</strong>
                            <small>Départ à 07:30</small>
                        </div>
                    </div>

                    <div class="line"></div>

                    <div class="point">
                        <span class="dot destination"></span>

                        <div>
                            <strong>Cotonou</strong>
                            <small>Arrivée estimée à 08:15</small>
                        </div>
                    </div>

                </div>

                <div class="infos">

                    <div>
                        <span>Date</span>
                        <strong>31 août 2026</strong>
                    </div>

                    <div>
                        <span>Durée</span>
                        <strong>45 min</strong>
                    </div>

                    <div>
                        <span>Places disponibles</span>
                        <strong>2 places</strong>
                    </div>

                    <div>
                        <span>Prix</span>
                        <strong>500 FCFA</strong>
                    </div>

                </div>

            </section>


            <aside class="card driver-card">

                <h2>Conducteur</h2>

                <div class="driver">

                    <div class="avatar">A</div>

                    <div>
                        <strong>Aubin</strong>
                        <span>⭐ 4.8 / 5</span>
                    </div>

                </div>

                <div class="vehicle">
                    <span>Véhicule</span>
                    <strong>Toyota Corolla</strong>
                    <small>AB 1234 RB</small>
                </div>

                <button @click="reserve">
                    Réserver une place
                </button>

            </aside>

        </div>

    </div>
</template>

<script setup>
function reserve() {
    console.log('Réservation à envoyer à Laravel')
}
</script>

<style scoped>
.page {
    max-width: 1200px;
    margin: auto;
}

.back {
    margin-bottom: 20px;
}

.back a {
    color: var(--primary);
    font-size: 13px;
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

.status {
    padding: 7px 12px;
    border-radius: 20px;
    background: #f0fdf4;
    color: var(--success);
    font-size: 12px;
    font-weight: 600;
}

.grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
}

.card {
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    padding: 25px;
    box-shadow: var(--shadow-sm);
}

.card h2 {
    font-size: 16px;
    margin-bottom: 25px;
}

.route {
    margin-bottom: 30px;
}

.point {
    display: flex;
    align-items: center;
    gap: 14px;
}

.dot {
    width: 11px;
    height: 11px;
    border-radius: 50%;
}

.departure {
    background: var(--primary);
}

.destination {
    background: var(--success);
}

.point strong {
    display: block;
    font-size: 14px;
}

.point small {
    color: var(--text-secondary);
    font-size: 11px;
}

.line {
    height: 35px;
    margin-left: 5px;
    border-left: 1px dashed var(--border);
}

.infos {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    padding-top: 20px;
    border-top: 1px solid var(--border);
}

.infos span,
.vehicle span {
    display: block;
    color: var(--text-secondary);
    font-size: 11px;
    margin-bottom: 4px;
}

.infos strong {
    font-size: 13px;
}

.driver {
    display: flex;
    align-items: center;
    gap: 12px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--border);
}

.avatar {
    width: 48px;
    height: 48px;
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
}

.driver span {
    color: var(--text-secondary);
    font-size: 11px;
}

.vehicle {
    padding: 20px 0;
}

.vehicle small {
    display: block;
    color: var(--text-secondary);
    font-size: 11px;
    margin-top: 3px;
}

button {
    width: 100%;
    height: 45px;
    border: none;
    border-radius: 9px;
    background: var(--primary);
    color: white;
    font-weight: 600;
    cursor: pointer;
}

@media(max-width: 800px) {
    .grid {
        grid-template-columns: 1fr;
    }

    .header {
        align-items: flex-start;
        flex-direction: column;
        gap: 15px;
    }
}
</style>