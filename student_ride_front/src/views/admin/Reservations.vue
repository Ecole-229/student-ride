<template>
    <div class="page">

        <div class="header">
            <div>
                <span class="eyebrow">RÉSERVATIONS</span>
                <h1>Gestion des réservations</h1>
                <p>Suivez toutes les réservations effectuées.</p>
            </div>
        </div>


        <div class="stats">

            <div>
                <span>Total</span>
                <strong>2 481</strong>
            </div>

            <div>
                <span>Confirmées</span>
                <strong>2 140</strong>
            </div>

            <div>
                <span>En attente</span>
                <strong>241</strong>
            </div>

            <div>
                <span>Annulées</span>
                <strong>100</strong>
            </div>

        </div>


        <div class="toolbar">

            <input
                v-model="search"
                placeholder="Rechercher..."
            />

            <select v-model="status">
                <option value="all">Tous les statuts</option>
                <option value="confirmed">Confirmée</option>
                <option value="pending">En attente</option>
                <option value="cancelled">Annulée</option>
            </select>

        </div>


        <div class="card">

            <div
                v-for="reservation in filteredReservations"
                :key="reservation.id"
                class="reservation"
            >

                <div class="number">
                    #{{ reservation.id }}
                </div>


                <div>
                    <strong>{{ reservation.student }}</strong>
                    <span>Étudiant</span>
                </div>


                <div>
                    <strong>
                        {{ reservation.departure }}
                        →
                        {{ reservation.destination }}
                    </strong>

                    <span>
                        {{ reservation.date }}
                    </span>
                </div>


                <div>
                    <strong>{{ reservation.driver }}</strong>
                    <span>Chauffeur</span>
                </div>


                <span
                    class="status"
                    :class="reservation.status"
                >
                    {{ reservation.statusLabel }}
                </span>

            </div>

        </div>

    </div>
</template>


<script setup>

import { computed, ref } from 'vue'

const search = ref('')
const status = ref('all')

const reservations = [
    {
        id: '2451',
        student: 'Ranti',
        departure: 'Abomey-Calavi',
        destination: 'Cotonou',
        date: '31 août • 07:30',
        driver: 'Aubin',
        status: 'confirmed',
        statusLabel: 'Confirmée'
    },
    {
        id: '2450',
        student: 'Maurice',
        departure: 'Calavi',
        destination: 'Cotonou',
        date: '31 août • 08:00',
        driver: 'Jean',
        status: 'pending',
        statusLabel: 'En attente'
    },
    {
        id: '2449',
        student: 'David',
        departure: 'Godomey',
        destination: 'Cotonou',
        date: '30 août • 07:00',
        driver: 'Paul',
        status: 'cancelled',
        statusLabel: 'Annulée'
    }
]

const filteredReservations = computed(() => {

    return reservations.filter(reservation => {

        const matchesSearch =
            `${reservation.student} ${reservation.driver} ${reservation.id}`
                .toLowerCase()
                .includes(search.value.toLowerCase())

        const matchesStatus =
            status.value === 'all' ||
            reservation.status === status.value

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

.stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
    margin-bottom: 18px;
}

.stats > div {
    padding: 18px;

    background: white;

    border: 1px solid #e2e8f0;
    border-radius: 10px;
}

.stats span {
    display: block;
    color: #64748b;
    font-size: 10px;
}

.stats strong {
    display: block;
    margin-top: 7px;
    font-size: 21px;
}

.toolbar {
    display: flex;
    gap: 10px;
    margin-bottom: 15px;
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

.card {
    background: white;

    border: 1px solid #e2e8f0;
    border-radius: 10px;

    overflow: hidden;
}

.reservation {
    display: grid;
    grid-template-columns: 70px 1fr 1.5fr 1fr 100px;

    align-items: center;

    gap: 15px;

    padding: 17px;

    border-bottom: 1px solid #e2e8f0;
}

.reservation strong,
.reservation span {
    display: block;
}

.reservation strong {
    font-size: 11px;
}

.reservation span {
    margin-top: 3px;
    color: #64748b;
    font-size: 9px;
}

.number {
    color: #2563eb;
    font-size: 11px;
    font-weight: 700;
}

.status {
    padding: 5px 8px;

    border-radius: 20px;

    text-align: center;
}

.status.confirmed {
    background: #f0fdf4;
    color: #16a34a;
}

.status.pending {
    background: #fff7ed;
    color: #ea580c;
}

.status.cancelled {
    background: #fef2f2;
    color: #dc2626;
}

@media(max-width: 850px) {

    .stats {
        grid-template-columns: 1fr 1fr;
    }

    .toolbar {
        flex-direction: column;
    }

    .reservation {
        grid-template-columns: 1fr;
    }

}

</style>