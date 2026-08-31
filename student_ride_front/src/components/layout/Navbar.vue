<template>
    <header class="navbar">

        <div>
            <h2>{{ title }}</h2>
            <p>{{ subtitle }}</p>
        </div>

        <div class="navbar-right">

            <button class="notification">
                <Bell :size="20" />
                <span></span>
            </button>

            <div class="user">

                <div class="avatar">
                    R
                </div>

                <div class="user-info">
                    <strong>Ranti</strong>
                    <small>Étudiant</small>
                </div>

            </div>

        </div>

    </header>
</template>

<script setup>
import { Bell } from 'lucide-vue-next'

defineProps({
    title: {
        type: String,
        default: 'Dashboard'
    },

    subtitle: {
        type: String,
        default: 'Bienvenue sur Student-Ride'
    }
})
</script>

<style scoped>
.navbar {
    height: 72px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 0 32px;

    background: var(--surface);
    border-bottom: 1px solid var(--border);
}

h2 {
    font-size: 18px;
}

p {
    margin-top: 2px;
    font-size: 12px;
    color: var(--text-secondary);
}

.navbar-right {
    display: flex;
    align-items: center;
    gap: 20px;
}

.notification {
    position: relative;

    width: 40px;
    height: 40px;

    display: flex;
    align-items: center;
    justify-content: center;

    border: 1px solid var(--border);
    border-radius: 10px;

    background: white;
    color: var(--text-secondary);
}

.notification span {
    position: absolute;

    width: 7px;
    height: 7px;

    top: 7px;
    right: 8px;

    border-radius: 50%;
    background: var(--danger);
}

.user {
    display: flex;
    align-items: center;
    gap: 10px;
}

.avatar {
    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: var(--primary);
    color: white;

    font-weight: 600;
}

.user-info {
    display: flex;
    flex-direction: column;
}

.user-info strong {
    font-size: 13px;
}

.user-info small {
    color: var(--text-secondary);
    font-size: 11px;
}
</style>