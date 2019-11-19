<template>
    <div>
        <form method="POST" action="/add-entry">
            <div class="liftlog-form-group">
                <label for="entry_date" class="liftlog-label">Entry Date (leave empty for current date)</label>
                <input type="date" name="entry_date" id="entry_date" class="liftlog-input">
            </div>
            <div class="liftlog-form-group entry" id="1">
                <h4>Set 1</h4>
                <label for="weight_1" class="liftlog-label">Weight</label>
                <input type="text" name="weight_1" id="weight_1" class="liftlog-input weight" maxlength="5" required />
                <label for="reps_1" class="liftlog-label">Reps</label>
                <input type="text" name="reps_1" id="reps_1" class="liftlog-input reps" maxlength="3" required />
            </div>
            <div class="liftlog-form-group">
                <input type="hidden" name="set_count" id="set-count" v-bind:value="setCount">
                <input type="hidden" name="exercise_id" id="exercise-id" v-bind:value="exercise_id">
                <input type="hidden" name="_token" v-bind:value="csrf">
                <div class="modify-set-count">
                    <a href="javascript:void(0);" @click="duplicateFields()">Add Set</a>
                    <a  v-if="setCount > 1" href="javascript:void(0);" @click="removeRecent()">Remove Most Recent Set</a>
                </div>
            </div>
            <div class="liftlog-button-group">
                <button type="submit" class="btn btn-liftlog" @click="checkForm()">Complete Entry</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                setCount: 1,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
                console.log(nextSet["children"])
                nextSet["children"][0].innerText = "Set" + this.setCount;
                nextSet["children"][1].htmlFor = "weight_" + this.setCount;
                nextSet["children"][2].value = "";
                nextSet["children"][2].name = "weight_" + this.setCount;
                nextSet["children"][2].id = "weight_" + this.setCount;
                nextSet["children"][3].htmlFor = "reps_" + this.setCount;
                nextSet["children"][4].value = "";
                nextSet["children"][4].name = "reps_" + this.setCount;
                nextSet["children"][4].id = "reps_" + this.setCount;
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
