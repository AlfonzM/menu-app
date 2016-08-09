import $ from "jquery";
import jqueryform from "jquery-form";

const API_URL = 'http://localhost:8888/menu-app/menu/public/api/v1/';

module.exports = {

	// SETTINGS

	getSettings: function(callback){
		$.get(API_URL + 'settings', callback);
	},

	getSetting: function(settingId, callback){
		$.get(API_URL + 'settings/' + settingId, callback);
	},

	editSetting: function($form, callback){
		$form.ajaxSubmit({
			url: API_URL + '/settings/' + 1,
			method: 'POST',
			dataType: 'json',
			success: function(data){
				callback(data)
			},
			error: function(x,e,s){
				console.log(x);
			}
		});
	},

	// CATEGORIES

	getCategories: function(callback){
		$.get(API_URL + 'categories', callback);
	},

	getCategory: function(id, callback){
		if(!id){
			return;
		}

		$.get(API_URL + 'categories/' + id, callback).fail(function(error){
			console.log("Error in getCategory");
			alert(error);
		});
	},

	createCategory: function($form, callback){
		// this.postForm($form, 'categories', callback)

		$form.ajaxSubmit({
			url: API_URL + 'categories',
			method: 'POST',
			dataType: 'json',
			success: function(data){
				callback(data)
			},
			error: function(x){
				console.log(x.responseText);
			}
		});
	
	},

	// SUBCATEGORIES

	getSubcategories: function(categoryId, callback) {
		$.get(API_URL + 'categories/' + categoryId + '/subcategories', callback);
	},

	getSubcategory: function(categoryId, subcategoryId, callback){
		$.get(API_URL + 'categories/' + categoryId + '/subcategories/' + subcategoryId, callback).fail(function(error){
			console.log("Error in getCategory");
			alert(error);
		});
	},

	createSubcategory: function($form, callback){
		this.postForm($form, 'subcategories', callback)
	},

	// PRODUCTS

	getProductsOfCategory: function(categoryId, callback){
		$.get(API_URL + 'products?cat=' + categoryId, callback);
	},

	getProductsOfSubcategory: function(subcategoryId, callback){
		$.get(API_URL + 'products?subcat=' + subcategoryId, callback);
	},

	getProduct: function(productId, callback){
		$.get(API_URL + 'products/' + productId, callback);
	},

	getProducts: function(productName, callback){
		if(productName){
			$.get(API_URL + 'products?name=' + productName, callback);
		} else {
			$.get(API_URL + 'products', callback);
		}
	},

	createProduct: function($form, callback) {
		$form.ajaxSubmit({
			url: API_URL + 'products',
			method: 'POST',
			dataType: 'json',
			success: function(data){
				callback(data)
			},
			error: function(x){
				console.log(x.responseText);
			}
		});
	},

	// MISC

	getCounts: function(callback){
		$.get(API_URL + 'counts', callback).fail(function(error){
			console.log("Error in getCounts");
			alert(error);
		});
	},

	postForm: function($form, url, callback){
		$form.ajaxSubmit({
			url: API_URL + url,
			method: 'POST',
			dataType: 'json',
			success: function(data){
				callback(data)
			},
			error: function(x){
				console.log(x.responseText);
			}
		});
	}
}