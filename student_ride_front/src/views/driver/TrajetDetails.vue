<template>
    <div class="page">

        <RouterLink
            to="/driver/trajets"
            class="back"
        >
            ← Mes trajets
        </RouterLink>

        <div class="header">
            <div>
                <span class="eyebrow">TRAJET #SR-001</span>
                <h1>Abomey-Calavi → Cotonou</h1>
                <p>31 août 2026 • 07:30</p>
            </div>

            <span class="status">
                À venir
            </span>
        </div>


        <div class="grid">

            <section class="card">

                <h2>Informations du trajet</h2>

                <div class="route">

                    <div class="point">
                        <span class="dot blue"></span>

                        <div>
                            <strong>Abomey-Calavi</strong>
                            <small>07:30</small>
                        </div>
                    </div>

                    <div class="line"></div>

                    <div class="point">
                        <span class="dot green"></span>

                        <div>
                            <strong>Cotonou</strong>
                            <small>08:15 estimé</small>
                        </div>
                    </div>

                </div>

                <div class="infos">

                    <div>
                        <span>Places</span>
                        <strong>2 / 3 occupées</strong>
                    </div>

                    <div>
                        <span>Prix</span>
                        <strong>500 FCFA</strong>
                    </div>

                    <div>
                        <span>Durée</span>
                        <strong>45 min</strong>
                    </div>

                    <div>
                        <span>Revenus estimés</span>
                        <strong>1 500 FCFA</strong>
                    </div>

                </div>

            </section>


            <aside class="card">

                <h2>Actions</h2>

                <RouterLink
                    to="/driver/trajets/1/edit"
                    class="edit"
                >
                    Modifier le trajet
                </RouterLink>

                <RouterLink
                    to="/driver/trajets/1/passengers"
                    class="passengers"
                >
                    Voir les passagers
                </RouterLink>

                <RouterLink
                    to="/driver/tracking/1"
                    class="tracking"
                >
                    Démarrer le suivi
                </RouterLink>

                <button class="cancel">
                    Annuler le trajet
                </button>

            </aside>

        </div>

    </div>
</template>

<style scoped>
.page {
    max-width: 1100px;
    margin: auto;
}

.back {
    color: var(--primary);
    font-size: 13px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 20px 0 25px;
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
    font-size: 12px;
}

.status {
    padding: 7px 12px;
    border-radius: 20px;
    background: #f0fdf4;
    color: var(--success);
    font-size: 11px;
}

.grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
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

.point {
    display: flex;
    gap: 12px;
    align-items: center;
}

.dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
}

.blue {
    background: var(--primary);
}

.green {
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
    height: 30px;
    margin-left: 4px;
    border-left: 1px dashed var(--border);
}

.infos {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid var(--border);
}

.infos span {
    display: block;
    color: var(--text-secondary);
    font-size: 10px;
}

.infos strong {
    font-size: 13px;
}

.edit,
.passengers,
.tracking,
.cancel {
    display: block;
    width: 100%;
    box-sizing: border-box;
    margin-bottom: 10px;
    padding: 12px;
    text-align: center;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
}

.edit {
    background: var(--primary);
    color: white;
}

.passengers {
    background: var(--primary-light);
    color: var(--primary);
}

.tracking {
    background: #f0fdf4;
    color: var(--success);
}

.cancel {
    border: 1px solid #fecaca;
    background: white;
    color: #dc2626;
}

@media(max-width: 800px) {
    .grid {
        grid-template-columns: 1fr;
    }
}
</style>