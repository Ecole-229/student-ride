<template>
    <div class="page">

        <div class="header">
            <div>
                <span class="eyebrow">TRAJETS</span>
                <h1>Gestion des trajets</h1>
                <p>Consultez et modérez les trajets de la plateforme.</p>
            </div>
        </div>


        <div class="toolbar">

            <input
                v-model="search"
                placeholder="Rechercher un trajet..."
            />

            <select v-model="status">
                <option value="all">Tous les statuts</option>
                <option value="active">Actif</option>
                <option value="completed">Terminé</option>
                <option value="cancelled">Annulé</option>
            </select>

        </div>


        <div class="list">

            <div
                v-for="trip in filteredTrips"
                :key="trip.id"
                class="trip"
            >

                <div class="route">

                    <strong>
                        {{ trip.departure }}
                        →
                        {{ trip.destination }}
                    </strong>

                    <span>
                        {{ trip.date }} • {{ trip.time }}
                    </span>

                </div>


                <div class="driver">
                    <span>Chauffeur</span>
                    <strong>{{ trip.driver }}</strong>
                </div>


                <div class="places">
                    <span>Places</span>
                    <strong>
                        {{ trip.booked }}/{{ trip.places }}
                    </strong>
                </div>


                <span
                    class="status"
                    :class="trip.status"
                >
                    {{ trip.statusLabel }}
                </span>


                <RouterLink
                    :to="`/admin/trajets/${trip.id}`"
                    class="view"
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
        departure: 'Abomey-Calavi',
        destination: 'Cotonou',
        date: '31 août',
        time: '07:30',
        driver: 'Aubin',
        places: 4,
        booked: 3,
        status: 'active',
        statusLabel: 'Actif'
    },
    {
        id: 2,
        departure: 'Godomey',
        destination: 'Cotonou',
        date: '31 août',
        time: '08:00',
        driver: 'Jean',
        places: 3,
        booked: 2,
        status: 'active',
        statusLabel: 'Actif'
    },
    {
        id: 3,
        departure: 'Calavi',
        destination: 'Porto-Novo',
        date: '29 août',
        time: '07:00',
        driver: 'Paul',
        places: 4,
        booked: 4,
        status: 'completed',
        statusLabel: 'Terminé'
    }
]

const filteredTrips = computed(() => {

    return trips.filter(trip => {

        const matchesSearch =
            `${trip.departure} ${trip.destination} ${trip.driver}`
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
    font-size: 26px;
}

.header p {
    color: #64748b;
    font-size: 13px;
}

.toolbar {
    display: flex;
    gap: 10px;
    margin-bottom: 18px;
}

.toolbar input,
.toolbar select {
    height: 42px;

    padding: 0 12px;

    border: 1px solid #e2e8f0;
    border-radius: 8px;

    background: white;
    outline: none;
}

.toolbar input {
    flex: 1;
}

.list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.trip {
    display: grid;
    grid-template-columns: 1.5fr 1fr 100px 80px 50px;

    align-items: center;

    gap: 15px;

    padding: 18px;

    background: white;

    border: 1px solid #e2e8f0;
    border-radius: 10px;
}

.route strong,
.route span,
.driver span,
.driver strong,
.places span,
.places strong {
    display: block;
}

.route strong {
    font-size: 13px;
}

.route span,
.driver span,
.places span {
    margin-top: 4px;
    color: #64748b;
    font-size: 10px;
}

.driver strong,
.places strong {
    font-size: 11px;
}

.status {
    padding: 5px 8px;

    border-radius: 20px;

    font-size: 9px;
    text-align: center;
}

.status.active {
    background: #f0fdf4;
    color: #16a34a;
}

.status.completed {
    background: #f1f5f9;
    color: #64748b;
}

.view {
    color: #2563eb;
    font-size: 11px;
    font-weight: 600;
    text-decoration: none;
}

@media(max-width: 850px) {

    .toolbar {
        flex-direction: column;
    }

    .trip {
        grid-template-columns: 1fr;
    }

}

</style>