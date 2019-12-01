<template>
    <div>
        <div v-if="date_error || weight_error || rep_error" class="errors-container">
            <h4>Errors</h4>
            <div v-if="date_error">{{ date_error }}</div>
            <div v-if="weight_error">{{ weight_error }}</div>
            <div v-if="rep_error">{{ rep_error }}</div>
        </div>
        <form v-if="exercise_id" method="POST" action="/add-entry" @submit="checkForm">
            <div class="liftlog-form-group">
                <label for="entry_date" class="liftlog-label">Entry Date (leave empty for current date)</label>
                <input type="date" name="entry_date" id="entry_date" class="liftlog-input" placeholder="yyyy-mm-dd" autocomplete="off">
            </div>
            <div class="liftlog-form-group entry" id="1">
                <h4>Set 1</h4>
                <label for="weight_1" class="liftlog-label">Weight</label>
                <input type="text" name="weight_1" id="weight_1" class="liftlog-input weight" maxlength="5" required autocomplete="off" />
                <label for="reps_1" class="liftlog-label">Reps</label>
                <input type="text" name="reps_1" id="reps_1" class="liftlog-input reps" maxlength="3" required autocomplete="off" />
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
                <button type="submit" class="btn btn-liftlog">Complete Entry</button>
            </div>
        </form>
        <form v-else method="POST" action="/add-calories-entry" @submit="checkForm">
            <div class="liftlog-form-group">
                <label for="entry_date" class="liftlog-label">Entry Date (leave empty for current date)</label>
                <input type="date" name="entry_date" id="entry_date" class="liftlog-input" placeholder="yyyy-mm-dd" autocomplete="off">
            </div>
            <div class="liftlog-form-group entry" id="1">
                <h4>New Entry 1</h4>
                <label for="desc_1" class="liftlog-label">Description</label>
                <input type="text" name="weight_1" id="desc_1" class="liftlog-input weight" maxlength="25" required autocomplete="off" />
                <label for="cal_count_1" class="liftlog-label">Calorie Count</label>
                <input type="text" name="reps_1" id="cal_count_1" class="liftlog-input reps" maxlength="4" required autocomplete="off" />
            </div>
            <div class="liftlog-form-group">
                <input type="hidden" name="set_count" id="entry-count" v-bind:value="entryCount">
                <input type="hidden" name="_token" v-bind:value="csrf">
                <div class="modify-set-count">
                    <a href="javascript:void(0);" @click="duplicateFields()">Add Set</a>
                    <a  v-if="entryCount > 1" href="javascript:void(0);" @click="removeRecent()">Remove Most Recent Set</a>
                </div>
            </div>
            <div class="liftlog-button-group">
                <button type="submit" class="btn btn-liftlog">Complete Entry</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                setCount: 1,
                entryCount: 1,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                date_error: "",
                weight_error: "",
                rep_error: ""
            }
        },
        props: {
            exercise_id: Number
        },
        mounted() {
            if (this.exercise_id) {
                document.getElementById("set-count").value = this.setCount;
            }
            else {
                document.getElementById("entry-count").value = this.setCount;
            }
        },
        methods: {
            duplicateFields: function() {
                if (this.exercise_id) {
                    console.log("this one page");
                }
                else {
                    console.log("the other page");
                }
                let previousSet = document.getElementById(this.setCount);
                let nextSet = previousSet.cloneNode(true);
                this.setCount++;
                nextSet.id = this.setCount;
                console.log(nextSet["children"])
                nextSet["children"][0].innerText = "Set " + this.setCount;
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
                if (this.setCount > 1) {
                    let recent = document.getElementById(this.setCount);
                    this.setCount--;
                    recent.remove();
                }
                else {
                    let recent = document.getElementById(this.entryCount);
                    this.entryCount--;
                    recent.remove();
                }

            },
            checkForm: function(e) {
                // Checking Entry Date field
                let entry_date = document.getElementById("entry_date");
                if (moment(entry_date.value, 'YYYY-MM-DD',true).isValid() == true || entry_date.value == "") {
                    this.date_error = "";
                }
                else {
                    this.date_error = "Invalid date.  Format (YYYY-MM-DD)";
                    e.preventDefault();
                }

                // Checking to make sure weight inputs have numbers
                let weights = document.getElementsByClassName("weight");
                for (let i = 0; i < weights.length; i++) {
                    let weight = weights[i];
                    if (isNaN(weight.value)) {
                        e.preventDefault();
                        this.weight_error = "Detected an invalid value for a weight input.";
                    }
                    else if (weight.value > 999) {
                        e.preventDefault();
                        this.weight_error = "Detected an invalid value for a weight input.";
                    }
                    else {
                        this.weight_error = "";
                    }
                }

                // Checking to make sure reps inputs also have numbers
                let reps = document.getElementsByClassName("reps");
                for (let i = 0; i < reps.length; i++) {
                    let rep = reps[i];
                    if (isNaN(rep.value)) {
                        e.preventDefault();
                        this.rep_error = "Detected an invalid value for a repetitions input.";
                    }
                    else {
                        this.rep_error = "";
                    }
                }
            }
        }
    }
</script>
