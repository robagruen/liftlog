<template>
    <div>
        <div class="tab">
            <div class="container">
                <md-tabs md-sync-route md-alignment="centered">
                    <md-tab id="tab-exercises" md-label="Exercises" to="/exercises"></md-tab>
                    <md-tab id="tab-exercise_categories" md-label="Exercise Categories" to="/categories"></md-tab>
                    <md-tab id="tab-nutrition" md-label="Nutrition" to="/nutrition"></md-tab>
                </md-tabs>
            </div>
        </div>
        <div class="tab-spacer"></div>
    </div>
</template>

<script>
    export default {
        name: 'HeaderComponent'
    }
</script>

<style lang="scss" scoped>
    .tab {
        height: 48px;
        position: fixed;
        width: 100%
    }

    .tab-spacer {
        height: 48px;
        width: 100%;
    }
</style>
