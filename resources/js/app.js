
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$('ul.pagination').hide();
$(function() {
    $('.infinite-scroll').jscroll({
        autoTrigger: true,
        loadingHtml: '<div class="text-center py-3"> <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>',
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.infinite-scroll',
        callback: function() {
            $('ul.pagination').remove();
        }
    });
});

$(document).ready(function() {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.action-follow').click(function(){
        var user_id = $(this).data('id');
        var cObj = $(this);
        var c = $(this).parent("div").find(".tl-follower").text();


        $.ajax({
            type:'POST',
            url:'/ajaxRequest',
            data:{user_id:user_id},
        success:function(data){
            console.log(data.success);
            if(jQuery.isEmptyObject(data.success.attached)){
                cObj.find("strong").text("Подписаться").addClass("btn-info text-white");
                cObj.parent("div").find(".tl-follower").text(parseInt(c)-1);
            }else{
                cObj.find("strong").text("Отписаться").removeClass("btn-info text-white");
                cObj.parent("div").find(".tl-follower").text(parseInt(c)+1);
            }
        }
    });
    });


});

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app'
// });
