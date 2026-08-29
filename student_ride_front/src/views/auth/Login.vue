<template>
    <div class="login-page">

        <div class="login-container">

            <div class="login-header">
                <h1>Student-Ride</h1>
                <p>Le covoiturage étudiant, simplement.</p>
            </div>

            <form @submit.prevent="login">

                <div class="form-group">
                    <label for="email">Adresse email</label>

                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        placeholder="exemple@email.com"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>

                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        placeholder="Votre mot de passe"
                        required
                    >
                </div>

                <button type="submit">
                    Se connecter
                </button>

            </form>

            <p class="register-link">
                Vous n'avez pas encore de compte ?
                <router-link to="/register">
                    Créer un compte
                </router-link>
            </p>

        </div>

    </div>
</template>

<script setup>
import { reactive } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const form = reactive({
    email: '',
    password: ''
})

function login() {
    console.log('Tentative de connexion :', form)

    // Pour le moment, on simule la connexion
    router.push('/passenger/dashboard')
}
</script>