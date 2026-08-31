<template>
    <div class="page">

        <!-- HEADER -->
        <div class="header">

            <div>
                <span class="eyebrow">CONFIGURATION</span>

                <h1>Paramètres</h1>

                <p>
                    Configurez les paramètres généraux de Student-Ride.
                </p>
            </div>

        </div>


        <div class="settings-grid">

            <!-- GENERAL -->
            <section class="card">

                <h2>Paramètres généraux</h2>

                <p class="description">
                    Informations générales de la plateforme.
                </p>


                <div class="form-group">

                    <label>
                        Nom de la plateforme
                    </label>

                    <input
                        v-model="settings.name"
                        type="text"
                    >

                </div>


                <div class="form-group">

                    <label>
                        Email administrateur
                    </label>

                    <input
                        v-model="settings.email"
                        type="email"
                    >

                </div>


                <div class="form-group">

                    <label>
                        Téléphone
                    </label>

                    <input
                        v-model="settings.phone"
                        type="text"
                    >

                </div>


                <div class="form-group">

                    <label>
                        Devise
                    </label>

                    <select v-model="settings.currency">

                        <option>FCFA</option>

                        <option>EUR</option>

                        <option>USD</option>

                    </select>

                </div>


                <button
                    class="save"
                    @click="save"
                >
                    Enregistrer les modifications
                </button>

            </section>


            <!-- PLATFORM -->
            <section class="card">

                <h2>Fonctionnalités</h2>

                <p class="description">
                    Activez ou désactivez certaines fonctionnalités.
                </p>


                <div class="toggle">

                    <div>
                        <strong>Suivi en temps réel</strong>

                        <span>
                            Permettre le suivi GPS des trajets.
                        </span>
                    </div>

                    <input
                        v-model="settings.tracking"
                        type="checkbox"
                    >

                </div>


                <div class="toggle">

                    <div>
                        <strong>Notifications</strong>

                        <span>
                            Envoyer les notifications aux utilisateurs.
                        </span>
                    </div>

                    <input
                        v-model="settings.notifications"
                        type="checkbox"
                    >

                </div>


                <div class="toggle">

                    <div>
                        <strong>Nouveaux trajets</strong>

                        <span>
                            Autoriser les chauffeurs à créer des trajets.
                        </span>
                    </div>

                    <input
                        v-model="settings.newTrips"
                        type="checkbox"
                    >

                </div>


                <div class="toggle">

                    <div>
                        <strong>Réservations</strong>

                        <span>
                            Autoriser les étudiants à réserver.
                        </span>
                    </div>

                    <input
                        v-model="settings.reservations"
                        type="checkbox"
                    >

                </div>

            </section>


            <!-- SECURITY -->
            <section class="card">

                <h2>Sécurité</h2>

                <p class="description">
                    Paramètres liés à la sécurité de la plateforme.
                </p>


                <div class="security-item">

                    <div>
                        <strong>Authentification</strong>

                        <span>
                            Connexion sécurisée par email et mot de passe.
                        </span>
                    </div>

                    <span class="enabled">
                        Activée
                    </span>

                </div>


                <div class="security-item">

                    <div>
                        <strong>Vérification des chauffeurs</strong>

                        <span>
                            Les chauffeurs doivent être vérifiés.
                        </span>
                    </div>

                    <span class="enabled">
                        Activée
                    </span>

                </div>


                <button class="secondary">
                    Modifier le mot de passe administrateur
                </button>

            </section>


            <!-- SYSTEM -->
            <section class="card">

                <h2>Système</h2>

                <p class="description">
                    Informations techniques.
                </p>


                <div class="system-row">

                    <span>Version</span>

                    <strong>Student-Ride v1.0.0</strong>

                </div>


                <div class="system-row">

                    <span>API</span>

                    <strong class="online">
                        ● Opérationnelle
                    </strong>

                </div>


                <div class="system-row">

                    <span>Base de données</span>

                    <strong class="online">
                        ● Opérationnelle
                    </strong>

                </div>


                <div class="system-row">

                    <span>Suivi GPS</span>

                    <strong class="online">
                        ● Opérationnel
                    </strong>

                </div>

            </section>

        </div>

    </div>
</template>


<script setup>

import { reactive } from 'vue'

const settings = reactive({

    name: 'Student-Ride',

    email: 'admin@student-ride.com',

    phone: '+229 97 00 00 00',

    currency: 'FCFA',

    tracking: true,

    notifications: true,

    newTrips: true,

    reservations: true

})


const save = () => {

    alert('Paramètres enregistrés avec succès.')

}

</script>


<style scoped>

.page {
    max-width: 1200px;
    margin: auto;
}


/* HEADER */

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
    margin: 0;

    color: #64748b;

    font-size: 13px;
}


/* GRID */

.settings-grid {
    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 20px;
}


/* CARD */

.card {
    padding: 22px;

    background: white;

    border: 1px solid #e2e8f0;

    border-radius: 12px;
}

.card h2 {
    margin: 0;

    font-size: 15px;
}

.description {
    margin: 6px 0 22px;

    color: #64748b;

    font-size: 10px;
}


/* FORM */

.form-group {
    margin-bottom: 16px;
}

.form-group label {
    display: block;

    margin-bottom: 6px;

    color: #475569;

    font-size: 10px;
    font-weight: 600;
}

.form-group input,
.form-group select {
    width: 100%;

    height: 40px;

    padding: 0 11px;

    border: 1px solid #e2e8f0;

    border-radius: 7px;

    outline: none;

    font-size: 11px;
}

.form-group input:focus,
.form-group select:focus {
    border-color: #2563eb;
}


/* BUTTON */

.save {
    width: 100%;

    margin-top: 5px;

    padding: 11px;

    border: none;

    border-radius: 7px;

    background: #2563eb;

    color: white;

    font-size: 10px;
    font-weight: 600;

    cursor: pointer;
}

.save:hover {
    background: #1d4ed8;
}


/* TOGGLE */

.toggle {
    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 20px;

    padding: 15px 0;

    border-bottom: 1px solid #e2e8f0;
}

.toggle strong,
.toggle span {
    display: block;
}

.toggle strong {
    font-size: 11px;
}

.toggle span {
    margin-top: 4px;

    color: #64748b;

    font-size: 9px;
}

.toggle input {
    width: 17px;
    height: 17px;

    cursor: pointer;
}


/* SECURITY */

.security-item {
    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 15px;

    padding: 15px 0;

    border-bottom: 1px solid #e2e8f0;
}

.security-item strong,
.security-item span {
    display: block;
}

.security-item strong {
    font-size: 11px;
}

.security-item span {
    margin-top: 4px;

    color: #64748b;

    font-size: 9px;
}

.security-item .enabled {
    padding: 5px 8px;

    border-radius: 20px;

    background: #f0fdf4;

    color: #16a34a;

    white-space: nowrap;
}

.secondary {
    margin-top: 18px;

    padding: 10px 13px;

    border: 1px solid #cbd5e1;

    border-radius: 7px;

    background: white;

    color: #334155;

    font-size: 10px;

    cursor: pointer;
}


/* SYSTEM */

.system-row {
    display: flex;

    justify-content: space-between;

    padding: 14px 0;

    border-bottom: 1px solid #e2e8f0;

    font-size: 10px;
}

.system-row span {
    color: #64748b;
}

.system-row strong {
    font-size: 10px;
}

.online {
    color: #16a34a;
}


/* RESPONSIVE */

@media(max-width: 800px) {

    .settings-grid {
        grid-template-columns: 1fr;
    }

}

</style>