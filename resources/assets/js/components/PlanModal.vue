<template>
    <div>
        <b-modal id="cc-modal" title="Select payment method">
            <b-button id="paypal-button"></b-button>
            <b-row class="payment-loader">
                <img src="https://ketocycle.diet/images/loader.gif" alt="Processing">
            </b-row>
            <b-row class="payment-separator"><span>or</span></b-row>
            <b-row id="braintree-checkout"></b-row>
        </b-modal>
        <b-modal id="terms_and_conditions_modal_us" style="padding-right: 17px;" :hide-footer="true">
            <b-row class="b-text b-text-api" style="">
                <b-row class="b-text--intro">
                    <h2>General conditions</h2>
                </b-row>
                <b-row class="b-text--content">
                    <p><strong>General Terms and Conditions</strong></p>
                    <p><strong>1. Introduction</strong></p>
                    <p>1.1. This Agreement govern the entire relationship between you the Client and the Company.</p>
                    <p>1.2. Before the Distance contract is concluded, the Client will be provided with the text of this Agreement electronically or in other durable format. If this is not reasonably possible, the Company will indicate, before the Distance contract is concluded, in what way this Agreement is available for Client`s review at the Company`s premises and that they will be sent free of charge to the Client, as soon as possible, at the Client`s request.</p>
                    <p>1.3. THE CLIENT IS OBLIGED TO CAREFULLY READ THIS AGREEMENT BEFORE ACCEPTING IT AND USING THE SERVICES OF THE COMPANY. THE CLIENT AGREES THAT HIS/HER USE OF THE SERVICES ACKNOWLEDGES THAT THE CLIENT HAS READ THIS AGREEMENT, UNDERSTOOD IT, AND AGREED TO BE BOUND BY IT.</p>
                    <p>1.4. This Agreement contains a mandatory arbitration provision that, as further set forth in Section 17 below, requires the use of arbitration on an inb-rowidual basis to resolve disputes, rather than jury trials or any other court proceedings, or class actions of any kind.</p>
                    <p><strong>2. Definitions</strong></p>
                    <p>2.1. Some terms are defined in the introductory part of this Agreement. Unless this Agreement provide otherwise, wherever used in this Agreement, including the introductory part, the following terms when capitalized shall have the following meanings:</p>
                </b-row>
            </b-row>
            <b-row class="b-text b-text-fallback"></b-row>
        </b-modal>
        <b-modal id="privacy_policy_modal" :hide-footer="true">
            <b-row class="b-text b-text-api" style="">
                <b-row class="b-text--intro">
                    <h2>Privacy policy</h2>
                </b-row>
                <b-row class="b-text--content">
                    <p>&nbsp;</p>
                    <p><span style="font-weight: 400;">In this privacy policy we, Kilo Group Ltd., company code 303157579, with our registered office at Ramybės St. 4-70, Vilnius, the Republic of Lithuania (“Company”, “we”, “us” or “our”), explain how we handle your personal data when you visit our website, use our apps, contact us through our official social media pages or email, and/or use our services.</span></p>
                    <p><span style="font-weight: 400;">We will ask you to consent to our use of cookies in accordance with the terms of this notice when you first visit our website. </span></p>
                    <p><span style="font-weight: 400;">In this notice you will find the answers to the following questions:</span></p>
                    <p><span style="font-weight: 400;">(a)</span> <span style="font-weight: 400;">how we use your data;</span></p>
                    <p><span style="font-weight: 400;">(b)</span> <span style="font-weight: 400;">when we provide your data to others;</span></p>
                    <p><span style="font-weight: 400;">(c)</span> <span style="font-weight: 400;">how long we store your data;</span></p>
                    <p><span style="font-weight: 400;">(d)</span> <span style="font-weight: 400;">what is our marketing policy;</span></p>
                    <p><span style="font-weight: 400;">(e)</span> <span style="font-weight: 400;">what rights related to personal data you possess;</span></p>
                    <p><span style="font-weight: 400;">(f)</span> <span style="font-weight: 400;">how we use cookies;</span></p>
                    <p><span style="font-weight: 400;">(g)</span> <span style="font-weight: 400;">other issues that you should take into account.</span></p>
                </b-row>
            </b-row>
        </b-modal>
    </div>
</template>
<script>
export default {
    data() {
        return {

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
    margin: 0;
}
</style>