<template>
    <div class="page">

        <div class="header">
            <div>
                <span class="eyebrow">PASSAGERS</span>
                <h1>Passagers du trajet</h1>
                <p>Gérez les étudiants ayant réservé une place.</p>
            </div>
        </div>


        <div class="trip-info">
            <strong>Abomey-Calavi → Cotonou</strong>
            <span>31 août 2026 • 07:30</span>
        </div>


        <div class="card">

            <div class="card-header">
                <h2>3 places • 2 réservées</h2>
            </div>

            <div
                v-for="passenger in passengers"
                :key="passenger.id"
                class="passenger"
            >

                <div class="avatar">
                    {{ passenger.name.charAt(0) }}
                </div>

                <div class="identity">
                    <strong>{{ passenger.name }}</strong>
                    <span>{{ passenger.email }}</span>
                </div>

                <div class="phone">
                    {{ passenger.phone }}
                </div>

                <span
                    class="status"
                    :class="passenger.status"
                >
                    {{ passenger.statusLabel }}
                </span>

                <button>
                    Contacter
                </button>

            </div>

        </div>

    </div>
</template>

<script setup>
const passengers = [
    {
        id: 1,
        name: 'Ranti',
        email: 'ranti@example.com',
        phone: '+229 97 00 00 00',
        status: 'confirmed',
        statusLabel: 'Confirmé'
    },
    {
        id: 2,
        name: 'Maurice',
        email: 'maurice@example.com',
        phone: '+229 96 00 00 00',
        status: 'confirmed',
        statusLabel: 'Confirmé'
    }
]
</script>

<style scoped>
.page {
    max-width: 1100px;
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

.trip-info {
    padding: 18px 20px;
    margin-bottom: 15px;
    background: var(--primary-light);
    border-radius: 10px;
}

.trip-info strong {
    display: block;
    font-size: 14px;
}

.trip-info span {
    color: var(--text-secondary);
    font-size: 11px;
}

.card {
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
}

.card-header {
    padding: 20px;
    border-bottom: 1px solid var(--border);
}

.card-header h2 {
    font-size: 14px;
}

.passenger {
    display: grid;
    grid-template-columns: 45px 1.5fr 1fr 100px 90px;
    align-items: center;
    gap: 15px;
    padding: 17px 20px;
    border-bottom: 1px solid var(--border);
}

.avatar {
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

.identity strong {
    display: block;
    font-size: 12px;
}

.identity span,
.phone {
    color: var(--text-secondary);
    font-size: 10px;
}

.status {
    padding: 5px 8px;
    border-radius: 20px;
    background: #f0fdf4;
    color: var(--success);
    font-size: 10px;
    text-align: center;
}

button {
    padding: 8px;
    border: 1px solid var(--border);
    border-radius: 7px;
    background: white;
    color: var(--primary);
    font-size: 10px;
    cursor: pointer;
}

@media(max-width: 800px) {
    .passenger {
        grid-template-columns: 45px 1fr;
    }

    .phone,
    .status,
    button {
        grid-column: 2;
    }
}
</style>