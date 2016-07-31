import React from "react";
import $ from "jquery";
import { hashHistory } from 'react-router';

import Image from "./Image.js";
import SearchResult from "./SearchResult.js";

var API_URL = 'http://localhost:8000/';

export default class Header extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      isActive: false,
      value: '',
      searchResult: []
    };
  }
  handleFocus() {
      this.setState({ isActive: true });
  }
  handleFocusOut() {
    this.setState({ isActive: false });
  }
  handleSearch(event) {
    if(event.charCode === 13) {
      this.setState({ isActive: false });
      if(this.state.value.trim()) {
        const path = '/products/filter';
        hashHistory.push(path);
      }
    }else {
      this.setState({ isActive: true });
    }
  }
  handleChange(event) {
    this.setState({ value: event.target.value }, () => {
      if(this.state.value == ""){
        this.setState({ searchResult: [] });
        return;
      }

      const productname = this.state.value;

      $.ajax({
        url: API_URL + 'products?name=' + productname,
        method: 'GET',
        success: function(data){
          this.setState({ searchResult: [] });
          this.setState({ searchResult: data });
        }.bind(this),
        error: function(x, e, s){
          console.error(x);
          console.error(e);
          console.error(s);
        }
      });
    });
  }
  render() {
    const collapse = (this.state.isActive) ? 'collapse' : '';
    const products = this.state.searchResult;
    const target = this.state.value;

    const searchResultComponents = products.map(function(products, i) {
      const prod_name = (!products.name.en) ? 'None' : products.name.en;
      const prod_category = (!products.category.name.en) ? 'None' : products.category.name.en;
      const prod_subcategory = (!products.subcategory.name) ? 'None' : ' / '+products.subcategory.name.en;
      const prod_discount = (!products.discount) ? '' : ' -'+products.discount+'%';
      const prod_image = (products.images.length <= 0) ? '' : products.images[0].filename;

      return  <SearchResult key={i}
                            image={prod_image}
                            id={products.id}
                            target={target}
                            name={prod_name}
                            category={prod_category}
                            subcategory={prod_subcategory}
                            discount={prod_discount}
              />;
    });

      return <div onBlur={() => this.handleFocusOut()}
                  onFocus={() => this.handleFocus()}
                  className={"input-wrap search-wrap " + collapse}
                  tabIndex="0">
               <input type="search" id="search"
                      placeholder="検索製品"
                      value={this.state.value}
                      onChange={this.handleChange.bind(this)}
                      onKeyPress={this.handleSearch.bind(this)}
                      onClick={(e) => {e.target.select(); }}
                      class="search-field icon-contain"></input>
               <label for="search"
                      class="btn-icn mdi mdi-magnify"></label>
               <div class="rslt-view"
                    onClick={() => this.handleFocusOut()}>
                    {searchResultComponents}
                  </div>
             </div>;
  }
}
