window.Laravel = { csrfToken: '{{ csrf_token() }}' };

/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.http.headers.common['Access-Control-Allow-Origin'] = 'http://192.168.1.10:3000';
Vue.http.headers.common['Access-Control-Request-Method'] = '*';
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');


const app = new Vue({
    el: '#app',

    //All data
    data: {
    	products: [], //Empty array for storing all items
		email: '',	//Setting empty email var
		year: new Date().getFullYear(), //Get full year for footer info
	},

	//Functions
	methods: {
		//Method for sending subscriber email via Ajax request
		submitSubscribeEmail: function (event) {

			//Getting subscriber form
			var subscribeForm = $('#subscribeForm');

			//Prevent Subscribe email form from submiting on common way
			event.preventDefault();

			//Getting the value from the subscribe email form that is entered by user  
			var subscribeEmail = this.email;

			//Send data via AJAX request to the root controller
			axios.post('/', {subscribeEmail: subscribeEmail}).then(function(response) {

				//If response form server is 200 etc. OK 
				if(response.status == 200) {

					//Show success message here (SweetAler)
					swal({
						title: "<span class='modalTextColorSuccessTitle'>Success</span>",
						text: "<span class='modalTextColorSuccess'>" + response.data.responseText + "</span>",
						showConfirmButton: false,
						timer: 3000,
						html: true,
					});

					//Then reset and clear subscribe email form 
					subscribeForm[0].reset();

					//Console log respones from server
					/*console.log(response.data);
					console.log(response.status);
					console.log(response.headers);*/
				}

			}).catch(function (error) {

				console.error(error);
				//If error status is equal to 422 (Laravel validate() send this status with users erorrs)
				if (error.response.status == 422) {
					//Show error message here (SweetAler)
					swal({
						title: "<span class='modalTextColorErrorTitle'>Warrning!</span>",
						text: "<span class='modalTextColorError'>" + error.response.data.subscribeEmail[0] + "</span>",
						showConfirmButton: true,
						confirmButtonColor: "#DD6B55",
						html: true,
					});
				}
				
				//Console log respones from server
				console.log(error.response.data);
				console.log(error.response.status);
				console.log(error.response.headers);
				console.log(error.response.data.subscribeEmail[0]);
			});
		},

		//Method for grabbing products items
		productsItems: function () {
			//Refering to the VUEJS this pointer
			var vm = this;

			//Getting data response from server at the /products end point
			axios.get('/products').then(function (response) {

				vm.products = response.data;

				/*console.log(response.data);
				console.log(response.status);
				console.log(response.headers);*/

			}).catch(function (error) {
				console.log(error.response.data);
				console.log(error.response.status);
				console.log(error.response.headers);
			});
		},
	},

	//Loads the function when page is ready
	mounted() {

		this.productsItems(); //Calling the func. for getting all product items from page
	},
});



//jQuery
$(document).ready(function(){
	//Calling the function
	scrollToTop();
	
	//Ajaxing
	
});

function scrollToTop() {
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0}, 800);
		return false;
	});
}

