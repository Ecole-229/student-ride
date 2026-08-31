<template>
    <div class="page">

        <div class="header">
            <span class="eyebrow">MODIFICATION</span>
            <h1>Modifier le trajet</h1>
            <p>Modifiez les informations de votre trajet.</p>
        </div>

        <form @submit.prevent="update" class="card">

            <div class="grid">

                <div class="field">
                    <label>Départ</label>
                    <input v-model="form.departure" type="text">
                </div>

                <div class="field">
                    <label>Destination</label>
                    <input v-model="form.destination" type="text">
                </div>

                <div class="field">
                    <label>Date</label>
                    <input v-model="form.date" type="date">
                </div>

                <div class="field">
                    <label>Heure</label>
                    <input v-model="form.time" type="time">
                </div>

                <div class="field">
                    <label>Places</label>
                    <input v-model="form.places" type="number" min="1">
                </div>

                <div class="field">
                    <label>Prix par place</label>
                    <input v-model="form.price" type="number">
                </div>

            </div>

            <div class="field">
                <label>Description</label>
                <textarea v-model="form.description" rows="4"></textarea>
            </div>

            <div class="actions">
                <RouterLink
                    to="/driver/trajets"
                    class="cancel"
                >
                    Annuler
                </RouterLink>

                <button type="submit">
                    Enregistrer
                </button>
            </div>

        </form>

    </div>
</template>

<script setup>
import { reactive } from 'vue'

const form = reactive({
    departure: 'Abomey-Calavi',
    destination: 'Cotonou',
    date: '2026-08-31',
    time: '07:30',
    places: 3,
    price: 500,
    description: 'Trajet direct vers Cotonou.'
})

function update() {
    console.log('Modification à envoyer à Laravel', form)
}
</script>

<style scoped>
.page {
    max-width: 900px;
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

.card {
    padding: 28px;
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
}

.grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.field {
    margin-bottom: 18px;
}

label {
    display: block;
    margin-bottom: 7px;
    font-size: 12px;
    font-weight: 600;
}

input,
textarea {
    width: 100%;
    box-sizing: border-box;
    padding: 11px;
    border: 1px solid var(--border);
    border-radius: 8px;
    outline: none;
    font-family: inherit;
}

input {
    height: 43px;
}

textarea {
    resize: vertical;
}

.actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    padding-top: 20px;
    border-top: 1px solid var(--border);
}

.cancel {
    padding: 12px 18px;
    border: 1px solid var(--border);
    border-radius: 8px;
    font-size: 12px;
}

button {
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    background: var(--primary);
    color: white;
    font-weight: 600;
}

@media(max-width: 650px) {
    .grid {
        grid-template-columns: 1fr;
    }
}
</style>