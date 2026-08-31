<template>
    <div class="page">

        <!-- HEADER -->
        <div class="header">

            <div>
                <span class="eyebrow">UTILISATEUR</span>

                <h1>Détails de l'utilisateur</h1>

                <p>
                    Consultez les informations et l'activité de cet utilisateur.
                </p>
            </div>

            <RouterLink
                to="/admin/users"
                class="back"
            >
                ← Retour aux utilisateurs
            </RouterLink>

        </div>


        <!-- PROFILE -->
        <div class="profile-card">

            <div class="avatar">
                R
            </div>

            <div class="profile-info">

                <h2>Ranti</h2>

                <p>ranti@example.com</p>

                <span class="badge">
                    Étudiant
                </span>

            </div>

            <div class="account-status">
                <span>Statut du compte</span>

                <strong>
                    ● Actif
                </strong>
            </div>

        </div>


        <!-- GRID -->
        <div class="grid">

            <!-- INFORMATIONS -->
            <section class="card">

                <h2>Informations personnelles</h2>

                <div class="info">

                    <div>
                        <span>Nom complet</span>
                        <strong>Ranti</strong>
                    </div>

                    <div>
                        <span>Email</span>
                        <strong>ranti@example.com</strong>
                    </div>

                    <div>
                        <span>Téléphone</span>
                        <strong>+229 97 00 00 00</strong>
                    </div>

                    <div>
                        <span>Rôle</span>
                        <strong>Étudiant</strong>
                    </div>

                    <div>
                        <span>Date d'inscription</span>
                        <strong>12 août 2026</strong>
                    </div>

                </div>

            </section>


            <!-- STATISTIQUES -->
            <section class="card">

                <h2>Activité</h2>

                <div class="activity-stats">

                    <div>
                        <strong>18</strong>
                        <span>Réservations</span>
                    </div>

                    <div>
                        <strong>15</strong>
                        <span>Trajets effectués</span>
                    </div>

                    <div>
                        <strong>4.8</strong>
                        <span>Note moyenne</span>
                    </div>

                </div>

            </section>

        </div>


        <!-- ACTIONS -->
        <section class="card actions">

            <h2>Actions administrateur</h2>

            <p>
                Ces actions permettent de gérer le compte de l'utilisateur.
            </p>

            <div class="buttons">

                <button class="warning">
                    Bloquer le compte
                </button>

                <button class="danger">
                    Supprimer le compte
                </button>

            </div>

        </section>

    </div>
</template>


<style scoped>

.page {
    max-width: 1200px;
    margin: auto;
}


/* HEADER */

.header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;

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

.back {
    color: #2563eb;

    font-size: 11px;
    font-weight: 600;

    text-decoration: none;
}


/* PROFILE */

.profile-card {
    display: flex;
    align-items: center;

    gap: 18px;

    padding: 25px;

    margin-bottom: 20px;

    background: white;

    border: 1px solid #e2e8f0;
    border-radius: 12px;
}

.avatar {
    width: 65px;
    height: 65px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #dbeafe;
    color: #2563eb;

    font-size: 24px;
    font-weight: 700;
}

.profile-info {
    flex: 1;
}

.profile-info h2 {
    margin: 0 0 5px;

    font-size: 18px;
}

.profile-info p {
    margin: 0 0 8px;

    color: #64748b;

    font-size: 11px;
}

.badge {
    display: inline-block;

    padding: 5px 9px;

    border-radius: 20px;

    background: #eff6ff;
    color: #2563eb;

    font-size: 9px;
}

.account-status span,
.account-status strong {
    display: block;
}

.account-status span {
    color: #64748b;

    font-size: 9px;
}

.account-status strong {
    margin-top: 5px;

    color: #16a34a;

    font-size: 11px;
}


/* GRID */

.grid {
    display: grid;

    grid-template-columns: 1.5fr 1fr;

    gap: 20px;

    margin-bottom: 20px;
}

.card {
    padding: 22px;

    background: white;

    border: 1px solid #e2e8f0;
    border-radius: 12px;
}

.card h2 {
    margin-top: 0;

    font-size: 15px;
}


/* INFORMATIONS */

.info {
    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 20px;
}

.info span,
.info strong {
    display: block;
}

.info span {
    color: #64748b;

    font-size: 10px;
}

.info strong {
    margin-top: 5px;

    font-size: 11px;
}


/* ACTIVITY */

.activity-stats {
    display: grid;

    grid-template-columns: 1fr;

    gap: 12px;
}

.activity-stats div {
    padding: 12px;

    background: #f8fafc;

    border-radius: 8px;
}

.activity-stats strong {
    display: block;

    font-size: 20px;
}

.activity-stats span {
    display: block;

    margin-top: 3px;

    color: #64748b;

    font-size: 9px;
}


/* ACTIONS */

.actions {
    margin-bottom: 20px;
}

.actions p {
    color: #64748b;

    font-size: 11px;
}

.buttons {
    display: flex;

    gap: 10px;

    margin-top: 18px;
}

.buttons button {
    padding: 10px 15px;

    border: none;

    border-radius: 7px;

    font-size: 10px;

    cursor: pointer;
}

.warning {
    background: #fff7ed;
    color: #ea580c;
}

.danger {
    background: #fef2f2;
    color: #dc2626;
}


/* RESPONSIVE */

@media(max-width: 750px) {

    .header {
        display: block;
    }

    .back {
        display: inline-block;

        margin-top: 15px;
    }

    .profile-card {
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .account-status {
        width: 100%;
    }

    .grid {
        grid-template-columns: 1fr;
    }

    .info {
        grid-template-columns: 1fr;
    }

}

</style>