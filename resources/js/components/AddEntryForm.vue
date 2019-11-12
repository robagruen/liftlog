<template>
    <div>
        <div class="form-group entry" id="1">
            <h4>Set 1</h4>
            <input type="text" placeholder="Weight" name="weight_1" class="liftlog-input weight" maxlength="5" required>
            <input type="text" placeholder="Reps" name="reps_1" class="liftlog-input reps" maxlength="3" required>
        </div>
        <div class="form-group text-center">
            <input type="hidden" name="set_count" id="set-count" v-bind:value="setCount">
            <input type="hidden" name="exercise_id" id="exercise-id" v-bind:value="exercise_id">
            <div class="modify-set-count">
                <a href="javascript:void(0);" @click="duplicateFields()">Add Set</a>
                <a  v-if="setCount > 1" href="javascript:void(0);" @click="removeRecent()">Remove Most Recent Set</a>
            </div>
            <button type="submit" class="btn btn-liftlog" @click="checkForm()">Complete Entry</button>
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
                nextSet["children"][0].innerText = "Set" + this.setCount;
                nextSet["children"][1].value = "";
                nextSet["children"][1].name = "weight_" + this.setCount;
                nextSet["children"][2].value = "";
                nextSet["children"][2].name = "reps_" + this.setCount;
                previousSet.parentNode.insertBefore(nextSet, previousSet.nextSibling);

            },
            removeRecent: function() {
                let recentSet = document.getElementById(this.setCount);
                recentSet.remove();
                this.setCount--;
            },
            checkForm: function() {
                let weights = document.getElementsByClassName("weight");
                for (let i = 0; i <= weights.length; i++) {
                    let weight = weights[i];
                }

                let reps = document.getElementsByClassName("reps");
                let rep;
                for (let i = 0; i <= reps.length; i++) {
                    rep = reps[i];
                    if (Number.isInteger(parseInt(rep.value))) {
                        //console.log(typeof(parseInt(reps.value)));
                        //console.log("yes");
                    }
                    else {
                        return false;
                    }
                }



            }
        }
    }
</script>
