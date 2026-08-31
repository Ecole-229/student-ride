<template>
    <div class="page">

        <div class="header">
            <span class="eyebrow">MES TRAJETS</span>
            <h1>Mes réservations</h1>
            <p>Retrouvez toutes vos réservations.</p>
        </div>


        <div class="tabs">
            <button
                :class="{ active: activeTab === 'upcoming' }"
                @click="activeTab = 'upcoming'"
            >
                À venir
            </button>

            <button
                :class="{ active: activeTab === 'past' }"
                @click="activeTab = 'past'"
            >
                Terminées
            </button>

            <button
                :class="{ active: activeTab === 'cancelled' }"
                @click="activeTab = 'cancelled'"
            >
                Annulées
            </button>
        </div>


        <div class="reservations">

            <div
                v-for="reservation in filteredReservations"
                :key="reservation.id"
                class="card"
            >

                <div class="date">
                    <strong>{{ reservation.day }}</strong>
                    <span>{{ reservation.month }}</span>
                </div>


                <div class="route">

                    <div>
                        <strong>{{ reservation.departure }}</strong>
                        <span>Départ {{ reservation.time }}</span>
                    </div>

                    <span class="arrow">→</span>

                    <div>
                        <strong>{{ reservation.destination }}</strong>
                        <span>Destination</span>
                    </div>

                </div>


                <div class="details">

                    <span>
                        {{ reservation.driver }}
                    </span>

                    <span>
                        {{ reservation.price }} FCFA
                    </span>

                    <span
                        class="status"
                        :class="reservation.status"
                    >
                        {{ reservation.statusLabel }}
                    </span>

                </div>


                <RouterLink
                    :to="`/passenger/reservations/${reservation.id}`"
                    class="button"
                >
                    Détails
                </RouterLink>

            </div>


            <div
                v-if="filteredReservations.length === 0"
                class="empty"
            >
                <h3>Aucune réservation</h3>
                <p>Vous n'avez aucune réservation dans cette catégorie.</p>
            </div>

        </div>

    </div>
</template>

<script setup>
import { computed, ref } from 'vue'

const activeTab = ref('upcoming')

const reservations = [
    {
        id: 1,
        day: '31',
        month: 'AOÛT',
        departure: 'Abomey-Calavi',
        destination: 'Cotonou',
        time: '07:30',
        driver: 'Aubin',
        price: 500,
        status: 'confirmed',
        statusLabel: 'Confirmée',
        category: 'upcoming'
    },
    {
        id: 2,
        day: '28',
        month: 'AOÛT',
        departure: 'Godomey',
        destination: 'Cotonou',
        time: '08:00',
        driver: 'Maurice',
        price: 400,
        status: 'completed',
        statusLabel: 'Terminée',
        category: 'past'
    }
]

const filteredReservations = computed(() => {
    return reservations.filter(
        reservation => reservation.category === activeTab.value
    )
})
</script>

<style scoped>
.page {
    max-width: 1200px;
    margin: auto;
}

.header {
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

.tabs {
    display: flex;
    gap: 8px;
    margin-bottom: 18px;
}

.tabs button {
    padding: 9px 15px;
    border: 1px solid var(--border);
    border-radius: 8px;
    background: white;
    cursor: pointer;
    font-size: 12px;
}

.tabs button.active {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
}

.reservations {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.card {
    display: grid;
    grid-template-columns: 70px 1.5fr 1fr auto;
    align-items: center;
    gap: 20px;
    padding: 20px;
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
    font-size: 22px;
}

.date span {
    color: var(--text-secondary);
    font-size: 9px;
}

.route {
    display: flex;
    align-items: center;
    gap: 20px;
}

.route strong {
    display: block;
    font-size: 13px;
}

.route span {
    color: var(--text-secondary);
    font-size: 10px;
}

.arrow {
    font-size: 18px !important;
}

.details {
    display: flex;
    flex-direction: column;
    gap: 5px;
    font-size: 11px;
}

.status {
    width: fit-content;
    padding: 4px 8px;
    border-radius: 20px;
}

.status.confirmed {
    background: #f0fdf4;
    color: var(--success);
}

.status.completed {
    background: #f1f5f9;
    color: #64748b;
}

.button {
    color: var(--primary);
    font-size: 12px;
    font-weight: 600;
}

.empty {
    padding: 60px;
    text-align: center;
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
}

.empty p {
    color: var(--text-secondary);
    font-size: 12px;
}

@media(max-width: 850px) {
    .card {
        grid-template-columns: 60px 1fr;
    }

    .details {
        grid-column: 2;
    }

    .button {
        grid-column: 2;
    }
}
</style>