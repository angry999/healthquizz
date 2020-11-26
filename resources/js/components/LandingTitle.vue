<template>
    <div id="landing">
        <b-container class="bv-example-row">
            <img src="../../images/images/quizz-logo.png" alt="" class="regular-logo">
            <h1 class="logo-title">Get your Body Constitution Quick Assessment</h1>
            <h3>Select your gender:</h3>
            <b-row class="gender-buttons">
                <b-col>
                    <router-link to="/question">
                        <b-button class="btn-female">
                            <span class="icon"><i class="female"></i></span>
                            Start Quizz
                            <i class="forward-female forward"></i>
                        </b-button> 
                    </router-link>
                </b-col>
            </b-row>
            <b-row>
                <b-col sm="6" lg="4" class="links">
                    <a href="/"><strong>Body Constitution Quick Assessment </strong></a>
                    <a href="https://yourelementalwisdom.com">ELEMENTAL WISTOM</a>
                </b-col>
                <b-col sm="6" lg="4">
                    <img src="../../images/images/quizz-logo.png" alt="" class="footer-logo" style="opacity:30%">
                </b-col>
                <b-col sm="6" lg="4" class="copyright">
                    2020  © ALL RIGHTS RESERVED
                    <b-row class="disclaimer">Elemental Wisdom Body Constitution Quick Assessment</b-row>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<style>

h1.logo-title {
    color: #00761f;
    font-family: Lato, Montserrat;
    font-size: 40px;
    font-weight: 900;
    letter-spacing: 1.36px;
    line-height: 46px;
    margin-top: 120px;
    max-width: 400px;
}
#landing {
    background: url('../../images/images/landing-bg1b26.jpg') no-repeat;
}
.header-logo {
    max-width: 125px;
}
p {
    font-size: 12px;
}
.copyright {
    margin-top: 50px;
    text-align: center;
}
.links {
    padding: 15px;
    margin-top: 25px;
}
.footer-logo {
    max-width: 115px;
    margin: 40px auto;
}
i {
    display: inline-block;
    background: url("../../images/images/icons.png") no-repeat;
    overflow: hidden;
    text-indent: -9999px;
    text-align: left;
}
.btn-female, .btn-male {
    display: inline-block;
    max-width: 280px;
    background-color: white ;
}
.btn-secondary {
    border-color: #ffffff;
}
@media only screen and (min-width: 1000px) {
    .btn-female, .btn-male {
        display: inline-block;
        max-width: 220px;
    }
    .container {
        width: 1170px;
    }
    .row {
        width: 1170px;
    }
}
</style>