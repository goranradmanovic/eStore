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
Vue.http.headers.common['Access-Control-Allow-Origin'] = 'http://192.168.1.10:8000';
Vue.http.headers.common['Access-Control-Allow-Origin'] = 'http://192.168.1.10:3000';
Vue.http.headers.common['Access-Control-Request-Method'] = '*';
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
Vue.http.options.crossOrigin = true;

const app = new Vue({
    el: '#app',

    //All data (apps vars)
    data: {
    	products: [], //Empty array for storing all items
    	categories: [], //Empty array for storing all categories items informations
		email: '',	//Setting empty email var
		year: new Date().getFullYear(), //Get full year for footer info
		loadMoreLink: null, //Var for storing link for next set of data
		preLoader: false, //Setting preloader to not show (for button show more)
		pageLoader: false, //Setting preloader to not show for the main page
		urlName: window.location.pathname.split('/')[2], //Setting url name ect. category/product
		urlID: null, //Setting URL ID for fetching all data for category/single product
		URL: window.location, // Page URL info (from global JS window object)
		query: '', //Query var from the nav search form
		searchProducts: [], //Setting empry array for searched product items

		//API Links
		apiCategories: '/api/categories', //API link for all categories for creating the nav linkd
		apiProducts: '/api/products', //API link for all products
		apiSingleCatProducts: '/api/category/', //Api link for single category products ('/api/category/' + categoryId)
		apiSingleProductItem: '/api/product/', //Api link for single products item ('/api/product/' + productId)
		apiSearchProductsItems: '/api/search/', //Api link for search for products ('/api/search/' + query)
	},

	//Componenets
	components: {

	},

	//Filter (custom filters for app)
	filters: {
		//Limiting text output to some length ect. 100 characters
		truncate: function (value) {
			return value.substring(0, 150) + ' ...';
		},
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

		//Method for slidingup flash success or warning message
		flashMessageHide: function () {
			//Getting the flash message success div and flash message warning div and holding that messages for 4sec and the slide it up, but not flash message error div
			$('.flash:has(.flash__message--success), .flash:has(.flash__message--warning)').not('.flash:has(.flash__message--error)').delay(4000).slideUp();
		},

		//Method for closing flash error message
		flashCloseError: function () {
			$('.flash__message--error--box').on('click', function() {
				$('.flash').slideUp();
			});
		},

		//Method for grabbing products items first (initial) page or single category products
		ajaxCall: function (apiLink) {
			//Refering to the VUEJS this pointer
			let vm = this;
			vm.pageLoader = true; //Turn on main page loader,until all product is downloaded
			vm.products = [];

			//Getting data response from server from the API
			axios.get(apiLink).then(function (response) {

				//If we are on product page, then we dont have pagination and we must use response.data for getting required single product data
				if (vm.urlName === 'product') {
					//Getting single product data
					vm.products = response.data;
					return; // Returning because we want to escape seting vm.products = response.data.data to undefined, because we dont have pagination
				}

				vm.products = response.data.data; //We are writing response.data.data because we use pagination method in Laravel, usualy we use only response.data
				vm.loadMoreLink = response.data.next_page_url; //Setting URL path for show more button (hitting the next link with new data)
				vm.pageLoader = false; //Turn off main page loader

				/*console.log(response.data);
				console.log(response.status);
				console.log(response.headers);*/

			}).catch(function (error) {
				/*console.log(error.response.data);
				console.log(error.response.status);
				console.log(error.response.headers);*/
			});
		},

		//Method for loading more product data on click of Load more btn
		loadMoreProducts: function () {
			let vm = this; //This is referencing data object
			let nextPageUrl = vm.loadMoreLink; //Accessing next page url from the products response from the server
			vm.preLoader = true; //Setting preloader to true and displaying to the user

			//Calling AJAX method for getting new set of data for displaying to the user
			axios.get(nextPageUrl).then(function (response) {

				//Adding more items (data) to the products array for displaying
				vm.products = vm.products.concat(response.data.data);
				//Checking if there is next link for new set of data for displaying, otherwise set to null (disable Load More Button)
				vm.loadMoreLink = (response.data.next_page_url) ? response.data.next_page_url : null;
				//Setting preloader to false and removing from displaying to the user
				vm.preLoader = false;
				
				/*console.log(response.data);
				console.log(response.status);
				console.log(response.headers);*/
			}).catch(function (error) {
				/*console.log(error.response.data);
				console.log(error.response.status);
				console.log(error.response.headers);*/
			});

			//Calling Animation function when new set of data is ready for displaying
			this.productsAnimation();
		},

		//Function for adding css class for animation
		productsAnimation: function () {
			
			//First set time out for wait to VUE to display articles wrapper div
			setTimeout(function() {
				//Get all articles wrapper and iterate over all divs
				$('.articles__wrapper').each(function(i) {
					//Set time out for adding article animation class to each el. one by one over time (150ms * i)
					setTimeout(function(){
						$('.articles__wrapper').eq(i).addClass('article__animation'); //Adding class to each article wrapper div el.
					}, 200 * i);
				});
			}, 200);
		},

		//Function for back to top button
		scrollToTop: function () {

			//Check to see if the window is top if not then display button
			$(window).scroll(function(){
				if ($(this).scrollTop() > 100) {
					$('.scrollToTop').css('dispaly: block'); //Set the el. to display block
					$('.scrollToTop').fadeIn(); //Fade in el. on the page when displaying
				} else {
					$('.scrollToTop').fadeOut(); //Face otu scroll to top btn if page height is smaller then 100px
				}
			});

			//Click event to scroll to top
			$('.scrollToTop').click(function(){
				$('html, body').animate({scrollTop : 0}, 800); //On the click on the scroll to top btn.,animate scrolling over 800 milisec.
				return false;
			});
		},

		//Method for getting all categories names and id-s for creating navigation links to category/1,2,3 ...
		loadCategoriesItems: function (apiLink) {

			let vm = this; //Asigne this from VUEJS object to vm var.

			//Fetch data from API
			axios.get(apiLink).then(function (response) {

				vm.categories = response.data; //Adding data from the API to categories var
				//console.log(vm.categories);

				/*console.log(response);
				console.log(response.data);
				console.log(response.status);
				console.log(response.headers);*/
			}).catch(function (error) {
				console.log(error.response.data);
				console.log(error.response.status);
				console.log(error.response.headers);
			});
		},

		//Function for getting URL id param from category URL link (category/1)
		getURLId: function (idPlaceholder) {
			let vm = this;
			idPlaceholder = vm.URL.pathname.split('/').pop(); //Getting the categories id from the URL
			
			//If categoryId is equal to undefined then return false,otherwise return categoryId
			return (typeof idPlaceholder == 'undefined') ? false : idPlaceholder;
		},

		//Function for selecting active nav tab
		activeNavTab: function () {
			let vm = this,
			//Getting category ID from URL
			urlCategoryID = vm.URL.pathname.split('/').pop(); //1, 2, 3, 4 ... (from URL)

			//Set time out on the selection of the nav links, because they are dinamicly generated
			setTimeout(function() {
				elTarget = $('.navbar-nav a[data-id="' +  urlCategoryID + '"]'); //Targeting 'a' el. from nav with specific data-id attr.
				elTarget.addClass('active'); //Then add class '.active' to select active tab
			}, 100);
		},

		//Function for searching Angolia i Laravel Scout API
		search: function () {
			
			var vm = this;

			//If user is entered empty value or if the enterd value is smaller then 5 chars, then return false
			if (vm.query.length < 0 || vm.query.length < 5) return;

			//Make request to the API with user enterd query
			axios.get(vm.apiSearchProductsItems + vm.query).then(function(response) {
				vm.searchProducts = response.data;
			}).catch(function(erorr) {
				console.log(error.response);
				console.log(error.response.status);
				console.log(error.response.headers);
			});
		},
	},

	//Loads the function when page is ready
	mounted() {

		this.productsAnimation(); //Calling func. for adding animation class to the products items

		this.loadCategoriesItems(this.apiCategories); //Calling the func. for getting all categories item informations

		//If currentURLId(this.productItemId) is equal to false ect. if we are on home page, load all product items (there is no productItemId on home page)
		if (!this.getURLId(this.productItemId)) {
			this.ajaxCall(this.apiProducts); //Calling the func. for getting all product items for home page
		}

		//If currentId is existing then call API for single category data and products
		if (this.urlName == 'category' && this.getURLId(this.urlID)) {
			this.urlID = this.getURLId(this.urlID); //Setting the categoryId var to value return by currentURLId() function
			this.ajaxCall(this.apiSingleCatProducts + this.urlID); //Calling the func. for getting all product items for category page
		}
		
		//If productItemId is existing then call API for single product item
		if (this.urlName == 'product' && this.getURLId(this.urlID)) {
			this.urlID = this.getURLId(this.urlID); //Setting the categoryId var to value return by currentURLId() function
			this.ajaxCall(this.apiSingleProductItem + this.urlID); //Calling the func. for getting all data for single product item per page
		}

		this.flashMessageHide(); //Calling func. for hiding flash messages

		this.flashCloseError(); //Calling func. for hiding flash messages

		this.scrollToTop(); //Calling func. for scrolling page to the top

		this.activeNavTab(); //Calling function for adding class to selected navigation tab
	},
});