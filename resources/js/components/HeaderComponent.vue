<template>
    <div>
        <nav class="navbar">
            <div class="container">
                <div>
                    <a class="logo" href="/">
                        <img src="/images/liftlog-logo.svg" alt="Liftlog logo" class="logo-liftlog">
                    </a>
                    <span>Login</span>
                </div>
                <button class="navbar-toggler hamburger hamburger--spin" id="hamburger" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" @click="animateHamburger()">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </nav>
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="container">
                <ul v-if="auth == false" class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login/">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register/">Register</a>
                    </li>
                </ul>
                <ul v-else class="navbar-nav ml-auto">
                    <li class="nav-msg">Welcome back, {{ name }}!</li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Exercises</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categories/">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/settings/">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout/" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" class="d-none" action="/logout/" method="post">
                            <input type="hidden" name="_token" :value="csrf">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        props: {
            auth: Boolean,
            pageTitle: String,
            name: String
        },
        methods: {
            animateHamburger: function() {
                let hamburger = document.getElementById("hamburger");
                let isExpanded = hamburger.getAttribute("aria-expanded");
                if (isExpanded == "true") {
                    hamburger.classList.remove("is-active");
                }
                else {
                    hamburger.classList.add("is-active");
                }
            },
        }
    }
</script>