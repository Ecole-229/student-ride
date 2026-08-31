<template>
    <div class="app-layout">

        <!-- Sidebar -->
        <Sidebar />

        <!-- Contenu principal -->
        <div class="main-content">

            <!-- Navbar -->
            <Navbar
                title="Student-Ride"
                subtitle="Votre espace étudiant"
            />

            <!-- Page actuelle -->
            <main class="page-content">
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
    background: #f8fafc;
}

.main-content {
    min-height: 100vh;
    margin-left: 250px;
}

.page-content {
    padding: 32px;
}

/* Responsive */
@media (max-width: 768px) {
    .main-content {
        margin-left: 0;
    }

    .page-content {
        padding: 20px;
    }
}
</style>