<template>
    <div class="page">

        <div class="header">
            <span class="eyebrow">RÉSERVATION</span>
            <h1>Réserver une place</h1>
            <p>Vérifiez les informations avant de confirmer.</p>
        </div>

        <div class="grid">

            <section class="card">

                <h2>Votre trajet</h2>

                <div class="route">
                    <div>
                        <strong>Abomey-Calavi</strong>
                        <span>07:30</span>
                    </div>

                    <span class="arrow">→</span>

                    <div>
                        <strong>Cotonou</strong>
                        <span>08:15</span>
                    </div>
                </div>

                <div class="summary">

                    <div>
                        <span>Date</span>
                        <strong>31 août 2026</strong>
                    </div>

                    <div>
                        <span>Prix par place</span>
                        <strong>500 FCFA</strong>
                    </div>

                </div>

            </section>


            <section class="card">

                <h2>Nombre de places</h2>

                <div class="quantity">

                    <button @click="decrease">−</button>

                    <strong>{{ places }}</strong>

                    <button @click="increase">+</button>

                </div>

                <div class="total">
                    <span>Total</span>
                    <strong>{{ places * 500 }} FCFA</strong>
                </div>

                <button class="confirm" @click="confirmReservation">
                    Confirmer la réservation
                </button>

            </section>

        </div>

    </div>
</template>

<script setup>
import { ref } from 'vue'

const places = ref(1)

function increase() {
    if (places.value < 2) {
        places.value++
    }
}

function decrease() {
    if (places.value > 1) {
        places.value--
    }
}

function confirmReservation() {
    console.log('Réservation à envoyer à Laravel')
}
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

.grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 20px;
}

.card {
    padding: 25px;
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
}

.card h2 {
    font-size: 16px;
    margin-bottom: 25px;
}

.route {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 25px 0;
}

.route strong {
    display: block;
    font-size: 14px;
}

.route span {
    color: var(--text-secondary);
    font-size: 12px;
}

.arrow {
    font-size: 20px !important;
}

.summary {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    padding-top: 20px;
    border-top: 1px solid var(--border);
}

.summary span,
.total span {
    display: block;
    color: var(--text-secondary);
    font-size: 11px;
    margin-bottom: 5px;
}

.summary strong {
    font-size: 13px;
}

.quantity {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 25px;
    margin: 30px 0;
}

.quantity button {
    width: 38px;
    height: 38px;
    border: 1px solid var(--border);
    border-radius: 8px;
    background: white;
    cursor: pointer;
    font-size: 20px;
}

.quantity strong {
    font-size: 20px;
}

.total {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 0;
    border-top: 1px solid var(--border);
}

.total strong {
    font-size: 18px;
}

.confirm {
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
}
</style>