<template>
    <div class="page">

        <div class="header">
            <span class="eyebrow">MON COMPTE</span>
            <h1>Mon profil</h1>
            <p>Gérez vos informations personnelles.</p>
        </div>


        <div class="grid">

            <section class="card profile-card">

                <div class="avatar">
                    R
                </div>

                <h2>Ranti</h2>
                <p>Étudiant</p>

                <div class="stats">
                    <div>
                        <strong>8</strong>
                        <span>Trajets</span>
                    </div>

                    <div>
                        <strong>3</strong>
                        <span>Réservations</span>
                    </div>
                </div>

            </section>


            <section class="card">

                <h2>Informations personnelles</h2>

                <form @submit.prevent="save">

                    <div class="form-grid">

                        <div class="field">
                            <label>Prénom</label>

                            <input
                                v-model="form.firstName"
                                type="text"
                            />
                        </div>

                        <div class="field">
                            <label>Nom</label>

                            <input
                                v-model="form.lastName"
                                type="text"
                            />
                        </div>

                        <div class="field">
                            <label>Email</label>

                            <input
                                v-model="form.email"
                                type="email"
                            />
                        </div>

                        <div class="field">
                            <label>Téléphone</label>

                            <input
                                v-model="form.phone"
                                type="tel"
                            />
                        </div>

                    </div>

                    <div class="field">
                        <label>Université / Établissement</label>

                        <input
                            v-model="form.school"
                            type="text"
                        />
                    </div>

                    <button type="submit">
                        Enregistrer les modifications
                    </button>

                </form>

            </section>

        </div>

    </div>
</template>

<script setup>
import { reactive } from 'vue'

const form = reactive({
    firstName: 'Ranti',
    lastName: '',
    email: '',
    phone: '',
    school: ''
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

.profile-card {
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

.profile-card h2 {
    font-size: 18px;
}

.profile-card p {
    color: var(--text-secondary);
    font-size: 12px;
}

.stats {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid var(--border);
}

.stats strong {
    display: block;
    font-size: 20px;
}

.stats span {
    color: var(--text-secondary);
    font-size: 10px;
}

.card h2 {
    margin-bottom: 25px;
    font-size: 16px;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
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

.field input {
    width: 100%;
    height: 43px;
    box-sizing: border-box;
    padding: 0 12px;
    border: 1px solid var(--border);
    border-radius: 8px;
    outline: none;
}

.field input:focus {
    border-color: var(--primary);
}

button {
    width: 100%;
    height: 45px;
    border: none;
    border-radius: 9px;
    background: var(--primary);
    color: white;
    font-weight: 600;
    cursor: pointer;
}

@media(max-width: 750px) {
    .grid {
        grid-template-columns: 1fr;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }
}
</style>