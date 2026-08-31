<template>
    <div class="page">

        <div class="header">
            <span class="eyebrow">MON PROFIL</span>
            <h1>Profil chauffeur</h1>
            <p>Gérez vos informations et celles de votre véhicule.</p>
        </div>


        <div class="grid">

            <section class="card profile">

                <div class="avatar">
                    A
                </div>

                <h2>Aubin</h2>

                <span>Chauffeur Student-Ride</span>

                <div class="rating">
                    ⭐ 4.8 / 5
                </div>

            </section>


            <section class="card">

                <h2>Informations personnelles</h2>

                <form @submit.prevent="save">

                    <div class="fields">

                        <div class="field">
                            <label>Prénom</label>
                            <input v-model="form.firstName">
                        </div>

                        <div class="field">
                            <label>Nom</label>
                            <input v-model="form.lastName">
                        </div>

                        <div class="field">
                            <label>Email</label>
                            <input v-model="form.email" type="email">
                        </div>

                        <div class="field">
                            <label>Téléphone</label>
                            <input v-model="form.phone">
                        </div>

                    </div>


                    <h2>Véhicule</h2>

                    <div class="fields">

                        <div class="field">
                            <label>Marque</label>
                            <input v-model="form.brand">
                        </div>

                        <div class="field">
                            <label>Modèle</label>
                            <input v-model="form.model">
                        </div>

                        <div class="field">
                            <label>Immatriculation</label>
                            <input v-model="form.plate">
                        </div>

                        <div class="field">
                            <label>Nombre de places</label>
                            <input v-model="form.seats" type="number">
                        </div>

                    </div>


                    <button type="submit">
                        Enregistrer
                    </button>

                </form>

            </section>

        </div>

    </div>
</template>

<script setup>
import { reactive } from 'vue'

const form = reactive({
    firstName: 'Aubin',
    lastName: '',
    email: '',
    phone: '',
    brand: 'Toyota',
    model: 'Corolla',
    plate: 'AB 1234 RB',
    seats: 4
})

function save() {
    console.log('Profil à envoyer à Laravel', form)
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
    grid-template-columns: 280px 1fr;
    gap: 20px;
}

.card {
    padding: 25px;
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
}

.profile {
    text-align: center;
}

.avatar {
    width: 80px;
    height: 80px;
    margin: 0 auto 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: var(--primary-light);
    color: var(--primary);
    font-size: 28px;
    font-weight: 700;
}

.profile h2 {
    font-size: 18px;
}

.profile > span {
    color: var(--text-secondary);
    font-size: 11px;
}

.rating {
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid var(--border);
    font-size: 12px;
}

.card > h2 {
    margin-bottom: 20px;
    font-size: 16px;
}

.fields {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 25px;
}

.field label {
    display: block;
    margin-bottom: 7px;
    font-size: 12px;
    font-weight: 600;
}

.field input {
    width: 100%;
    height: 43px;
    box-sizing: border-box;
    padding: 0 12px;
    border: 1px solid var(--border);
    border-radius: 8px;
    outline: none;
}

button {
    width: 100%;
    height: 45px;
    border: none;
    border-radius: 8px;
    background: var(--primary);
    color: white;
    font-weight: 600;
    cursor: pointer;
}

@media(max-width: 750px) {
    .grid,
    .fields {
        grid-template-columns: 1fr;
    }
}
</style>