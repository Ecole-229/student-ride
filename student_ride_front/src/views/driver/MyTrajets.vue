<template>
    <div class="page">

        <div class="header">
            <div>
                <span class="eyebrow">MES TRAJETS</span>
                <h1>Mes trajets</h1>
                <p>Gérez les trajets que vous avez publiés.</p>
            </div>

            <RouterLink to="/driver/trajets/create" class="btn">
                + Créer un trajet
            </RouterLink>
        </div>


        <div class="filters">

            <input
                v-model="search"
                type="text"
                placeholder="Rechercher un trajet..."
            />

            <select v-model="status">
                <option value="all">Tous les statuts</option>
                <option value="upcoming">À venir</option>
                <option value="completed">Terminés</option>
                <option value="cancelled">Annulés</option>
            </select>

        </div>


        <div class="list">

            <div
                v-for="trip in filteredTrips"
                :key="trip.id"
                class="trip"
            >

                <div class="date">
                    <strong>{{ trip.day }}</strong>
                    <span>{{ trip.month }}</span>
                </div>

                <div class="route">
                    <strong>
                        {{ trip.departure }} → {{ trip.destination }}
                    </strong>

                    <span>
                        {{ trip.time }} • {{ trip.places }} places
                    </span>
                </div>

                <div class="passengers">
                    👥 {{ trip.booked }}/{{ trip.places }}
                </div>

                <span class="status">
                    {{ trip.statusLabel }}
                </span>

                <RouterLink
                    :to="`/driver/trajets/${trip.id}`"
                    class="details"
                >
                    Voir
                </RouterLink>

            </div>

        </div>

    </div>
</template>

<script setup>
import { computed, ref } from 'vue'

const search = ref('')
const status = ref('all')

const trips = [
    {
        id: 1,
        day: '31',
        month: 'AOÛT',
        departure: 'Abomey-Calavi',
        destination: 'Cotonou',
        time: '07:30',
        places: 3,
        booked: 2,
        status: 'upcoming',
        statusLabel: 'À venir'
    },
    {
        id: 2,
        day: '01',
        month: 'SEP',
        departure: 'Calavi',
        destination: 'Cotonou',
        time: '08:00',
        places: 4,
        booked: 3,
        status: 'upcoming',
        statusLabel: 'À venir'
    },
    {
        id: 3,
        day: '28',
        month: 'AOÛT',
        departure: 'Godomey',
        destination: 'Cotonou',
        time: '07:00',
        places: 3,
        booked: 3,
        status: 'completed',
        statusLabel: 'Terminé'
    }
]

const filteredTrips = computed(() => {
    return trips.filter(trip => {

        const matchesSearch =
            `${trip.departure} ${trip.destination}`
                .toLowerCase()
                .includes(search.value.toLowerCase())

        const matchesStatus =
            status.value === 'all' ||
            trip.status === status.value

        return matchesSearch && matchesStatus
    })
})
</script>

<style scoped>
.page {
    max-width: 1200px;
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

.btn {
    padding: 11px 16px;
    border-radius: 9px;
    background: var(--primary);
    color: white;
    font-size: 12px;
    font-weight: 600;
}

.filters {
    display: flex;
    gap: 12px;
    margin-bottom: 18px;
}

.filters input,
.filters select {
    height: 42px;
    padding: 0 12px;
    border: 1px solid var(--border);
    border-radius: 8px;
    background: white;
    outline: none;
}

.filters input {
    flex: 1;
}

.list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.trip {
    display: grid;
    grid-template-columns: 60px 1.5fr 120px 100px 60px;
    align-items: center;
    gap: 18px;
    padding: 18px;
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
}

.date {
    text-align: center;
}

.date strong {
    display: block;
    font-size: 20px;
}

.date span {
    color: var(--text-secondary);
    font-size: 9px;
}

.route strong {
    display: block;
    font-size: 13px;
}

.route span {
    color: var(--text-secondary);
    font-size: 10px;
}

.passengers {
    font-size: 11px;
    color: var(--text-secondary);
}

.status {
    color: var(--success);
    font-size: 11px;
}

.details {
    color: var(--primary);
    font-size: 12px;
    font-weight: 600;
}

@media(max-width: 800px) {
    .trip {
        grid-template-columns: 55px 1fr;
    }

    .passengers,
    .status {
        grid-column: 2;
    }
}
</style>