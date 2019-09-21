<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="">
                LiftLog
            </a>
            <img src="/images/Logo.png" alt="">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul>
                    <li><a href="#">Register</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: {
            logo: String
        }
    }
</script>

<style lang="scss" scoped>

li {
    color: turquoise;
}
</style>