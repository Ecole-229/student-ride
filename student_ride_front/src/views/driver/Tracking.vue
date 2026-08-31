<template>
    <div class="page">

        <div class="header">
            <div>
                <span class="eyebrow">SUIVI DU TRAJET</span>
                <h1>Trajet en cours</h1>
                <p>Partagez votre position avec les passagers.</p>
            </div>

            <span class="live">
                ● EN DIRECT
            </span>
        </div>


        <div class="grid">

            <section class="map">

                <div class="map-content">

                    <div class="car">
                        🚗
                        <span>Vous</span>
                    </div>

                    <div class="destination">
                        📍
                        <span>Cotonou</span>
                    </div>

                    <div class="route"></div>

                    <div class="map-label">
                        Carte du trajet
                    </div>

                </div>

            </section>


            <aside class="card">

                <h2>Trajet</h2>

                <div class="route-info">
                    <strong>Abomey-Calavi</strong>
                    <span>Départ</span>
                </div>

                <div class="separator"></div>

                <div class="route-info">
                    <strong>Cotonou</strong>
                    <span>Destination</span>
                </div>


                <div class="stats">

                    <div>
                        <span>Passagers</span>
                        <strong>2</strong>
                    </div>

                    <div>
                        <span>Places libres</span>
                        <strong>1</strong>
                    </div>

                </div>


                <button class="finish">
                    Terminer le trajet
                </button>

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

.map-content {
    position: relative;
    min-height: 550px;
    background: #e2e8f0;
}

.car,
.destination {
    position: absolute;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-size: 26px;
}

.car span,
.destination span {
    padding: 4px 8px;
    background: white;
    border-radius: 5px;
    font-size: 10px;
    box-shadow: var(--shadow-sm);
}

.car {
    top: 35%;
    left: 35%;
}

.destination {
    right: 25%;
    bottom: 25%;
}

.route {
    position: absolute;
    width: 45%;
    height: 2px;
    top: 48%;
    left: 37%;
    transform: rotate(25deg);
    border-top: 2px dashed var(--primary);
}

.map-label {
    position: absolute;
    left: 20px;
    bottom: 20px;
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
}

.card h2 {
    font-size: 16px;
    margin-bottom: 25px;
}

.route-info strong {
    display: block;
    font-size: 14px;
}

.route-info span {
    color: var(--text-secondary);
    font-size: 10px;
}

.separator {
    height: 25px;
    margin-left: 3px;
    border-left: 1px dashed var(--border);
}

.stats {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin: 25px 0;
    padding-top: 20px;
    border-top: 1px solid var(--border);
}

.stats span {
    display: block;
    color: var(--text-secondary);
    font-size: 10px;
}

.stats strong {
    font-size: 20px;
}

.finish {
    width: 100%;
    height: 45px;
    border: none;
    border-radius: 8px;
    background: var(--success);
    color: white;
    font-weight: 600;
}

@media(max-width: 850px) {
    .grid {
        grid-template-columns: 1fr;
    }
}
</style>