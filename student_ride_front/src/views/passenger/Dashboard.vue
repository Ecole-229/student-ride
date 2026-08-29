<template>

    <div>
        <h1>Dashboard étudiant</h1>

        <p>
            Bienvenue sur Student-Ride 👋
        </p>

        <div>
            <router-link to="/passenger/trajets">
                Rechercher un trajet
            </router-link>
        </div>

        <div>
            <router-link to="/passenger/reservations">
                Mes réservations
            </router-link>
        </div>
    </div>

</template>