<template>
    <div id="landing">
        <b-container class="bv-example-row bv-example-row-flex-cols">
            <b-row>
                <b-col class="box">
                    <Questions
                    v-if="questions.length"
                    :currentQuestion="questions[index]"
                    :next="(numTotal-1) != index? to: to"
                    :prev="onPrev"
                    :currentIndex="onCurrentIndex"
                    :answeredAnswers="answeredAnswers"
                    :sAnswers="sAnswers"
                    :increment="increment"
                    @answers="archiveAnswers"
                    >
                    </Questions>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>
<script>
import Questions from "./QuestionBox.vue";
// import datas from "../data/questions.js"
// console.log(datas)
export default {
    components: {
        Questions
    },
    data() {
        return { 
            datas: [],
            questions: [],
            index: 0,
            numTotal: 0,
            answeredAnswers: [],
            sAnswers: [],
        }
    },
    
    methods: {
        onNext() {
            // console.log(this.index)
            // //tempcode
            // this.$router.push('plan')
            this.index++
            return this.index
        },
        onCurrentIndex() {
            // console.log(this.index) 
            return this.index
        },
        onPrev() {
            this.index--
            this.sAnswers.pop();
            return this.index
        },
        to() {
            console.log('to summary')
            this.$router.push({name: 'Plan'})
            // this.$router.push({ path: 'summary', query: { aparams: this.sAnswers }  })
        },
        to_plan() {
            this.$router.replace({ path: '/', query: { plan: 'get_plan' } })
        },
        increment(isCorrect) {
            if (isCorrect) {
                this.numCorrect ++
            }
            // this.numTotal ++
        },
        archiveAnswers(answers) {
            let questions = []
            for (var i = 0; i < this.answeredAnswers.length; i ++) {
                questions.push(this.answeredAnswers[i].question);
            }

            let index = this.questions.indexOf(answers.question);
            if (index == -1) { 
                this.answeredAnswers.push(answers);
                let ary = answers.answered[0] 
                
                this.sAnswers.push(ary);
            }
            else {
                this.answeredAnswers[index].answered = answers.answered;;
            }
        } 
    },
    mounted: function() {
        axios.get('./api/questions')
            .then(response => {
                this.datas = response.data;
                for (const key in this.datas) {
            
                    if (this.datas.hasOwnProperty(key)) {
                        const element = this.datas[key];
                        this.questions.push(element);
                    }
                    this.numTotal ++
                }
            })
        
    }
}
</script>
<style scoped>
.logo {
    max-width: 125px;
}
.box {
    align-items: center;
}
@media only screen and (max-width: 768px) {
    .box {
        margin-top: -160px;
    }
}
</style>