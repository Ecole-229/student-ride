<template>
    <div class="dashboard">

        <!-- Welcome -->
        <section class="welcome">
            <div>
                <p class="eyebrow">ESPACE ÉTUDIANT</p>

                <h1>
                    Bonjour Ranti
                    <span>👋</span>
                </h1>

                <p class="welcome-text">
                    Trouvez facilement un trajet et déplacez-vous
                    plus simplement avec Student-Ride.
                </p>
            </div>

            <div class="welcome-icon">
                🚗
            </div>
        </section>


        <!-- Statistics -->
        <section class="stats">

            <div class="stat-card">
                <div class="stat-icon blue">
                    <Ticket :size="21" />
                </div>

                <div>
                    <span>Réservations</span>
                    <strong>3</strong>
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-icon green">
                    <CalendarDays :size="21" />
                </div>

                <div>
                    <span>À venir</span>
                    <strong>1</strong>
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-icon orange">
                    <CheckCircle :size="21" />
                </div>

                <div>
                    <span>Trajets terminés</span>
                    <strong>8</strong>
                </div>
            </div>

        </section>


        <!-- Search -->
        <section class="search-section">

            <div class="section-heading">
                <div>
                    <h2>Rechercher un trajet</h2>

                    <p>
                        Trouvez un trajet correspondant à votre destination.
                    </p>
                </div>
            </div>


            <form class="search-box">

                <div class="input-group">

                    <label>Départ</label>

                    <div class="input-wrapper">
                        <MapPin :size="19" />

                        <input
                            type="text"
                            placeholder="Ex : Calavi"
                        />
                    </div>

                </div>


                <div class="input-group">

                    <label>Destination</label>

                    <div class="input-wrapper">
                        <Navigation :size="19" />

                        <input
                            type="text"
                            placeholder="Ex : Cotonou"
                        />
                    </div>

                </div>


                <div class="input-group date">

                    <label>Date</label>

                    <div class="input-wrapper">
                        <CalendarDays :size="19" />

                        <input
                            type="date"
                        />
                    </div>

                </div>


                <button class="search-button" type="submit">
                    <Search :size="19" />
                    Rechercher
                </button>

            </form>

        </section>


        <!-- Upcoming rides -->
        <section class="rides-section">

            <div class="section-heading">

                <div>
                    <h2>Mes prochains trajets</h2>

                    <p>
                        Vos réservations à venir.
                    </p>
                </div>

                <RouterLink
                    to="/passenger/reservations"
                    class="see-all"
                >
                    Voir tout
                    <ArrowRight :size="17" />
                </RouterLink>

            </div>


            <div class="ride-card">

                <div class="ride-main">

                    <div class="ride-route">

                        <div class="route-point">
                            <span class="point departure"></span>

                            <div>
                                <strong>Calavi</strong>
                                <small>Départ • 07:30</small>
                            </div>
                        </div>


                        <div class="route-line"></div>


                        <div class="route-point">
                            <span class="point destination"></span>

                            <div>
                                <strong>Cotonou</strong>
                                <small>Destination</small>
                            </div>
                        </div>

                    </div>


                    <div class="driver">

                        <div class="driver-avatar">
                            A
                        </div>

                        <div>
                            <strong>Aubin</strong>
                            <small>Conducteur</small>
                        </div>

                    </div>

                </div>


                <div class="ride-footer">

                    <div class="ride-info">

                        <span>
                            <CalendarDays :size="16" />
                            Demain
                        </span>

                        <span>
                            <Users :size="16" />
                            2 places
                        </span>

                        <span class="status">
                            Confirmée
                        </span>

                    </div>


                    <RouterLink
                        to="/passenger/trajets"
                        class="details-button"
                    >
                        Voir le trajet
                        <ArrowRight :size="16" />
                    </RouterLink>

                </div>

            </div>

        </section>

    </div>
</template>


<script setup>
import {
    Ticket,
    CalendarDays,
    CheckCircle,
    MapPin,
    Navigation,
    Search,
    ArrowRight,
    Users
} from 'lucide-vue-next'
</script>


<style scoped>

.dashboard {
    max-width: 1400px;
    margin: 0 auto;
}


/* =========================
   WELCOME
========================= */

.welcome {
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 28px 32px;

    background: var(--surface);

    border: 1px solid var(--border);
    border-radius: var(--radius-lg);

    box-shadow: var(--shadow-sm);
}

.eyebrow {
    margin-bottom: 7px;

    font-size: 11px;
    font-weight: 700;

    color: var(--primary);

    letter-spacing: 0.08em;
}

.welcome h1 {
    font-size: 27px;
    font-weight: 700;
}

.welcome h1 span {
    font-size: 24px;
}

.welcome-text {
    margin-top: 7px;

    max-width: 600px;

    color: var(--text-secondary);
    font-size: 14px;
}

.welcome-icon {
    width: 75px;
    height: 75px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 20px;

    background: var(--primary-light);

    font-size: 35px;
}


/* =========================
   STATS
========================= */

.stats {
    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 18px;

    margin-top: 22px;
}

.stat-card {
    display: flex;
    align-items: center;

    gap: 15px;

    padding: 20px;

    background: var(--surface);

    border: 1px solid var(--border);
    border-radius: var(--radius-md);

    box-shadow: var(--shadow-sm);
}

.stat-icon {
    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 11px;
}

.stat-icon.blue {
    color: var(--primary);
    background: var(--primary-light);
}

.stat-icon.green {
    color: var(--success);
    background: #f0fdf4;
}

.stat-icon.orange {
    color: var(--warning);
    background: #fff7ed;
}

.stat-card span {
    display: block;

    margin-bottom: 3px;

    color: var(--text-secondary);

    font-size: 12px;
}

.stat-card strong {
    font-size: 23px;
}


/* =========================
   SECTIONS
========================= */

.search-section,
.rides-section {
    margin-top: 30px;
}

.section-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;

    margin-bottom: 14px;
}

.section-heading h2 {
    font-size: 17px;
}

.section-heading p {
    margin-top: 3px;

    color: var(--text-secondary);

    font-size: 12px;
}


/* =========================
   SEARCH
========================= */

.search-box {
    display: grid;

    grid-template-columns: 1fr 1fr 0.8fr auto;

    gap: 14px;

    padding: 20px;

    background: var(--surface);

    border: 1px solid var(--border);
    border-radius: var(--radius-md);

    box-shadow: var(--shadow-sm);
}

.input-group label {
    display: block;

    margin-bottom: 7px;

    font-size: 12px;
    font-weight: 600;
}

.input-wrapper {
    height: 45px;

    display: flex;
    align-items: center;

    gap: 9px;

    padding: 0 12px;

    border: 1px solid var(--border);
    border-radius: 9px;

    color: var(--text-light);

    background: white;

    transition: 0.2s;
}

.input-wrapper:focus-within {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px var(--primary-light);
}

.input-wrapper input {
    width: 100%;

    border: none;
    outline: none;

    color: var(--text);

    background: transparent;

    font-size: 13px;
}

.search-button {
    align-self: end;

    height: 45px;

    display: flex;
    align-items: center;

    gap: 8px;

    padding: 0 20px;

    border: none;
    border-radius: 9px;

    background: var(--primary);
    color: white;

    font-size: 13px;
    font-weight: 600;

    transition: 0.2s;
}

.search-button:hover {
    background: var(--primary-dark);
}


/* =========================
   RIDE CARD
========================= */

.see-all {
    display: flex;
    align-items: center;

    gap: 5px;

    color: var(--primary);

    font-size: 12px;
    font-weight: 600;
}

.ride-card {
    background: var(--surface);

    border: 1px solid var(--border);
    border-radius: var(--radius-md);

    box-shadow: var(--shadow-sm);
}

.ride-main {
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 22px 24px;
}

.ride-route {
    min-width: 300px;
}

.route-point {
    display: flex;
    align-items: center;

    gap: 12px;
}

.point {
    width: 10px;
    height: 10px;

    border-radius: 50%;
}

.point.departure {
    background: var(--primary);
}

.point.destination {
    background: var(--success);
}

.route-point strong {
    display: block;

    font-size: 14px;
}

.route-point small {
    display: block;

    margin-top: 2px;

    color: var(--text-secondary);

    font-size: 11px;
}

.route-line {
    width: 1px;
    height: 24px;

    margin: 2px 0 2px 4px;

    border-left: 1px dashed var(--border);
}

.driver {
    display: flex;
    align-items: center;

    gap: 10px;
}

.driver-avatar {
    width: 40px;
    height: 40px;

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

.driver small {
    color: var(--text-secondary);

    font-size: 11px;
}

.ride-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 14px 24px;

    border-top: 1px solid var(--border);
}

.ride-info {
    display: flex;
    align-items: center;

    gap: 18px;
}

.ride-info span {
    display: flex;
    align-items: center;

    gap: 6px;

    color: var(--text-secondary);

    font-size: 11px;
}

.ride-info .status {
    padding: 5px 9px;

    border-radius: 20px;

    background: #f0fdf4;
    color: var(--success);

    font-weight: 600;
}

.details-button {
    display: flex;
    align-items: center;

    gap: 6px;

    color: var(--primary);

    font-size: 12px;
    font-weight: 600;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 900px) {

    .stats {
        grid-template-columns: 1fr;
    }

    .search-box {
        grid-template-columns: 1fr 1fr;
    }

    .search-button {
        width: 100%;
        justify-content: center;
    }

    .ride-main {
        align-items: flex-start;
        gap: 25px;
    }
}


@media (max-width: 650px) {

    .welcome {
        padding: 22px;
    }

    .welcome-icon {
        display: none;
    }

    .welcome h1 {
        font-size: 22px;
    }

    .search-box {
        grid-template-columns: 1fr;
    }

    .ride-main {
        flex-direction: column;
    }

    .ride-footer {
        align-items: flex-start;
        flex-direction: column;
        gap: 15px;
    }

    .ride-info {
        flex-wrap: wrap;
    }
}

</style>