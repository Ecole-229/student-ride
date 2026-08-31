<template>
    <div class="trajets-page">

        <!-- En-tête -->
        <div class="page-header">
            <div>
                <span class="eyebrow">MOBILITÉ</span>
                <h1>Rechercher un trajet</h1>
                <p>
                    Trouvez un trajet correspondant à votre destination.
                </p>
            </div>
        </div>


        <!-- Recherche -->
        <section class="search-card">

            <div class="field">
                <label>Départ</label>

                <div class="input-wrapper">
                    <MapPin :size="18" />

                    <input
                        v-model="filters.departure"
                        type="text"
                        placeholder="Ex : Abomey-Calavi"
                    />
                </div>
            </div>


            <div class="field">
                <label>Destination</label>

                <div class="input-wrapper">
                    <Navigation :size="18" />

                    <input
                        v-model="filters.destination"
                        type="text"
                        placeholder="Ex : Cotonou"
                    />
                </div>
            </div>


            <div class="field">
                <label>Date</label>

                <div class="input-wrapper">
                    <CalendarDays :size="18" />

                    <input
                        v-model="filters.date"
                        type="date"
                    />
                </div>
            </div>


            <button
                class="search-button"
                @click="searchTrajets"
            >
                <Search :size="18" />
                Rechercher
            </button>

        </section>


        <!-- Filtres -->
        <div class="filters-row">

            <div class="results-count">
                <strong>{{ filteredTrajets.length }}</strong>
                trajet(s) disponible(s)
            </div>

            <select v-model="filters.sort">
                <option value="time">
                    Heure de départ
                </option>

                <option value="price">
                    Prix
                </option>

                <option value="places">
                    Places disponibles
                </option>
            </select>

        </div>


        <!-- Liste des trajets -->
        <section class="trajets-list">

            <div
                v-for="trajet in filteredTrajets"
                :key="trajet.id"
                class="trajet-card"
            >

                <!-- Heure -->
                <div class="time-column">

                    <strong>{{ trajet.time }}</strong>

                    <span>
                        {{ trajet.duration }}
                    </span>

                </div>


                <!-- Trajet -->
                <div class="route">

                    <div class="route-point">

                        <span class="dot departure"></span>

                        <div>
                            <strong>{{ trajet.departure }}</strong>
                            <small>Départ</small>
                        </div>

                    </div>


                    <div class="route-line"></div>


                    <div class="route-point">

                        <span class="dot destination"></span>

                        <div>
                            <strong>{{ trajet.destination }}</strong>
                            <small>Destination</small>
                        </div>

                    </div>

                </div>


                <!-- Chauffeur -->
                <div class="driver">

                    <div class="avatar">
                        {{ trajet.driver.charAt(0) }}
                    </div>

                    <div>
                        <strong>{{ trajet.driver }}</strong>

                        <small>
                            ⭐ {{ trajet.rating }}
                        </small>
                    </div>

                </div>


                <!-- Places -->
                <div class="places">

                    <Users :size="17" />

                    <span>
                        {{ trajet.places }} places
                    </span>

                </div>


                <!-- Prix -->
                <div class="price">

                    <strong>
                        {{ trajet.price.toLocaleString() }}
                    </strong>

                    <span>FCFA</span>

                </div>


                <!-- Action -->
                <RouterLink
                    :to="`/passenger/trajets/${trajet.id}`"
                    class="details-button"
                >
                    Voir
                    <ArrowRight :size="16" />
                </RouterLink>

            </div>


            <!-- Aucun résultat -->
            <div
                v-if="filteredTrajets.length === 0"
                class="empty-state"
            >
                <div class="empty-icon">
                    <Car :size="30" />
                </div>

                <h3>Aucun trajet trouvé</h3>

                <p>
                    Essayez de modifier vos critères de recherche.
                </p>
            </div>

        </section>

    </div>
</template>


<script setup>
import { computed, reactive } from 'vue'

import {
    MapPin,
    Navigation,
    CalendarDays,
    Search,
    Users,
    ArrowRight,
    Car
} from 'lucide-vue-next'


const filters = reactive({
    departure: '',
    destination: '',
    date: '',
    sort: 'time'
})


const trajets = [
    {
        id: 1,
        departure: 'Abomey-Calavi',
        destination: 'Cotonou',
        time: '07:30',
        duration: '45 min',
        driver: 'Aubin',
        rating: '4.8',
        places: 2,
        price: 500
    },

    {
        id: 2,
        departure: 'Calavi',
        destination: 'Cotonou',
        time: '08:00',
        duration: '50 min',
        driver: 'Maurice',
        rating: '4.6',
        places: 3,
        price: 500
    },

    {
        id: 3,
        departure: 'Godomey',
        destination: 'Cotonou',
        time: '08:30',
        duration: '40 min',
        driver: 'Aubin',
        rating: '4.9',
        places: 1,
        price: 400
    }
]


const filteredTrajets = computed(() => {

    let result = trajets.filter(trajet => {

        const departureMatch =
            !filters.departure ||
            trajet.departure
                .toLowerCase()
                .includes(filters.departure.toLowerCase())

        const destinationMatch =
            !filters.destination ||
            trajet.destination
                .toLowerCase()
                .includes(filters.destination.toLowerCase())

        return departureMatch && destinationMatch
    })


    if (filters.sort === 'price') {
        result.sort((a, b) => a.price - b.price)
    }

    if (filters.sort === 'places') {
        result.sort((a, b) => b.places - a.places)
    }

    return result
})


function searchTrajets() {
    console.log('Recherche :', filters)
}
</script>


<style scoped>

.trajets-page {
    max-width: 1400px;
    margin: 0 auto;
}


/* HEADER */

.page-header {
    margin-bottom: 24px;
}

.eyebrow {
    color: var(--primary);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .08em;
}

h1 {
    margin-top: 5px;
    font-size: 27px;
}

.page-header p {
    margin-top: 5px;
    color: var(--text-secondary);
    font-size: 13px;
}


/* SEARCH */

.search-card {
    display: grid;
    grid-template-columns: 1fr 1fr 0.8fr auto;
    gap: 14px;

    padding: 20px;

    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius-md);

    box-shadow: var(--shadow-sm);
}

.field label {
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
}

.input-wrapper:focus-within {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px var(--primary-light);
}

.input-wrapper input {
    width: 100%;
    border: none;
    outline: none;
    background: transparent;

    font-size: 13px;
}

.search-button {
    align-self: end;

    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    padding: 0 20px;

    border: none;
    border-radius: 9px;

    background: var(--primary);
    color: white;

    font-size: 13px;
    font-weight: 600;
}

.search-button:hover {
    background: var(--primary-dark);
}


/* FILTERS */

.filters-row {
    display: flex;
    align-items: center;
    justify-content: space-between;

    margin: 25px 0 14px;
}

.results-count {
    color: var(--text-secondary);
    font-size: 13px;
}

.results-count strong {
    color: var(--text);
}

.filters-row select {
    padding: 9px 12px;

    border: 1px solid var(--border);
    border-radius: 8px;

    background: white;

    font-size: 12px;
}


/* TRAJET */

.trajets-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.trajet-card {
    display: grid;

    grid-template-columns:
        90px
        1.4fr
        1fr
        120px
        100px
        80px;

    align-items: center;
    gap: 20px;

    padding: 20px;

    background: white;

    border: 1px solid var(--border);
    border-radius: var(--radius-md);

    box-shadow: var(--shadow-sm);

    transition: .2s;
}

.trajet-card:hover {
    border-color: #bfdbfe;
    box-shadow: var(--shadow-md);
}


/* TIME */

.time-column strong {
    display: block;
    font-size: 18px;
}

.time-column span {
    color: var(--text-secondary);
    font-size: 11px;
}


/* ROUTE */

.route-point {
    display: flex;
    align-items: center;
    gap: 10px;
}

.route-point strong {
    display: block;
    font-size: 13px;
}

.route-point small {
    color: var(--text-secondary);
    font-size: 10px;
}

.dot {
    width: 9px;
    height: 9px;
    flex-shrink: 0;
    border-radius: 50%;
}

.dot.departure {
    background: var(--primary);
}

.dot.destination {
    background: var(--success);
}

.route-line {
    width: 1px;
    height: 18px;

    margin-left: 4px;

    border-left: 1px dashed var(--border);
}


/* DRIVER */

.driver {
    display: flex;
    align-items: center;
    gap: 9px;
}

.avatar {
    width: 38px;
    height: 38px;

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
    font-size: 12px;
}

.driver small {
    color: var(--text-secondary);
    font-size: 10px;
}


/* PLACES */

.places {
    display: flex;
    align-items: center;
    gap: 6px;

    color: var(--text-secondary);

    font-size: 11px;
}


/* PRICE */

.price strong {
    font-size: 15px;
}

.price span {
    display: block;
    color: var(--text-secondary);
    font-size: 9px;
}


/* BUTTON */

.details-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 4px;

    color: var(--primary);

    font-size: 12px;
    font-weight: 600;
}


/* EMPTY */

.empty-state {
    padding: 60px 20px;
    text-align: center;

    background: white;

    border: 1px solid var(--border);
    border-radius: var(--radius-md);
}

.empty-icon {
    width: 60px;
    height: 60px;

    margin: auto;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: var(--primary-light);
    color: var(--primary);
}

.empty-state h3 {
    margin-top: 15px;
}

.empty-state p {
    margin-top: 5px;

    color: var(--text-secondary);
    font-size: 12px;
}


/* RESPONSIVE */

@media (max-width: 1100px) {

    .search-card {
        grid-template-columns: 1fr 1fr;
    }

    .trajet-card {
        grid-template-columns:
            80px
            1fr
            1fr;
    }

    .places,
    .price {
        display: none;
    }

}


@media (max-width: 650px) {

    .search-card {
        grid-template-columns: 1fr;
    }

    .trajet-card {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .filters-row {
        align-items: flex-start;
        flex-direction: column;
        gap: 10px;
    }

}

</style>