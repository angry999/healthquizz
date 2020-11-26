<template>
    <div class="desktop-container" id="desktop-container">
        <b-jumbotron class="question-box" v-if="routerParam != 'get_plan' && concept == true">
            <template v-slot:header>
                <img src="../../images/images/icons/back.svg" alt="" class="btn-back" @click="goBack">
                <img src="../../images/images/quizz-logo.png" alt="" class="logo">
            </template>
            <b-progress height="5px" :value="progressValue" class="mb-2 progress"></b-progress>
            <b-container>
                <b-row>
                    <b-col class="question">{{ currentQuestion.question }}</b-col>
                </b-row>
                <p style="font-size: 15px;">{{ currentQuestion.answers[0] }}</p>
                <b-list-group>
                    <b-list-group-item v-for="(description, index) in currentQuestion.answers[1].descriptions" :key="index" class="benefit-list"><font-awesome-icon  icon="check-circle" class="icon-check-circle"></font-awesome-icon>{{ description }}</b-list-group-item>
                </b-list-group>
                <b-button class="btn-next-step" variant="primary" @click="gotIt">Got it</b-button>
            </b-container>
        </b-jumbotron>
        
        <b-jumbotron class="question-box" v-else-if="routerParam != 'get_plan' && concept == false">
            <template v-slot:header>
                <img src="../../images/images/icons/back.svg" alt="" class="btn-back" @click="goBack">
                <img src="../../images/images/quizz-logo.png" alt="" class="logo">
                <p class="logo_title">{{ currentQuestion.ltitle }}</p>
            </template>
            <b-progress height="5px" :value="progressValue" class="mb-2 progress"></b-progress>
            <b-container>
                <b-row>
                    <b-col class="question">{{ currentQuestion.question }}</b-col>
                </b-row>
                <b-row class="question-description" v-if="currentQuestion.sub_question != undefined">{{ currentQuestion.sub_question }}</b-row>
                <b-list-group class="fancy-radio-holder">
                    <b-list-group-item @click="selectAnswer(index)" v-for="(answer, index) in answers" :key="index" class="list-question fancy-radio btn-single" :class="answeredClass(index)">
                        <b-row class="icon">
                            <i :class="productIcon(index)"></i>
                        </b-row>
                        {{ answer }}
                        <p class="status"></p>
                        <p class="status-icon" v-if="selectedAnswers.indexOf(index) != -1">{{ questionStatus[1] }}</p>
                        <p class="status-icon" v-else>{{ questionStatus[0] }}</p>
                    </b-list-group-item>
                </b-list-group>
                <b-row class="error-msg" v-if="error != false">{{ error }}</b-row>
                <b-button variant="primary" class="btn-next-step" @click="nextButton" v-if="currentQuestion.multi_selects != undefined">Next</b-button>
            </b-container>
        </b-jumbotron>
        
        <b-jumbotron class="question-box" v-if="routerParam == 'get_plan'">
            <template v-slot:header>
                <img src="../../images/images/quizz-logo.png" alt="" class="logo">
            </template>
            <b-container>
                <b-row>
                    <b-col class="question"> We’ve created your Body Constitution Profile that will help you on your way to optimal health. </b-col>
                </b-row>
                <b-row class="email-description" style="display:block;">Where should we send your FREE Body Constitution Profile, along with food and lifestyle recommendations?</b-row>
                <b-row class="input-holder">
                    <span id="suggest"></span>
                    <b-form-input placeholder="Enter your email address" id="email-value" type="email" v-model="email"></b-form-input>
                </b-row>
                <b-row class="error-msg" v-if="error != false">{{ error }}</b-row>
                <b-button id="btnGetPlan" variant="primary" class="btn-save-email" @click="to_subscribe">Click here to get your profile</b-button>
                <b-row class="email-promise" style="display: block;">We respect your privacy. We will never sell, rent or share your email address. That's more than a policy, it's our personal guarantee!</b-row>
            </b-container>
        </b-jumbotron>
        
    </div>
</template>
<script>
export default {
    props: {
        currentQuestion: Object,
        next: Function,
        prev: Function,
        currentIndex: Function,
        answeredAnswers: Array,
        sAnswers: Array,
        planBox: Boolean
    },
    data() {
        return {
            selectedIndex: null,
            selectedAnswers: [],
            progressValue: 0,
            // logoTitle: 'Questions relating to temperature',
            isActiveStatus: [],
            multiSelection: false,
            routerParam: '',
            aparams: '',
            concept: false,
            error: false,
            email: '',
            reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/
        }
    },
    watch: {
        currentQuestion: {
            immediate: true,
            handler() {
                this.selectedIndex = null;
                this.answered = false;

                let questions = [];
                let question = this.currentQuestion.question;
                for (var i = 0; i < this.answeredAnswers.length; i ++) {
                    questions.push(this.answeredAnswers[i].question);
                }
                // console.log('questions',question,questions)

                let index = questions.indexOf(question);
                if (index != -1) {
                    this.selectedAnswers = this.answeredAnswers[index].answered;
                }
                else {
                    this.selectedAnswers = [];
                }
                 
                this.multiSelection = false;
                this.error = false;
                if (this.currentQuestion.multi_selects != undefined) {
                    this.multiSelection = this.currentQuestion.multi_selects;
                    // this.next_Button = this.currentQuestion.next_button;
                }
                if (this.currentQuestion.question === "Introduction before taking quiz") {
                    this.concept = true;
                }
                else {
                    this.concept =false;
                }
                

                // get rid of all row and col calsses from div element
                setTimeout(function () {
                    let divs = document.getElementsByTagName('div');
                    for (let i = 0; i < divs.length; i ++) {
                        divs[i].classList.remove('row');
                        divs[i].classList.remove('col');
                    }
                }.bind(this), 50);
            }
        }
    },
    computed: {
        answers() {
            let answers = this.currentQuestion.answers;
            return answers;
        },
        questionStatus() {
            let questionStatus = ["-", "+"];
            return questionStatus
        }
    },
    methods: {
        gotIt() {
            setTimeout(function () { this.progressValue = 3.7 }.bind(this), 50);
            this.next()
        },
        selectAnswer(index) {

            this.selectedIndex = index;

            // if user select selected answer, it is removed from selected answers array.
            let index_answer_array = this.selectedAnswers.indexOf(index);

            if (index_answer_array != -1) {
                this.selectedAnswers.splice(index_answer_array, 1);
                return;
            }
            
            // current step is multi selection or not
            if (this.currentQuestion.multi_selects == undefined) {
                this.selectedAnswers = [];
                this.selectedAnswers.push(index);
                // this.answer.push(index);
                let answers = {
                    question: this.currentQuestion.question,
                    answered: this.selectedAnswers
                }

                
                this.$emit('answers', answers);
                let currentIndex;// = this.next()
                // this.prev()
                // console.log(this.currentIndex(), this)
                // if (this.currentIndex() < 10) {
                //     console.log('1', this.currentIndex())
                //     this.logoTitle = 'Questions relating to temperature'
                // } else if(this.currentIndex() > 18) {
                //     console.log('2', this.currentIndex())
                //     this.logoTitle = 'Questions relating to humidity'
                // } else {
                //     console.log('3', this.currentIndex())
                //     this.logoTitle = 'Questions regarding your response to adversity'
                // }
                
                setTimeout(function () { this.progressValue = ((currentIndex=this.next()) + 1) * 3.7 }.bind(this), 500);
            }
            else {
                this.selectedAnswers.push(index);
            }
        },
        // back click in step header
        goBack() {
            if (this.currentQuestion.question === "Introduction before taking quiz") {
                this.$router.go(-1);
                
            } else {
                setTimeout(function () {
                    let currentIndex = this.prev();
                    // if (currentIndex < 10) {
                    //     this.logoTitle = 'Questions relating to temperature'
                    // } else if(currentIndex > 18) {
                    //     this.logoTitle = 'Questions relating to humidity'
                    // } else {
                    //     this.logoTitle = 'Questions regarding your response to adversity'
                    // }
                    this.progressValue = (currentIndex + 1) * 3.7;
                }.bind(this), 500);
            }
            
        },
        nextButton() {
            if (this.currentQuestion.multi_selects <= this.selectedAnswers.length) {
                let answers = {
                    question: this.currentQuestion.question,
                    answered: this.selectedAnswers
                }
                setTimeout(function () { this.progressValue = (this.next() + 1) * 10 }.bind(this), 500);
            }
            else {
                // throw error
                if (this.selectedAnswers.length == 0) {
                    this.error = "Please select an answer"
                } else if (this.selectedAnswers.length > 0 && this.selectedAnswers.length < this.currentQuestion.multi_selects) {
                    this.error = "Please select more products in order to get a complete and diversified meal plan."
                }
                
            }
        },
        to_subscribe() {
            console.log("this.aparams", this.aparams);
            
            if (this.email == "") {
                this.error = "Please enter your email address."
            }
            else {
                if (this.reg.test(this.email)) {
                     
                    let answers = {
                        question: this.currentQuestion.question,
                        answered: this.answeredAnswers
                    }
                    this.$emit('answers', answers);
                    
                    document.getElementById('btnGetPlan').innerHTML = "Sending..."
                    axios.get('./api/questionvalidation/', {
                        params: {aparams:this.aparams, email:this.email}
                    })
                    .then(response => {
                        if(response.data == "success") {
                            document.getElementById('btnGetPlan').innerHTML = "Email sent successfully"
                            setTimeout(function () { this.$router.push({path: '/plan'})}.bind(this), 2000);
                        }
                        else {
                            document.getElementById('btnGetPlan').innerHTML = "Click here to get your profile"
                            this.error = response.data   //"Please reinput your email address."
                        }
                    })
                    .catch(e => {
                        document.getElementById('btnGetPlan').innerHTML = "Click here to get your profile"
                        this.error = "Please confirm your email address."
                    })
                }
                else {
                    this.error = "Please enter a valid email address.";
                }
               
            }
        },
        answeredClass(index) {
            let answeredClass = "";
            if (this.selectedAnswers.indexOf(index) != -1) {
                answeredClass = answeredClass.concat(" active");
            }

            return answeredClass;
        },
        productIcon(index) {
            let productIcon = "";
            let answers = this.currentQuestion.answers;
            
            return productIcon;
        },
    },
    mounted: function () {
        if (this.$route.query.plan != undefined )
            this.routerParam = this.$route.query.plan;
        if (this.$route.query.aparams != undefined )
            this.aparams = this.$route.query.aparams;
    }
}
</script>
<style>
.question {
    color: #444;
    font-family: Karla;
    font-size: 25px;
    font-weight: 700;
    letter-spacing: .85px;
    line-height: 29px;
    margin-top: 20px;
    margin-bottom: 20px;
}
</style>
<style scoped>
.row {
    margin-left: 0;
    margin-right: 0;
    display: block;
}
h1 {
    margin-top: 0px;
}
.logo {
    max-width: 125px;
    max-height: 45px;
    padding-left: 15px;
}
.logo_title {
    text-align: center;
    color: #888;
    margin: 0;
    width: 150%;
}
.question-box {
    padding: 0px;
    border-radius: 9px;
    background-color: #fff;
    box-shadow: 0 4px 11px -2px rgba(86, 70, 143, .3);
    -webkit-box-shadow: 0 4px 11px -2px rgba(86, 70, 143, .3);
}
@media only screen and (min-width: 1000px) {
    .question-box {
        max-width: 600px;
        grid-column-start: 2;
        grid-column-end: five;
        grid-row-start: row1-start;
        grid-row-end: 3;
    }
}
.btn-back {
    position: relative;
}
.progress1 {
    background-color: #bbb5d2;
}
.progress2 {
    background-color: #bbb5d2;
}

.progress3 {
    background-color: #bbb5d2;
}

.progress {
    background-color: #bbb5d2;
}

.list-question {
    margin-bottom: 15px;
    border-radius: 9px;
    border-width: 0px;
    /* box-shadow: 0 4px 11px -7px rgba(0, 0, 0, .2); */
    /* -webkit-box-shadow: 0 4px 11px -7px rgba(0, 0, 0, .3); */
}

.status_active {
    background-color: purple;
}
.icon_active {
    right: 7px;
}
.icon-check-circle {
    color: #56468f;
    margin-right: 10px;
}
.list-group-item {
    border: none;
}
.benefit-list {
    padding-left: 0;
}
.units-toggler {
    margin-left: -15px;
    margin-right: -15px;
    margin-top: -20px;
}
.input {
    border-top: none;
    border-right: none;
    border-left: none;
}
</style>