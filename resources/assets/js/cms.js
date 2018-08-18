require('./bootstrap');

$("ul.tab>li").mouseover(function(){
    $(this).siblings().removeClass('active');
    $(this).addClass('active');
});
$("#left>i.close").click(function(){
    $(this).parent().css('display', 'none');
});
$("#popup>i.close").click(function(){
    $(this).parent().css('display', 'none');
});

window.Vue = require('vue');

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
