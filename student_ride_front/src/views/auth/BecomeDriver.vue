<template>
    <div class="page">

        <div class="header">

            <span class="eyebrow">
                DEVENIR CHAUFFEUR
            </span>

            <h1>
                Devenez chauffeur Student-Ride 🚗
            </h1>

            <p>
                Complétez vos informations pour proposer des trajets
                aux autres étudiants.
            </p>

        </div>


        <form class="card" @submit.prevent="becomeDriver">

            <h2>Informations personnelles</h2>

            <div class="grid">

                <div class="form-group">

                    <label>Nom complet</label>

                    <input v-model="form.name" type="text" required>

                </div>

                <div class="form-group">

                    <label>Téléphone</label>

                    <input v-model="form.phone" type="tel" required>

                </div>

            </div>


            <h2>Informations du véhicule</h2>

            <div class="grid">

                <div class="form-group">

                    <label>Marque</label>

                    <input v-model="form.vehicle_brand" type="text" placeholder="Toyota" required>

                </div>

                <div class="form-group">

                    <label>Modèle</label>

                    <input v-model="form.vehicle_model" type="text" placeholder="Corolla" required>

                </div>

                <div class="form-group">

                    <label>Immatriculation</label>

                    <input v-model="form.plate_number" type="text" placeholder="AB 1234 RB" required>

                </div>

                <div class="form-group">

                    <label>Nombre de places</label>

                    <input v-model="form.seats" type="number" min="1" max="8" required>

                </div>

            </div>


            <h2>Informations complémentaires</h2>

            <div class="form-group">

                <label>Numéro du permis</label>

                <input v-model="form.license_number" type="text" required>

            </div>


            <div class="checkbox">

                <input v-model="form.accepted" type="checkbox" required>

                <span>
                    Je certifie que les informations fournies
                    sont exactes.
                </span>

            </div>


            <div class="actions">

                <RouterLink to="/passenger/profile" class="cancel">
                    Annuler
                </RouterLink>

                <button type="submit">
                    Devenir chauffeur
                </button>

            </div>

        </form>

    </div>
</template>


<script setup>

import { reactive } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const user = JSON.parse(
    localStorage.getItem('user') || '{}'
)

const form = reactive({

    name: user.name || '',

    phone: user.phone || '',

    vehicle_brand: '',

    vehicle_model: '',

    plate_number: '',

    seats: 4,

    license_number: '',

    accepted: false

})

const becomeDriver = () => {

    const updatedUser = {

        ...user,

        name: form.name,

        phone: form.phone,

        role: 'driver',

        driverProfile: {

            vehicle_brand: form.vehicle_brand,

            vehicle_model: form.vehicle_model,

            plate_number: form.plate_number,

            seats: Number(form.seats),

            license_number: form.license_number

        }

    }

    localStorage.setItem(
        'user',
        JSON.stringify(updatedUser)
    )

    alert(
        'Félicitations ! Vous êtes maintenant chauffeur Student-Ride.'
    )

    router.push('/driver/dashboard')
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

.card {
    padding: 28px;

    background: white;

    border: 1px solid #e2e8f0;

    border-radius: 14px;
}

.card h2 {
    margin: 25px 0 18px;

    font-size: 15px;
}

.card h2:first-child {
    margin-top: 0;
}

.grid {
    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 15px;
}

.form-group {
    margin-bottom: 12px;
}

.form-group label {
    display: block;

    margin-bottom: 6px;

    color: #334155;

    font-size: 10px;
    font-weight: 600;
}

.form-group input {
    width: 100%;
    box-sizing: border-box;

    height: 42px;

    padding: 0 11px;

    border: 1px solid #cbd5e1;

    border-radius: 7px;

    outline: none;

    font-size: 11px;
}

.form-group input:focus {
    border-color: #2563eb;
}

.checkbox {
    display: flex;

    align-items: center;

    gap: 8px;

    margin-top: 20px;

    color: #475569;

    font-size: 10px;
}

.checkbox input {
    width: 15px;
    height: 15px;
}

.actions {
    display: flex;

    justify-content: flex-end;

    gap: 10px;

    margin-top: 25px;

    padding-top: 20px;

    border-top: 1px solid #e2e8f0;
}

.actions button,
.cancel {
    padding: 11px 16px;

    border-radius: 7px;

    font-size: 10px;

    text-decoration: none;

    cursor: pointer;
}

.actions button {
    border: none;

    background: #2563eb;

    color: white;

    font-weight: 600;
}

.cancel {
    border: 1px solid #cbd5e1;

    color: #475569;
}

@media(max-width: 650px) {

    .grid {
        grid-template-columns: 1fr;
    }

    .actions {
        flex-direction: column;
    }

    .actions button,
    .cancel {
        text-align: center;
    }

}
</style>