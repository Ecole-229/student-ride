<template>
    <div class="auth-page">

        <div class="auth-card">

            <div class="logo">
                Student<span>-Ride</span>
            </div>

            <h1>Bon retour 👋</h1>

            <p class="subtitle">
                Connectez-vous à votre compte.
            </p>

            <form @submit.prevent="login">

                <div class="form-group">
                    <label>Email</label>

                    <input v-model="form.email" type="email" placeholder="exemple@email.com">
                </div>

                <div class="form-group">
                    <label>Mot de passe</label>

                    <input v-model="form.password" type="password" placeholder="••••••••">
                </div>

                <div class="forgot">
                    <a href="#">Mot de passe oublié ?</a>
                </div>

                <button type="submit">
                    Se connecter
                </button>

            </form>

            <p class="register">
                Vous n'avez pas de compte ?

                <RouterLink to="/register">
                    Créer un compte
                </RouterLink>
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

const login = () => {

    let user

    // Compte admin
    if (form.email === 'admin@student-ride.com') {

        user = {
            id: 1,
            name: 'Administrateur',
            email: form.email,
            role: 'admin'
        }

        localStorage.setItem('user', JSON.stringify(user))
        localStorage.setItem('token', 'demo-token')

        router.push('/admin/dashboard')
    }

    // Compte chauffeur
    else if (form.email === 'driver@student-ride.com') {

        user = {
            id: 2,
            name: 'Aubin',
            email: form.email,
            role: 'driver',
            driverProfile: {
                vehicle_brand: 'Toyota',
                vehicle_model: 'Corolla',
                plate_number: 'AB-1234-BJ',
                seats: 4,
                license_number: 'PERMIS-001'
            }
        }

        localStorage.setItem('user', JSON.stringify(user))
        localStorage.setItem('token', 'demo-token')

        router.push('/driver/dashboard')
    }

    // Compte passager
    else {

        user = {
            id: 3,
            name: 'Ranti',
            email: form.email,
            role: 'passenger'
        }

        localStorage.setItem('user', JSON.stringify(user))
        localStorage.setItem('token', 'demo-token')

        router.push('/passenger/dashboard')
    }
}

</script>

<style scoped>
.auth-page {
    min-height: 100vh;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f8fafc;

    padding: 20px;
}

.auth-card {
    width: 100%;
    max-width: 420px;

    padding: 35px;

    background: white;

    border: 1px solid #e2e8f0;
    border-radius: 16px;
}

.logo {
    text-align: center;

    font-size: 22px;
    font-weight: 800;

    color: #2563eb;

    margin-bottom: 25px;
}

.logo span {
    color: #0f172a;
}

h1 {
    margin: 0;

    font-size: 25px;

    color: #0f172a;
}

.subtitle {
    margin: 8px 0 25px;

    color: #64748b;

    font-size: 13px;
}

.form-group {
    margin-bottom: 18px;
}

label {
    display: block;

    margin-bottom: 7px;

    font-size: 11px;
    font-weight: 600;

    color: #334155;
}

input {
    width: 100%;
    box-sizing: border-box;

    height: 44px;

    padding: 0 12px;

    border: 1px solid #cbd5e1;

    border-radius: 8px;

    outline: none;

    font-size: 12px;
}

input:focus {
    border-color: #2563eb;
}

.forgot {
    text-align: right;

    margin-bottom: 20px;
}

.forgot a {
    color: #2563eb;

    font-size: 10px;

    text-decoration: none;
}

button {
    width: 100%;

    height: 44px;

    border: none;

    border-radius: 8px;

    background: #2563eb;

    color: white;

    font-size: 12px;
    font-weight: 600;

    cursor: pointer;
}

.register {
    margin-top: 25px;

    text-align: center;

    color: #64748b;

    font-size: 11px;
}

.register a {
    color: #2563eb;

    font-weight: 600;

    text-decoration: none;
}
</style>