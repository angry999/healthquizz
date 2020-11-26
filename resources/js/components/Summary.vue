<template>
    <div class="summary-container c-maincontent results-2 results-3 c-content">
        <b-navbar class="navbar-brand" style="margin-top: 10px;">
            <b-container>
            
                <img src="../../images/images/quizz-logo.png" alt="logo" class="logo">
            
            </b-container>
        </b-navbar>
        <b-container class="container container-intro">
            <h3 style="max-width: 740px; color:black;">Get your <p style="color:#ff3464;">Body Constitution</p> Quick Assessment</h3>
            <p class="subheading bottom30">Based on your answers, you will be get the result</p>
             
            <b-row class="e-actionbar-inner" style="max-width: 400px; margin: auto; margin-bottom: 60px;margin-top: 60px;">
                <b-button id="btnGetItNow" block variant="primary" @click="to_plan">Get it now</b-button>
            </b-row>
            
        </b-container>
        <b-row class="covered">
            <b-row class="heading">Elemental Wisdom was convered</b-row>
            <b-row class="covered-logos">
                <img src="https://ketocycle.diet/images/covered-1.png" alt="">
                <img src="https://ketocycle.diet/images/covered-2.png" alt="">
                <img src="https://ketocycle.diet/images/covered-3.png" alt="">
            </b-row>
        </b-row>
        <b-container id="summary-footer">
            <b-row>
                <b-container>
                    <b-row class="b-ourpromise">
                        <h2>OUR PROMISE</h2>
                        <P class="e-text">We believe in a balanced way to lose weight and keep the weight off. We know that most of the diets or weight loss programs that you have tried in the past don’t work - they are just too hard to follow. Enormous food cravings, friends that visit you with a bottle of wine, that freshly baked cheesecake… Everything affects your journey and if your diet is not easy-to-follow, you are not going to achieve your results.<br><br>Don’t blame yourself. It’s really hard. That’s why our nutritionists and personal coaches work around the clock to prepare the most personalized plans you love. We want to make sure that it becomes a part of your life. We don’t change habits, we help you to improve them. <br><br> Try it out and we guarantee you will be satisfied.</P>
                        <b-row class="b-namesurname" style="display: flex; align-items: center; justify-content: flex-start">
                            <b-row class="b-namesurname-namesurname" style="padding-right: 30px; margin: 0px;">
                            </b-row>
                        </b-row>
                    </b-row>
                </b-container>
            </b-row>
        </b-container>
        <b-row class="container e-actionbar">
            <b-row class="e-actionbar-inner" style="max-width: 400px; margin: auto; margin-bottom: 60px;">
                <b-button id="btnGetItNow2" block variant="primary" @click="to_plan">Get it now</b-button>
            </b-row>
        </b-row>
    </div>
</template>
<script>
export default {
    data() {
        return  {
            stats: [],
            week: ["MON","TUE", "WEB", "THU", "FRI", "SAT", "SUN"],
            routerParam: ''
        }
    },
    mounted: function () {
        this.stats = ['77', '76', '75', '74', '73'];
        let divs = document.getElementsByTagName('div');
        for (let i = 0; i < divs.length; i ++) {
            // console.log(divs[i].classList);
            divs[i].classList.remove('row');
            divs[i].classList.remove('col');
        }
        if (this.$route.query.aparams != undefined )
            this.routerParam = this.$route.query.aparams;
    },
    methods: {
        to_plan() {
            // this.$router.push("/question/get_plan")
            document.getElementById('btnGetItNow').innerHTML = "Processing..."
            document.getElementById('btnGetItNow2').innerHTML = "Processing..."
            setTimeout(function () { this.$router.push({ path: 'question', query: { plan: 'get_plan', aparams: this.routerParam } }) }.bind(this), 2000);
        },
        goto_plan() {
            this.$router.push({ path: 'question', query: { plan: 'get_plan', aparams: this.$route.query.aparams } })
        }
    },
    beforeMount(){
        this.goto_plan()
    }
}
</script>
<style scoped>
.logo {
    max-width: 125px;
}
.row {
    margin: auto;
    display: block;
}
.navbar {
    margin-bottom: 22px;
}
.b-days .b-day {
    position: relative;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding-bottom: 8px;
    min-width: 40px;
}
.b-days, .b-days .b-day {
    display: -webkit-box;
    display: flex;
}
.b-days {
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    text-transform: uppercase;
    font-size: 15px;
    color: #dfe0e1;
    min-height: 50px;
}
.b-days .b-day:before {
    content: "";
    position: absolute;
    width: 6px;
    height: 6px;
    background: #000;
    margin: auto;
    bottom: 0;
    left: 0;
    right: 0;
    border-radius: 20px;
}
.b-days .b-day:last-child {
    color: rgba(255,45,99,.6);
}
</style>