<template>
    <div class="page">

        <div class="header">
            <span class="eyebrow">NOUVEAU TRAJET</span>
            <h1>Créer un trajet</h1>
            <p>Publiez un nouveau trajet pour les étudiants.</p>
        </div>


        <form @submit.prevent="submit" class="card">

            <h2>Itinéraire</h2>

            <div class="grid">

                <div class="field">
                    <label>Point de départ</label>
                    <input
                        v-model="form.departure"
                        type="text"
                        placeholder="Ex : Abomey-Calavi"
                        required
                    />
                </div>

                <div class="field">
                    <label>Destination</label>
                    <input
                        v-model="form.destination"
                        type="text"
                        placeholder="Ex : Cotonou"
                        required
                    />
                </div>

            </div>


            <h2>Horaires</h2>

            <div class="grid">

                <div class="field">
                    <label>Date</label>
                    <input
                        v-model="form.date"
                        type="date"
                        required
                    />
                </div>

                <div class="field">
                    <label>Heure de départ</label>
                    <input
                        v-model="form.time"
                        type="time"
                        required
                    />
                </div>

            </div>


            <h2>Informations</h2>

            <div class="grid">

                <div class="field">
                    <label>Nombre de places</label>

                    <input
                        v-model="form.places"
                        type="number"
                        min="1"
                        max="8"
                        required
                    />
                </div>

                <div class="field">
                    <label>Prix par place (FCFA)</label>

                    <input
                        v-model="form.price"
                        type="number"
                        min="0"
                        required
                    />
                </div>

            </div>


            <div class="field">
                <label>Description / informations supplémentaires</label>

                <textarea
                    v-model="form.description"
                    rows="4"
                    placeholder="Informations utiles pour les passagers..."
                ></textarea>
            </div>


            <div class="actions">

                <RouterLink
                    to="/driver/trajets"
                    class="cancel"
                >
                    Annuler
                </RouterLink>

                <button type="submit">
                    Publier le trajet
                </button>

            </div>

        </form>

    </div>
</template>

<script setup>
import { reactive } from 'vue'

const form = reactive({
    departure: '',
    destination: '',
    date: '',
    time: '',
    places: 3,
    price: 500,
    description: ''
})

function submit() {
    console.log('À envoyer à Laravel :', form)
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
    box-shadow: var(--shadow-sm);
}

h2 {
    margin: 10px 0 18px;
    font-size: 15px;
}

.grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 25px;
}

.field {
    margin-bottom: 18px;
}

.field label {
    display: block;
    margin-bottom: 7px;
    font-size: 12px;
    font-weight: 600;
}

input,
textarea {
    width: 100%;
    box-sizing: border-box;
    padding: 11px 12px;
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

input:focus,
textarea:focus {
    border-color: var(--primary);
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
    color: var(--text-secondary);
    font-size: 12px;
}

button {
    padding: 12px 18px;
    border: none;
    border-radius: 8px;
    background: var(--primary);
    color: white;
    font-weight: 600;
    cursor: pointer;
}

@media(max-width: 650px) {
    .grid {
        grid-template-columns: 1fr;
    }
}
</style>