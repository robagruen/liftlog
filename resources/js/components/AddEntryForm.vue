<template>
    <div>
        <div class="form-group entry" id="1">
            <input type="text" placeholder="Weight" name="weight_1" maxlength="5" required>
            <input type="text" placeholder="Reps" name="reps_1" maxlength="3" required>
        </div>
        <div class="form-group">
            <input type="hidden" name="set_count" id="set-count" v-bind:value="setCount">
            <input type="hidden" name="exercise_id" id="exercise-id" v-bind:value="exercise_id">
            <a class="btn btn-primary btn-liftlog" href="javascript:void(0)" @click="duplicateFields()">Add Set</a>
            <button type="submit" class="btn btn-primary btn-liftlog">Complete Entry</button>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                setCount: 1
            }
        },
        props: {
            exercise_id: Number
        },
        mounted() {
            document.getElementById("set-count").value = this.setCount;
        },
        methods: {
            duplicateFields: function() {
                let previousSet = document.getElementById(this.setCount);
                let nextSet = previousSet.cloneNode(true);
                this.setCount++;
                nextSet.id = this.setCount;
                nextSet["children"][0].value = "";
                nextSet["children"][0].name = "weight_" + this.setCount;
                nextSet["children"][1].value = "";
                nextSet["children"][1].name = "reps_" + this.setCount;
                previousSet.parentNode.insertBefore(nextSet, previousSet.nextSibling);

            }
        }
    }
</script>
