
<style>
#loaderss{
 border: 16px solid #f3f3f3;
   border-radius: 50%;
   border-top: 16px solid blue;
  
   border-bottom: 16px solid blue;
   
   width: 90px;
   height: 90px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  position: absolute;
  z-index: 99;
  display: none;
  margin-left: 40%;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.container.margin {
    margin-top: 90%;
}
@charset "utf-8";

/*
        Resets
*/

body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, form, fieldset, input, textarea, p, blockquote, th, td { margin:0; padding:0 }
table { border-collapse:collapse; border-spacing:0 }
fieldset, img { border:0 }
address, caption, cite, code, dfn, em, strong, th, var { font-style:normal; font-weight:normal }
ol, ul { list-style:none }
caption, th { text-align:left }
q:before, q:after { content:'' }
abbr, acronym { border:0 }
:focus { outline:0 }
ins { text-decoration:none }
del { text-decoration:line-through }
.clear { clear: both; }

/*
        body Structure
*/
html,body {
    height: 100%;
}
body {
    background: #fff;
    font-family: 'Poppins', sans-serif;
    font-size:15px;
    font-weight:400;
    color: #222;
    overflow-x: hidden !important;
}
/*
        Typography
*/
div, p, a, li, td { -webkit-text-size-adjust:none; }
html, html a {
    -webkit-font-smoothing: antialiased !important;
}
h1,h2,h3,h4,h5,h6 {
    /*font-family: 'Prata', serif;*/
    font-family: 'Poppins', sans-serif;
    margin: 0 0 15px 0;
    line-height: normal !important;
}
h1 {
    font-size: 54px;
    font-weight:400;
}
h1 span,h2 span,h3 span,h4 span,h5 span,h6 span {
    color: #2e3192;
}
h2 {
    font-size:40px;
    font-weight:400;
}
h3 {
    font-size:26px;
    font-weight:400;
}
h4 {
    font-size:22px;
    font-weight:400;
}
h5 {
    font-size:18px;
    font-weight:300;
}
h6 {
    font-size:16px;
    font-weight:300;
}
p {
    font-family: 'Poppins', sans-serif;
    font-size:15px;
    font-weight:400;
    margin: 0 0 15px 0;
}
p span, p strong {
    font-weight:800;
}
img {
    border:none;
    max-width:100%;
}
a {
    text-decoration: none;
    color:#000;
}
a:hover,a:focus,a:active {
    text-decoration: underline;
    outline: none;
    color: #000;
}
button:hover,
button:focus,
button:active,
button:target {
    outline: none !important;
}
.fancybox-custom .fancybox-skin {
    box-shadow: 0 0 50px #FFEA3A;
}
/*navigationBar*/
.navigationBar {
    display: block;
    width: auto;
    position: relative;
    top: 0;
    left: 0;
    right: 0;
    z-index: 20;
    padding: 0;
    height: auto;
    background: url('../images/bg2.png') repeat;
}

@media (min-width: 768px) {
    .navigationBar > .topHeader .container,
    .innerPageSection > .container,
    .categoryInner > .container,
    .categoryMainSection > .container,
    .container {
        width: auto;
        padding-left: 100px;
        padding-right: 100px;
    }    
}

.logo {
    display: inline-block;
    margin: 0 0 8px 0;
}
.logo img {
    height: 86px;
    width: auto;
}
.topHeader {
    display: block;
    padding: 15px 0;
    position: relative;
    z-index: 11;
    height: auto;
}
.containerWrapper {
    display: block;
    width: auto;
    padding: 0 100px;
    position: relative;
    z-index: 10;
}
.navigationBar .containerWrapper {
    z-index: 0;
}
.searchbox {
    display: block;
    width: 100%;
    float: left;
    margin: 9px 0 0 0;
    position: relative;
}
.searchbox input[type="text"] {
    display: block;
    width: 100%;
    height: 50px;
    padding: 0 10px;
    border: none;
    font-size: 16px;
    border-radius: 40px;
    text-indent: 20px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.2);
}
.searchbox button {
    display: block;
    width: 46px;
    height: 46px;
    line-height: 46px;
    position: absolute;
    border: none;
    background: #2e3192;
    color: #fff;
    top: 2px;
    bottom: 2px;
    right: 2px;
    font-size: 20px;
    border-radius: 40px;
    transition: all 300ms ease;
    -o-transition: all 300ms ease;
    -moz-transition: all 300ms ease;
    -webkit-transition: all 300ms ease;
    -ms-transition: all 300ms ease;
}
.searchbox button:hover {
    background: #FFEA3A;
    color: #2e3192;
}
/*navigTop*/
.navigTop {
    display: block;
    margin: -10px 0 0 0;
}
.navigTop p {
    font-size: 12px;
    color: #777;
}
.navigTop p span {
    padding: 0 10px;
    color: #999;
    font-weight: normal;
}
/*mycartContainer*/
.mycartContainer {
    float: right;
    display: block;
}
/*myAccount*/
.myAccount {
    float: left;
    color: #2e3192;
    /*margin: 12px 30px 0 0;*/
    margin: 12px 0 0 0;
}
.myAccount a {
    display: inline-block;
    color: inherit;
}
/*new add code dashboard */
/* MyAccount */
.MyAccountWrapper{
    margin-top: 120px;
}
.MyAccount {
    padding: 50px 0px;
}
.MyAccount .Account-heading {
    font-weight: 800;
    border-bottom: solid 1px #ccc;
    padding: 0px 0 10px 0;
    margin-bottom: 40px;
}
.MyAccount .MyAccountList li {
    position: relative;
    width: 100%;
    border-bottom: solid 1px #ccc;
}
.MyAccount .MyAccountList li a {
    padding: 15px;
}
.MyAccount .MyAccountList li a, .MyAccount .nav-tabs>li.active>a, .MyAccount .nav-tabs>li.active>a:hover, .MyAccount .nav-tabs>li.active>a:focus {
    border: none;
    margin: 0;
}
.MyAccount .MyAccountList li i {
    position: absolute;
    right: 0;
    top: 18px;
    right: 10px;
}
.AccountBoxWrapper {
    padding: 0 50px;
}
.AccountBoxWrapper .AccountBox {
    padding: 20px 30px 20px 80px;
    border: solid 1px #ccc;
    margin-bottom: 30px;
    position: relative;
    width: 100%;
    display: block;
}
.AccountBoxWrapper .AccountBox span {
    position: absolute;
    left: 12px;
    top: 15px;
}
.AccountBoxWrapper a.Account-Link {
    display: block;
}
.AccountBoxWrapper .AccountBox span img {
    width: 55px;
    height: 55px;
}
.AccountBoxWrapper .AccountBox p {
    font-weight: 600;
    margin-bottom: 0;
}
.AccountBoxWrapper .AccountBox:after {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    bottom: 0;
    background: #333;
    transition: .3s all;
    width: 0;
    z-index: -1;
}
.AccountBoxWrapper .AccountBox:hover p, .AccountBoxWrapper .AccountBox:hover span {
    color: #fff;
}
.AccountBoxWrapper .AccountBox:hover:after {
    width: 100%;
}
.AccountBoxWrapper .AccountBox .text-desc {
    position: static;
}
.language{
    position: relative;
    border: none;
    background: transparent;
    padding: 12px 0px 15px 0px;
}

/*drop down menu*/
.navbar-collapse > select > option {
    display: block;
    width: 180px;
    height: auto;
    position: absolute;
    top: 50px;
    /*top: 87px;*/
    left: 20px;
    margin: 0;
    background: #fff;
    visibility: hidden;
    opacity: 0;
    z-index: 5;
    text-align: left;
    box-shadow: 0 6px 30px rgba(0,0,0,0.15);
    transition: all 300ms ease-in-out;
}
.myAccount .nav > li > a {
    position: relative;
    display: block;
    padding: 10px 6px;
    font-size: 13px;
    transition: none;
}
.myAccount .nav > li > a:hover {
    background: transparent;
    color: #999;
}
/*selectLabel*/
.selectLabel {
    display: inline-block;
    margin: 8px 3px 0 0;
    font-weight: normal;
    position: relative;
    /*border: solid 1px #ddd;
    background: #fff;*/
    z-index: 2;
}
.selectLabel:hover {
    box-shadow: 0 0px 3px rgba(0,0,0,0.1);
}
.selectLabel > i {
    position: absolute;
    top: 4px;
    right: 10px;
    color: #222;
    font-size: 16px;
    z-index: -1;
}
.selectLabel > select {
    -webkit-appearance: none;
    -moz-appearance: none;
    -o-appearance: none;
    -ms-appearance: none;
    outline: none;
    cursor: pointer;
    height: 25px;
    background: transparent;
    padding: 0 8px;
    border: none;
    font-size: 13px;
}

/* End MyAccount */
/* */
/*mycartbox*/
.mycartbox {
    display: inline-block;
    float: right;
    margin: 8px 0 0 20px;
    height: 50px;
    line-height: 50px;
    border: none;
    border-radius: 30px;
    background: #FFEA3A;
    color: #2e3192;
    padding: 0 15px;
    font-size: 15px;
    position: relative;
    cursor: pointer;
    box-shadow: 0 5px 30px rgba(0,0,0,0.2);
    /*background: #FFEA3A;*/
}
.mycartbox:hover {
    background: #2e3192;
    color: #fff;
    border-color: transparent;
}
.mycartbox i {
    padding: 0 3px;
}
.mycartbox .fa-angle-down {
    position: relative;
    top: 2px;
    font-size: 20px;
}
.mycartbox .fa-shopping-cart {
    color: #2e3192;
    font-size: 20px;
}
.mycartbox:hover .fa-shopping-cart {
    color: #fff;
}
.mycartbox .mycarthead {
    position: relative;
}
.mycartbox .mycarthead .list-group p {
    margin-top: 10px;
}
.mycarthead > span {
    display: block;
    position: absolute;
    top: -6px;
    right: -12px;
    border-radius: 100%;
    background: #2e3192;
    color: #fff;
    width: 20px;
    height: 20px;
    line-height: 20px;
    text-align: center;
    font-size: 12px;
}
.mycartbox:hover .mycarthead > span {
    background: #FFEA3A;
    color: #2e3192;
}
.mycarthead > ul {
    display: none;
    position: absolute;
    top: 40px;
    right: -15px;
    margin: 0;
    width: 400px;
    padding: 15px;
    border-radius: 5px;
    background: #fff;
    box-shadow: 0 3px 6px rgba(0,0,0,0.3);
    color: #222;
    border-top: solid 1px #ddd;
    cursor: default;
}
.empty-cartmsg {
    display: block;
    line-height: normal;
    text-align: center;
}
.empty-cartmsg a {
    display: inline-block;
    margin: 5px 0;
    color: #2e3192;
    font-weight: 600;
    /*padding: 4px 15px;
    border: solid 1px #2e3192;
    border-radius: 40px;*/
}
.empty-cartmsg a:hover {
    text-decoration: none;
    color: #2e3192;
}
.mycartbox:hover .mycarthead > ul {
    display: block;
}
.mycartbox .mycarthead table {
    display: block;
    font-size: 12px;
    width: 100%;
    margin-bottom: 10px;
    text-align: left;
}
.mycartbox .mycarthead table tr:after {
    content: '';
    clear: both;
    display: block;
}
.mycartbox .mycarthead table thead,
.mycartbox .mycarthead table tr,
.mycartbox .mycarthead table thead tr th,
.mycartbox .mycarthead table tbody,
.mycartbox .mycarthead table tr td {
    display: block;
}
.mycartbox .mycarthead table thead tr th {
    text-align: center;
}
.mycartbox .mycarthead table thead tr th,
.mycartbox .mycarthead table tr td {
    float: left;
}
.mycartbox .mycarthead table thead tr th:nth-of-type(1),
.mycartbox .mycarthead table tr td:nth-of-type(1) {
    width: 60%;
}
.mycartbox .mycarthead table thead tr th:nth-of-type(2),
.mycartbox .mycarthead table tr td:nth-of-type(2) {
    width: 20%;
    text-align: center;
}
.mycartbox .mycarthead table thead tr th:nth-of-type(3),
.mycartbox .mycarthead table tr td:nth-of-type(3) {
    width: 20%;
    text-align: center;
}
.mycartbox .mycarthead table tr {
    border-bottom: solid 1px #ddd
}
.mycartbox .mycarthead table tr td {
    padding: 5px;
}
.mycartbox .mycarthead table th {
    font-weight: 500;
    font-size: 11px;
    padding: 4px 0;
}

/*navigationBarContent*/
.navigationBarContent {
    position: relative;
    height: auto;
    clear: both;
    width: 100%;
    background: #2e3192;
}
.navbar {
    min-height: 40px;
}
.navbar-nav {
    margin-top: 0;
    float: none;
    text-align: center;
}
.navbar-collapse {
    float: none;
    clear: both;
    text-align: center;
    padding-right: 0;
}
.navbar-default {
    background: transparent;
    border: none;
    margin: 0;
}
/*navbar-collapse*/
.navbar-collapse > ul > li {
    margin: 0;
    color: #fff;
    height: 50px;
    padding: 0;
    position: relative;
    float: left;
    display: inline-block;
    transition: all 300ms;
}
.navbar-collapse > ul > li:first-child {
    position: static;
}
.navbar-collapse > ul > li > a {
    display: block;
    color: inherit !important;
    padding: 0 10px;
    margin: 0 0;
    height: 50px;
    line-height: 50px;
    font-size: 14px;
    letter-spacing: 0;
    font-weight: normal;
    text-transform: capitalize;
    transition: all 300ms;
    border-right: solid 1px rgba(255,255,255,0.1);
}
.navbar-collapse > ul > li:last-child > a {
    border: none;
}
.navbar-collapse > ul > li:before {
    content: '';
    display: none;
    position: absolute;
    top: 10px;
    left: 0;
    right: 0;
    height: 5px;
    background: #2e3192;
    transition: all 300ms;
    visibility: hidden;
    opacity: 0;
}
.navbar-collapse > ul > li:hover:before,
.navbar-collapse > ul > li.active:before {
    top: 0;
    visibility: visible;
    opacity: 1;
}
.navbar-collapse > ul > li:hover > a,
.navbar-collapse > ul > li.active > a {
    /*background: #2e3192 !important;
    color: #fff !important;*/
    background: #FFEA3A !important;
    color: #2e3192 !important;
}
.navbar-collapse.in {
    overflow-y: initial !important;
}
/*drop down menu*/
.navbar-collapse > ul > li > ul {
    display: none;
    min-width: 100%;
    width: 250px;
    height: auto;
    position: absolute;
    top: 50px;
    left: 0;
    right: 0;
    margin: 0;
    background: #fff;
    z-index: 5;
    text-align: left;
    box-shadow: 0 6px 30px rgba(0,0,0,0.15);
}
.navbar-collapse > ul > li:first-child > ul {
    width: auto;
    max-height: 400px;
    padding: 15px;
    overflow: auto;
}
.navbar-collapse > ul > li:hover > ul {
    left: 0;
    display: block;
}
.navbar-collapse > ul > li > ul > li {
    display: block;
    font-size: inherit;
    position: relative;
}
.navbar-collapse > ul > li:first-child > ul > li {
    width: 25%;
    float: left;
    margin-bottom: 20px;
}
.navbar-collapse > ul > li > ul > li > a {
    display: block;
    padding: 5px 15px;
    font-size: 13px;
    color: #222;
    border-bottom: solid 1px #ccc;
    margin: 0 0 0 0;
}
.navbar-collapse > ul > li:first-child > ul > li > a {
    margin: 0 30px 0 0;
    font-weight: bold;
    font-size: 15px;
}
.navbar-collapse > ul > li > ul > li:hover {
    background: #FFEA3A;
}
.navbar-collapse > ul > li:first-child > ul > li:hover {
    background: transparent;
}
.navbar-collapse > ul > li > ul > li:hover > a {
    color: #2e3192;
    text-decoration: none;
}
.navbar-collapse > ul > li > ul > li > span.separator {
    display: block;
    padding: 5px 0;
    text-transform: uppercase;
    text-align: center;
}
.navbar-collapse > ul > li > ul > li:hover > span.separator {
    color: #2e3192;
}
.navbar-collapse > ul > li > ul > li > a > .fa-angle-right {
    display: inline-block;
    float: right;
    position: relative;
    top: 5px;
}
/*double dropdown*/
.navbar-collapse > ul > li > ul > li > ul {
    display: none;
    width: 100%;
    height: auto;
    position: absolute;
    left: 100%;
    top: 0;
    background: #fff;
    box-shadow: -10px 6px 30px rgba(0,0,0,0.25);
}
.navbar-collapse > ul > li:first-child > ul > li > ul {
    display: block;
    position: relative;
    width: auto;
    left: auto;
    box-shadow: none;
    margin-left: 30px;
}
.navbar-collapse > ul > li > ul > li:hover > ul {
    display: block;
}
.navbar-collapse > ul > li > ul > li > ul > li {
    border-bottom: solid 1px #ddd;
    font-size: 13px;
    position: relative;
    list-style-type: none;
}
.navbar-collapse > ul > li:first-child > ul > li > ul > li {
    list-style-type: disc !important;
    color: #2e3192;
    /*margin-bottom: 20px;*/
	margin-bottom: 0px;
    border-bottom: none;
}
.navbar-collapse > ul > li > ul > li > ul > li > a {
    display: block;
    padding: 5px 15px;
    color: #222;
    font-size: inherit;
}
.navbar-collapse > ul > li:first-child > ul > li > ul > li > a {
    padding-left: 0;
    padding-right: 0;
}
.navbar-collapse > ul > li > ul > li> ul > li:hover {
    background: #FFEA3A;
}
.navbar-collapse > ul > li:first-child > ul > li > ul > li:hover {
    background: transparent;
}
.navbar-collapse > ul > li > ul > li> ul > li:hover > a {
    color: #2e3192;
    text-decoration: none;
}
.navbar-collapse > ul > li:first-child > ul > li > ul > li:hover > a {
    font-weight: bold;
}
/*4th level dropdown*/
.navbar-collapse > ul > li:first-child > ul > li > ul > li > ul {
    margin: 0 0 0 15px;
}

/*sellwithUsBtn*/
.sellwithUsTopBtn > a {
    display: inline-block;
    font-size: 13px;
    padding: 4px 15px;
    border: solid 1px #2e3192;
    color: #2e3192;
    border-radius: 20px;
}
.sellwithUsTopBtn > a:hover {
    background: #2e3192;
    color: #fff;
    border-color: transparent;
    text-decoration: none;
}

/*.navbar-collapse > ul > li.sellwithUsBtn {
    color: #2e3192;
}
.navbar-collapse > ul > li.sellwithUsBtn:before {
    top: 5px;
    bottom: 5px;
    visibility: visible;
    opacity: 1;
    background: transparent;
    border: solid 2px #fff;
    background: #FFEA3A;
    height: auto;
    border-radius: 30px;
}
.navbar-collapse > ul > li.sellwithUsBtn > a {
    letter-spacing: 1px;
    padding-left: 15px;
    padding-right: 15px;
}
.navbar-collapse > ul > li.sellwithUsBtn:hover:before {
    opacity: 0;
}*/

.navigationBarFixed .topHeader {
    display: none;
}
.navigationBarFixed .navigationBarContent {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
}

/*bannerSection*/
.bannerSection {
    display: block;
    width: 100%;
    height: 500px;
    overflow: hidden;
    position: relative;
    background: transparent;
}
.bannerContainer {
    display: block;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
}
/*bannerSlider*/
.bannerSlider {
    width: 100%;
    height: 100%;
    position: relative;
    text-align: center;
}
.bannerSlider .owl-wrapper-outer,
.bannerSlider .owl-wrapper,
.bannerSlider .owl-item,
.bannerSlider .item {
    height: 100%;
}
.bannerSlider .item .replaceImg {
    display: block;
    width: 100%;
    height: 100%;
    background-size: cover !important;
}
.bannerSlider .item .bannerCaption {
    display: block;
    position: absolute;
    bottom: 0;
    left: 10px;
    right: 10px;
    text-align: center;
    z-index: 10;
}
.bannerSlider .item .bannerCaption h2 {
    display: inline-block;
    padding: 20px 30px;
    background: rgba(255,255,255,1);
    color: #000;
    margin: 0;
    box-shadow: 0 -10px 80px rgba(0,0,0,0.2);
}
#banner-slider .owl-controls {
    position: absolute !important;
    bottom: 40% !important;
    width: 20px !important;
    right: 2%;
    z-index: 10;
}
#banner-slider .owl-controls .owl-page span {
    width: 20px !important;
    height: 20px !important;
    margin: 3px !important;
}
.owl-theme .owl-controls .owl-page span {
    background: #2e3192 !important;
}
#banner-slider .owl-buttons {
    display: none !important;
}
.bannerSlider .item {
    position: relative;
}

/*down-arrow-box*/
.down-arrow-box {
    display: block;
    position: absolute;
    bottom: 30px;
    color: #fff;
    font-style: italic;
    width: 200px;
    margin: 0 auto;
    left: 0%;
    right: 0%;
    text-transform: uppercase;
    z-index: 25;
    text-align: center;
}
.down-arrow-box strong {
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 0;
    position: relative;
    top: -10px;
    text-shadow: 0 2px 10px rgba(0,0,0,0.5);
}
.down-arrow-box a {
    display: block;
    clear: both;
    position: relative;
    top: 0;
    width: 60px;
    height: 60px;
    line-height: 60px;
    margin: 0 auto;    
    z-index: 2;
    border-radius: 100%;
}
.down-arrow-box span {
    display: inline-block;
    position: relative;
    font-size: 46px;
    color: #fff;
    width: inherit;
    height: inherit;
    line-height: inherit;
    text-align: center;
    top: 0;
    transition: all 300ms;
}
.down-arrow-box a:hover span {
    color: #fff;
}
.down-arrow-box a:before {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background: #2e3192;
    opacity: 0.7;
    z-index: -2;
    animation: downarrowBubbles 1.2s ease-in-out infinite;
    -webkit-animation: downarrowBubbles 1.2s ease-in-out infinite;
    -moz-animation: downarrowBubbles 1.2s ease-in-out infinite;
    -o-animation: downarrowBubbles 1.2s ease-in-out infinite;
    -ms-animation: downarrowBubbles 1.2s ease-in-out infinite;
}
.down-arrow-box a:after {
    background: #2e3192;
    /*background: rgba(255,255,255,1);*/
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    border-radius: 100%;
    z-index: -1;
}

@-keyframes downarrowBubbles {
    0% {
        transform: scale(1);
    }
    75% {
        transform: scale(2);
    }
    100% {
        opacity: 0;
        transform: scale(2);
    }
}

@-webkit-keyframes downarrowBubbles {
    0% {
        transform: scale(1);
    }
    75% {
        transform: scale(2);
    }
    100% {
        opacity: 0;
        transform: scale(2);
    }
}

@-o-keyframes downarrowBubbles {
    0% {
        transform: scale(1);
    }
    75% {
        transform: scale(2);
    }
    100% {
        opacity: 0;
        transform: scale(2);
    }
}

@-moz-keyframes downarrowBubbles {
    0% {
        transform: scale(1);
    }
    75% {
        transform: scale(2);
    }
    100% {
        opacity: 0;
        transform: scale(2);
    }
}

@-ms-keyframes downarrowBubbles {
    0% {
        transform: scale(1);
    }
    75% {
        transform: scale(2);
    }
    100% {
        opacity: 0;
        transform: scale(2);
    }
}

/*productColSection*/
.productColSection {
    display: block;
    clear: both;
    width: 100%;
    height: auto;
    position: relative;
    overflow: hidden;
    padding: 70px 0;
}
.productColSection:before {
    content: '';
    display: none;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #fff;
    opacity: 0.7;
}
/*featProductBlock*/
.featProductBlock {
    display: block;
    position: relative;
    overflow: hidden;
    height: 320px;
    box-shadow: 0 3px 20px rgba(0,0,0,0.2);
}
.featProductBlock:before {
    content: '';
    display: block;
    position: absolute;
    width: 75%;
    height: 100%;
    top: 0;
    left: -17%;
    /*background: #2e3192;*/
    background: #FFEA3A;
    /*border-right: solid 50px rgba(255,255,255,0.1);*/
    transform: skew(-25deg);
    transition: all 500ms;
    z-index: 2;
}
.featProductBlock:hover:before {
    transform: skew(-20deg);
}
.featProductBlock img {
    float: right;
    position: absolute;
    bottom: 0;
    right: 0;
    z-index: 1;
    width: auto;
    max-width: none;
    height: 100%;
}
.featProductBlockInner {
    display: block;
    padding: 50px;
    width: 60%;
    color: #2e3192;
    z-index: 3;
    position: relative;
}
.featProductBlockInner h3 {
    display: block;
    text-transform: uppercase;
    font-size: 32px;
    /*height: 60px;*/
    font-weight: 400;
    line-height: 32px !important;
}
.productCol .row {
    margin-left: -6px;
    margin-right: -6px;
}
.sidebarcat {
    display: block;
}
.sidebarcat h4.heading-center {
    display: block;
    padding-left: 15px;
    font-size: 20px;
    margin-bottom: 20px;
}
.sidebarcat h4.heading-center span {
    padding: 5px 10px !important;
    background: #f3f3f3;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
.sidebarcat h4.heading-center:after {
    top: 50%;
}
.sidebarcat > ul {
    display: block;
    margin: 0 0 30px 35px;
}
.sidebarcat > ul > li {
    list-style-type: circle;
    color: #2e3192;
    margin-bottom: 5px;
}
.sidebarcat > ul > li > a {
    color: #222;
    font-size: 14px;
}
.sidebarcat > ul > li > a:hover {
    color: #2e3192;
    text-decoration: none;
}
.featColRow {
    margin-left: -6px;
    margin-right: -6px;
}
.productCol .row .col-sm-4,
.productCol .row .col-sm-3,
.featCol {
    padding-left: 6px;
    padding-right: 6px;
}
.productCol .row .col-sm-3 {
    width: 16.66666666666667%;
}
/*productBlock*/
.productBlock {
    display: block;
    position: relative;
    margin-bottom: 12px;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: all 400ms;
    background: #fff;
}
.productBlock:hover {
    box-shadow: 0 10px 50px rgba(0,0,0,0.15);
}
.productBlock .productBlockImg {
    display: block;
    width: 100%;
    height: 200px;
    overflow: hidden;
    position: relative;
    margin: 0;
}
.productBlock .productBlockImg > div {
    display: block;
    width: 100%;
    height: 100%;
    position: relative;
    background-size: contain !important;
    background-position: center !important;
    transition: all 400ms;
    transform: scale(1);
}
.productBlock:hover .productBlockImg > div {
    transform: scale(1.3);
    opacity: 0.5;
}
.productBlock .productBlockInfo {
    display: block;
    position: relative;
    padding: 15px;
    z-index: 10;
    text-align: center;
}
.productBlock .productBlockInfo > a.titlelink {
    display: block;
    height: 50px;
    overflow: hidden;
}
.productBlock span.discountoffer {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    color: #2E3192;
    padding: 6px 15px;
    font-weight: bold;
}
.productBlock span.discountoffer:before {
    content: '';
    display: block;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: #FFEA3A;
    z-index: -1;
    transform: skew(20deg);
    box-shadow: 0 8px 15px rgba(0,0,0,0.3);
}
.productBlockInfo .productInfoMsgAlert {
    display: block;
}
.productBlockInfo div.productInfoMsgAlert > span {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 15px;
    z-index: 2;
    /*background: #FFEA3A;*/
    background: #fff;
    box-shadow: 0 -10px 20px rgba(0,0,0,0.2);
}
/*loaderWrapperAjax*/
.loaderWrapperAjax {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 30px 0;
}
.productBlockInfo div.productInfoMsgAlert > span.addtoWishMsg {
    color: #03B15A !important;
}
.productBlockInfo div.productInfoMsgAlert > span.addtoWishMsgFiled {
    color: red !important;
}
.productBlockInfo div.productInfoMsgAlert > span.addtoWishMsgLogin {
    color: #2E3192 !important;
}
.productBlock .productBlockInfo .protitle {
    font-size: 15px;
    font-family: 'Poppins', sans-serif;
    margin-bottom: 10px;
    height: 30px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.productBlock .productBlockInfo .proRating {
    display: block;
    margin: 0 0 15px 0;
}
.productBlock .productBlockInfo .proRating li {
    display: inline-block;
    font-size: 14px;
    color: #2e3192;
}
.productBlock .productBlockInfo .propricing {
    margin-bottom: 10px;
    font-family: 'Poppins', sans-serif;
    font-size: 20px;
    color: #2e3192;
}
.productBlock .productBlockInfo p {
    height: 64px;
    overflow: hidden;
}
.productBlock .productBlockInfo .wishlist-btn {
    display: inline-block;
    margin: 0 0 10px 0;
    background: transparent;
}
.productBlock .productBlockViewDtl {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: initial;
    text-align: center;
    z-index: initial;
    /*background: rgba(255,255,255,0.5);*/
    background: transparent;
    padding: 20% 0;
    transition: all 400ms;
    visibility: hidden;
    opacity: 0;
}
#relatedProductsSlider .productBlock .productBlockViewDtl,
.productBlockCat .productBlockViewDtl {
    /*z-index: 10 !important;*/
}
.productBlockCat .wishlist-btn {
    margin-top: 8px !important;
}
.productBlock:hover .productBlockViewDtl {
    visibility: visible;
    opacity: 1;
}
.productBlock .productBlockViewDtl a {
    display: block;
    margin: 10px 5px;
    text-transform: uppercase;
    font-size: 15px;
    font-weight: 500;
    padding: 8px 20px;
    transition: all 400ms;
    position: relative;
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
}
.productBlock .productBlockViewDtl a.btn1 {
    background: #FFEA3A;
    color: #2e3192;
    top: -100px;
    transition: all 500ms;
}
.productBlock .productBlockViewDtl a.btn2 {
    background: #2e3192;
    color: #fff;
    top: 100px;
    transition: all 700ms;
}
.productBlock .productBlockViewDtl a:hover {
    background: #222;
    color: #fff;
    text-decoration: none;
}
.productBlock:hover .productBlockViewDtl a {
    top: 0;
}
/*parallaxSection1*/
.parallaxSection1 {
    display: block;
    clear: both;
    width: 100%;
    height: auto;
    padding: 70px 0;
    position: relative;
    overflow: hidden;
    background: url('../images/parallaxSection1.jpg') no-repeat fixed 100% 0;
    background-size: cover;
    backface-visibility: hidden;
    /*color: #fff;*/
}
.parallaxSection1:before {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    /*background: #2e3192;*/
    background: #fff;
    opacity: 0.7;
}
.parallaxSection1 h2,.parallaxSection1 h4 {
    margin: 0 0 20px 0;
}
.parallaxSection1 a.btn {
    margin-top: 10px;
    padding: 10px 30px;
    font-size: 16px;
    background: transparent;
    color: #fff;
    font-weight: 500;
    border: solid 1px #fff;
    transition: all 400ms;
}
.parallaxSection1 a.btn:hover {
    background: #fff;
    color: #000;
}

/*innerPageSection*/
.innerPageSection {
    display: block;
    position: relative;
    clear: both;
    width: 100%;
    height: auto;
    padding: 0;
    min-height: 400px;
    margin-bottom: 100px;
}
.relatedProductsSection {
    display: block;
    padding-bottom: 60px;
}
.innerPageSection #remove-row {
    display: block;
    clear: both;
    text-align: center;
    padding: 15px 0;
}
.innerPageSection #remove-row button#btn-more {
    display: inline-block;
    padding: 10px 30px;
    background: #2e3192;
    color: #fff;
    font-size: 18px;
    border: none;
    border-radius: 20px;
    width: auto;
    text-align: center;
}
.innerPageSection #remove-row button#btn-more:hover {
    background: #FFEA3A;
    color: #2e3192;
}
.modal-body {
    max-height: 400px;
    overflow: auto;
}
/*breadcrumbs*/
.breadcrumbs {
    display: block;
    border-bottom: solid 1px #eee;
    padding: 10px 0;
    margin-bottom: 15px;
}
.breadcrumbs ul,.breadcrumbs ul li {
    display: inline-block;
}
.breadcrumbs ul li,
.breadcrumbs ul li > i {
    color: #aeaeae;
}
.breadcrumbs ul li i {
    padding: 0 10px;
    font-size: 18px;
    position: relative;
    top: 2px;
}
.breadcrumbs ul li a {
    color: #000;
}
.breadcrumbs ul li a:hover {
    color: #2e3192;
}
/*sidebar-list*/
.sidebar-list {
    display: block;
    width: 100%;
    height: auto;
}
.sidebar-list-content {
    display: block;
    padding: 0 15px;
    min-height: 300px;
}
.sidebar-list-content h3 {
    font-size: 20px;
    margin-top: 0;
    border-bottom: solid 1px #eee;
    padding-bottom: 5px;
}
/*sidebar-filter-box*/
.sidebar-filter-box {
    display: block;
}
.inner-sidebar-list {
    display: block;
    padding: 15px;
    background: #fff;
    border: solid 1px rgba(221, 221, 221, 0.51);
}
.sidebar-filter-box > div {
    display: none;
    padding: 3px 0;
}
.sidebar-heading {
    color: #555;
    font-size: 16px;
    font-weight: normal;
    padding: 5px 10px;
    background: #F7F7F7;
    border: 1px solid #E6E6E6;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
    margin-bottom: 5px;
    background: #fff;
}
.sidebar-heading i {
    font-size: 14px;
    padding-right: 5px;
}
.sidebarNew {
    margin-bottom: 30px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.1);
}
.sidebarNew .leftBlockHeading {
    display: block;
    border-bottom: solid 1px #ddd;
    padding-bottom: 10px;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}
.sidebarNew .leftmenuList {
    display: block;
}
.sidebarNew .leftmenuList > ul {
    display: block;
    margin: 0 0 0 15px;
}
.sidebarNew .leftmenuList > ul > li {
    list-style-type: square;
    margin-bottom: 0;
    padding: 10px;
    border-bottom: solid 1px #ddd;
}
.sidebarNew .leftmenuList > ul > li > a {
    color: #000;
}
.sidebarNew .leftmenuList > ul > li > a:hover {
    color: #2e3192;
}
/* checkbox-radio-style1 */
.checkbox-radio-style1 {
    display: block;
    padding: 0 15px;
}
.checkbox-radio-style1 [type="checkbox"]:not(:checked),
.checkbox-radio-style1 [type="checkbox"]:checked {
    position: absolute;
    left: -9999px;
}
.checkbox-radio-style1 [type="checkbox"]:not(:checked) + label,
.checkbox-radio-style1 [type="checkbox"]:checked + label {
    display: block;
    position: relative;
    padding-left: 25px;
    cursor: pointer;
}
/* checkbox aspect */
.checkbox-radio-style1 [type="checkbox"]:not(:checked) + label:before,
.checkbox-radio-style1 [type="checkbox"]:checked + label:before {
    content: '';
    position: absolute;
    left:0; top: 0;
    width: 20px; height: 20px;
    border: 1px solid #eee;
    background: #f8f8f8;
    box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
}
/* checked mark aspect */
.checkbox-radio-style1 [type="checkbox"]:not(:checked) + label:after,
.checkbox-radio-style1 [type="checkbox"]:checked + label:after {
    content: '✔';
    position: absolute;
    top: 5px; left: 5px;
    font-size: 14px;
    line-height: 0.8;
    color: #2e3192;
    transition: all .2s;
}
/* checked mark aspect changes */
.checkbox-radio-style1 [type="checkbox"]:not(:checked) + label:after {
    opacity: 0;
    transform: scale(0);
}
.checkbox-radio-style1 [type="checkbox"]:checked + label:after {
    opacity: 1;
    transform: scale(1);
}
/* disabled checkbox */
.checkbox-radio-style1 [type="checkbox"]:disabled:not(:checked) + label:before,
.checkbox-radio-style1 [type="checkbox"]:disabled:checked + label:before {
    box-shadow: none;
    border-color: #eee;
    background-color: #ddd;
}
.checkbox-radio-style1 [type="checkbox"]:disabled:checked + label:after {
    color: #999;
}
.checkbox-radio-style1 [type="checkbox"]:disabled + label {
    color: #aaa;
}
/* accessibility */
.checkbox-radio-style1 [type="checkbox"]:checked:focus + label:before,
.checkbox-radio-style1 [type="checkbox"]:not(:checked):focus + label:before {
    border: 1px dotted #eee;
}
/* hover style just for information */
.checkbox-radio-style1 label:hover:before {
    border: 1px solid #ddd!important;
}
.checkbox-radio-style1 label {
    font-weight: 400;
}
/*item-list-tophead*/
.item-list-tophead {
    display: block;
    border-bottom: solid 1px #eee;
    margin-bottom: 15px;
}
.item-list-tophead:after {
    content: "";
    display: block;
    clear:both;
}
.item-list-tophead h4 {
    margin: 0;
    height: 36px;
    font-weight: 500;
    line-height: 36px !important;
    float: left;
}
.item-list-tophead h4 span {
    color: #999;
    font-size: 16px;
    font-weight: 400;
}
.item-list-tophead .sorting-order {
    float: right;
}
.item-list-tophead .sorting-order ul,
.item-list-tophead .sorting-order ul li,
.item-list-tophead .sorting-order span {
    display: inline-block;
    height: 36px;
    line-height: 36px;
}
.item-list-tophead .sorting-order span {
    color: #999;
    padding-right: 5px;
}
.item-list-tophead .sorting-order ul li a {
    display: inline-block;
    padding: 0 5px;
}
.item-list-tophead .sorting-order ul li a:hover,
.active-sortorder a {
    color: #2e3192;
    text-decoration: none;
    border-bottom: solid 1px #2e3192;
}
/*innerproductCol*/
.innerproductCol.row {
    margin-left: -6px;
    margin-right: -6px;
}
.innerproductCol.row .col-sm-3 {
    padding-left: 6px;
    padding-right: 6px;
}
.innerproductCol.row .col-sm-3 .productBlock .productBlockViewDtl a i {
    margin-left: 5px;
}
.productImgSlider {
    display: block;
    position: relative;
}
.productImgSlider > a.fancybox {
    display: block;
}
.productImgSlider > a.fancybox img {
    width: 100%;
    height: auto;
    padding: 3px;
    border: solid 1px #eee;
}
.product-title {
    display: block;
    margin-bottom: 10px;
}
.product-title h3 {
    display: block;
    margin: 0 0 5px 0;
}
.product-title a {
    display: inline-block;
    margin-left: 0;
}
.wishlist-btn {
    /*background: #2e3192;*/
    color: #2e3192;
    font-size: 13px;
    margin-left: 10px;
    padding: 2px 6px;
    border-radius: 4px;
    border: solid 1px #2e3192;
    margin-left: 13px;
}
.productBlock .productBlockInfo .wishlist-btn:hover,
.wishlist-btn:hover {
    background: #2e3192;
    color: #fff;
    text-decoration: none;
}
.ratings-review-details {
    display: block;
    padding-bottom: 5px;
    position: relative;
    padding-top: 12px;
    font-size: 12px;
    color: #999;
}
.ratings-review-details ul,
.ratings-review-details ul li,
.ratings-review-details > a,
.ratings-review-details > span {
    display: inline-block !important;
}
.ratings-review-details > a {
    color: inherit;
}
.ratings-review-details > a:hover {
    text-decoration: underline;
    color: #000;
}
.ratings-review-details > span {
    color: #999;
    position: relative;
    padding: 0 6px;
}
.ratings {
    display: block;
}
.ratings li {
    display: inline-block;
    color: #2e3192;
    font-size: 16px;
}
.ratings li {
    font-size: 18px !important;
}
.productPageHeadRate {
    display: block;
    clear: both;
    padding-top: 0;
}
.productPageHeadRate h3 {
    font-weight: 500;
    margin: 0;
    font-family: 'Poppins', sans-serif;
    font-size: 34px;
}
.productPageHeadRate h3 small,
.productPageHeadRate h3 span {
    font-weight: 400;
    font-size: 20px;
}
.productPageHeadRate h3 small {
    text-decoration: line-through;
}
/*inStockStatus*/
.inStockStatus {
    display: block;
    clear: both;
}
.inStockStatus div {
    display: inline-block;
    font-size: 13px;
    font-weight: normal;
}
.inStockStatus div.btn {
    margin: 0 10px 0 0;
}
/*.productDescriptionBlock > .buyBtns .btn-success {
    background: #2e3192 !important;
}
.productDescriptionBlock > .buyBtns .btn-success:hover {
    background: #03B15A !important;
}*/
/*productQuickInfo*/
.productQuickInfo {
    display: block;
    clear: both;
    width: 100%;
    margin-top: 15px;
}
.productQuickInfo > h4 {
    /*text-decoration: underline;*/
    font-weight: 500;
    font-size: 16px;
    margin: 0;
    font-family: 'Poppins', sans-serif;
}
.proquantity {
    display: block;
}
.proquantity span {
    float: left;
    margin: 3px 15px 10px 0;
}
.buyBtns {
    display: block;
    width: 100%;
    height: auto;
    float: left;
    margin-top: 20px;
}
/*product zoom feature*/
.show{
    width: 400px;
    height: 400px;
    position: relative;
    z-index: 30;
}
#show-img { width: 400px; height: 400px; }
.small-img{
    width: 350px;
    height: 70px;
    margin-top: 10px;
    position: relative;
    left: 25px;
}
.small-img .icon-left, .small-img .icon-right{
    width: 12px;
    height: 24px;
    cursor: pointer;
    position: absolute;
    top: 0;
    bottom: 0;
    margin: auto 0;
}
.small-img .icon-left{
    transform: rotate(180deg)
}
.small-img .icon-right{
    right: 0;
}
.small-img .icon-left:hover, .small-img .icon-right:hover{
    opacity: .5;
}
.small-container{
    width: 310px;
    height: 70px;
    overflow: hidden;
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
}
.small-container div{
    width: 800%;
    position: relative;
}

.small-container .show-small-img{
    width: 70px;
    height: 70px;
    margin-right: 6px;
    cursor: pointer;
    float: left;
}
.small-container .show-small-img:last-of-type{
    margin-right: 0;
}
.zoomImageSlider #big-img {
    max-width: none;
}
/*qty-spinner*/
.qty-spinner {
    display: inline-block;
    width: auto;
    margin-right: 0;
}
.qtyminus,.qtyplus {
    display: inline-block;
    float: left;
    width: 35px !important;
    height: 35px !important;
    line-height: 35px;
    border: none;
    background: #FFEA3A; 
    font-size: 30px !important;
    font-weight: 400;
    position: relative;
    color: #2e3192;
    border-radius: 50%;
}
.qtyminus:hover,.qtyplus:hover {
    background: #2e3192;
    color: #fff;
}
.qty {
    display: inline-block;
    float: left;
    width: 45px !important;
    height: 33px !important;
    text-align: center;
    border: none !important;
    border-radius: 0 !important;
    font-size: 22px;
}
.inline-btn {
    display: inline-block;
}
/*designCustomBtn*/
.designCustomBtn {
    display: block;
    clear: both;
    float: left;
    width: 100%;
    margin: 0 0 20px 0;
}
.designCustomBtn > a {
    display: inline-block;
    /*width: 300px;*/
    padding: 50px 15px;
    border: dashed 3px rgba(0,0,0,0.1);
    box-shadow: 0 10px 50px rgba(0,0,0,0.2);
    border-radius: 10px;
    text-align: center;
    color: #999;
    /*font-size: 12px;*/
}
.designCustomBtn > a:hover,
.designCustomBtn > a:focus,
.designCustomBtn > a:active {
    text-decoration: none;
}
.designCustomBtn > a > i {
    display: block;
    font-size: 42px;
    text-align: center;
    margin: 0 auto 15px auto;
    border-radius: 50%;
    height: 100px;
    width: 100px;
    line-height: 100px;
    background: #2e3192;
    color: #fff;
}
.designCustomBtn > a > span {
    display: block;
    padding: 15px 0 0 0;
    border-top: solid 1px #ddd;
    font-size: 18px;
    color: #2e3192;
    clear: both;
    float: left;
    width: 100%;
    margin-top: 15px;
    font-weight: bold;
}
.designCustomBtn > a:hover {
    box-shadow: 0 5px 60px rgba(0,0,0,0.15);
}
.modal-content {
    border-radius: 0 !important;
    border: none !important;
}
.modal-footer.text-center {
    text-align: center !important;
}
/*uploadImgContainer*/
.uploadImgContainer {
    display: block;
    position: relative;
}
.uploadImgContainer:after {
    content: '';
    display: block;
    clear: both;
}
.uploadLabelDiv {
    display: block;
    width: 50%;
    float: left;
}
.uploadImgContainer .uploadImgLabel {
    display: block;
    width: 50%;
    position: relative;
    height: auto;
    z-index: 2;
    margin: 30px auto;
    text-align: center;
    padding: 50px 0;
    cursor: pointer;
    border-radius: 5px;
    box-shadow: 0 10px 50px rgba(0,0,0,0.15);
}
.uploadImgContainer .uploadImgLabel:hover {
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}
.uploadImgContainer .uploadImgLabel > i {
    display: block;
    margin: 0 auto 15px auto;
    width: 100px;
    height: 100px;
    line-height: 100px;
    text-align: center;
    background: #2e3192;
    color: #fff;
    font-size: 42px;
    border-radius: 50%;
}
.uploadImgContainer .uploadImgLabel > span {
    display: block;
    margin-bottom: 10px;
}
.uploadImgContainer .uploadImgLabel > strong {
    display: block;
    font-size: 20px;
    font-weight: bold;
    color: #2e3192;
    text-transform: uppercase;
    letter-spacing: 3px;
}
.uploadImgContainer .uploadImgLabel input[type="file"],
.uploadImgContainer .uploadImgLabel input[type="button"] {
    border: none;
    display: none;
}
/*uploadImgPreview*/
.uploadImgPreview {
    display: block;
    position: relative;
    width: 50%;
    float: left;
}
#uploadImgPreviewDesign {
    position: absolute;
    top: 28%;
    width: 40%;
    height: auto;
    margin: 0 auto;
    left: 0;
    right: 0;
    z-index: -1;
    opacity: 0;
}
.uploadImgPreviewFull {
    width: 100%;
    height: auto;
    position: relative;
}
.uploadImgPreview .activeImg {
    z-index: 2 !important;
    opacity: 1 !important;
}
.tablayout1 {
    text-align: center;
    position: relative;
}
.tablayout1 > span {
    display: inline-block;
    position: absolute;
    top: 6px;
    left: 0;
    font-size: 16px;
}
.tablayout1 li {
    float: none !important;
    display: inline-block;
}
.tablayout1 li a {
    font-size: 16px;
    padding: 10px 20px !important;
    border-radius: 20px 20px 0 0 !important;
    transition: all 300ms ease-in-out;
    -o-transition: all 300ms ease-in-out;
    -moz-transition: all 300ms ease-in-out;
    -webkit-transition: all 300ms ease-in-out;
    -ms-transition: all 300ms ease-in-out;
}
.tablayout1 li a:hover {
    background: #2e3192 !important;
    color: #fff !important;
}
.tablayout1 li a:focus,.tablayout1 li a:active,.tablayout1 li a:target {
    outline: none !important;
}
.tablayout1 li.active a,.tablayout1 li.active a:hover,.tablayout1 li.active a:focus {
    border-top: solid 2px #2e3192;
    background: #fff !important;
    color: #2e3192 !important;
}
.tablayout-content .tab-pane {
    padding-top: 25px !important;
    padding-bottom: 25px;
}
#product-details p,
#seller-details p {
    font-size: 15px;
}
/*customerReviewRow*/
.customerReviewRow {
    display: block;
    margin-bottom: 15px;
    position: relative;
    width: calc(50% - 30px);
    float: left;
    padding-right: 30px;
}
.customerReviewRow:after {
    content: '';
    display: block;
    clear: both;
}
.customerReviewBlock {
    display: block;
    position: relative;
    /*padding: 0 0 10px 100px;*/
    padding: 0 0 10px 0;
}
.customerReviewRow img {
    width: 80px;
    height: auto;
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 50%;
    padding: 2px;
    border: solid 1px #ddd;
}
.customerReviewRow h4 {
    display: inline-block;
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    margin-bottom: 10px;
    padding-bottom: 10px;
    border-bottom: solid 1px #ddd;
    font-weight: bold;
}
.customerReviewRow h4 span {
    font-size: 13px;
    color: #999;
    padding-left: 10px;
    font-weight: normal;
}
.customerReviewRow .ratings,
.customerReviewRow .rating {
    clear: both;
    margin-bottom: 10px;
}
.customerReviewRow h3 {
    border-bottom: solid 1px #ddd;
}
.customerReviewRow ul.rating {
    margin-bottom: 15px;
}
.customerReviewRow input[type="text"],
.customerReviewRow textarea {
    border: solid 1px #ddd;
    width: 100%;
    text-indent: 10px;
}
.customerReviewRow input {
    height: 40px;    
}
.customerReviewRow textarea {
    height: auto;
    min-height: 100px;
}
.customerReviewRow form p {
    display: block;
    margin: 0 0 10px 0;
    clear: both;
    width: 100%;
}
.customerReviewRow form input[type="submit"] {
    display: inline-block;
    margin: 10px 0 0 0;
}
/*relatedProducts*/
.relatedProducts {
    margin-left: -6px;
    margin-right: -6px;
}
.relatedProducts .item {
    margin: 6px;
}
/*cartBlockRow*/
.cartPageSection h1 {
    font-size: 32px;
}
.cartBlockRowHead,
.cartBlockRow {
    display: block;
    position: relative;
    margin-bottom: 15px;
}
.cartBlockRowHead {
    border-bottom: solid 1px #ddd;
    padding-bottom: 10px;
}
.cartBlockDesc {
    /*width: calc(35% - 150px);*/
    width: 40%;
    float: left;
    /*padding-left: 150px;*/
    position: relative;
}
.cartBlockDesc .cartBlockImg {
    display: block;
    position: relative;
    top: 0;
    left: 0;
    width: 100px;
    margin-right: 15px;
    float: left;
}
.cartBlockDesc .cartBlockImg img {
    width: 100%;
    height: auto;
}
.cartBlockRate {
    width: 15%;
    float: left;
}
.cartBlockQty {
    width: 15%;
    float: left;
}
.cartBlockWrap {
    width: 15%;
    float: left;
}
.cartBlockTotal {
    /*width: 15%;*/
    float: left;
}
.cartBlockRow {
    border-radius: 6px;
    background: #fff;
    box-shadow: 0 5px 30px rgba(0,0,0,0.1);
    overflow: hidden;
}
.cartBlockRow:hover {
    box-shadow: 0 5px 40px rgba(0,0,0,0.15);
}
.cartBlockRowHead:after,
.cartBlockRow:after {
    content: '';
    display: block;
    clear: both;
}
.cartBlockRow h3,
.cartBlockRowHead h3 {
    font-family: 'Poppins', sans-serif;
    margin: 0;
}
.cartBlockRowHead h3 {
    font-size: 18px;
    color: #999;
}
.cartBlockRow h3 {
    font-size: 20px;
    font-weight: normal;
    padding: 15px 0 0 0;
}
.cartBlockRow p {
    font-size: 20px;
}
.cartBlockRow .cartBlockRate,
.cartBlockRow .cartBlockQty,
.cartBlockRow .cartBlockTotal,.cartBlockCoupon {
    padding: 15px 0;
}
.cartBlockRow .cartBlockTotal > .totalCartRemoveBtn {
    display: block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border: none;
    background: transparent;
    color: #999;
    font-size: 20px;
    position: absolute;
    top: 15px;
    text-align: center;
    right: 10px;
    border-radius: 50%;
}
.cartBlockRow .cartBlockTotal > .totalCartRemoveBtn:hover {
    background: #2e3192;
    color: #fff;
}
.cartBlockDesc small {
    color: #999;
}
.cartBlockQty .minus:hover,
.cartBlockQty .plus:hover {
    background: #2e3192;
    color: #FFEA3A;
}
.giftWrap {
    display: block;
    position: relative;
    text-align: center;
    width: 85px;
    height: 75px;
    line-height: 75px;
    margin: 0;
}
.giftWrap:before {
    content: 'Click to add up to 3 items in box';
    position: absolute;
    width: 200px;
    height: auto;
    line-height: normal;
    border-radius: 10px;
    border: solid 1px #ddd;
    display: block;
    padding: 15px;
    background: #fff;
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    top: 0;
    left: 90%;
    right: 0;
    z-index: 2;
    font-weight: normal;
    opacity: 0;
}
.giftWrap:hover:before {
    opacity: 1;
}
.giftWrap input {
    position: absolute;
    left: 0;
    z-index: 2;
    top: 30px;
    margin: 0 auto;
    opacity: 0;
    visibility: hidden;
}
.giftWrap i {
    display: block;
    position: relative;
    font-size: 50px;
    /*color: #FFEA3A;*/
    color: #d9534f;
    text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
    height: inherit;
    line-height: inherit;
}
.cartBlockWrap input:checked ~ i {
    color: #2e3192;
    text-shadow: 0 5px 20px rgba(0,0,0,0.5);
}
.sendasgift {
    display: block;
    text-align: center;
    font-weight: normal;
    font-size: 18px;
    position: relative;
    clear: both;
    width: 210px;
    margin: 0 auto 15px auto;;
}
.sendasgift p {
    font-size: inherit;
    display: inline-block;
    color: inherit;
    margin: 0;
}
.sendasgift i {
    color: #2e3192;
    padding: 0 0 0 5px;
}
.sendasgift input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #ddd;
}
.sendasgift:hover input ~ .checkmark {
    background-color: #ccc;
}
.sendasgift input:checked ~ .checkmark {
    background-color: #2e3192;
}
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}
.sendasgift input:checked ~ .checkmark:after {
    display: block;
}
.sendasgift .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.ui-tooltip {
    background: #fff !important;
    z-index: 100000 !important;
    box-shadow: 0 5px 10px rgba(0,0,0,0.2) !important;
    color: #222 !important;
    opacity: 1 !important;
}
/*cartBlockRowFooter*/
.cartBlockRowFooter {
    display: block;
    clear: both;
    padding: 15px 0;
    position: relative;
}
.cartBlockRowFooter:after {
    content: '';
    display: block;
    clear: both;
}
.cartBlockRowFooter .cartBlockRowFooterMargin {
    display: block;
    width: 70%;
    float: left;
    min-height: 1px;
}
.cartBlockRowFooter .cartBlockRowFooterLastCol {
    display: block;
    width: 30%;
    float: right;
    min-height: 1px;
}
.cartBlockRowFooter .cartBlockRowFooterLastCol .cartBlockRowFooterInfo,
.cartBlockRowFooter .cartBlockRowFooterLastCol .cartBlockRowFooterTotal {
    width: 50%;
    float: left;
    position: relative;
}
.cartBlockRowFooter .cartBlockRowFooterLastCol .cartBlockRowFooterInfo p,
.cartBlockRowFooter .cartBlockRowFooterLastCol .cartBlockRowFooterTotal p {
    height: 20px;
    line-height: 20px !important;
}
.cartBlockRowFooter .cartBlockRowFooterLastCol .cartBlockRowFooterInfo p {
    font-size: 16px;
    text-align: right;
    padding-right: 30px;
}
.cartBlockRowFooter .cartBlockRowFooterLastCol .cartBlockRowFooterTotal p {
    font-size: 20px;
    /*font-weight: bold;*/
    font-weight: normal;
}
.cartBlockRowFooterLastCol .space5 {
    padding-bottom: 10px;
}
.cartBlockRowFooterLastCol hr {
    margin: 0;
    padding: 0;
}
.cartBlockRowFooter .cartBlockRowFooterLastCol .cartBlockRowFooterInfo h4 {
    text-align: right;
    padding-right: 30px;
}
.cartBlockRowFooterLastCol h4 {
    font-family: 'Poppins', sans-serif;
    font-size: 22px;
}
.cartBlockRowFooterLastCol h4 strong {
    /*font-weight: bold;*/
    font-weight: normal;
}
.cartBlockRowFooterLastCol > a.btn {
    display: block;
}
.cartBlockRowFooterLastCol > a.btn.guestCheckOutBtns,
.btn-success {
    background: #03B15A !important;
    color: #fff !important;
}
.cartBlockRowFooterLastCol > a.btn.guestCheckOutBtns:hover,
.btn-success:hover {
    background: #449d44 !important;
    color: #fff !important;
}
/*socialMediaSharing*/
.socialMediaSharing {
    display: block;
    clear: both;
    padding: 12px 0;
}
.socialMediaSharing p {
    display: block;
    font-size: 15px;
    color: #999;
    margin: 0 0 5px 0;
}
.socialMediaSharing ul {
    display: block;
    margin: 0 0 0 0;
    padding: 0;
}
.socialMediaSharing ul li {
    display: inline-block;
    margin: 0 3px 0 0;
}
.socialMediaSharing ul li:last-child {
    margin-right: 0;
}
.socialMediaSharing ul li a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 38px;
    text-align: center;
    color: #2e3192;
    border-radius: 50%;
    border: solid 2px #2e3192;
    font-size: 20px;
}
.socialMediaSharing ul li a i {
    font-size: inherit;
    color: inherit;
}
.socialMediaSharing ul li a:hover {
    background: #2e3192;
    color: #fff;
    border-color: transparent;
}
/*addtocartthumppopbox*/
.socialMediaSharingLike {
    display: block;
    clear: both;
    padding: 12px 0 0 0;
}
.socialMediaSharingLike p {
    display: block;
    font-size: 15px;
    color: #999;
    margin: 0 0 5px 0;
}
.socialMediaSharingLike ul {
    display: block;
    margin: 0 0 0 0;
    padding: 0;
}
.socialMediaSharingLike ul li {
    display: inline-block;
    margin: 0 3px 0 0;
}
.socialMediaSharingLike ul li:last-child {
    margin-right: 0;
}
.socialMediaSharingLike ul li a {
    display: inline-block;
    width: 70px;
    height: 70px;
    line-height: 60px;
    text-align: center;
    color: #2e3192;
    border-radius: 50%;
    border: solid 2px #2e3192;
    font-size: 40px;
}
.socialMediaSharingLike ul li a i {
    font-size: inherit;
    color: inherit;
}
.socialMediaSharingLike ul li a:hover {
    background: #2e3192;
    color: #fff;
    border-color: transparent;
}
/*checkout-process-fig*/
.checkout-process-fig {
    display: block;
    margin: 0 auto 15px auto;
    text-align: center;
    position: relative;
    z-index: 10;
}
.checkout-process-fig:before {
    content:'';
    display: block;
    width: 100%;
    height: 4px;
    position: absolute;
    top: 38px;
    left: 0;
    right: 0;
    background: #2e3192;
    z-index: -1;
}
.checkout-process-fig ul,.checkout-process-fig ul li {
    display: inline-block;
    text-align: center;
}
.checkout-process-fig ul li {
    width: 160px;
}
.checkout-process-fig ul li span,
checkout-process-fig ul li strong {
    display: block;
}
.checkout-process-fig ul li span {
    width: 50px;
    height: 50px;
    line-height: 48px;
    text-align: center;
    /*border: solid 1px #ddd;*/
    margin: 15px auto;
    position: relative;
    font-size: 24px;
    font-weight: 700;
    z-index: 1;
}
.checkout-process-fig ul li span:before {
    content: "";
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    background: #f7f7f7;
    border-radius: 10px;
    border: solid 1px #2e3192;
    transform: rotate(45deg);
    -o-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    z-index: -1;
    top: 0;
    left: 0;
}
.checkout-process-fig ul li strong {
    text-align: center;
    font-weight: 400;
    color: #999;
}
.active-checkbox-process span {
    color: #fff !important;
}
.active-checkbox-process span:before {
    background: #2e3192 !important;
    border-color: transparent !important;
}
.active-checkbox-process strong {
    font-weight: 700 !important;
    color: #222 !important;
}
.login-block {
    display: block;
    padding: 20px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 7px 50px rgba(0,0,0,0.15);
}
.login-block input[type="text"],
.login-block input[type="password"],
.login-block input[type="email"],
.login-block input[type="number"],
.login-block input[type="date"],
.login-block input[type="tel"],
.login-block textarea,
.modal-form-block input,
.modal-form-block textarea {
    display: block;
    margin-bottom: 10px;
    width: 100%;
    height: 40px;
    border: solid 1px #ddd;
    text-indent: 10px;
    background: #fff;
}
.login-block textarea,
.modal-form-block textarea {
    height: auto !important;
    padding-top: 5px;
}
.inputRounded {
    border-radius: 40px !important;
}
.login-block select,
.modal-form-block select {
    display: block;
    margin-bottom: 10px;
    width: 100%;
    height: 40px;
    border: solid 1px #ddd;
    text-indent: 10px;
    background: #fff;
}
.login-block input:focus,
.login-block textarea:focus,
.modal-form-block input:focus,
.modal-form-block textarea:focus {
    border: solid 1px #ccc;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
.login-block label,
.modal-form-block label {
    font-weight: 500;
    font-size: 15px;
}
.btn-full {
    display: block;
}
.login-block h4.heading-center {
    font-family: 'Poppins', sans-serif;
    display: block;
    text-align: center;
    margin-bottom: 20px;
}
.login-block h4.heading-center span {
    padding: 0 10px;
}
.login-block h4.heading-center:after {
    background: #ddd !important;
    display: none;
}
/*modal-form-block*/
.modal-form-block {
    display: block;
    position: relative;
}
.modal-form-block:after,
.addressShippingSelect:after {
    content: '';
    display: block;
    clear: both;
}
.modal-form-block .form-group {
    position: relative;
}
.modal-form-block .form-control-feedback {
    top: initial;
    bottom: 3px;
    color: #2e3192;
}
.modal-title {
    font-family: 'Poppins', sans-serif;
    margin: 0;
}
/*addressShippingSelect*/
.addressShippingSelect {
    display: block;
    position: relative;
    padding: 15px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    border-radius: 10px;
    border: solid 1px #eee;
}
.addressShippingSelect h5,
.addressShippingSelect p {
    display: block;
    margin: 0 0 6px 0;
    padding: 0 0 0 30px;
    position: relative;
}
.addressShippingSelect h5 i,
.addressShippingSelect p i {
    position: absolute;
    top: 2px;
    left: 0;
    width: 25px;
    color: #2e3192;
}
.addressShippingSelect input[type="submit"] {
    margin: 10px 0;
}
.footerAddressShipping {
    display: block;
    clear: both;
    float: left;
    width: 100%;
    margin-top: 10px;
    padding: 12px 0 0 0;
    border-top: solid 1px #ddd;
}
.footerAddressShipping > div i {
    color: #2e3192;
}
.footerAddressShipping > div.btn-del {
    float: left;
}
.footerAddressShipping > div.btn-edit {
    float: right;
}

/*  bhoechie tab */
div.bhoechie-tab-container{
    z-index: 10;
    padding: 0 !important;
}
div.bhoechie-tab-menu {
    padding-right: 0;
    padding-left: 0;
    padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
    margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
    /*margin-bottom: 0;*/
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
    color: #2e3192;
    font-size: 20px;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
    border-top-right-radius: 0;
    -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
    border-bottom-right-radius: 0;
    -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
    background-color: #2e3192;
    color: #ffffff;
    font-size: 21px;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
    content: '';
    position: absolute;
    left: 100%;
    top: 50%;
    margin-top: -13px;
    border-left: 0;
    border-bottom: 13px solid transparent;
    border-top: 13px solid transparent;
    border-left: 10px solid #2e3192;
}
.bhoechie-tab-menu .list-group-item {
    padding: 0 15px !important;
}

div.bhoechie-tab-content{
    background-color: #fff;
    padding: 20px;
    box-shadow: 15px 15px 50px rgba(0,0,0,0.1);
    min-height: 400px;
}
.bhoechie-tab-menu .list-group .list-group-item h4{
    margin-top: 10px;
    padding: 15px;
    border-radius: 100px;
    border: 2px solid;
    margin-right: 5px;
}
.list-group-item.active{
    border-color: #2e3192 !important;
}
div.bhoechie-tab div.bhoechie-tab-content:not(.active){
    display: none;
}
.radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"] {
    margin-top:10px   
}
.sbi{   
    height: 34px;
    overflow: hidden;
}
.hdfc{
    overflow: hidden;
    height: 34px;
}
.hdfc img{
    margin-top: -64px;
}
.icici{
    overflow: hidden; 
    height: 34px;
}
.icici img{
    margin-top: -96px;
}
.citibank{
    overflow: hidden; 
    height: 34px;
}
.citibank img{
    margin-top: -30px;
}
.axis{
    overflow: hidden;
    height: 34px;
}
.axis img{
    margin-top: -125px; 
}
.kotak{
    overflow: hidden; 
    height: 43px;
}
.kotak img{
    margin-top: -157px;
}
.table th{
    font-weight: bold;
}
.success-msg-box {
    display: block;
    padding: 15px 15px 15px 70px;
    background: #FFEA3A;
    color: #2e3192;
    font-size: 16px;
    font-weight: 300;
    position: relative;
    border-radius: 5px;
    margin-bottom: 15px;
}
.success-msg-box > span {
    font-size: 22px;
    font-weight: bold;
}
.success-msg-box > i {
    display: inline-block;
    position: absolute;
    top: 18px;
    left: 15px;
    color: #2e3192;
    font-size: 50px;
}
.success-msg-box .msg-box-close-btn {
    display: inline-block;
    position: absolute;
    top: 30px;
    right: 15px;
    color: #777;
    cursor: pointer;
}
.success-msg-box .msg-box-close-btn i {
    color: inherit;
}
.success-msg-box .msg-box-close-btn:hover {
    color: #555;
}
.makepaymentSection:after,
.bhoechie-tab-content:after,
.order-confirmation-dtlsbox:after {
    content: '';
    display: block;
    clear: both;
}
/*order-confirmation-dtlsbox*/
.order-confirmation-dtlsbox {
    display: block;
    position: relative;
    padding: 15px 0;
}
.order-confirmation-dtlsbox h4 {
    font-family: 'Poppins', sans-serif;
    margin: 0 0 5px 0;
}
.order-confirmation-dtlsbox h4 small {
    display: block;
}

/*heading etc.*/
.headingFull {
    display: block;
    position: relative;
    padding-bottom: 10px;
}
h4.headingFull {
    font-size: 20px;
    font-weight: bold;
}
h4.headingFull i {
    color: #2e3192;
}
h5.headingFull {
    font-size: 16px;
}
.headingFull:before {
    content: '';
    display: block;
    position: absolute;
    bottom: 60%;
    right: 0;
    left: 0;
    background: #2e3192;
    height: 3px;
}
.headingFull span {
    display: inline-block;
    position: relative;
    font-family: 'Poppins', sans-serif !important;
    z-index: 2;
    background: #fff;
    padding-right: 5px;
}
h4.headingFull {
    font-size: 20px;
    font-weight: bold;
}
h4.headingFull i {
    color: #2e3192;
}
h5.headingFull {
    font-size: 16px;
}
/*footer-top-area*/
.footer-top-area {
    background: url('../images/footerBg.jpg') no-repeat fixed 100% 0 #000;
    background-size: cover;
    backface-visibility: hidden;
    color: #999;
    padding: 70px 0;
    position: relative;
    overflow: hidden;
}
.footer-top-area:before {
    content: '';
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #000;
    opacity: 0.9;
}
.footer-bottom-area {
    background: #000;
    color: #fff
}
.footer-about-us span {
    color: #999;
}
.footer-wid-title {
    font-size: 22px;
    font-weight: 100;
    /*color: #2e3192;*/
    color: #999;
    padding-bottom: 8px;
    border-bottom: solid 1px #2e3192;
}
.footer-about-us h2 {
    font-weight: 200;
}
.footer-menu ul {
    list-style: outside none none;
    margin: 0 0 30px 0;
    padding: 0;
}
.footer-menu ul li {
    border-bottom: 1px dashed rgba(255,255,255,0.1);
    padding: 5px 0;
}
.footer-menu a {
    display: block;
    padding: 5px 0;
    color: #999;
}
.footer-menu li a:hover {
    color: #FFEA3A;
    text-decoration: none;
}
.footer-social a {
    background: transparent;
    color: #FFEA3A;
    display: inline-block;
    font-size: 20px;
    height: 40px;
    margin-bottom: 10px;
    margin-right: 3px;
    padding-top: 5px;
    text-align: center;
    width: 40px;
    border: 1px solid rgba(255,255,255,0.2);
}
.footer-social a:hover {
    background-color: #fff;
    border-color: #fff;
    color: #222;
}
.footer-social {
    margin-top: 20px;
}
/*subscribeForm*/
.subscribeForm {
    display: block;
    margin-bottom: 10px;
    position: relative;
}
.subscribeForm:after {
    content: "";
    display: block;
    clear: both;
}
.subscribeForm input {
    display: inline-block;
    width: 100%;
    height: 40px;
    float: left;
    padding: 0 10px;
    font-size: 14px;
    border: none;
    color: #000;
    border-radius: 0;
}
.subscribeForm button {
    display: inline-block;
    float: left;
    position: absolute;
    top: 0;
    right: 0;
    padding: 0 15px;
    height: 40px;
    border: none;
    background: #2e3192;
    color: #fff;
    font-size: 14px;
}
.subscribeForm button:hover {
    background: #FFEA3A;
    color: #2e3192;
}
.newsletter-form input[type="email"] {
    background: none repeat scroll 0 0 #fff;
    border: medium none;
    margin-bottom: 10px;
    padding: 10px;
    width: 100%;
}
.newsletter-form input[type="submit"] {
    background: transparent;
    border: medium none;
    color: #2e3192;
    display: inline-block;
    font-size: 18px;
    padding: 7px 20px;
    text-transform: uppercase;border: 1px solid #fff;
}
.newsletter-form input[type="submit"]:hover {
    background: #FFEA3A;
    border-color: #2e3192;
}
.newsletter-form {
    margin-top: 25px;
}
.footer-bottom-area {
    color: #2e3192;
}
.footer-card-icon {
    font-size: 30px;
    text-align: right;
}
.copyright {
    display: block;
    margin-top: 15px;
    text-align: center;
    padding-top: 15px;
    border-top: solid 1px #2e3192;
}
.copyright > p {
    margin: 10px 0 0;
}
.copyright p,
.copyright p a,
.copyright a {
    color: #999;
}
/*sidebar*/
.sidebar {
    border: solid 1px #eee;
    box-shadow: 1px 1px 10px rgba(0,0,0,0.1);
    background: #fff;
}
.users_h2_title {
    margin: 0px;
    background: #2e3192 none repeat scroll 0% 0%;
    color: #FFF;
    padding: 6px;
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    font-weight: 400;    
    text-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5);
    box-shadow: 10px 0px 5px rgba(0, 0, 0, 0.1);
}
.users ul {
    padding: 0px;
    list-style: outside none none;
}
.users ul li {
    margin: 3px 0px;
}
.users ul li a {
    color: #606060;
    font-size: 15px;
    display: block;
    padding: 5px 0px 5px 6px;
    text-decoration: none;
    border-bottom: 1px solid #EAE6E6;
}
.users ul li a:hover {
    box-shadow: 3px 3px 5px rgba(0,0,0,0.2);
    background: #f7f7f7;
}
.users ul li a i{
    border: 1px solid rgb(204, 204, 204);
    margin-right: 5px;
    padding-top:6px;
    height: 28px;
    border-radius: 23px;
    font-size: 16px;
    width: 28px;
    text-align: center;
    box-shadow: inset 0 0 10px #ccc;
}
/*buyerOrderPage*/
.buyerOrderPage .cartBlockDesc {
    padding-left: 150px;
}
.buyerOrderPage .cartBlockDesc .cartBlockImg {
    position: absolute;
    width: 130px;
}
.buyerOrderPage .cartBlockRow {
    min-height: 140px;
}
.buyerOrderPage .cartBlockRow hr {
    margin: 0;
    padding: 0;
}
.buyerOrderPage .cartBlockRow .cartBlockDesc h4 {
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    margin-bottom: 5px;
}
.buyerOrderPage .cartBlockRow .cartBlockDesc h4 strong {
    font-weight: bold;
    color: #2e3192;
}
.buyerOrderPage .cartBlockRow .cartBlockDesc .btn-primary {
    margin-bottom: 15px;
}
.buyerOrderPage .cartBlockRow .cartBlockTotal .btn-default2 {
    margin-right: 15px;
}
.buyerOrderPage .cartBlockRow .cartBlockQty input[disabled] {
    background: transparent;
}
/*panelbox*/
.panelbox {
    display: block;
    padding: 15px;
    border-radius: 4px;
    background: #fff;
    border: solid 1px #ddd;
}
.panelbox:after {
    content: '';
    display: block;
    clear: both;
}
.uls1 {
    display: block;
}
.uls1 li {
    display: block;
}
.uls1 li:after {
    content:"";
    display: block;
    clear: both;
}
.uls1 li span {
    text-align: left;
}
.zindexBtn {
    position: relative;
    z-index: 2;
}
/*removeWishlist*/
.removeWishlist {
    display: block;
    margin-bottom: 30px;
    text-align: center;
}
.removeWishlist > .btn i.fa-trash {
    padding-right: 5px;
}
.myreviewsFull .customerReviewRow {
    width: auto;
    float: none;
    clear: both;
}
/*modal-body-addtowish*/
.modal-body-addtowish {
    display: block;
    text-align: center;
    padding: 30px;
    font-size: 22px;
}
/*categoryMainSection*/
.categoryMainSection .row.rightBlock {
    margin-left: -6px;
    margin-right: -6px;
}
.categoryMainSection .row.rightBlock .col-md-4.col-sm-6,
.categoryMainSection .row.rightBlock .col-sm-3.product-box-class {
    padding-left: 6px;
    padding-right: 6px;
}

/*checkOutTablayout*/
.checkOutTablayout {
    display: block;
    position: relative;
    clear: both;
}
.checkOutTablayout .checkOutTabs {
    display: block;
    margin: 0 auto 15px auto;
    text-align: center;
    position: relative;
    z-index: 10;
}
.checkOutTablayout .checkOutTabs:before {
    content:'';
    display: block;
    width: 100%;
    height: 4px;
    position: absolute;
    top: 38px;
    left: 0;
    right: 0;
    background: #2e3192;
    z-index: -1;
}
.checkOutTablayout .checkOutTabs > ul,
.checkOutTablayout .checkOutTabs > ul > li {
    display: inline-block;
    text-align: center;
}
.checkOutTablayout .checkOutTabs > ul > li {
    width: 160px;
}
.checkOutTablayout .checkOutTabs > ul > li > a {
    display: inline-block;
    padding: 0;
}
.checkOutTablayout .checkOutTabs > ul > li a span,
.checkOutTablayout .checkOutTabs > ul > li a strong {
    display: block;
}
.checkOutTablayout .checkOutTabs > ul > li a span {
    width: 50px;
    height: 50px;
    line-height: 48px;
    text-align: center;
    margin: 15px auto;
    position: relative;
    font-size: 24px;
    font-weight: 700;
    z-index: 1;
}
.checkOutTablayout .checkOutTabs > ul > li a span:before {
    content: "";
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    background: #f7f7f7;
    border-radius: 10px;
    border: solid 1px #2e3192;
    transform: rotate(45deg);
    -o-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    z-index: -1;
    top: 0;
    left: 0;
}
.checkOutTablayout .checkOutTabs > ul > li.active,
.checkOutTablayout .checkOutTabs > ul > li.active > a,
.checkOutTablayout .checkOutTabs > ul > li:hover,
.checkOutTablayout .checkOutTabs > ul > li.active > a:hover,
.checkOutTablayout .checkOutTabs > ul > li > a:hover,
.checkOutTablayout .checkOutTabs > ul,
.checkOutTablayout .checkOutTabs > ul > li > a {
    border: none !important;
}
.checkOutTablayout .checkOutTabs > ul > li > a {
    background: transparent !important;
}
.checkOutTablayout .checkOutTabs > ul > li.active,
.checkOutTablayout .checkOutTabs > ul > li.active > a {
    color: #000 !important;
}
.checkOutTablayout .checkOutTabs > ul > li strong {
    text-align: center;
    font-weight: 400;
    color: #999;
}
.checkOutTablayout .checkOutTabs > ul > li.active a strong {
    font-weight: 700 !important;
    color: #000 !important;
}
.checkOutTablayout .checkOutTabs > ul > li.active a span {
    color: #fff;
}
.checkOutTablayout .checkOutTabs > ul > li.active a span:before {
    background: #2e3192 !important;
    border-color: transparent !important;
}
.checkOutTablayout > .tab-content {
    padding: 30px 0;
}
/*loginFormMain*/
.loginFormMain {
    display: block;
}
.loginFormMain .loginFormRow {
    display: block;
    margin: 10px 0;
}
.loginFormMain .loginFormRow .loginFormCol {
    display: block;
    position: relative;
}
.loginFormMain .loginFormRow .loginFormCol > i {
    display: inline-block;
    position: absolute;
    top: 0;
    left: 0;
    color: #2e3192;
    font-size: 16px;
    height: 50px;
    line-height: 50px;
    text-align: center;
    width: 40px;
}
.loginFormMain .loginFormRow .loginFormCol input[type="text"],
.loginFormMain .loginFormRow .loginFormCol input[type="email"],
.loginFormMain .loginFormRow .loginFormCol input[type="password"] {
    width: 100%;
    height: 50px;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid 1px #ddd;
    text-indent: 40px;
    box-shadow: none;
}
.loginFormMain .signInBtns button,
.loginFormMain .signInBtns a {
    padding-left: 20px;
    padding-right: 20px;
}
.loginFormMain .forgotPwdBtn a {
    color: #999;
    font-size: 12px;
}
.loginFormMain .forgotPwdBtn a:hover {
    text-decoration: underline;
    color: #000;
}
.loginFormMain label[for="remember"] {
    font-weight: normal;
}
/*signInwithsocial*/
.signInwithsocial {
    display: block;
    clear: both;
    padding: 0 0 10px 0;
    text-align: center;
}
.signInwithsocial > label {
    display: block;
    font-weight: normal;
    margin-bottom: 10px;
}
.signInwithsocial a {
    display: inline-block;
    margin: 0 15px;
}
.signInwithsocial a i {
    display: inline-block;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    background: #2e3192;
    color: #fff;
    font-size: 18px;
    border-radius: 50%;
}
/*uploadFileLabel*/
.uploadFileLabel {
    display: inline-block;
    padding: 30px;
    background: #fff;
    box-shadow: 0 5px 30px rgba(0,0,0,0.2);
    border: dashed 3px rgba(0,0,0,0.1);
    border-radius: 10px;
    text-align: center;
    color: #999;
    cursor: pointer;
    margin-bottom: 20px;
}
.uploadFileLabel > i {
    display: block;
    font-size: 42px;
    text-align: center;
    margin: 0 auto;
    border-radius: 50%;
    height: 100px;
    width: 100px;
    line-height: 100px;
    background: #2e3192;
    color: #fff;
}
.uploadFileLabel:hover > i {
    background: #FFEA3A;
    color: #2e3192;
}
.uploadFileLabel > span {
    display: none;
    padding: 10px 0 0 0;
    border-top: solid 1px #ddd;
    font-size: 18px;
    color: #2e3192;
    clear: both;
    float: left;
    width: 100%;
    margin-top: 15px;
    font-weight: bold;
}
.uploadFileLabel > input[type="file"] {
    display: block;
    position: absolute;
    visibility: hidden;
    opacity: 0;
    left: 0;
    right: 0;
}
.uploadFileLabel > input[type="submit"] {
    display: block;
    position: relative;
    margin: 10px auto 0 auto;
}
/*contactPageSection*/
.contactPageSection {
    display: block;
    width: 100%;
    height: auto;
    min-height: 400px;
    position: relative;
    clear: both;
    padding: 40px 0;
}
/*contactAddDetails*/
.contactAddDetails {
    display: block;
    clear: both;
}
.contactAddDetails:after {
    content: '';
    display: block;
    clear: both;
}
.contactAddDetails > p {
    display: block;
    padding: 0 0 0 40px;
    font-size: 18px;
    position: relative;
}
.contactAddDetails > p > i {
    position: absolute;
    top: 0;
    left: 0;
    font-size: 18px;
    color: #2e3192;
}
.contactAddDetails > p strong {
    font-weight: normal;
}
.rating-container .empty-stars,
.rating-container .filled-stars {
    color: #2e3192 !important;
}
.rating-container .filled-stars {
    -webkit-text-stroke: 1px #2e3192 !important;
    text-shadow: 2px 1px #2e3192 !important;
}
.rating-container .label.label-default {
    background: #2e3192 !important;
}
/*arlanguage*/
/*@import url('https://fonts.googleapis.com/css?family=Tajawal:400,700&display=swap');*/

body.arlanguage {
    font-family: 'Tajawal', sans-serif;
}
body.arlanguage {
    direction: rtl;
}
body.arlanguage,body.arlanguage p,
body.arlanguage h1,body.arlanguage h2,body.arlanguage h3,body.arlanguage h4,body.arlanguage h5,body.arlanguage h6 {
    font-family: 'Tajawal', sans-serif;
}
body.arlanguage,
body.arlanguage p {
    font-size: 18px;
    line-height: 30px !important;
}
body.arlanguage .bannerSlider {
    direction: ltr;
    text-align: right;
}
body.arlanguage .navbar-collapse > ul > li > a {
    font-family: 'Tajawal', sans-serif;
    letter-spacing: 0;
    font-size: 20px;
}
body.arlanguage .navigTop .pull-left {
    float: right !important;
}
body.arlanguage .navigTop .pull-right {
    float: left !important;
}
body.arlanguage .topHeader .col-md-2.col-sm-2,
body.arlanguage .topHeader .searchboxCol,
body.arlanguage .topHeader .mycartCol {
    float: right;
}
body.arlanguage .selectLabel {
    margin-top: 4px;
}
body.arlanguage .selectLabel > i {
    right: initial;
    left: 10px;
    top: 8px;
}
body.arlanguage .mycartContainer {
    float: left;
}
body.arlanguage .myAccount {
    float: right;
}
body.arlanguage .mycarthead > span {
    right: initial;
    left: -12px;
}
body.arlanguage .searchbox button {
    right: initial;
    left: 2px;
}
body.arlanguage .navbar-collapse > ul > li > ul {
    text-align: right;
}
body.arlanguage .featProductBlock:before {
    right: -17%;
    left: initial;
    transform: skew(25deg);
}
body.arlanguage .featProductBlock img {
    left: 0;
    right: initial;
}
body.arlanguage .productBlock .productBlockViewDtl a {
    margin: 5px;
    padding: 5px 20px;
}
body.arlanguage .productBlock .productBlockInfo .wishlist-btn {
    line-height: normal;
}
body.arlanguage .productBlock .productBlockInfo .wishlist-btn i {
    padding-left: 3px;
}
body.arlanguage .productBlock .productBlockViewDtl a.btn1 i.fa-arrow-circle-right {
    transform: rotate(180deg);
}
body.arlanguage .subscribeForm button {
    right: initial;
    left: 0;
    border-radius: 4px 0 0 4px;
}
body.arlanguage .footer-top-area > .container > .row .col-md-4.col-sm-4{
    float: right;
}
body.arlanguage .categoryMainSection > .container > .row > .col-md-3.col-sm-12,
body.arlanguage .innerPageSection > .container > .row > .col-md-3.col-sm-3 {
    float: right;
}
body.arlanguage .sidebarNew .leftmenuList > ul {
    margin-left: 0;
    margin-right: 15px;
}
body.arlanguage .item-list-tophead h4 {
    float: none;
}
/*body.arlanguage .productDetailsRow .col-md-4.zoomImageSlider {
    float: right;
}
body.arlanguage .col-md-offset-1.col-md-7 {
    margin-left: 0;
    margin-right: 8.33333333%;
}*/
body.arlanguage .small-container,
body.arlanguage .small-img,
body.arlanguage .owl-carousel {
    direction: ltr;
}
body.arlanguage .small-img {
    left: 0;
}
body.arlanguage .relatedProducts .item {
    direction: rtl;
}
body.arlanguage .product-title {
    display: block;
    margin-bottom: 15px;
}
body.arlanguage .product-title .wishlist-btn {
    line-height: normal;
}
body.arlanguage .inStockStatus div.btn {
    margin: 0 0 0 10px;
}
body.arlanguage .customerReviewRow {
    float: right;
}
body.arlanguage .cartBlockDesc,
body.arlanguage .cartBlockRate,
body.arlanguage .cartBlockQty,
body.arlanguage .cartBlockTotal {
    float: right;
}
body.arlanguage .cartBlockTotal {
    position: relative;
}
body.arlanguage .cartBlockRow .cartBlockTotal > .totalCartRemoveBtn {
    right: initial;
    left: 10px;
}
body.arlanguage .cartBlockDesc .cartBlockImg {
    margin-right: 0;
    float: right;
    margin-left: 10px;
}
body.arlanguage .cartBlockRowFooter .cartBlockRowFooterMargin {
    float: right;
}
body.arlanguage .cartBlockRowFooter .cartBlockRowFooterLastCol .cartBlockRowFooterInfo,
body.arlanguage .cartBlockRowFooter .cartBlockRowFooterLastCol .cartBlockRowFooterTotal {
    float: right;
}
body.arlanguage .cartBlockRowFooter .cartBlockRowFooterLastCol .btn-primary i.fa-arrow-circle-right,
body.arlanguage .btn > i.fa-arrow-circle-right {
    transform: rotate(180deg);
}
body.arlanguage .checkOutTabs .nav-tabs > li,
body.arlanguage .checkOutTablayout .tab-pane .col-sm-4,
body.arlanguage .checkOutTablayout .tab-pane .col-sm-6,
body.arlanguage div.bhoechie-tab-menu {
    float: right;
}
body.arlanguage .addressShippingSelect h5,
body.arlanguage .addressShippingSelect p {
    padding: 0 30px 0 0;
}
body.arlanguage .addressShippingSelect h5 i,
body.arlanguage .addressShippingSelect p i {
    left: initial;
    right: 0;
}
body.arlanguage .pretty {
    margin-right: 0;
    margin-left: 1em;
}
body.arlanguage .pretty.p-svg .state .svg,
body.arlanguage .pretty .state label:after,
body.arlanguage .pretty .state label:before {
    left: initial;
    right: 0;
}
body.arlanguage div.bhoechie-tab-menu div.list-group>a.active:after {
    left: initial;
    right: 100%;
    border-left: initial;
    border-right: 10px solid #2e3192;
}
body.arlanguage .bhoechie-tab-menu .list-group .list-group-item h4 {
    font-family: initial;
}
body.backgroundimage {
    background: url('../../../public/images/layout_images/backgroundimage.png') repeat;
}
/*proListView*/
.proListView {
    display: block;
    clear: both;
    width: 100%;
    margin: 15px 0;
    padding-bottom: 10px;
    border-bottom: solid 1px #ddd;
}
.proListView:after {
    content: '';
    display: block;
    clear: both;
}
.proListView .rightView {
    float: right;
}
.proListView .rightView > p,
.proListView .rightView > ul {
    display: inline-block;
}
.proListView .rightView > p {
    margin-right: 5px;
    font-size: 13px;
    color: #999;
}
.proListView .rightView > ul > li {
    display: inline-block;
    list-style-type: none;
    margin: 0 3px 0 0;
}
.proListView .rightView > ul > li:last-child {
    margin-right: 0;
}
.proListView .rightView > ul > li > a {
    display: inline-block;
    padding: 0;
    width: 34px;
    height: 34px;
    text-align: center;
    line-height: 34px;
    border: solid 1px #ddd;
    color: #2e3192;
    font-size: 16px;
}
.proListView .rightView > ul > li > a:hover {
    background: #FFEA3A;
    color: #2e3192;
    border-color: transparent;
}
.proListView .rightView > ul > li > a.proListViewBtnsActive {
    background: #2e3192;
    color: #FFEA3A;
    border-color: transparent;
}
/*rowCol1ProductBoxClass*/
.rowCol1ProductBoxClass {
    width: auto !important;
    height: auto;
    float: none !important;
    clear: both !important;
}
.rowCol1ProductBoxClass .productBlock:after {
    content: '';
    display: block;
    clear: both;
}
.rowCol1ProductBoxClass .productBlock .productBlockImg {
    width: 23.5%;
    height: auto;
    float: left;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: 2;
}
.rowCol1ProductBoxClass .productBlock .productBlockImg > div {
    position: absolute;
}
.rowCol1ProductBoxClass .productBlock .productBlockInfo {
    width: auto;
    text-align: left;
    padding: 20px 20px 10px 25%;
    z-index: 1;
}
.rowCol1ProductBoxClass .productBlock .productBlockViewDtl {
    position: relative;
    padding: 0 0 20px 25%;
    visibility: visible;
    opacity: 1;
    text-align: left;    
}
.rowCol1ProductBoxClass .productBlock .productBlockViewDtl a {
    top: 0;
    display: inline-block;
    margin: 0 5px 0 0;
}
.rowCol1ProductBoxClass .productBlock:hover .productBlockImg > div {
    opacity: 1;
}

@media (min-width: 767px) {
    .senderReceiverFormCol > .col-md-6:first-child {
        border-right: solid 1px #ddd;
    }
}

/*thanksVideoBlock*/
.thanksVideoBlock:before {
    content: '';
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #000;
    opacity: 0.5;
    z-index: -1;
}
.thanksVideoBlock {
    display: block;
    position: fixed;
    top: 15%;
    left: 0;
    right: 0;
    z-index: 2000;
    margin: 0 auto;
    height: 70%;
    width: 60%;
    box-shadow: 0 10px 50px rgba(0,0,0,0.5);    
}
.thanksVideoBlock > div.thanksVideoBlockInner {
    display: block;
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
}
.thanksVideoBlock iframe {
    position: absolute;
    width: 120%;
    height: 120%;
    top: -10%;
    left: -10%;
    border: solid 5px #fff;
}
.closeThanksVideo {
    display: block;
    width: 40px;
    height: 40px;
    line-height: 36px;
    border: solid 2px #fff;
    text-align: center;
    background: #2e3192;
    color: #FFEA3A;
    font-size: 22px;
    border-radius: 50%;
    position: absolute;
    top: -20px;
    right: -20px;
    z-index: 20;
    cursor: pointer;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}
.closeThanksVideo:hover {
    background: #FFEA3A;
    color: #2e3192;
}

/*misc*/
.categoryMainSection {
    padding-bottom: 50px;
}
.heading,
.heading2 {
    display: block;
    position: relative;
}
.heading2 {
    padding: 0 0 10px 0;
}
.heading span {
    display: inline-block;
    position: relative;
    padding: 0 10px;
    background: #fff;
    color: #FFEA3A;
}
.heading:before {
    display: block;
    content: "";
    width: 50%;
    position: absolute;
    margin: 0 auto;
    left: 0%;
    right: 0%;
    height: 2px;
    background: #ccc;
    top: 20px;
}
.heading2:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100px;
    height: 2px;
    background: #2e3192;
}
.heading-center {
    display: block;
    position: relative;
    width: 100%;
    height: auto;
    margin-bottom: 40px;
}
.heading-center:after {
    display: block;
    content: "";
    width: 100%;
    position: absolute;
    margin: 0 auto;
    left: 0%;
    right: 0%;
    height: 2px;
    background: #2e3192;
    top: 55%
}
.heading-center span {
    display: inline-block;
    position: relative;
    z-index: 10;
    padding: 0 15px 0 0;
    background: #fff;
    color: #222;
}
.heading-center strong {
    font-weight: 400;
    font-style: italic;
}
.space50 {
    display: block;
    padding: 50px 0;
    clear: both;
}
.space30 {
    display: block;
    padding: 30px 0;
    clear: both;
}
.space20 {
    display: block;
    padding: 20px 0;
    clear: both;
}
.space15 {
    display: block;
    padding: 15px 0;
    clear: both;
}
.space10 {
    display: block;
    padding: 10px 0;
    clear: both;
}
.space5 {
    display: block;
    padding: 5px 0;
    clear: both;
}
.container {
    position: relative;
    z-index: 10;
}


.btn {
    border-radius: 0 !important;
    border: none;
}
.btn-primary {
    background: #2e3192 !important;
    color: #fff;
}
.btn-primary:hover,
.btn-primary:active,
.btn-primary:active,
.btn-transparent:hover {
    background: #FFEA3A !important;
    color: #2e3192 !important;
}
.btn-transparent {
    display: inline-block;
    padding: 8px 15px;
    border: solid 2px #fff;
    color: #fff;
    font-size: 18px;
    font-weight: 600;
    transition: all 300ms ease-in-out;
}
.btn-transparent:hover {
    background: #FFEA3A;
    text-decoration: none;
    color: #2e3192;
    border-color: transparent;
}
.btn-rounded {
    border-radius: 50px !important;
}
.btn-default2 {
    color: #2e3192 !important;
    border: solid 1px #2e3192 !important;
    background: transparent;
    outline: none;
}
.btn-default2:hover,
.btn-default2:focus,
.btn-default2:active {
    background: #2e3192 !important;
    color: #fff !important;
    outline: none;
}

/**********scrollUp**********/
.scrollup {
    width:42px;
    height:42px;
    line-height: 42px;
    font-size: 22px;
    opacity:0.9;
    position:fixed;
    bottom: 90px;
    right: 20px;
    z-index: 1000;
    display:none;           
    background: #2e3192;
    color: #fff;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    border-radius: 50%;
}
.scrollup:hover,.scrollup:active,.scrollup:focus {
    opacity:1;
    color: #fff;
}

/*******Visibility divs***********/
.hidden_element {
    opacity:1;
}
.visible_element {
    opacity:1;
}
/*.headerSearch {
    display: inline-block;
    position: relative;
    margin: 0 auto;
    left: 0px;
    right: 0px;
}*/
.finalResult {
    background: #fff;
    box-shadow: 0 5px 25px rgba(0,0,0,0.3);
    height: auto;
    max-height: 300px;
    overflow: auto;
    padding: 10px 0px 0px 30px;
    border-radius: 10px; 
    position: absolute;
    width: 100%;
}
.finalResult{
    background: #fff;
    box-shadow: 0 5px 25px rgba(0,0,0,0.3);
    height: auto;
    max-height: 200px;
    overflow: auto;
    padding: 0;
    /*border-radius: 8px;*/
}
.finalResult a{
    display: block;
    padding: 12px 100px 12px 12px !important;
    border-bottom: solid 1px #ccc;
    text-align: left;
}
.finalResult a:hover{
    background:transparent;
    color: #333;

}
.finalResult a:last-child{
    display: none;
}
.finalResult .addtocart-btn-search-wrap{
    position: relative;
}
.finalResult a.addtocart-btn-search{
    position: absolute;
    right: 10px;
    top: 5px;
    width: 77px;
    text-align: center;
    height: 35px;
    padding: 5px 0px !important;

}
.finalResult .searchprice {
    margin: 0;
    padding: 0;
    position: relative;
    right: 0;
    font-weight: 500;
    color: #2e3192;
}
.finalResult .searchprice:before {
    content: '-';
    padding: 0 3px;
}
.finalResult a.addtocart-btn-search {
    position: absolute;
    right: 10px;
    top: 5px;
    width: 77px;
    text-align: center;
    height: 35px;
    padding: 5px 0px !important;
    border-radius: 20px;
}
.finalResult a:hover {
    background: transparent;
    color: #333;
}
.finalResult .addtocart-btn {
    background: #FFEA3A;
    color: #2e3192;
    border: 1px solid transparent;
}
.finalResult .addtocart-btn:hover {
    background: #2e3192;
    color: #fff;
    text-decoration: none;
}
.minus, .plus {
    display: inline-block;
    float: left;
    width: 35px !important;
    height: 35px !important;
    line-height: 35px;
    border: none;
    background: #FFEA3A;
    font-size: 15px !important;
    font-weight: 400;
    position: relative;
    color: #2e3192;
    border-radius: 50%;
}

/*mediaqueries*/
@media (max-height: 768px) {
    .featSection {
        height: 95%;
    }
}

@media (max-width: 1366px) {
    .inner-slide {
        height: 350px;
    }
    .inner-slide .feat-btn {
        left: 10%;
        right: 10%;
    }
    .subscribeForm input {
        width: 100%;
        margin-bottom: 5px;
    }
    .subscribeForm button {
        float: right;
    }
    .footer-social a {
        /*padding-top: 1px;
        height: 30px;
        width: 30px;*/
        margin-right: 1px;
    }
    .containerWrapper,
    .navigationBar > .topHeader .container,
    .innerPageSection > .container,
    .categoryInner > .container,
    .categoryMainSection > .container,
    .container {
        padding: 0 40px;
    }
}

@media (max-width: 1280px) {    
    .navigation-box ul li a {
        /*font-size: 13px;*/
    }
    .main-header .row {
        margin-left: -3px;
        margin-right: -3px;
    }
    .main-header .row .col-sm-2,
    .main-header .row .col-sm-5,
    .main-header .row .col-sm-6 {
        padding-left: 3px;
        padding-right: 3px;
    }
    .productBlock .productBlockInfo .propricing {
        font-size: 22px;
    }
    .productBlock .productBlockImg {
        height: 160px;
    }
    .productBlock .productBlockInfo {
        z-index: initial;
    }
    .productBlock .productBlockViewDtl {
        bottom: initial;
        padding: 30% 0;
    }
    .productBlock .productBlockViewDtl a {
        font-size: 13px;
        padding: 10px 20px;
    }
}

@media (max-width: 1200px) {
    .mycartContainer {
        width: 100%;
        float: none;
    }
    .myAccount {
        margin-right: 0;
    }
    .containerWrapper {
        /*padding: 0 50px;*/
    }
    .container {
        width: auto;
        padding-left: 50px;
        padding-right: 50px;
    }
    .mycartbox {
        padding-left: 10px;
        padding-right: 10px;
        margin: 10px 0 0 0;
        height: 40px;
        line-height: 40px;
        font-size: 13px;
    }
    .bannerSlider .item .bannerCaption {
        left: 50px;
    }
}

@media (max-width: 1100px) {
    .topHeader .container .row .col-sm-5:last-child {
        padding-left: 0;
    }
    .container {
        padding-left: 30px;
        padding-right: 30px;
    }
    .navbar-collapse > ul > li > a {
        padding: 0 8px;
        /*font-size: 14px;*/
    }
    .productBlock .productBlockViewDtl a {
        font-size: 14px;
    }
    .productCol .row .col-sm-3 {
        width: 25%;
    }
    .selectLabel {
        margin-right: 0;
    }
    .selectLabel > select {
        padding: 0;
    }
    .selectLabel:hover {
        box-shadow: none;
    }
    .footer-top-area .container > .row > .col-md-4.col-sm-4 {
        margin-bottom: 30px;
    }
    .footer-top-area .container > .row > .col-md-4.col-sm-4,
    .footer-top-area .container > .row > .col-md-8.col-sm-8 {
        width: auto;
        float: none;
        clear: both;
    }
}

@media (max-width: 1024px) {
    .container {
        padding-left: 20px;
        padding-right: 20px;
    }
    .productBlock .productBlockInfo .propricing {
        font-size: 20px;
    }
    .productCol .row .col-sm-3 {
        width: 25%;
    }
}

@media (max-width: 991px) {
    .navigTop {
        float: none;
    }
    .containerWrapper,
    .navigationBar > .topHeader .container,
    .innerPageSection > .container,
    .categoryInner > .container,
    .categoryMainSect0ion > .container,
    .container {
        padding: 0 20px;
    }
    .topHeader .container .row .col-md-2.col-sm-2 {
        width: 25%;
    }
    .topHeader .container .row .col-sm-5.searchboxCol {
        width: 75%;
    }
    .topHeader .container .row .col-sm-5:last-child {
        float: none;
        width: auto;
        clear: both;
        padding-left: 15px;
    }
    .myAccount,
    .mycartbox {
        margin-top: 0;
    }
}

@media (max-width: 768px) {
    .topHeader .col-md-3.col-sm-3 {
        width: 100%;
        text-align: center;
    }
    /*.navbar-collapse > ul > li.sellwithUsBtn {
        border: none !important;
    }*/
    .navbar-collapse > ul > li,
    .navbar-collapse > ul > li:last-child {
        border: solid 1px rgba(255,255,255,0.1);
        margin: 3px 0;
    }
    .featCol {
        width: 100%;
        float: none;
        margin-bottom: 12px;
    }
    .productCol .row .col-sm-3 {
        width: 50%;
    }
    .footer-top-area .col-md-4.col-sm-4,
    .footer-top-area .col-md-8.col-sm-8 {
        width: 100%;
        margin-bottom: 15px;
    }
}

@media (max-width: 767px) {
    .navigTop {
        margin: 0;
        text-align: center;
        float: none;
    }
    .topHeader .container .row .col-md-2.col-sm-2,
    .topHeader .container .row .col-sm-5.searchboxCol {
        float: none;
        width: auto;
        text-align: center;
        clear: both;
    }
    .searchbox {
        float: none;
        margin: 0 0 15px 0;
    }
    .topHeader .col-sm-5, .topHeader .col-sm-4 {
        width: auto;
    }
    .mycartContainer {
        text-align: center;
    }
    .myAccount,
    .mycartbox {
        float: none;
        display: inline-block;
    }
    .myAccount {
        margin: 0 10px 0 0;
    }
    .myAccount .nav > li {
        display: inline-block;
    }
    .navbar-nav {
        margin: 0;
    }
    .navbar-collapse > ul > li {
        width: 100%;
        float: none;
        border-top: none;
        border-left: none;
        border-right: none;
    }
    .navbar-default .navbar-toggle {
        border-color: transparent;
        background: #fff;
        border-radius: 0;
    }
    .navbar-collapse > ul > li > ul {
        width: 100%;
    }
    .bannerSection {
        height: 400px;
    }
    .bannerSlider .item .bannerCaption h2 {
        font-size: 22px;
        padding: 10px 20px;
    }
    .productCol .row .col-sm-3 {
        float: left;
        clear: none;
    }
    .container {
        padding-left: 15px;
        padding-right: 15px;
    }
    .tablayout1 {
        display: flex;
    }
    .tablayout1 li a {
        font-size: 14px;
        min-height: 65px;
    }
    .relatedProductsSection {
        display: block;
        padding: 30px 15px;
    }
    .wishlist-btn {
        margin-left: 0;
    }
    .inStockStatus {
        padding-top: 10px;
    }
    body.arlanguage .categoryMainSection > .container > .row > .col-md-3.col-sm-12,
    body.arlanguage .innerPageSection > .container > .row > .col-md-3.col-sm-3 {
        float: none;
    }
}

@media (max-width: 460px) {
    .featProductBlock::before {
        width: 100%;
        left: -20%;
    }
    h2 {
        font-size: 30px;
    }
    .heading-center {
        margin-bottom: 15px;
    }
    .productCol .row .col-sm-3 {
        width: auto;
        float: none;
        clear: both;
    }
    .productBlock .productBlockImg {
        height: 300px;
    }
    .scrollup {
        bottom: 0;
        right: 0;
        border-radius: 0;
    }
}

.cartBlockCoupon {
    width: 15%;
    float: left;
}

.success_green{
    color: green;
}

.error_red{
    color: red;   
}
ul.nav.navbar-nav {
    padding-left: 65px!important;
}

</style>
<link rel="stylesheet" href="{{URL::asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{URL::asset('assets/css/styles.css') }}">
<!-- End of navigationBar -->
<!-- category page section -->
<?php //dd($getdata);?>
<?php //dd($getData);?>
<div id="loaderss"></div>         
<div class="categoryInner">
    <div class="innerBannerSection productSubPageBanner">

        <div class="innerBannerImg" style="background: url('http://xtacky.com/assets/images/inner-banner.jpg') no-repeat center;">
            <!--            <div class="container">
                            <h1><?php //echo ucwords($product_name)?> </h1>
                        </div>-->
        </div>
    </div>
    <!-- breadcrumbs -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">

                    <ul>
                        <li><a href="<?php echo url('/'); ?>"><i class="fa fa-home"></i></a> <i class="fa fa-angle-right"></i> </li>
                        <?php
						foreach($getData as $data){							
                        $pro_name = json_decode($data->product_name, true);						
						$product_url = $data->url;
						//print_r($product_url);exit;
						
                        ?>
                        <li><a href="<?php echo url('/'); ?>/<?php echo strtolower($product_url); ?>"><?php //echo ucwords($pro_name[$en]) ?></a> <i class="fa fa-angle-right"></i> </li>
                        <li><b><?php //echo strtoupper($pro_name)?></b></li>
						<?php }?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="proListView">
			<div class="rightView">
				<p>Change view:</p>
				<ul>
				    <li><a class="proListViewBtns gridColViewBtn" href="#"><i class="fa fa-th-large"></i></a></li>	
                    <li><a class="proListViewBtns rowColViewBtn" href="#"><i class="fa fa-list"></i></a></li>
					
				</ul>
			</div>
		</div>
    </div>
    
    <div class="space10"></div>
    <div class="categoryMainSection">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
<!--                    <div class="inner-sidebar-list sidebarNew">
                        <div class="leftBlockHeading"><?php //echo ucwords($pro_name[$language]) ?> </div>
                        <div class="leftmenuList">
                            <ul>
                                <?php
                               // foreach ($getCategoryproduct as $catproduct) {
                                   // $cat_pro_name = json_decode($catproduct->product_name, true);
                                    ?>
                                    <li>
                                        <a href="<?php //echo url('/productdetails'); ?>/<?php //$catproduct->url ?>"><?php //echo ucwords($cat_pro_name[$language]); ?></a>
                                    </li>
                                <?php //} ?>
                            </ul>
                        </div>
                    </div>-->
                     <div class="inner-sidebar-list sidebarNew">
                        <h3>{{ __('message.Filter By') }}:</h3> 
                        <div class="sidebar-filter-box">
                                    <h4 class="sidebar-heading"><i class="fa fa-plus"></i>{{ __('message.Sort Price By') }}</h4>
                                     <div class="price-ranger">
                                         <div class="extra-controls-max">
                                             <input type="radio" value="#" name="chechkhigherprice" class="common_sub_selector-higher" /> <label>Higher to Lower</label>
                                         </div>
                                         <div class="extra-controls-lower">
                                             <input type="radio" value="#" name="chechkhigherprice" class="common_sub_selector-lawer" /> <label>Lower to  Higher</label>
                                         </div>
                                    </div>
                                </div>
                          <div class="sidebar-filter-box">
                                    <h4 class="sidebar-heading"><i class="fa fa-plus"></i>{{ __('message.Price') }}</h4>
                                    <div class="price-ranger">
                                        <input type="hidden" id="hidden_minimum_price" value="0" />
                                        <input type="hidden" id="cateoryname" value="<?php //echo $id; ?>" />
                                        <input type="hidden" id="pagename" value="<?php //echo 'subcat'; ?>" />
                                        <p id="price_show"></p>
                                        <div class="price-ranger range-slide" id="price_range">
                                            <input type="text" class="js-range-slider" id="pricerange1" name="example_name" value="" />
                                        </div>
                                        <div class="extra-controls">
                                            <button class="js-get-values pricesidebarbtn">{{ __('message.Price Search') }}</button>
                                        </div>
                                        
                                        
<!--                                        <div class="price-ranger">
                                            <p><strong>Price</strong></p>
                                            <input type="text" id="pricerange1" name="example_name" value="" />
                                        </div>-->
                                    </div>
                                </div>
                        <div class="sidebar-filter-box">
                                    <h4 class="sidebar-heading"><i class="fa fa-plus"></i>{{ __('message.Most Selling') }}</h4>
                                    <div>
                                        <!--<form action="#" class="checkbox-radio-style1 active-sidebar-box">-->
                                            <?php 
                                           
                                        //foreach (array_slice($getParentSubCategorycate,0,1) as $parentmaincat) {
                                           
                                       // $mcat_Name = json_decode($maincat->category_name, true);
                                        
                                        ?>
                                            <p>
                                                <input type="checkbox" value="<?php //echo $id; ?>" name="chechkmostselling" class="common_subseleing_selector brandseling" />
                                                <label>
                                                    <span class="checkmark"></span>
                                                         </label> 
                                            </p>
                                        <?php //} ?>

                                    </div>
                                </div>

                            
                            <div class="sidebar-filter-box">
                                <h4 class="sidebar-heading"><i class="fa fa-plus"></i>{{ __('message.Brand') }}</h4>
                                <div>
                                    <!--<form action="#" class="checkbox-radio-style1 active-sidebar-box">-->
                                        <?php 
                                        
                                    //foreach (array_slice($getParentSubCategorycate,0,1) as $parentmaincat) {
                                        
                                    // $mcat_Name = json_decode($maincat->category_name, true);
                                    
                                    ?>
                                        <p>
                                            <input type="radio" checked value="<?php //echo $id; ?>" name="chechkbrandfilter" class="common_subseleing_selector brandseling" />&nbsp;&nbsp;<?php //echo ucwords($name) ?> - <?php //echo ucwords($pro_name[$language]) ?>
                                            <label>
                                                <span class="checkmark"></span>
                                                        </label> 
                                        </p>
                                    <?php //} ?>

                                </div>
                            </div>
                                
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
						<!--?php
				    $total_pagination = $poductdata->lastPage();					
					$current_page = app('request')->input('page');						
					$default_page = 1;					
					$product_count_right = $poductdata->count();
					
					$product_count_last = $product_count_right + 1;
					$product_count_last_right = $product_count_last + $product_count_right;
				
					if($default_page != $current_page){
						$default_page = $product_count_last;
					}
					
					if($default_page != $current_page){
						$product_count_right = $product_count_last_right;
					}
					
					if($default_page != $current_page && $current_page == $total_pagination){
						$temp_tot = $poductdata1->count() - $poductdata->count();
						$default_page = $temp_tot + 1;
						$product_count_right = $poductdata1->count();
					}
									
					?-->
                   
                   
                    
                    <div class="row rightBlock" id="post-data">                        
                      <?php foreach ($getData as $catproduct) { //dd($catproduct);
					  //dd($catproduct->product_image);
					  ?>
                            <div class="col-sm-3 product-box-class">
                                <div class="productBlock productBlockCat">
                                    <?php
                                    $urlname = $catproduct->product_name;
                                    $productfullname = str_replace(' ', '-', $urlname);
//                                    $prod_name = json_decode($catproduct->product_name, true);
                                    ?>
                                    <a href="<?php echo url('/productdetails'); ?>/{{$catproduct->url }}" class="productBlockImg">
                                        <?php if (!empty($catproduct->discount)|| $catproduct->discount !=0) { ?>
                                        <span class="discountoffer">
                                        <?php echo $catproduct->discount; ?> % {{ __('message.Off') }}
                                        </span>
                                            <?php
                                        } else {
                                            
                                        }
                                        ?>
                                        <div style="background: url('../public/images/{{ $catproduct->product_image }}') top no-repeat;"></div>
                                    </a>
                                    <div class="productBlockInfo">
                                        <a href="<?php echo url('/productdetails'); ?>/{{$catproduct->url }}" class="titlelink"><?php echo ucwords($catproduct->product_name); ?></a>
                                  
                                         <div class="loaderWrapperAjax loader-wrapper<?php echo $catproduct->product_id;?>" style="display: none;"><img src="{{ URL::to('public/assets/images/ajax-loader.gif') }}"></div>
                                        <div class="productInfoMsgAlert addtowishmessage<?php echo $catproduct->product_id;?>" ></div>
                                        <button  data-id="<?php echo $catproduct->product_id;?>" class="wishlist-btn addtowishlist"> {{ __('message.Add to Wishlist') }}  </button>
                                        
                                        <h2 class="propricing">
                                            ${{ $catproduct->product_price }}
                                           <?php
                                        
                                        if (!empty($catproduct->discount || $catproduct->discount != 0 || $catproduct->product_price != $catproduct->original_price)) { ?>
                                        <small style="text-decoration: line-through;">${{ $catproduct->original_price }}</small> 
                                      <?php
                                        } else {
                                            
                                        }
                                        ?>
                                        
                                        </h2>                                        
                                    </div>
                                    <div class="productBlockViewDtl">
                                        <a href="<?php echo url('/productdetails'); ?>/{{$catproduct->url }}" class="btn1">{{ __('message.view details') }} <i class="fa fa-arrow-circle-right"></i></a>
                                        <a href="{{ url("/add-to-cart/{$catproduct->product_id}") }}" class="btn2" onClick="cart()">{{ __('message.Add To Cart') }} <i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
						
						<script>
						
						
						function cart(){
							document.getElementById('loaderss').style.display="block";
						}
						</script>
						
					

                    </div>
                    <div class="clear row innerproductCol" id="postfilterdata">
              
                </div>

                </div>
            </div>
              <!--<div class="ajax-load text-center" style="display:none">
            <p><img src="{{ URL::to('public/assets/images/ajax-loaderproduct.gif') }}"></p>
             </div>-->
        </div>
    </div>
</div>


