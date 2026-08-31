<template>

    <div class="app-layout">

        <Sidebar />

        <div class="main">

            <Navbar
                title="Student-Ride"
                subtitle="Votre espace étudiant"
            />

            <main class="content">
                <RouterView />
            </main>

        </div>

    </div>

</template>

<script setup>
import Sidebar from '../components/layout/Sidebar.vue'
import Navbar from '../components/layout/Navbar.vue'
</script>

<style scoped>

.app-layout {
    min-height: 100vh;
}

.main {
    margin-left: 250px;
    min-height: 100vh;
}

.content {
    padding: 32px;
}


</style>

