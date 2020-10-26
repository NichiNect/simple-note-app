<template>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <router-link class="navbar-brand" exact :to="{ name: 'home' }">LaraVue</router-link>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <router-link class="nav-link" exact :to="{ name: 'home' }">Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'pages.about' }">About</router-link>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Note</a>
                    <div class="dropdown-menu">
                        <router-link class="dropdown-item" exact :to="{ name: 'notes.table' }">Table of Notes</router-link>
                        <router-link class="dropdown-item" exact :to="{ name: 'notes.create' }">Create New Note</router-link>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Subjects</a>
                    <div class="dropdown-menu">
                        <router-link class="dropdown-item" exact :to="{ name: 'subjects.table' }">Table of Subjects</router-link>
                        <router-link class="dropdown-item" exact :to="{ name: 'subjects.create' }">Create New Subject</router-link>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

            </ul>
        </div>
    </div>
</nav>
</template>

<script>
export default {

}
</script>
