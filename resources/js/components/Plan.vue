<template>
    <div>
        <navbar></navbar>
        <b-row id="billing" class="active m-billing--v5 m-billing--v6 m-billing--v7 m-checkout--11 m-billing--fixed with-bg">
            <b-container>
                <img src="../../images/images/quizz-logo.png" alt="" class="regular-logo">
                <b-row class="block-content">
                    <h1 class="e-intro-title">
                        Get your <span>Body Constitution</span> Action Plan
                    </h1>
                    <h2 style="font-size: 29px; text-decoration: none;"> 
                    </h2>
                </b-row>
                <b-row class="block-content"> 
                <p> 
                    Now that you have assessed your constitution, we can use that information to help you choose the right foods for your body. These foods will help you achieve and maintain a balanced state of health. 
                </p>
                </b-row> 
                <b-row class="limited-offer "><a style="color:white;text-decoration: none;!importamt;" href="/">General Food Recommendations </a></b-row>
                <b-row class="limited-offer "><a style="color:white;text-decoration: none;!importamt;" href="https://yourelementalwisdom.com">Individualized Food Plan</a></b-row>
                
                <b-row class="faq">
                    <b-row class="block-content">
                        <h2 style="text-decoration: none;">People often ask us</h2>
                        <b-row class="block-content-items">
                            <p style="width:50%"><span>What happens next?</span><br>
                                You will receive your body constitution results in your email. Please check your spam folder, just in case. There you have a choice of four plans, one FREE plan and three paid plans.
                                <br/><br/>The FREE plan includes our Handy Guide to Food Recommendations and three basic recipes that make it easy for you to add a wide variety of foods to your diet every day.
                                <br/><br/>If you order any of the individualized plans, right after you place your order we get to work! Based on the questions you answered in the quiz, we’ll craft your plan to your exact personal body constitution requirements. You will also receive helpful recipes that make it easy to add a wide range of foods to your diet. 
                            </p>
                            <p style="width:20%"><span>When do I get my plan?</span><br>
                            Since every plan is personalized and built just for you, we take our time to get it right! We will deliver your food plan to your email in no more than 24-hours.
                            </p>
                            <p style="width:20%"><span>Is this a one time payment?</span><br>
                            Yes, it is a one-time payment for your personal body constitution assessment results and individualized food plan.
                            </p>
                        </b-row>
                    </b-row>
                </b-row>
                <br>
            </b-container>
        </b-row>
    </div>
</template>
<script>
import navbar from './PlanNavbar.vue';
import modal from './PlanModal.vue';

export default {
    components: {
        navbar,
        modal
    },
    methods: {
        show_terms() {
            // this.$refs['terms_and_conditions_modal_us'].show();
            this.$bvModal.show('terms_and_conditions_modal_us');
        },
        gotoPaypal() {
            window.location = "https://www.paypal.com/us/signin"
            console.log("clicked")
        }
    },
    mounted: function () {
        let divs = document.getElementsByTagName('div');
        for (let i = 0; i < divs.length; i ++) {
            // console.log(divs[i].classList);
            divs[i].classList.remove('row');
            divs[i].classList.remove('col');
        }
    }
}
</script>
<style scoped>
.row {
    margin: auto;
    display: block;
}
@media only screen and (max-width: 900px) {
    .row {
        display: block !important;
    }
    #billing {
        padding: 0px;
    }
    .block-content {
        text-align: center;
    }
}
.per-week {
    position: relative !important;
}
.icon {
    width: 30px;
    height: 30px;
    color: rgba(68, 68, 68, 0.1);
    display: block;
    text-align: center;
    border-radius: 50%;
}
.icon.active {
    color: #ff3464;
}
.check-icon {
    color: #ff3464;
    margin-right: 10px;
}
.e-feature {
    padding: 0px;
    border: none;
}
.payment-disclaimer {
    padding: 15px 0px 15px 0px;
}

.list-group-item {
    font-size: 17px;
}
.navbar, .navbar>.container, .navbar>.container-fluid {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}
</style>