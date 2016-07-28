import React from "react";
import $ from "jquery";

import Image from "./Image.js";
import SearchResult from "./SearchResult.js";

var API_URL = 'http://localhost:8000/';

export default class Header extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      isActive: 'input-wrap search-wrap',
      value: '',
      searchResult: []
    };
  }
  handleFocus() {
    if(this.state.isActive != 'collapse input-wrap search-wrap') {
      this.setState({ isActive: 'collapse input-wrap search-wrap' });
    }
  }
  handleFocusOut() {
    this.setState({ isActive: 'input-wrap search-wrap' });
  }
  handleChange(event) {
    this.setState({ value: event.target.value }, () => {
      if(this.state.value == ""){
        this.setState({ searchResult: [] });
        return;
      }

      var self = this;
      var productname = this.state.value;

      $.ajax({
        url: API_URL + 'products?name=' + productname,
        method: 'GET',
        success: function(data){
          self.setState({ searchResult: data });
        },
        error: function(x, e, s){
          console.error(x);
          console.error(e);
          console.error(s);
        }
      });
    });
  }
  render() {
    var collapse = this.state.isActive;
    var products = this.state.searchResult;

    var searchResultComponents = products.map(function(products, i) {
      const prod_name = (!products.name) ? 'None' : products.name;
      const prod_category = (!products.category.name.en) ? 'None' : products.category.name.en;
      const prod_subcategory = (!products.subcategory.name) ? 'None' : ' / '+products.subcategory.name.en;
      const prod_discount = (!products.discount) ? '' : ' -'+products.discount+'%';
      const prod_image = (products.images.length <= 0) ? '' : products.images[0].filename;
      return  <SearchResult key={i}
                            image={prod_image}
                            id={products.id}
                            name={products.name.en}
                            category={prod_category}
                            subcategory={prod_subcategory}
                            discount={prod_discount}
              />;
    });

      return <div onBlur={() => this.handleFocusOut()}
                  onFocus={() => this.handleFocus()}
                  className={this.state.isActive}
                  tabIndex="0">
               <input type="search" id="search"
                      placeholder="Search Product..."
                      value={this.state.value}
                      onChange={this.handleChange.bind(this)}
                      class="search-field icon-contain"></input>
               <label for="search"
                      class="btn-icn mdi mdi-magnify"></label>
               <div class="rslt-view">{searchResultComponents}</div>
             </div>;
  }
}
